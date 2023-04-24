<?php

namespace App\Exports\upstream;

use App\well_class;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class WellClassSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return well_class::select('id', 'class_name');
    }

    public function title() : string
    {
        return 'Well Classes';  
    }

}
