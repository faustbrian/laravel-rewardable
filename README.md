# Laravel Rewardable

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-rewardable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    BrianFaust\Rewardable\RewardableServiceProvider::class
];
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="BrianFaust\Rewardable\RewardableServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model

``` php
<?php


namespace App;

// use BrianFaust\Rewardable\Traits\HasBadgesTrait;
// use BrianFaust\Rewardable\Traits\HasCreditsTrait;
// use BrianFaust\Rewardable\Traits\HasRanksTrait;
// use BrianFaust\Rewardable\Traits\HasTransactionsTrait;
use BrianFaust\Rewardable\HasRewardsTrait;
use BrianFaust\Rewardable\Interfaces\HasRewards;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements HasRewards
{
    use HasRewardsTrait;

    // these can be required one-by-one if you don't need all and don't use RewardableTrait
    // use HasBadgesTrait;
    // use HasCreditsTrait;
    // use HasRanksTrait;
    // use HasTransactionsTrait;
}
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
