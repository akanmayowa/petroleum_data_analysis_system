<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARSHECWasteManagement extends Model
{
    //
    protected $table = 'war_shec_waste_management';

    protected $fillable = ['date', 'week', 'tdu_new_application', 'tdu_approval_granted', 'incinerator_new_application', 'incinerator_approval_granted', 'wbm_new_application', 'wbm_approval_granted', 'tank_cleaning_new_application', 'tank_cleaning_approval_granted', 'solid_control_new_application', 'solid_control_approval_granted', 'spill_clean_up_new_application', 'spill_clean_up_approval_granted', 'remediation_new_application', 'remediation_approval_granted', 'produced_water_new_application', 'produced_water_approval_granted', 'waste_slop_new_application', 'waste_slop_approval_granted', 'created_by'];
}
