<?php

namespace Jmurphy\LaravelOkta\Okta\User;

use Jmurphy\LaravelOkta\Okta\Entities\User\User;
use Jmurphy\LaravelOkta\Okta\HttpClientInterface;

class OktaUser
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return HttpClientInterface
     */
    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    public function getUserByID(string $userID): array
    {
        $response = $this->getHttpClient()
            ->addAuthorizationHeader(config('okta_api_token'))
            ->addHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->addAuthorizationHeader(config('okta_base_url'))
            ->get('/api/v1/users/' . $userID);
        return $response->json();
    }
}