<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'name' => 'Menu 1',
            'image' => '1.png',
            'description_sm' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus tristique aliquam.',
            'price' => 770,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Menu 2',
            'image' => '2.png',
            'description_sm' => 'Nullam aliquam interdum risus id bibendum. Donec quam risus, pharetra sed leo ac, interdum cursus ex.',
            'price' => 350,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
