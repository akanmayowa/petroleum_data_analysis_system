<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_environmental_restoration extends Model
{
    //
    protected $table = 'she_environmental_restorations';

    protected $fillable = ['year', 'month', 'service', 'status_id', 'new', 'renew', 'total', 'pending_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function status()
    {
        return $this->belongsTo(\App\she_status::class, 'status_id');
    }
}
