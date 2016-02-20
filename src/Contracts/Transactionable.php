<?php

namespace DraperStudio\Rewardable\Contracts;

/**
 * Interface Transactionable.
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
