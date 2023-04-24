<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permission';

    protected $fillable = ['permission_category_id', 'permission_name', 'constant', 'created_by'];

    public function permission_category()
    {
        return $this->belongsTo(\App\PermissionCategory::class, 'permission_category_id');
    }

    public function permission()
    {
        return $this->belongsToMany(\App\roles::class, 'permission_role', 'permission_id', 'role_id');
    }
}
