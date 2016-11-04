<?php

namespace BrianFaust\Rewardable;

use Cviebrock\EloquentSluggable\SluggableServiceProvider;

class ServiceProvider extends \BrianFaust\ServiceProvider\ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();
    }

    public function register()
    {
        parent::register();

        $this->app->register(SluggableServiceProvider::class);
    }

    public function provides()
    {
        return array_merge(parent::provides(), [
            SluggableServiceProvider::class,
        ]);
    }

    public function getPackageName()
    {
        return 'rewardable';
    }
}
