<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\DriverRequirement;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DriverEvaluationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A driver chief evaluates a single driver
     *
     * @return void
     */
    public function testDriverChiefEvaluatesDriver()
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

        $user->driver()->save($driverdata);

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
        $response = $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
        $response = $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);
        
        $response->assertCreated();
    }

    /**
     * A driver chief gets driver's revisions
     *
     * @return void
     */
    public function testDriverChiefGetsDriversRevisions()
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

        $user->driver()->save($driverdata);

        $DriverRequirements = DriverRequirement::all();

        $evals = [];
        foreach ($DriverRequirements as $driver_requirement) {
            $evals[] = [
                "idRequirement" => $driver_requirement->id,
                "valor" => True
            ];
        }
        

        $json = [
            "observacion" => "Hola",
            "requirement_status_id" => 1,
            "evals" => $evals
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

        $response = $this->json('GET', '/api/drivers/'. $user->id . '/evaluations');
        
        $response->assertStatus(200)
                    ->assertJsonStructure([
                        "message",
                        "revisions" => [
                            0 => [
                                "id",
                                "observacion",
                                "status" => [

                                ]
                            ],
                            1 => [
                                "id",
                                "observacion",
                                "status" => [

                                ]
                            ]
                        ]
                    ]);
    }

    /**
     * A driver chief gets driver's revisions
     *
     * @return void
     */
    public function testDriverChiefGetsADriverSARevision()
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

        $user->driver()->save($driverdata);

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

        $response = $this->json('GET', '/api/drivers/'. $user->id . '/evaluations/1');

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

    /**
     * A driver chief gets driver's revisions
     *
     * @return void
     */
    public function testDriverChiefGetsAllRevisionsWithDrivers()
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

        $user->driver()->save($driverdata);

        $DriverRequirements = DriverRequirement::all();

        $evals = [];
        foreach ($DriverRequirements as $driver_requirement) {
            $evals[] = [
                "idRequirement" => $driver_requirement->id,
                "valor" => True
            ];
        }
        

        $json = [
            "observacion" => "Hola",
            "requirement_status_id" => 1,
            "evals" => $evals
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

        $response = $this->json('GET', '/api/drivers/evaluations');
        
        $response->assertStatus(200)
                    ->assertJsonStructure([
                        "data" => [
                            0 => [
                                "id",
                                "observacion",
                                "status" => [

                                ]
                            ],
                            1 => [
                                "id",
                                "observacion",
                                "status" => [

                                ]
                            ]
                        ]
                    ]);
    }
}
