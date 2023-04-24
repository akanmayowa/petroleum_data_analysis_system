<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_login_history extends Model
{
    //
    protected $table = 'user_login_history';

    protected $fillable = ['user_id', 'last_login', 'created_by'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
