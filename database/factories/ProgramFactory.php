<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{

    public function definition(): array
    {
        return [
            'program_number' => $this->faker->randomNumber(),
            'program_date' => $this->faker->date(),
            'assessment_period' => $this->faker->date(),
            'contract_id'=>$this->faker->randomElement(Contract::all()->pluck('id')->toArray()),
            'status_id'=>$this->faker->randomElement(Status::all()->pluck('id')->toArray()),
            'created_by'=>1,
            'updated_by'=>1,
        ];
    }
}
