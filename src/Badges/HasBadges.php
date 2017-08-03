<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Rewardable\Badges;

trait HasBadges
{
    public function badges()
    {
        return $this->morphToMany(Badge::class, 'badgeable', 'badges_awarded');
    }

    public function getBadgePivot($id)
    {
        return $this->getBadgeRepository()->getBadgePivot($id);
    }

    public function getBadgesPivot($type = null)
    {
        return $this->getBadgeRepository()->getBadgesPivot($type);
    }

    public function grantBadge($badge)
    {
        return $this->getBadgeRepository()->grantBadge($badge);
    }

    public function grantBadges($badges)
    {
        return $this->getBadgeRepository()->grantBadges($badges);
    }

    public function revokeBadge($badge)
    {
        return $this->getBadgeRepository()->revokeBadge($badges);
    }

    public function revokeBadges($badges)
    {
        return $this->getBadgeRepository()->revokeBadges($badges);
    }

    public function revokeAllBadges()
    {
        return $this->getBadgeRepository()->revokeAllBadges();
    }

    public function reGrantBadges($badges)
    {
        return $this->getBadgeRepository()->reGrantBadges($badges);
    }

    private function getBadgeRepository()
    {
        return new BadgeRepository($this);
    }
}
