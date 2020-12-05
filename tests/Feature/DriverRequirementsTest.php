<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DriverRequirementsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsAllDriverRequirements()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        
        $driverdata = new Driver();
        $driverdata->licenciaConducir = "asfd";
        $driverdata->constanciaEstadoSalud = "asfdasf";
        $driverdata->cuentaBancaria = "asfasf";
        $driverdata->banco = "asdf";

        $user->driver()->save($driverdata);

        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('GET','api/requirements/drivers');

        $response->assertOk();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChieSavesANewDriverRequirement()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        
        $driverdata = new Driver();
        $driverdata->licenciaConducir = "asfd";
        $driverdata->constanciaEstadoSalud = "asfdasf";
        $driverdata->cuentaBancaria = "asfasf";
        $driverdata->banco = "asdf";

        $user->driver()->save($driverdata);

        $json = [
            [
                'requerimiento' => 'Algo 1'
            ],
            [
                'requerimiento' => 'Algo 2'
            ],
            [
                'requerimiento' => 'Algo 3'
            ]
        ];

        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('POST', 'api/requirements/drivers', $json);

        $response->assertCreated();
    }
}
