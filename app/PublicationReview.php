<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationReview extends Model
{
    protected $fillable = ['publication_id', 'stage_id', 'status', 'comment', 'approved_by'];

    public function stage()
    {
        return $this->belongsTo(\App\Stage::class, 'stage_id');
    }

    public function publication()
    {
        return $this->belongsTo(\App\nogiar_publication_content::class, 'publication_id');
    }

    public function approver()
    {
        return $this->belongsTo(\App\User::class, 'approved_by');
    }
}
