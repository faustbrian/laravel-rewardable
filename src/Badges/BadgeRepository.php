<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Badges;

use Carbon\Carbon;
use DraperStudio\Rewardable\Exceptions\InsufficientFundsException;
use DraperStudio\Rewardable\Exceptions\InvalidCreditTypeException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class BadgeRepository.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class BadgeRepository
{
    /**
     * BadgeRepository constructor.
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
    public function getBadgePivot($id)
    {
        return $this->getBadgePivotBuilder($id)->first();
    }

    /**
     * @param null $type
     *
     * @return mixed
     */
    public function getBadgesPivot($type = null)
    {
        $query = DB::table('badges_awarded')
                    ->where('badgeable_id', $this->model->id);

        if (!empty($type)) {
            $query = $query->where('badgeable_type', $type);
        }

        return $query->get();
    }

    /**
     * @param Badge $badge
     *
     * @return bool
     *
     * @throws InsufficientFundsException
     * @throws InvalidCreditTypeException
     */
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

    /**
     * @param Collection $badges
     *
     * @throws InsufficientFundsException
     * @throws InvalidCreditTypeException
     */
    public function grantBadges(Collection $badges)
    {
        foreach ($badges as $badge) {
            $this->grantBadge($badge);
        }
    }

    /**
     * @param Badge $badge
     */
    public function revokeBadge(Badge $badge)
    {
        if (is_array($badge)) {
            $revokeReason = $badge['reason'];
            $badge = Badge::findOrFail($badge['model']->id);
        }

        if ($badge->count() && empty($badge->revoked_at)) {
            $this->getBadgePivotBuilder($badge->id)->update([
                'revoke_reason' => $revokeReason,
                'revoked_at' => Carbon::now(),
            ]);
        }
    }

    /**
     * @param Collection $badges
     */
    public function revokeBadges(Collection $badges)
    {
        foreach ($badges as $badge) {
            $this->revokeBadge($badge);
        }
    }

    /**
     *
     */
    public function revokeAllBadges()
    {
        $this->model->badges()->sync([]);
    }

    /**
     * @param Collection $badges
     */
    public function reGrantBadges(Collection $badges)
    {
        $this->revokeAllBadges();
        $this->grantBadges($badges);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    private function getBadgePivotBuilder($id)
    {
        return DB::table('badges_awarded')
                ->where('badge_id', $id)
                ->where('badgeable_id', $this->model->id)
                ->where('badgeable_type', get_called_class());
    }
}
