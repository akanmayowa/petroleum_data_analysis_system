<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_water_volumes_generated extends Model
{
    //
    protected $table = 'she_water_volumes_generated';

    protected $fillable = ['year', 'month', 'company_id', 'others', 'facility_id', 'concession_id', 'terrain', 'water_depth', 'distance_from_shore', 'volume', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function concession()
    {
        return $this->belongsTo(\App\concession::class, 'concession_id');
    }

    public function facility()
    {
        return $this->belongsTo(\App\facility::class, 'facility_id');
    }
}
