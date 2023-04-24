<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public $prod_name = null;

    public $string = null;

    public function BotQnA(Request $request)
    {
        $string = trim($request->a);

        ///////////capture average keyword////////// EXPORT  BY AVERAGE PRICE
        if (preg_match('/average pric/i', $string) || preg_match('/crude pric/i', $string)) {
            $this->export_by_price($string);
            exit();
        }

        ///////////capture average keyword////////// EXPORT  BY AVERAGE PRICE
        if (preg_match('/incident recorded/i', $string) || preg_match('/recorded incident/i', $string) || preg_match('/incident/i', $string)) {
            $this->accident_recorded($string);
            exit();
        }

        ///////////capture all continenet keywords////////// EXPORT  BY CONTINENET
        $streamIntent = \App\Continent::distinct('continent_name')->pluck('continent_name');
        foreach ($streamIntent as $key => $value) {
            $value = trim($value);
            $value = str_ireplace('/', '', $value);
            if (preg_match("/{$value}/i", $string)) {
                $this->export_by_continent($string);
                exit();
            }
        }
        ///////////capture all company keywords////////// EXPORT BY COMPANY
        $streamIntent = \App\company::distinct('company_name')->pluck('company_name');
        foreach ($streamIntent as $key => $value) {
            $value = trim($value);
            $value = substr($value, 0, 7);
            $value = str_ireplace('/', '', $value);
            if (preg_match("/$value/i", $string)) {
                $this->export_by_company($string);
                exit();
            }
        }
        ///////////capture all streams keywords////////// EXPORT BY STREAMS
        $streamIntent = \App\Stream::distinct('stream_name')->pluck('stream_name');
        foreach ($streamIntent as $key => $value) {
            $value = trim($value);
            $value = str_ireplace('/', '', $value);
            if (preg_match("/{$value}/i", $string)) {
                $this->export_by_stream($string);
                exit();
            }
        }
    }

    public function export_by_continent($string)
    {
        $avg_mon = (int) preg_match('/monthly export/i', $string);
        /////Resolve months
        $userMonth = $this->resolve_month($string);

        ///////////capture all continents keywords//////////
        $allcontinents = \App\Continent::distinct('continent_name')->pluck('continent_name');
        foreach ($allcontinents as $key => $value) {
            $value = trim($value);
            $value = str_ireplace('/', '', $value);
            if (preg_match("/{$value}/i", $string)) {
                $continents[] = $value;
            }
        }
        //////////Resolves Dates
        $date = $this->resolve_date($string);
        $date = explode('-', $date);
        $startdate = trim(@$date[0]);
        $enddate = trim(@$date[1]);

        foreach ($continents as $key => $continenet) {
            $continenet = trim($continenet);
            $datepadding = '';
            $dump = \App\down_crude_export_by_destination::whereHas('continent', function ($query) use ($continenet) {
                $query->where('continent_name', $continenet);
            });
            ////////date year range
            (strlen($startdate) == 4) ? $dump = $dump->where('year', $startdate) : '';
            (strlen($enddate) == 4) ? $dump = $dump->where('year', '<=', $enddate) : '';

            isset($userMonth) ? $dump = $dump->sum($userMonth) : $dump = $dump->sum('stream_total');
            /////////date padding echo
            (strlen($startdate) == 4) ? $datepadding = $startdate : '';
            (strlen($enddate) == 4) ? $datepadding .= '-'.$enddate : '';

            ////Response Processing
            if (! $dump == '0') {
                echo 'Total Export for **'.ucwords($continenet).'** '.$userMonth." $datepadding is: **".number_format($dump, 2, '.', ',')." MMbbls** \n\n";
            } else {
                echo "No Records found for export on **$continenet $datepadding**. \n\n";
            }
        }
    }

    public function export_by_company($string)
    {
        $avg_mon = (int) preg_match('/monthly export/i', $string);
        ///daily export
        $daily_average = (int) preg_match('/daily average/i', $string);
        //////////Resolve Production Name and Type
        $prod_type = (int) preg_match('/Condens/i', $string);
        if ($prod_type) {
            $prod_name = 'condensate';
            $prod_type = 2;
        } else {
            $prod_type = (int) preg_match('/crude/i', $string);
            if ($prod_type) {
                $prod_name = 'crude';
                $prod_type = 1;
            } else {
                $prod_name = 'crude and condensate ';
                $prod_type = null;
            }
        }
        /////Resolve months
        $userMonth = $this->resolve_month($string);
        ///////////capture all company keywords//////////
        $allcompanies = \App\company::distinct('company_name')->pluck('company_name');
        foreach ($allcompanies as $key => $value) {
            $value = trim($value);
            $value = str_ireplace('/', '', $value);
            if (preg_match("/{$value}/i", $string)) {
                $companies[] = $value;
            }
        }

        //////////Resolves Dates
        $date = $this->resolve_date($string);
        $date = explode('-', $date);
        $startdate = trim(@$date[0]);
        $enddate = trim(@$date[1]);

        foreach ($companies as $key => $company) {
            $company = trim($company);
            $datepadding = '';
            $dump = \App\down_monthly_summary_crude_export::whereHas('stream', function ($query) use ($company) {
                $query->where('stream_name', $company);
            });

            if ($prod_type) {
                $dump = $dump->whereHas('prod_type', function ($query) use ($prod_type) {
                    $query->where('production_type_id', $prod_type);
                });
            }

            ////////date year range
            (strlen($startdate) == 4) ? $dump = $dump->where('year', $startdate) : '';
            (strlen($enddate) == 4) ? $dump = $dump->where('year', '<=', $enddate) : '';
            isset($userMonth) ? $dump = $dump->sum($userMonth) : $dump = $dump->sum('stream_total');
            /////////date padding echo
            (strlen($startdate) == 4) ? $datepadding = $startdate : '';
            (strlen($enddate) == 4) ? $datepadding .= '-'.$enddate : '';

            //////daily average
            $daily_average_value = '';
            if ($daily_average && ! $enddate && $prod_type) {
                $totalyeardays = 0;
                for ($i = 1; $i <= 12; $i++) {
                    $totalyeardays += cal_days_in_month(CAL_GREGORIAN, $i, $startdate);
                }
                $daily_average_value = round(($dump / $totalyeardays), 2);
            }

            ////Response Processing
            if (! $dump == '0') {
                $output = "Total $prod_name export for **".ucwords($continent_name).'** '.$userMonth." $datepadding is: **".number_format($dump, 2, '.', ',')." MMbbls** \n\n";
                $output .= ($daily_average_value) ? 'Daily average export is **'.number_format($daily_average_value, 2, '.', ',').' MMbbls**' : '';
                //echo ($monthly_average_value) ? "Monthly Export is **". number_format($monthly_average_value,2, '.', ','). " MMbbls**" : '';
                echo $output;
            } else {
                echo "No Records found for $prod_name export on the company **$company $datepadding**. \n\n";
            }
        }
    }

    public function export_by_stream($string)
    {
        $avg_mon = (int) preg_match('/monthly export/i', $string);
        ///daily export
        $daily_average = (int) preg_match('/daily average/i', $string);
        //////////Resolve Production Name and Type
        $prod_type = (int) preg_match('/Condens/i', $string);
        if ($prod_type) {
            $prod_name = 'condensate';
            $prod_type = 2;
        } else {
            $prod_type = (int) preg_match('/crude/i', $string);
            if ($prod_type) {
                $prod_name = 'crude';
                $prod_type = 1;
            } else {
                $prod_name = 'crude and condensate ';
                $prod_type = null;
            }
        }
        /////Resolve months
        $userMonth = $this->resolve_month($string);

        ///////////capture all streams keywords//////////
        $allstreams = \App\Stream::distinct('stream_name')->pluck('stream_name');
        foreach ($allstreams as $key => $value) {
            $value = trim($value);
            $value = str_ireplace('/', '', $value);
            if (preg_match("/{$value}/i", $string)) {
                $streams[] = $value;
            }
        }
        //////////Resolves Dates
        $date = $this->resolve_date($string);
        $date = explode('-', $date);
        $startdate = trim(@$date[0]);
        $enddate = trim(@$date[1]);

        foreach ($streams as $key => $stream) {
            $stream = trim($stream);
            $datepadding = '';
            $dump = \App\down_monthly_summary_crude_export::whereHas('stream', function ($query) use ($stream) {
                $query->where('stream_name', $stream);
            });

            if ($prod_type) {
                $dump = $dump->whereHas('prod_type', function ($query) use ($prod_type) {
                    $query->where('production_type_id', $prod_type);
                });
            }

            ////////date year range
            (strlen($startdate) == 4) ? $dump = $dump->where('year', $startdate) : '';
            (strlen($enddate) == 4) ? $dump = $dump->where('year', '<=', $enddate) : '';
            isset($userMonth) ? $dump = $dump->sum($userMonth) : $dump = $dump->sum('stream_total');
            /////////date padding echo
            (strlen($startdate) == 4) ? $datepadding = $startdate : '';
            (strlen($enddate) == 4) ? $datepadding .= '-'.$enddate : '';

            //////daily average
            $daily_average_value = '';
            if ($daily_average && ! $enddate && $prod_type) {
                $totalyeardays = 0;
                for ($i = 1; $i <= 12; $i++) {
                    $totalyeardays += cal_days_in_month(CAL_GREGORIAN, $i, $startdate);
                }
                $daily_average_value = round(($dump / $totalyeardays), 2);
            }
            ////Response Processing
            if (! $dump == '0') {
                $output = "Total $prod_name export for **".ucwords($stream).'** '.$userMonth." $datepadding is: **".number_format($dump, 2, '.', ',')." MMbbls** \n\n";
                $output .= ($daily_average_value) ? 'Daily average export is **'.number_format($daily_average_value, 2, '.', ',').' MMbbls**' : '';
                //echo ($monthly_average_value) ? "Monthly Export is **". number_format($monthly_average_value,2, '.', ','). " MMbbls**" : '';
                echo $output;
            } else {
                echo "No export records found for $prod_name export **$stream $datepadding**. \n\n";
            }
        }
    }

    public function export_by_price($string)
    {
        $prod_type = (int) preg_match('/Condens/i', $string);
        if ($prod_type) {
            $prod_name = 'condensate';
            $prod_type = 2;
        } else {
            $prod_type = (int) preg_match('/crude/i', $string);
            if ($prod_type) {
                $prod_name = 'crude';
                $prod_type = 1;
            } else {
                $prod_name = 'crude and condensate ';
                $prod_type = null;
            }
        }
        /////Resolve months
        $userMonth = $this->resolve_month($string);
        ///////////capture all streams keywords//////////
        $allstreams = \App\Stream::distinct('stream_name')->pluck('stream_name');
        foreach ($allstreams as $key => $value) {
            $value = trim($value);
            $value = str_ireplace('/', '', $value);
            if (preg_match("/{$value}/i", $string)) {
                $streams[] = $value;
            }
        }
        empty($streams) ? exit('Stream not found, please enter question with a stream name') : '';

        //////////Resolves Dates
        $date = $this->resolve_date($string);
        $date = explode('-', $date);
        $startdate = trim(@$date[0]);
        $enddate = trim(@$date[1]);

        empty($userMonth) ? $userMonth = date('F') : '';

        foreach ($streams as $key => $stream) {
            $stream = trim($stream);
            $datepadding = '';
            $dump = \App\up_ave_price_crude_stream::whereHas('stream', function ($query) use ($stream) {
                $query->where('stream_name', $stream);
            });

            ////////date year range
            empty($startdate) ? $startdate = date('Y') : '';
            (strlen($startdate) == 4) ? $dump = $dump->where('year', $startdate) : '';

            ($userMonth == 'February') ? $userMonth = 'febuary' : $userMonth = $userMonth;

            $dump = $dump->sum($userMonth);

            ////Response Processing
            if (! $dump == '0') {
                echo 'Crude price for **'.ucwords($stream).'** in '.$userMonth." $startdate is **USD".number_format($dump, 2, '.', ',')."**\n\n";
            } else {
                echo "No crude price records found for **$stream in $userMonth $startdate**. \n\n";
            }
        }
    }

    public function accident_recorded($string)
    {
        $userMonth = $this->resolve_month($string);

        $date = $this->resolve_date($string);
        $dateformat = explode('-', $date);
        $startdate = trim(@$dateformat[0]);
        $enddate = trim(@$dateformat[1]);

        ///userMonth and Date filter
        if (! empty($userMonth) && ! empty($startdate)) {
            $total_accident_downstream = \App\she_accident_report_downstream::where('month', $userMonth);
            $total_accident_upstream = \App\she_accident_report_upstream::where('month', $userMonth);
            ////////date start year range downstream
            if (strlen($startdate) == 4) {
                $total_accident_downstream = $total_accident_downstream->where('year', $startdate);
                $total_accident_upstream = $total_accident_upstream->where('year', $startdate);
            }
            ////////date end year range downstream
            if (strlen($enddate) == 4) {
                $total_accident_downstream = $total_accident_downstream->where('year', '<=', $enddate);
                $total_accident_upstream = $total_accident_upstream->where('year', '<=', $enddate);
            }
            ///no userMonth but Date filter
        } elseif (! empty($userMonth) && empty($startdate)) {
            $total_accident_downstream = \App\she_accident_report_downstream::where('month', $userMonth);
            $total_accident_upstream = \App\she_accident_report_upstream::where('month', $userMonth);

        ///userMonth but No Date filter
        } elseif (empty($userMonth) && ! empty($startdate)) {
            ////////date start year range downstream
            if (strlen($startdate) == 4) {
                $total_accident_downstream = \App\she_accident_report_downstream::where('year', $startdate);
                $total_accident_upstream = \App\she_accident_report_upstream::where('year', $startdate);
            }
            ////////date end year range downstream
            if (strlen($enddate) == 4) {
                $total_accident_downstream = \App\she_accident_report_downstream::where('year', '>=', $startdate)->where('year', '<=', $enddate);
                $total_accident_upstream = \App\she_accident_report_upstream::where('year', '>=', $startdate)->where('year', '<=', $enddate);
            }
        } else {
            ///no userMonth and no Date filter
            $total_accident_downstream = \App\she_accident_report_downstream::whereNotNull('month');
            $total_accident_upstream = \App\she_accident_report_upstream::whereNotNull('month');
        }

        $total_accident_downstream = $total_accident_downstream->sum('incidents');
        $total_accident_upstream = $total_accident_upstream->sum('incidents');

        $output = "**Downstream** incidents $userMonth $date is **".$total_accident_downstream."**  \n\n";
        $output .= "**Upstream** incidents  $userMonth $date is **".$total_accident_upstream.'** ';

        echo $output;
    }

    public function resolve_month($string)
    {
        /////Resolve months
        $userMonth = null;
        $userMonthKey = null;
        $months = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];
        foreach ($months as $key => $value) {
            if (preg_match("/{$value}/i", $string)) {
                $userMonth = strtolower($value);
                $userMonthKey = $key;

                return $userMonth;
                break;
            }
        }
    }

    public function resolve_date($string)
    {
        //////////resolve date
        if (preg_match('/[0-9]{4}+-[0-9]{4}/', $string, $date)) {
            $date = $date[0];
        } elseif (preg_match('/[0-9]{4}/', $string, $date)) {
            $date = $date[0];
        } else {
            $date = '';
        }

        return $date;
    }
}
