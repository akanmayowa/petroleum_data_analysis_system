<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditLogs extends Model
{
    //
    protected $table = 'audit_logs';

    protected $fillable = ['user_id', 'section', 'record', 'action'];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
