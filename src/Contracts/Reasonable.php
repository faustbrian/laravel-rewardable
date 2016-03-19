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
 * Interface Reasonable.
 *
 * @author Simon Franz <simonfranz85@gmail.com>
 */
interface Reasonable
{
    /**
     * @return mixed
     */
    public function getCredits();

    /**
     * @return mixed
     */
    public function getBadges();
}
