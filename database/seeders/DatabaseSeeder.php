<?php

namespace Database\Seeders;

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
            PositionSeeder::class,
            JobdeskSeeder::class,
            EmployeeSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
    }
}
