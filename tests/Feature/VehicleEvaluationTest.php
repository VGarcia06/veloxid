<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleEvaluationTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefEvaluatesVehicles()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        $driverdata = new Driver;
        $driverdata->licenciaConducir = "asfd";
        $driverdata->constanciaEstadoSalud = "asfdasf";
        $driverdata->cuentaBancaria = "asfasf";
        $driverdata->banco = "asdf";

        $driver = $user->driver()
                        ->save($driverdata);

        $driver->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);


        $vehicle = $driver->vehicles()->first();
        $json = [
            "observacion" => "Hola",
            "requirement_status_id" => 1,
            "evals" => [
                [
                    "idRequirement" => 1,
                    "valor" => True
                ],
                [
                    "idRequirement" => 2,
                    "valor" => false
                ]
            ]
        ];

        $response = $this->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $response->assertCreated();
    }

    /**
     * A driver chief gets driver's revisions
     *
     * @return void
     */
    public function testDriverChiefGetsAVehicleSARevision()
    {

        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        $driverdata = new Driver;
        $driverdata->licenciaConducir = "asfd";
        $driverdata->constanciaEstadoSalud = "asfdasf";
        $driverdata->cuentaBancaria = "asfasf";
        $driverdata->banco = "asdf";

        $driver = $user->driver()
                        ->save($driverdata);

        $driver->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);


        $vehicle = $driver->vehicles()->first();
        $json = [
            "observacion" => "Hola",
            "requirement_status_id" => 1,
            "evals" => [
                [
                    "idRequirement" => 1,
                    "valor" => True
                ],
                [
                    "idRequirement" => 2,
                    "valor" => false
                ]
            ]
        ];
        
        $this->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $response = $this->json('GET', '/api/vehicles/'. $vehicle->id . '/evaluations/1');

        $response->assertStatus(200)
                    ->assertJsonStructure([
                        "message",
                        "revision" => [
                            "id",
                            "requirements" => [
                                0 => [
                                    "id",
                                    "requerimiento",
                                    "pivot" => [
                                        "valor"
                                    ]
                                ],
                                1 => [
                                    "id",
                                    "requerimiento",
                                    "pivot" => [
                                        "valor"
                                    ]
                                ]
                            ]
                        ]
                    ]);
    }
}
