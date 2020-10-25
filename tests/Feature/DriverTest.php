<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DriverTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsDrivers()
    {
        $this->Json('POST','/api/drivers', [
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

        $this->Json('POST','/api/drivers', [
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

        $response =  $this->Json('GET','/api/drivers', []);

        $response
                ->assertStatus(200)
                ->assertJson([
                    ['name' => 'ANDRES JUNIOR'],
                    ['name' => 'ANA MARIA']
                ])
                ->assertJsonMissing([
                    ['name' => 'ANA JUANA']
                ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsDriver()
    {
        $this->Json('POST','/api/drivers', [
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

        $response =  $this->Json('GET','/api/drivers/1', []);

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
    public function testDriverChiefCreatesDriver()
    {
        $response =  $this->Json('POST','/api/drivers', [
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
    public function testDriverChiefUpdatesDriver()
    {
        $this->Json('POST','/api/drivers', [
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

        $response =  $this->Json('PUT','/api/drivers/1', [
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
        $this->Json('POST','/api/drivers', [
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

        $response =  $this->Json('DELETE','/api/drivers/1', []);

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
        $this->Json('POST','/api/drivers', [
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

        $response =  $this->Json('POST','/api/drivers', [
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
                    "valor" => False
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json1);

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
        $this->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $response = $this->json('GET','/api/drivers/evaluated');

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

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
        $this->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

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

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json1);

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
        $this->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $response = $this->json('GET','/api/drivers/evaluated');

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
                    "valor" => false
                ],
                [
                    "idRequirement" => 2,
                    "valor" => false
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user->id . '/evaluations', $json);

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
        $this->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

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
                    "valor" => false
                ]
            ]
        ];

        $this->json('POST','/api/drivers/' . $user1->id . '/evaluations', $json1);

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
        $this->json('POST','/api/vehicles/' . $vehicle->id . '/evaluations', $json);

        $response = $this->json('GET','/api/drivers/evaluated');

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
