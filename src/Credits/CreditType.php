<?php

namespace BrianFaust\Rewardable\Credits;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use BrianFaust\Eloquent\Models\Model;
use BrianFaust\Eloquent\Presenter\PresentableTrait;

class CreditType extends Model implements SluggableInterface
{
    use SluggableTrait;
    use PresentableTrait;

    protected $sluggable = ['build_from' => 'name'];

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function getPresenterClass()
    {
        return CreditTypePresenter::class;
    }
}
