<?php

namespace App\Exports\hse;

use App\company;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class CompanySheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return company::select('id', 'company_name');
    }

    public function title(): string
    {
        return 'Companies';
    }
}
