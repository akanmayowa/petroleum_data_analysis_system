<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarShecOtherReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_shec_other_report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('hazop');
            $table->string('rbi');
            $table->string('psv_certification');
            $table->string('leak_test');
            $table->string('rig_inspection');
            $table->string('vessel_inspection');
            $table->string('new_technologies');
            $table->string('conpliance_monitoring');
            $table->string('project_monitoring_activities');
            $table->string('facility_inspection_audit');
            $table->string('safety_training');
            $table->string('permit_withdrawal_cases');
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
        Schema::dropIfExists('war_shec_other_report');
    }
}
