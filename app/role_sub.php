<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_sub extends Model
{
    //
    protected $table = 'role_sub';

    protected $fillable = ['role_id', 'sub_role_name', 'description', 'created_by'];

    public function users()
    {
        return $this->hasMany(\App\User::class, 'sub_role_id');
    }

    public function role()
    {
        return $this->belongsTo(\App\roles::class, 'role');
    }
}
