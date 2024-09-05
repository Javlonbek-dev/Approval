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
        Schema::create('attaches_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('act_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('report_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->string('file_type');
            $table->string('file');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attaches_files');
    }
};
