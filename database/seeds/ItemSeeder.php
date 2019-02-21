<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Big King XL',
            'category_id' => 1,
            'description_sm' => 'Big King XL Sandwich features more than 1/2 lb of flame-grilled 100% beef.',
            'description_lg' => 'Big King XL Sandwich features more than 1/2 lb of flame-grilled 100% beef, topped with American cheese, sliced onions, zesty pickles, crisp lettuce and our special Stacker sauce all on a toasted sesame bun.',
            'price' => 420,
            'discount' => 20.25,
            'quantity' => 100,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        DB::table('items')->insert([
            'name' => 'BACON KING™ Jr.',
            'category_id' => 1,
            'description_sm' => 'BACON KING™ Jr. features two 1/2 lb of flame-grilled 100% beef patties!.',
            'description_lg' => 'Introducing the BACON KING™ Jr. Sandwich, smaller package, same BIG taste. Two flame–grilled 100% beef patties topped with thick-cut smoked bacon, melted American cheese, ketchup and creamy mayonnaise on a toasted sesame seed bun.',
            'price' => 510,
            'discount' => 15.25,
            'quantity' => 100,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        DB::table('items')->insert([
            'name' => 'WHOPPER JR.®',
            'category_id' => 1,
            'description_sm' => 'Our WHOPPER JR.® Sandwich features one savory flame-grilled beef patty topped with juicy tomatoes!',
            'description_lg' => 'Our WHOPPER JR.® Sandwich features one savory flame-grilled beef patty topped with juicy tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles, and sliced white onions on a soft sesame seed bun.',
            'price' => 360,
            'discount' => 24.25,
            'quantity' => 100,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        DB::table('items')->insert([
            'name' => 'Cheeseburger',
            'category_id' => 1,
            'description_sm' => 'The Cheeseburger to die for!',
            'description_lg' => 'You can’t go wrong with our cheeseburger, a signature flame-grilled. beef patty topped with a simple layer of melted American cheese, crinkle cut pickles, yellow mustard, and ketchup on a toasted sesame seed bun.',
            'price' => 220,
            'discount' => 10.00,
            'quantity' => 100,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        DB::table('items')->insert([
            'name' => 'French Fries',
            'category_id' => 2,
            'description_sm' => 'Piping hot, thick cut Salted French Fries!',
            'description_lg' => 'More delicious than ever, our signature piping hot, thick cut Salted French Fries are golden on the outside and fluffy on the inside.',
            'price' => 100,
            'discount' => 0.00,
            'quantity' => 100,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        DB::table('items')->insert([
            'name' => 'Onion Rings',
            'category_id' => 2,
            'description_sm' => 'Deliciousness comes full circle!',
            'description_lg' => 'Served hot and crispy, our golden Onion Rings are the perfect treat for plunging into one of our bold or classic sauces.',
            'price' => 60,
            'discount' => 0.00,
            'quantity' => 100,
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
