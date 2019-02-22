<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_US');
        DB::table('addresses')->insert([
            'user_id' => rand(1, 2),
            'phone' => '077' . strval(rand(4840329, 9999999)),
            'address_line_1' => $faker->buildingNumber,
            'address_line_2' => $faker->streetName,
            'address_line_3' => $faker->streetAddress,
            'city_id' => rand(1, 3),
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('addresses')->insert([
            'user_id' => rand(1, 2),
            'phone' => '077' . strval(rand(4840329, 9999999)),
            'address_line_1' => $faker->buildingNumber,
            'address_line_2' => $faker->streetName,
            'address_line_3' => $faker->streetAddress,
            'city_id' => rand(1, 3),
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('addresses')->insert([
            'user_id' => rand(1, 2),
            'phone' => '077' . strval(rand(4840329, 9999999)),
            'address_line_1' => $faker->buildingNumber,
            'address_line_2' => $faker->streetName,
            'address_line_3' => $faker->streetAddress,
            'city_id' => rand(1, 3),
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('addresses')->insert([
            'user_id' => rand(1, 2),
            'phone' => '077' . strval(rand(4840329, 9999999)),
            'address_line_1' => $faker->buildingNumber,
            'address_line_2' => $faker->streetName,
            'address_line_3' => $faker->streetAddress,
            'city_id' => rand(1, 3),
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('addresses')->insert([
            'user_id' => rand(1, 2),
            'phone' => '077' . strval(rand(4840329, 9999999)),
            'address_line_1' => $faker->buildingNumber,
            'address_line_2' => $faker->streetName,
            'address_line_3' => $faker->streetAddress,
            'city_id' => rand(1, 3),
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
