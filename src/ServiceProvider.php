<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Rewardable;

use Cviebrock\EloquentSluggable\SluggableServiceProvider;

/**
 * Class ServiceProvider.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class ServiceProvider extends \DraperStudio\ServiceProvider\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishMigrations();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        parent::register();

        $this->app->register(SluggableServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_merge(parent::provides(), [
            SluggableServiceProvider::class,
        ]);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return 'rewardable';
    }
}
