<?php

namespace Jmurphy\LaravelOkta\Okta\OktaApiResources\User;

interface OktaUserClientInterface
{
    /**
     * Get a single user by ID.
     *
     * @param string $userId The ID of the user to retrieve.
     * @return object The user object.
     */
    public function getUser(string $userId);

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
    public function deactivateUser($userId, bool $sendEmail);

    /**
     * Reactivate a user.
     *
     * @param string $userId The ID of the user to reactivate.
     * @return void
     */
    public function reactivateUser($userId, bool $sendEmail);

    /**
     * Revoke a user session.
     *
     * @param string $userId The ID of the user whose session to revoke.
     * @return void
     */
    public function revokeUserSession($userId);

    public function forgotPasswordLink(string $userId, bool $sendEmail);

    public function forgotPassword(string $userId, string $password, string $securityQuestionAnswer);

    public function changeRecoveryQuestion(string $userId, $password, $recoveryQuestion, $recoveryQuestionAnswer);
}