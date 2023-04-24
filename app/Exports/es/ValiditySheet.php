<?php

namespace App\Exports\es;

use App\es_project_status;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class ValiditySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return es_project_status::select('id', 'status_name');
    }

    public function title() : string
    {
    	return 'Status';  
    }

}
