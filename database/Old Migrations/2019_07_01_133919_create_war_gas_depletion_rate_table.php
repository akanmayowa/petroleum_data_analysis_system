<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarGasDepletionRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_gas_depletion_rate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->decimal('ag_reserves', 20, 2);
            $table->decimal('nag_reserves', 20, 2);
            $table->decimal('ag_depletion', 8, 2);
            $table->decimal('nag_depletion', 8, 2);
            $table->string('ag_life_string');
            $table->string('nag_life_year');
            $table->integer('created_by');
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
        Schema::dropIfExists('war_gas_depletion_rate');
    }
}
