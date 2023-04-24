<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_pettitions_received extends Model
{
    //
    protected $table = 'she_petitions_received';

    protected $fillable = ['year', 'month', 'petitioner', 'petitionee', 'category_id', 'action_taken_id', 'pending_id', 'status_id', 'created_by', 'stage_id', 'batch_number', 'approve_by', 'approve_at'];

    public function category()
    {
        return $this->belongsTo(\App\she_pet_category::class, 'category_id');
    }

    public function action()
    {
        return $this->belongsTo(\App\she_pet_action::class, 'action_taken_id');
    }

    public function status()
    {
        return $this->belongsTo(\App\she_pet_status::class, 'status_id');
    }
}
