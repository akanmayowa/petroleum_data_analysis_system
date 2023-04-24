<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDepletionRate extends Model
{
    //
    protected $table = 'war_up_depletion_rate';

    protected $fillable = ['date', 'week', 'annual_production_oil', 'annual_production_condensate', 'depletion_rate_oil', 'depletion_rate_condensate', 'year_start_reserve_oil', 'year_start_reserve_condensate', 'life_index_oil', 'life_index_condensate', 'created_by'];
}
