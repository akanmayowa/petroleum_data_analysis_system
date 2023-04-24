<?php

namespace App\Exports\es;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class PipelineProjectTemplate implements  WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;


    public function sheets() : array
    {
        $sheets = [];

        for ($sheet=1; $sheet <= 3; $sheet++) 
        {
            if($sheet == 1) 
            {
                $sheets[] = new PipelineProjectHeader();
            }
            else if($sheet == 2) 
            {
                $sheets[] = new CompanySheet();
            } 
            else if($sheet == 3) 
            {
                $sheets[] = new ValiditySheet();
            } 
        }

        return $sheets;
    }

}
