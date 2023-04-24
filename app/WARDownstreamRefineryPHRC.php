<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamRefineryPHRC extends Model
{
    //
    protected $table = 'war_downstream_refinery_phrc';

    protected $fillable = ['type_id', 'date', 'week', 'pms', 'hhk', 'ago', 'atk', 'fuel_oil', 'created_by'];
}
