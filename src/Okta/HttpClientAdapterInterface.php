<?php

namespace Jmurphy\LaravelOkta\Okta;

use Illuminate\Http\Client\Response;

interface HttpClientAdapterInterface
{
    public function redirect($url,$queryParams);

    /**
     * Send a GET request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function get($url, $options = [], $headers = []);

    /**
     * Send a POST request.
     *
     * @param string $url The URL to send the request to.
     * * @param array $data An array of request options.
     * @param array $options An array of request options.
     * @return mixed The response body.
     */
    public function post(string $url, array $options = [], array $data = [], array $headers = []);

    /**
     * Send a PUT request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options An array of request options.
     * @param array $data
     * @return mixed The response body.
     */
    public function put($url, array $options = [], array $data = [], array $headers = []);

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
    public function delete($url, $queryParameters = [], $data = [], $headers = []);
}

