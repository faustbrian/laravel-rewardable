<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable\Credits;

use BrianFaust\Eloquent\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

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
