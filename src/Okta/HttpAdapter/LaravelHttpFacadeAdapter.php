<?php

namespace Jmurphy\LaravelOkta\Okta\HttpAdapter;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Jmurphy\LaravelOkta\Okta\ClientAdapter;
use Jmurphy\LaravelOkta\Okta\ConfigRepository as OktaConfigRepository;
use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class LaravelHttpFacadeAdapter implements \Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface
{
    private $oktaConfigRepository;

    /**
     * @return mixed
     */
    public function getOktaConfigRepository()
    {
        return $this->oktaConfigRepository;
    }


    public function __construct()
    {
        $this->oktaConfigRepository = App::make(OktaConfigRepository::class);
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
        $response = Http::get($this->generateUrl($url), $options);

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
        $response = Http::post($this->generateUrl($url), $data, $options);

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
        $response = Http::delete($this->generateUrl($url), $data);

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

    /**
     * @param string $path
     * @return string
     */
    private function generateUrl(string $path): string
    {
        return  $this->getOktaConfigRepository()->getBaseUrl() .  $path;
    }
}