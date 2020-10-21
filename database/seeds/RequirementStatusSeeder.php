<?php

use Illuminate\Database\Seeder;

class RequirementStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requirement_status')->insert([
            'nombre' => 'Apto',
        ]);

        DB::table('requirement_status')->insert([
            'nombre' => 'No apto',
        ]);
    }
}
