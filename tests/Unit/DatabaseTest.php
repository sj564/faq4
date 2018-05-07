<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

public function testDatabase()
{

    $this->assertDatabaseHas('users', [
        'email' => 'sally@example.com'
    ]);
}