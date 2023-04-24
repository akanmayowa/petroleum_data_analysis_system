<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarGasProductionUtilizationFlareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_gas_production_utilization_flare', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->decimal('ag_produced', 20, 2);
            $table->decimal('nag_produced', 20, 2);
            $table->decimal('gas_production', 20, 2);
            $table->decimal('gas_utilization', 20, 2);
            $table->decimal('gas_flared', 20, 2);
            $table->decimal('gas_flared_perc', 8, 2);
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
        Schema::dropIfExists('war_gas_production_utilization_flare');
    }
}
