<?php

namespace BrianFaust\Rewardable\Badges;

use BrianFaust\Eloquent\Models\Model;
use BrianFaust\Eloquent\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Badge extends Model implements HasMedia
{
    use HasMediaTrait;
    use PresentableTrait;

    protected $dates = ['awarded_at', 'revoked_at'];

    public function badgeable()
    {
        return $this->morphTo();
    }

    public function requirementType()
    {
        return $this->belongsTo(CreditType::class, 'requirement_type_id');
    }

    public function getPresenterClass()
    {
        return BadgePresenter::class;
    }
}
