<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARCrudeOilProduction extends Model
{
    //
    protected $table = 'war_up_crude_oil_production';

    protected $fillable = ['date', 'week', 'avg_oil_condensate_production', 'deferment', 'producing_companies', 'producing_field', 'shut_in_field', 'created_by'];
}
