<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\DriverRequirement;
use App\Models\VehicleRequirement;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DriverTest extends TestCase
{
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefCreatesADriver()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $response =  $this->actingAs($user)
                            ->Json('POST','/api/drivers', [
                                'name' => 'ANDRES JUNIOR', 
                                'email' => 'aaparcanatm@autonoma.edu.pe', 
                                'password' => 'asdfasdfasdf', 
                                'nombre' => 'algun nombre', 
                                'apellidoPaterno' => 'Algun paellido', 
                                'apellidoMaterno' => 'Algun apellido', 
                                'telefono' => 535345, 
                                'direccion' => 'asdfasdfsd', 
                                'correo' => 'asdf@afa.com', 
                                'imagen' => 'asdf/fasdfaf.jpg', 
                                'numero' => 98485747,
                                'idDocumentType' => 1,
                                'licenciaConducir' => 'asdfasdfasdf',
                                'constanciaEstadoSalud' => 'asdfasdf',
                                'cuentaBancaria' => 'asdfasdfasdf',
                                'banco' => 'asdfasdf'
                            ]);

        $response
                ->assertStatus(201)
                ->assertJson([
                    'state' => True
                    ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsDrivers()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $this->actingAs($user)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);

        $this->actingAs($user)->Json('POST','/api/drivers', [
            'name' => 'ANA MARIA', 
            'email' => 'aaparcatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);
        
        User::create([
            "name" => "ANA JUANA",
            "email" => "easdf@asd.com",
            "password" => "asdfsd",
            "idStatus" => 1,
            "idUserType" => 1
        ]);

        $response =  $this->actingAs($user)
                            ->Json('GET','/api/drivers', []);

        $response
                ->assertStatus(200)
                ->assertJson([
                    "active" => 2,
                    "inactive" => 0,
                    "drivers" => [
                        "data" => [
                            ['name' => 'ANDRES JUNIOR'],
                            ['name' => 'ANA MARIA']
                        ]
                    ]
                ])
                ->assertJsonMissing([
                    'data' => [
                        ['name' => 'ANA JUANA']
                    ]
                ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsADriver()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $this->actingAs($user)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);

        $response =  $this->actingAs($user)
                            ->Json('GET','/api/drivers/2', []);

        $response
                ->assertStatus(200)
                ->assertJson([
                    'name' => 'ANDRES JUNIOR'
                ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefCreatesADriverWithImage()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        //Storage::fake('public');
        
        //$file = UploadedFile::fake()->image('avatar.png');

        $response =  $this->actingAs($user)
                            ->Json('POST','/api/drivers', [
                                'name' => 'ANDRES JUNIOR', 
                                'email' => 'aaparcanatm@autonoma.edu.pe', 
                                'password' => 'asdfasdfasdf', 
                                'nombre' => 'algun nombre', 
                                'apellidoPaterno' => 'Algun paellido', 
                                'apellidoMaterno' => 'Algun apellido', 
                                'telefono' => 535345, 
                                'direccion' => 'asdfasdfsd', 
                                'correo' => 'asdf@afa.com', 
                                'imagen' => 'jasd.jpg', 
                                'numero' => 98485747,
                                'idDocumentType' => 1,
                                'licenciaConducir' => 'asdfasdfasdf',
                                'constanciaEstadoSalud' => 'asdfasdf',
                                'cuentaBancaria' => 'asdfasdfasdf',
                                'banco' => 'asdfasdf'
                            ]);

        //Storage::disk('public')->assertExists($file->hashName());

        $response
                ->assertStatus(201)
                ->assertJson([
                    'state' => True
                    ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefUpdatesDriver()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $this->actingAs($user)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1,  
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);

        $response =  $this->actingAs($user)->Json('PUT','/api/drivers/2', [
            'name' => 'ANDRES JUNIOR ALGO MAS', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1,  
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);

        $response
                ->assertStatus(200)
                ->assertJson([
                    'name' => 'ANDRES JUNIOR ALGO MAS'
                ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefDeletesDriver()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $this->actingAs($user)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1,  
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);

        $response =  $this->actingAs($user)
                            ->Json('DELETE','/api/drivers/1', []);

        $response
                ->assertStatus(204);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverUniqueEmailIsRequired()
    {
        $this->seed();

        $user = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $this->actingAs($user)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf', 
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);

        $response =  $this->actingAs($user)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf', 
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1,
            'licenciaConducir' => 'asdfasdfasdf',
            'constanciaEstadoSalud' => 'asdfasdf',
            'cuentaBancaria' => 'asdfasdfasdf',
            'banco' => 'asdfasdf'
        ]);

        $response
                ->assertStatus(400);
    }

    /**
     * A driver chief gets drivers Aptos and no aptos
     *
     * @return void
     */
    public function testDriverChiefGetsSuitableAndUnsuitableDrivers()
    {

        $this->seed();

        $user_chief = factory(User::class)->create([
            'idUserType' => 2,
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

        $user->driver()->save($driverdata);

        $DriverRequirements = DriverRequirement::all();

        $json = [
            "observacion" => "Hola",
            "evals" => [
                [
                    "idRequirement" => 1,
                    "valor" => True
                ]
            ]
        ];

        $this->actingAs($user)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);

        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $user1->driver()->save($driverdata1);

        $evals = [];

        foreach ($DriverRequirements as $driver_requirement) {
            $evals[] = [
                "idRequirement" => $driver_requirement->id,
                "valor" => True
            ];
        }

        $json1 = [
            "observacion" => "Hola",
            "evals" => $evals
        ];

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json1);

        $driver = $user1->driver()->first();

        $driver->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);

        $VehicleRequirements = VehicleRequirement::all();

        $evals = [];
        
        foreach ($VehicleRequirements as $vehicle_requirement) {
            $evals[] = [
                "idRequirement" => $vehicle_requirement->id,
                "valor" => True
            ];
        }

        $vehicle = $driver->vehicles()->first();
        $json = [
            "observacion" => "Hola",
            "evals" => $evals
        ];
        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $response = $this->actingAs($user_chief)
                            ->json('GET','/api/drivers/evaluated');

        $response->assertStatus(200)
                    ->assertJsonStructure([
                        "message",
                        "suitable",
                        "unsuitable"
                    ]);
    }

    /**
     * A driver chief gets drivers Aptos and no aptos if there are not no aptos 
     *
     * @return void
     */
    public function testDriverChiefGetsSuitableAndUnsuitableDriversIfThereAreNotUnsuitableDrivers()
    {
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

        $user->driver()->save($driverdata);

        $VehicleRequirements = VehicleRequirement::all();
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
            "evals" => $evals
        ];

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

        $driver = $user->driver()->first();

        $driver->vehicles()
                ->createMany([
                    [
                        'placa' => 'asdfasdf',
                        'capacidadCarga' => 4124,
                        'imagen' => 'asfs/asda.jpg',
                        'idVehicleType' => 1,
                    ]
                ]);

        $evals = [];
        
        foreach ($VehicleRequirements as $vehicle_requirement) {
            $evals[] = [
                "idRequirement" => $vehicle_requirement->id,
                "valor" => True
            ];
        }

        $vehicle = $driver->vehicles()->first();

        $json = [
            "observacion" => "Hola",
            "evals" => $evals
        ];

        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);

        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $user1->driver()->save($driverdata1);

        $evals = [];

        foreach ($DriverRequirements as $driver_requirement) {
            $evals[] = [
                "idRequirement" => $driver_requirement->id,
                "valor" => True
            ];
        }

        $json1 = [
            "observacion" => "Hola",
            "evals" => $evals
        ];

        $this->actingAs($user_chief)
                ->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json1);

        $driver1 = $user1->driver()->first();

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

        $evals = [];
        
        foreach ($VehicleRequirements as $vehicle_requirement) {
            $evals[] = [
                "idRequirement" => $vehicle_requirement->id,
                "valor" => True
            ];
        }

        $json1 = [
            "observacion" => "Hola",
            "evals" => $evals
        ];
        
        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle1->id . '/evaluations', $json1);

        $response = $this->actingAs($user_chief)
                            ->json('GET','/api/drivers/evaluated');
        
        $response->assertStatus(200)
                    ->assertJsonStructure([
                        "message",
                        "suitable",
                        "unsuitable"
                        ])
                    ->assertJsonFragment([
                        "unsuitable" => []
                        ]);
    }
    
    /**
     * A driver chief gets drivers Aptos and no aptos if there are not aptos 
     *
     * @return void
     */
    public function testDriverChiefGetsSuitableAndUnsuitableDriversIfThereAreNotSuitableDrivers()
    {

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

        $user->driver()->save($driverdata);

        $json = [
            "observacion" => "Hola",
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

        $driver = $user->driver()->first();

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
                    "valor" => True
                ]
            ]
        ];
        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);

        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $user1->driver()->save($driverdata1);

        $json1 = [
            "observacion" => "Hola",
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
                ->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json1);

        $driver = $user1->driver()->first();

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
                    "valor" => True
                ]
            ]
        ];
        $this->actingAs($user_chief)
                ->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $response = $this->actingAs($user_chief)
                            ->json('GET','/api/drivers/evaluated');
        
        $response->assertStatus(200)
                    ->assertJsonStructure([
                        "message",
                        "suitable",
                        "unsuitable"
                    ])
                    ->assertJsonFragment([
                        "suitable" => []
                        ]);
    }

    /**
     * A driver chief gets drivers Aptos and no aptos if there are not aptos 
     *
     * @return void
     */
    public function testDriverChiefGetsSuitableAndUnsuitableDriversIfThereAreNotEvaluatedDrivers()
    {

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

        $user->driver()->save($driverdata);

        $driver = $user->driver()->first();

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

        $user1 = factory(User::class)->create([
            'idUserType' => 2,
            'idStatus' => 1
        ]);

        $driverdata1 = new Driver;
        $driverdata1->licenciaConducir = "asfd";
        $driverdata1->constanciaEstadoSalud = "asfdasf";
        $driverdata1->cuentaBancaria = "asfasf";
        $driverdata1->banco = "asdf";

        $user1->driver()->save($driverdata1);

        $driver = $user1->driver()->first();

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

        $response = $this->actingAs($user_chief)
                            ->json('GET','/api/drivers/evaluated');

        $response->assertStatus(200)
                    ->assertJsonStructure([
                        "message",
                        "suitable",
                        "unsuitable"
                    ])
                    ->assertJsonFragment([
                        "suitable" => []
                        ]);
    }
}
