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
        Schema::create('county_categogory_pricing', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->double('budget_cost')->nullable();
            $table->integer('county_id')->default(1);            
            $table->integer('ranking')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('county_categogory_pricing');
    }
};
