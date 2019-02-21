<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new \App\City([
            'name' => 'Kaduwela',
            'delivery_charge' => 30,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        $city->save();
        $city = new \App\City([
            'name' => 'Malabe',
            'delivery_charge' => 30,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        $city->save();
        $city = new \App\City([
            'name' => 'Pittugala',
            'delivery_charge' => 20,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        $city->save();
    }
}
