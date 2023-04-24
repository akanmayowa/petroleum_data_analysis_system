<?php

namespace App\Exports\upstream;

use App\plugback_type;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class PlugbackTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return plugback_type::select('id', 'type_name');
    }

    public function title() : string
    {
        return 'Plugback Types';  
    }

}
