<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_concession_terrain extends Model
{
    //
    protected $table = 'up_concession_terrain';

    protected $fillable = ['terrain_name', 'created_by'];

    public function Bala_opl()
    {
        return $this->hasMany(\App\Bala_opl::class, 'geological_terrain_id');
    }

    public function Bala_oml()
    {
        return $this->hasMany(\App\Bala_oml::class, 'geological_terrain_id');
    }

    public function concession_unlisted_open()
    {
        return $this->hasMany(\App\concession_unlisted_open::class, 'terrain_id');
    }

    public function concession()
    {
        return $this->hasMany(\App\concession::class, 'geological_terrain_id');
    }

    public function concession_history()
    {
        return $this->hasMany(\App\concession_history::class, 'geological_terrain_id');
    }
}
