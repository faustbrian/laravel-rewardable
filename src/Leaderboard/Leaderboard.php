<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Leaderboard;

use DraperStudio\Eloquent\Models\Model;

/**
 * Class Leaderboard.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Leaderboard extends Model
{
    /**
     * @var string
     */
    protected $table = 'leaderboard';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function boardable()
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function getHighToLow()
    {
        return $this->orderBy('position', 'asc')->get();
    }

    /**
     * @return mixed
     */
    public function getLowToHigh()
    {
        return $this->orderBy('position', 'desc')->get();
    }

    /**
     * @param $model
     *
     * @return static
     */
    public function createOrUpdate($model)
    {
        return $this->getLeaderboardRepository()->createOrUpdate($model);
    }

    /**
     * @param $model
     *
     * @return float
     */
    private function calculateExperience($model)
    {
        return $this->getLeaderboardRepository()->calculateExperience($model);
    }

    private function calculatePositions()
    {
        return $this->getLeaderboardRepository()->calculatePositions();
    }

    /**
     * @return LeaderboardRepository
     */
    private function getLeaderboardRepository()
    {
        return new LeaderboardRepository($this);
    }
}
