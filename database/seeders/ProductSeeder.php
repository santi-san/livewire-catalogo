<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
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
        Product::create([
            'name' => 'PlayStation 5',
            'price' => '65555',
            'stock' => '5',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'notebook i7',
            'price' => '212000',
            'stock' => '5',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'mi 9',
            'price' => '36000',
            'stock' => '12',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'Drone Mavic 2',
            'price' => '55555',
            'stock' => '15',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'nine i7',
            'price' => '999999',
            'stock' => '222',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'cocina electrica',
            'price' => '79999',
            'stock' => '25',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'Lorem ipsum dol',
            'price' => '135',
            'stock' => '1',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'dolor sit amet consectetur a',
            'price' => '745',
            'stock' => '66',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'asd qwer',
            'price' => '33335',
            'stock' => '24',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
        Product::create([
            'name' => 'teqe uts',
            'price' => '13',
            'stock' => '742',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nobis corrupti dolores labore odio. Deleniti, quaerat!',
            'image' => 'image.jpg',
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ]);
    }
}
