<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'pc'
        ]);
        Category::create([
            'name' => 'smartphones'
        ]);
        Category::create([
            'name' => 'tablets'
        ]);
        Category::create([
            'name' => 'notebooks'
        ]);
        Category::create([
            'name' => 'drones'
        ]);
        Category::create([
            'name' => 'consolas'
        ]);
        Category::create([
            'name' => 'bicis'
        ]);
        Category::create([
            'name' => 'scooters'
        ]);
        Category::create([
            'name' => 'motos'
        ]);
        Category::create([
            'name' => 'cocinas'
        ]);
        Category::create([
            'name' => 'lavarropas'
        ]);
        Category::create([
            'name' => 'secarropas'
        ]);
    }
}
