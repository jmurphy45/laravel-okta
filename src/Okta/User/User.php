<?php

namespace Jmurphy\LaravelOkta\Okta\User;

use Jmurphy\LaravelOkta\Okta\Entities\User\UserClient;
use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class OktaUser
{
    private $httpClient;

    public function __construct(HttpClientAdapterInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return HttpClientAdapterInterface
     */
    public function getHttpClient(): HttpClientAdapterInterface
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