<?php

namespace Database\Seeders;

use App\Models\Ifut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IfutSeeder extends Seeder
{
    public function run(): void
    {
        Ifut::factory()->count(10)->create();
    }
}
