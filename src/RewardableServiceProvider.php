<?php

namespace BrianFaust\Rewardable;

use BrianFaust\ServiceProvider\ServiceProvider;

class RewardableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();
    }

    public function getPackageName()
    {
        return 'rewardable';
    }
}
