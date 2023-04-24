<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class week_activity extends Model
{
    //
    protected $table = 'week_activity';

    protected $fillable = ['activity_name', 'department', 'created_by'];

    public function department()
    {
        return $this->belongsTo(\App\department::class, 'department');
    }
}
