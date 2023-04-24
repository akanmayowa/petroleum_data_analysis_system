<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARFDPApplication extends Model
{
    //
    protected $table = 'war_up_fdp_application';

    protected $fillable = ['date', 'week', 'application_received', 'application_approved', 'production_rate', 'expected_reserve', 'total_cost', 'created_by'];
}
