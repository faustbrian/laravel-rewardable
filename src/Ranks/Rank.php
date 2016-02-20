<?php

namespace DraperStudio\Rewardable\Ranks;

use DraperStudio\Database\Models\Model;
use DraperStudio\Database\Traits\Models\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Rank.
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
