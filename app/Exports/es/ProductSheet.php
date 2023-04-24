<?php

namespace App\Exports\es;

use App\down_import_product;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProductSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_import_product::select('id', 'product_name');
    }

    public function title() : string
    {
    	return 'Products';  
    }

}
