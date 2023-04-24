<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_domestic_gas_supply extends Model
{
    //
    protected $table = 'gas_domestic_gas_supply';

    protected $fillable = ['year', 'month', 'company_id', 'power', 'commercial', 'industry', 'total', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }
}
