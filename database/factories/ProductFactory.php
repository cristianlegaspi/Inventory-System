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
        $categories = ['Dishwashing', 'Car', 'Pet', 'Toilet', 'Laundry', 'Others'];
        $types =['Retail', 'Reseller', 'Retail'];
        $unit = ['Refill', 'Gallon', 'Drum'];

        return [
         
            'name' => $this->faker->word,
            'description' => $this->faker->sentence(),
            'category' => $this->faker->randomElement($categories),
            'qty' => $this->faker->numberBetween(1,100),
            'unit' => $this->faker->randomElement($unit),
            'type' => $this->faker->randomElement($types),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
