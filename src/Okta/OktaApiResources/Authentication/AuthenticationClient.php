<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication;

use Jmurphy\LaravelOkta\Okta\BaseClient;
use Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors\FactorTypeInterface;
use Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors\SecurityQuestion;

class AuthenticationClient extends BaseClient
{


    /**
     * @param array $authOptions
     * @return mixed
     */
    public function authenticateUser(array $authOptions = [])
    {
        $path = '/api/v1/authn';
        return $this->httpClientAdapter->post($path,[],$authOptions);
    }

    public function changePassword($newPassword,$oldPassword,$stateToken)
    {
        $path = '/api/v1/authn/credentials/change_password';
        return $this->httpClientAdapter->post($path,[],[
            'newPassword' => $newPassword,
            'oldPassword' => $oldPassword,
            'stateToken' => $stateToken
        ]);
    }
    public function enrollFactor(FactorTypeInterface $factorType, string $stateToken)
    {
        $headers = [
            'User-Agent' => ''
        ];
        return $this->httpClientAdapter->post('/api/v1/authn/factors',[],$factorType->getPayload($stateToken),$headers);
    }

    public function activateSmsFactor(string $factorId,string $passCode, string $stateToken)
    {
        $path = $this->factorActivationPath($factorId);
        $headers = [
            'User-Agent' => ''
        ];
        return $this->httpClientAdapter->post($path,[],[
            'passCode' => $passCode,
            'stateToken' => $stateToken,
        ],$headers);
    }

    public function activateCallFactor(string $factorId,string $passCode, string $stateToken)
    {
        $path = $this->factorActivationPath($factorId);
        $headers = [
            'User-Agent' => ''
        ];
        return $this->httpClientAdapter->post($path,[],[
            'passCode' => $passCode,
            'stateToken' => $stateToken,
        ],$headers);
    }

    public function activateTokenSoftwareFactor(string $factorId,string $passCode, string $stateToken)
    {
        $path = $this->factorActivationPath($factorId);
        $headers = [
            'User-Agent' => ''
        ];
        return $this->httpClientAdapter->post($path,[],[
            'passCode' => $passCode,
            'stateToken' => $stateToken,
        ],$headers);
    }

    public function activateTotpFactor(string $factorId,string $passCode, string $stateToken)
    {
        $path = $this->factorActivationPath($factorId);
        $headers = [
            'User-Agent' => ''
        ];
        return $this->httpClientAdapter->post($path,[],[
            'passCode' => $passCode,
            'stateToken' => $stateToken,
        ],$headers);
    }

    public function activateEmailFactor(string $factorId,string $passCode, string $stateToken)
    {
        $path = $this->factorActivationPath($factorId);
        $headers = [
            'User-Agent' => ''
        ];
        return $this->httpClientAdapter->post($path,[],[
            'passCode' => $passCode,
            'stateToken' => $stateToken,
        ],$headers);
    }

    public function activatePushFactor(string $factorId, string $stateToken)
    {
        $path = $this->factorActivationPath($factorId);
        $headers = [
            'User-Agent' => ''
        ];
        return $this->httpClientAdapter->post($path,[],[
            'stateToken' => $stateToken,
        ],$headers);
    }
    
    public function verifyFactor()
    {

    }





























    public function forgotPassword()
    {

    }

    public function unlockAccount()
    {

    }

    public function verifyRecoveryFactor()
    {

    }

    public function verifyRecoveryToken()
    {

    }

    public function answerRecoveryQuestion()
    {

    }

    public function resetPassword()
    {

    }

    /**
     * @param string $factorId
     * @return string
     */
    private function factorActivationPath(string $factorId): string
    {
        return "/api/v1/authn/factors/${factorId}/lifecycle/activate";
    }


}