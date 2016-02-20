<?php

namespace DraperStudio\Rewardable\Traits;

use DraperStudio\Rewardable\Badges\Badgeable;
use DraperStudio\Rewardable\Credits\Creditable;
use DraperStudio\Rewardable\Ranks\Rankable;
use DraperStudio\Rewardable\Transactions\Transactionable;

/**
 * Class Rewardable.
 */
trait Rewardable
{
    use Rankable;
    use Creditable;
    use Badgeable;
    use Transactionable;
}
