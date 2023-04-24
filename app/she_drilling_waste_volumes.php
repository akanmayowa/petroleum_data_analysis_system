<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_drilling_waste_volumes extends Model
{
    //
    protected $table = 'she_drilling_waste_volumes';

    protected $fillable = ['year', 'month', 'sum_of_wbmc', 'sum_of_obmc', 'sum_of_spent_wbm', 'sum_of_spent_obm', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];
}
