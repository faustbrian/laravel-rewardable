<?php

namespace BrianFaust\Rewardable;

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
