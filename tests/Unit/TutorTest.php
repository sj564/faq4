<?php



namespace Tests\Unit;
use Tests\TestCase;
use App\User;
use App\Http\Middleware\Tutor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TutorTest extends TestCase
{

    public function NonTutortest()
    {
        $user = factory(User::class)->make(['tutor' => false]);

        $this->actingAs($user);

        $request = Request::create('/tutorOnlyPage', 'GET');

        $middleware = new Tutor;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response->getStatusCode(), 302);
    }



    public function testTutor()
    {
        $user = factory(User::class)->make(['tutor' => true]);

        $this->actingAs($user);

        $request = Request::create('/tutorOnlyPage', 'GET');

        $middleware = new Tutor;

        $response = $middleware->handle($request, function () {
        });

        $this->assertEquals($response, null);
    }


}