<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_well_activities extends Model
{
    //
    protected $table = 'up_well_activities';

    protected $fillable = ['year', 'month', 'terrain_id', 'class_id', 'type_id', 'contract_id', 'no_of_well', 'section', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }

    public function class()
    {
        return $this->belongsTo(\App\well_class::class, 'class_id');
    }

    public function type()
    {
        return $this->belongsTo(\App\well_type::class, 'type_id');
    }
}
