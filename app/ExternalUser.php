<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ExternalUser extends Authenticatable
{
    use Notifiable;

    protected $guard = 'external';

    //
    protected $table = 'external_users';

    protected $fillable = ['name', 'email', 'password', 'role', 'email_confirmed', 'token', 'active'];

    protected $guarded = ['password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function user_login_history()
    {
        return $this->hasMany(\App\user_login_history::class, 'user_id');
    }

    public function role_obj()
    {
        return$this->belongsTo(\App\roles::class, 'role');
    }

    public function AuditLogs()
    {
        return$this->hasMany(\App\AuditLogs::class, 'user_id');
    }
}
