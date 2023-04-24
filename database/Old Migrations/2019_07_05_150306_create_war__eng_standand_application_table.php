<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarEngStandandApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_eng_standand_application', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('processing_plant_received');
            $table->string('processing_plant_issued');
            $table->string('pet_refinery_received');
            $table->string('pet_refinery_issued');
            $table->string('petrochemical_received');
            $table->string('petrochemical_issued');
            $table->string('oil_facility_received');
            $table->string('oil_facility_issued');
            $table->string('fert_plant_received');
            $table->string('fert_plant_issued');
            $table->string('alternate_fuel_received');
            $table->string('alternate_fuel_issued');
            $table->string('pts_received');
            $table->string('pts_issued');
            $table->string('opll_received');
            $table->string('opll_issued');
            $table->Integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('war_eng_standand_application');
    }
}
