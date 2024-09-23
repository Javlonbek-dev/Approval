<?php

namespace Database\Factories;

use App\Models\Approval_Company;
use App\Models\Conclusion;
use Illuminate\Database\Eloquent\Factories\Factory;


class ResolutionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'resolution_number' => $this->faker->randomNumber(),
            'resolution_date' => $this->faker->date(),
            'conclusion_id' => $this->faker->randomElement(Conclusion::all()->pluck('id')->toArray()),
            'approval_company_id' => $this->faker->randomElement(Approval_Company::all()->pluck('id')->toArray()),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
