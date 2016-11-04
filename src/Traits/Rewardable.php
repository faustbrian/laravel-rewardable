<?php

namespace BrianFaust\Rewardable\Traits;

use BrianFaust\Rewardable\Badges\Badgeable;
use BrianFaust\Rewardable\Credits\Creditable;
use BrianFaust\Rewardable\Ranks\Rankable;
use BrianFaust\Rewardable\Transactions\Transactionable;

trait Rewardable
{
    use Rankable;
    use Creditable;
    use Badgeable;
    use Transactionable;
}
