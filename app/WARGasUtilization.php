<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasUtilization extends Model
{
    //
    protected $table = 'war_gas_utilization';

    protected $fillable = ['date', 'week', 'fuel_gas', 'gas_lift', 'gas_reinjection', 'ngl_lpg', 'gas_to_ipp', 'local_supply', 'gas_export', 'created_by'];
}
