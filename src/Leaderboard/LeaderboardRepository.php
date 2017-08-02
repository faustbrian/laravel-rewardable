<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Rewardable\Leaderboard;

use Illuminate\Database\Eloquent\Model;

class LeaderboardRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function createOrUpdate($model)
    {
        // calculate the experience
        $experience = $this->calculateExperience($model);

        // data for create and update
        $data = [
            'boardable_id' => $model->id,
            'boardable_type' => get_class($model),
            // 'position' => $position,
            'experience' => $experience,
        ];

        // check if the model is already in the leaderboard
        $record = $this->model->where('boardable_id', $model->id)
                              ->where('boardable_type', get_class($model));

        // there already is a record, so we update the data
        if ($record->count()) {
            $record->update($data);

            $record = $record->first();
        } else {
            // create a new entry in the leaderboard
            $record = $this->model->create($data);
        }

        // re-calculate all positions
        $this->calculatePositions();

        return $record;
    }

    private function calculateExperience($model)
    {
        $points = $model->getCredit();
        $badges = $model->badges()->count();
        $ranks = $model->ranks()->count();

        if (! $badges) {
            $badges = 1;
        }

        if (! $ranks) {
            $ranks = 1;
        }

        return $points * $badges * $ranks / 100;
    }

    public function calculatePositions()
    {
        $records = $this->model->orderBy('experience', 'DESC')->get();

        foreach ($records as $key => $value) {
            $value->update([
                'position' => $key + 1,
            ]);
        }
    }
}
