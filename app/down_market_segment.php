<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_market_segment extends Model
{
    //
    protected $table = 'down_market_segment';

    protected $fillable = ['market_segment_name', 'created_by'];

    public function down_refinary_production()
    {
        return $this->hasMany(\App\down_refinary_production::class, 'market_segment_id');
    }

    public function down_outlet_storage_capacity()
    {
        return $this->hasMany(\App\down_outlet_storage_capacity::class, 'market_segment_id');
    }

    public function down_licensed_oil_makerters()
    {
        return $this->hasMany(\App\down_licensed_oil_makerters::class, 'market_segment_id');
    }

    public function down_product_vol_import_permit()
    {
        return $this->hasMany(\App\down_product_vol_import_permit::class, 'market_segment_id');
    }

    public function down_retail_outlet_summary()
    {
        return $this->hasMany(\App\down_retail_outlet_summary::class, 'market_segment_id');
    }

    public function down_ave_consumer_price_range()
    {
        return $this->hasMany(\App\down_ave_consumer_price_range::class, 'production_type');
    }

    public function WARDownstreamTruckOutMarketer()
    {
        return $this->hasMany(\App\WARDownstreamTruckOutMarketer::class, 'segment_id');
    }
}
