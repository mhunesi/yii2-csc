<?php

namespace mhunesi\csc\models;

use Yii;
use mhunesi\csc\models\query\StateQuery;

/**
 * This is the model class for table "state".
 *
 * @property int $id
 * @property string $name
 * @property int|null $country_id
 * @property string|null $country_code
 * @property string|null $country_name
 * @property string|null $state_code
 * @property string|null $type
 * @property string|null $native
 * @property string|null $latitude
 * @property string|null $longitude
 *
 * @property Country $country
 * @property City[] $cities
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['country_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['country_code', 'state_code'], 'string', 'max' => 10],
            [['country_name'], 'string', 'max' => 128],
            [['type', 'latitude', 'longitude','native'], 'string', 'max' => 50],
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
            'country_id' => Yii::t('csc', 'Country ID'),
            'country_code' => Yii::t('csc', 'Country Code'),
            'country_name' => Yii::t('csc', 'Country Name'),
            'state_code' => Yii::t('csc', 'State Code'),
            'type' => Yii::t('csc', 'Type'),
            'native' => Yii::t('csc', 'Native'),
            'latitude' => Yii::t('csc', 'Latitude'),
            'longitude' => Yii::t('csc', 'Longitude'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class,['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::class,['state_id' => 'id']);
    }

	/**
	 * {@inheritdoc}
	 * @return StateQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new StateQuery(get_called_class());
	}
}
