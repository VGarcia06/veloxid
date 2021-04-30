<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Carbon\Carbon;
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

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */

        $now = Carbon::now(); // Getting now datetime

        $json = [
            'from' => $now->subDay(2), // adding 2 days to now
            'to' => $now->addDay(1) // substracting 1 day to now
        ];

        $response = $this->actingAs($user_chief)
                            ->json('POST','api/revisions',$json); // I pass parameters
        
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

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */
        $json = [
            'from' => '',
            'to' => ''
        ];

        $response = $this->json('POST','api/revisions',$json);
        
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

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */

        $now = Carbon::now(); // Getting now datetime

        $json = [
            'from' => '',
            'to' => $now->addDay() // Adding 1 day to now
        ];

        $response = $this->actingAs($user_chief)
                            ->json('POST','api/revisions',$json);
        
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

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        /**
         * Real test of this TEST
         */

        $now = Carbon::now(); // Getting now datetime

        $json = [
            'from' => $now->subDay(2), // Substracting 2 days to now
            'to' => ''
        ];
        
        $response = $this->actingAs($user_chief)
                            ->json('POST','api/revisions',$json);
        
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

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json);

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

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
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

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json);

        $response = $this->actingAs($user_chief)
                            ->json('GET','api/revisions/2');
        
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
                    ])
                    ->assertJson([
                        'id' => 2
                    ]);
    }
}
