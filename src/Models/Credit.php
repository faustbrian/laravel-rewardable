<?php

namespace DraperStudio\Rewardable\Models;

use DraperStudio\Database\Models\Model;
use DraperStudio\Database\Traits\Models\PresentableTrait;
use DraperStudio\Rewardable\Presenters\CreditPresenter;
use DraperStudio\Rewardable\Repositories\CreditRepository;

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
