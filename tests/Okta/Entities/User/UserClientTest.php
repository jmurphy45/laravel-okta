<?php

namespace Jmurphy\LaravelOkta\Tests\Okta\Entities\User;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Jmurphy\LaravelOkta\Okta\Entities\User\UserClient;
use Jmurphy\LaravelOkta\Okta\HttpAdapter\LaravelHttpFacadeAdapter;
use Jmurphy\LaravelOkta\Tests\TestCase;


class UserClientTest extends TestCase
{
    protected $userClient;

    public function testGetUser()
    {
        Http::fake();
        $this->userClient->getUser('testid');

        Http::assertSent(function (Request $request) {
            return $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'GET' &&
                strstr($request->url(), '/api/v1/users/testid');
        });
    }

    public function testGetUsers()
    {
        Http::fake();
        $this->userClient->getUsers();

        Http::assertSent(function (Request $request) {
            return $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'GET' &&
                strstr($request->url(), '/api/v1/users');
        });
    }

    public function testCreateUser()
    {
        Http::fake();
        $this->userClient->createUser(
            [
                "profile" => [
                    "firstName" => "John",
                    "lastName" => "Doe"
                ]
            ],
            [
                'active' => 'false'
            ]
        );

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users?active=false');
        });
    }

    public function testUpdateUser()
    {
        Http::fake();
        $this->userClient->updateUser(
            'testtoken',
            [
                "profile" => [
                    "firstName" => "John",
                    "lastName" => "Doe"
                ]
            ]
        );

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/testtoken');
        });
    }

    public function testDeleteUser()
    {
        Http::fake();
        $this->userClient->deleteUser('testtoken');

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'DELETE' &&
                strstr($request->url(), '/api/v1/users/testtoken');
        });
    }

    public function testGetUserGroups()
    {
        Http::fake();
        $this->userClient->getUserGroups('userid');

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'GET' &&
                strstr($request->url(), '/api/v1/users/userid/groups');
        });
    }

    public function testGetUserApps()
    {
        Http::fake();
        $this->userClient->getUserApps('userid');

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'GET' &&
                strstr($request->url(), '/api/v1/users/userid/appLinks');
        });
    }

    public function testSuspendUser()
    {
        Http::fake();
        $this->userClient->suspendUser('userid');

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/userid/lifecycle/suspend');
        });
    }

    public function testUnsuspendUser()
    {
        Http::fake();
        $this->userClient->unsuspendUser('userid');

        Http::assertSent(function (Request $request) {
            echo $request->url();
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/userid/lifecycle/unsuspend');
        });
    }

    public function testDeactivateUser()
    {
        Http::fake();
        $this->userClient->deactivateUser('userid',true);

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/userid/lifecycle/deactivate?sendEmail=true');
        });
    }

    public function testReactivateUser()
    {
        Http::fake();
        $this->userClient->reactivateUser('userid',true);

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/userid/lifecycle/reactivate?sendEmail=true');
        });
    }

    public function testRevokeUserSession()
    {
        Http::fake();
        $this->userClient->revokeUserSession('userid');

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'DELETE' &&
                strstr($request->url(), '/api/v1/users/userid/sessions');
        });
    }

    public function testForgotPasswordLink()
    {
        Http::fake();
        $this->userClient->forgotPasswordLink('userid',true);

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/userid/credentials/forgot_password?sendEmail=true');
        });
    }

    public function testForgotPassword()
    {
        Http::fake();
        $this->userClient->forgotPassword('userid','password','Dog');

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/userid/credentials/forgot_password');
        });
    }

    public function testChangeRecoveryQuestion()
    {
        Http::fake();
        $this->userClient->changeRecoveryQuestion('userid','password','Dog','dog');

        Http::assertSent(function (Request $request) {
            return
                $request->hasHeader('Accept') &&
                $request->hasHeader('Content-Type') &&
                $request->hasHeader('Authorization') &&
                $request->method() == 'POST' &&
                strstr($request->url(), '/api/v1/users/userid/credentials/change_recovery_question');
        });
    }

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->userClient = new UserClient(
            new LaravelHttpFacadeAdapter
        );

    }
}
