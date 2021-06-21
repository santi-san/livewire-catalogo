<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');


        Category::factory(10)->create();
        $this->call(CategorySeeder::class);
        Brand::factory(10)->create();
        $this->call(BrandSeeder::class);
        Product::factory(45)->create();
        $this->call(ProductSeeder::class);
    }
}
