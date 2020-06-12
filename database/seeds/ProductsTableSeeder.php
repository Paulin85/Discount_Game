<?php

use Illuminate\Database\Seeder;
use App\Product;

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

        for ($i=0; $i < 30 ; $i++) { 
            Product::create([
                'name' =>$faker->sentence(2),
                'slug' =>$faker->slug,
                'description' =>$faker->text,
                'price' =>$faker->numberBetween(5, 70) * 100,
                'image' =>'https://via.placeholder.com/200x250'
            ]);
        }
    }
}
