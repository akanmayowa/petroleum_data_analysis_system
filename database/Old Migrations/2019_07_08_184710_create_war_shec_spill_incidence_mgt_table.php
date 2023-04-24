<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarShecSpillIncidenceMgtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_shec_spill_incidence_mgt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('spill_number');
            $table->string('spill_volume');
            $table->string('quantity_recoverd');
            $table->string('jiv_conducted');
            $table->string('community_issued');
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
        Schema::dropIfExists('war_shec_spill_incidence_mgt');
    }
}
