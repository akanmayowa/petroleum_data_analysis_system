<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarDownstreamLicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_downstream_license', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('category_a_new');
            $table->string('category_a_renewal');
            $table->string('category_b_new');
            $table->string('category_b_renewal');
            $table->string('category_c_new');
            $table->string('category_c_renewal');
            $table->string('total_cat_a');
            $table->string('total_cat_b');
            $table->string('total_cat_c');
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
        Schema::dropIfExists('war_downstream_license');
    }
}
