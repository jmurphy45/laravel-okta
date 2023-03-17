<?php

namespace Jmurphy\LaravelOkta\Okta;

use Illuminate\Support\Facades\App;
use Jmurphy\LaravelOkta\Okta\ConfigRepository as OktaConfigRepository;

class BaseClient
{
    private $oktaConfigRepository;
    private $httpClientAdapter;

    public function __construct(
        HttpClientAdapterInterface $httpClientAdapter
    )
    {
        $this->oktaConfigRepository = App::make(OktaConfigRepository::class);
        $this->httpClientAdapter = $httpClientAdapter;
    }

    /**
     * @return OktaConfigRepository
     */
    public function getOktaConfigRepository(): OktaConfigRepository
    {
        return $this->oktaConfigRepository;
    }
}