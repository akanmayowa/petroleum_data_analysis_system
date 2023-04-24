<?php

namespace App\Exports\gas;

use App\gas_category;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class GasCategorySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return gas_category::select('id', 'category_name');
    }

    public function title() : string
    {
    	return 'Gas Categories';  
    }

}
