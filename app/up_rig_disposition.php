<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_rig_disposition extends Model
{
    //
    protected $table = 'up_rig_disposition';

    protected $fillable = ['year', 'rig_type_id', 'terrain_id', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'pending_id', 'stage_id', 'batch_number', 'created_by', 'approve_by', 'approve_at'];

    public function rig_type()
    {
        return $this->belongsTo(\App\RigType::class, 'rig_type_id');
    }

    public function terrain()
    {
        return $this->belongsTo(\App\terrain::class, 'terrain_id');
    }
}
