<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_drilling_gas extends Model
{
    //
    protected $table = 'up_drilling_gas_well';

    protected $fillable = ['year', 'month', 'field_id', 'company_id', 'concession_id', 'well', 'type_id', 'terrain_id', 'facility_id', 'reserves', 'off_take', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function concession()
    {
        return $this->belongsTo(\App\concession::class, 'concession_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }

    public function facility()
    {
        return $this->belongsTo(\App\facility::class, 'facility_id');
    }
}
