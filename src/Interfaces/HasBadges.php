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

namespace BrianFaust\Rewardable\Interfaces;

interface HasBadges
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
