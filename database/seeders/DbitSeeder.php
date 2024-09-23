<?php

namespace Database\Seeders;

use App\Models\Dbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DbitSeeder extends Seeder
{
    public function run(): void
    {
        Dbit::factory()->count(10)->create();
    }
}
