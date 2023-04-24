<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NogiarHseToc extends Model
{
    //
    protected $fillable = ['year', 'numbering', 'header', 'page_no', 'show_table', 'created_by'];
}
