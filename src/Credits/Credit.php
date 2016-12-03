<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Rewardable\Credits;

use BrianFaust\Eloquent\Model;
use BrianFaust\Eloquent\Presenter\PresentableTrait;
use BrianFaust\Rewardable\Repositories\CreditRepository;

class Credit extends Model
{
    use PresentableTrait;

    protected $dates = ['awarded_at', 'revoked_at'];

    protected $casts = ['meta' => 'array'];

    public function creditable()
    {
        return $this->morphTo('creditable');
    }

    public function type()
    {
        return $this->belongsTo(CreditType::class, 'credit_type_id');
    }

    public function scopeWhereType($query, $type)
    {
        return $query->join('credit_types', 'credits.credit_type_id', '=', 'credit_types.id')
                     ->where('credit_types.name', $type)
                     ->select('credits.*');
    }

    public function getPivot()
    {
        return (new CreditRepository($this))->getPivot();
    }

    public function getPresenterClass()
    {
        return CreditPresenter::class;
    }
}
