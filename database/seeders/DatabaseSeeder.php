<?php

namespace Database\Seeders;

use App\Models\Act;
use App\Models\Application;
use App\Models\Company;
use App\Models\Dbit;
use App\Models\Ifut;
use App\Models\Laboratory;
use App\Models\Order;
use App\Models\Region;
use App\Models\Thsht;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ActFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        Ifut::factory(20)->create();
//        Thsht::factory(20)->create();
//        Dbit::factory(20)->create();
//        Region::factory(20)->create();
//        Company::factory(20)->create();
//        Laboratory::factory(20)->create();
            Application::factory(20)->create();
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
