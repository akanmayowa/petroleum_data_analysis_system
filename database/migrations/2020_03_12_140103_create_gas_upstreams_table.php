<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasUpstreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_upstreams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('a_id');
            $table->year('year');
            $table->string('currentgrossassociated')->nullable();
            $table->string('currentgrossnonassociated')->nullable();
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
        Schema::dropIfExists('gas_upstreams');
    }
}
