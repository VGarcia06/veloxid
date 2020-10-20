<?php

namespace Tests\Feature;

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

        $response->dump();
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
}
