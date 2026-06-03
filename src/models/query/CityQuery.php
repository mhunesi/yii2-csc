<?php

namespace mhunesi\csc\models\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for City model.
 *
 * @see \mhunesi\csc\models\City
 */
class CityQuery extends ActiveQuery
{
    /**
     * Filter by country ID
     *
     * @param int $countryId
     * @return $this
     */
    public function byCountry($countryId)
    {
        return $this->andWhere(['country_id' => $countryId]);
    }

    /**
     * Filter by country code
     *
     * @param string $countryCode
     * @return $this
     */
    public function byCountryCode($countryCode)
    {
        return $this->andWhere(['country_code' => $countryCode]);
    }

    /**
     * Filter by state ID
     *
     * @param int $stateId
     * @return $this
     */
    public function byState($stateId)
    {
        return $this->andWhere(['state_id' => $stateId]);
    }

    /**
     * Filter by state code
     *
     * @param string $stateCode
     * @return $this
     */
    public function byStateCode($stateCode)
    {
        return $this->andWhere(['state_code' => $stateCode]);
    }

    /**
     * {@inheritdoc}
     * @return \mhunesi\csc\models\City[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \mhunesi\csc\models\City|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
