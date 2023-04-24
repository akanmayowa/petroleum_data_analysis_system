<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasDrilling extends Model
{
    //
    protected $table = 'war_gas_drilling';

    protected $fillable = ['date', 'week', 'exploration_commenced', 'exploration_ongoing', 'exploration_completed', 'appraisal_commenced', 'appraisal_ongoing', 'appraisal_completed', 'development_commenced', 'development_ongoing', 'development_completed', 'well_completion', 'well_spudded', 'created_by'];
}
