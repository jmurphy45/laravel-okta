<?php

namespace Jmurphy\LaravelOkta\Tests;

use Illuminate\Support\Facades\Http;
use Jmurphy\LaravelOkta\Okta\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    private $httpClient;

    public function test__construct()
    {
        $this->httpClient = new Client(Http::getFacadeRoot());
    }

    public function testAddAuthorizationHeader()
    {
        $this->httpClient->addAuthorizationHeader('TOKEN_TEST');
        $this->assertArrayHasKey('Authorization',$this->httpClient->getHeaders());
    }

    public function testGet()
    {

    }

    public function testAddHeaders()
    {

    }
}
