<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class she_pet_category extends Model
{
    //
    protected $table = 'she_pet_categories';

    protected $fillable = ['category_name', 'created_by'];

    public function she_petitions_received()
    {
        return $this->hasMany('App\she_petitions_received', 'category_id');
    }

    public function she_chemical_certification()
    {
        return $this->hasMany(\App\she_chemical_certification::class, 'certification_category_id');
    }
}
