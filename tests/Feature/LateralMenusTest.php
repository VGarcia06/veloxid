<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Tests\TestCase;

class LateralMenusTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsModules()
    {
        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);
        
        $response = $this->actingAs($user)
                            ->json('GET','/api/modules');
        
        $response->assertOK();
    }
}
