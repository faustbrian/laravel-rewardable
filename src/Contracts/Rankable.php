<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Contracts;

/**
 * Interface Rankable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface Rankable
{
    /**
     * @return mixed
     */
    public function ranks();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getRankPivot($id);

    /**
     * @param null $type
     *
     * @return mixed
     */
    public function getRanksPivot($type = null);

    /**
     * @param $rank
     *
     * @return mixed
     */
    public function grantRank($rank);

    /**
     * @param $ranks
     *
     * @return mixed
     */
    public function grantRanks($ranks);

    /**
     * @param $rank
     *
     * @return mixed
     */
    public function revokeRank($rank);

    /**
     * @param $ranks
     *
     * @return mixed
     */
    public function revokeRanks($ranks);

    /**
     * @return mixed
     */
    public function revokeAllRanks();

    /**
     * @param $ranks
     *
     * @return mixed
     */
    public function reGrantRanks($ranks);
}
