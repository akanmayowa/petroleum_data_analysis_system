<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUpProcessingPlantProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('up_processing_plant_project', function (Blueprint $table) {
            $table->string('quality')->nullable();
            $table->integer('end_quarter')->nullable();
            $table->integer('capacity_increment')->nullable();
            $table->integer('capex_investment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('up_processing_plant_project', function (Blueprint $table) {
            $table->dropColumn('quality');
            $table->dropColumn('end_quarter');
            $table->dropColumn('capacity_increment');
            $table->dropColumn('capex_investment');
        });
    }
}
