<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_seismic_data extends Model
{
    //
    protected $table = 'up_seismic_data';

    protected $fillable = ['year', 'month', 'field_id', 'terrain_id', 'geophysical_id', 'geotechnical_id', 'seismic_type', 'approved_coverage', 'actual_coverage', 'status', 'remark', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function field()
    {
        return $this->belongsTo(\App\field::class, 'field_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }

    public function status_category()
    {
        return $this->belongsTo(\App\status_category::class, 'status');
    }

    public function seismic_types()
    {
        return $this->belongsTo(\App\SeismicType::class, 'seismic_type');
    }

    public function geophysical()
    {
        return $this->belongsTo(\App\up_geophysical::class, 'geophysical_id');
    }

    public function geotechnical()
    {
        return $this->belongsTo(\App\up_geotechnical::class, 'geotechnical_id');
    }
}
