<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_medical_training_center extends Model
{
    //
    protected $table = 'she_medical_training_centers';

    protected $fillable = ['year', 'companies', 'facility_address', 'approved_courses', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
