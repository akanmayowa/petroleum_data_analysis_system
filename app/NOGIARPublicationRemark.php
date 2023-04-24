<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NOGIARPublicationRemark extends Model
{
    //
    protected $table = 'nogiar_publication_remark';

    protected $fillable = ['table_id', 'table_no', 'figure_no_1', 'figure_no_2', 'head_section', 'section_id', 'numbering', 'page_no', 'year', 'position', 'header', 'sub_head', 'sub_sub_head', 'table_title', 'figure_title_1', 'figure_title_2', 'remark', 'show_table', 'created_by'];
}
