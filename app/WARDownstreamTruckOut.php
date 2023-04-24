<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamTruckOut extends Model
{
    //
    protected $table = 'war_downstream_truck_out';

    protected $fillable = ['date', 'week', 'pms', 'hhk', 'ago', 'atk', 'created_by'];
}
