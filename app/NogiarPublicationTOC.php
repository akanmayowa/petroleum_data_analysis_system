<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NogiarPublicationTOC extends Model
{
    //
    protected $table = 'nogiar_publication_tocs';

    protected $fillable = ['year', 'page_no', 'header', 'show_table', 'created_by'];
}
