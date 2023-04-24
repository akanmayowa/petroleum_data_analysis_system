<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarEngStandandMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_eng_standand_maintenance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('system_failure');
            $table->string('system_failure_resolved');
            $table->string('printer_failure');
            $table->string('printer_failure_resolved');
            $table->string('application_error');
            $table->string('application_error_resolved');
            $table->string('adhoc_issues');
            $table->string('adhoc_issues_resolved');
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
        Schema::dropIfExists('war_eng_standand_maintenance');
    }
}
