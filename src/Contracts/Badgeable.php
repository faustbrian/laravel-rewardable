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
 * Interface Badgeable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface Badgeable
{
    /**
     * @return mixed
     */
    public function badges();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getBadgePivot($id);

    /**
     * @param null $type
     *
     * @return mixed
     */
    public function getBadgesPivot($type = null);

    /**
     * @param $badge
     *
     * @return mixed
     */
    public function grantBadge($badge);

    /**
     * @param $badges
     *
     * @return mixed
     */
    public function grantBadges($badges);

    /**
     * @param $badge
     *
     * @return mixed
     */
    public function revokeBadge($badge);

    /**
     * @param $badges
     *
     * @return mixed
     */
    public function revokeBadges($badges);

    /**
     * @return mixed
     */
    public function revokeAllBadges();

    /**
     * @param $badges
     *
     * @return mixed
     */
    public function reGrantBadges($badges);
}
