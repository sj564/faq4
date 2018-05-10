<?php



namespace Tests\Unit;
use Tests\TestCase;
use App\User;
use App\Http\Middleware\Student;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{

    public function NonStudentTest()
    {
        $user = factory(User::class)->make(['student' => false]);

        $this->actingAs($user);

        $request = Request::create('/studentOnlyPage', 'GET');

        $middleware = new Student;

        $response = $middleware->handle($request, function () {});

        $this->assertEquals($response->getStatusCode(), 302);
    }

    public function testStudent()
    {
        $user = factory(User::class)->make(['student' => true]);

        $this->actingAs($user);

        $request = Request::create('/studentOnlyPage', 'GET');

        $middleware = new Student;

        $response = $middleware->handle($request, function(){});

        $this->assertEquals($response, null);
    }







}
