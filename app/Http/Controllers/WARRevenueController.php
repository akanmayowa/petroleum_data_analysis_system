<?php

namespace App\Http\Controllers;

use App\Http\Resources\WARRevenueFAD as WARRevenueFADResource;
use App\Http\Resources\WARRevenueTaxMatter as WARRevenueTaxMatterResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WARRevenueController extends Controller
{
    public function __construct(Request $request)
    {
        \Auth::loginUsingId($request->user_id);
    }

    //function for sending email
    public function send_all_mail($request, $upload_name)
    {
        //getting the number of Weekly Activity Report USERS
        $UserObj = \App\User::where('id', $request->user_id)->first();
        $count = \App\User::where('id', 13)->orWhere('id', 15)->orWhere('id', 19)->get();
        //sending email to every Weekly Activitiy Report MANAGER
        foreach ($count as $WAR) {
            $sender = $WAR->email;
            $name = $WAR->name;
            $message = ', Weekly Activitiy Report Data for '.$upload_name.' was entered by '.$UserObj->name.' into PRIS, please review and take necessary action.';

            // \Auth::user()->notify(new emailNOGIARManager( $message, $sender, $name));
            $WAR->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($request, $record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => $request->user_id,
            'section' => 'Weekly Activitiy Report',
            'record' => $record,
            'action' => $action,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        switch ($request->type) {
            case 'revenue_fad':
                return $this->AddRevenueFAD($request);
            break;

            case 'revenue_tax_matter':
                return $this->AddRevenueTaxMatter($request);
            break;

            default:
                // code...
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        switch ($type) {
            case 'revenue_fad':
                $revenue_fad = \App\WARRevenueFAD::findOrFail($id);

                return new WARRevenueFADResource($revenue_fad);
            break;

            case 'revenue_tax_matter':
                $revenue_tax_matter = \App\WARRevenueTaxMatter::findOrFail($id);

                return new WARRevenueTaxMatterResource($revenue_tax_matter);
            break;

            default:
                // code...
            break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type)
    {
        //
        switch ($type) {
            case 'revenue_fad':
                $revenue_fad = \App\WARRevenueFAD::findOrFail($id);
                if ($revenue_fad->delete()) {
                    return new WARRevenueFADResource($revenue_fad);
                }
            break;

            case 'revenue_tax_matter':
                $revenue_tax_matter = \App\WARRevenueTaxMatter::findOrFail($id);
                if ($revenue_tax_matter->delete()) {
                    return new WARRevenueTaxMatterResource($revenue_tax_matter);
                }
            break;

            default:
                // code...
            break;
        }
    }

    public function uploading(Request $request)
    {
        switch ($request->type) {
            case 'fad':
                return $this->uploadFAD($request);
            break;

            case 'tax_matter':
                return $this->uploadTaxMaters($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function indexRevenueFAD(Request $request)
    {
        //
        if ($request->filled('all')) {
            $revenue_fads = \App\WARRevenueFAD::orderBy('id', 'desc')->get();

            return ['data'=>$revenue_fads];
        } else {
            $revenue_fads = \App\WARRevenueFAD::orderBy('id', 'desc')->paginate(15);

            return WARRevenueFADResource::collection($revenue_fads);
        }
    }

    public function AddRevenueFAD(Request $request)
    {
        $revenue_fad = $request->isMethod('put') ? \App\WARRevenueFAD::findOrFail($request->revenue_fad_id) : new \App\WARRevenueFAD;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $revenue_fad->id = $request->revenue_fad_id;
            $revenue_fad->date = date('Y-m-d', strtotime($request->date));
            $revenue_fad->week = $request->week;
            $revenue_fad->revenue = $request->revenue;
            $revenue_fad->revenue_receipt_issued = $request->revenue_receipt_issued;
            $revenue_fad->fund_transfer = $request->fund_transfer;
            $revenue_fad->personnel_cost = $request->personnel_cost;
            $revenue_fad->medical_bill_transfer = $request->medical_bill_transfer;
            $revenue_fad->outsorced_secuirity_services = $request->outsorced_secuirity_services;
            $revenue_fad->outsorced_cleaning_services = $request->outsorced_cleaning_services;
            $revenue_fad->penalty_fee = $request->penalty_fee;
            $revenue_fad->overhead_allocation = $request->overhead_allocation;
            $revenue_fad->salary_allowance = $request->salary_allowance;

            //send mail
            $this->send_all_mail($request, 'Revenue - FAD');
            //Audit Logging
            $this->log_audit_trail($request, 'FAD', 'Updated Record');
        } else {
            // $revenue_fad->id = $request->revenue_fad_id;
            $revenue_fad->date = date('Y-m-d', strtotime($request->date));
            $revenue_fad->week = $request->week;
            $revenue_fad->revenue = $request->revenue;
            $revenue_fad->revenue_receipt_issued = $request->revenue_receipt_issued;
            $revenue_fad->fund_transfer = $request->fund_transfer;
            $revenue_fad->personnel_cost = $request->personnel_cost;
            $revenue_fad->medical_bill_transfer = $request->medical_bill_transfer;
            $revenue_fad->outsorced_secuirity_services = $request->outsorced_secuirity_services;
            $revenue_fad->outsorced_cleaning_services = $request->outsorced_cleaning_services;
            $revenue_fad->penalty_fee = $request->penalty_fee;
            $revenue_fad->overhead_allocation = $request->overhead_allocation;
            $revenue_fad->salary_allowance = $request->salary_allowance;
            $revenue_fad->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Revenue - FAD');
            //Audit Logging
            $this->log_audit_trail($request, 'FAD', 'Added Record');
        }

        if ($revenue_fad->save()) {
            return new WARRevenueFADResource($revenue_fad);
        }
    }

    public function uploadFAD(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARRevenueFAD::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'revenue' => $row['C'],
                        'revenue_receipt_issued' => $row['D'],
                        'fund_transfer' => $row['E'],
                        'personnel_cost' => $row['F'],
                        'medical_bill_transfer' => $row['G'],
                        'outsorced_secuirity_services' => $row['H'],
                        'outsorced_cleaning_services' => $row['I'],
                        'penalty_fee' => $row['J'],
                        'overhead_allocation' => $row['K'],
                        'salary_allowance' => $row['L'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Revenue - FAD');
            //Audit Logging
            $this->log_audit_trail($request, 'FAD', 'Bulk Data Upload');

            $revenue_fads = \App\WARRevenueFAD::orderBy('id', 'desc')->paginate(15);

            return WARRevenueFADResource::collection($revenue_fads);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexRevenueTaxMatter(Request $request)
    {
        //
        if ($request->filled('all')) {
            $revenue_tax_matters = \App\WARRevenueTaxMatter::orderBy('id', 'desc')->get();

            return ['data'=>$revenue_tax_matters];
        } else {
            $revenue_tax_matters = \App\WARRevenueTaxMatter::orderBy('id', 'desc')->paginate(15);

            return WARRevenueTaxMatterResource::collection($revenue_tax_matters);
        }
    }

    public function AddRevenueTaxMatter(Request $request)
    {
        $revenue_tax_matter = $request->isMethod('put') ? \App\WARRevenueTaxMatter::findOrFail($request->revenue_tax_matter_id) : new \App\WARRevenueTaxMatter;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $revenue_tax_matter->id = $request->revenue_tax_matter_id;
            $revenue_tax_matter->date = date('Y-m-d', strtotime($request->date));
            $revenue_tax_matter->week = $request->week;
            $revenue_tax_matter->vat = $request->vat;
            $revenue_tax_matter->paye = $request->paye;
            $revenue_tax_matter->wht = $request->wht;
            $revenue_tax_matter->third_party_bill = $request->third_party_bill;
            $revenue_tax_matter->monthly_expenditure = $request->monthly_expenditure;

            //send mail
            $this->send_all_mail($request, 'Revenue - Tax Matters');
            //Audit Logging
            $this->log_audit_trail($request, 'Tax Matters', 'Updated Record');
        } else {
            // $revenue_tax_matter->id = $request->revenue_tax_matter_id;
            $revenue_tax_matter->date = date('Y-m-d', strtotime($request->date));
            $revenue_tax_matter->week = $request->week;
            $revenue_tax_matter->vat = $request->vat;
            $revenue_tax_matter->paye = $request->paye;
            $revenue_tax_matter->wht = $request->wht;
            $revenue_tax_matter->third_party_bill = $request->third_party_bill;
            $revenue_tax_matter->monthly_expenditure = $request->monthly_expenditure;
            $revenue_tax_matter->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Revenue - Tax Matters');
            //Audit Logging
            $this->log_audit_trail($request, 'Tax Matters', 'Added Record');
        }

        if ($revenue_tax_matter->save()) {
            return new WARRevenueTaxMatterResource($revenue_tax_matter);
        }
    }

    public function uploadTaxMaters(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARRevenueTaxMatter::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'vat' => $row['C'],
                        'paye' => $row['D'],
                        'wht' => $row['E'],
                        'third_party_bill' => $row['F'],
                        'monthly_expenditure' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Revenue - Tax Matters');
            //Audit Logging
            $this->log_audit_trail($request, 'Tax Matters', 'Bulk Data Upload');

            $revenue_tax_matters = \App\WARRevenueTaxMatter::orderBy('id', 'desc')->paginate(15);

            return WARRevenueTaxMatterResource::collection($revenue_tax_matters);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexFADMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'FAD':
                return $this->getMonthlyFADeReportFAD($request);
            break;

            case 'tax_matter':
                return $this->getMonthlyFADeReportTaxMatters($request);
            break;

            default:
                return $this->getMonthlyFADeReportFAD($request);
            break;
        }
    }

    public function getMonthlyData(Request $request, $datas, $model)
    {
        // return date('W');
        $year_f = substr($request->year, 0, 4);
        $year_from = $year_f.'-01-01';
        $year_to = $year_f.'-12-31';
        $monthVal = [];
        $monthWeek = ['jan'=>[1, 5], 'feb'=>[6, 9], 'mar'=>[10, 13], 'qrt1'=>[1, 13], 'apr'=>[14, 18], 'may'=>[19, 22], 'jun'=>[23, 26],
            'qrt2'=>[14, 26], 'm_yr'=>[1, 26],
            'jul'=>[27, 30], 'aug'=>[31, 35], 'sep'=>[36, 39], 'qrt3'=>[27, 39], 'oct'=>[40, 44], 'nov'=> [45, 48], 'dec'=>[49, 52],
            'qrt4'=>[40, 52], 'ann'=>[1, 52], ];

        foreach ($monthWeek as $months=>$weeks) {
            $weeks = (array) $weeks;
            for ($i = min($weeks); $i <= max($weeks); $i++) {
                $weekArr[$months][] = "Week $i";
            }

            foreach ($datas as $data=>$descrption) {
                $monthVal[$data][$months] = $model::where('date', '>=', $year_from)->where('date', '<=', $year_to)
                                           ->whereIn('week', $weekArr[$months])
                                           ->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;

        // return $list;
    }

    public function getMonthlyFADeReportFAD(Request $request)
    {
        $data = ['revenue'=>'Revenue',
            'revenue_receipt_issued'=>'Revenue Issued',
            'fund_transfer'=>'Funds Transfer',
            'personnel_cost'=>'Personnel Cost',
            'medical_bill_transfer'=>'Medical Bill Transfer',
            'outsorced_secuirity_services'=>'Outsourced Security Services',
            'outsorced_cleaning_services'=>'Outsourced Cleaning Services',
            'penalty_fee'=>'Penalty Fee',
            'overhead_allocation'=>'Overhead Allocation',
            'salary_allowance'=>'Salary/Allowances',
        ];

        return $this->getMonthlyData($request, $data, \App\WARRevenueFAD::class);
    }

    public function getMonthlyFADeReportTaxMatters(Request $request)
    {
        $data = ['vat'=>'VAT',
            'paye'=>'PAYE',
            'wht'=>'WHT',
            'third_party_bill'=>'Third Party Bills',
            'monthly_expenditure'=>'Mandatory Monthly Expenditure to Zonal/ Field Office(N)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARRevenueTaxMatter::class);
    }
}
