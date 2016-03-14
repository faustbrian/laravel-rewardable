<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Contracts;

/**
 * Interface Transactionable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface Transactionable
{
    /**
     * @param $amount
     *
     * @return mixed
     */
    public function chargeCredits($amount);
}
