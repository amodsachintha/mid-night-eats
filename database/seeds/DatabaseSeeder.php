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
        $this->call(CategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ItemImageSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ItemMenuSeeder::class);
        $this->call(DriverSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(OrderMenuSeeder::class);
    }
}
