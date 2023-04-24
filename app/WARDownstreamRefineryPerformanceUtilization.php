<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamRefineryPerformanceUtilization extends Model
{
    //
    protected $table = 'war_downstream_refinery_performance_utilization';

    protected $fillable = ['refinery_id', 'date', 'week', 'install_capacity', 'opening_stock', 'crude_receipt', 'crude_processed', 'closing_stock', 'capacity_utilization', 'created_by'];

    public function refinery()
    {
        return $this->belongsTo(\App\down_plant_location::class, 'refinery_id');
    }
}
