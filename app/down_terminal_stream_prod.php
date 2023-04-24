<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_terminal_stream_prod extends Model
{
    //
    protected $table = 'down_terminal_stream_prod';

    protected $fillable = ['stream_id', 'company_id', 'contract_id', 'sulphur_content', 'year', 'production_type_id', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'api', 'stream_total', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function stream()
    {
        return $this->belongsTo(\App\Stream::class, 'stream_id');
    }

    public function prod_type()
    {
        return $this->belongsTo(\App\down_production_type::class, 'production_type_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }
}
