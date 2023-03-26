<?php

namespace Jmurphy\LaravelOkta\Models;

use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends GenericUser
{
    public function getAuthIdentifierName()
    {
        return config('laravel-okta.auth.okta_provider_id_column');
    }

    /**
     * Get the password for the user.
     *
     * @return string
     * @throws \Exception
     */
    public function getAuthPassword()
    {
        throw new \Exception('Method is not supported');
    }

    /**
     * Get the "remember me" token value.
     *
     * @return string
     * @throws \Exception
     */
    public function getRememberToken()
    {
        throw new \Exception('Method is not supported');
    }

    /**
     * Set the "remember me" token value.
     *
     * @param string $value
     * @return void
     * @throws \Exception
     */
    public function setRememberToken($value)
    {
        throw new \Exception('Method is not supported');
    }
}