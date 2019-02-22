<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payTypes = ['CC', 'COD'];
        DB::table('orders')->insert([
            'order_code' => md5(random_bytes(8)),
            'user_id' => rand(1, 2),
            'address_id' => rand(1, 3),
            'driver_id' => rand(1, 3),
            'payment_type' => $payTypes[rand(0, 1)],
            'amount' => rand(500, 2400) . '.' . rand(0, 99),
            'status' => rand(1, 3),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('orders')->insert([
            'order_code' => md5(random_bytes(8)),
            'user_id' => rand(1, 2),
            'address_id' => rand(1, 3),
            'driver_id' => rand(1, 3),
            'payment_type' => $payTypes[rand(0, 1)],
            'amount' => rand(500, 2400) . '.' . rand(0, 99),
            'status' => rand(1, 3),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('orders')->insert([
            'order_code' => md5(random_bytes(8)),
            'user_id' => rand(1, 2),
            'address_id' => rand(1, 3),
            'driver_id' => rand(1, 3),
            'payment_type' => $payTypes[rand(0, 1)],
            'amount' => rand(500, 2400) . '.' . rand(0, 99),
            'status' => rand(1, 3),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('orders')->insert([
            'order_code' => md5(random_bytes(8)),
            'user_id' => rand(1, 2),
            'address_id' => rand(1, 3),
            'driver_id' => rand(1, 3),
            'payment_type' => $payTypes[rand(0, 1)],
            'amount' => rand(500, 2400) . '.' . rand(0, 99),
            'status' => rand(1, 3),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('orders')->insert([
            'order_code' => md5(random_bytes(8)),
            'user_id' => rand(1, 2),
            'address_id' => rand(1, 3),
            'driver_id' => rand(1, 3),
            'payment_type' => $payTypes[rand(0, 1)],
            'amount' => rand(500, 2400) . '.' . rand(0, 99),
            'status' => rand(1, 3),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
