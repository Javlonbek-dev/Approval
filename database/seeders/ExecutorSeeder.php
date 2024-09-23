<?php

namespace Database\Seeders;

use App\Models\Executor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExecutorSeeder extends Seeder
{
    public function run(): void
    {
        Executor::factory()->count(20)->create();
    }
}
