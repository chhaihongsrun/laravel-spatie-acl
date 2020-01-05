<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	foreach (range(1,10) as $index) {
	        DB::table('products')->insert([
	            'name' => $faker->name,
	            'detail' => $faker->text,
	        ]);
        }
    }
}
