<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CalculateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'count'=>$this->faker->numberBetween(1,110),
            'pracent'=>$this->faker->numberBetween(1,148),
            'price'=>$this->faker->numberBetween(8500000,50320000),
            'link'=>$this->faker->text
        ];
    }
}
