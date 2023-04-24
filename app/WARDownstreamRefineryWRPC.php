<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamRefineryWRPC extends Model
{
    //
    protected $table = 'war_downstream_refinery_wrpc';

    protected $fillable = ['date', 'week', 'pms', 'hhk', 'ago', 'atk', 'fuel_oil', 'created_by'];

    public function refinery()
    {
        return $this->belongsTo(\App\down_plant_location::class, 'refinery_id');
    }
}
