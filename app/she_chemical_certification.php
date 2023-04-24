<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_chemical_certification extends Model
{
    //
    protected $table = 'she_chemical_certifications';

    protected $fillable = ['year', 'month', 'company_id', 'others', 'chemical_name', 'chemical_type', 'certification_category_id', 'certification_date', 'status_id', 'pending_id', 'created_by', 'stage_id', 'remark', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\she_pet_category::class, 'certification_category_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\she_pet_status::class, 'status_id');
    }
}
