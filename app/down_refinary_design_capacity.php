<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class down_refinary_design_capacity extends Model
{
    //
    protected $table = 'down_refinary_design_capacity';

    protected $fillable = ['krpc',
        'wrpc',
        'new_phrc',
        'old_phrc',
        'ndpr',
        'total',
        'created_by', ];
}
