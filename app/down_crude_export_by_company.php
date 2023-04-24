<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_crude_export_by_company extends Model
{
    //
    protected $table = 'down_crude_export_by_company';

    protected $fillable = ['year', 'destination', 'country_id', 'company_id', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function country()
    {
        return $this->belongsTo(\App\Country::class, 'country_id');
    }

    public function continent()
    {
        return $this->belongsTo(\App\Continent::class, 'destination');
    }

    public function region()
    {
        return $this->belongsTo(\App\Region::class, 'destination');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }
}
