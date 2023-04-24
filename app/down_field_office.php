<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_field_office extends Model
{
    //
    protected $table = 'down_field_offices';

    protected $fillable = ['field_office_name', 'created_by'];

    public function down_product_vol_import_permit_vessel()
    {
        return $this->hasMany(\App\down_product_vol_import_permit_vessel::class, 'field_office_id');
    }

    public function she_accredited_laboratory()
    {
        return $this->hasMany(\App\she_accredited_laboratory::class, 'zones');
    }
}
