<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WAREngStandandApplication extends Model
{
    //
    protected $table = 'war_eng_standand_application';

    protected $fillable = ['date', 'week', 'processing_plant_received', 'processing_plant_issued', 'pet_refinery_received', 'pet_refinery_issued', 'petrochemical_received', 'petrochemical_issued', 'oil_facility_received', 'oil_facility_issued', 'fert_plant_received', 'fert_plant_issued', 'alternate_fuel_received', 'alternate_fuel_issued', 'pts_received', 'pts_issued', 'opll_received', 'opll_issued', 'created_by'];
}
