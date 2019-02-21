<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_images')->insert([
           'item_id' => 1,
           'url' => '1.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('item_images')->insert([
            'item_id' => 2,
            'url' => 'kingJr.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('item_images')->insert([
            'item_id' => 3,
            'url' => 'whopperJr.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('item_images')->insert([
            'item_id' => 4,
            'url' => 'cheeseburger.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
