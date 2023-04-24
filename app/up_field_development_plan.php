<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_field_development_plan extends Model
{
    //
    protected $table = 'up_field_development_plans';

    protected $fillable = ['year', 'company_id', 'field_id', 'production_rate', 'expected_reserves', 'commencement_date', 'no_of_well', 'remark', 'section', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }
}
