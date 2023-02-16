<?php

namespace Jmurphy\LaravelOkta\Okta;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\Response;

/**
 *
 */
class Client implements HttpClientInterface
{
    /**
     * @var Factory $httpClient An instance of HttpClient to use for communicating with Okta.
     */
    private $httpClient;

    private $headers = [];

    /**
     * @param Factory $httpClient
     */
    public function __construct(
        Factory $httpClient
    )
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return Factory
     */
    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param Factory $httpClient
     */
    public function setHttpClient(Factory $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function addAuthorizationHeader(string $token): Client
    {
        $this->addHeaders([
                'Authorization' => 'SSWS ' . $token
            ]);
        return $this;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function addHeaders(array $headers): Client
    {
       $this->headers = array_merge($this->getHeaders(),$headers);
        return $this;
    }

    /**
     * @param string $path
     * @return string
     */
    protected function parseRequestURl(string $path): string
    {
        return config('okta_base_url') . $path;
    }


    /**
     * @param string $url
     * @param array|string|null $query
     * @return void
     */
    public function get(string $url, $query = null): Response
    {
        return $this->getHttpClient()
            ->withHeaders($this->headers)
            ->get($this->parseRequestURl($url),$query);
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

}