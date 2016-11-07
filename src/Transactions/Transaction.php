<?php

namespace BrianFaust\Rewardable\Transactions;

use BrianFaust\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta' => 'array'];

    public function transactionable()
    {
        return $this->morphTo();
    }
}
