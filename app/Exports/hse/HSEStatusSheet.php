<?php

namespace App\Exports\hse;

use App\she_study_type;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class HSEStatusSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return she_study_type::select('id', 'type_name');
    }

    public function title(): string
    {
        return 'Status';
    }
}
