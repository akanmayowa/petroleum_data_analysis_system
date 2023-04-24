<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eco_revenue_actual extends Model
{
    //
    protected $table = 'eco_revenue_actual';

    protected $fillable = ['year', 'month', 'oil_actual', 'gas_actual', 'gas_flare_actual', 'concession_actual', 'misc_actual', 'signature_bonus', 'total_actual', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
