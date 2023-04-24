<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarDownstreamRomApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_downstream_rom_application', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('suitability_inspection_received');
            $table->string('suitability_inspection_approved');
            $table->string('atc_received');
            $table->string('atc_approved');
            $table->string('pressure_test_received');
            $table->string('pressure_test_approved');
            $table->string('tank_buried_received');
            $table->string('tank_buried_approved');
            $table->string('leak_detection_received');
            $table->string('leak_detection_approved');
            $table->string('final_inspection_received');
            $table->string('final_inspection_approved');
            $table->string('renewal_inspection_received');
            $table->string('renewal_inspection_approved');
            $table->string('vessel_license_received');
            $table->string('vessel_license_approved');
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
        Schema::dropIfExists('war_downstream_rom_application');
    }
}
