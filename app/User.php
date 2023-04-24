<?php

namespace App;

use App\Traits\ExcelExport;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable , ExcelExport;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'delegate_role', 'end_date', 'sub_role_id', 'last_login', 'active', 'delegate_by', 'delegate_at'];

    protected $guarded = ['password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function war_report()
    {
        return $this->hasMany(\App\war_report::class, 'war_id');
    }

    public function user_login_history()
    {
        return $this->hasMany(\App\user_login_history::class, 'user_id');
    }

    public function role_obj()
    {
        return$this->belongsTo(\App\roles::class, 'role', );
    }



    public function role_sub()
    {
        return$this->belongsTo(\App\role_sub::class, 'sub_role_id');
    }

    public function AuditLogs()
    {
        return$this->hasMany(\App\AuditLogs::class, 'user_id');
    }

    public function User()
    {
        return $this->hasMany(self::class, 'user_id');
    }

    public function PublicationComment()
    {
        return$this->hasMany(\App\PublicationComment::class, 'created_by');
    }
}
