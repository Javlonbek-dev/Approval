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
        Schema::create('order_executor', function (Blueprint $table) {
           $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
           $table->foreignId('executor_id')->constrained('executors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_executor');
    }
};
