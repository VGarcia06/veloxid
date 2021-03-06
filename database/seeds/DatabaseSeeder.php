<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusSeeder::class,
            UserTypeSeeder::class,
            DocumentTypeSeeder::class,
            DriverRequirementSeeder::class,
            VehicleRequirementSeeder::class,
            RequirementStatusSeeder::class,
            VehicleTypeSeeder::class
            ]);
    }
}
