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
        Schema::create('act_executor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('act_id')->constrained('acts')->onDelete('cascade');
            $table->foreignId('executor_id')->constrained('executors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('act_executor');
    }
};
