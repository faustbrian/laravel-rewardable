<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable\Transactions;

use DraperStudio\Eloquent\Models\Model;

/**
 * Class Transaction.
 *
 * @author DraperStudio <hello@draperstudio.tech>
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
