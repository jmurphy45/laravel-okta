<?php

namespace Jmurphy\LaravelOkta\Okta\HttpAdapter;

use Illuminate\Support\Facades\Http;
use Jmurphy\LaravelOkta\Okta\ConfigRepository;
use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class LaravelHttpFacadeAdapter implements HttpClientAdapterInterface
{
    private $oktaConfigRepository;

    public function __construct()
    {
        $this->oktaConfigRepository = ConfigRepository::getInstance();
    }

    private function mergeHeaders(array $headers): array
    {
        return array_merge($headers, $this->getBaseHeaders());
    }

    /**
     * @return string[]
     */
    private function getBaseHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'SSWS ' . $this->getOktaConfigRepository()->getApiKey(),
        ];
    }

    /**
     * @return mixed
     */
    public function getOktaConfigRepository()
    {
        return $this->oktaConfigRepository;
    }

    /**
     * @param string $path
     * @param array $queryParameters
     * @return string
     */
    private function generateUrl(string $path, array $queryParameters = []): string
    {
        if (!empty($queryParameters)) {
            $path .= '?' . http_build_query($queryParameters);
        }

        return $this->getOktaConfigRepository()->getBaseUrl() . $path;
    }

    public function redirect($url, $queryParams)
    {
        return Http::get($this->generateUrl($url),$queryParams);
    }

    /**
     * Send a GET request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function get($url, $options = [], $headers = [])
    {
        $response = Http::withHeaders($this->mergeHeaders($headers))
            ->get($this->generateUrl($url), $options);

        return $response->body();
    }

    /**
     * Send a POST request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function post($url, array $options = [], array $data = [], array $headers = [])
    {
        $response = Http::withHeaders($this->mergeHeaders($headers))
            ->post($this->generateUrl($url,$options), $data);

        return $response->body();
    }

    /**
     * Send a DELETE request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function delete($url, $queryParameters = [], $data = [], $headers = [])
    {
        $response = Http::withHeaders($this->mergeHeaders($headers))
            ->delete($this->generateUrl($url), $data);

        return $response->body();
    }

    /**
     * Send a PUT request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function put($url, $options = [], $data = [], $headers = [])
    {
        $response = Http::withHeaders($this->mergeHeaders($headers))
            ->post($this->generateUrl($url,$options), $data);

        return $response->body();
    }

    /**
     * Send a PATCH request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function patch($url, $options = [])
    {
        // TODO: Implement patch() method.
    }
}