<?php

namespace Jmurphy\LaravelOkta;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jmurphy\LaravelOkta\Skeleton\SkeletonClass
 */
class LaravelOktaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-okta';
    }
}
