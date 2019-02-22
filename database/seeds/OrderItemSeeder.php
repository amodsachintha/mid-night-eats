<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('order_items')->insert([
            'order_id' => rand(1,5),
            'item_id' => rand(1,6),
            'quantity' => rand(1,4),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
