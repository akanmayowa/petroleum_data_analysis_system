<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WAREngStandandMaintenance extends Model
{
    //
    protected $table = 'war_eng_standand_maintenance';

    protected $fillable = ['date', 'week', 'system_failure', 'system_failure_resolved', 'printer_failure', 'printer_failure_resolved', 'application_error', 'application_error_resolved', 'adhoc_issues', 'adhoc_issues_resolved', 'created_by'];
}
