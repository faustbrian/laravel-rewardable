# Laravel Rewardable

## Installation

First, pull in the package through Composer.

```bash
$ composer require draperstudio/laravel-rewardable:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    DraperStudio\Rewardable\ServiceProvider::class
];
```

At last you need to publish and run the migration.

```
php artisan vendor:publish --provider="DraperStudio\Rewardable\ServiceProvider" && php artisan migrate
```

## Setup a Model

```php
<?php

namespace App;

// use DraperStudio\Rewardable\Traits\Badgeable as BadgeableTrait;
// use DraperStudio\Rewardable\Traits\Creditable as CreditableTrait;
// use DraperStudio\Rewardable\Traits\Rankable as RankableTrait;
// use DraperStudio\Rewardable\Traits\Transactionable as TransactionableTrait;
use DraperStudio\Rewardable\Traits\Rewardable as RewardableTrait;
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

## Classes and Methods

- [Credits](docs/credits.md)
- [Badges](docs/badges.md)
- [Ranks](docs/ranks.md)
- [Transactions](docs/transactions.md)

## To-Do
- Revoke Credits when Badges/Ranks with a Reward are revoked
- Allow Entites to go in Debt
