<?php

namespace DraperStudio\Rewardable\Contracts;

interface Transactionable
{
    public function chargeCredits($amount);
}
