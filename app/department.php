<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
    protected $table = 'department';

    protected $fillable = ['department_name', 'created_by'];

    public function week_activity()
    {
        return $this->hasMany(\App\week_activity::class, 'department');
    }
}
