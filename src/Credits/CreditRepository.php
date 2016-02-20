<?php

namespace DraperStudio\Rewardable\Credits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class CreditRepository.
 */
class CreditRepository
{
    /**
     * CreditRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getTotalCredit()
    {
        return $this->model->credits()->sum('amount');
    }

    /**
     * @param $typeId
     *
     * @return mixed
     */
    public function getTotalCreditByType($typeId)
    {
        $type = CreditType::find($typeId);

        return $this->model
                    ->credits()
                    ->where('credit_type_id', '=', $type->id)
                    ->sum('amount');
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        $transactions = $this->model->transactions()->sum('amount');
        $credits = $this->getTotalCredit();

        return $credits - $transactions;
    }

    /**
     * @param $typeId
     *
     * @return mixed
     */
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

    /**
     * @param Credit $credit
     *
     * @return mixed
     */
    public function grantCredit(Credit $credit)
    {
        $credit = new Credit(array_merge(array_except($credit->toArray(), ['type']), [
            'credit_type_id' => $credit['type']->id,
            'awarded_at' => Carbon::now(),
        ]));

        return $this->model->credits()->save($credit);
    }

    /**
     * @param Collection $credits
     */
    public function grantCredits(Collection $credits)
    {
        foreach ($credits as $credit) {
            $this->grantCredit($credit);
        }
    }

    /**
     * @param Credit $credit
     */
    public function revokeCredit(Credit $credit)
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

    /**
     * @param Collection $credits
     */
    public function revokeCredits(Collection $credits)
    {
        foreach ($credits as $credit) {
            $this->revokeCredit($credit);
        }
    }

    /**
     *
     */
    public function revokeAllCredits()
    {
        $this->model->credits()->sync([]);
    }

    /**
     * @param Collection $credits
     */
    public function reGrantCredits(Collection $credits)
    {
        $this->revokeAllCredits();
        $this->grantCredits($credits);
    }

    /**
     * @return mixed
     */
    public function getPivot()
    {
        return DB::table($this->table)
                ->where('creditable_id', $this->creditable_id)
                ->where('creditable_type', $this->creditable_type)
                ->first();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    private function getCreditPivotBuilder($id)
    {
        return DB::table($this->model->table)
                ->where('creditable_id', $this->model->id)
                ->where('creditable_type', get_called_class());
    }
}
