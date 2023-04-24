<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    //
    protected $table = 'email_lists';

    protected $fillable = ['division', 'user_id', 'role'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
