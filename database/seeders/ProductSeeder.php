<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(200)->create()->each(function (Product $product){
            for ($i=0; $i < 5; $i++) {
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => fake()->imageUrl(),
                ]);
            }
        });
    }
}
