<?php

namespace Jmurphy\LaravelOkta\Okta;

use Illuminate\Http\Client\Response;

interface HttpClientAdapterInterface
{
    /**
     * Send a GET request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function get($url, $options = []);

    /**
     * Send a POST request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function post($url, $options = []);

    /**
     * Send a PUT request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function put($url, $options = []);

    /**
     * Send a PATCH request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function patch($url, $options = []);

    /**
     * Send a DELETE request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function delete($url, $options = []);
}

