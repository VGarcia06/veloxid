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
    public function testDriverChiefStoresSubcategoriesOfADriver()
    {
        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $response = $this->actingAs($user_chief)
                            ->json('POST','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories', $json);
        
        $response->assertCreated();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsSubcategoriesOfADriver()
    {
        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $this->actingAs($user_chief)
                ->json('POST','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories', $json);
        
        $response = $this->actingAs($user_chief)
                            ->json('GET','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories');
        
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
    public function testDriverChiefDeletesSubcategoriesOfADriver()
    {
        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        $this->actingAs($user_chief)
                ->json('POST','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories', $json);
        
        $response = $this->actingAs($user_chief)
                            ->json('DELETE','api/vehicles/' . $user_driver->driver()->first()->vehicles()->first()->id . '/subcategories/2');
        
        $response->assertSuccessful();
    }
}
