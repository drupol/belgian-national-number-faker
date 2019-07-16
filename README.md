[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/belgian-national-number-faker.svg?style=flat-square)](https://packagist.org/packages/drupol/belgian-national-number-faker)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/belgian-national-number-faker.svg?style=flat-square)](https://packagist.org/packages/drupol/belgian-national-number-faker)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/belgian-national-number-faker.svg?style=flat-square)](https://packagist.org/packages/drupol/belgian-national-number-faker)
 [![Build Status](https://img.shields.io/travis/drupol/belgian-national-number-faker/master.svg?style=flat-square)](https://travis-ci.org/drupol/belgian-national-number-faker)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/drupol/belgian-national-number-faker/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/belgian-national-number-faker/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/drupol/belgian-national-number-faker/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/belgian-national-number-faker/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/belgian-national-number-faker/master)](https://stryker-mutator.github.io)
 [![License](https://img.shields.io/packagist/l/drupol/belgian-national-number-faker.svg?style=flat-square)](https://packagist.org/packages/drupol/belgian-national-number-faker)
 [![Say Thanks!](https://img.shields.io/badge/Say-thanks-brightgreen.svg?style=flat-square)](https://saythanks.io/to/drupol)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)
 
# Belgian national number faker

## Description

Belgian national number generator using [fzaninotto/faker](https://github.com/fzaninotto/Faker).

## Requirements

* PHP >= 7.1

## Installation

```composer require --dev drupol/belgian-national-number-faker```

## Usage

With regular PHP

```php
<?php

declare(strict_types = 1);

include 'vendor/autoload.php';

use drupol\BelgianNationalNumberFaker\Provider\BelgianNationalNumber;
use Faker\Generator;

$faker = new BelgianNationalNumber(new Generator());

echo $faker->belgianNationalIdentificationNumber();
```

## Integration with Symfony

Through [nelmio/alice](https://packagist.org/packages/nelmio/alice) and [hautelook/alice-bundle](https://packagist.org/packages/hautelook/alice-bundle):

Edit the file `services.yml` and add:

```yaml
services:
  drupol\BelgianNationalNumberFaker\Provider\BelgianNationalNumber:
    tags: [ { name: nelmio_alice.faker.provider } ]
```

## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Travis CI](https://travis-ci.org/drupol/belgian-national-number-faker/builds) run the tests and the benchmarks.

The library has tests written with [PHPSpec](http://www.phpspec.net/).
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP](https://github.com/phpro/grumphp), run `./vendor/bin/grumphp run` to check manually.

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
