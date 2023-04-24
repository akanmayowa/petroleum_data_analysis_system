<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_gas_reserve_addition_depletion_rate extends Model
{
    //
    protected $table = 'up_gas_reserve_addition_depletion_rate';

    protected $fillable = ['year', 'month', 'company_id', 'contract_id', 'prev_gas_reserve', 'curr_gas_reserve', 'production', 'net_addition', 'percent_net_addition',  'depletion_rate',  'life_index', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }
}
