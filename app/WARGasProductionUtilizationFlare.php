<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasProductionUtilizationFlare extends Model
{
    //
    protected $table = 'war_gas_production_utilization_flare';

    protected $fillable = ['date', 'week', 'ag_produced', 'nag_produced', 'gas_production', 'gas_utilization', 'gas_flared', 'gas_flared_perc', 'created_by'];
}
