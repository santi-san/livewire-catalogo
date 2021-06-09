<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->randomFloat(2),
            'stock' => $this->faker->randomNumber(2, true),
            'description' => $this->faker->sentence(),
            'image' => 'products/' . $this->faker->image('public/storage/products', 350, 350, null, false),
            'category_id' => $this->faker->randomNumber(2, true),
            'brand_id' => $this->faker->randomNumber(2, true)
        ];
    }
}
