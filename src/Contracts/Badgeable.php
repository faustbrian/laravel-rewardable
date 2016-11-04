<?php

namespace BrianFaust\Rewardable\Contracts;

interface Badgeable
{
    public function badges();

    public function getBadgePivot($id);

    public function getBadgesPivot($type = null);

    public function grantBadge($badge);

    public function grantBadges($badges);

    public function revokeBadge($badge);

    public function revokeBadges($badges);

    public function revokeAllBadges();

    public function reGrantBadges($badges);
}
