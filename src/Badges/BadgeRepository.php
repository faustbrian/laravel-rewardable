<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Rewardable\Badges;

use Artisanry\Rewardable\Exceptions\InsufficientFundsException;
use Artisanry\Rewardable\Exceptions\InvalidCreditTypeException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BadgeRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getBadgePivot($id)
    {
        return $this->getBadgePivotBuilder($id)->first();
    }

    public function getBadgesPivot($type = null)
    {
        $query = DB::table('badges_awarded')
                    ->where('badgeable_id', $this->model->id);

        if (!empty($type)) {
            $query = $query->where('badgeable_type', $type);
        }

        return $query->get();
    }

    public function grantBadge(Badge $badge)
    {
        // Check if the type of credit exists
        $type = $badge->requirementType;

        if (!$type) {
            throw new InvalidCreditTypeException($badge->requirement_type_id);
        }

        // check if the Model has sufficient credit to earn this badge
        if ($this->model->getCreditByType($type->id) < $badge->requirement) {
            throw new InsufficientFundsException(
                $this->model, $this->model->id,
                $this->model->getCreditByType($type->id) - $badge->requirement
            );
        }

        // If enough credit is there and the badge hasn't been awarded yet
        $record = $this->model->badges()
                              ->where('badge_id', '=', $badge->id)
                              ->count();
        if (!$record) {
            $this->model->badges()->attach($badge, [
                'awarded_at' => Carbon::now(),
            ]);

            return true;
        }
    }

    public function grantBadges(Collection $badges)
    {
        foreach ($badges as $badge) {
            $this->grantBadge($badge);
        }
    }

    public function revokeBadge(Badge $badge)
    {
        if (is_array($badge)) {
            $revokeReason = $badge['reason'];
            $badge = Badge::findOrFail($badge['model']->id);
        }

        if ($badge->count() && empty($badge->revoked_at)) {
            $this->getBadgePivotBuilder($badge->id)->update([
                'revoke_reason' => $revokeReason,
                'revoked_at'    => Carbon::now(),
            ]);
        }
    }

    public function revokeBadges(Collection $badges)
    {
        foreach ($badges as $badge) {
            $this->revokeBadge($badge);
        }
    }

    public function revokeAllBadges()
    {
        $this->model->badges()->sync([]);
    }

    public function reGrantBadges(Collection $badges)
    {
        $this->revokeAllBadges();
        $this->grantBadges($badges);
    }

    private function getBadgePivotBuilder($id)
    {
        return DB::table('badges_awarded')
                ->where('badge_id', $id)
                ->where('badgeable_id', $this->model->id)
                ->where('badgeable_type', get_called_class());
    }
}
