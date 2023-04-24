<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_accredited_waste_management_facility extends Model
{
    //
    protected $table = 'she_waste_management_facilities';

    protected $fillable = ['year', 'month', 'type_of_facility_id', 'operational_permit', 'status', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function type_of_facility()
    {
        return $this->belongsTo(\App\facility_type::class, 'type_of_facility_id');
    }
}
