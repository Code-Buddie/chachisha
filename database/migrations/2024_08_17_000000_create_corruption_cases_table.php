<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorruptionCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corruption_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('country_id');
            $table->string('case_number');
            $table->string('case_title');
            $table->string('court');
            $table->text('case_summary');
            $table->date('case_start_date');
            $table->date('date_of_judgement')->nullable();
            $table->string('impact');
            $table->boolean('publicly_visible');
            $table->string('ref_url')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('country_id')->references('id')->on('countries');
            // $table->foreign('sector_id')->references('id')->on('sectors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corruption_cases');
    }
}

