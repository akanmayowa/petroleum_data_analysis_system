<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarShecApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_shec_application', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('environment_application_receiced');
            $table->string('environment_application_issued');
            $table->string('discharge_permit_receiced');
            $table->string('discharge_permit_issued');
            $table->string('radiation_safety_permit_receiced');
            $table->string('radiation_safety_permit_issued');
            $table->string('safety_case_permit_receiced');
            $table->string('safety_case_permit_issued');
            $table->string('lab_accredition_receiced');
            $table->string('lab_accredition_issued');
            $table->string('chemical_application_receiced');
            $table->string('chemical_application_issued');
            $table->string('registration_application_received');
            $table->string('registration_application_issued');
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
        Schema::dropIfExists('war_shec_application');
    }
}
