<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basin extends Model
{
    //
    protected $table = 'up_basin';

    protected $fillable = ['basin_name', 'created_by'];

    public function Bala_block()
    {
        return $this->hasMany(\App\Bala_block::class, 'basin_id');
    }
}
