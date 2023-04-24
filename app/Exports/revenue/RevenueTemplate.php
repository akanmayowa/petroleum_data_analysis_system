<?php

namespace App\Exports\revenue;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class RevenueTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 1; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new RevenueHeader();
            }
        }

        return $sheets;
    }

}
