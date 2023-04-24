<?php

namespace App\Exports\downstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class JettyTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 4; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new JettyHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new StateSheet();
            } 
            else if($sheet == 3) 
            {
                $sheets[] = new OwnershipSheet();
            } 
            else if($sheet == 4) 
            {
                $sheets[] = new ProductSheet();
            }     
        }

        return $sheets;
    }

}
