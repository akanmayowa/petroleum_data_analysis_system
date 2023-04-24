<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_monthly_summary_crude_export extends Model
{
    //
    protected $table = 'down_monthly_summary_crude_export';

    protected $fillable = ['stream_id', 'year', 'production_type_id', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'api', 'stream_total', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function stream()
    {
        return $this->belongsTo(\App\Stream::class, 'stream_id');
    }

    public function prod_type()
    {
        return $this->belongsTo(\App\down_production_type::class, 'production_type_id');
    }
}
