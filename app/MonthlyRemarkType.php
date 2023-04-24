<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyRemarkType extends Model
{
    //
    protected $table = 'monthly_remarks';

    protected $fillable = ['name', 'created_by'];

    public function MonthlyRemark()
    {
        return $this->hasMany(\App\MonthlyRemark::class, 'monthly_remark_type_id');
    }
}
