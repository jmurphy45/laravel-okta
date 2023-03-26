<?php

namespace Jmurphy\LaravelOkta;

use Jmurphy\LaravelOkta\Okta\HttpAdapter\LaravelHttpFacadeAdapter;
use Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\AuthenticationClient;

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
        $this->httpClientAdapter = new LaravelHttpFacadeAdapter();
    }

    public function user(): Okta\OktaApiResources\User\UserClient
    {
        return new Okta\OktaApiResources\User\UserClient($this->getHttpClientAdapter());
    }

    public function authentication(): AuthenticationClient
    {
        return new AuthenticationClient($this->getHttpClientAdapter());
    }

    /**
     * @return mixed
     */
    public function getHttpClientAdapter()
    {
        return $this->httpClientAdapter;
    }
}
