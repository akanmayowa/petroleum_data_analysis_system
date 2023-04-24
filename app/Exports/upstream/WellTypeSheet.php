<?php

namespace App\Exports\upstream;

use App\well_type;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class WellTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return well_type::select('id', 'type_name');
    }

    public function title() : string
    {
        return 'Well Types';  
    }

}
