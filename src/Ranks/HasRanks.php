<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable\Ranks;

trait HasRanks
{
    public function ranks()
    {
        return $this->morphToMany(Rank::class, 'rankable', 'ranks_awarded');
    }

    public function getRankPivot($id)
    {
        return $this->getRankRepository()->getRankPivot($id);
    }

    public function getRanksPivot($type = null)
    {
        return $this->getRankRepository()->reGrantRanks($type);
    }

    public function grantRank($rank)
    {
        return $this->getRankRepository()->grantRank($rank);
    }

    public function grantRanks($ranks)
    {
        return $this->getRankRepository()->grantRanks($ranks);
    }

    public function revokeRank($rank)
    {
        return $this->getRankRepository()->revokeRank($ranks);
    }

    public function revokeRanks($ranks)
    {
        return $this->getRankRepository()->revokeRanks($ranks);
    }

    public function revokeAllRanks()
    {
        return $this->getRankRepository()->revokeAllRanks();
    }

    public function reGrantRanks($ranks)
    {
        return $this->getRankRepository()->reGrantRanks($ranks);
    }

    private function getRankRepository()
    {
        return new RankRepository($this);
    }
}
