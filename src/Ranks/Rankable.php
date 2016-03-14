<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Ranks;

/**
 * Class Rankable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait Rankable
{
    /**
     * @return mixed
     */
    public function ranks()
    {
        return $this->morphToMany(Rank::class, 'rankable', 'ranks_awarded');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getRankPivot($id)
    {
        return $this->getRankRepository()->getRankPivot($id);
    }

    /**
     * @param null $type
     */
    public function getRanksPivot($type = null)
    {
        return $this->getRankRepository()->reGrantRanks($type);
    }

    /**
     * @param $rank
     *
     * @return bool
     *
     * @throws \DraperStudio\Rewardable\Exceptions\InsufficientFundsException
     * @throws \DraperStudio\Rewardable\Exceptions\InvalidCreditTypeException
     */
    public function grantRank($rank)
    {
        return $this->getRankRepository()->grantRank($rank);
    }

    /**
     * @param $ranks
     */
    public function grantRanks($ranks)
    {
        return $this->getRankRepository()->grantRanks($ranks);
    }

    /**
     * @param $rank
     */
    public function revokeRank($rank)
    {
        return $this->getRankRepository()->revokeRank($ranks);
    }

    /**
     * @param $ranks
     */
    public function revokeRanks($ranks)
    {
        return $this->getRankRepository()->revokeRanks($ranks);
    }

    /**
     *
     */
    public function revokeAllRanks()
    {
        return $this->getRankRepository()->revokeAllRanks();
    }

    /**
     * @param $ranks
     */
    public function reGrantRanks($ranks)
    {
        return $this->getRankRepository()->reGrantRanks($ranks);
    }

    /**
     * @return RankRepository
     */
    private function getRankRepository()
    {
        return new RankRepository($this);
    }
}
