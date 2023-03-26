<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\OpenID;

use Jmurphy\LaravelOkta\Okta\BaseClient;
use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class OpenIDClient extends BaseClient
{
    private $authorizationServer;

    public function __construct(HttpClientAdapterInterface $httpClientAdapter, string $authorizationServer = 'default')
    {
        parent::__construct($httpClientAdapter);
        $this->authorizationServer = $authorizationServer;
    }

    //TODO authorize path base off the okta endpoint documentation
    public function authorize(array $queryParameters)
    {
        $url = $this->getAuthorizationPath();
        return $this->getHttpClientAdapter()->redirect($url,array_merge([
            'client_id' => '',
            'redirect_uri' => '',
            'response_type' => '',
            'scope' => '',
            'state' => ''
        ],$queryParameters));
    }

    /**
     * Get the user info for the specified access token.
     *
     * @param string $accessToken The access token.
     * @return mixed The user info.
     */
    public function getUserInfo($accessToken)
    {
        $url =  '/oauth2/v1/userinfo';
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        return $this->getHttpClientAdapter()->get($url,[],$headers);
    }

    /**
     * Get the keys for the Okta authorization server.
     *
     * @return mixed The keys.
     */
    public function getKeys()
    {
        $url =  '/oauth2/v1/keys';

        return $this->getHttpClientAdapter()->get($url);
    }

    /**
     * @return HttpClientAdapterInterface
     */
    public function getHttpClientAdapter(): HttpClientAdapterInterface
    {
        return $this->httpClientAdapter;
    }

    /**
     * @return string
     */
    private function getAuthorizationPath(): string
    {
        $authorizationServer = $this->authorizationServer;
        return "/oauth2/${authorizationServer}/v1/authorize";
    }
}