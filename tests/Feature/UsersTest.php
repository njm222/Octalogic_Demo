<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUsers()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200)
            ->assertJsonCount(10);
    }

    public function testGetUserById()
    {
        $response = $this->get('/api/users/1');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJson(array("userID" => 1));
    }

    public function testDeleteUser()
    {
        $response = $this->delete('/api/users/1');

        $response->assertStatus(200)
            ->assertSeeText(1);
    }
}
