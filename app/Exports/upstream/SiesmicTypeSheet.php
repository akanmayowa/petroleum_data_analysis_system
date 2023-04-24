<?php

namespace App\Exports\upstream;

use App\SeismicType;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class SiesmicTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return SeismicType::select('id', 'seismic_type_name');
    }

    public function title() : string
    {
    	return 'Siesmic Types';  
    }

}
