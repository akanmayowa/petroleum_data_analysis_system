<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarDownstreamTerminalOperationApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_downstream_terminal_operation_application', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('export_permit_received');
            $table->string('export_permit_approved');
            $table->string('establishment_received');
            $table->string('establishment_approved');
            $table->string('suttle_trucking_received');
            $table->string('suttle_trucking_approved');
            $table->string('suttle_bargingreceived');
            $table->string('suttle_bargingapproved');
            $table->string('tank_calibration_received');
            $table->string('tank_calibration_approved');
            $table->string('calibration_proving_received');
            $table->string('calibration_proving_approved');
            $table->string('instrument_calibration_received');
            $table->string('instrument_calibration_approved');
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
        Schema::dropIfExists('war_downstream_terminal_operation_application');
    }
}
