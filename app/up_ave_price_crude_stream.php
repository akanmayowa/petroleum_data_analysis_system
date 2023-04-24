<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up_ave_price_crude_stream extends Model
{
    //
    protected $table = 'up_ave_price_crude_stream';

    protected $fillable = ['year', 'stream_id', 'january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'stream_total', 'pending_id', 'created_by', 'stage_id', 'approve_by', 'approve_at'];

    public function Stream()
    {
        return $this->belongsTo(\App\Stream::class, 'stream_id');
    }
}
