<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Question;

class QuestionTest extends TestCase
{

    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $this->assertTrue($question->save());
    }

    public function testInsertQuestion()
    {
        $question = new Question();
        $question->user_id = '620';
        $question->body = 'What is the capital Ukraine?';

        $question->save();
        $this->assertTrue($question->save());
    }

    public function testDeleteQuestion()
    {
        $question = new Question();
        $question->user_id = '765';
        $question->body = 'What is the capital South Africa?';

        $question->save();
        $this->assertTrue($question->delete());
    }
}
