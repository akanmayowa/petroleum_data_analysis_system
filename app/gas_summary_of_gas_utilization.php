<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_summary_of_gas_utilization extends Model
{
    //
    protected $table = 'gas_summary_of_gas_utilization';

    protected $fillable = ['year', 'month', 'field_id', 'company_id', 'fuel_gas', 'gas_lift', 're_injection', 'ngl_lpg', 'gas_to_nipp', 'local_others', 'nlng_export', 'total_gas_utilized', 'percent_utilized', 'ag_gas_flared', 'nag_gas_flared', 'total_gas_flared', 'percent_flared', 'total_ag_nag', 'shrinkage', 'statistical_difference', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }
}
