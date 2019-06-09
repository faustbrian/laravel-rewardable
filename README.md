# Laravel Rewardable

[![Build Status](https://img.shields.io/travis/artisanry/Rewardable/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Rewardable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/rewardable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Rewardable.svg?style=flat-square)](https://github.com/artisanry/Rewardable/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Rewardable.svg?style=flat-square)](https://packagist.org/packages/artisanry/Rewardable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/rewardable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="Artisanry\Rewardable\RewardableServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model

``` php
<?php


namespace App;

// use Artisanry\Rewardable\Badges\HasBadges;
// use Artisanry\Rewardable\Credits\HasCredits;
// use Artisanry\Rewardable\Ranks\HasRanks;
// use Artisanry\Rewardable\Transactions\HasTransactions;
use Artisanry\Rewardable\HasRewardsTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasRewards;

    // these can be required one-by-one if you don't need all and don't use HasRewards
    // use HasBadges;
    // use HasCredits;
    // use HasRanks;
    // use HasTransactions;
}
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Mozilla Public License Version 2.0 ([MPL-2.0](./LICENSE)).
