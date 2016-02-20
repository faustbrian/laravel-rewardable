<?php

namespace DraperStudio\Rewardable\Leaderboard;

use DraperStudio\Database\Models\Model;

/**
 * Class Leaderboard.
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

    /**
     *
     */
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
