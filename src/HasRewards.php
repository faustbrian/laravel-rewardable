<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Rewardable;

trait HasRewards
{
    use Badges\HasBadges;
    use Credits\HasCredits;
    use Ranks\HasRanks;
    use Transactions\HasTransactions;
}
