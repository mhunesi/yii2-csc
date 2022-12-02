<?php

namespace mhunesi\csc\models;

use Yii;

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
            [['type', 'latitude', 'longitude'], 'string', 'max' => 50],
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
            'country_id' => 'Country ID',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'state_code' => 'State Code',
            'type' => 'Type',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
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
}
