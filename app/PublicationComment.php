<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationComment extends Model
{
    protected $fillable = ['year', 'division', 'comment', 'status_id', 'created_by'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'created_by');
    }
}
