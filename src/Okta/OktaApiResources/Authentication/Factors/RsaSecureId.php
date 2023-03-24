<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors;

class RsaSecureId implements FactorTypeInterface
{
    private $credentialId;
    private $passCode;

    public function __construct(string $credentialId, string $passCode)
    {
        $this->credentialId = $credentialId;
        $this->passCode = $passCode;
    }

    public function getProvider(): string
    {
        return 'RSA';
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
            'passCode' => $this->passCode
        ];
    }
}