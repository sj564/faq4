<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Answer;

class AnswerTest extends TestCase
{

    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(\App\Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $this->assertTrue($answer->save());
    }

    public function testInsertAnswer()
    {
        $answer = new Answer();
        $answer->user_id = '125';
        $answer->question_id = '625';
        $answer->body = 'What is the capital of El Salvador?';

        $answer->save();
        $this->assertTrue($answer->save());
    }

    public function testDeleteAnswer()
    {
        $answer = new Answer();
        $answer->user_id = '190';
        $answer->question_id = '378';
        $answer->body = 'What is the area of Paraguay?';

        $answer->save();
        $this->assertTrue($answer->delete());
    }
}
