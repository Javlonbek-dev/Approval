<?php

namespace Database\Factories;

use App\Models\Dbit;
use App\Models\Ifut;
use App\Models\Region;
use App\Models\Thsht;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'stir' => $this->faker->numerify('############'),
            'website' => $this->faker->url(),
            'manager' => $this->faker->name(),
            'manager_phone' => $this->faker->phoneNumber(),
            'bank_visits' => $this->faker->numerify('##############'),
            'region_id' => $this->faker->randomElement(Region::all()->pluck('id')->toArray()),
            'thsht_id' => $this->faker->randomElement(Thsht::all()->pluck('id')->toArray()),
            'dbit_id' => $this->faker->randomElement(Dbit::all()->pluck('id')->toArray()),
            'ifut_id' => $this->faker->randomElement(Ifut::all()->pluck('id')->toArray()),
        ];
    }
}
