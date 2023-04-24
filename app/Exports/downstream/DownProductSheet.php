<?php

namespace App\Exports\downstream;

use App\down_product;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class DownProductSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_product::select('id', 'product_name');
    }

    public function title() : string
    {
    	return 'Products';  
    }

}
