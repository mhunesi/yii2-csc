<?php

use yii\db\Migration;
use yii\helpers\Console;

/**
 * Class m221201_130335_country_state_city_table_and_load_data
 */
class m221201_130335_country_state_city_table_and_load_data extends Migration
{
    private $_files = [
        'country' => [
            'url' => 'https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/v2.5/csv/countries.csv',
            'path' => '@runtime/countries.csv',
            'field' => 'getCountryFields'
        ],
        'state' => [
            'url' => 'https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/v2.5/csv/states.csv',
            'path' => '@runtime/states.csv',
            'field' => 'getStateFields'
        ],
        'city' => [
            'url' => 'https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/v2.5/csv/cities.csv',
            'path' => '@runtime/cities.csv',
            'field' => 'getCityFields'
        ]
    ];

    private const CSV_DELIMITER = ',';
    private const INSERT_ROWS = 10000;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->fileDownload();

        $this->createTable('{{%country}}', $this->getCountryFields());

        $this->createTable('{{%state}}', $this->getStateFields());

        $this->createTable('{{%city}}', $this->getCityFields());

        $this->createIndex('idx-country-iso2', '{{%country}}', 'iso2');

        $this->createIndex('idx-country-iso3', '{{%country}}', 'iso3');

        $this->createIndex('idx-state-country_id', '{{%state}}', 'country_id');

        $this->createIndex('idx-state-country_code', '{{%state}}', 'country_code');

        $this->createIndex('idx-city-country_id', '{{%city}}', 'country_id');

        $this->createIndex('idx-city-country_code', '{{%city}}', 'country_code');

        $this->createIndex('idx-city-state_id', '{{%city}}', 'state_id');

        $this->loadFromCsv('{{%country}}', array_keys($this->getCountryFields()), $this->_files['country']['path']);

        $this->loadFromCsv('{{%state}}', array_keys($this->getStateFields()), $this->_files['state']['path']);

        $this->loadFromCsv('{{%city}}', array_keys($this->getCityFields()), $this->_files['city']['path']);

        $this->unlinkFile();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
        $this->dropTable('{{%city}}');
        $this->dropTable('{{%state}}');

        echo "m221201_130335_country_state_city_table_and_load_data cannot be reverted.\n";

        return true;
    }

    private function getCountryFields()
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'iso2' => $this->string(2),
            'iso3' => $this->string(3),
            'numeric_code' => $this->string(25),
            'phone_code' => $this->string(25),
            'capital' => $this->string(128),
            'currency' => $this->string(10),
            'currency_name' => $this->string(128),
            'currency_symbol' => $this->string(10),
            'tld' => $this->string(10),
            'native' => $this->string(50),
            'region' => $this->string(50),
            'subregion' => $this->string(50),
            'timezones' => $this->text(),
            'latitude' => $this->string(50),
            'longitude' => $this->string(50)
        ];
    }

    private function getStateFields()
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'country_id' => $this->integer(),
            'country_code' => $this->string(10),
            'country_name' => $this->string(128),
            'state_code' => $this->string(10),
            'type' => $this->string(50),
            'latitude' => $this->string(50),
            'longitude' => $this->string(50),
        ];
    }

    private function getCityFields()
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'state_id' => $this->integer(),
            'state_code' => $this->string(5),
            'state_name' => $this->string(),
            'country_id' => $this->integer(),
            'country_code' => $this->string(5),
            'country_name' => $this->string(),
            'latitude' => $this->string(50),
            'longitude' => $this->string(50),
            'wikiDataId' => $this->string(50)
        ];
    }

    private function loadFromCsv($tableName, $columns, $csvFile, $options = '')
    {
        Console::output('    > load into ' . $tableName . ' from ' . $csvFile . ' ...');

        flush();
        $time = microtime(true);

        try {
            switch ($this->db->driverName) {
                case 'pgsql':
                    $transaction = $this->db->beginTransaction();
                    try {
                        $this->db
                            ->createCommand("COPY $tableName FROM '$csvFile' DELIMITER '" . static::CSV_DELIMITER . "' QUOTE '\"' ESCAPE '\"' CSV")
                            ->execute();
                    } catch (\Exception $e) {
                        $transaction->rollBack();
                        throw $e;
                    }
                    $transaction->commit();
                    break;
                case 'mssql':
                    $this->db
                        ->createCommand("BULK INSERT $tableName FROM '$csvFile' WITH(FIELDTERMINATOR='" . static::CSV_DELIMITER . "', TABLOCK)")
                        ->execute();
                    break;
                case 'mysql':
                case 'oracle':
                default:
                    $this->db
                        ->createCommand("LOAD DATA INFILE '$csvFile' INTO TABLE $tableName FIELDS TERMINATED BY '" . static::CSV_DELIMITER . "' ENCLOSED BY '\"' ESCAPED BY '\"' " . $options)
                        ->execute();
            }

            Console::output(' done (time: ' . sprintf('%.3f', microtime(true) - $time) . 's)');

        } catch (\Exception $e) {
            Console::output(' filed: ' . $e->getMessage());
            Console::output('    > trying batch insert ...');
            flush();

            $csv = fopen($csvFile, 'r');
            do {
                $rows = [];
                for ($i = 0; ($row = fgetcsv($csv, 1024, static::CSV_DELIMITER, '"', '\\')) && $i < static::INSERT_ROWS; ++$i) {
                    $rows[] = $row;
                }

                $this->batchInsert($tableName, $columns, $rows);
                Console::output('    > inserted ' . count($rows) . ' rows');
                flush();
            } while ($row);

            fclose($csv);
        }
    }

    private function fileDownload()
    {
        foreach ($this->_files as $k => $file) {
            $this->_files[$k]['path'] = Yii::getAlias($file['path']);
        }

        foreach ($this->_files as $file) {
            if(!file_exists($file['path'])){
                $textCSV = $this->getFile($file);

                if(file_put_contents($file['path'],$textCSV) === false) {
                    throw new Exception("{$file['path']} file cannot write.");
                }
            }
        }
    }

    private function getFile($file)
    {
        $source = fopen($file['url'],'r');

        $lines = [];

        while ($row = fgetcsv($source, 1024, static::CSV_DELIMITER, '"', '\\')) {
            $lines[] = $row;
        }

        $header = array_shift($lines);

        $header = array_flip($header);

        $tableColumns = array_keys($this->{$file['field']}());


        /*$headerKeys = array_keys(array_filter($header,function($e) use($tableColumns){
            return in_array($e,$tableColumns);
        }));*/

        $handle = fopen('php://temp', 'r+');

        array_map(function($line) use(&$handle,$tableColumns,$header){
            $newLine = [];

            foreach ($tableColumns as $tableColumn) {
                $newLine[] = $line[$header[$tableColumn]];
            }

            fputcsv($handle, $newLine, self::CSV_DELIMITER, '"', '\\');

        },$lines);

        $contents = "";
        rewind($handle);
        while (!feof($handle)) {
            $contents .= fread($handle, 8192);
        }
        fclose($handle);
        return $contents;
    }

    public function unlinkFile()
    {
        foreach ($this->_files as $k => $file) {
            unlink($file['path']);
        }
    }
}
