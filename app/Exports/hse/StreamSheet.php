<?php

namespace App\Exports\hse;

use App\Stream;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class StreamSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return Stream::select('id', 'stream_name');
    }

    public function title(): string
    {
        return 'Streams';
    }
}
