<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_crude_production_deferment extends Model
{
    //
    protected $table = 'up_provisional_production_deferments';

    protected $fillable = ['year', 'month', 'company_id', 'contract_id', 'value', 'average_daily_production', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }
}
