<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaboratoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'manager' => $this->faker->name(),
            'region_id' => $this->faker->randomElement(Region::all()->pluck('id')->toArray()),
            'company_id' => $this->faker->randomElement(Company::all()->pluck('id')->toArray()),
        ];
    }
}
