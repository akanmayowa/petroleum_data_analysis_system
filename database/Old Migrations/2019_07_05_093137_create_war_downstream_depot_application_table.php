<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarDownstreamDepotApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('war_downstream_depot_application', function (Blueprint $table) {
            $table->increments('id');
            $table->string('week');
            $table->date('date');
            $table->string('proposal_received');
            $table->string('proposal_approved');
            $table->string('presentation_received');
            $table->string('presentation_approved');
            $table->string('assessment_received');
            $table->string('assessment_approved');
            $table->string('atc_received');
            $table->string('atc_approved');
            $table->string('presure_test_received');
            $table->string('presure_test_approved');
            $table->string('calibration_received');
            $table->string('calibration_approved');
            $table->string('final_inspection_received');
            $table->string('final_inspection_approved');
            $table->string('renewal_inspection_received');
            $table->string('renewal_inspection_approved');
            $table->string('new_lto_received');
            $table->string('new_lto_approved');
            $table->string('renewal_lto_received');
            $table->string('renewal_lto_approved');
            $table->string('import_permit_received');
            $table->string('import_permit_approved');
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
        Schema::dropIfExists('war_downstream_depot_application');
    }
}
