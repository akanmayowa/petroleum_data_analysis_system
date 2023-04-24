<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class concession_unlisted_open extends Model
{
    //
    protected $table = 'concession_unlisted_open';

    protected $fillable = ['concession_name', 'company_id', 'area', 'terrain_id', 'remark', 'created_by'];

    public function Bala_oml()
    {
        return $this->hasMany(\App\Bala_oml::class, 'concession_held_id');
    }

    public function Bala_opl()
    {
        return $this->hasMany(\App\Bala_opl::class, 'concession_held_id');
    }

    public function bala_opl_oml_history()
    {
        return $this->hasMany(\App\bala_opl_oml_history::class, 'concession_held_id');
    }

    public function field()
    {
        return $this->hasMany('App\Field', 'concession_id');
    }

    public function company()
    {
        return $this->belongsTo(\App\company::class, 'company_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\up_concession_terrain::class, 'terrain_id');
    }

    public function contract()
    {
        return $this->belongsTo(\App\contract::class, 'contract_id');
    }
}
