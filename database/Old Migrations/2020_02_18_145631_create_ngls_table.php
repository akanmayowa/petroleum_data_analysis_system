<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNglsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableColumns = ['gasPlant', 'others', 'total', 'memoEthane', 'associate_production', 'estTotal', 'imports', 'directUse', 'stocks', 'change', 'refIntake', 'statisticalDiff', 'memeItems', 'refFuel', 'petChem', 'powGen'];

        Schema::create('ngls', function (Blueprint $table) use ($tableColumns) {
            $table->increments('id');
            $table->year('year');
            $table->integer('a_id');
            foreach ($tableColumns as $column) {
                $table->string($column);
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
        Schema::dropIfExists('ngls');
    }
}
