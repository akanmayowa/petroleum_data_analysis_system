<?php

namespace App\Exports\downstream;

use App\down_production_type;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProductionTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_production_type::select('id', 'production_type_name');
    }

    public function title() : string
    {
    	return 'Production Types';  
    }

}
