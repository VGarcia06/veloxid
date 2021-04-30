<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Tests\TestCase;

class ServiceStateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsAllServiceStates()
    {
        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $response = $this->actingAs($user_chief)
                            ->json('GET','api/services/states');
        
        $response->assertOK();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverGetsAllServiceStates()
    {
        $user_driver = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);

        $response = $this->actingAs($user_driver)
                            ->json('GET','api/services/states');
        
        $response->assertOK();
    }
}
