<?php

namespace App\Exports\upstream;

use App\workover_type;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class WorkoverTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return workover_type::select('id', 'type_name');
    }

    public function title() : string
    {
        return 'Workover Types';  
    }

}
