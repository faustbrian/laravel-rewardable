<?php

namespace BrianFaust\Rewardable\Leaderboard;

use BrianFaust\Eloquent\Model;

class Leaderboard extends Model
{
    public function boardable()
    {
        return $this->morphTo();
    }

    public function getHighToLow()
    {
        return $this->orderBy('position', 'asc')->get();
    }

    public function getLowToHigh()
    {
        return $this->orderBy('position', 'desc')->get();
    }

    public function createOrUpdate($model)
    {
        return $this->getLeaderboardRepository()->createOrUpdate($model);
    }

    private function calculateExperience($model)
    {
        return $this->getLeaderboardRepository()->calculateExperience($model);
    }

    private function calculatePositions()
    {
        return $this->getLeaderboardRepository()->calculatePositions();
    }

    private function getLeaderboardRepository()
    {
        return new LeaderboardRepository($this);
    }
}
