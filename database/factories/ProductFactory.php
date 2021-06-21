<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(3);
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'price' => $this->faker->randomFloat(2, 0, 99),
            'stock' => $this->faker->randomNumber(2, true),
            'description' => $this->faker->sentence(),
            'image' => 'products/' . $this->faker->image('public/storage/products', 350, 350, null, false),
            'category_id' => Category::all()->random()->id,
            'brand_id' => Brand::all()->random()->id
        ];
    }
}
