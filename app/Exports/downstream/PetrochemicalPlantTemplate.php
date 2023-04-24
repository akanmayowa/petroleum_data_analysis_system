<?php

namespace App\Exports\downstream;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class PetrochemicalPlantTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 6; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new PetrochemicalPlantHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new RefinerySheet();
            } 
            else if($sheet == 3) 
            {
                $sheets[] = new OwnershipSheet();
            } 
            else if($sheet == 4) 
            {
                $sheets[] = new PlantTypeSheet();
            } 
            else if($sheet == 5) 
            {
                $sheets[] = new FeedstockSheet();
            } 
            else if($sheet == 6) 
            {
                $sheets[] = new DownProductSheet();
            }     
        }

        return $sheets;
    }

}
