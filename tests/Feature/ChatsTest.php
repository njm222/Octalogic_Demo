<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetChats()
    {
        $response = $this->get('/api/chats');

        $response->assertStatus(200)
            ->assertJsonCount(9);
    }

    public function testGetUserChats()
    {
        $response = $this->get('/api/chats/0');

        $response->assertStatus(200)
            ->assertJsonCount(9);

        $response = $this->get('/api/chats/1');

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }
}
