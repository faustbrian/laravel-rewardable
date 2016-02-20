<?php

namespace DraperStudio\Rewardable\Credits;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DraperStudio\Database\Models\Model;
use DraperStudio\Database\Traits\Models\PresentableTrait;

/**
 * Class CreditType.
 */
class CreditType extends Model implements SluggableInterface
{
    use SluggableTrait;
    use PresentableTrait;

    /**
     * @var array
     */
    protected $sluggable = ['build_from' => 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    /**
     * @return mixed
     */
    public function getPresenterClass()
    {
        return CreditTypePresenter::class;
    }
}
