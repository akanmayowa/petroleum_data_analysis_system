<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_well_completion extends Model
{
    //
    protected $table = 'up_well_completion';

    protected $fillable = ['year', 'month', 'field_id', 'contract_id', 'terrain_id', 'well_type', 'type_id', 'number_of_well', 'section', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function type()
    {
        return $this->belongsTo(\App\completion_type::class, 'type_id');
    }

    public function welltype()
    {
        return $this->belongsTo(\App\completion_type::class, 'well_type');
    }
}
