Yii2 Country State City
=======================

Yii2 extension for Country, State, and City database with migration and Active Record models.

This extension provides comprehensive geographical data including countries, states/provinces, and cities with their related information such as ISO codes, phone codes, currencies, timezones, coordinates, and more.

## Data Source

The geographical data used in this extension is sourced from the [Countries States Cities Database](https://github.com/dr5hn/countries-states-cities-database) repository, specifically from **version 3.1**.

This database includes:
- **Countries**: 250+ countries with ISO2, ISO3, phone codes, currencies, timezones, and geographical coordinates
- **States**: 5000+ states/provinces with country relationships and location data
- **Cities**: 150,000+ cities with state and country relationships

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run:

```bash
composer require --prefer-dist mhunesi/yii2-csc "*"
```

or add to the `require` section of your `composer.json` file:

```json
"mhunesi/yii2-csc": "*"
```

## Usage

### Running Migration

After installation, configure your console application to include the migration path:

```php
'controllerMap' => [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationPath' => [
            '@app/migrations',
            '@mhunesi/csc/migrations'
        ]
    ]
],
```

Then run the migration:

```bash
php yii migrate
```

Or directly specify the migration path:

```bash
yii migrate --migrationPath=@mhunesi/csc/migrations
```

This will create three tables:
- `country` - Countries with ISO codes, currencies, timezones, etc.
- `state` - States/provinces with country relationships
- `city` - Cities with state and country relationships

## Models

The extension provides three Active Record models:

- `mhunesi\csc\models\Country`
- `mhunesi\csc\models\State`
- `mhunesi\csc\models\City`

### Usage Examples

```php
use mhunesi\csc\models\Country;
use mhunesi\csc\models\State;
use mhunesi\csc\models\City;

// Get all countries
$countries = Country::find()->all();

// Find a specific country by ISO2 code
$turkey = Country::find()->where(['iso2' => 'TR'])->one();

// Get all states of a country
$states = State::find()->where(['country_code' => 'TR'])->all();

// Access country's states through relation
$country = Country::findOne(1);
foreach ($country->states as $state) {
    echo $state->name . "\n";
    
    // Access state's cities through relation
    foreach ($state->cities as $city) {
        echo "  - " . $city->name . "\n";
    }
}

// Find cities by country
$turkishCities = City::find()
    ->where(['country_code' => 'TR'])
    ->all();

// Find a specific city
$istanbul = City::find()
    ->where(['name' => 'Istanbul', 'country_code' => 'TR'])
    ->one();
```

## Database Schema

### Country Table
- `id` - Primary key
- `name` - Country name
- `iso2` - ISO2 code (2 characters)
- `iso3` - ISO3 code (3 characters)
- `numeric_code` - Numeric country code
- `phone_code` - International phone code
- `capital` - Capital city
- `currency` - Currency code
- `currency_name` - Currency name
- `currency_symbol` - Currency symbol
- `tld` - Top-level domain
- `native` - Native country name
- `region` - Geographic region
- `subregion` - Geographic subregion
- `timezones` - Supported timezones (JSON)
- `latitude` - Geographic latitude
- `longitude` - Geographic longitude

### State Table
- `id` - Primary key
- `name` - State/province name
- `country_id` - Foreign key to country
- `country_code` - Country code
- `country_name` - Country name
- `state_code` - State/province code
- `type` - Administrative type
- `latitude` - Geographic latitude
- `longitude` - Geographic longitude

### City Table
- `id` - Primary key
- `name` - City name
- `state_id` - Foreign key to state
- `state_code` - State code
- `state_name` - State name
- `country_id` - Foreign key to country
- `country_code` - Country code
- `country_name` - Country name
- `latitude` - Geographic latitude
- `longitude` - Geographic longitude
- `wikiDataId` - WikiData identifier

## License

Please refer to the license file for more information.
