<?php

namespace DraperStudio\Rewardable\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DraperStudio\Database\Models\Model;
use DraperStudio\Database\Traits\Models\PresentableTrait;
use DraperStudio\Rewardable\Presenters\CreditTypePresenter;

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
