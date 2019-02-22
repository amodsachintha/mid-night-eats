<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_menus')->insert([
            'order_id' => rand(1,5),
            'menu_id' => rand(1,2),
            'quantity' => rand(1,2),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_menus')->insert([
            'order_id' => rand(1,5),
            'menu_id' => rand(1,2),
            'quantity' => rand(1,2),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_menus')->insert([
            'order_id' => rand(1,5),
            'menu_id' => rand(1,2),
            'quantity' => rand(1,2),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_menus')->insert([
            'order_id' => rand(1,5),
            'menu_id' => rand(1,2),
            'quantity' => rand(1,2),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_menus')->insert([
            'order_id' => rand(1,5),
            'menu_id' => rand(1,2),
            'quantity' => rand(1,2),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

    }
}
