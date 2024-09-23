<?php

namespace Database\Seeders;

use App\Models\Conclusion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConclusionSeeder extends Seeder
{
    public function run(): void
    {
        Conclusion::factory()->count(10)->create();
    }
}
