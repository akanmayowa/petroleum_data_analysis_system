<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_accredited_laboratory extends Model
{
    //
    protected $table = 'she_accredited_laboratories';

    protected $fillable = ['year', 'month', 'laboratory_name', 'laboratory_services', 'zones', 'no_of_accredited_lab', 'request_type', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function field_office()
    {
        return $this->belongsTo(\App\down_field_office::class, 'zones');
    }
}
