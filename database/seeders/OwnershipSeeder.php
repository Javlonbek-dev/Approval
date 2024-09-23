<?php

namespace Database\Seeders;

use App\Models\Ownership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnershipSeeder extends Seeder
{
    public function run(): void
    {
        Ownership::factory()->count(10)->create();
    }
}
