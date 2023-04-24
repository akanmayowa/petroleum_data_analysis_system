<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicationReviewApprove extends Model
{
    //
    protected $table = 'publication_review_approves';

    protected $fillable = ['year', 'workflow_id', 'division', 'role', 'user_id', 'approver_id'];

    public function workflow()
    {
        return $this->belongsTo(\App\Workflow::class, 'workflow_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function approver()
    {
        return $this->belongsTo(\App\User::class, 'approver_id');
    }
}
