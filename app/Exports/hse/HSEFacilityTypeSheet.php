<?php

namespace App\Exports\hse;

use App\she_spill_facility;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class HSEFacilityTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return she_spill_facility::select('id', 'type_name');
    }

    public function title() : string
    {
    	return 'Facility Types';  
    }

}
