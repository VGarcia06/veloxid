<?php

namespace Tests\Feature;

use App\Models\Allocation;
use App\Models\Places\Distrito;
use App\Models\Places\Zona;
use App\Models\Price;
use App\Models\Product\Category;
use App\Models\Product\Subcategory;
use App\Models\Service;
use App\Models\States\ServiceState;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AllocationTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsAllPendintingServices()
    {
        $this->seed();

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        ServiceState::create([
            'estado' => 'Pendiente'
        ]);

        $response = $this->actingAs($user_chief)
                            ->json('GET','api/services/states/1');

        $response->assertStatus(200)
                    ->assertJsonStructure([
                        'data' => [
                            0 => [
                                'id',
                                'state',
                                'products' => [

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
    public function testDriverChiefGetsAllPendingServicesButThereAreNotPendingServices()
    {
        $this->seed();

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        ServiceState::create([
            'estado' => 'Pendiente'
        ]);

        $response = $this->actingAs($user_chief)
                            ->json('GET','api/services/states/1');

        $response->assertStatus(200)
                    ->assertJsonStructure([
                        'data' => []
                    ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefAllocatesAPendingServiceToADriver()
    {
        $this->seed();

        $user_chief = factory(User::class)->create([
            'idUserType' => 3,
            'idStatus' => 1
        ]);

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

        ServiceState::create([
            'estado' => 'Pendiente'
        ]);

        ServiceState::create([
            'estado' => 'Esperando Confirmación'
        ]);

        /// NORMAL USER
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
        ///

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

        ///
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

        /// new
        $json =[
            'service_id' => 1,
            'driver_id' => $user_driver->id
        ];
        ///


        $response = $this->actingAs($user_chief)
                            ->withSession(['foo' => 'bar'])
                            ->json('POST','api/allocations', $json);

        $response->assertCreated();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverGetsAllocations()
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

        ServiceState::create([
            'estado' => 'Pendiente'
        ]);

        ServiceState::create([
            'estado' => 'Esperando Confirmación'
        ]);

        /// NORMAL USER
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
        ///

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

        ///
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

        $allocation = Allocation::create([
            'driver_id' => 1,
            'service_id' => 1,
            'estado' => 0 // not accepted yet
        ]);

        // changing service state to the service
        $service = Service::findOrFail(1);

        $service->service_state_id = 2; // waiting for decision to be accepted or not

        $service->save();

        $response = $this->actingAs($user_driver)
                            ->withSession(['foo' => 'bar'])
                            ->json('GET','api/allocations/');
        
        $response->assertSuccessful()
                    ->assertJsonStructure([
                        'data' => [
                            0 => [
                                'id',
                                'service'
                            ]
                        ]
                    ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverAcceptsAllocation()
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

        ServiceState::create([
            'estado' => 'Pendiente'
        ]);

        ServiceState::create([
            'estado' => 'Esperando Confirmación'
        ]);

        /// NORMAL USER
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
        ///

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

        ///
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

        $allocation = Allocation::create([
            'driver_id' => 1,
            'service_id' => 1,
            'estado' => 0 // not accepted yet
        ]);

        // changing service state to the service
        $service = Service::findOrFail(1);

        $service->service_state_id = 2; // waiting for decision to be accepted or not

        $service->save();

        $json = [
            'id_status_internal' => 1,
        ];


        $response = $this->actingAs($user_driver)
                            ->withSession(['foo' => 'bar'])
                            ->json('PATCH','api/allocations/' . $allocation->id , $json);
        
        $response->assertSuccessful();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverRejectsAllocation()
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

        ServiceState::create([
            'estado' => 'Pendiente'
        ]);

        ServiceState::create([
            'estado' => 'Esperando Confirmación'
        ]);

        /// NORMAL USER
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
        ///

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

        ///
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

        $allocation = Allocation::create([
            'driver_id' => 1,
            'service_id' => 1,
            'estado' => 0 // not accepted yet
        ]);

        // changing service state to the service
        $service = Service::findOrFail(1);

        $service->service_state_id = 2; // waiting for decision to be accepted or not

        $service->save();


        $response = $this->actingAs($user_driver)
                            ->withSession(['foo' => 'bar'])
                            ->json('DELETE','api/allocations/' . $allocation->id , $json);
        
        $response->assertSuccessful();
    }
}
