<?php

namespace App\Exports\hse;

use App\field;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class FieldSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return field::select('id', 'field_name');
    }

    public function title() : string
    {
    	return 'Fields';  
    }

}
