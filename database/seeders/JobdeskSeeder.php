<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class JobdeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create('id_ID');
        DB::table('jobdesks')->insert([
            'position_id'   =>  1,
            'code'  =>  'JB001',
            'name'  =>  $faker->jobTitle(),
            'description'   =>  $faker->text(50)
        ]);
    }
}
