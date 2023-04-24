<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARSHECApplication extends Model
{
    //
    protected $table = 'war_shec_application';

    protected $fillable = ['date', 'week', 'environment_application_receiced', 'environment_application_issued', 'discharge_permit_receiced', 'discharge_permit_issued', 'radiation_safety_permit_receiced', 'radiation_safety_permit_issued', 'safety_case_permit_receiced', 'safety_case_permit_issued', 'lab_accredition_receiced', 'lab_accredition_issued', 'chemical_application_receiced', 'chemical_application_issued', 'registration_application_received', 'registration_application_issued', 'created_by'];
}
