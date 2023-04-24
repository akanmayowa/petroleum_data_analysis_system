<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasSupplyObligation extends Model
{
    //
    protected $table = 'war_gas_supply_obligation';

    protected $fillable = ['date', 'week', 'allocated_dgso', 'dom_gas_supply', 'dgso_performance', 'created_by'];
}
