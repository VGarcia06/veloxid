<?php

namespace Tests\Feature;

use App\Models\VehicleType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDriverChiefGetsVehicleTypes()
    {
        $this->seed();

        VehicleType::create([
            'nombre' => 'GG',
            'tipo' => 'asfd'
        ]);


        $response =  $this->Json('GET','/api/vehicletypes', []);

        $response->dump();
        
        $response->assertStatus(200);
    }
}
