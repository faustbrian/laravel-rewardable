<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Traits;

use DraperStudio\Rewardable\Badges\Badgeable;
use DraperStudio\Rewardable\Credits\Creditable;
use DraperStudio\Rewardable\Ranks\Rankable;
use DraperStudio\Rewardable\Transactions\Transactionable;

/**
 * Class Rewardable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait Rewardable
{
    use Rankable;
    use Creditable;
    use Badgeable;
    use Transactionable;
}
