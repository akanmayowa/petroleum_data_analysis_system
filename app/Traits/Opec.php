<?php

namespace App\Traits;

use Carbon\Carbon;

trait Opec
{
    public $precision = 2;

    public function convertToBopd($items) : array
    {
        $convertedItem = [];

        foreach ($items as $month => $value) {
            if ($month != 'stream_id') {
                $month = str_replace('febuary', 'february', $month);
                $convertedItem[$month] = round(($value / $this->getNumDayInMonth("{$this->year}-$month-01") / 1000), $this->precision);
            }
        }

        return $convertedItem;
    }

    public function converToBopdStream($items, $type = 'monthly') : array
    {
        $value = [];
        foreach ($items as $item) {
            if ($type == 'monthly') {
                $value[$item['stream_id']] = $this->convertToBopd($item);
            } else {
                $value[$item['stream_id']] = $this->converToQuarterBopd($item);
            }
        }

        return $value;
    }

    public function convertToBopdYear($convertedItem) : float
    {
        $sumdata = collect($convertedItem)->flatten()->sum();

        return $sumdata;
    }

    public function convertToBopdStreamYear($convertedItem) : array
    {
        $finalBopd = [];
        foreach ($convertedItem as $key => $item) {
            $finalBopd[$key] = $this->convertToBopdYear($item);
        }

        return $finalBopd;
    }

    public function getNumDayInMonth($date)
    {
        return Carbon::parse($date)->daysInMonth;
    }

    public function getNumDayInYear($date)
    {
        $dt = Carbon::parse($date);

        return $dt->isLeapYear() ? '366' : '365';
    }

    public function converToQuarterBopd($items) : array
    {
        $convertedItemQuarter = [];
        $dayNum = $Qvalue = 0;
        $j = $i = 1;

        foreach ($items as $month => $value) {
            if ($month != 'stream_id') {
                $month = str_replace('febuary', 'february', $month);

                $dayNum += $this->getNumDayInMonth(date('Y-m-d', strtotime("{$this->year}-$month-01")));
                $Qvalue += $value;

                if ($i % 3 == 0) {
                    $convertedItemQuarter["Q$j"] = round(($value / $dayNum / 1000), $this->precision);

                    $j++;
                    $dayNum = $Qvalue = 0;
                }
                $i++;
            }
        }

        return $convertedItemQuarter;
    }

    public function toExcel($data, $name, $view)
    {
        return \Excel::create($name, function ($excel) use ($data, $view) {
            $excel->sheet('New sheet', function ($sheet) use ($view, $data) {
                $sheet->loadView($view, $data);
            });
        })->download('xlsx');
    }

    public function getQdays(): array
    {
        $months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        $dayNum = $j = 0;
        $i = 1;
        $Qday = [];
        foreach ($months as $month) {
            $dayNum += $this->getNumDayInMonth("{$this->year}-$month-01");
            if ($i % 3 == 0) {
                $Qday[] = $dayNum;
                $dayNum = 0;
                $j++;
            }
            $i++;
        }

        return $Qday;
    }

    public function saveData($model, $type = null)
    {
        $datas = request()->except('type', '_token');
        $finalData = [];
        foreach ($datas as $key => $value) {
            $finalData[$key] = collect($value)->implode(',');
        }
        $model::updateOrCreate(['year' => request()->year], $finalData);

        if (is_null($type)) {
            if (request()->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'Data Successfully Saved']);
            }

            return redirect()->back();
        } else {
            return true;
        }
    }

    public function getStream($model, $cond = null)
    {
        $stream = $model::select('stream_id')->with('stream')->distinct('stream_id')->where([['year', $this->year]]);
        if (! is_null($cond)) {
            $stream = $stream->whereIn('production_type_id', $cond);
        }
        $stream = $stream->get();

        return $stream->pluck('stream.stream_name', 'stream.id');
    }

    public function fixNullArray($data)
    {
        return is_null($data) ? [] : $data->toArray();
    }

    public function getYears(): array
    {
        $years = [];
        $year = $this->year;
        for ($i = $year; $i <= $year + 4; $i++) {
            $years[] = $i;
        }

        return $years;
    }

    public function convertTomsmc($value)
    {
        return round(($value * 1000) / 3.281 / 3.281 / 3.281, $this->precision);
    }

    public function converToCubic($value)
    {
        return round($value / 3.281 / 3.281 / 3.281, $this->precision);
    }
}
