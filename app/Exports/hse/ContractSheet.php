<?php

namespace App\Exports\hse;

use App\contract;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class ContractSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return contract::select('id', 'contract_name');
    }

    public function title() : string
    {
    	return 'Contracts';  
    }

}
