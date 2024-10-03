<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    public function definition(): array
    {
        return [
            'contract_number' => $this->faker->unique()->randomNumber(),
            'contract_date' => $this->faker->date(),
            'employees_count' => $this->faker->numberBetween(1, 4),
            'days_count' => $this->faker->numberBetween(1, 5),
            'application_id' => $this->faker->randomElement(Application::all()->pluck('id')->toArray()),
            'status_id' => $this->faker->randomElement(Status::all()->pluck('id')->toArray()),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
