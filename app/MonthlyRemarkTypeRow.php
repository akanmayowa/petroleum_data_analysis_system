<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyRemarkTypeRow extends Model
{
    //
    protected $table = 'monthly_remark_type_rows';

    protected $fillable = ['monthly_remark_type_id', 'name', 'created_by'];

    public function MonthlyRemark()
    {
        return $this->hasMany(\App\MonthlyRemark::class, 'monthly_remark_type_row_id');
    }
}
