<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarRevenueFadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_revenue_fad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('revenue');
            $table->string('revenue_receipt_issued');
            $table->string('fund_transfer');
            $table->string('personnel_cost');
            $table->string('medical_bill_transfer');
            $table->string('outsorced_secuirity_services');
            $table->string('outsorced_cleaning_services');
            $table->string('penalty_fee');
            $table->string('overhead_allocation');
            $table->string('salary_allowance');
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
        Schema::dropIfExists('war_revenue_fad');
    }
}
