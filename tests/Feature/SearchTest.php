<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A feature test about Searching a driver by nombre.
     *
     * @return void
     */
    public function testSearchADriverByNombre()
    {
        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'ANDRES JUNIOR', 
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

        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANA MARIA', 
            'email' => 'aaparcatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'ANA MARIA', 
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

        //////////////
        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'JOSE ALBERTO', 
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

        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANA MARIA', 
            'email' => 'aamariatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'PATRICIO RYU', 
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
        
        ////////////////
        
        User::create([
            "name" => "ANA JUANA",
            "email" => "easdf@asd.com",
            "password" => "asdfsd",
            "idStatus" => 1,
            "idUserType" => 1
        ]);


        $response = $this->actingAs($user_chief)
                            ->Json('GET','api/drivers/search?query=AN');

        $response->assertStatus(200);
    }

    /**
     * A feature test about Searching a driver by Apellido Paterno.
     *
     * @return void
     */
    public function testSearchADriverByApellidoPaterno()
    {
        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparcanatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'ANDRES JUNIOR', 
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

        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANA MARIA', 
            'email' => 'aaparcatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'ANA MARIA', 
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

        //////////////
        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANDRES JUNIOR', 
            'email' => 'aaparm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'JOSE ALBERTO', 
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

        $this->actingAs($user_chief)->Json('POST','/api/drivers', [
            'name' => 'ANA MARIA', 
            'email' => 'aamariatm@autonoma.edu.pe', 
            'password' => 'asdfasdfasdf',
            'idUserType' => 2,
            'idStatus' => 1, 
            'nombre' => 'PATRICIO RYU', 
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
        
        ////////////////
        
        User::create([
            "name" => "ANA JUANA",
            "email" => "easdf@asd.com",
            "password" => "asdfsd",
            "idStatus" => 1,
            "idUserType" => 1
        ]);


        $response = $this->Json('GET','api/drivers/search?query=Algun');

        $response->assertStatus(200);
    }

    /**
     * A feature test about Searching a driver by Apellido Paterno.
     *
     * @return void
     */
    public function testSearchVehiclesOfADriverByNothing()
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
                        'placa' => 'ASD-11',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'ASDDD-77',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'GAY-711',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'PRRO-800',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'ASD-111',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'XASDP-100',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ]
                ]);

        $response =  $this->actingAs($user_chief)->Json('GET','api/drivers/' . $user->id . '/vehicles/search?query=', []);

        $response->assertStatus(200)
                    ->assertJson([
                        'vehicles' => [
                            'data' => [
                                [
                                    'placa' => 'ASD-11',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ],
                                [
                                    'placa' => 'ASDDD-77',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ],
                                [
                                    'placa' => 'GAY-711',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ],
                                [
                                    'placa' => 'PRRO-800',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ],
                                [
                                    'placa' => 'ASD-111',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ],
                                [
                                    'placa' => 'XASDP-100',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ]
                            ]
                        ]
                    ]);
    }

    /**
     * A feature test about Searching a driver by Apellido Paterno.
     *
     * @return void
     */
    public function testSearchVehiclesOfADriverByPlaca()
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
                        'placa' => 'ASD-11',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'ASDDD-77',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'GAY-711',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'PRRO-800',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'ASD-111',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'XASDP-100',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ]
                ]);

        $response =  $this->actingAs($user_chief)
                            ->Json('GET','api/drivers/' . $user->id . '/vehicles/search?query=ASD', []);

        $response->assertStatus(200)
                    ->assertJson([
                        'vehicles' => [
                            'data' => [
                                [
                                    'placa' => 'ASD-11',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ],
                                [
                                    'placa' => 'ASDDD-77',
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
                                    'placa' => 'GAY-711',
                                    'capacidadCarga' => 4124,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ]
                            ]
                        ]
                    ]);
    }

    /**
     * A feature test about Searching a driver by Apellido Paterno.
     *
     * @return void
     */
    public function testSearchVehiclesOfADriverByCapacidadCarga()
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
                        'placa' => 'ASD-11',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'ASDDD-77',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'GAY-711',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'PRRO-800',
                        'capacidadCarga' => 4124,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'ASD-111',
                        'capacidadCarga' => 500,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ],
                    [
                        'placa' => 'XASDP-100',
                        'capacidadCarga' => 444,
                        'imagen' => '',
                        'idVehicleType' => 1,
                    ]
                ]);

        $response =  $this->actingAs($user_chief)
                            ->Json('GET','api/drivers/' . $user->id . '/vehicles/search?query=444', []);

        $response->assertStatus(200)
                    ->assertJson([
                        'vehicles' => [
                            'data' => [
                                [
                                    'placa' => 'XASDP-100',
                                    'capacidadCarga' => 444,
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
                                    'placa' => 'ASD-111',
                                    'capacidadCarga' => 500,
                                    'imagen' => '',
                                    'idVehicleType' => 1,
                                ]
                            ]
                        ]
                    ]);
    }
}
