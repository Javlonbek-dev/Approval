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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('number_out');
            $table->string('number_in');
            $table->date('date_out');
            $table->date('date_in');
            $table->string('report_file');
            $table->foreignId('act_id')->constrained('act')->onDelete('cascade');
            $table->foreignId('executor_id')->constrained('executors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
