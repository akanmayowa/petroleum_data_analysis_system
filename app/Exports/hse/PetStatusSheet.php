<?php

namespace App\Exports\hse;

use App\she_pet_status;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class PetStatusSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return she_pet_status::select('id', 'status_name');
    }

    public function title() : string
    {
    	return 'Status';  
    }

}
