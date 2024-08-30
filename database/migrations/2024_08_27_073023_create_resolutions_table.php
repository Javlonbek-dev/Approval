<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('resolution_number');
            $table->date('resolution_date');
            $table->foreignId('conclusion_id')->constrained();
            $table->foreignId('approval_company_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resolutions');
    }
};
