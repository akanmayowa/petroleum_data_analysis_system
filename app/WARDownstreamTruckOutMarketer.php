<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamTruckOutMarketer extends Model
{
    //
    protected $table = 'war_downstream_truck_out_marketer';

    protected $fillable = ['date', 'week', 'segment_id', 'pms', 'dpk', 'ago', 'created_by'];

    public function segment()
    {
        return $this->belongsTo(\App\down_market_segment::class, 'segment_id');
    }
}
