<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherPrimariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_primaries', function (Blueprint $table) {
            $table->increments('id');
            $fillable = ['year', 'a_id', 'production', 'gtl', 'ctl', 'others', 'imports', 'exports', 'product', 'direct_use', 'stock', 'change', 'ref_intake', 'statistical_diff', 'ref_loses', 'ref_fuel', 'delivery_to_petchem', 'delivery_power_gen'];
            foreach ($fillable as $fill) {
                $table->string($fill)->nullable();
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
        Schema::dropIfExists('other_primaries');
    }
}
