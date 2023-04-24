<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gas_category extends Model
{
    //

    public function gas_product_lpg()
    {
        return $this->hasMany('App\gas_product_lpg', 'category_id');
    }
}
