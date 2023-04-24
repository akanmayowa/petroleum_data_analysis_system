<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarCorporateServiceLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_corporate_service_logistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('newly_received_vehicle');
            $table->string('fleet_utilization');
            $table->string('coaster_bus');
            $table->string('hilux');
            $table->string('cars');
            $table->string('peugeot_bus');
            $table->string('mits_p_up_van');
            $table->string('land_cruiser');
            $table->string('prado_suv');
            $table->string('hiace_bus');
            $table->string('ambulance');
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
        Schema::dropIfExists('war_corporate_service_logistics');
    }
}
