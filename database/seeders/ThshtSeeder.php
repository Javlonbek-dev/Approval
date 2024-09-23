<?php

namespace Database\Seeders;

use App\Models\Thsht;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThshtSeeder extends Seeder
{
    public function run(): void
    {
        Thsht::factory()->count(10)->create();
    }
}
