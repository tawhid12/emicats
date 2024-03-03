<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Component;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()->count(5)->create();
        foreach ($products as $product) {
            $brands = Brand::inRandomOrder()->limit(5)->get();
            $product->brands()->sync($brands->pluck('id'));
        }
        foreach ($products as $product) {
            $carmodels = CarModel::inRandomOrder()->limit(5)->get();
            $product->carmodels()->sync($carmodels->pluck('id'));
        }
        foreach ($products as $product) {
            $components = Component::inRandomOrder()->limit(5)->get();
            $product->components()->sync($components->pluck('id'));
        }
    }
}
