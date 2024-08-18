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
        Schema::create('corruption_cases_specific_case_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corruption_case_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('corruption_case_id')->references('id')->on('corruption_cases');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corruption_cases_specific_case_types');
    }
};
