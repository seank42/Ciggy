<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciggy>
 */
class CiggyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->word,
            'type' => $this->faker->text(50),
            'price' => $this->faker->decimal(10),
            'amount' => $this->faker->name
        ];
    }
}
