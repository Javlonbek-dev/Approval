<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{

    public function definition(): array
    {
        return [
            'order_number' => $this->faker->unique()->bothify('?????????'),
            'order_date' => $this->faker->date(),
            'program_id' => $this->faker->randomElement(Program::all()->pluck('id')->toArray()),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
