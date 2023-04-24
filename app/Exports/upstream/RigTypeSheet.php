<?php

namespace App\Exports\upstream;

use App\RigType;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class RigTypeSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return RigType::select('id', 'rig_type_name');
    }

    public function title() : string
    {
        return 'Rig Types';  
    }

}
