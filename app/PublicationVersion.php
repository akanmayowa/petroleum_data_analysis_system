<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationVersion extends Model
{
    //
    protected $table = 'publication_version';

    protected $fillable = ['publication_id', 'version', 'content',  'stage_id', 'added_by', 'review_by', 'modified_by', 'approved_by'];
}
