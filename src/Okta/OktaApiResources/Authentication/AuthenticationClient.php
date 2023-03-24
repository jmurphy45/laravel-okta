<?php

namespace Jmurphy\LaravelOkta\Okta\Entities\Authentication;

use Jmurphy\LaravelOkta\Okta\BaseClient;

class AuthenticationClient extends BaseClient
{


    /**
     * @param string $userName
     * @param string $password
     * @param array $authOptions
     * @return mixed
     */
    public function authenticateUser(string $userName, string $password, array $authOptions = [], array $context = [])
    {
        $path = '/api/v1/authn';
        $headers = [
            'User-Agent' => 'Mozilla/5.0 (${systemInformation}) ${platform} (${platformDetails}) ${extensions}" '
        ];
        $requestBody = [
            'username' => $userName,
            'password' => $password,
            'options' => $authOptions
        ];
        return $this->httpClientAdapter->post($path,[],$requestBody, $headers);
    }
}