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
        Schema::create('conclusions', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('number_out');
            $table->string('number_in');
            $table->date('date_in');
            $table->date('date_out');
            $table->string('file');
            $table->foreignId('act_id')->constrained('act');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conclusions');
    }
};