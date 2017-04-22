<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable\Leaderboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;

class Leaderboard extends Model
{
    public function boardable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getHighToLow(): Collection
    {
        return $this->orderBy('position', 'asc')->get();
    }

    public function getLowToHigh(): Collection
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

    private function getLeaderboardRepository(): LeaderboardRepository
    {
        return new LeaderboardRepository($this);
    }
}
