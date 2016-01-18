<?php

namespace DraperStudio\Rewardable\Repositories;

use Carbon\Carbon;
use DraperStudio\Rewardable\Models\Credit;
use DraperStudio\Rewardable\Models\CreditType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreditRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getTotalCredit()
    {
        return $this->model->credits()->sum('amount');
    }

    public function getTotalCreditByType($typeId)
    {
        $type = CreditType::find($typeId);

        return $this->model
                    ->credits()
                    ->where('credit_type_id', '=', $type->id)
                    ->sum('amount');
    }

    public function getBalance()
    {
        $transactions = $this->model->transactions()->sum('amount');
        $credits = $this->getTotalCredit();

        return $credits - $transactions;
    }

    public function getBalanceByType($typeId)
    {
        $type = CreditType::find($typeId);

        $transactions = $this->model
                             ->transactions()
                             ->where('credit_type_id', '=', $type->id)
                             ->sum('amount');

        $credits = $this->getTotalCreditByType($type->id);

        return $credits - $transactions;
    }

    public function grantCredit($credit)
    {
        $credit = new Credit(array_merge(array_except($credit, ['type']), [
            'credit_type_id' => $credit['type']->id,
            'awarded_at' => Carbon::now(),
        ]));

        return $this->model->credits()->save($credit);
    }

    public function grantCredits($credits)
    {
        foreach ($credits as $credit) {
            $this->grantCredit($credit);
        }
    }

    public function revokeCredit($credit)
    {
        if (is_array($credit)) {
            $revokeReason = $credit['reason'];
            $credit = Credit::findOrFail($credit['model']->id);
        }

        if ($credit->count() && empty($credit->revoked_at)) {
            $credit->update([
                'revoke_reason' => $revokeReason,
                'revoked_at' => Carbon::now(),
            ]);
        }
    }

    public function revokeCredits($credits)
    {
        foreach ($credits as $credit) {
            $this->revokeCredit($credit);
        }
    }

    public function revokeAllCredits()
    {
        $this->model->credits()->sync([]);
    }

    public function reGrantCredits($credits)
    {
        $this->revokeAllCredits();
        $this->grantCredits($credits);
    }

    public function getPivot()
    {
        return DB::table($this->table)
                ->where('creditable_id', $this->creditable_id)
                ->where('creditable_type', $this->creditable_type)
                ->first();
    }

    private function getCreditPivotBuilder($id)
    {
        return DB::table($this->model->table)
                ->where('creditable_id', $this->model->id)
                ->where('creditable_type', get_called_class());
    }
}
