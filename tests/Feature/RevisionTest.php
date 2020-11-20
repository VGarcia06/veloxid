<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RevisionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsAllRevisionsFiltered()
    {
        /**
         * Driver Evaluation TEST
         */
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

        $driver = $user->driver()->save($driverdata);

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

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
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

        /**
         * Another test for another driver
         */
        /**
         * Driver Evaluation TEST
         */

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        
        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $driver1 = $user1->driver()->save($driverdata1);

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

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
        $driver1->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);


        $vehicle1 = $driver1->vehicles()->first();
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

        $this->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */
        $json = [
            'from' => '2020-10-10',
            'to' => '2020-12-10'
        ];

        $response = $this->json('GET','api/revisions',$json);
        
        $response->assertOk()
                    ->assertJsonStructure([
                        'data' => [
                            0 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [

                                        ]
                                    ]
                                ]
                            ],
                            1 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [
                                            
                                        ]
                                    ]
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
    public function testDriverChiefGetsAllRevisionsButNotFiltering()
    {
        /**
         * Driver Evaluation TEST
         */
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

        $driver = $user->driver()->save($driverdata);

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

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
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

        /**
         * Another test for another driver
         */
        /**
         * Driver Evaluation TEST
         */

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        
        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $driver1 = $user1->driver()->save($driverdata1);

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

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
        $driver1->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);


        $vehicle1 = $driver1->vehicles()->first();
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

        $this->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */
        $json = [
            'from' => '',
            'to' => ''
        ];

        $response = $this->json('GET','api/revisions',$json);
        
        $response->assertOk()
                    ->assertJsonStructure([
                        'data' => [
                            0 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [

                                        ]
                                    ]
                                ]
                            ],
                            1 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [
                                            
                                        ]
                                    ]
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
    public function testDriverChiefGetsAllRevisionsButNotFilteringByFrom()
    {
        /**
         * Driver Evaluation TEST
         */
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

        $driver = $user->driver()->save($driverdata);

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

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
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

        /**
         * Another test for another driver
         */
        /**
         * Driver Evaluation TEST
         */

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        
        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $driver1 = $user1->driver()->save($driverdata1);

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

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
        $driver1->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);


        $vehicle1 = $driver1->vehicles()->first();
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

        $this->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */
        $json = [
            'from' => '',
            'to' => '2020-12-10'
        ];

        $response = $this->json('GET','api/revisions',$json);
        
        $response->assertOk()
                    ->assertJsonStructure([
                        'data' => [
                            0 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [

                                        ]
                                    ]
                                ]
                            ],
                            1 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [
                                            
                                        ]
                                    ]
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
    public function testDriverChiefGetsAllRevisionsButNotFilteringByTo()
    {
        /**
         * Driver Evaluation TEST
         */
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

        $driver = $user->driver()->save($driverdata);

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

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
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

        /**
         * Another test for another driver
         */
        /**
         * Driver Evaluation TEST
         */

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        
        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $driver1 = $user1->driver()->save($driverdata1);

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

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
        $driver1->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);


        $vehicle1 = $driver1->vehicles()->first();
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

        $this->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */
        $json = [
            'from' => '2020-10-10',
            'to' => ''
        ];

        $response = $this->json('GET','api/revisions',$json);
        
        $response->assertOk()
                    ->assertJsonStructure([
                        'data' => [
                            0 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [

                                        ]
                                    ]
                                ]
                            ],
                            1 => [
                                'id',
                                'driver' => [
                                    'user' => [
                                        'person' => [
                                            
                                        ]
                                    ]
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
    public function testDriverChiefGetsARevision()
    {
        /**
         * Driver Evaluation TEST
         */
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

        $driver = $user->driver()->save($driverdata);

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

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
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

        /**
         * Another test for another driver
         */
        /**
         * Driver Evaluation TEST
         */

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);
        
        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $driver1 = $user1->driver()->save($driverdata1);

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

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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
                    "valor" => True
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        /**
         * Vehicle Evaluation TEST
         */
        $driver1->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);


        $vehicle1 = $driver1->vehicles()->first();
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

        $this->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        $response = $this->json('GET','api/revisions/1');
        
        $response->assertOk()
                    ->assertJsonStructure([
                        'driver' => [
                            'user' => [
                                'person'
                            ]
                        ],
                        'driver_revisions' => [
                            0 => [
                                'status' => [

                                ],
                                'requirements' => [
    
                                ]
                            ]
                        ],
                        'vehicle_revisions' => [
                            0 => [
                                'vehicle' => [

                                ],
                                'status' => [
    
                                ],
                                'requirements' => [
    
                                ]
                            ]
                        ]
                    ]);
    }
}
