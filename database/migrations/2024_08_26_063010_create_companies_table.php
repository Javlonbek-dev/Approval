<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->string('stir')->unique();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('website')->nullable();
            $table->string('manager');
            $table->string('manager_phone');
            $table->string('bank_visits')->unique();
            $table->foreignId('region_id')->constrained();
            $table->foreignId('thsht_id')->constrained();
            $table->foreignId('ifut_id')->constrained();
            $table->foreignId('dbit_id')->constrained();
            $table->softDeletes();
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
