<?php

namespace Jmurphy\LaravelOkta;

use Jmurphy\LaravelOkta\Okta\Entities\User\UserClient;
use Jmurphy\LaravelOkta\Okta\HttpAdapter\LaravelHttpFacadeAdapter;

class LaravelOkta
{
    // Build your next great package.
    /**
     * @var
     */
    private $httpClientAdapter;

    public function __construct()
    {
        // create an instance of your adapter class
        $httpClientAdapter = new LaravelHttpFacadeAdapter();

    }

    public function user()
    {
        return new UserClient($this->getHttpClientAdapter());
    }

    /**
     * @return mixed
     */
    public function getHttpClientAdapter()
    {
        return $this->httpClientAdapter;
    }
}
