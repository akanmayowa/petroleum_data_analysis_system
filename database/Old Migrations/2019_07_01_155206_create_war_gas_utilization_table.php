<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarGasUtilizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_gas_utilization', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->decimal('fuel_gas', 20, 2);
            $table->decimal('gas_lift', 20, 2);
            $table->decimal('gas_reinjection', 20, 2);
            $table->decimal('ngl_lpg', 20, 2);
            $table->decimal('gas_to_ipp', 20, 2);
            $table->decimal('local_supply', 8, 2);
            $table->decimal('gas_export', 8, 2);
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
        Schema::dropIfExists('war_gas_utilization');
    }
}
