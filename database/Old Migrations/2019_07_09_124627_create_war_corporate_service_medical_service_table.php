<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarCorporateServiceMedicalServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_corporate_service_medical_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('clinic_visit');
            $table->string('referral');
            $table->string('sick_leave_case');
            $table->string('maternity_leave');
            $table->string('health_talk');
            $table->string('health_walk');
            $table->string('immunization');
            $table->string('canteen_visit');
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
        Schema::dropIfExists('war_corporate_service_medical_service');
    }
}
