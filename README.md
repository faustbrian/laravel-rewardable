# Laravel Rewardable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-rewardable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    DraperStudio\Rewardable\ServiceProvider::class
];
```

At last you need to publish and run the migration.

```
php artisan vendor:publish --provider="DraperStudio\Rewardable\ServiceProvider" && php artisan migrate
```

## Usage

## Setup a Model

``` php
<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-rewardable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Rewardable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-rewardable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-rewardable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-rewardable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-rewardable
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Rewardable
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-rewardable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-rewardable
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-rewardable
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
