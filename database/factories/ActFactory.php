<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'act_date' => $this->faker->date(),
            'act_number' => $this->faker->randomNumber(),
            'order_id' => $this->faker->randomElement(Order::all()->pluck('id')->toArray()),
            'status_id' => $this->faker->rANDomElement(Status::all()->pluck('id')->toArray()),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
