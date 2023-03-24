<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors;

interface FactorTypeInterface
{
    public function getProvider(): string;

    public function getFactorType(): string;

    public function getPayload(?string $stateToken): array;
}