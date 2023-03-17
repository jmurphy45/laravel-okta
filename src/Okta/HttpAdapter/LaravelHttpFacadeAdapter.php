<?php

namespace Jmurphy\LaravelOkta\Okta\HttpAdapter;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Jmurphy\LaravelOkta\Okta\ClientAdapter;
use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class LaravelHttpFacadeAdapter implements \Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface
{
    public function __construct()
    {
    }

    /**
     * Send a GET request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function get($url, $options = [])
    {
        $response = Http::get($url, $options);

        return $response->body();
    }

    /**
     * Send a POST request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function post($url, $data = [], $options = [])
    {
        $response = Http::post($url, $data, $options);

        return $response->body();
    }

    /**
     * Send a DELETE request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function delete($url, $data = [])
    {
        $response = Http::delete($url, $data);

        return $response->body();
    }

    /**
     * Send a PUT request using Laravel's HTTP kernel.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function put($url, $options = [])
    {
        // TODO: Implement put() method.
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