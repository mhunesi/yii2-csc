<?php

namespace mhunesi\csc\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $name
 * @property string|null $iso2
 * @property string|null $iso3
 * @property string|null $numeric_code
 * @property string|null $phone_code
 * @property string|null $capital
 * @property string|null $currency
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 * @property string|null $tld
 * @property string|null $native
 * @property string|null $region
 * @property string|null $subregion
 * @property string|null $timezones
 * @property string|null $latitude
 * @property string|null $longitude
 *
 * @property State[] $states
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['timezones'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['iso2'], 'string', 'max' => 2],
            [['iso3'], 'string', 'max' => 3],
            [['numeric_code', 'phone_code'], 'string', 'max' => 25],
            [['capital', 'currency_name'], 'string', 'max' => 128],
            [['currency', 'currency_symbol', 'tld'], 'string', 'max' => 10],
            [['native', 'region', 'subregion', 'latitude', 'longitude'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'iso2' => 'Iso2',
            'iso3' => 'Iso3',
            'numeric_code' => 'Numeric Code',
            'phone_code' => 'Phone Code',
            'capital' => 'Capital',
            'currency' => 'Currency',
            'currency_name' => 'Currency Name',
            'currency_symbol' => 'Currency Symbol',
            'tld' => 'Tld',
            'native' => 'Native',
            'region' => 'Region',
            'subregion' => 'Subregion',
            'timezones' => 'Timezones',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStates()
    {
        return $this->hasMany(State::class,['id' => 'state_id']);
    }
}
