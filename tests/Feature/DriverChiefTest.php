<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Tests\TestCase;

class DriverChiefTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminCreatesADriverChief()
    {
        $this->seed();

        $admin = factory(User::class)->create([
            'idUserType' => 4,
            'idStatus' => 1
        ]);

        $response =  $this->actingAs($admin)
                            ->Json('POST','/api/chiefs_drivers', [
                                'name' => 'ANDRES JUNIOR', 
                                'email' => 'aaparcanatm@autonoma.edu.pe', 
                                'password' => 'asdfasdfasdf'
                            ]);
        
        $response->assertCreated();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminGetsDriversChiefs()
    {
        $admin = factory(User::class)->create([
            'idUserType' => 4, // Otro usuario
            'idStatus' => 1
        ]);

        $chief1 = factory(User::class)->create([
            'idUserType' => 3, // jefe de transporte - Driver Chief
            'idStatus' => 1
        ]);

        $chief2 = factory(User::class)->create([
            'idUserType' => 3, // jefe de transporte - Driver Chief
            'idStatus' => 1
        ]);

        $response = $this->actingAs($admin)
                            ->json('GET','/api/chiefs_drivers/');

        $response->assertOK()
                    ->assertJson([
                        0 => [
                            'name' => $chief1->name,
                            'email' => $chief1->email,
                            'idStatus' => 1,
                            'idUserType' => 3
                        ],
                        1 => [
                            'name' => $chief2->name,
                            'email' => $chief2->email,
                            'idStatus' => 1,
                            'idUserType' => 3
                        ]
                    ]);
    }
}
