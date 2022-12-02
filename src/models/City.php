<?php

namespace mhunesi\csc\models;

use Yii;

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
            'state_id' => 'State ID',
            'state_code' => 'State Code',
            'state_name' => 'State Name',
            'country_id' => 'Country ID',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'wikiDataId' => 'Wiki Data ID',
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
    public function getState()
    {
        return $this->hasOne(State::class,['id' => 'state_id']);
    }
}
