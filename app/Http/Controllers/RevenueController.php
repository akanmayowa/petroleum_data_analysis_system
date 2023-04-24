<?php

namespace App\Http\Controllers;

use App\Notifications\emailNOGIARManager;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //function for sending email
    public function send_all_mail($upload_name)
    {
        //getting the number of DWP USERS
        $users = \App\EmailList::where('division', 'REVENUE')->get();
        //sending email to every DWP MANAGER
        $sender = \Auth::user()->email;
        $sender_name = \Auth::user()->name;
        $message = ', Data for '.$upload_name.' has been uploaded/Modified by '.$sender_name.' into PRIS, please review and take necessary action.';
        foreach ($users as $_user) {
            $user = \App\User::where('id', $_user->user_id)->first();
            $name = $user->name;

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }
        $admin = \App\User::where('id', 9)->first();
        $admin->notify(new emailNOGIARManager($message, $sender, 'Admin'));
    }

    //function for sending approved email
    public function send_approve_mail($pending_data, $role_1)
    {
        //getting the number of DWP USERS
        $count = \App\User::where('role', $role_1)->get();
        //sending email to every Approving Manager
        foreach ($count as $custodian) {
            $sender = $custodian->email;
            $name = $custodian->name;
            $message = ', Pending '.$pending_data.' Data has been Approve by '.\Auth::user()->name.' for PRIS use.';

            \Auth::user()->notify(new emailNOGIARManager($message, $sender, $name));
            $custodian->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => 1, //\Auth::user()->id,
            'section' => 'Revenue',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index()
    {
        //
        $stream_ave = \App\Stream::orderBy('stream_name', 'asc')->get();
        $exchange_rates = \App\ExchangeRate::orderBy('id', 'desc')->get();

        return view('economics.index', compact('stream_ave', 'exchange_rates'));
    }

    //search for download
    public function downloadSearchData(Request $request)
    {
        Session::put('st', $request->search_text);
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

            case 'add_exchange_rate':
                return $this->addExchangeRate($request);
            break;

            case 'add_revenue_projected':
                return $this->addRevenueProjected($request);
            break;

            case 'upload_revenue_projected':
                return $this->uploadRevenueProjected($request);
            break;

            case 'add_revenue_actual':
                return $this->addRevenueActual($request);
            break;

            case 'upload_revenue_actual':
                return $this->uploadRevenueActual($request);
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
    public function show(Request $request, $route)
    {
        //
        switch ($route) {
            case 'add_ave_price_crude':
                return $this->addAvePriceCrude($request);
            break;

            case 'upload_ave_price_crude':
                return $this->uploadAveCrudePrice($request);
            break;

            case 'approve_ave_price':
                return $this->approve_ave_crude_price($request);
            break;

            case 'modals_editRevenueProjected':
                // code...
                return $this->editRevenueProjected($request);
            break;

            case 'view_viewRevenueProjected':
                // code...
                return $this->viewRevenueProjected($request);
            break;

            case 'download_revenue_projected_xlsx':
                // code...
                return $this->download_revenue_projected($request);
            break;

            case 'approve_approveProjected':
                // code...
                return $this->approveProjected($request);
            break;

            case 'modals_editRevenueActual':
                // code...
                return $this->editRevenueActual($request);
            break;

            case 'view_viewRevenueActual':
                // code...
                return $this->viewRevenueActual($request);
            break;

            case 'download_revenue_actual_xlsx':
                // code...
                return $this->download_revenue_actual($request);
            break;

            case 'approve_approveActual':
                // code...
                return $this->approveActual($request);
            break;

            default:
                return $this->index($request);
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
    public function destroy($id)
    {
        //
    }

    //ALL FUNCTIONS

    public function addExchangeRate(Request $request)
    {
        $date = $request->date;
        $rates = \App\ExchangeRate::where('date', $date)->where('currency', $request->currency)->first();
        if ($rates && $request->id == '') {
            if ($request->ajax()) {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Exchnage Rate Already Exist For '.$date.' '.$rates->currency.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW
                $add_rate = \App\ExchangeRate::updateOrCreate(['id'=> $request->id],
                [
                    'date' => $request->date,   //date('Y-m-d', strtotime($request->date)),
                    'currency' => $request->currency,
                    'rate' => $request->rate,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //send mail
                //self::send_all_mail("REVENUE - Revenue Exchange Rate ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Revenue Exchange Rate', 'Update Record');
                } else {
                    self::log_audit_trail('Revenue Exchange Rate', 'Add Record');
                }

                if ($request->ajax()) {
                    $rate_details = ['date'=>$add_rate->date, 'currency'=>$add_rate->currency, 'rate'=>$add_rate->rate, 'id'=>$add_rate->id];

                    return response()->json(['status'=>'ok', 'message'=>$rate_details, 'info'=>'New Revenue Exchange Rate Added Successfully.']);
                } else {
                    return redirect()->route('economics.index')->with('info', 'Revenue Exchange Rate Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('economics.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function addRevenueProjected(Request $request)
    {
        $year = $request->year;
        $eco_yrs = \App\eco_revenue_projected::where('year', $year)->first();
        if ($eco_yrs) {
            if ($request->ajax()) {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$year.' Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW
                $add_rev = \App\eco_revenue_projected::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    // 'month' => $request->month,
                    'oil_projected' => $request->oil_projected,
                    'gas_projected' => $request->gas_projected,
                    'gas_flare_projected' => $request->gas_flare_projected,
                    'concession_projected' => $request->concession_projected,
                    'misc_projected' => $request->misc_projected,
                    'signature_bonus' => $request->signature_bonus,
                    'total_projected' => $request->oil_projected + $request->gas_projected + $request->gas_flare_projected + $request->concession_projected + $request->misc_projected + $request->signature_bonus,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //send mail
                //self::send_all_mail("REVENUE - Revenue Projected Summary ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Revenue Projected Summary', 'Update Record');
                } else {
                    self::log_audit_trail('Revenue Projected Summary', 'Add Record');
                }

                if ($request->ajax()) {
                    $rev_sum_details = ['year'=>$add_rev->year, 'month'=>$add_rev->month, 'oil_projected'=>$add_rev->oil_projected, 'gas_projected'=>$add_rev->gas_projected, 'gas_flare_projected'=>$add_rev->gas_flare_projected, 'concession_projected'=>$add_rev->concession_projected, 'misc_projected'=>$add_rev->misc_projected, 'signature_bonus'=>$add_rev->signature_bonus, 'total_projected'=>$add_rev->total_projected, 'id'=>$add_rev->id];

                    return response()->json(['status'=>'ok', 'message'=>$rev_sum_details, 'info'=>'New Revenue Projected Summary Added Successfully.']);
                } else {
                    return redirect()->route('economics.index')->with('info', 'Revenue Projected Summary Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('economics.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editRevenueProjected(Request $request)
    {
        $REV_SUM = \App\eco_revenue_projected::where('id', $request->id)->first();

        return view('economics.modals.editRevenueProjected', compact('REV_SUM'));
    }

    public function uploadRevenueProjected(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    // return $row['H'];
                    //INSERTING NEW
                    $add_ = \App\eco_revenue_projected::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'oil_projected' => $row['B'],
                            'gas_projected' => $row['C'],
                            'gas_flare_projected' => $row['D'],
                            'concession_projected' => $row['E'],
                            'misc_projected' => $row['F'],
                            'signature_bonus' => $row['G'],
                            'total_projected' => $row['B'] + $row['C'] + $row['D'] + $row['E'] + $row['F'] + $row['G'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('REVENUE - Revenue Projected Summary ');
            //Audit Logging
            self::log_audit_trail('Revenue Projected Summary', 'Data Bulk Upload');

            return redirect()->route('economics.index')->with('info', 'Revenue Projected Summary Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('economics.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRevenueProjected(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Revenue Projected', 'Viewed Data');
        $REV_SUM = \App\eco_revenue_projected::where('id', $request->id)->first();

        return view('economics.view.viewRevenueProjected', compact('REV_SUM'));
    }

    public function download_revenue_projected($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\eco_revenue_projected::where('year', 'like', "%$txt%")->get();
        } else {
            $data = \App\eco_revenue_projected::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Revenue Projected', 'Downloaded Data');

        $view = 'economics.excel.projected';

        return \Excel::download(new \App\Imports\revenue\ImportRevenueData($data, $view), 'Revenue Projected.xlsx');
    }

    public function approveProjected(Request $request)
    {
        $projecteds = \App\eco_revenue_projected::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('economics.approve.approveProjected', compact('projecteds'));
    }

    public function addRevenueActual(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $eco_yrs_mon = \App\eco_revenue_actual::where('year', $year)->where('month', $month)->first();
        if ($eco_yrs_mon) {
            if ($request->ajax()) {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$month.', '.$year.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW
                $add_rev = \App\eco_revenue_actual::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'oil_actual' => $request->oil_actual,
                    'gas_actual' => $request->gas_actual,
                    'gas_flare_actual' => $request->gas_flare_actual,
                    'concession_actual' => $request->concession_actual,
                    'misc_actual' => $request->misc_actual,
                    'signature_bonus' => $request->signature_bonus,
                    'total_actual' => $request->oil_actual + $request->gas_actual + $request->gas_flare_actual + $request->concession_actual + $request->misc_actual + $request->signature_bonus,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //send mail
                //self::send_all_mail("REVENUE - Revenue Actual Summary ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Revenue Actual Summary', 'Update Record');
                } else {
                    self::log_audit_trail('Revenue Actual Summary', 'Add Record');
                }

                if ($request->ajax()) {
                    $rev_sum_details = ['year'=>$add_rev->year, 'month'=>$add_rev->month, 'oil_actual'=>$add_rev->oil_actual, 'gas_actual'=>$add_rev->gas_actual, 'gas_flare_actual'=>$add_rev->gas_flare_actual, 'concession_actual'=>$add_rev->concession_actual, 'misc_actual'=>$add_rev->misc_actual, 'signature_bonus'=>$add_rev->signature_bonus, 'total_actual'=>$add_rev->total_actual, 'id'=>$add_rev->id];

                    return response()->json(['status'=>'ok', 'message'=>$rev_sum_details, 'info'=>'New Revenue Actual Summary Added Successfully.']);
                } else {
                    return redirect()->route('economics.index')->with('info', 'Revenue Actual Summary Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('economics.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editRevenueActual(Request $request)
    {
        $REV_SUM = \App\eco_revenue_actual::where('id', $request->id)->first();

        return view('economics.modals.editRevenueActual', compact('REV_SUM'));
    }

    public function uploadRevenueActual(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING NEW
                    $add_ = \App\eco_revenue_actual::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'oil_actual' => $row['C'],
                            'gas_actual' => $row['D'],
                            'gas_flare_actual' => $row['E'],
                            'concession_actual' => $row['F'],
                            'misc_actual' => $row['G'],
                            'signature_bonus' => $row['H'],
                            'total_actual' => $row['C'] + $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('REVENUE - Revenue Actual Summary ');
            //Audit Logging
            self::log_audit_trail('Revenue Actual Summary', 'Data Bulk Upload');

            return redirect()->route('economics.index')->with('info', 'Revenue Actual Summary Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('economics.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRevenueActual(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Revenue Actual', 'Viewed Data');
        $REV_SUM = \App\eco_revenue_actual::where('id', $request->id)->first();

        return view('economics.view.viewRevenueActual', compact('REV_SUM'));
    }

    public function download_revenue_actual($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\eco_revenue_actual::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->get();
        } else {
            $data = \App\eco_revenue_actual::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Revenue Actual', 'Downloaded Data');

        $view = 'economics.excel.actual';

        return \Excel::download(new \App\Imports\revenue\ImportRevenueData($data, $view), 'Revenue Actual.xlsx');
    }

    public function approveActual(Request $request)
    {
        $actuals = \App\eco_revenue_actual::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('economics.approve.approveActual', compact('actuals'));
    }

    public function deleteRecord(Request $request)
    {
        try {
            // return $request->all();
            $delete_record = $request->model::where('id', $request->id)->delete();
            if ($delete_record) {
                return response()->json(['status'=>'ok', 'info'=>'Record Deleted Successfully.']);
            } else {
                return response()->json(['status'=>'ok', 'info'=>'Error Occurred.']);
            }

            //Audit Logging
            self::log_audit_trail('Revenue Data', 'Data Deleted');
        } catch (\Exception $e) {
            // return response()->json(['status'=>'error', 'message'=>'Sorry, An Error Occurred .' .$e->getMessage()]);
            return  redirect()->route('economics.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }
}
