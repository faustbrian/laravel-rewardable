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

use DraperStudio\Eloquent\Models\Model;
use DraperStudio\Eloquent\Presenter\PresentableTrait;
use DraperStudio\Rewardable\Repositories\CreditRepository;

/**
 * Class Credit.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Credit extends Model
{
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['awarded_at', 'revoked_at'];

    /**
     * @var array
     */
    protected $casts = ['meta' => 'array'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function creditable()
    {
        return $this->morphTo('creditable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function reasonable()
    {
        return $this->morphTo('reasonable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(CreditType::class, 'credit_type_id');
    }

    /**
     * @param $query
     * @param $type
     *
     * @return mixed
     */
    public function scopeWhereType($query, $type)
    {
        return $query->join('credit_types', 'credits.credit_type_id', '=', 'credit_types.id')
                     ->where('credit_types.name', $type)
                     ->select('credits.*');
    }

    /**
     * @return mixed
     */
    public function getPivot()
    {
        return (new CreditRepository($this))->getPivot();
    }

    /**
     * @return mixed
     */
    public function getPresenterClass()
    {
        return CreditPresenter::class;
    }
}
