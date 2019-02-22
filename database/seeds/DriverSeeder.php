<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_US');
        DB::table('drivers')->insert([
            'name' => $faker->name('male'),
            'phone' => $faker->phoneNumber,
            'image' => 'user-default-male.png',
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('drivers')->insert([
            'name' => $faker->name('male'),
            'phone' => $faker->phoneNumber,
            'image' => 'user-default-male.png',
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('drivers')->insert([
            'name' => $faker->name('male'),
            'phone' => $faker->phoneNumber,
            'image' => 'user-default-male.png',
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('drivers')->insert([
            'name' => $faker->name('male'),
            'phone' => $faker->phoneNumber,
            'image' => 'user-default-male.png',
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
