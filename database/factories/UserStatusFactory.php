<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'from_date' => $this->faker->date(),
            'till_date' => $this->faker->date(),
        ];
    }
}
