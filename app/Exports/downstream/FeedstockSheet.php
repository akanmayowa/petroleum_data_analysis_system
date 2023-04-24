<?php

namespace App\Exports\downstream;

use App\down_feedstock;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class FeedstockSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_feedstock::select('id', 'feedstock_name');
    }

    public function title() : string
    {
    	return 'Feedstocks';  
    }

}
