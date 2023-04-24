<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class war extends Model
{
    //
    protected $table = 'war';

    protected $fillable = ['deliverables', 'department_id', 'status_id', 'from_date', 'to_date', 'created_by'];

    public function department()
    {
        return $this->belongsTo(\App\department::class, 'department_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\status_category::class, 'status_id');
    }
}
