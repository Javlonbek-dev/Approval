<?php

namespace Database\Seeders;

use App\Models\Execution;
use App\Models\Executor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExecutionSeeder extends Seeder
{
    public function run(): void
    {
        Execution::factory()->count(20)->create();
    }
}
