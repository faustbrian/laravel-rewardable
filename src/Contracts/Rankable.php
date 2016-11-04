<?php

namespace BrianFaust\Rewardable\Contracts;

interface Rankable
{
    public function ranks();

    public function getRankPivot($id);

    public function getRanksPivot($type = null);

    public function grantRank($rank);

    public function grantRanks($ranks);

    public function revokeRank($rank);

    public function revokeRanks($ranks);

    public function revokeAllRanks();

    public function reGrantRanks($ranks);
}
