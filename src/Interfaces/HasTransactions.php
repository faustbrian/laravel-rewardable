<?php

namespace BrianFaust\Rewardable\Interfaces;

interface HasTransactions
{
    public function chargeCredits($amount);
}
