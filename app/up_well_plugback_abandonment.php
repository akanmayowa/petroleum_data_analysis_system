<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_well_plugback_abandonment extends Model
{
    //
    protected $table = 'up_well_plugback_abandonment';

    protected $fillable = ['year', 'month', 'field_id', 'type_id', 'number_of_well', 'pending_id', 'stage_id', 'batch_number', 'section', 'created_by', 'approve_by', 'approve_at'];

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
}
