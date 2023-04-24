<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pris_notification extends Model
{
    //
    protected $table = 'pris_notification';

    protected $fillable = ['report_name', 'uploaded_every', 'month', 'date', 'notification_reminder', 'report_custodian', 'report_custodian_email', 'report_manager', 'report_manager_email', 'message', 'created_by'];
}
