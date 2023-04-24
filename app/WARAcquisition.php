<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARAcquisition extends Model
{
    //
    protected $table = 'war_up_acquisition';

    protected $fillable = ['date', 'week', 'seismic_data_acquired', 'cumulative_seismic_acquired', 'annual_seismic_acquisition', 'seismic_data_processed', 'created_by'];
}
