<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_environmental_studies extends Model
{
    //
    protected $table = 'she_environmental_studies';

    protected $fillable = ['year', 'month', 'company_id', 'study_title', 'type_id', 'status_id', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function type()
    {
        return $this->belongsTo(\App\she_study_type::class, 'type_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\she_study_type::class, 'status_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function author()
    {
        return $this->belongsTo(\App\User::class, 'created_by');
    }
}
