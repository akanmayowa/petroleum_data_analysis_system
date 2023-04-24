<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamSurveillance extends Model
{
    //
    protected $table = 'war_downstream_surveillance';

    protected $fillable = ['date', 'week', 'station_visited', 'station_with_pms', 'sealed_under_dispensing', 'sealed_for_over_price', 'sealed_for_hoarding', 'sealed_for_diversion', 'sealed_for_violation_of_seal', 'other', 'total_station_sealed', 'created_by'];
}
