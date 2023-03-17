<?php

namespace Jmurphy\LaravelOkta\Okta\Entities\User;

interface OktaUserClientInterface
{
    public function getUser($userId);

    public function getUsers($queryParameters = []);

    public function createUser($userData);

    public function updateUser($userId, $userData);

    public function deleteUser($userId);

    public function getUserGroups($userId);

    public function getUserApps($userId);

    public function suspendUser($userId);

    public function unsuspendUser($userId);

    public function deactivateUser($userId);

    public function reactivateUser($userId);

    public function getUserSessions($userId);

    public function revokeUserSession($userId, $sessionId);

    public function listUserCredentials($userId);

    public function addUserCredential($userId, $credentialData);

    public function updateUserCredential($userId, $credentialId, $credentialData);

    public function deleteUserCredential($userId, $credentialId);
}