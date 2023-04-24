<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RigType extends Model
{
    //
    public $table = 'rig_type';

    protected $fillable = ['rig_type_name', 'created_by'];

    public function down_rig_disposition()
    {
        return $this->hasMany('App\down_rig_disposition', 'rig_type_id');
    }
}
