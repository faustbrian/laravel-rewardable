<?php

namespace DraperStudio\Rewardable\Models;

use DraperStudio\Database\Models\Model;

class Transaction extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta'];

    public function transactionable()
    {
        return $this->morphTo();
    }
}
