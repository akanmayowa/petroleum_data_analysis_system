<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $fillable = ['name', 'status'];

    protected $appends = ['date_for_human', 'stage_count'];

    public function stages()
    {
        return $this->hasMany(\App\Stage::class);
    }

    public function getDateForHumanAttribute($value)
    {
        return \Carbon\Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getStageCountAttribute($value)
    {
        return $this->stages()->count();
    }

    public function publicationReviewApprove()
    {
        return $this->hasMany(\App\publicationReviewApprove::class, 'workflow_id');
    }
}
