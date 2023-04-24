<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableNumbering extends Model
{
    //
    protected $table = 'table_numbering';

    protected $fillable = ['year', 'table_no', 'table_id', 'page_no'];
}
