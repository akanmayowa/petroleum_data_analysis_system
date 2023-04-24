<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pris_priority_report extends Model
{
    //
    protected $table = 'pris_priority_report';

    protected $fillable = ['report_name', 'created_by'];
}
