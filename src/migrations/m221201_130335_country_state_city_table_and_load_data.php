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
			'path' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'countries.csv',
			'field' => 'getCountryFields',
			'mapping' => [
				'id' => 'id',
				'name' => 'name',
				'iso2' => 'iso2',
				'iso3' => 'iso3',
				'numeric_code' => 'numeric_code',
				'phone_code' => 'phonecode',
				'capital' => 'capital',
				'currency' => 'currency',
				'currency_name' => 'currency_name',
				'currency_symbol' => 'currency_symbol',
				'tld' => 'tld',
				'native' => 'native',
				'region' => 'region',
				'subregion' => 'subregion',
				'timezones' => 'timezones',
				'latitude' => 'latitude',
				'longitude' => 'longitude'
			]
		],
		'state' => [
			'path' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'states.csv',
			'field' => 'getStateFields',
			'mapping' => [
				'id' => 'id',
				'name' => 'name',
				'country_id' => 'country_id',
				'country_code' => 'country_code',
				'country_name' => 'country_name',
				'state_code' => 'iso2',
				'type' => 'type',
				'native' => 'native',
				'latitude' => 'latitude',
				'longitude' => 'longitude'
			]
		],
		'city' => [
			'path' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'cities.csv',
			'field' => 'getCityFields',
			'mapping' => [
				'id' => 'id',
				'name' => 'name',
				'state_id' => 'state_id',
				'state_code' => 'state_code',
				'state_name' => 'state_name',
				'country_id' => 'country_id',
				'country_code' => 'country_code',
				'country_name' => 'country_name',
				'native' => 'native',
				'latitude' => 'latitude',
				'longitude' => 'longitude',
				'wikiDataId' => 'wikiDataId'
			]
		]
	];

	private const CSV_DELIMITER = ',';
	private const INSERT_ROWS = 10000;

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
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

		$this->loadFromCsv('{{%country}}', 'country');
		$this->loadFromCsv('{{%state}}', 'state');
		$this->loadFromCsv('{{%city}}', 'city');
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%city}}');
		$this->dropTable('{{%state}}');
		$this->dropTable('{{%country}}');

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
			'native' => $this->string(50),
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
			'native' => $this->string(100),
			'latitude' => $this->string(50),
			'longitude' => $this->string(50),
			'wikiDataId' => $this->string(50)
		];
	}

	private function loadFromCsv($tableName, $type)
	{
		$csvFile = $this->_files[$type]['path'];
		$mapping = $this->_files[$type]['mapping'];

		Console::output('    > load into ' . $tableName . ' from ' . $csvFile . ' ...');
		flush();
		$time = microtime(true);

		if (!file_exists($csvFile)) {
			Console::output('    > file not found: ' . $csvFile);
			return false;
		}

		$csv = fopen($csvFile, 'r');
		$header = fgetcsv($csv, 0, static::CSV_DELIMITER, '"', '\\');
		$headerMap = array_flip($header);

		$tableColumns = array_keys($mapping);
		$totalInserted = 0;

		do {
			$rows = [];
			for ($i = 0; ($row = fgetcsv($csv, 0, static::CSV_DELIMITER, '"', '\\')) && $i < static::INSERT_ROWS; ++$i) {
				$mappedRow = [];
				foreach ($mapping as $tableColumn => $csvColumn) {
					if (isset($headerMap[$csvColumn])) {
						$mappedRow[] = $row[$headerMap[$csvColumn]] ?? null;
					} else {
						$mappedRow[] = null;
					}
				}
				$rows[] = $mappedRow;
			}

			if (!empty($rows)) {
				$this->batchInsert($tableName, $tableColumns, $rows);
				$totalInserted += count($rows);
				Console::output('    > inserted ' . count($rows) . ' rows (total: ' . $totalInserted . ')');
				flush();
			}
		} while ($row);

		fclose($csv);
		$elapsed = microtime(true) - $time;
		Console::output('    > done (time: ' . sprintf('%.3f', $elapsed) . 's)');
	}

}
