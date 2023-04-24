<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mpm extends Model
{
    //
    protected $table = 'mpm';

    protected $fillable = ['year', 'themic_area_id', 'key_result_area_id', 'kpi', 'source_id', 'metric_id', 'frequency_of_measurement_id', 'month', 'remark', 'created_by', 'mpm'];

    public function themic_area()
    {
        return $this->belongsTo(\App\themic_area::class, 'themic_area_id');
    }

    public function key_result_area()
    {
        return $this->belongsTo(\App\key_result_area::class, 'key_result_area_id');
    }

    public function kpis()
    {
        return $this->belongsTo(\App\mpm_kpi::class, 'kpi');
    }

    public function source()
    {
        return $this->belongsTo(\App\source::class, 'source_id');
    }

    public function metric()
    {
        return $this->belongsTo(\App\metric::class, 'metric_id');
    }

    public function frequency_of_measurement()
    {
        return $this->belongsTo(\App\mpm_frequency_of_measurement::class, 'frequency_of_measurement_id');
    }

    public function getMpm($month)
    {
        return $this->where([
            'month'=>$month,
            'year'=>$this->year,
            'themic_area_id'=>$this->themic_area_id,
            'key_result_area_id'=>$this->key_result_area_id,
            'kpi'=>$this->kpi,
            'source_id'=>$this->source_id,
            'metric_id'=>$this->metric_id,
            'frequency_of_measurement_id'=>$this->frequency_of_measurement_id,
        ])->value('mpm');
    }

    public function getBaselineAttribute()
    {
        return \App\mpmBaseline::where('mpm_id', $this->id)->value('baseline');
    }

    public function getYearTargetAttribute()
    {
        return \App\mpmBaseline::where('mpm_id', $this->id)->value('year_target');
    }
}
