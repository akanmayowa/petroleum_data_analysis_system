<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyRemark extends Model
{
    //
    protected $table = 'monthly_remarks';

    protected $fillable = ['year', 'month', 'division', 'tab_name', 'row_name', 'remark', 'created_by'];
}
