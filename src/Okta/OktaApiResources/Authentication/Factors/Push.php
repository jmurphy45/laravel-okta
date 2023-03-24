<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors;

class Push implements FactorTypeInterface
{

    public function getProvider(): string
    {
        return 'OKTA';
    }

    public function getFactorType(): string
    {
        return 'push';
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
        ];
    }
}