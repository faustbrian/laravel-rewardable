<?php

namespace DraperStudio\Rewardable\Badges;

use DraperStudio\Database\Models\Model;
use DraperStudio\Database\Traits\Models\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Badge.
 */
class Badge extends Model implements HasMedia
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
    public function badgeable()
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
        return BadgePresenter::class;
    }
}
