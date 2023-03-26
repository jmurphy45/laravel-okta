<?php

namespace Jmurphy\LaravelOkta\Okta\Auth;

use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Model;
use Jmurphy\LaravelOkta\LaravelOkta;
use Jmurphy\LaravelOkta\Okta\OktaApiResources\Authentication\AuthenticationClient;

class OktaUserProvider implements UserProvider
{

    /**
     * The active database connection.
     *
     * @var \Illuminate\Database\ConnectionInterface
     */
    protected $connection;

    /**
     * The table containing the users.
     *
     * @var string
     */
    protected $table;

    /**
     * The column of okta id.
     *
     * @var string
     */
    protected $oktaColumn;

    public function __construct(ConnectionInterface $connection,$table,$oktaColumn)
    {
        $this->connection = $connection;
        $this->table = $table;
        $this->oktaColumn = $oktaColumn;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        $user = $this->getUserModel($identifier);

        return $this->getGenericUser($user);
    }

    /**
     * @throws \Exception
     */
    public function retrieveByToken($identifier, $token)
    {
        throw new \Exception('Method is not supported');
    }

    /**
     * @throws \Exception
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        throw new \Exception('Method is not supported');
    }

    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
            (count($credentials) === 1 &&
                array_key_exists('password', $credentials))) {
            return;
        }

        $oktaAuthResponse = $this->getOktaAuthResponse($credentials);

        if($oktaAuthResponse->status > 200) return;

        return $this->getGenericUser(
            $this->getUserModel($oktaAuthResponse['_embedded']['user']['id'])
        );
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $oktaAuthResponse = $this->getOktaAuthResponse($credentials);

        return !($oktaAuthResponse->status > 200);
    }


    /**
     * Get the generic user.
     *
     * @param  mixed  $user
     * @return \Illuminate\Auth\GenericUser|null
     */
    protected function getGenericUser($user)
    {
        if (! is_null($user)) {
            return new GenericUser((array) $user);
        }
    }

    /**
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    private function getUserModel($id)
    {
        return $this->connection->table($this->table)
            ->where($this->oktaColumn, $id)
            ->first();
    }

    /**
     * @param array $credentials
     * @return mixed
     */
    private function getOktaAuthResponse(array $credentials)
    {
        return LaravelOkta::auth()->authenticateUser([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'options' => [
                'multiOptionalFactorEnroll' => false,
                'warnBeforePasswordExpired' => false
            ]
        ]);
    }
}