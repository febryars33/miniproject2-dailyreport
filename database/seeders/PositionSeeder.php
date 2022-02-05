<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create('id_ID');
        DB::table('positions')->insert([
            'code'  =>  'PS001',
            'name'  =>  $faker->jobTitle(),
            'description'   =>  $faker->text(50)
        ]);
    }
}
