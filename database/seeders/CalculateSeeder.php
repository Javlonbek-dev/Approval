<?php

namespace Database\Seeders;

use App\Models\Calculate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalculateSeeder extends Seeder
{
    public function run(): void
    {
        Calculate::factory()->count(30)->create();
    }
}
