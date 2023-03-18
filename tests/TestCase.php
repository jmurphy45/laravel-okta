<?php

namespace Jmurphy\LaravelOkta\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Jmurphy\LaravelOkta\LaravelOktaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            LaravelOktaServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('laravel-okta.okta_base_url', 'https://okta.com');
        $app['config']->set('permission.laravel-okta.okta_api_token', 'token');
    }
}
