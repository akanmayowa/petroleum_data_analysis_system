<?php

namespace App\Exports\downstream;

use App\down_field_office;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class FieldOfficeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_field_office::select('id', 'field_office_name');
    }

    public function title() : string
    {
    	return 'Field Offices';  
    }

}
