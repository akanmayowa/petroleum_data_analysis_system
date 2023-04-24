<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARCorporateServiceMedicalService extends Model
{
    //
    protected $table = 'war_corporate_service_medical_service';

    protected $fillable = ['date', 'week', 'clinic_visit', 'referral', 'sick_leave_case', 'maternity_leave', 'health_talk', 'health_walk', 'immunization', 'canteen_visit', 'created_by'];
}
