<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
//            ThshtSeeder::class,
//            DbitSeeder::class,
//            IfutSeeder::class,
//            StatusSeeder::class,
//            UserStatusSeeder::class,
//            ApprovalCompanySeeder::class,
//            ExecutionSeeder::class,
//            ExecutorSeeder::class,
//            RegionSeeder::class,
//            CompanySeeder::class,
//            LaboratorySeeder::class,
//            ApplicationSeeder::class,
////            CalculateSeeder::class,
//            ContractSeeder::class,
//            ProgramSeeder::class,
//            OrderSeeder::class,
//            RegionSeeder::class,
//            ActSeeder::class,
//            ConclusionSeeder::class,
//            ResolutionSeeder::class,
//            OwnershipSeeder::class,
//            DirectionSeeder::class,
//            ApprovalSeeder::class,
        ]);
    }
}
