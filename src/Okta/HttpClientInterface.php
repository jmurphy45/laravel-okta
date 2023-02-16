<?php

namespace Jmurphy\LaravelOkta\Okta;

use Illuminate\Http\Client\Response;

interface HttpClientInterface
{
    public function addAuthorizationHeader(string $token): Client;

    public function addHeaders(array $headers): Client;

    /**
     * @param string $url
     * @param array|string|null $query
     * @return void
     */
    public function get(string $url, $query = null): Response;

    public function getHttpClient(): HttpClientInterface;
}