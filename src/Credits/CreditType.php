<?php

namespace BrianFaust\Rewardable\Credits;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use BrianFaust\Eloquent\Model;
use BrianFaust\Eloquent\Presenter\PresentableTrait;

class CreditType extends Model
{
    use HasSlug;
    use PresentableTrait;

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function getPresenterClass()
    {
        return CreditTypePresenter::class;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
