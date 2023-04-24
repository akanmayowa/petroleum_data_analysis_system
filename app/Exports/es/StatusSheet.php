<?php

namespace App\Exports\es;

use App\status_category;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class StatusSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return status_category::select('id', 'status');
    }

    public function title() : string
    {
    	return 'Statuses';  
    }

}
