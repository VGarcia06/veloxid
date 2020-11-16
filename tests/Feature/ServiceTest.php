<?php

namespace Tests\Feature;

use App\Models\Places\Distrito;
use App\Models\Places\Zona;
use App\Models\Price;
use App\Models\Product\Category;
use App\Models\Product\Subcategory;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCustomerRequestsTheService()
    {
        $this->seed();

        $zonas = factory(Zona::class, 3)
                    ->create()
                    ->each(function ($zona)
                    {
                        $zona->distritos()->createMany(
                            factory(Distrito::class, 2)->make()->toArray()
                        );
                    });

        Price::create([
            'price' => 100,
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'vehicle_type_id' => 1
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

        $user = User::create([
                    "name" => "ANA JUANA",
                    "email" => "easdf@asd.com",
                    "password" => "asdfsd",
                    "idStatus" => 1,
                    "idUserType" => 1
                ]);
        
        $user->person()->create([
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);
        
        $json = [
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'distrito_origen_id' => 1,
            'distrito_destino_id' => 1,
            'direccion_origen' => Str::random(20),
            'direccion_destino' => Str::random(20),
            'fecha_recojo' => '2020-11-25 08:37:17',
            'fecha_entrega' => '2020-12-25 08:37:17',
            'transaction_id' => rand(10,100),
            'total' => 200,
            'products' => [
                [
                    'alto' => 100,
                    'ancho' => 100,
                    'largo' => 100,
                    'precio_unitario' => 100,
                    'cantidad' => 1,
                    'descripcion' => 'Esto es un descripción',
                    'subcategory_id' => 1,
                    'imagen' => 'asdffa/kasdf.jpg'
                ],
                [
                    'alto' => 100,
                    'ancho' => 100,
                    'largo' => 100,
                    'precio_unitario' => 100,
                    'cantidad' => 1,
                    'descripcion' => 'Esto es un descripción 2',
                    'subcategory_id' => 2,
                    'imagen' => 'sadafs/fasdfads.png'
                ]
            ]
        ];

        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('POST','api/services', $json);

        $response->assertStatus(201);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCustomerRequestsTheServiceWithOnlyAProduct()
    {
        $this->seed();

        $zonas = factory(Zona::class, 3)
                    ->create()
                    ->each(function ($zona)
                    {
                        $zona->distritos()->createMany(
                            factory(Distrito::class, 2)->make()->toArray()
                        );
                    });

        Price::create([
            'price' => 100,
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'vehicle_type_id' => 1
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

        $user = User::create([
                    "name" => "ANA JUANA",
                    "email" => "easdf@asd.com",
                    "password" => "asdfsd",
                    "idStatus" => 1,
                    "idUserType" => 1
                ]);
        
        $user->person()->create([
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);
        
        $json = [
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'distrito_origen_id' => 1,
            'distrito_destino_id' => 1,
            'direccion_origen' => Str::random(20),
            'direccion_destino' => Str::random(20),
            'fecha_recojo' => '2020-11-25 08:37:17',
            'fecha_entrega' => '2020-12-25 08:37:17',
            'transaction_id' => rand(10,100),
            'total' => 200,
            'products' => [
                [
                    'alto' => 100,
                    'ancho' => 100,
                    'largo' => 100,
                    'precio_unitario' => 100,
                    'cantidad' => 1,
                    'descripcion' => 'Esto es un descripción',
                    'subcategory_id' => 1,
                    'imagen' => 'asdffa/kasdf.jpg'
                ]
            ]
        ];

        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('POST','api/services', $json);

        $response->assertStatus(201);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCustomerGetsAllServiceRequests()
    {
        $this->seed();

        $zonas = factory(Zona::class, 3)
                    ->create()
                    ->each(function ($zona)
                    {
                        $zona->distritos()->createMany(
                            factory(Distrito::class, 2)->make()->toArray()
                        );
                    });

        Price::create([
            'price' => 100,
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'vehicle_type_id' => 1
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

        $user = User::create([
                    "name" => "ANA JUANA",
                    "email" => "easdf@asd.com",
                    "password" => "asdfsd",
                    "idStatus" => 1,
                    "idUserType" => 1
                ]);
        
        $user->person()->create([
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);
        
        $json = [
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'distrito_origen_id' => 1,
            'distrito_destino_id' => 1,
            'direccion_origen' => Str::random(20),
            'direccion_destino' => Str::random(20),
            'fecha_recojo' => '2020-11-25 08:37:17',
            'fecha_entrega' => '2020-12-25 08:37:17',
            'transaction_id' => rand(10,100),
            'total' => 200,
            'products' => [
                [
                    'alto' => 100,
                    'ancho' => 100,
                    'largo' => 100,
                    'precio_unitario' => 100,
                    'cantidad' => 1,
                    'descripcion' => 'Esto es un descripción',
                    'subcategory_id' => 1,
                    'imagen' => 'asdffa/kasdf.jpg'
                ],
                [
                    'alto' => 100,
                    'ancho' => 100,
                    'largo' => 100,
                    'precio_unitario' => 100,
                    'cantidad' => 1,
                    'descripcion' => 'Esto es un descripción 2',
                    'subcategory_id' => 2,
                    'imagen' => 'sadafs/fasdfads.png'
                ]
            ]
        ];

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->json('POST','api/services', $json);

        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('GET','api/services');

        $response->assertStatus(200)
                            ->assertJsonStructure([
                                "data" => [
                                    0 => [
                                        "id",
                                        "products" => [
                                            0 => [
                                                "id"
                                            ],
                                            1 => [
                                                "id"
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
    public function testCustomerGetsAllServiceRequestsButThereAreNotServiceRequests()
    {
        $this->seed();

        $zonas = factory(Zona::class, 3)
                    ->create()
                    ->each(function ($zona)
                    {
                        $zona->distritos()->createMany(
                            factory(Distrito::class, 2)->make()->toArray()
                        );
                    });

        Price::create([
            'price' => 100,
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'vehicle_type_id' => 1
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

        $user = User::create([
                    "name" => "ANA JUANA",
                    "email" => "easdf@asd.com",
                    "password" => "asdfsd",
                    "idStatus" => 1,
                    "idUserType" => 1
                ]);
        
        $user->person()->create([
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);
        

        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('GET','api/services');

        $response->assertStatus(200)
                            ->assertJsonStructure([
                                "data" => [

                                ]
                            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCustomerGetsAServiceRequest()
    {
        $this->seed();

        $zonas = factory(Zona::class, 3)
                    ->create()
                    ->each(function ($zona)
                    {
                        $zona->distritos()->createMany(
                            factory(Distrito::class, 2)->make()->toArray()
                        );
                    });

        Price::create([
            'price' => 100,
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'vehicle_type_id' => 1
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

        $user = User::create([
                    "name" => "ANA JUANA",
                    "email" => "easdf@asd.com",
                    "password" => "asdfsd",
                    "idStatus" => 1,
                    "idUserType" => 1
                ]);
        
        $user->person()->create([
            'nombre' => 'algun nombre', 
            'apellidoPaterno' => 'Algun paellido', 
            'apellidoMaterno' => 'Algun apellido', 
            'telefono' => 535345, 
            'direccion' => 'asdfasdfsd', 
            'correo' => 'asdf@afa.com', 
            'imagen' => 'asdf/fasdfaf.jpg', 
            'numero' => 98485747,
            'idDocumentType' => 1
        ]);
        
        $json = [
            'zona_origen_id' => 1,
            'zona_destino_id' => 1,
            'distrito_origen_id' => 1,
            'distrito_destino_id' => 1,
            'direccion_origen' => Str::random(20),
            'direccion_destino' => Str::random(20),
            'fecha_recojo' => '2020-11-25 08:37:17',
            'fecha_entrega' => '2020-12-25 08:37:17',
            'transaction_id' => rand(10,100),
            'total' => 200,
            'products' => [
                [
                    'alto' => 100,
                    'ancho' => 100,
                    'largo' => 100,
                    'precio_unitario' => 100,
                    'cantidad' => 1,
                    'descripcion' => 'Esto es un descripción',
                    'subcategory_id' => 1,
                    'imagen' => 'asdffa/kasdf.jpg'
                ],
                [
                    'alto' => 100,
                    'ancho' => 100,
                    'largo' => 100,
                    'precio_unitario' => 100,
                    'cantidad' => 1,
                    'descripcion' => 'Esto es un descripción 2',
                    'subcategory_id' => 2,
                    'imagen' => 'sadafs/fasdfads.png'
                ]
            ]
        ];

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->json('POST','api/services', $json);

        $response = $this->actingAs($user)
                            ->withSession(['foo' => 'bar'])
                            ->json('GET','api/services/1');

        $response->assertStatus(200)
                        ->assertJsonStructure([
                            "id",
                            "products" => [
                                0 => ["id"],
                                1 => ["id"]
                            ]
                        ]);
    }
}
