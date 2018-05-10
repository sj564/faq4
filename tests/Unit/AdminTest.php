<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Tutor;
use App\Http\Middleware\Student;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function NonAdminTest()
    {
        $user = factory(User::class)->make(['admin' => false]);

        $this->actingAs($user);

        $request = Request::create('/adminOnlyPage', 'GET');

        $middleware = new Admin;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response->getStatusCode(), 302);
    }

    public function testAdmin()
    {
        $user = factory(User::class)->make(['admin' => true]);

        $this->actingAs($user);

        $request = Request::create('/adminOnlyPage', 'GET');

        $middleware = new Admin;

        $response = $middleware->handle($request, function(){});

        $this->assertEquals($response, null);
    }





}
