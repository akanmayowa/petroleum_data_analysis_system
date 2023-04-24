<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nogiar_publication_list extends Model
{
    //
    protected $table = 'publication_tables';

    protected $fillable = ['table_id', 'publication_type', 'main_heading', 'sub_heading_1', 'sub_heading_2', 'title', 'sub_title', 'created_by'];

    // public function nogiar_publication()
    // {
    // 	return $this->belongsTo('App\nogiar_publication', 'nogiar_id');
    // }
}
