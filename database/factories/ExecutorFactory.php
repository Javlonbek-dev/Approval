<?php

namespace Database\Factories;

use App\Models\Execution;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExecutorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'execution_id' => $this->faker->randomElement(Execution::all()->pluck('id')->toArray()),
        ];
    }
}
