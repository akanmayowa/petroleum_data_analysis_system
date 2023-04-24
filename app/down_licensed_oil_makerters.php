<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_licensed_oil_makerters extends Model
{
    //
    protected $table = 'down_licensed_oil_makerters';

    protected $fillable = ['year', 'market_category_id', 'company_id', 'location_id', 'storage_capacity', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function market_category()
    {
        return $this->belongsTo(\App\down_market_segment::class, 'market_category_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function company_parent()
    {
        return $this->belongsTo(\App\company_parent::class, 'company_id');
    }

    public function location()
    {
        return $this->belongsTo(\App\down_storage_location::class, 'location_id');
    }
}
