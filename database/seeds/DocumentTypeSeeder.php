<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documenttype')->insert([
            'tipo' => 'dni',
        ]);

        DB::table('documenttype')->insert([
            'tipo' => 'pasaporte',
        ]);
    }
}
