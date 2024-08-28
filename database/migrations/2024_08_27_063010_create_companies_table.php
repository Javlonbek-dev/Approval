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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('companies');
            $table->string('name');
            $table->string('stir')->unique();
            $table->string('dbit');
            $table->string('ifut');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('manager');
            $table->foreignId('region_id')->constrained('regions');
            $table->foreignId('thsht_id')->constrained('thshts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
