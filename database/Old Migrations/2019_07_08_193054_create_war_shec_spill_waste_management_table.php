<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarShecSpillWasteManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_shec_waste_management', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('tdu_new_application');
            $table->string('tdu_approval_granted');
            $table->string('incinerator_new_application');
            $table->string('incinerator_approval_granted');
            $table->string('wbm_new_application');
            $table->string('wbm_approval_granted');
            $table->string('tank_cleaning_new_application');
            $table->string('tank_cleaning_approval_granted');
            $table->string('solid_control_new_application');
            $table->string('solid_control_approval_granted');
            $table->string('spill_clean_up_new_application');
            $table->string('spill_clean_up_approval_granted');
            $table->string('remediation_new_application');
            $table->string('remediation_approval_granted');
            $table->string('produced_water_new_application');
            $table->string('produced_water_approval_granted');
            $table->string('waste_slop_new_application');
            $table->string('waste_slop_approval_granted');
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
        Schema::dropIfExists('war_shec_waste_management');
    }
}
