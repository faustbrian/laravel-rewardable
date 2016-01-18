<?php

namespace DraperStudio\Rewardable\Models;

use DraperStudio\Database\Models\Model;
use DraperStudio\Database\Traits\Models\PresentableTrait;
use DraperStudio\Rewardable\Presenters\BadgePresenter;
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
