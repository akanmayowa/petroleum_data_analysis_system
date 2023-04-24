<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpecCrudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opec_crudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imports')->default('0,0,0,0');
            $table->string('petchem')->default('0,0,0,0');
            $table->year('year');
            $table->string('stocks')->default('0,0,0,0');
            $table->string('diff')->default('0,0,0,0');
            $table->string('refineryintakes')->default('0,0,0,0');
            $table->string('refineryStatisticalDiff')->default('0,0,0,0');
            $table->string('refloses')->default('0,0,0,0');
            $table->string('refFuel')->default('0,0,0,0');
            $table->string('directs')->default('0,0,0,0');

            $table->string('powgen')->default('0,0,0,0');
            $table->integer('a_id')->default('0');
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
        Schema::dropIfExists('opec_crudes');
    }
}
