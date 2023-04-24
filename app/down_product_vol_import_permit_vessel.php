<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_product_vol_import_permit_vessel extends Model
{
    //
    protected $table = 'down_product_vol_import_permit_vessels';

    protected $fillable = ['depot_name', 'field_office_id', 'product_id', 'year', 'value', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function product()
    {
        return $this->belongsTo(\App\down_import_product::class, 'product_id');
    }

    public function field_office()
    {
        return $this->belongsTo(\App\down_field_office::class, 'field_office_id');
    }
}
