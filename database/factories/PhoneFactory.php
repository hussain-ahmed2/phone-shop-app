<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . ' Phone',
            'brand' => $this->faker->randomElement(['Apple', 'Samsung', 'OnePlus', 'Xiaomi', 'Google']),
            'price' => $this->faker->randomFloat(2, 100, 2000),
            'stock' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->sentence(),
            'specs' => json_encode([
                'RAM' => $this->faker->randomElement(['4GB', '6GB', '8GB', '12GB']),
                'Storage' => $this->faker->randomElement(['64GB', '128GB', '256GB', '512GB']),
                'Battery' => $this->faker->randomElement(['3000mAh', '4000mAh', '5000mAh']),
            ]),
            'image' => 'default.jpg', // Placeholder image
        ];
    }
}
