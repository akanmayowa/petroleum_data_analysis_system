<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_drilling_chemical extends Model
{
    //
    protected $table = 'she_drilling_chemicals';

    protected $fillable = ['year', 'month', 'fluid_type', 'number', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
