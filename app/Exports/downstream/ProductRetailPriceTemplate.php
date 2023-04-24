<?php

namespace App\Exports\downstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class ProductRetailPriceTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 2; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new ProductRetailPriceHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new MarketSegmentSheet();
            }    
        }

        return $sheets;
    }

}
