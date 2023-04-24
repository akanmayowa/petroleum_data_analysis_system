<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_approved_gas_development_plan extends Model
{
    //
    protected $table = 'up_approved_gas_development_plans';

    protected $fillable = ['year', 'field_id', 'concession_id', 'company_id', 'type_id', 'gas_reserve', 'condensate', 'ag_reserve', 'off_take_rate', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function concession()
    {
        return $this->belongsTo(\App\concession::class, 'concession_id');
    }
}
