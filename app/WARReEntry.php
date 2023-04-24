<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARReEntry extends Model
{
    //
    protected $table = 'war_up_well_re_entry';

    protected $fillable = ['date', 'week', 're_entry_commenced', 're_entry_ongoing', 're_entry_completed', 'workover_commenced', 'workover_ongoing', 'workover_completed', 're_entry_completion', 're_entry_workover', 're_entry_reserve_addition', 'well_expected_rate', 'created_by'];
}
