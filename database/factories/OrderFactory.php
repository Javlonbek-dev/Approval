<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    public function definition(): array
    {
        return [
            'order_number'=>$this->faker->unique()->bothify('?????????'),
        ];
    }
}
