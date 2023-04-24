<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarCorporateServiceDiseasePatternTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_corporate_service_disease_pattern', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('arthritis');
            $table->string('malaria');
            $table->string('urti');
            $table->string('diabetes');
            $table->string('hypertension');
            $table->string('viral_syndrome');
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
        Schema::dropIfExists('war_corporate_service_disease_pattern');
    }
}
