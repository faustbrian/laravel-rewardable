<?php

namespace DraperStudio\Rewardable\Contracts;

/**
 * Interface Badgeable.
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
