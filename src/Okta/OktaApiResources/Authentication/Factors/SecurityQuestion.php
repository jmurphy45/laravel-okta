<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\Factors;

/**
 *
 */
final class SecurityQuestion implements FactorTypeInterface
{

    /**
     * Security Question of the factor
     *
     * @var string $securityQuestion
     */
    private $securityQuestion;

    /**
     * Security Answer of the factor
     *
     * @var string $securityAnswer
     */
    private $securityAnswer;

    /**
     * @param string $securityQuestion
     * @param string $securityAnswer
     */
    public function __construct(string $securityQuestion, string $securityAnswer)
    {
        $this->securityQuestion = $securityQuestion;
        $this->securityAnswer = $securityAnswer;
    }


    public function getProvider(): string
    {
       return 'OKTA';
    }


    public function getFactorType(): string
    {
        return 'question';
    }


    public function getProfile(): array
    {
        return [
            'question' => $this->securityQuestion,
            'answer' => $this->securityAnswer,
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