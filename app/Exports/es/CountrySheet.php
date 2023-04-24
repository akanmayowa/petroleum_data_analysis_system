<?php

namespace App\Exports\es;

use App\Country;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class CountrySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return Country::select('id', 'country_name');
    }

    public function title() : string
    {
    	return 'Countries';  
    }

}
