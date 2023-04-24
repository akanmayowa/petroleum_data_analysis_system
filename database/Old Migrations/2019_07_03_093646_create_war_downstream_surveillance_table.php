<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarDownstreamSurveillanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_downstream_surveillance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('station_visited');
            $table->string('station_with_pms');
            $table->string('sealed_under_dispensing');
            $table->string('sealed_for_over_price');
            $table->string('sealed_for_hoarding');
            $table->string('sealed_for_diversion');
            $table->string('sealed_for_violation_of_seal');
            $table->string('other');
            $table->string('total_station_sealed');
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
        Schema::dropIfExists('war_downstream_surveillance');
    }
}
