<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eco_revenue_projected extends Model
{
    //
    protected $table = 'eco_revenue_projected';

    protected $fillable = ['year', 'oil_projected', 'gas_projected', 'gas_flare_projected', 'concession_projected', 'misc_projected', 'signature_bonus', 'total_projected', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
