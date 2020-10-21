<?php

use Illuminate\Database\Seeder;

class DriverRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\DriverRequirement::class, 50)->create();
    }
}
