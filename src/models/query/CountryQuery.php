<?php

namespace mhunesi\csc\models\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for Country model.
 *
 * @see \mhunesi\csc\models\Country
 */
class CountryQuery extends ActiveQuery
{
    /**
     * Filter by ISO2 code
     *
     * @param string $iso2
     * @return $this
     */
    public function byIso2($iso2)
    {
        return $this->andWhere(['iso2' => $iso2]);
    }

    /**
     * Filter by ISO3 code
     *
     * @param string $iso3
     * @return $this
     */
    public function byIso3($iso3)
    {
        return $this->andWhere(['iso3' => $iso3]);
    }

    /**
     * Filter by phone code
     *
     * @param string $phoneCode
     * @return $this
     */
    public function byPhoneCode($phoneCode)
    {
        return $this->andWhere(['phone_code' => $phoneCode]);
    }

    /**
     * Filter by currency code
     *
     * @param string $currency
     * @return $this
     */
    public function byCurrency($currency)
    {
        return $this->andWhere(['currency' => $currency]);
    }

    /**
     * {@inheritdoc}
     * @return \mhunesi\csc\models\Country[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \mhunesi\csc\models\Country|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
