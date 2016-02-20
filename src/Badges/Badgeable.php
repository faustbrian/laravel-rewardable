<?php

namespace DraperStudio\Rewardable\Badges;

/**
 * Class Badgeable.
 */
trait Badgeable
{
    /**
     * @return mixed
     */
    public function badges()
    {
        return $this->morphToMany(Badge::class, 'badgeable', 'badges_awarded');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getBadgePivot($id)
    {
        return $this->getBadgeRepository()->getBadgePivot($id);
    }

    /**
     * @param null $type
     *
     * @return mixed
     */
    public function getBadgesPivot($type = null)
    {
        return $this->getBadgeRepository()->getBadgesPivot($type);
    }

    /**
     * @param $badge
     *
     * @return bool
     *
     * @throws \DraperStudio\Rewardable\Exceptions\InsufficientFundsException
     * @throws \DraperStudio\Rewardable\Exceptions\InvalidCreditTypeException
     */
    public function grantBadge($badge)
    {
        return $this->getBadgeRepository()->grantBadge($badge);
    }

    /**
     * @param $badges
     */
    public function grantBadges($badges)
    {
        return $this->getBadgeRepository()->grantBadges($badges);
    }

    /**
     * @param $badge
     */
    public function revokeBadge($badge)
    {
        return $this->getBadgeRepository()->revokeBadge($badges);
    }

    /**
     * @param $badges
     */
    public function revokeBadges($badges)
    {
        return $this->getBadgeRepository()->revokeBadges($badges);
    }

    /**
     *
     */
    public function revokeAllBadges()
    {
        return $this->getBadgeRepository()->revokeAllBadges();
    }

    /**
     * @param $badges
     */
    public function reGrantBadges($badges)
    {
        return $this->getBadgeRepository()->reGrantBadges($badges);
    }

    /**
     * @return BadgeRepository
     */
    private function getBadgeRepository()
    {
        return new BadgeRepository($this);
    }
}
