<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewCategory>
 */
class NewCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_name'=>$this->faker->name(),
            'category_image'=>$this->faker->imageUrl(640,480),
            'description'=>$this->faker->text(),
        ];
    }
}
