<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_radiation_safety_permit extends Model
{
    //
    protected $table = 'she_radiation_safety_permits';

    protected $fillable = ['year', 'month', 'company_id', 'well_type', 'well_name', 'concession', 'count', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
