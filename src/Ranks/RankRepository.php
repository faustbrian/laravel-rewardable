<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Rewardable\Ranks;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use BrianFaust\Rewardable\Exceptions\InsufficientFundsException;
use BrianFaust\Rewardable\Exceptions\InvalidCreditTypeException;

class RankRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getRankPivot($id)
    {
        return $this->getRankPivotBuilder($id)->first();
    }

    public function getRanksPivot($type = null)
    {
        $query = DB::table('ranks_awarded')
                    ->where('rankable_id', $this->model->id);

        if (! empty($type)) {
            $query = $query->where('rankable_type', $type);
        }

        return $query->get();
    }

    public function grantRank(Rank $rank)
    {
        // Check if the type of credit exists
        $type = $rank->requirementType;

        if (! $type) {
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
        if (! $record) {
            $this->model->ranks()->attach($rank, [
                'awarded_at' => Carbon::now(),
            ]);

            return true;
        }
    }

    public function grantRanks(Collection $ranks)
    {
        foreach ($ranks as $rank) {
            $this->grantRank($rank);
        }
    }

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

    public function reGrantRanks($ranks)
    {
        $this->revokeAllRanks();
        $this->grantRanks($ranks);
    }

    private function getRankPivotBuilder($id)
    {
        return DB::table('ranks_awarded')
                ->where('rank_id', $id)
                ->where('rankable_id', $this->model->id)
                ->where('rankable_type', get_called_class());
    }
}
