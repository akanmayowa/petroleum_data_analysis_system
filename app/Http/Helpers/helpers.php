<?php

class helpers
{
    public static function productValue($productId, $year, $market_segment_id, $month)
    {
        return $finaldata = \App\down_refinary_production::where(['year'=>$year, 'market_segment_id'=>$market_segment_id, 'product_id'=>$productId])->select($month)->value($month);
    }
}
