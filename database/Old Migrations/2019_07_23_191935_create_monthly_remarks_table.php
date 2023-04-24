<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_remarks', function (Blueprint $table) {
            $table->increments('id');
            $table->year('year');
            $table->date('month');
            $table->string('division');
            $table->string('tab_name');
            $table->string('row_name');
            $table->text('remark');
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
        Schema::dropIfExists('monthly_remarks');
    }
}
