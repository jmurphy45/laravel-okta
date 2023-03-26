<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\User;

use Jmurphy\LaravelOkta\Okta\BaseClient;

class UserClient extends BaseClient implements OktaUserClientInterface
{
    public function getUser(string $userId)
    {
        $url =  "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->get($url);
    }

    public function getUsers($queryParameters = [])
    {
        $url =  '/api/v1/users';

        return $this->httpClientAdapter->get($url, $queryParameters);
    }

    public function createUser($userData, array $queryParameters = [])
    {
        $url =  '/api/v1/users';

        return $this->httpClientAdapter->post($url,$queryParameters ,$userData);
    }

    public function updateUser($userId, $userData)
    {
        $url =  "/api/v1/users/{$userId}";

        return $this->httpClientAdapter->post($url, [], $userData);
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

        return $this->httpClientAdapter->post($url);
    }

    public function unsuspendUser($userId)
    {
        $url =  "/api/v1/users/{$userId}/lifecycle/unsuspend";

        return $this->httpClientAdapter->post($url);
    }

    public function deactivateUser($userId, bool $sendEmail)
    {
        $url =  "/api/v1/users/{$userId}/lifecycle/deactivate";

        return $this->httpClientAdapter->post($url,$sendEmail? ['sendEmail' => 'true'] : []);
    }

    public function reactivateUser($userId, bool $sendEmail)
    {
        $url =  "/api/v1/users/{$userId}/lifecycle/reactivate";

        return $this->httpClientAdapter->post($url, $sendEmail? ['sendEmail' => 'true'] : []);
    }

    //user session
    public function revokeUserSession($userId)
    {
        $url =  "/api/v1/users/{$userId}/sessions";

        return $this->httpClientAdapter->delete($url);
    }


    //credential operations

    /**
     * Generates a one-time token (OTT) that can be used to reset a user's password
     *
     * @param string $userId id of user
     * @param bool $sendEmail Sends a forgot password email to the user if true
     * @return mixed
     */
    public function forgotPasswordLink(string $userId, bool $sendEmail)
   {
       $url =  "/api/v1/users/{$userId}/credentials/forgot_password";

       return $this->httpClientAdapter->post($url,$sendEmail? ['sendEmail' => 'true'] : []);
   }

    public function forgotPassword(string $userId, string $password, string $securityQuestionAnswer)
    {
        $url =  "/api/v1/users/{$userId}/credentials/forgot_password";

        return $this->httpClientAdapter->post($url,[],[
            'password' => [
                "value" => $password
            ],
            "recovery_question" => [
                "answer" => $securityQuestionAnswer
            ]
        ]);
    }

    public function changeRecoveryQuestion(string $userId, $password, $recoveryQuestion, $recoveryQuestionAnswer)
    {
        $url =  "/api/v1/users/{$userId}/credentials/change_recovery_question";

        return $this->httpClientAdapter->post($url,[],[
            'password' => [
                "value" => $password
            ],
            "recovery_question" => [
                "question" => $recoveryQuestion,
                "answer" => $recoveryQuestionAnswer
            ]
        ]);
    }

}

