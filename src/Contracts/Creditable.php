<?php

namespace BrianFaust\Rewardable\Contracts;

interface Creditable
{
    public function credits();

    public function getCredit();

    public function getCreditByType($type);

    public function getBalance();

    public function getBalanceByType($type);

    public function getSpendCredits();

    public function grantCredit($credit);

    public function grantCredits($credits);

    public function revokeCredit($credit);

    public function revokeCredits($credits);

    public function revokeAllCredits();

    public function reGrantCredits($credits);
}
