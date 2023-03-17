<?php

namespace Jmurphy\LaravelOkta\Okta\Entities\User;

interface OktaUserClientInterface
{
    /**
     * Get a single user by ID.
     *
     * @param string $userId The ID of the user to retrieve.
     * @return object The user object.
     */
    public function getUser($userId);

    /**
     * Get a list of all users in the Okta organization.
     *
     * @param array $queryParameters Optional query parameters to filter or search the list of users.
     * @return array An array of user objects.
     */
    public function getUsers($queryParameters = []);

    /**
     * Create a new user.
     *
     * @param array $userData An array of user data to create the new user.
     * @return object The newly created user object.
     */
    public function createUser($userData);

    /**
     * Update an existing user.
     *
     * @param string $userId The ID of the user to update.
     * @param array $userData An array of user data to update the user.
     * @return object The updated user object.
     */
    public function updateUser($userId, $userData);

    /**
     * Delete a user.
     *
     * @param string $userId The ID of the user to delete.
     * @return void
     */
    public function deleteUser($userId);

    /**
     * Get a list of groups that a user belongs to.
     *
     * @param string $userId The ID of the user to get groups for.
     * @return array An array of group objects.
     */
    public function getUserGroups($userId);

    /**
     * Get a list of applications assigned to a user.
     *
     * @param string $userId The ID of the user to get applications for.
     * @return array An array of application objects.
     */
    public function getUserApps($userId);

    /**
     * Suspend a user.
     *
     * @param string $userId The ID of the user to suspend.
     * @return void
     */
    public function suspendUser($userId);

    /**
     * Unsuspend a user.
     *
     * @param string $userId The ID of the user to unsuspend.
     * @return void
     */
    public function unsuspendUser($userId);

    /**
     * Deactivate a user.
     *
     * @param string $userId The ID of the user to deactivate.
     * @return void
     */
    public function deactivateUser($userId);

    /**
     * Reactivate a user.
     *
     * @param string $userId The ID of the user to reactivate.
     * @return void
     */
    public function reactivateUser($userId);

    /**
     * Get a list of sessions for a user.
     *
     * @param string $userId The ID of the user to get sessions for.
     * @return array An array of session objects.
     */
    public function getUserSessions($userId);

    /**
     * Revoke a user session.
     *
     * @param string $userId The ID of the user whose session to revoke.
     * @param string $sessionId The ID of the session to revoke.
     * @return void
     */
    public function revokeUserSession($userId, $sessionId);

    /**
     * Get a list of credentials for a user.
     *
     * @param string $userId The ID of the user to get credentials for.
     * @return array An array of credential objects.
     */
    public function listUserCredentials($userId);

    /**
     * Add a new credential for a user.
     *
     * @param string $userId The ID of the user to add the credential for.
     * @param array $credentialData An array of credential data to add.
     * @return object The newly added credential object.
     */
    public function addUserCredential($userId, $credentialData);

    /**
     * Update an existing credential for a user.
     *
     * @param string $userId The ID of the user who owns the credential.
     * @param string $credentialId The ID of the credential to update.
     * @param array $credentialData An array of credential data to update.
     * @return object The updated credential object.
     */
    public function updateUserCredential($userId, $credentialId, $credentialData);

    /**
     * Delete a credential for a user.
     *
     * @param string $userId The ID of the user who owns the credential.
     * @param string $credentialId The ID of the credential to delete.
     * @return void
     */
    public function deleteUserCredential($userId, $credentialId);
}