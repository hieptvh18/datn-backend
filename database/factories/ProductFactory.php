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
    public function definition()
    {
        return [
            'type_id'=> $this->faker->numberBetween(2,10),
            'name'=> $this->faker->name(),
            'price'=> $this->faker->numberBetween(50000,30000000),
            'image'=> $this->faker->imageUrl(640,480),
            'description'=> $this->faker->text(),
        ];
    }
}
