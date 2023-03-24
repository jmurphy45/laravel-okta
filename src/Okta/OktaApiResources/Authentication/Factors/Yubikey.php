<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors;

class Yubikey implements FactorTypeInterface
{
    private $passCode;

    public function __construct(string $passCode)
    {
        $this->passCode = $passCode;
    }

    public function getProvider(): string
    {
        return 'YUBICO';
    }

    public function getFactorType(): string
    {
        return 'token:hardware';
    }

    /**
     * @throws \Exception
     */
    public function getProfile(): array
    {
       throw new \Exception('Method is not supported.');
    }

    public function getPayload(?string $stateToken): array
    {
        return [
            'stateToken' => $stateToken,
            'factorToken' => $this->getFactorType(),
            'provider' => $this->getProvider(),
            'passCode' => $this->passCode,
        ];
    }
}