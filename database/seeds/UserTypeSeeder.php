<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertype')->insert([
            'tipo' => 'Cliente',
        ]);
        
        DB::table('usertype')->insert([
            'tipo' => 'Conductor',
        ]);

        DB::table('usertype')->insert([
            'tipo' => 'Jefe de Transporte',
        ]);
    }
}
