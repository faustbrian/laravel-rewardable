<?php

namespace BrianFaust\Rewardable\Contracts;

interface Transactionable
{
    public function chargeCredits($amount);
}
