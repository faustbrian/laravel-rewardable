<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Rewardable\Traits;

use Artisanry\Rewardable\Badges\HasBadges;
use Artisanry\Rewardable\Credits\HasCredits;
use Artisanry\Rewardable\Ranks\HasRanks;
use Artisanry\Rewardable\Transactions\HasTransactions;

trait HasRewards
{
    use HasBadges;
    use HasCredits;
    use HasRanks;
    use HasTransactions;
}
