<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamRefineryTotal extends Model
{
    //
    protected $table = 'war_downstream_refinery_total';

    protected $fillable = ['date', 'week', 'refinery_id', 'pms', 'hhk', 'ago', 'atk', 'fuel_oil', 'created_by'];
}
