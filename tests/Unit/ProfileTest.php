<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Profile;

class ProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $profile = factory(\App\Profile::class)->make();
        $profile->user()->associate($user);
        $this->assertTrue($profile->save());
    }

    public function testDeleteProfile()
    {
        $profile = new Profile();
        //$user->name = 'Mr. Walker Barton';
        $profile->user_id = '80';
        $profile->fname = 'Mike';
        $profile->lname = 'Lafferty';
        $profile->body = 'Newark Resident';
        $profile->save();
        $this->assertTrue($profile->delete());
    }

    public function testInsertProfile()
    {
        $profile = new Profile();
        //$user->name = 'Mr. Walker Barton';
        $profile->user_id = '80';
        $profile->fname = 'Steve';
        $profile->lname = 'Waugh';
        $profile->body = 'Born in Beantown';
        $profile->save();
        $this->assertTrue($profile->save());
    }
}
