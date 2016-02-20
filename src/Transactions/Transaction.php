<?php

namespace DraperStudio\Rewardable\Transactions;

use DraperStudio\Database\Models\Model;

/**
 * Class Transaction.
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $casts = ['meta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function transactionable()
    {
        return $this->morphTo();
    }
}
