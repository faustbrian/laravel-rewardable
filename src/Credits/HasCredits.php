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

namespace BrianFaust\Rewardable\Credits;

/**
 * Class HasCredits.
 */
trait HasCredits
{
    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function credits()
    {
        return $this->morphMany(Credit::class, 'creditable');
    }

    /**
     * @return int
     */
    public function getCredit()
    {
        return $this->getCreditRepository()->getTotalCredit();
    }

    /**
     * @param $type CreditType
     *
     * @return int
     */
    public function getCreditByType($type)
    {
        return $this->getCreditRepository()->getTotalCreditByType($type);
    }

    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->getCreditRepository()->getBalance();
    }

    /**
     * @param $type CreditType
     *
     * @return int
     */
    public function getBalanceByType($type)
    {
        return $this->getCreditRepository()->getBalanceByType($type);
    }

    /**
     * @return int
     */
    public function getSpendCredits()
    {
        return $this->transactions->sum('amount');
    }

    /**
     * @param $credit Credit
     *
     * @return Credit
     */
    public function grantCredit($credit)
    {
        return $this->getCreditRepository()->grantCredit($credit);
    }

    /**
     * @param $credits Illuminate\Database\Eloquent\Collection
     *
     * @return void
     */
    public function grantCredits($credits)
    {
        return $this->getCreditRepository()->grantCredits($credits);
    }

    /**
     * @param $credit Credit
     *
     * @return void
     */
    public function revokeCredit($credit)
    {
        return $this->getCreditRepository()->revokeCredit($credit);
    }

    /**
     * @param $credits Illuminate\Database\Eloquent\Collection
     *
     * @return void
     */
    public function revokeCredits($credits)
    {
        return $this->getCreditRepository()->revokeCredits($credits);
    }

    /**
     * @return void
     */
    public function revokeAllCredits()
    {
        return $this->getCreditRepository()->revokeAllCredits();
    }

    /**
     * @param $credits Illuminate\Database\Eloquent\Collection
     *
     * @return void
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
