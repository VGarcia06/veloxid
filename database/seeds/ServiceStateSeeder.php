<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_states')->insert([
            'estado' => 'pendiente',
        ]);
        DB::table('service_states')->insert([
            'estado' => 'aceptado',
        ]);
        DB::table('service_states')->insert([
            'estado' => 'en tránsito',
        ]);
        DB::table('service_states')->insert([
            'estado' => 'entregado',
        ]);
    }
}
