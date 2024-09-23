<?php

namespace Database\Seeders;

use App\Models\Resolution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResolutionSeeder extends Seeder
{
    public function run(): void
    {
        Resolution::factory()->count(10)->create();
    }
}
