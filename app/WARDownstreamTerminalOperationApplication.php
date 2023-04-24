<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamTerminalOperationApplication extends Model
{
    //
    protected $table = 'war_downstream_terminal_operation_application';

    protected $fillable = ['date', 'week', 'export_permit_received', 'export_permit_approved', 'establishment_received', 'establishment_approved', 'suttle_trucking_received', 'suttle_trucking_approved', 'suttle_bargingreceived', 'suttle_bargingapproved', 'tank_calibration_received', 'tank_calibration_approved', 'calibration_proving_received', 'calibration_proving_approved', 'instrument_calibration_received', 'instrument_calibration_approved', 'created_by'];
}
