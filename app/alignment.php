<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alignment extends Model
{
    //
    protected $table = 'alignment';

    protected $fillable = ['alignment_name', 'created_by'];

    public function dwp()
    {
        return $this->hasMany(\App\dwp::class, 'alignment_id');
    }
}
