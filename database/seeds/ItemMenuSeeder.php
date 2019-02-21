<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_menu')->insert([
            'item_id' => 1,
            'menu_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('item_menu')->insert([
            'item_id' => 5,
            'menu_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('item_menu')->insert([
            'item_id' => 6,
            'menu_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('item_menu')->insert([
            'item_id' => 2,
            'menu_id' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('item_menu')->insert([
            'item_id' => 5,
            'menu_id' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
