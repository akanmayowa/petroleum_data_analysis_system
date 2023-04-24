<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamDepotApplication extends Model
{
    //
    protected $table = 'war_downstream_depot_application';

    protected $fillable = ['date', 'week', 'proposal_received', 'proposal_approved', 'presentation_received', 'presentation_approved', 'assessment_received', 'assessment_approved', 'atc_received', 'atc_approved', 'presure_test_received', 'presure_test_approved', 'calibration_received', 'calibration_approved', 'final_inspection_received', 'final_inspection_approved', 'renewal_inspection_received', 'renewal_inspection_approved', 'new_lto_received', 'new_lto_approved', 'renewal_lto_received', 'renewal_lto_approved', 'import_permit_received', 'import_permit_approved', 'created_by'];
}
