<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Rewardable\Credits;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use BrianFaust\Eloquent\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreditType extends Model
{
    use HasSlug;
    use PresentableTrait;

    public function credits(): HasMany
    {
        return $this->hasMany(Credit::class);
    }

    public function getPresenterClass(): string
    {
        return CreditTypePresenter::class;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
