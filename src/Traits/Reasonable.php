<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Traits;

use DraperStudio\Rewardable\Badges\Badge;
use DraperStudio\Rewardable\Credits\Credit;

/**
 * Class Reasonable.
 *
 * @author Simon Franz <simonfranz85@gmail.com>
 */
trait Reasonable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function getCredits(){
        return $this->morphToMany(Credit::class, 'reasonable');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function getBadges(){
        return $this->morphToMany(Badge::class, 'reasonable');
	}
}
