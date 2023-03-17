<?php

namespace Jmurphy\LaravelOkta\Okta;

final class ConfigRepository
{
    private $baseUrl;
    private $apiKey;

    public function __construct(
        string $baseUrl,
        string $apiKey
    )
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $this->apiKey;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}