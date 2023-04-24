<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARGasFlare extends Model
{
    //
    protected $table = 'war_gas_flare';

    protected $fillable = ['date', 'week', 'permit_to_flare', 'quantity_approved', 'quantity_under_review', 'created_by'];
}
