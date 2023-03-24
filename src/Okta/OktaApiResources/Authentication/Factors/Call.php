<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors;

class Call implements FactorTypeInterface
{
    private $phoneNumber;

    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getProvider(): string
    {
        return 'OKTA';
    }

    public function getFactorType(): string
    {
       return 'call';
    }

    public function getProfile(): array
    {
        return [
            'phoneNumber' => $this->phoneNumber
        ];
    }

    public function getPayload(?string $stateToken): array
    {
        return [
            'stateToken' => $stateToken,
            'factorToken' => $this->getFactorType(),
            'provider' => $this->getProvider(),
            'profile' => $this->getProfile()
        ];
    }
}