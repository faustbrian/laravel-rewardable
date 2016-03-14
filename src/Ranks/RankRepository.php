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

use Carbon\Carbon;
use DraperStudio\Rewardable\Exceptions\InsufficientFundsException;
use DraperStudio\Rewardable\Exceptions\InvalidCreditTypeException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class RankRepository.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class RankRepository
{
    /**
     * RankRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getRankPivot($id)
    {
        return $this->getRankPivotBuilder($id)->first();
    }

    /**
     * @param null $type
     *
     * @return mixed
     */
    public function getRanksPivot($type = null)
    {
        $query = DB::table('ranks_awarded')
                    ->where('rankable_id', $this->model->id);

        if (!empty($type)) {
            $query = $query->where('rankable_type', $type);
        }

        return $query->get();
    }

    /**
     * @param Rank $rank
     *
     * @return bool
     *
     * @throws InsufficientFundsException
     * @throws InvalidCreditTypeException
     */
    public function grantRank(Rank $rank)
    {
        // Check if the type of credit exists
        $type = $rank->requirementType;

        if (!$type) {
            throw new InvalidCreditTypeException($rank->requirement_type_id);
        }

        // check if the Model has sufficient credit to earn this rank
        if ($this->model->getCreditByType($type->id) < $rank->requirement) {
            throw new InsufficientFundsException(
                $this->model, $this->model->id,
                $this->model->getCreditByType($type->id) - $rank->requirement
            );
        }

        // If enough credit is there and the rank hasn't been awarded yet
        $record = $this->model->ranks()
                              ->where('rank_id', '=', $rank->id)
                              ->count();
        if (!$record) {
            $this->model->ranks()->attach($rank, [
                'awarded_at' => Carbon::now(),
            ]);

            return true;
        }
    }

    /**
     * @param Collection $ranks
     *
     * @throws InsufficientFundsException
     * @throws InvalidCreditTypeException
     */
    public function grantRanks(Collection $ranks)
    {
        foreach ($ranks as $rank) {
            $this->grantRank($rank);
        }
    }

    /**
     * @param Rank $rank
     */
    public function revokeRank(Rank $rank)
    {
        if (is_array($rank)) {
            $revokeReason = $rank['reason'];
            $rank = Rank::findOrFail($rank['model']->id);
        }

        if ($rank->count() && empty($rank->revoked_at)) {
            $this->getRankPivotBuilder($rank->id)->update([
                'revoke_reason' => $revokeReason,
                'revoked_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * @param Collection $ranks
     */
    public function revokeRanks(Collection $ranks)
    {
        foreach ($ranks as $rank) {
            $this->revokeRank($rank);
        }
    }

    public function revokeAllRanks()
    {
        $this->model->ranks()->sync([]);
    }

    /**
     * @param $ranks
     */
    public function reGrantRanks($ranks)
    {
        $this->revokeAllRanks();
        $this->grantRanks($ranks);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    private function getRankPivotBuilder($id)
    {
        return DB::table('ranks_awarded')
                ->where('rank_id', $id)
                ->where('rankable_id', $this->model->id)
                ->where('rankable_type', get_called_class());
    }
}
