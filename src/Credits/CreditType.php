<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Credits;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DraperStudio\Eloquent\Models\Model;
use DraperStudio\Eloquent\Presenter\PresentableTrait;

/**
 * Class CreditType.
 *
 * @author DraperStudio <hello@draperstudio.tech>
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
