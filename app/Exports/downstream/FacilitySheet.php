<?php

namespace App\Exports\downstream;

use App\facility;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class FacilitySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return facility::select('id', 'facility_name');
    }

    public function title() : string
    {
    	return 'Facility';  
    }

}
