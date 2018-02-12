<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Rewardable\Traits;

use BrianFaust\Rewardable\Badges\HasBadges;
use BrianFaust\Rewardable\Credits\HasCredits;
use BrianFaust\Rewardable\Ranks\HasRanks;
use BrianFaust\Rewardable\Transactions\HasTransactions;

trait HasRewards
{
    use HasBadges;
    use HasCredits;
    use HasRanks;
    use HasTransactions;
}
