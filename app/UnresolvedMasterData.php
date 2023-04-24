<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnresolvedMasterData extends Model
{
    //
    protected $table = 'unresolved_master_data';

    protected $fillable = ['year', 'tab_id', 'type', 'column_1', 'column_2', 'column_3', 'column_4', 'column_5', 'column_6', 'column_7', 'column_8', 'column_9', 'column_10', 'status_id'];
}
