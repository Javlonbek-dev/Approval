<?php

namespace Database\Factories;

use App\Models\Approval_Company;
use App\Models\Company;
use App\Models\Direction;
use App\Models\Laboratory;
use App\Models\Ownership;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApprovalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'register_number' => 'ML.' . $this->faker->unique()->numerify('####'),
            'accreditation_date' => $this->faker->date(),
            'validation_date' => $this->faker->date(),
            'reissue_date' => $this->faker->date(),
            'is_reissued_date' => $this->faker->boolean(),
            'full_name_supervisor' => $this->faker->name(),
            'is_fact_address' => $this->faker->boolean(),
            'phone_ao' => $this->faker->phoneNumber(),
            'email_ao' => $this->faker->email(),
            'status_date' => $this->faker->date(),
            'file_oblast' => $this->faker->filePath(),
            'is_public' => $this->faker->boolean(),
            'is_file_oblast' => $this->faker->boolean(),
            'area' => 'ml' . $this->faker->unique()->numerify('####'),
            'decision_number' => $this->faker->randomNumber(),
            'owner_ship_id' => $this->faker->randomElement(OwnerShip::pluck('id')->toArray()),
            'company_id' => $this->faker->randomElement(Company::pluck('id')->toArray()),
            'laboratory_id' => $this->faker->randomElement(Laboratory::pluck('id')->toArray()),
            'direction_id' => $this->faker->randomElement(Direction::pluck('id')->toArray()),
            'status_id' => $this->faker->randomElement(Status::pluck('id')->toArray()),
            'approval_company_id' => $this->faker->randomElement(Approval_Company::pluck('id')->toArray()),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
