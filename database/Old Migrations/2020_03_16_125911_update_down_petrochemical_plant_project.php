<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDownPetrochemicalPlantProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tables = ['gas_summary_of_gas_utilization', 'es_licensed_refinery_project'];

    public function up()
    {
        //
        Schema::table('down_petrochemical_plant_project', function (Blueprint $table) {
            // $table->integer('pending_id')->default(0);
            $table->string('project_desc_by_unit')->default(0);
            $table->string('feed')->default(0);
        });

        foreach ($this->tables as $table1) {
            Schema::table($table1, function (Blueprint $table) {
                // $table->integer('pending_id')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *update_down_crude_export_by_destination
     * @return void
     */
    public function down()
    {
        //
        Schema::table('down_petrochemical_plant_project', function (Blueprint $table) {
            $table->dropColumn('pending_id');
            $table->dropColumn('project_desc_by_unit');
            $table->dropColumn('feed');
        });

        foreach ($this->tables as $table1) {
            Schema::table($table1, function (Blueprint $table) {
                $table->dropColumn('pending_id');
            });
        }
    }
}
