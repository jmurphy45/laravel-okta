<?php

namespace Jmurphy\LaravelOkta\Okta\Entities\OpenID;

use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class OpenIDClient
{
    private $httpClientAdapter;
    private $baseUrl;

    public function __construct(HttpClientAdapterInterface $httpClientAdapter)
    {
        $this->httpClientAdapter = $httpClientAdapter;
        $this->baseUrl = config('okta.baseUrl');
    }

    /**
     * Get the user info for the specified access token.
     *
     * @param string $accessToken The access token.
     * @return mixed The user info.
     */
    public function getUserInfo($accessToken)
    {
        $url = $this->baseUrl . '/oauth2/v1/userinfo';
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json'
        ];
        $response = $this->getHttpClientAdapter()->get($url, $headers);

    }

    /**
     * Get the keys for the Okta authorization server.
     *
     * @return mixed The keys.
     */
    public function getKeys()
    {
        $url = $this->baseUrl . '/oauth2/v1/keys';
        $headers = [
            'Accept' => 'application/json'
        ];
        $response = $this->getHttpClientAdapter()->get($url, $headers);


    }

    /**
     * @return HttpClientAdapterInterface
     */
    public function getHttpClientAdapter(): HttpClientAdapterInterface
    {
        return $this->httpClientAdapter;
    }
}