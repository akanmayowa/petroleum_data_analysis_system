<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class war_report extends Model
{
    //
    protected $table = 'war_report';

    protected $fillable = ['war_id', 'user_id', 'issues', 'remark', 'week', 'created_by'];

    public function war()
    {
        return $this->belongsTo(\App\war::class, 'war_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
