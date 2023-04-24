<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeismicType extends Model
{
    //
    protected $table = 'seismic_type';

    protected $fillable = ['seismic_type_name', 'created_by'];

    public function up_seismic_data()
    {
        return $this->hasMany(\App\up_seismic_data::class, 'seismic_type');
    }
}
