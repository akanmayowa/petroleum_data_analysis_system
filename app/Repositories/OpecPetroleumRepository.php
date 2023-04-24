<?php

namespace App\Repositories;

use App\Traits\Opec;

class OpecPetroleumRepository
{
    use Opec;

    public $year;

    public function __construct()
    {
        // $this->year=request()->has('year') ? request()->year : date('Y');
        if ($this->year = request()->has('year')) {
            $this->year = request()->year;
        } else {
            $this->year = (date('Y')) - 1;
        }
    }

    public function processPost()
    {
        switch (request()->type) {
            case 'savePetroleum':
//                return request()->all();
                return $this->saveData(\App\OpecPetroleum::class);
            default:
                return '';

        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'managePetroleum':

                return $this->managePetroleum();

            default:
                return '';

        }
    }

    private function managePetroleum()
    {
        $petroleumQuarter = $this->getPetroleumCalc();
        $petroleumQuarterImport = $this->getPetroleumImportCalc();
        $petroleumData = $this->fixNullArray(\App\OpecPetroleum::where('year', $this->year)->first());
//        return $petroleumData;
        $products = $this->getProduct();
        $year = $this->year;
        $headers = [
            'Ethane' => '',
            'LPG' => $products['lpg'],
            'Naphtha' => '',
            'Gasoline' => $products['pms'],
            'Kerosene' => $products['dpk'],
            'of which Jet fuel' => '',
            'Gas/diesel oil' => $products['ago'],
            'of which Automotive diesel' => '',
            'Fuel oil' => $products['fuel oil'],
            'Lubes' => $products['base oil'],
            'Bitumen' => $products['bitumen'],
            'Other products' => '',
        ];
        $Q_Day = $this->getQdays();
        $retailPrice = $this->getReatilPrice();

        if (request()->has('excel')) {
            return $this->toExcel(compact('retailPrice', 'petroleumData', 'Q_Day', 'year', 'headers', 'petroleumQuarter', 'petroleumQuarterImport'), 'Petroleum', 'opec.petroleum');
        }

        return view('opec.petroleum', compact('retailPrice', 'petroleumData', 'Q_Day', 'year', 'headers', 'petroleumQuarter', 'petroleumQuarterImport'));
    }

    public function getMonthlyDataPetroleum($model)
    {
        $monthlydataPetroleum = $model::selectRaw('SUM(january) as january,SUM(febuary) AS february, sum(march) as march ,sum(april) as april ,sum(may) as may ,sum(june) as june , sum(july) as july, sum(august) as august,sum(september) as september,sum(october) as october,sum(november) as november,sum(december) as december,product_id as stream_id')->groupBy('product_id')->where('year', $this->year)->get()->toArray();

        return $monthlydataPetroleum;
    }

    public function getPetroleumCalc()
    {
        $down_petroleum = $this->getMonthlyDataPetroleum(\App\down_refinery_production_volumes::class);
//        return $down_terminal_stream_prod;
        return $this->converToBopdStream($down_petroleum, 'quarter');
    }

    public function getPetroleumImportCalc()
    {
        $down_petroleum_export = $this->getMonthlyDataPetroleum(\App\down_product_vol_import_permit::class);
//        return $down_terminal_stream_prod;
        return $this->converToBopdStream($down_petroleum_export, 'quarter');
    }

    public function getProduct()
    {
        $products = \App\down_import_product::get()->pluck('id', 'product_name');

        return $products;
    }

    private function getReatilPrice()
    {
        $retailPrice = \App\down_ave_consumer_price_range::where([['year', $this->year], ['production_type', 3]])
                                                         ->selectRaw('((SUM(pms) + SUM(pms_to))/2) as pms ,((SUM(ago) + SUM(ago_to))/2) as ago,((SUM(dpk) + SUM(dpk_to))/2) as dpk')->first()->toArray();

        return $retailPrice;
    }
}
