<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasReEntry extends Model
{
    //
    protected $table = 'war_gas_re_entry';

    protected $fillable = ['date', 'week', 'completion', 'workover', 'total_reserve_addition', 'expected_rate', 'created_by'];
}
