<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'okta_base_url' => env('OKTA_BASE_URL'),
    'okta_api_token' => env('OKTA_API_TOKEN'),

    'auth' => [
        'okta_provider_id_column' => 'okta_provider_id',
        'user_provider_model' => \Jmurphy\LaravelOkta\Models\User::class
    ]
];