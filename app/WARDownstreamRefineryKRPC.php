<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamRefineryKRPC extends Model
{
    //
    protected $table = 'war_downstream_refinery_krpc';

    protected $fillable = ['date', 'week', 'pms', 'hhk', 'ago', 'atk', 'fuel_oil', 'created_by'];
}
