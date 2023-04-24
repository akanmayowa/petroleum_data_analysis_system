<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nogiar_publication extends Model
{
    //
    protected $table = 'nogiar_publication';

    protected $fillable = ['year', 'header', 'title', 'picture_1', 'picture_2', 'footer', 'sub_footer', 'status', 'approved_by', 'approved_at', 'created_by'];

    public function nogiar_publication_contents()
    {
        return $this->hasMany(\App\nogiar_publication_content::class, 'nogiar_id');
    }

    public function nogiar_publication_lists()
    {
        return $this->hasMany(\App\nogiar_publication_list::class, 'nogiar_id');
    }
}
