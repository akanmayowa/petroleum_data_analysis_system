<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasFDP extends Model
{
    //
    protected $table = 'war_gas_fdp';

    protected $fillable = ['date', 'week', 'application_received', 'application_approved', 'reserves', 'created_by'];
}
