<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARSHECIncidenceMgt extends Model
{
    //
    protected $table = 'war_shec_incidence_mgt';

    protected $fillable = ['date', 'week', 'incidence_accident', 'fatal_incidence', 'fatalities', 'work_related', 'non_work_related', 'created_by'];
}
