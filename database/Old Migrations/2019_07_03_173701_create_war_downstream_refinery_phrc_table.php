<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarDownstreamRefineryPhrcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_downstream_refinery_phrc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_id');
            $table->string('week');
            $table->date('date');
            $table->string('pms');
            $table->string('hhk');
            $table->string('ago');
            $table->string('atk');
            $table->string('fuel_oil');
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
        Schema::dropIfExists('war_downstream_refinery_phrc');
    }
}
