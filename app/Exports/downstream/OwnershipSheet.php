<?php

namespace App\Exports\downstream;

use App\down_ownership;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class OwnershipSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_ownership::select('id', 'ownership_name');
    }

    public function title() : string
    {
    	return 'Ownerships';  
    }

}
