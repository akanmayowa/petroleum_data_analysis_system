<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionCategory extends Model
{
    //
    protected $table = 'permission_category';

    protected $fillable = ['category_name', 'description', 'created_by'];

    public function permission()
    {
        return $this->hasMany(\App\Permission::class, 'permission_category_id');
    }
}
