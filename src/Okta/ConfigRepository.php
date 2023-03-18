<?php

namespace Jmurphy\LaravelOkta\Okta;

final class ConfigRepository
{
    private static $instance = null;

//    private $baseUrl;
//    private $apiKey;
        private $config;

    private function __construct(
//        string $baseUrl,
//        string $apiKey
    )
    {
//        $this->baseUrl = $baseUrl;
//        $this->apiKey = $apiKey;
        $this->config = config('laravel-okta');
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new ConfigRepository();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->config['okta_base_url'];
    }

    /**
     * @return mixed
     */
    public function getApiKey(): string
    {
        return $this->config['okta_api_token'];
    }
}