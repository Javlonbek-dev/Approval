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
        Schema::create('attach_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('act_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('report_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->json('file');
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('program_id')->references('id')->on('programs');

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
