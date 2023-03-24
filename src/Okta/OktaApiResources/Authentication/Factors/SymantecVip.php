<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors;
//TODO need to refactor th other inputs
class SymantecVip implements FactorTypeInterface
{
    private $credentialId;
    private $passCode;
    private $nextPassCode;

    public function __construct(string $credentialId, string $passCode, string $nextPassCode)
    {
        $this->credentialId = $credentialId;
        $this->passCode = $passCode;
        $this->nextPassCode = $nextPassCode;
    }

    public function getProvider(): string
    {
        return 'SYMANTEC';
    }

    public function getFactorType(): string
    {
        return 'token';
    }

    public function getProfile(): array
    {
        return [
            'credentialId' => $this->credentialId
        ];
    }

    public function getPayload(?string $stateToken): array
    {
        return [
            'stateToken' => $stateToken,
            'factorToken' => $this->getFactorType(),
            'provider' => $this->getProvider(),
            'profile' => $this->getProfile(),
            'passCode' => $this->passCode,
            'nextPassCode' => $this->nextPassCode,
        ];
    }
}