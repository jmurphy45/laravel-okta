<?php

namespace Jmurphy\LaravelOkta\Okta;

use Illuminate\Http\Client\Response;

interface HttpClientAdapterInterface
{
    public function get($url, $options = []);

    public function post($url, $data = [], $options = []);
}