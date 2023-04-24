<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpecPetroleumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $var = ['producttransQ1', 'producttransQ2', 'producttransQ3', 'producttransQ4', 'interproductQ1', 'interproductQ2', 'interproductQ3', 'interproductQ4', 'stockchangeQ1', 'stockchangeQ2', 'stockchangeQ3', 'stockchangeQ4', 'demandQ1', 'demandQ2', 'demandQ3', 'demandQ4', 'statisticalDifferenceQ1', 'statisticalDifferenceQ2', 'statisticalDifferenceQ3', 'statisticalDifferenceQ4', 'closingStockQ1', 'closingStockQ2', 'closingStockQ3', 'closingStockQ4', 'memoItemsQ1', 'memoItemsQ2', 'memoItemsQ3', 'memoItemsQ4', 'petchemDeliveryQ1', 'petchemDeliveryQ2', 'petchemDeliveryQ3', 'petchemDeliveryQ4', 'powGenDeliveryQ1', 'powGenDeliveryQ2', 'powGenDeliveryQ3', 'powGenDeliveryQ4', 'intertnationalBunckerQ1', 'intertnationalBunckerQ2', 'intertnationalBunckerQ3', 'intertnationalBunckerQ4'];

    public function up()
    {
        Schema::create('opec_petroleums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('a_id');
            $table->integer('year');
            foreach ($this->var as $val) {
                $table->string($val);
            }
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
        Schema::dropIfExists('opec_petroleums');
    }
}
