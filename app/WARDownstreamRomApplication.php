<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamRomApplication extends Model
{
    //
    protected $table = 'war_downstream_rom_application';

    protected $fillable = ['date', 'week', 'suitability_inspection_received', 'suitability_inspection_approved', 'atc_received', 'atc_approved', 'pressure_test_received', 'pressure_test_approved', 'tank_buried_received', 'tank_buried_approved', 'leak_detection_received', 'leak_detection_approved', 'final_inspection_received', 'final_inspection_approved', 'renewal_inspection_received', 'renewal_inspection_approved', 'vessel_license_received', 'vessel_license_approved', 'created_by'];
}
