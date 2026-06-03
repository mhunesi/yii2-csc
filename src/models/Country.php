<?php

namespace mhunesi\csc\models;

use Yii;
use mhunesi\csc\models\query\CountryQuery;

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
            'id' => Yii::t('csc', 'ID'),
            'name' => Yii::t('csc', 'Name'),
            'iso2' => Yii::t('csc', 'ISO2'),
            'iso3' => Yii::t('csc', 'ISO3'),
            'numeric_code' => Yii::t('csc', 'Numeric Code'),
            'phone_code' => Yii::t('csc', 'Phone Code'),
            'capital' => Yii::t('csc', 'Capital'),
            'currency' => Yii::t('csc', 'Currency'),
            'currency_name' => Yii::t('csc', 'Currency Name'),
            'currency_symbol' => Yii::t('csc', 'Currency Symbol'),
            'tld' => Yii::t('csc', 'TLD'),
            'native' => Yii::t('csc', 'Native'),
            'region' => Yii::t('csc', 'Region'),
            'subregion' => Yii::t('csc', 'Subregion'),
            'timezones' => Yii::t('csc', 'Timezones'),
            'latitude' => Yii::t('csc', 'Latitude'),
            'longitude' => Yii::t('csc', 'Longitude'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStates()
    {
        return $this->hasMany(State::class,['id' => 'state_id']);
    }

	/**
	 * {@inheritdoc}
	 * @return CountryQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new CountryQuery(get_called_class());
	}
}
