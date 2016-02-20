<?php

namespace DraperStudio\Rewardable;

use Cviebrock\EloquentSluggable\SluggableServiceProvider;
use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends BaseProvider
{
    /**
     * @var string
     */
    protected $packageName = 'rewardable';

    /**
     *
     */
    public function boot()
    {
        $this->setup(__DIR__)->publishMigrations();
    }

    /**
     *
     */
    public function register()
    {
        $this->app->register(SluggableServiceProvider::class);
    }
}
