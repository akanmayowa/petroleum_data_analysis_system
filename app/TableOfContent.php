<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableOfContent extends Model
{
    //
    protected $table = 'table_of_contents';

    protected $fillable = ['year', 'type_id', 'section_id', 'title', 'page_no', 'created_by'];
}
