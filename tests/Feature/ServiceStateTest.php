<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceStateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneGetsAllServiceStates()
    {
        $response = $this->json('GET','api/services/states');
        
        $response->assertStatus(200);
    }
}
