<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NOGIARPublicationRemarkTemp extends Model
{
    //
    protected $table = 'nogiar_publication_remark_temp';

    protected $fillable = ['table_id', 'page_no', 'year', 'position', 'table_title', 'figure_title_1', 'figure_title_2', 'remark', 'created_by'];
}
