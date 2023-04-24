<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpecUpstreamManualInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opec_upstream_manual_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exploratorywell');
            $table->string('developmentwell');
            $table->string('drilling');
            $table->string('eor');
            $table->integer('a_id');
            $table->year('year');
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
        Schema::dropIfExists('opec_upstream_manual_inputs');
    }
}
