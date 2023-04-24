<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARCorporateServiceStaffMatter extends Model
{
    //
    protected $table = 'war_corporate_service_staff_matters';

    protected $fillable = ['date', 'week', 'staff_strength', 'retired', 'deceased', 'commence_annual_leave', 'resumed_annaul_leave', 'new_disiplinary_case', 'contractor_registered', 'local_training', 'overseas_training', 'created_by'];
}
