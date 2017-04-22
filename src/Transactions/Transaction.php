<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable\Transactions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta' => 'array'];

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }
}
