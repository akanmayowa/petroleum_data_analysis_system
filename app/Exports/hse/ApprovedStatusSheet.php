<?php

namespace App\Exports\hse;

use App\she_status;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class ApprovedStatusSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return she_status::select('id', 'status_name');
    }

    public function title(): string
    {
        return 'Status';
    }
}
