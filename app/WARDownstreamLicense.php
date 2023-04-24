<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARDownstreamLicense extends Model
{
    //
    protected $table = 'war_downstream_license';

    protected $fillable = ['date', 'week', 'category_a_new', 'category_a_renewal', 'category_b_new', 'category_b_renewal', 'category_c_new', 'category_c_renewal', 'total_cat_a', 'total_cat_b', 'total_cat_c', 'created_by'];
}
