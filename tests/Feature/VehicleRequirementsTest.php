<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleRequirementsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefSavesNewVehicleRequirements()
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
            ]
        ];
        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('POST','api/requirements/vehicles', $json);

        $response->assertCreated();
    }
}
