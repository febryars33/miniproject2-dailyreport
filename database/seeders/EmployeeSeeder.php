<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('employees')->insert([
            'jobdesk_id'   =>  1,
            'code'  =>  'EMP001',
            'name'  =>  $faker->name(),
            'location'  =>  'Bandung, Jawa Barat',
            'status'    =>  true,
            'is_lecturer'   =>  false,
        ]);
    }
}
