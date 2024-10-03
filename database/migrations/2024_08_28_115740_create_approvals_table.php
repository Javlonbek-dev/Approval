<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('register_number')->unique();
            $table->date('accreditation_date');
            $table->date('validation_date');
            $table->date('reissue_date')->nullable();
            $table->boolean('is_reissued_date');
            $table->string('full_name_supervisor')->nullable();
            $table->boolean('is_fact_address');
            $table->string('phone_ao')->nullable();
            $table->string('email_ao')->nullable();
            $table->date('status_date');
            $table->string('file_oblast');
            $table->boolean('is_public')->nullable();
            $table->boolean('is_file_oblast')->nullable();
            $table->string('area');
            $table->string('decision_number')->unique();
            $table->foreignId('owner_ship_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('laboratory_id')->constrained();
            $table->foreignId('direction_id')->constrained();
            $table->foreignId('status_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('approval_company_id')->constrained();
            $table->foreignId('created_by')->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
