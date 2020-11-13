<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicletype')->insert([
            'nombre'=>'Motocicleta',
            'tipo' => '0',
        ]);
        
        DB::table('vehicletype')->insert([
            'nombre'=>'Auto Sedan',
            'tipo' => '1',
        ]);

        DB::table('vehicletype')->insert([
            'nombre'=>'Auto Station Wagon',
            'tipo' => '1',
        ]);

        DB::table('vehicletype')->insert([
            'nombre'=>'Auto Básico',
            'tipo' => '1',
        ]);

        DB::table('vehicletype')->insert([
            'nombre'=>'Furgon',
            'tipo' => '2',
        ]);

        DB::table('vehicletype')->insert([
            'nombre'=>'Camión chico',
            'tipo' => '2',
        ]);

        DB::table('vehicletype')->insert([
            'nombre'=>'Camión grande',
            'tipo' => '3',
        ]);
    }
}