<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mpm_report extends Model
{
    //
    protected $table = 'mpm_report';

    protected $fillable = ['achieved', 'date', 'remark', 'created_by'];
}
