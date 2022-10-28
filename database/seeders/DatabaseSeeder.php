<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Region;
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
        $this->call(RoleSeeder::class);
        $this->call(CreateAdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CarsModelSeeder::class);
    }
}
