<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_offshore_safety_permit extends Model
{
    //
    protected $table = 'she_offshore_safety_permit';

    protected $fillable = ['year', 'personnel_registered', 'personnel_captured', 'permits_issued', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
