<?php

namespace App\Exports\downstream;

use App\down_market_segment;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class MarketSegmentSheet implements FromQuery, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return down_market_segment::select('id', 'market_segment_name');
    }

    public function title() : string
    {
    	return 'Market Segments';  
    }

}
