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

use DraperStudio\Eloquent\Models\Model;
use DraperStudio\Eloquent\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Rank.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Rank extends Model implements HasMedia
{
    use HasMediaTrait;
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['awarded_at', 'revoked_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function rankable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requirementType()
    {
        return $this->belongsTo(CreditType::class, 'requirement_type_id');
    }

    /**
     * @return mixed
     */
    public function getPresenterClass()
    {
        return RankPresenter::class;
    }
}
