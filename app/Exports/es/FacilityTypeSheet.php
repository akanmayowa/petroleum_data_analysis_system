<?php

namespace App\Exports\es;

use App\facility_type;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class FacilityTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return facility_type::select('id', 'facility_type_name');
    }

    public function title() : string
    {
    	return 'Facility Types';  
    }

}
