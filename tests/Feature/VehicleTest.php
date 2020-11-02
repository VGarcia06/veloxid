<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsVehiclesFromADriver()
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

        $driver = $user->driver()
                        ->save($driverdata);

        $driver->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ]
                ]);

        $response =  $this->Json('GET','/api/drivers/' . $user->id . '/vehicles', []);

        $response
                ->assertStatus(200)
                ->assertJson([
                    'vehicles' => [
                        'data' => [
                            [
                                'placa' => 'asdfasdf',
                                'capacidadCarga' => 4124,
                                'imagen' => '',
                                'idVehicleType' => 1,
                            ],
                            [
                                'placa' => 'asdfasdf',
                                'capacidadCarga' => 4124,
                                'imagen' => '',
                                'idVehicleType' => 1,
                            ]
                        ]
                    ]
                ])
                ->assertJsonMissing([
                    'vehicles' => [
                        'data' => [
                            [
                                'placa' => 'asdaaaaf',
                                'capacidadCarga' => 664,
                                'imagen' => '',
                                'idVehicleType' => 1,
                            ]
                        ]
                    ]
                ]);
    }
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefStoresAVehicleOfADriver()
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

        $json = [
                    'placa' => 'asdfasdf',
                    'capacidadCarga' => 4124,
                    'imagen' => 'asfs/asda.jpg',
                    'idVehicleType' => 1,
                ];


        
        $response = $this->json('POST','/api/drivers/' . $user->id . '/vehicles', $json);

        $response->assertStatus(201);
    }
}
