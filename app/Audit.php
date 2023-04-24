<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    //
    protected $fillable = ['action_performed', 'user_id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
