<?php

namespace BrianFaust\Tests\Rewardable;

use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return \BrianFaust\Rewardable\ServiceProvider::class;
    }
}
