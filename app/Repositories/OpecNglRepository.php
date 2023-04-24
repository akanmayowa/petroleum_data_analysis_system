<?php

namespace App\Repositories;

use App\Traits\Opec;

class OpecNglRepository
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
            case 'saveNgl':

                return  $this->saveData(\App\Ngl::class);
            default:
                return $this->getCondensate();

        }
    }

    public function processGet($id)
    {
        switch ($id) {
            case 'manageNgl':

                return $this->manageNgl();

            default:
                return $this->getCondensate();

        }
    }

    public function manageNgl()
    {
        $plants = \App\down_plant_location::select('plant_location_name')->get();
        $nglManual = $this->fixNullArray(\App\Ngl::where('year', $this->year)->first());
        $FieldCondensates = $this->getCrudeExportQuarter(2);
        $PlantCondensates = $this->getCrudeExportQuarter(3);
        $FieldCondensatesstreamQuarter = $this->getCrudeCalcStream(2);
        $PlantCondensatesstreamQuarter = $this->getCrudeCalcStream(3);
        $OpecCrudes = array_merge(['field_condensate'=>$this->getCondensate()], $nglManual);
        $year = $this->year;
        $Q_Day = $this->getQdays();
        $streams = $this->getStream(\App\down_terminal_stream_prod::class, [2, 3]);
        if (request()->has('excel')) {
            return $this->toExcel(compact('FieldCondensates', 'PlantCondensates', 'FieldCondensatesstreamQuarter', 'PlantCondensatesstreamQuarter', 'streams', 'plants', 'year', 'OpecCrudes', 'Q_Day'), 'NGL', 'opec.ngl');
        }

        return view('opec.ngl', compact('FieldCondensatesstreamQuarter', 'PlantCondensatesstreamQuarter', 'FieldCondensates', 'PlantCondensates', 'streams', 'plants', 'year', 'OpecCrudes', 'Q_Day'));
    }

    public function getCondensate()
    {
        $gasExport = (\App\gas_export_volume_vessel::selectRaw('SUM(volume) as volume,month')->groupBy('month')->where('year', request()->year)->get());

        $data = ['january'=>0, 'february'=>0, 'march'=>0, 'april'=>0, 'may'=>0, 'june'=>0, 'july'=>0, 'august'=>0, 'september'=>0, 'october'=>0, 'november'=>0, 'december'=>0];
        foreach ($gasExport as $export) {
            $data[strtolower($export->month)] = $export->volume;
        }

        return   collect($this->converToQuarterBopd($data))->implode(',');
    }

    public function getCrudeExportQuarter($production_type_id)
    {
        $crudeExport = $this->getMonthlyData(\App\down_terminal_stream_prod::class, $production_type_id);

        return $this->converToQuarterBopd($crudeExport);
    }

    public function getMonthlyData($model, $production_type_id = 2)
    {
        $monthlydata = $this->fixNullArray($model::selectRaw('SUM(january) as january,SUM(febuary) AS february, sum(march) as march ,sum(april) as april ,sum(may) as may ,sum(june) as june , sum(july) as july, sum(august) as august,sum(september) as september,sum(october) as october,sum(november) as november,sum(december) as december')->where([['year', $this->year], ['production_type_id', $production_type_id]])->first());

        return $monthlydata;
    }

    //stream_id
    public function getMonthlyDataStream($model, $production_type_id = 2)
    {
        $monthlydataStream = $model::selectRaw('SUM(january) as january,SUM(febuary) AS february, sum(march) as march ,sum(april) as april ,sum(may) as may ,sum(june) as june , sum(july) as july, sum(august) as august,sum(september) as september,sum(october) as october,sum(november) as november,sum(december) as december,stream_id')->where([['year', $this->year], ['production_type_id', $production_type_id]])->groupBy('stream_id')->get()->toArray();

        return $monthlydataStream;
    }

    public function getCrudeCalcStream($production_type_id)
    {
        $down_terminal_stream_prod = $this->getMonthlyDataStream(\App\down_terminal_stream_prod::class, $production_type_id);
//        return $down_terminal_stream_prod;
        return $this->converToBopdStream($down_terminal_stream_prod, 'quarter');
    }
}
