<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    /*
        This model uses polymorphic relation. As it is used to retrieve approvals for different operations.
    */
    protected $table = 'upload_approvals';

    protected $fillable = ['approvable_id', 'approvable_type', 'stage_id', 'approver_id', 'comments', 'status'];

    public function approvable()
    {
        return $this->morphTo();
    }
}
