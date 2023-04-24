<?php

namespace App\Exports\hse;

use App\concession;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class ConcessionSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return concession::select('id', 'concession_name');
    }

    public function title() : string
    {
    	return 'Concessions';  
    }

}
