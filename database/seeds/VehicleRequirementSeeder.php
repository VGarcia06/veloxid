<?php

use Illuminate\Database\Seeder;

class VehicleRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\VehicleRequirement::class, 50)->create();
    }
}
