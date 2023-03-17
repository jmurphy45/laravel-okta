<?php

namespace Jmurphy\LaravelOkta\Okta\Entities\User;

use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;
use Jmurphy\LaravelOkta\Okta\User\OktaUser;

class UserClient implements OktaUserClientInterface
{
    private $httpClientAdapter;
    private $baseUrl;

    public function __construct(HttpClientAdapterInterface $httpClientAdapter)
    {
        $this->httpClientAdapter = $httpClientAdapter;
        $this->baseUrl = config('okta.baseUrl');
    }

    public function getUser($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->get($url);
    }

    public function getUsers($queryParameters = [])
    {
        $url = $this->baseUrl . '/api/v1/users';

        if (!empty($queryParameters)) {
            $url .= '?' . http_build_query($queryParameters);
        }

        return $this->httpClientAdapter->get($url);
    }

    public function createUser($userData)
    {
        $url = $this->baseUrl . '/api/v1/users';

        return $this->httpClientAdapter->post($url, $userData);
    }

    public function updateUser($userId, $userData)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->put($url, $userData);
    }

    public function deleteUser($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->delete($url);
    }

    //related resources
    public function getUserGroups($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/groups";

        return $this->httpClientAdapter->get($url);
    }

    public function getUserApps($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/appLinks";

        return $this->httpClientAdapter->get($url);
    }

    //life cycle operations
    public function suspendUser($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/lifecycle/suspend";
        $data = [
            'suspendUser' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    public function unsuspendUser($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/lifecycle/unsuspend";
        $data = [
            'unsuspendUser' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    public function deactivateUser($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/lifecycle/deactivate";
        $data = [
            'deactivate' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    public function reactivateUser($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/lifecycle/reactivate";
        $data = [
            'reactivate' => true
        ];

        return $this->httpClientAdapter->post($url, $data);
    }

    //user session
    public function getUserSessions($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/sessions";

        return $this->httpClientAdapter->get($url);
    }

    public function revokeUserSession($userId, $sessionId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/sessions/{$sessionId}";

        return $this->httpClientAdapter->delete($url);
    }

    public function listUserCredentials($userId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/credentials";

        return $this->httpClientAdapter->get($url);
    }

    public function addUserCredential($userId, $credentialData)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/credentials";

        return $this->httpClientAdapter->post($url, $credentialData);
    }

    public function updateUserCredential($userId, $credentialId, $credentialData)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/credentials/{$credentialId}";

        return $this->httpClientAdapter->post($url, $credentialData);
    }

    public function deleteUserCredential($userId, $credentialId)
    {
        $url = $this->baseUrl . "/api/v1/users/{$userId}/credentials/{$credentialId}";

        return $this->httpClientAdapter->delete($url);
    }
}

