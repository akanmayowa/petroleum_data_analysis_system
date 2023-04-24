<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarDownstreamDepotStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_downstream_depot_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('pms_open_stock');
            $table->string('pms_reciept');
            $table->string('pms_lifting_transfer');
            $table->string('pms_closing_stock');
            $table->string('dpk_open_stock');
            $table->string('dpk_reciept');
            $table->string('dpk_lifting_transfer');
            $table->string('dpk_closing_stock');
            $table->string('ago_open_stock');
            $table->string('ago_reciept');
            $table->string('ago_lifting_transfer');
            $table->string('ago_closing_stock');
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
        Schema::dropIfExists('war_downstream_depot_stock');
    }
}
