<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_product_vol_import_permit extends Model
{
    //
    protected $table = 'gas_product_vol_import_permit';

    protected $fillable = ['year', 'month', 'company_id', 'import_permit_no', 'issued_date', 'validity_period', 'product_id', 'volume', 'country_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }

    public function country()
    {
        return $this->belongsTo(\App\Country::class, 'country_id');
    }
}
