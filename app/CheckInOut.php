<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckInOut extends Model
{
    //
    protected $table = 'check_in_check_out';

    protected $fillable = ['user_id', 'year', 'section', 'status'];

    public function user()
    {
        return $this->hasMany(\App\User::class, 'user_id');
    }
}
