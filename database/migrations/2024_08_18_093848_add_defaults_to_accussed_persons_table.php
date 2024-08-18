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
        // Schema::table('accused_persons', function (Blueprint $table) {
        //     $table->integer('county_id')->default(1)->nullable()->change();
        //     $table->integer('constituency_id')->default(1)->nullable()->change();
        // });

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
