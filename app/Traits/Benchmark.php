<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Benchmark
{
    private function getRoute($id, Request $request)
    {
        switch ($id) {
                case 'index':
                    // code...
                        return $this->home($request);
                    break;
                case 'revenue':
                    // code...
                        return $this->home($request);
                    break;
                case 'crudeExport':
                    // code...
                        return $this->crudeExport($request);
                    break;
                case 'resolveFiltercriteria':
                    // code...
                        return $this->resolveFiltercriteria($request);
                    break;
                case 'productionProduct':
                    // code...
                    return $this->productionProduct($request);
                    break;
                case 'petroleumProductReporting':
                    // code...
                        return $this->petroleumProductReporting($request);
                    break;

                default:
                    // code...
                    return $this->home($request);
                    break;
            }
    }

    private function postRoute(Request $request)
    {
        switch ($request->type) {
                case 'index':
                    // code...
                    return $this->home($request);
                    break;
                case 'revenueBenchmark':
                    // code...
                    return $this->getRevenueBenchmarkData($request);
                    break;
                case 'crudeExportBenchmark':
                    // code...
                    return $this->getcrudeExportBenchmark($request);
                    break;
                case 'productionProductBenchmark':
                    // code...
                        return $this->productionProductBenchmark($request);
                    break;
                case 'importPermit':
                    // code...4
                        return $this->importPermit($request);
                case 'petroleumProductReporting':
                    // code...
                        return $this->petroleumProduct($request);
                    break;
                    break;
                default:
                    // code...
                    throw new \Exception('Invalid Route');
                    break;
            }
    }

    public function getRevenueBenchmarkData(Request $request)
    {
        $data = [];
        $start = date('Y', strtotime($request->start));
        $end = date('Y', strtotime($request->end));

        foreach ($request->revenueType as $revenue) {
            $model = "\App\\".$revenue;
            $revenueCollection = $model::whereBetween('year', [$start, $end])->get();

            if (count($data) == 0) {
                $data[] = collect(collect($revenueCollection)->pluck('year'))->map(function ($name) {
                    return "$name-01-01";
                })->prepend('x');
            }

            foreach ($request->criterias as $criteria) {
                $data[] = collect($revenueCollection)->pluck($this->resolveType($criteria, $revenue))->prepend($this->humanReadableChartLegend($criteria).",$revenue");
            }
        }

        return $data;
    }

    public function getcrudeExportBenchmark(Request $request)
    {
        $data = [];
        $start = date('Y', strtotime($request->start));
        $end = date('Y', strtotime($request->end));

        return $this->transposeTableMonthCrudeExport($request);
    }

    private function transposeTableMonthCrudeExport(Request $request)
    {
        // return $request->all();
        $start = date('Y', strtotime($request->start));
        $end = date('Y', strtotime($request->end));

        $model = "\App\\".$request->crude_export;
        $getData = collect($model::whereBetween('year', [$start, $end])->get());
        $IntransPosedData = [];
        $in = 'no';

        foreach ($request->criterials as $criteria) {
            // return $getData;

            $begin = new \DateTime(date('Y-m-01', strtotime($request->start)));
            $end = new \DateTime(date('Y-m-01', strtotime($request->end)));
            $IntransPosedData[$criteria] = [];
            $IntransPosedData[$criteria]['x'][] = 'x';
            $IntransPosedData[$criteria]['data'][] = $this->humanReadableChartLegend($request->crude_export).','.$this->resolveName($request, $criteria);

            for ($i = $begin; $i <= $end; $i->modify('+1 month')) {
                $IntransPosedData[$criteria]['x'][] = $i->format('Y').'-'.$i->format('m').'-01';
                $IntransPosedData[$criteria]['data'][] = $getData->where('year', $i->format('Y'))
                                                                                            ->where($this->resolveColumn($request), $criteria)
                                                                                                            ->sum(strtolower($i->format('F')));
            }

            if ($in == 'no') {
                $transPosedData[] = $IntransPosedData[$criteria]['x'];
                $in = 'Yes';
            }
            $transPosedData[] = $IntransPosedData[$criteria]['data'];
        }

        return $transPosedData;
    }

    public function resolveFiltercriteria(Request $request)
    {
        if ($request->type == 'down_crude_export_by_company') {
            return \App\company::select('id', 'company_name as text')->get();
        } elseif ($request->type == 'down_crude_export_by_destination') {
            return \App\Continent::select('id', 'continent_name as text')->get();
        } else {
            return \App\Stream::select('id', 'stream_name as text')->get();
        }
    }

    public function resolveName(Request $request, $criteria)
    {
        $name = [
            'down_crude_export_by_company'=>[\App\company::class, 'company_name'],
            'down_crude_export_by_destination'=>[\App\Continent::class, 'continent_name'],
            'down_monthly_summary_crude_export'=>[\App\Stream::class, 'stream_name'],
        ];
        $model = $name[$request->crude_export][0];

        return $model::where('id', $criteria)->value($name[$request->crude_export][1]);
    }

    private function resolveColumn(Request $request)
    {
        $columns = [
            'down_crude_export_by_company'=>'company_id',
            'down_crude_export_by_destination'=>'destination_id',
            'down_monthly_summary_crude_export'=>'stream_id',
        ];

        return $columns[$request->crude_export];
    }

    public function resolveType($value, $tableType)
    {
        if ($tableType == 'eco_revenue_projected') {
            return $value.'_projected';
        }

        return $value.'_actual';
    }

    public function home(Request $request)
    {
        $criterias = [

            'oil'=>'Oil Royalty',
            'gas'=>'Gas Sales Royalty',
            'gas_flare'=>'Gas Flare Payment',
            'concession'=>'Concession Rentals',
            'signature_bonus'=>'Signature Bonus',
            'misc'=>'misc',
            'total'=>'total',
        ];

        $modalName = 'revenueFilter';

        return view('benchmark.index', compact('criterias', 'modalName'));
    }

    public function crudeExport(Request $request)
    {
        $criterias = [
            'oil'=>'Oil Royalty',
            'gas'=>'Gas Sales Royalty',
            'gas_flare'=>'Gas Flare Payment',
            'concession'=>'Concession Rentals',
            'signature_bonus'=>'Signature Bonus',
            'misc'=>'misc',
            'total'=>'total',
        ];

        $modalName = 'crudeExport';

        return view('benchmark.index', compact('criterias', 'modalName'));
    }

    public function productionProduct(Request $request)
    {
        //markets
        // products
        $markets = \App\down_market_segment::get();
        $products = \App\down_import_product::get();
        $modalName = 'productionProduct';

        return view('benchmark.index', compact('products', 'markets', 'modalName'));
    }

    public function petroleumProductReporting(Request $request)
    {
        $markets = \App\down_market_segment::get();
        $states = \App\down_outlet_states::get();
        $modalName = 'productRetail';

        return view('benchmark.index', compact('states', 'markets', 'modalName'));
    }

    public function productionProductBenchmark(Request $request)
    {
        return $this->transposeTableMonthProduct($request);
    }

    public function petroleumProduct(Request $request)
    {
        return $this->transposeTableMonthProduct($request);
    }

    private function getModelName(Request $request)
    {
        return $request->has('import_permit') ? $request->import_permit : $request->product_retail;
    }

    private function resolveLoopArrProduct(Request $request)
    {
        if ($request->has('import_permit')) {
            return 	count($request->products) > count($request->markets) ? ['product_id', $request->products, 'market_segment_id', $request->markets] : ['market_segment_id', $request->markets, 'product_id', $request->products];
        }
        // petroleum product Reporting
        return 	count($request->states) > count($request->markets) ? ['state_id', $request->states, 'market_segment_id', $request->markets] : ['market_segment_id', $request->markets, 'state_id', $request->products];
    }

    // Works for petroleumProductReporting and production Product
    private function transposeTableMonthProduct(Request $request)
    {
        // return $request->all();
        $start = date('Y', strtotime($request->start));
        $end = date('Y', strtotime($request->end));

        $model = "\App\\".$this->getModelName($request);

        $getData = collect($model::whereBetween('year', [$start, $end])->get());
        // return $getData;
        $IntransPosedData = [];
        $in = 'no';
        $label = [];

        $highest = $this->resolveLoopArrProduct($request);
        $j = 0;
        foreach ($highest[1] as  $index=>$criteria) {
            // return $getData;

            $begin = new \DateTime(date('Y-m-01', strtotime($request->start)));
            $end = new \DateTime(date('Y-m-01', strtotime($request->end)));
            $IntransPosedData[$criteria] = [];
            $IntransPosedData[$criteria]['x'][] = 'x';
            $IntransPosedData[$criteria]['data'][] = '';

            foreach ($highest[3] as $secondCriterials) {
                $label = $this->humanReadableChartLegend($this->getModelName($request)).','.$this->resolveColumnNameProductMarket($highest[0], $criteria).','.$this->resolveColumnNameProductMarket($highest[2], $secondCriterials);

                $IntransPosedData[$criteria]['data'][0] = $label;
            }

            for ($i = $begin; $i <= $end; $i->modify('+1 month')) {
                foreach ($highest[3] as $secondCriterial) {
                    \Log::info("->where($highest[0],$criteria)->where($highest[2],$secondCriterial)");

                    $IntransPosedData[$criteria]['x'][] = $i->format('Y').'-'.$i->format('m').'-01';
                    $IntransPosedData[$criteria]['data'][] = $getData->where('year', $i->format('Y'))
                                                                                                                         ->where("$highest[0]", $criteria)
                                                                                                                         ->where("$highest[2]", $secondCriterial)
                                                                                                                         ->sum(strtolower($i->format('F')));
                }
            }
            if ($in == 'no') {
                $transPosedData[] = $IntransPosedData[$criteria]['x'];
                $in = 'Yes';
            }
            $transPosedData[] = $IntransPosedData[$criteria]['data'];
        }

        return $transPosedData;
    }

    public function resolveColumnNameProductMarket($type, $id)
    {
        $column = [
            'market_segment_id'=>['market_segment_name', \App\down_market_segment::class],
            'product_id'=>['product_name', \App\down_import_product::class],
            'state_id'=>['state_name', \App\down_outlet_states::class],
        ];

        return $column[$type][1]::where('id', $id)->value($column[$type][0]);
    }

    private function humanReadableChartLegend($machineReadable)
    {
        $dict = [
            'down_product_vol_import_permit'=>'Import Permit Volume',
            'down_refinary_production'=>'Actual Import Volume',
            'down_refinery_production_volumes'=>'Domestic Production',
            'eco_revenue_actual'=>'Actual',
            'eco_revenue_projected'=>'Projected',
            'down_crude_export_by_destination'=>'Export By Destination',
            'down_crude_export_by_company'=>'Export By Company',
            'down_monthly_summary_crude_export'=>'Export By Stream',
            'down_retail_outlet_summary'=>'Retail Outlets Count',
            'down_outlet_storage_capacity'=>'Retail Outlets Capacity',
            'down_ave_consumer_price_range'=>'Product Retail Price',
        ];

        return isset($dict[$machineReadable]) ? $dict[$machineReadable] : $machineReadable;
    }
}
