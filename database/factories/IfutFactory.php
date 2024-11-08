<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IfutFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name_extend'=>$this->faker->word(),
            'code'=>$this->faker->numerify('####'),
        ];
    }
}
