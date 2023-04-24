<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationNote extends Model
{
    //
    protected $table = 'publication_review_approve';

    protected $fillable = ['publication_id', 'type_id', 'note'];
}
