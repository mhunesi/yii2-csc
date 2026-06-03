<?php

namespace mhunesi\csc\models;

use Yii;
use mhunesi\csc\models\query\CityQuery;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name
 * @property int|null $state_id
 * @property string|null $state_code
 * @property string|null $state_name
 * @property int|null $country_id
 * @property string|null $country_code
 * @property string|null $country_name
 * @property string|null $native
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $wikiDataId
 *
 * @property Country $country
 * @property State $state
 */
class City extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'city';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['state_id', 'country_id'], 'integer'],
			[['name', 'state_name', 'country_name'], 'string', 'max' => 255],
			[['state_code', 'country_code'], 'string', 'max' => 5],
			[['latitude', 'longitude', 'wikiDataId'], 'string', 'max' => 50],
			[['native'], 'string', 'max' => 100],
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
			'state_id' => Yii::t('csc', 'State ID'),
			'state_code' => Yii::t('csc', 'State Code'),
			'state_name' => Yii::t('csc', 'State Name'),
			'country_id' => Yii::t('csc', 'Country ID'),
			'country_code' => Yii::t('csc', 'Country Code'),
			'country_name' => Yii::t('csc', 'Country Name'),
			'native' => Yii::t('csc', 'Native'),
			'latitude' => Yii::t('csc', 'Latitude'),
			'longitude' => Yii::t('csc', 'Longitude'),
			'wikiDataId' => Yii::t('csc', 'Wiki Data ID'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCountry()
	{
		return $this->hasOne(Country::class, ['id' => 'country_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getState()
	{
		return $this->hasOne(State::class, ['id' => 'state_id']);
	}

	/**
	 * {@inheritdoc}
	 * @return CityQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new CityQuery(get_called_class());
	}
}
