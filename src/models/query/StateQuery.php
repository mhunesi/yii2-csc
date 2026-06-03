<?php

namespace mhunesi\csc\models\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for State model.
 *
 * @see \mhunesi\csc\models\State
 */
class StateQuery extends ActiveQuery
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
     * Filter by type
     *
     * @param string $type
     * @return $this
     */
    public function byType($type)
    {
        return $this->andWhere(['type' => $type]);
    }

    /**
     * {@inheritdoc}
     * @return \mhunesi\csc\models\State[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \mhunesi\csc\models\State|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
