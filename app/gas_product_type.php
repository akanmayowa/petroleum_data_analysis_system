<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_product_type extends Model
{
    //
    protected $table = 'gas_product_type';

    protected $fillable = ['product_type_name', 'created_by'];

    public function gas_outlet_storage_capacity()
    {
        return $this->hasMany(\App\gas_outlet_storage_capacity::class, 'product_type_id');
    }

    public function gas_retail_outlet_summary()
    {
        return $this->hasMany('App\gas_retail_outlet_summary', 'product_type_id');
    }
}
