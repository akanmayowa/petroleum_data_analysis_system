<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WARRigDisposition extends Model
{
    //
    protected $table = 'war_up_rig_disposition';

    protected $fillable = ['date', 'week', 'active_rig', 'statcked_rig', 'rig_on_standby', 'total_rig', 'created_by'];
}
