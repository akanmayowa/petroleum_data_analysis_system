<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_crude_export_by_destination extends Model
{
    //
    protected $table = 'down_crude_export_by_destination';

    protected $fillable = ['year', 'stream_id', 'destination', 'country_id', 'company_id', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'stream_total', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function country()
    {
        return $this->belongsTo(\App\Country::class, 'country_id');
    }

    public function continent()
    {
        return $this->belongsTo(\App\Continent::class, 'destination');
    }

    public function stream()
    {
        return $this->belongsTo(\App\Stream::class, 'stream_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function region()
    {
        return $this->belongsTo(\App\Region::class, 'destination');
    }
}
