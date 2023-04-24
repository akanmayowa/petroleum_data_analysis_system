<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_supply_textile_industry extends Model
{
    //
    protected $table = 'gas_supply_textile_industries';

    protected $fillable = ['year', 'sector', 'value', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
