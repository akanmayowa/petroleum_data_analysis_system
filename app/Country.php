<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'country';

    protected $fillable = ['country_name', 'created_by'];

    public function down_crude_export_by_destination()
    {
        return $this->hasMany(\App\down_crude_export_by_destination::class, 'country_id');
    }

    public function down_crude_export_by_company()
    {
        return $this->hasMany(\App\down_crude_export_by_company::class, 'country_id');
    }

    public function gas_product_vol_import_permit()
    {
        return $this->hasMany(\App\gas_product_vol_import_permit::class, 'country_id');
    }
}
