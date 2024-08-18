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
        Schema::table('accused_persons', function (Blueprint $table) {
            // $table->foreignId('county_id')->constrained()->on('counties')->onDelete('cascade');
            // $table->foreignId('constituency_id')->constrained()->on('constituencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accused_persons', function (Blueprint $table) {
            //
        });
    }
};
