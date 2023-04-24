<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationStage extends Model
{
    //
    protected $fillable = ['year', 'workflow_id', 'stage_id', 'status_id', 'save_upload', 'initiated_by', 'initiated_at', 'approved_by', 'approved_at', 'published_by', 'published_at'];

    public function initiator()
    {
        return $this->belongsTo(\App\User::class, 'initiated_by');
    }
}
