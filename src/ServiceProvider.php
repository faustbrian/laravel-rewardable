<?php

namespace DraperStudio\Rewardable;

use Cviebrock\EloquentSluggable\SluggableServiceProvider;
use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'rewardable';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }

    public function register()
    {
        $this->app->register(SluggableServiceProvider::class);
    }
}
