<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->text('charge');
            $table->unsignedBigInteger('case_id');
            $table->unsignedBigInteger('person_id');
            $table->string('date_of_offence');
            $table->string('plea');
            $table->string('amount')->nullable();
            $table->string('type_of_asset')->nullable();
            $table->unsignedBigInteger('resolution_id');
            $table->unsignedBigInteger('type_of_judgement_id');
            $table->text('sentence')->nullable();
            $table->string('fine_issued', )->nullable();
            $table->string('assets_recovered')->nullable();
            $table->string('value', )->nullable();
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('case_id')->references('id')->on('corruption_cases');
            // $table->foreign('person_id')->references('id')->on('accused_persons');
            // $table->foreign('resolution_id')->references('id')->on('case_resolutions');
            // $table->foreign('type_of_judgement_id')->references('id')->on('types_of_judgement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charges');
    }
}
