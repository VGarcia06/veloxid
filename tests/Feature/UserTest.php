<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSomeoneActivesAUser()
    {
        $someone = factory(User::class)->create([
            'idUserType' => 4
        ]);

        $desactive_user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 2
        ]);

        $desactive_user->delete();

        $response = $this->actingAs($someone)
                            ->json(
                                'PATCH',
                                '/api/users/' . $desactive_user->id
                            );

        $response->assertOk();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSomeoneDesactivesAUser()
    {
        $someone = factory(User::class)->create([
            'idUserType' => 4
        ]);

        $active_user = factory(User::class)->create([
            'idUserType' => 3
        ]);

        $response = $this->actingAs($someone)
                            ->json(
                                'DELETE',
                                '/api/users/' . $active_user->id
                            );

        $response->assertOk();
    }    

}
