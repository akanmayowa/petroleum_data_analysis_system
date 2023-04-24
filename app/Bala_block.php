<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bala_block extends Model
{
    //
    protected $table = 'Bala_blocks';

    protected $fillable = ['year', 'basin_id', 'opl_blocks_allocated', 'oml_blocks_allocated', 'blocks_open', 'total_block', 'created_by', 'pending_id', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function basin()
    {
        return $this->belongsTo(\App\Basin::class, 'basin_id');
    }
}
