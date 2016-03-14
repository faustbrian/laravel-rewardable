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
 * Interface Creditable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface Creditable
{
    /**
     * @return mixed
     */
    public function credits();

    /**
     * @return mixed
     */
    public function getCredit();

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getCreditByType($type);

    /**
     * @return mixed
     */
    public function getBalance();

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getBalanceByType($type);

    /**
     * @return mixed
     */
    public function getSpendCredits();

    /**
     * @param $credit
     *
     * @return mixed
     */
    public function grantCredit($credit);

    /**
     * @param $credits
     *
     * @return mixed
     */
    public function grantCredits($credits);

    /**
     * @param $credit
     *
     * @return mixed
     */
    public function revokeCredit($credit);

    /**
     * @param $credits
     *
     * @return mixed
     */
    public function revokeCredits($credits);

    /**
     * @return mixed
     */
    public function revokeAllCredits();

    /**
     * @param $credits
     *
     * @return mixed
     */
    public function reGrantCredits($credits);
}
