<?php

namespace Jmurphy\LaravelOkta\Okta\HttpAdapter;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Jmurphy\LaravelOkta\Okta\ClientAdapter;
use Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface;

class LaravelHttpFacadeAdapter implements \Jmurphy\LaravelOkta\Okta\HttpClientAdapterInterface
{

    public function get($url, $options = [])
    {
        $response = Http::get($url, $options);

        return $response->body();
    }

    public function post($url, $data = [], $options = [])
    {
        $response = Http::post($url, $data, $options);

        return $response->body();
    }

    public function delete($url, $data = [])
    {
        $response = Http::delete($url, $data);

        return $response->body();
    }
}