<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\MongoDB;

class MongoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testConnection() {
        $response = $this->get('/testConnection');

        $this->assertStringContainsString(env('DB_DATABASE'), $response->getContent());
    }

    public function testAddSampleData() {
        $response = $this->get('/setupData');

        $this->assertStringContainsString('sample data has been added', $response->getContent());
    }

    public function
}
