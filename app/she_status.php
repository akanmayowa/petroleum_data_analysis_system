<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_status extends Model
{
    //
    protected $table = 'she_status';

    protected $fillable = ['status_name', 'created_by'];

    public function status()
    {
        return $this->hasMany(self::class, 'status_id');
    }

    public function she_environmental_restoration()
    {
        return $this->hasMany(\App\she_environmental_restoration::class, 'status_id');
    }
}
