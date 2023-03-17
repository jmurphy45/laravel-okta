<?php

namespace Jmurphy\LaravelOkta\Okta\Entities\User;

use Illuminate\Support\Facades\App;
use Jmurphy\LaravelOkta\Okta\BaseClient;
use Jmurphy\LaravelOkta\Okta\ConfigRepository as OktaConfigRepository;
use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class UserClient extends BaseClient implements OktaUserClientInterface
{
    public function getUser($userId)
    {
        $url =  "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->get($url);
    }

    public function getUsers($queryParameters = [])
    {
        $url =  '/api/v1/users';

        if (!empty($queryParameters)) {
            $url .= '?' . http_build_query($queryParameters);
        }

        return $this->httpClientAdapter->get($url);
    }

    public function createUser($userData)
    {
        $url =  '/api/v1/users';

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'SSWS ' . $this->getOktaConfigRepository()->getApiKey(),
        ];

        return $this->httpClientAdapter->post($url, $userData,$headers);
    }

    public function updateUser($userId, $userData)
    {
        $url =  "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->put($url, $userData);
    }

    public function deleteUser($userId)
    {
        $url =  "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->delete($url);
    }

    //related resources
    public function getUserGroups($userId)
    {
        $url =  "/api/v1/users/{$userId}/groups";

        return $this->httpClientAdapter->get($url);
    }

    public function getUserApps($userId)
    {
        $url =  "/api/v1/users/{$userId}/appLinks";

        return $this->httpClientAdapter->get($url);
    }

    //life cycle operations
    public function suspendUser($userId)
    {
        $url =  "/api/v1/users/{$userId}/lifecycle/suspend";
        $data = [
            'suspendUser' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    public function unsuspendUser($userId)
    {
        $url =  "/api/v1/users/{$userId}/lifecycle/unsuspend";
        $data = [
            'unsuspendUser' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    public function deactivateUser($userId)
    {
        $url =  "/api/v1/users/{$userId}/lifecycle/deactivate";
        $data = [
            'deactivate' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    public function reactivateUser($userId)
    {
        $url =  "/api/v1/users/{$userId}/lifecycle/reactivate";
        $data = [
            'reactivate' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    //user session
    public function getUserSessions($userId)
    {
        $url =  "/api/v1/users/{$userId}/sessions";

        return $this->httpClientAdapter->get($url);
    }

    public function revokeUserSession($userId, $sessionId)
    {
        $url =  "/api/v1/users/{$userId}/sessions/{$sessionId}";

        return $this->httpClientAdapter->delete($url);
    }

    public function listUserCredentials($userId)
    {
        $url =  "/api/v1/users/{$userId}/credentials";

        return $this->httpClientAdapter->get($url);
    }

    public function addUserCredential($userId, $credentialData)
    {
        $url =  "/api/v1/users/{$userId}/credentials";

        return $this->httpClientAdapter->post($url, $credentialData);
    }

    public function updateUserCredential($userId, $credentialId, $credentialData)
    {
        $url =  "/api/v1/users/{$userId}/credentials/{$credentialId}";

        return $this->httpClientAdapter->post($url, $credentialData);
    }

    public function deleteUserCredential($userId, $credentialId)
    {
        $url =  "/api/v1/users/{$userId}/credentials/{$credentialId}";

        return $this->httpClientAdapter->delete($url);
    }

}

