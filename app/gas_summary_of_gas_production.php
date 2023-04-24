<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_summary_of_gas_production extends Model
{
    //
    protected $table = 'gas_summary_of_gas_production';

    protected $fillable = ['year', 'month', 'company_id', 'field_id', 'ag', 'nag', 'total', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at', 'contract_id'];

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
