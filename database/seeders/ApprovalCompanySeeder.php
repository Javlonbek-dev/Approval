<?php

namespace Database\Seeders;

use App\Models\Approval_Company;
use Illuminate\Database\Seeder;

class ApprovalCompanySeeder extends Seeder
{
    public function run(): void
    {
        Approval_Company::factory()->count(10)->create();
    }
}
