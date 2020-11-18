<?php

namespace Tests\Feature;

use App\Models\Product\Category;
use App\Models\Product\Subcategory;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleSubcategoriesTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneStoresSubcategoriesOfADriver()
    {
        $categories = factory(Category::class)
                    ->create()
                    ->each(function ($category)
                    {
                        $category->subcategories()->createMany(
                            factory(Subcategory::class, 4)->make([
                                'vehicle_type_id' => 1
                            ])->toArray()
                        );
                    });

        /// DRIVER USER
        $user_driver = User::create([
            "name" => "luisfcar",
            "email" => "easdasssf@asd.com",
            "password" => "asdfsd",
            "idStatus" => 1,
            "idUserType" => 2
        ]);

        $user_driver->person()->create([
            'nombre' => 'Luis Alberto', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);

        $user_driver->driver()->create([
            'licenciaConducir' => "asfd",
            'constanciaEstadoSalud' => "asfdasf",
            'cuentaBancaria' => "asfasf",
            'banco' => "asdf"
        ]);

        $user_driver->driver()
                ->first()
                ->vehicles()
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


        $json = [
            2,
            3
        ];

        $response = $this->json('POST','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories', $json);
        
        $response->assertCreated();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneGetsSubcategoriesOfADriver()
    {
        $categories = factory(Category::class)
                    ->create()
                    ->each(function ($category)
                    {
                        $category->subcategories()->createMany(
                            factory(Subcategory::class, 4)->make([
                                'vehicle_type_id' => 1
                            ])->toArray()
                        );
                    });

        /// DRIVER USER
        $user_driver = User::create([
            "name" => "luisfcar",
            "email" => "easdasssf@asd.com",
            "password" => "asdfsd",
            "idStatus" => 1,
            "idUserType" => 2
        ]);

        $user_driver->person()->create([
            'nombre' => 'Luis Alberto', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);

        $user_driver->driver()->create([
            'licenciaConducir' => "asfd",
            'constanciaEstadoSalud' => "asfdasf",
            'cuentaBancaria' => "asfasf",
            'banco' => "asdf"
        ]);

        $user_driver->driver()
                ->first()
                ->vehicles()
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


        $json = [
            2,
            3
        ];

        $this->json('POST','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories', $json);
        
        $response = $this->json('GET','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories');
        
        $response->assertOk()
                    ->assertJsonStructure([
                        0 => [
                            'id',
                            'nombre',
                            'category' => [
                                'id',
                                'nombre'
                            ]
                            ],
                        1 => [
                            'id',
                            'nombre',
                            'category' => [
                                'id',
                                'nombre'
                            ]
                        ]
                    ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneDeletesSubcategoriesOfADriver()
    {
        $categories = factory(Category::class)
                    ->create()
                    ->each(function ($category)
                    {
                        $category->subcategories()->createMany(
                            factory(Subcategory::class, 4)->make([
                                'vehicle_type_id' => 1
                            ])->toArray()
                        );
                    });

        /// DRIVER USER
        $user_driver = User::create([
            "name" => "luisfcar",
            "email" => "easdasssf@asd.com",
            "password" => "asdfsd",
            "idStatus" => 1,
            "idUserType" => 2
        ]);

        $user_driver->person()->create([
            'nombre' => 'Luis Alberto', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);

        $user_driver->driver()->create([
            'licenciaConducir' => "asfd",
            'constanciaEstadoSalud' => "asfdasf",
            'cuentaBancaria' => "asfasf",
            'banco' => "asdf"
        ]);

        $user_driver->driver()
                ->first()
                ->vehicles()
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


        $json = [
            2,
            3
        ];

        $this->json('POST','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories', $json);
        
        $response = $this->json('DELETE','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories/2');
        
        $response->assertSuccessful();
    }
}
