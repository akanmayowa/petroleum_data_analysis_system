<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FigureNumbering extends Model
{
    //
    protected $table = 'figure_numbering';

    protected $fillable = ['year', 'table_id', 'table_no', 'figure_no', 'figure_title', 'page_no', 'created_by'];
}
