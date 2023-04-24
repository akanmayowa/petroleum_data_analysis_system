<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_import_product extends Model
{
    //
    protected $table = 'down_import_product';

    protected $fillable = ['product_name', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function down_product_vol_import_permit()
    {
        return $this->hasMany(\App\down_product_vol_import_permit::class, 'product_id');
    }

    public function down_refinary_production()
    {
        return $this->hasMany(\App\down_refinary_production::class, 'product_id');
    }

    public function down_outlet_storage_capacity()
    {
        return $this->hasMany(\App\down_outlet_storage_capacity::class, 'product_id');
    }

    public function down_refinary_capacity_utilization()
    {
        return $this->hasMany(\App\down_refinary_capacity_utilization::class, 'product_id');
    }

    public function gas_refinery_production_volumes()
    {
        return $this->hasMany(\App\gas_refinery_production_volumes::class, 'product_id');
    }

    public function GetProductNameAttribute($value)
    {
        return strtolower($value);
    }
}
