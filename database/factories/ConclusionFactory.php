<?php

namespace Database\Factories;

use App\Models\Act;
use App\Models\Executor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConclusionFactory extends Factory
{

    public function definition(): array
    {
        return [
            'number_out' => $this->faker->randomNumber(),
            'number_in' => $this->faker->randomNumber(),
            'date_in' => $this->faker->date(),
            'date_out' => $this->faker->date(),
            'act_id' => $this->faker->randomElement(Act::all()->pluck('id')->toArray()),
            'executor_id' => $this->faker->randomElement(Executor::all()->pluck('id')->toArray()),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
