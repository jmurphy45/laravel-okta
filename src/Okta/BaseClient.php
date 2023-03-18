<?php

namespace Jmurphy\LaravelOkta\Okta;

use Illuminate\Support\Facades\App;
use Jmurphy\LaravelOkta\Okta\ConfigRepository as OktaConfigRepository;
use Jmurphy\LaravelOkta\Okta\Entities\User\UserClient;

class BaseClient
{
    private $oktaConfigRepository;
    protected $httpClientAdapter;

    public function __construct(
        HttpClientAdapterInterface $httpClientAdapter
    )
    {
        //dd ('config: ' . config('laravel-okta.okta_base_url'));
        $this->oktaConfigRepository = ConfigRepository::getInstance();
        $this->httpClientAdapter = $httpClientAdapter;
    }

    /**
     * @return OktaConfigRepository
     */
    public function getOktaConfigRepository(): OktaConfigRepository
    {
        return $this->oktaConfigRepository;
    }

    /**
     * @return string
     */
    protected function getAuthorizationHeader(): string
    {
        return 'SSWS ' . $this->getOktaConfigRepository()->getApiKey();
    }
}