Yii2 Country State City
=======================
Yii2 Country State City migration and models.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist mhunesi/yii2-csc "*"
```

or add

```
"mhunesi/yii2-csc": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
'controllerMap' => [
    'migrate' => [
            //..
        'migrationNamespaces' => [
            //..
        ],
        'migrationPath' => [
            //..
            '@mhunesi/csc/migrations'
        ]
    ]
],
```

And run migration:

```php
php yii migrate
```

## Models

* Country
* State
* City

```php
use mhunesi\csc\models\Country;
use mhunesi\csc\models\State;
use mhunesi\csc\models\City;

//Example 1
/** @var Country[] $country */
$country = Country::find()->all();

/** @var State[] $states */
$states = $country->states;

foreach ($states as $state) {
    /** @var City[] $cities */
    $cities = $state->cities
}

//Example 2

Country::find()->where(['iso2' => 'TR'])->one();

State::find()->where(['country_code' => 'TR'])->all();

```