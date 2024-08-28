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
            $table->integer('parent_id');
            $table->string('register_number');
            $table->date('accreditation_date');
            $table->date('validity_date');
            $table->date('reissue_date');
            $table->boolean('is_reissued_date');
            $table->string('full_name_supervisor')->nullable();
            $table->date('status_date')->nullable();
            $table->string('file_oblast');
            $table->boolean('is_public')->nullable();
            $table->string('area');
            $table->foreignId('owner_ship_id')->constrained()->onDelete('cascade');
            $table->foreignId('direction_id')->constrained()->onDelete('cascade');
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
