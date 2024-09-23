<?php

namespace Database\Seeders;

use App\Models\Act;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActSeeder extends Seeder
{
    public function run(): void
    {
        Act::factory()->count(10)->create();
    }
}
