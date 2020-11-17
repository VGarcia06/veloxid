<?php

namespace Tests\Feature;

use App\Models\Allocation;
use App\Models\Auxiliar;
use App\Models\DocumentType;
use App\Models\Places\Distrito;
use App\Models\Places\Zona;
use App\Models\Price;
use App\Models\Product\Category;
use App\Models\Product\Subcategory;
use App\Models\Service;
use App\Models\States\ServiceState;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuxiliarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneGetsAllAuxiliarsFromAnAllocation()
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


        $this->actingAs($user_driver)
                ->withSession(['foo' => 'bar'])
                ->json('PATCH','api/allocations/' . $allocation->id , $json);
        
        $json =[
            'nombre' => 'Dr. Hola',
            'numero' => 944884,
            'document_type_id' => 1
        ];

        $this->json('POST','api/allocations/' . $allocation->id . '/auxiliars', $json);

        $response = $this->json('GET','api/allocations/' . $allocation->id . '/auxiliars');
        
        $response->assertOk()
                    ->assertJsonStructure([
                        'data' => [
                            0 => [
                                'id',
                                'nombre',
                                'numero',
                                'document_type' => [

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
    public function testDriverAddsAuxiliarsToAnAllocation()
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


        $this->actingAs($user_driver)
                ->withSession(['foo' => 'bar'])
                ->json('PATCH','api/allocations/' . $allocation->id , $json);

        $json =[
            'nombre' => 'Dr. Hola',
            'numero' => 944884,
            'document_type_id' => 1
        ];

        $response = $this->json('POST','api/allocations/' . $allocation->id . '/auxiliars', $json);
        
        $response->assertCreated();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverUpdatesAnAuxiliar()
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


        $this->actingAs($user_driver)
                ->withSession(['foo' => 'bar'])
                ->json('PATCH','api/allocations/' . $allocation->id , $json);

        Allocation::findOrFail($allocation->id)
                            ->auxiliars()
                            ->createMany([
                                [
                                    'nombre' => 'Dr. Hola',
                                    'numero' => 944884,
                                    'document_type_id' => 1
                                ]
                            ]);

        $json =[
            'nombre' => 'Dr. Hola',
            'numero' => 789654123,
            'document_type_id' => 1
        ];

        $response = $this->json('PUT','api/allocations/' . $allocation->id . '/auxiliars/' . Allocation::findOrFail($allocation->id)->auxiliars()->first()->id , $json);
        
        $response->assertSuccessful();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverDeletesAnAuxiliar()
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

        /**
         * Accepting an allocation
         */
        $this->actingAs($user_driver)
                ->withSession(['foo' => 'bar'])
                ->json('PATCH','api/allocations/' . $allocation->id , $json);

        Allocation::findOrFail($allocation->id)
                            ->auxiliars()
                            ->createMany([
                                [
                                    'nombre' => 'Dr. Hola',
                                    'numero' => 944884,
                                    'document_type_id' => 1
                                ]
                            ]);

        $response = $this->json('DELETE','api/allocations/' . $allocation->id . '/auxiliars/' . Allocation::findOrFail($allocation->id)->auxiliars()->first()->id);
        
        $response->assertSuccessful();
    }
}
