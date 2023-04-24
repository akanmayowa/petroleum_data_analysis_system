<?php

namespace App\Exports\hse;

use App\she_pet_action;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class ActionSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return she_pet_action::select('id', 'action_name');
    }

    public function title() : string
    {
    	return 'Actions Taken';  
    }

}
