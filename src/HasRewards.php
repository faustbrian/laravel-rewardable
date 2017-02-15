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

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Rewardable;

use BrianFaust\Rewardable\Offer\HasOffer;

trait HasRewards
{
    use Badges\HasBadges;
    use Credits\HasCredits;
    use Ranks\HasRanks;
    use Transactions\HasTransactions;
    use HasOffer;
}
