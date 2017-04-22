<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable;

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class RewardableServiceProvider extends AbstractServiceProvider
{
    public function boot(): void
    {
        $this->publishMigrations();
    }

    public function getPackageName(): string
    {
        return 'rewardable';
    }
}
