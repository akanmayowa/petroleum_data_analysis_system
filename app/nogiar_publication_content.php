<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nogiar_publication_content extends Model
{
    //
    protected $table = 'nogiar_publication_content';

    protected $fillable = ['year', 'content', 'status', 'created_by'];
}
