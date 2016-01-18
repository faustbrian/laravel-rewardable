<?php

namespace DraperStudio\Rewardable\Models;

use DraperStudio\Rewardable\Repositories\LeaderboardRepository;
use DraperStudio\Database\Models\Model;

class Leaderboard extends Model
{
    protected $table = 'leaderboard';

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
