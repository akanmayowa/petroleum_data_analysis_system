<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarRevenueTaxMatterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_revenue_tax_matter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('vat');
            $table->string('paye');
            $table->string('wht');
            $table->string('third_party_bill');
            $table->string('monthly_expenditure');
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
        Schema::dropIfExists('war_revenue_tax_matter');
    }
}
