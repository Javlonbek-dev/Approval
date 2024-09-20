<?php

namespace Database\Factories;

use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{

    public function definition(): array
    {
        return [
            'number_in' => $this->faker->numberBetween(1, 100),
            'number_out' => $this->faker->numberBetween(1, 100),
            'date_in' => $this->faker->date(),
            'date_out' => $this->faker->date(),
            'laboratory_id' => $this->faker->randomElement(Laboratory::all()->pluck('id')->toArray()),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
