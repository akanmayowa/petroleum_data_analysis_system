<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherPrimaries extends Model
{
    //
    protected $fillable = ['year', 'a_id', 'production', 'gtl', 'ctl', 'others', 'imports', 'exports', 'product', 'direct_use', 'stock', 'change', 'ref_intake', 'statistical_diff', 'ref_loses', 'ref_fuel', 'delivery_to_petchem', 'delivery_power_gen'];
}
