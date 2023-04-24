<?php

namespace App\Exports\downstream;

use App\down_outlet_states;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class StateSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_outlet_states::select('id', 'state_name');
    }

    public function title() : string
    {
    	return 'States';  
    }

}
