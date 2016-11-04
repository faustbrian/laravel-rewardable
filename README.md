# Laravel Rewardable

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-rewardable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    BrianFaust\Rewardable\ServiceProvider::class
];
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="BrianFaust\Rewardable\ServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model

``` php
<?php


namespace App;

// use BrianFaust\Rewardable\Traits\Badgeable as BadgeableTrait;
// use BrianFaust\Rewardable\Traits\Creditable as CreditableTrait;
// use BrianFaust\Rewardable\Traits\Rankable as RankableTrait;
// use BrianFaust\Rewardable\Traits\Transactionable as TransactionableTrait;
use BrianFaust\Rewardable\Traits\Rewardable as RewardableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use RewardableTrait;

    // these can be required one-by-one if you don't need all and don't use RewardableTrait
    // use BadgeableTrait;
    // use CreditableTrait;
    // use RankableTrait;
    // use TransactionableTrait;
}
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

The [The MIT License (MIT)](LICENSE). Please check the [LICENSE](LICENSE) file for more details.
