<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Credits;

/**
 * Class Creditable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait Creditable
{
    /**
     * @return mixed
     */
    public function credits()
    {
        return $this->morphMany(Credit::class, 'creditable');
    }

    /**
     * @return mixed
     */
    public function getCredit()
    {
        return $this->getCreditRepository()->getTotalCredit();
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getCreditByType($type)
    {
        return $this->getCreditRepository()->getTotalCreditByType($type);
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->getCreditRepository()->getBalance();
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getBalanceByType($type)
    {
        return $this->getCreditRepository()->getBalanceByType($type);
    }

    /**
     * @return mixed
     */
    public function getSpendCredits()
    {
        return $this->transactions->sum('amount');
    }

    /**
     * @param $credit
     *
     * @return mixed
     */
    public function grantCredit($credit)
    {
        return $this->getCreditRepository()->grantCredit($credit);
    }

    /**
     * @param $credits
     */
    public function grantCredits($credits)
    {
        return $this->getCreditRepository()->grantCredits($credits);
    }

    /**
     * @param $credit
     */
    public function revokeCredit($credit)
    {
        return $this->getCreditRepository()->revokeCredit($credits);
    }

    /**
     * @param $credits
     */
    public function revokeCredits($credits)
    {
        return $this->getCreditRepository()->revokeCredits($credits);
    }

    /**
     *
     */
    public function revokeAllCredits()
    {
        return $this->getCreditRepository()->revokeAllCredits();
    }

    /**
     * @param $credits
     */
    public function reGrantCredits($credits)
    {
        return $this->getCreditRepository()->reGrantCredits($credits);
    }

    /**
     * @return CreditRepository
     */
    private function getCreditRepository()
    {
        return new CreditRepository($this);
    }
}
