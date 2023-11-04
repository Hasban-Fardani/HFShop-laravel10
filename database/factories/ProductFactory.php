<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "name" => $this->faker->word(),
            "description" => $this->faker->sentence(),
            "stok" => $this->faker->numberBetween(5, 1000),
            "category_id" => $this->faker->numberBetween(1,3),
            "rating" => $this->faker->numberBetween(1, 10),
            "seller_id" => 1,
            "image" => $this->faker->imageUrl(),
            "price"=> $this->faker->randomFloat(2,50000,10000000),
        ];
    }
}
