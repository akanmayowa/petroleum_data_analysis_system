<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasDepletionRate extends Model
{
    //
    protected $table = 'war_gas_depletion_rate';

    protected $fillable = ['date', 'week', 'ag_reserves', 'nag_reserves', 'ag_depletion', 'nag_depletion', 'ag_life_year', 'nag_life_year', 'created_by'];
}
