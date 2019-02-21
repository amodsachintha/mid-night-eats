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
    }
}
