<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HookahClubTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /*
     *  test api endpoint for creating new hookahClub
     */
    public function testCreation()
    {
        $payload = [
            'name' => 'Club Test 1',
            'description' => 'test description'
        ];

        $this->json('POST', '/api/club/add', $payload)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'title' => 'Club Test 1', 'description' => 'test description']);
    }
}
