<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', '-1');
ini_set('memory_limit', '1024M');
use App\Notifications\emailNOGIARManager;
use App\Traits\ExcelExport;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GasController extends Controller
{
    //
    use ExcelExport;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //function for sending email
    public function send_all_mail($upload_name)
    {
        //getting the number of DWP USERS
        $users = \App\EmailList::where('division', 'MIDSTREAM')->get();
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
            'user_id' => \Auth::user()->id,
            'section' => 'GAS',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $company_act_p = $company_act = $company_imp = $companies = $company_sup = $companies_ppp = $company_ob = $company_prod = $company_util =
        $company_ret = $company_cap = $company_gas_prod = \App\company::orderBy('company_name', 'asc')->get();
        $facilities = \App\facility::orderBy('facility_name', 'asc')->get();
        $facility_types = \App\facility_type::orderBy('facility_type_name', 'asc')->where('type_id', '3')->get();
        $locations = $locations_ppp = \App\location::orderBy('location_name', 'asc')->get();
        $terrains = \App\terrain::orderBy('terrain_name', 'asc')->get();

        $statuses = \App\gas_status::orderBy('status_name', 'asc')->get();
        $plant_status = \App\status_category::orderBy('status', 'asc')->get();
        $field_sup = $field_util = \App\field::orderBy('field_name', 'asc')->get();
        $state_propane = $state_lng = $state_cng = $state_lpg = $state_act = $state_act_p = $state_count = $states_cap =
        \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        $market_count = $market_seg = \App\down_market_segment::orderBy('market_segment_name', 'asc')->get();
        $prod_type = $prod_types = \App\gas_product_type::orderBy('product_type_name', 'asc')->get();
        $product_rpro = $iv_products = \App\down_import_product::where('id', '5')->orderBy('product_name', 'asc')->get();

        $equity_exp = \App\company::where('id', '14')->orwhere('id', '89')->orwhere('id', '91')->orderBy('company_name', 'asc')->get();
        $stream_exp = \App\Stream::where('id', '34')->orwhere('id', '7')->orwhere('id', '39')->orwhere('id', '44')->orwhere('id', '62')->orderBy('stream_name', 'asc')->get();
        $product_exp = \App\down_product::where('id', '>=', '16')->where('id', '<=', '22')->orderBy('product_name', 'asc')->get();

        $product_act = $product_act_p = $product_imp = \App\down_import_product::orderBy('product_name', 'asc')->get();
        $country_imp = \App\Country::orderBy('country_name', 'asc')->get();
        $category_lpg = \App\gas_category::orderBy('category_name', 'asc')->where('type', 'lpg')->get();
        $category_cng = \App\gas_category::orderBy('category_name', 'asc')->where('type', 'cng')->get();
        $category_lng = \App\gas_category::orderBy('category_name', 'asc')->where('type', 'lng')->get();
        $category_pro = \App\gas_category::orderBy('category_name', 'asc')->get();

        return view('gas.index', compact('companies', 'facilities', 'facility_types', 'locations', 'terrains', 'statuses', 'companies_ppp', 'locations_ppp', 'company_sup', 'company_ob', 'plant_status', 'field_sup', 'field_util', 'state_count', 'market_count', 'states_cap', 'prod_type', 'prod_types', 'company_prod', 'company_util', 'company_ret', 'company_cap', 'market_seg', 'product_rpro', 'iv_products', 'equity_exp', 'stream_exp', 'product_exp', 'company_imp', 'product_imp', 'country_imp', 'company_act_p', 'company_act', 'state_act', 'state_act_p', 'product_act', 'product_act_p', 'state_lpg', 'category_lpg', 'state_cng', 'category_cng', 'state_lng', 'category_lng', 'state_propane', 'category_pro', 'company_gas_prod'));
    }

    //search for download
    public function downloadSearchData(Request $request)
    {
        Session::put('st', $request->search_text);
    }

    // SET APPROVED STAGE ID FOR ONE RECORD
    public function setStageId(Request $request)
    {
        try {
            $model_name = $request->model_name;
            $stage_id = $request->stage_id;
            $data = [
                'stage_id' => $stage_id,   'approve_by' => \Auth::user()->id,   'approve_at' => date('Y-m-d h:i:s'),
            ];
            $model_name::where('id', $request->id)->update($data);

            // if($request->ajax())
        //  {
        //      return response()->json(['status'=>'ok', 'message'=>'New. ']);
        //  }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    // SET APPROVED STAGE ID FOR ALL RECORD
    public function approveAllStageId(Request $request)
    {
        try {
            $model_name = $request->model_name;
            $stage_id = $request->stage_id;
            $name = $request->name;
            $batches = $model_name::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();
            foreach ($batches as $k => $batch) {
                $data = [
                    'stage_id' => $stage_id,   'approve_by' => \Auth::user()->id,   'approve_at' => date('Y-m-d h:i:s'),
                ];
                $model_name::where('id', $batch->id)->update($data);
            }
            //SENDING APPROVED EMAIL NOTIFICATION
            // self::send_approve_mail("UPSTREAM - ".$name." ", 13);
            //Audit Logging
            // self::log_audit_trail($name, 'Approved Data');

            if ($request->ajax()) {
                return response()->json(['status'=>'ok']);
            } else {
                return redirect()->route('gas.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    // SEND NOTIFICATION MAIL TO CUSTODIAN ABOUT APPROVED RECORD
    public function notifyCustodian(Request $request)
    {
        try {
            $model_name = $request->model_name;
            $name = $request->name;
            //SENDING APPROVED EMAIL NOTIFICATION
            self::notifyCustodianByEmail(' '.$name.' ', $model_name);
            //Audit Logging
            self::log_audit_trail($name, 'Approved Data');

            if ($request->ajax()) {
                return response()->json(['status'=>'ok']);
            } else {
                return redirect()->route('gas.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
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

            case 'add_gas_supply_obligation':
                return $this->add_gas_supply_obligation($request);
            break;

            case 'upload_gas_supply_obligation':
                return $this->upload_gas_supply_obligation($request);
            break;

            case 'add_gas_supply_performance':
                return $this->add_gas_supply_performance($request);
            break;

            case 'upload_gas_supply_performance':
                return $this->upload_gas_supply_performance($request);
            break;

            case 'add_gas_supply_textile_industry':
                return $this->add_gas_supply_textile_industry($request);
            break;

            case 'upload_gas_supply_textile_industry':
                return $this->upload_gas_supply_textile_industry($request);
            break;

            case 'add_gas_production_summary':
                return $this->add_gas_production_summary($request);
            break;

            case 'upload_gas_production_summary':
                return $this->upload_gas_production_summary($request);
            break;

            case 'add_gas_utilization_summary':
                return $this->add_gas_utilization_summary($request);
            break;

            case 'upload_gas_utilization_summary':
                return $this->upload_gas_utilization_summary($request);
            break;

            case 'add_gas_facility':
                return $this->add_gas_facility($request);
            break;

            case 'upload_gas_facility':
                return $this->upload_gas_facility($request);
            break;

            case 'add_gas_products':
                return $this->add_gas_products($request);
            break;

            case 'upload_gas_products':
                return $this->upload_gas_products($request);
            break;

            case 'add_product_volume_permit':
                return $this->add_product_volume_permit($request);
            break;

            case 'upload_product_volume_permit':
                return $this->upload_product_volume_permit($request);
            break;

            case 'add_refinery_production':
                return $this->add_refinery_production($request);
            break;

            case 'upload_refinery_production':
                return $this->upload_refinery_production($request);
            break;

            case 'add_gas_actual_production':
                return $this->add_gas_actual_production($request);
            break;

            case 'upload_gas_actual_production':
                return $this->upload_gas_actual_production($request);
            break;

            case 'add_gas_export_volume_vessel':
                return $this->add_gas_export_volume_vessel($request);
            break;

            case 'upload_gas_export_volume_vessel':
                return $this->upload_gas_export_volume_vessel($request);
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

            case 'modals_editGasObligation':
                // code...
                return $this->editGasObligation($request);
            break;

            case 'view_viewGasObligation':
                // code...
                return $this->viewGasObligation($request);
            break;

            case 'approve_approveGasObligation':
                // code...
                return $this->approveGasObligation($request);
            break;

            case 'modals_editGas':
                // code...
                return $this->editGas($request);
            break;

            case 'view_viewGas':
                // code...
                return $this->viewGas($request);
            break;

            case 'approve_approveActualGas':
                // code...
                return $this->approveActualGas($request);
            break;

            case 'modals_editGasSupplyTextileIndustry':
                // code...
                return $this->editGasSupplyTextileIndustry($request);
            break;

            case 'view_viewGasSupplyTextileIndustry':
                // code...
                return $this->viewGasSupplyTextileIndustry($request);
            break;

            case 'approve_approveGasSupplyTextileIndustry':
                // code...
                return $this->approveGasSupplyTextileIndustry($request);
            break;

            case 'modals_edit_gas_summary':
                // code...
                return $this->edit_gas_summary($request);
            break;

            case 'view_viewGasSummary':
                // code...
                return $this->viewGasSummary($request);
            break;

            case 'approve_approveGasSummary':
                // code...
                return $this->approveGasSummary($request);
            break;

            case 'modals_edit_gas_utilization':
                // code...
                return $this->edit_gas_utilization($request);
            break;

            case 'view_viewGasUtilization':
                // code...
                return $this->viewGasUtilization($request);
            break;

            case 'approve_approveGasUtilization':
                // code...
                return $this->approveGasUtilization($request);
            break;

            case 'modals_editGasFacility':
                // code...
                return $this->editGasFacility($request);
            break;

            case 'view_viewGasFacility':
                // code...
                return $this->viewGasFacility($request);
            break;

            case 'approve_approveGasFacility':
                // code...
                return $this->approveGasFacility($request);
            break;

            case 'modals_editGasProducts':
                // code...
                return $this->editGasProducts($request);
            break;

            case 'view_viewGasProducts':
                // code...
                return $this->viewGasProducts($request);
            break;

            case 'approve_approveGasProducts':
                // code...
                return $this->approveGasProducts($request);
            break;

            case 'modals_editProductVolumePermit':
                // code...
                return $this->editProductVolumePermit($request);
            break;

            case 'view_viewProductVolumePermit':
                // code...
                return $this->viewProductVolumePermit($request);
            break;

            case 'approve_approveVolumePermit':
                // code...
                return $this->approveVolumePermit($request);
            break;

            case 'modals_editRefineryProduction':
                // code...
                return $this->editRefineryProduction($request);
            break;

            case 'view_viewRefineryProduction':
                // code...
                return $this->viewRefineryProduction($request);
            break;

            case 'approve_approveRefineryProduction':
                // code...
                return $this->approveRefineryProduction($request);
            break;

            case 'modals_editGasActualProduction':
                // code...
                return $this->editGasActualProduction($request);
            break;

            case 'view_viewGasActualProduction':
                // code...
                return $this->viewGasActualProduction($request);
            break;

            case 'approve_approveGasActualProduction':
                // code...
                return $this->approveGasActualProduction($request);
            break;

            case 'modals_editGasExportVolumeVessel':
                // code...
                return $this->editGasExportVolumeVessel($request);
            break;

            case 'view_viewGasExportVolumeVessel':
                // code...
                return $this->viewGasExportVolumeVessel($request);
            break;

            case 'approve_approveGasExportVolumeVessel':
                // code...
                return $this->approveGasExportVolumeVessel($request);
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

    public function add_gas_supply_obligation(Request $request)
    {
        $company_id = $request->company_id;
        $year = $request->year;
        $gas_supplys = \App\gas_domestic_gas_obligation::where('company_id', $company_id)->where('year', $year)->first();
        if ($gas_supplys) {
            if ($request->ajax() && $request->id == '') {
                $gas_comp = $gas_supplys->company->company_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$gas_comp.' Company, Year '.$year.'.  Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW Gas Supply
                $add_gas_sup = \App\gas_domestic_gas_obligation::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'company_id' => $request->company_id,
                    'performance_obligation' => $request->performance_obligation,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'gas_domestic_gas_obligation', 'column_1');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\gas_domestic_gas_obligation::class, $id, 'gas_domestic_gas_obligation');
                }

                //send mail
                //self::send_all_mail("GAS - Domestic Gas Obligation ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Domestic Gas Obligation', 'Update Record');
                } else {
                    self::log_audit_trail('Domestic Gas Obligation', 'Add Record');
                }

                if ($request->ajax()) {
                    $gas_supply_details = ['year'=>$add_gas_sup->year, 'company'=>$add_gas_sup->company->company_name, 'performance_obligation'=>$add_gas_sup->performance_obligation, 'id'=>$add_gas_sup->id];

                    return response()->json(['status'=>'ok', 'message'=>$gas_supply_details, 'info'=>'New Gas Obligation Added Successfully.']);
                } else {
                    return redirect()->route('gas.index')->with('info', 'Gas Obligation Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editGasObligation(Request $request)
    {
        $GAS_PERF_ = \App\gas_domestic_gas_obligation::where('id', $request->id)->first();

        return view('gas.modals.editGasObligation', compact('GAS_PERF_'));
    }

    public function upload_gas_supply_obligation(Request $request)
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
                // $year = $row['A'];      $company_id = $row['B'];
                // $gas_supplys = \App\gas_domestic_gas_obligation::where('company_id', $company_id)->where('year', $year)->first();
                // if($gas_supplys)
                // {
                //     $company = $gas_supplys->company->company_name;
                //     return redirect()->route('gas')->with('error', 'Sorry, Record Already Exist For '.$company.' Company, Year ' .$year. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else   { goto edit; }
                // {
                //     edit:
                if ($key >= 2) {

                            //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['B']}%", $row['B']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }

                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'gas_domestic_gas_obligation',
                                    'column_1' => $column_1,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                    }

                    if ($row['C'] == 0) {
                        $performance_obligation = 0.00;
                    } else {
                        $performance_obligation = $row['C'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_domestic_gas_obligation::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'company_id' => $company_id,
                                'performance_obligation' => $performance_obligation,
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\gas_domestic_gas_obligation::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                }
                //  }
            }

            //send mail
            self::send_all_mail('GAS - Domestic Gas Obligation ');
            //Audit Logging
            self::log_audit_trail('Domestic Gas Obligation', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Domestic Gas Supply Obligation Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            // return redirect()->route('gas.index')->with('error', 'An Error Occurred, Incompactable Data Type or Empty Columes in Excel. Please Fill all Required Field in Excel and Re-upload');
        }
    }

    public function viewGasObligation(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Domestic Gas Obligation', 'Viewed Data');

        $GAS_PERF = \App\gas_domestic_gas_obligation::where('id', $request->id)->first();

        return view('gas.view.viewGasObligation', compact('GAS_PERF'));
    }

    public function download_gas_supply_obligation($type, Request $request)
    {
        $txt = Session::get('st');
        // dd($txt);
        if ($txt != null) 
        { 
            $data = \App\gas_domestic_gas_obligation::where('year', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) 
                {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {  
            $data = \App\gas_domestic_gas_obligation::get();
        }

        // dd($data);

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Domestic Gas Obligation', 'Downloaded Data');

        $view = 'gas.excel.gas_obligation_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Obligation.xlsx');
    }

    public function approveGasObligation(Request $request)
    {
        $obligations = \App\gas_domestic_gas_obligation::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasObligation', compact('obligations'));
    }

    public function add_gas_supply_performance(Request $request)
    {
        $company_id = $request->company_id;
        $year = $request->year;
        $month = $request->month;
        $gas_supplys = \App\gas_domestic_gas_supply::where('company_id', $company_id)->where('year', $year)->where('month', $month)->first();
        if ($gas_supplys) {
            if ($request->ajax() && $request->id == '') {
                $gas_comp = $gas_supplys->company->company_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$gas_comp.' Company, Year '.$year.' '.$month.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:

                //GETTING THE COMPANY OBLIGATION FOR THE SELECTED YEAR
                // $average_supply = $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december;
                // $comp_obli = \App\gas_domestic_gas_obligation::where('year', $year)->where('month', $month)->where('company_id', $company_id)->first();
                // if($comp_obli)
                // {
                //     $performance_percent = (($average_supply * 100)/ $comp_obli->performance_obligation);
                // }else
                // {
                //     $performance_percent = '0.00';
                // }

                //to calculate total if not supplied
                // if($request->ind_tot == 1){ $total = ($request->power + $request->commercial + $request->industry); }
                // else{ $total = $request->total; }

                //INSERTING NEW Gas Supply
                $add_gas_sup = \App\gas_domestic_gas_supply::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    // 'power' => $request->power,
                    // 'commercial' => $request->commercial,
                    // 'industry' => $request->industry,
                    'total' => $request->total,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'gas_domestic_gas_supply', 'column_1');
                    }
                    //clear temp record
                    $this->clearTempRecord(\App\gas_domestic_gas_supply::class, $id, 'gas_domestic_gas_supply');
                }

                //send mail
                //self::send_all_mail("GAS - Actual Gas Supply ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Actual Gas Supply', 'Update Record');
                } else {
                    self::log_audit_trail('Actual Gas Supply', 'Add Record');
                }

                if ($request->ajax()) {
                    $gas_supply_details = ['year'=>$add_gas_sup->year, 'month'=>$add_gas_sup->month, 'company'=>$add_gas_sup->company->company_name, 'total'=>$add_gas_sup->total, 'id'=>$add_gas_sup->id];

                    return response()->json(['status'=>'ok', 'message'=>$gas_supply_details, 'info'=>'New Gas Actual Supply Added Successfully.']);
                } else {
                    return redirect()->route('gas.index')->with('info', 'Actual Gas Supply Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editGas(Request $request)
    {
        $GAS_PERF = \App\gas_domestic_gas_supply::where('id', $request->id)->first();

        return view('gas.modals.editGas', compact('GAS_PERF'));
    }

    public function upload_gas_supply_performance(Request $request)
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
                // $year = $row['A'];      $company_id = $row['B'];
                // $gas_supplys = \App\gas_domestic_gas_supply::where('company_id', $company_id)->where('year', $year)->first();
                // if($gas_supplys)
                // {
                //     $company = $gas_supplys->company->company_name;
                //     return redirect()->route('gas')->with('error', 'Sorry, Record Already Exist For '.$company.' Company, Year ' .$year. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else   { goto edit; }
                // {
                //     edit:
                if ($key >= 2) {

                        //to calculate total if not supplied
                    // if($row['G'] == 0){ $total = ($row['D'] + $row['E'] + $row['F']); }
                    // else{ $total = $row['G'] ; }

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }

                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'gas_domestic_gas_supply',
                                    'column_1' => $column_1,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_domestic_gas_supply::updateOrCreate(['year'=> $row['A'], 'month'=> $row['B'],
                        'company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['C']), ],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            // 'power' => $row['D'],
                            // 'commercial' => $row['E'],
                            // 'industry' => $row['F'],
                            'total' => $row['D'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\gas_domestic_gas_supply::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                }
                //  }
            }

            //send mail
            self::send_all_mail('GAS - Actual Gas Supply ');
            //Audit Logging
            self::log_audit_trail('Actual Gas Supply', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Actual Gas Supply Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewGas(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Actual Gas Supply', 'Viewed Data');

        $GAS_PERF = \App\gas_domestic_gas_supply::where('id', $request->id)->first();

        return view('gas.view.viewGas', compact('GAS_PERF'));
    }

    public function download_gas_supply_performance($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_domestic_gas_supply::where('year', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\gas_domestic_gas_supply::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Actual Gas Supply', 'Downloaded Data');
        $view = 'gas.excel.gas_supply_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Supply.xlsx');
    }

    public function approveActualGas(Request $request)
    {
        $supplies = \App\gas_domestic_gas_supply::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveActualGas', compact('supplies'));
    }

    public function add_gas_supply_textile_industry(Request $request)
    {
        $sector = $request->sector;
        $year = $request->year;
        $gas_supplys = \App\gas_supply_textile_industry::where('sector', $sector)->where('year', $year)->first();
        if ($gas_supplys) {
            if ($request->ajax() && $request->id == '') {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$sector.' Sector, Year '.$year.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:

                //INSERTING NEW Gas Supply
                $add_gas_sup = \App\gas_supply_textile_industry::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'sector' => $request->sector,
                    'value' => $request->value,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //send mail
                //self::send_all_mail("GAS - Gas Supply Textile Industry ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Gas Supply Textile Industry', 'Update Record');
                } else {
                    self::log_audit_trail('Gas Supply Textile Industry', 'Add Record');
                }

                if ($request->ajax()) {
                    $gas_supply_details = ['year'=>$add_gas_sup->year, 'sector'=>$add_gas_sup->sector, 'value'=>$add_gas_sup->value, 'id'=>$add_gas_sup->id];

                    return response()->json(['status'=>'ok', 'message'=>$gas_supply_details, 'info'=>'New Gas Supply Textile Industry Added Successfully.']);
                } else {
                    return redirect()->route('gas.index')->with('info', 'Gas Supply Textile Industry Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editGasSupplyTextileIndustry(Request $request)
    {
        $GAS = \App\gas_supply_textile_industry::where('id', $request->id)->first();

        return view('gas.modals.editGasSupplyTextileIndustry', compact('GAS'));
    }

    public function upload_gas_supply_textile_industry(Request $request)
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
                    //GETTING THE COMPANY OBLIGATION FOR THE SELECTED YEAR
                    $year = $row['A'];
                    $sector = $row['B'];

                    //UPLOADING NEW
                    $add_prod = \App\gas_supply_textile_industry::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'sector' => $row['B'],
                            'value' => $row['C'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('GAS - Gas Supply Textile Industry ');
            //Audit Logging
            self::log_audit_trail('Gas Supply Textile Industry', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Gas Supply Textile Industry Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewGasSupplyTextileIndustry(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Actual Gas Supply', 'Viewed Data');

        $GAS = \App\gas_supply_textile_industry::where('id', $request->id)->first();

        return view('gas.view.viewGasSupplyTextileIndustry', compact('GAS'));
    }

    public function download_gas_supply_textile_industry($type)
    {
        //Audit Logging
        self::log_audit_trail('Gas Supply Textile Industry', 'Downloaded Data');
        $data = \App\gas_supply_textile_industry::get();
        $view = 'gas.excel.gas_supply_textile_industry_excel';

        return \Excel::download(new \App\Imports\upstream\ImportGasData($data, $view), 'Gas Textile Industry.xlsx');
    }

    public function approveGasSupplyTextileIndustry(Request $request)
    {
        $supplies = \App\gas_supply_textile_industry::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasSupplyTextileIndustry', compact('supplies'));
    }

    public function add_gas_production_summary(Request $request)
    {
        // return $request->all();

        // $month = $request->month;      $year = $request->year;    $field_id = $request->field_id;    $company_id = $request->company_id;
        // $gas_supplys = \App\gas_summary_of_gas_production::where('month', $month)->where('year', $year)->where('field_id', $field_id)->where('company_id', $company_id)->first();
        // if($gas_supplys)
        // {
        //     if($request->ajax() && $request->id == '')
        //      {
        //          return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$month.', Year ' .$year. '. Please Check Existing Records.']);
        //      }else   { goto edit; }
        // }
        // else   { goto edit; }
        // {
        try {
            //edit:
            //$field_id = $request->field_id;    $field = \App\field::where('id', $field_id)->first();  $company_id = $field->company_id;
            //INSERTING NEW Gas Summary
            $add_gas_sum = \App\gas_summary_of_gas_production::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'field_id' => $request->field_id,
                    // 'company_id' => $company_id,
                    'company_id' => $request->company_id,
                    'ag' => $request->ag,
                    'nag' => $request->nag,
                    'total' => $request->total,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $field_id = $request->field_id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'gas_summary_of_gas_production', 'column_1');
                }
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'gas_summary_of_gas_production', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\gas_summary_of_gas_production::class, $id, 'gas_summary_of_gas_production');
            }

            //send mail
            //self::send_all_mail("GAS - Summary of Gas Production ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Summary of Gas Production', 'Update Record');
            } else {
                self::log_audit_trail('Summary of Gas Production', 'Add Record');
            }

            if ($request->ajax()) {
                $gas_sum_details = ['year'=>$add_gas_sum->year, 'month'=>$add_gas_sum->month, 'field'=> 'Null', 'company'=>$add_gas_sum->company->company_name, 'ag'=>$add_gas_sum->ag, 'nag'=>$add_gas_sum->nag, 'total'=>$add_gas_sum->total, 'id'=>$add_gas_sum->id];

                return response()->json(['status'=>'ok', 'message'=>$gas_sum_details, 'info'=>'Summary of Gas Production Added Successfully.']);
            } else {
                return redirect()->route('gas.index')->with('info', 'Summary of Gas Production Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        //}
    }

    public function edit_gas_summary(Request $request)
    {
        $GAS_SUM = \App\gas_summary_of_gas_production::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $GAS_SUM->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();
        $one_com = \App\company::where('id', $GAS_SUM->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('gas.modals.edit_gas_summary', compact('GAS_SUM', 'one_fie', 'all_fie', 'all_com', 'one_com'));
    }

    public function upload_gas_production_summary(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $count = 0;
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                // $year = $row['A'];      $month = $row['B'];     $field_id = $row['C'];
                // $gas_supplys = \App\gas_summary_of_gas_production::where('year', $year)->where('field_id', $field_id)->where('month', $month)->first();
                // if($gas_supplys)
                // {
                //     $field = $gas_supplys->field->field_name;
                //     return redirect()->route('gas')->with('error', 'Sorry, Record Already Exist For '.$field.' Field, Year ' .$year. ' '.$month. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else   { goto edit; }
                // {
                //     edit:
                if ($key >= 2 && $row['A'] != '') {
                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['D']}%", $row['D']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['D'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'gas_summary_of_gas_production',
                                    'column_1' => $column_1, 'column_2' => $column_2,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_2['name'];
                        }
                    } else {
                        $field_id = $results_1['name'];
                        $company_id = $results_2['name'];
                    }

                    if ($row['C'] != null) {
                        $drow = \App\field::where('field_name', $row['C'])->first();
                        if ($drow) {
                            $contract_id = $drow->contract_id;
                        } else {
                            $contract_id = null;
                        }
                    } else {
                        $drow = \App\field::where('company_id', $row['D'])->first();
                        if ($drow) {
                            $contract_id = $drow->contract_id;
                        } else {
                            $contract_id = null;
                        }
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_summary_of_gas_production::create(
                              //   ['year'=> $row['A'], 'month'=> $row['B'],
                              // 'field_id'=> $this->resolveModelId('\App\field', 'field_name', $row['C']),
                              // 'company_id'=> $this->resolveModelId('\App\company', 'company_name', $row['D']),
                              // 'ag'=> $row['E'], 'nag'=> $row['F'] ],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'field_id' => $field_id,
                                'company_id' => $company_id,
                                'ag' => $row['E'],
                                'nag' => $row['F'],
                                'total' => $row['E'] + $row['F'],
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                                'contract_id' => $contract_id,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\gas_summary_of_gas_production::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $field_id = '';
                    $company_id = '';
                }
                $count++;
                //  }
            }

            //send mail
            self::send_all_mail('GAS - Summary of Gas Production ');
            //Audit Logging
            self::log_audit_trail('Summary of Gas Production', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Summary of Gas Production Excel Uploaded Successfully with '.$count.' record uploaded');
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewGasSummary(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Production Summary', 'Viewed Data');

        $GAS_SUM = \App\gas_summary_of_gas_production::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $GAS_SUM->field_id)->first();
        $one_com = \App\company::where('id', $GAS_SUM->company_id)->first();

        return view('gas.view.viewGasSummary', compact('GAS_SUM', 'one_fie', 'one_com'));
    }

    public function download_gas_production_summary($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_summary_of_gas_production::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$xt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$xt%");
                })->get();
        } else {
            $data = \App\gas_summary_of_gas_production::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Production Summary', 'Downloaded Data');

        $view = 'gas.excel.gas_production_excel';

        return \Excel::download(new \App\Imports\gas\gImportGasData($data, $view), 'Gas Production Summary.xlsx');
    }

    public function approveGasSummary(Request $request)
    {
        $gas_productions = \App\gas_summary_of_gas_production::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasSummary', compact('gas_productions'));
    }

    public function add_gas_utilization_summary(Request $request)
    {
        // $month = $request->month;      $year = $request->year;     $field_id = $request->field_id;
        // $gas_supplys = \App\gas_summary_of_gas_utilization::where('month', $month)->where('year', $year)->where('field_id', $field_id)->first();
        // if($gas_supplys)
        // {
        //     if($request->ajax() && $request->id == '')
        //      {
        //         $comp = $gas_supplys->field->field_name;
        //          return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$month.', Year ' .$year. ' '. $comp .'.  Please Check Existing Records.']);
        //      }else   { goto edit; }
        // }
        // else   { goto edit; }
        // {
        try {
            // edit:

            //GETTING THE COMPANY TOTAL AG + NAG FOR THE SELECTED YEAR
            // $year = $request->year;    $month = $request->month;
            // $total_gas_utilized = $request->fuel_gas + $request->gas_lift + $request->re_injection + $request->ngl_lpg + $request->gas_to_nipp + $request->local_others + $request->nlng_export;
            // $total_gas_utilized = number_format($total_gas_utilized, 2, ".", "");
            // $ag_nag = \App\gas_summary_of_gas_production::where('year', $year)->where('month', $month)->where('company_id', $request->company_id)->first();
            // $company_name = \App\company::where('id', $request->company_id)->first();
            // if($ag_nag)
            // {
            //     if($ag_nag->total == 0){ goto zero; }
            //     $percent_utilized = (($total_gas_utilized * 100) / $ag_nag->total);

            //     //SETTING PERCENTAGE UTILIZED AND FLARED.
            //     $percent_flared = (100 - $percent_utilized);
            //     $percent_flared = number_format($percent_flared, 2, ".", "");
            //     $total_ag_nag = $ag_nag->total;
            //     // TOTAL GAS FLARED
            //     $total_gas_flared = $total_ag_nag - $total_gas_utilized;
            // }
            // else
            // {
            //     zero :
            //     return response()->json(['status'=>'err', 'info'=>'Sorry data for '.$year.' '.$month.' for the Company : '.$company_name->company_name.' has not been uploaded for Gas Production, Please upload all Gas Production data before uploading utilizations']);
            //     // $percent_utilized = '0.00';    $percent_flared = '0.00';  $total_ag_nag = '0.00';
            // }

            // $statistical_difference = ($ag_nag->total - $total_gas_utilized - $request->shrinkage - $total_gas_flared);
            // $statistical_difference = number_format($statistical_difference, 2, ".", "");

            // $field_id = $request->field_id;    $field = \App\field::where('id', $field_id)->first();  $company_id = $field->company_id;
            //INSERTING NEW Gas Summary
            $add_gas_sum = \App\gas_summary_of_gas_utilization::updateOrCreate(['id'=> $request->id],
                [
                    'month' => $request->month,
                    'year' => $request->year,
                    'field_id' => $request->field_id,
                    'company_id' => $request->company_id,
                    'fuel_gas' => $request->fuel_gas,
                    'gas_lift' => $request->gas_lift,
                    're_injection' => $request->re_injection,
                    'ngl_lpg' => $request->ngl_lpg,
                    'gas_to_nipp' => $request->gas_to_nipp,
                    'local_others' => $request->local_others,
                    'nlng_export' => $request->nlng_export,
                    'total_gas_utilized' => $request->total_gas_utilized,
                    'percent_utilized' => $request->percent_utilized,
                    'ag_gas_flared' => $request->ag_gas_flared,
                    'nag_gas_flared' => $request->nag_gas_flared,
                    'total_gas_flared' => $request->total_gas_flared,
                    'percent_flared' => $request->percent_flared,
                    'total_ag_nag' => $request->total_ag_nag,
                    'shrinkage' => $request->shrinkage,
                    'statistical_difference' => $request->statistical_diff,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $field_id = $request->field_id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'gas_summary_of_gas_utilization', 'column_1');
                }
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'gas_summary_of_gas_utilization', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\gas_summary_of_gas_utilization::class, $id, 'gas_summary_of_gas_utilization');
            }

            //send mail
            //self::send_all_mail("GAS - Summary of Gas Utilization ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Summary of Gas Utilization', 'Update Record');
            } else {
                self::log_audit_trail('Summary of Gas Utilization', 'Add Record');
            }

            if ($request->ajax()) {
                $gas_sum_details = ['month'=>$add_gas_sum->month, 'year'=>$add_gas_sum->year, 'field'=>$add_gas_sum->field->field_name, 'company'=>$add_gas_sum->company->company_name, 'fuel_gas'=>$add_gas_sum->fuel_gas, 'gas_lift'=>$add_gas_sum->gas_lift, 're_injection'=>$add_gas_sum->re_injection, 'ngl_lpg'=>$add_gas_sum->ngl_lpg, 'gas_to_nipp'=>$add_gas_sum->gas_to_nipp, 'local_others'=>$add_gas_sum->local_others, 'nlng_export'=>$add_gas_sum->nlng_export, 'total_gas_utilized'=>$add_gas_sum->total_gas_utilized, 'percent_utilized'=>$add_gas_sum->percent_utilized, 'total_gas_flared'=>$add_gas_sum->total_gas_flared, 'percent_flared'=>$add_gas_sum->percent_flared, 'total_ag_nag'=>$add_gas_sum->total_ag_nag, 'shrinkage'=>$add_gas_sum->shrinkage, 'statistical_difference'=>$add_gas_sum->statistical_difference, 'id'=>$add_gas_sum->id];

                return response()->json(['status'=>'ok', 'message'=>$gas_sum_details, 'info'=>'Summary of Gas Utilization Added Successfully.']);
            } else {
                return redirect()->route('gas.index')->with('info', 'Summary of Gas Utilization Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        // }
    }

    public function edit_gas_utilization(Request $request)
    {
        $GAS_SUM = \App\gas_summary_of_gas_utilization::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $GAS_SUM->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();
        $one_com = \App\company::where('id', $GAS_SUM->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('gas.modals.edit_gas_utilization', compact('GAS_SUM', 'all_com', 'one_com', 'one_fie', 'all_fie'));
    }

    public function upload_gas_utilization_summary(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        // try
        // {
        $getFile = $request->file('file')->getRealPath();
        $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
        $ob = $ob->getActiveSheet()->toArray(null, true, true, true);
        $count = 0;

        foreach ($ob as $key => $row) {
            //     $year = $row['A'];      $month = $row['B'];      $field_id = $row['C']    $company_id = $row['D'];;
            //     $gas_supplys = \App\gas_summary_of_gas_utilization::where('year', $year)->where('month', $month)->where('field_id', $field_id)->where('company_id', $company_id)->first();
            //     if($gas_supplys)
            //     {
            //$comp = $gas_supplys->company->company_name;
            //         return redirect()->route('gas')->with('error', 'Sorry, Record Already Exist For ' .$year. ' '.$month.' '.$comp. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
            //     }
            //     else   { goto edit; }
            //     {
            //         edit:
            if ($key >= 2 && $row['A'] != '') {
                //script to check if name exist in master record
                $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);
                $results_2 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['D']}%", $row['D']);

                if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                    //checking individual columns if there is a match
                    if ($results_1['stage_id'] == 3) {
                        $column_1 = $row['C'];
                    } else {
                        $column_1 = '';
                    }
                    if ($results_2['stage_id'] == 3) {
                        $column_2 = $row['D'];
                    } else {
                        $column_2 = '';
                    }

                    //INSERT INTO UNRESOLVED TABLE
                    $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'gas_summary_of_gas_utilization',
                                    'column_1' => $column_1,    'column_2' => $column_2,
                                ]);
                    if ($results_1['stage_id'] == 3) {
                        $field_id = 0;
                    } else {
                        $field_id = $results_1['name'];
                    }
                    if ($results_2['stage_id'] == 3) {
                        $company_id = 0;
                    } else {
                        $company_id = $results_2['name'];
                    }
                } else {
                    $field_id = $results_1['name'];
                    $company_id = $results_2['name'];
                }

                //UPLOADING NEW
                $add_prod = \App\gas_summary_of_gas_utilization::create(
                              //   ['year' => $row['A'], 'month' => $row['B'],
                              // 'field_id'=> $this->resolveModelId('\App\field', 'field_name', $row['C']),
                              // 'company_id'=> $this->resolveModelId('\App\company', 'company_name', $row['D']) ],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'field_id' => $field_id,
                                'company_id' => $company_id,
                                'fuel_gas' => $row['E'],
                                'gas_lift' => $row['F'],
                                're_injection' => $row['G'],
                                'ngl_lpg' => $row['H'],
                                'gas_to_nipp' => $row['I'],
                                'local_others' => $row['J'],
                                'nlng_export' => $row['K'],
                                'total_gas_utilized' => $row['L'],
                                'percent_utilized' => $row['M'],
                                'ag_gas_flared' => $row['N'],
                                'nag_gas_flared' => $row['O'],
                                'total_gas_flared' => $row['P'],
                                'percent_flared' => $row['Q'],
                                'total_ag_nag' => $row['R'],
                                'shrinkage' => $row['S'],
                                'statistical_difference' => $row['T'],
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);
                $count++;

                //UPDATE ID RECORD
                if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                    $this->updateTable(\App\gas_summary_of_gas_utilization::class, 'pending_id', $add_prod->id, $pend->id);
                    $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                }
                $field_id = '';
                $company_id = '';
            }

            //  }
        }

        //send mail
        //self::send_all_mail("GAS - Summary of Gas Utilization ");
        //Audit Logging
        self::log_audit_trail('Summary of Gas Utilization', 'Data Bulk Upload');

        return redirect()->route('gas.index')->with('info', 'Summary of Gas Utilization Excel Uploaded Successfully with '.$count.' records uploaded');
        // }
            // catch (\Exception $e)
            // {
            //     return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. ' .$e->getMessage());
            // }
    }

    public function viewGasUtilization(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Utilization', 'Viewed Data');
        $GAS_SUM = \App\gas_summary_of_gas_utilization::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $GAS_SUM->company_id)->first();
        $one_fie = \App\field::where('id', $GAS_SUM->field_id)->first();

        return view('gas.view.viewGasUtilization', compact('GAS_SUM', 'one_com', 'one_fie'));
    }

    public function download_gas_utilization_summary($type, Request $request)
    {
        $txt = Session::get('st');
        // return $request->all();
        if ($txt != null) {
            $data = \App\gas_summary_of_gas_utilization::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\gas_summary_of_gas_utilization::get();
        }

        //comments
        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Utilization', 'Downloaded Data');

        $view = 'gas.excel.gas_utility_excel';    

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Utilization Summary.xlsx');
    }

    public function download_gas_performance($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_summary_of_gas_utilization::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\gas_summary_of_gas_utilization::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Balance Performance', 'Downloaded Data');

        $view = 'gas.excel.gas_balance_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Performance Summary.xlsx');
    }

    public function approveGasUtilization(Request $request)
    {
        $utilizations = \App\gas_summary_of_gas_utilization::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasUtilization', compact('utilizations'));
    }

    public function add_gas_facility(Request $request)
    {
        $company_id = $request->company_id;
        $facility_id = $request->facility_id;
        $gas_facs = \App\gas_major_gas_facilities::where('company_id', $company_id)->where('facility_id', $facility_id)->first();
        if ($gas_facs) {
            if ($request->ajax() && $request->id == '') {
                $comp = $gas_facs->company->company_name;
                $fac = $gas_facs->facility->facility_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$comp.' Company, Facility '.$fac.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW Gas Facility
                $gas_facility = \App\gas_major_gas_facilities::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    'facility_id' => $request->facility_id,
                    'facility_type_id' => $request->facility_type_id,
                    'location_id' => $request->location_id,
                    'terrain_id' => $request->terrain_id,
                    'design_capacity' => $request->design_capacity,
                    'operating_capacity' => $request->operating_capacity,
                    'facility_design_life' => $request->facility_design_life,
                    'date_of_commissioning' => $request->date_of_commissioning,
                    'status_id' => $request->status_id,
                    'license_status' => $request->license_status,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                $facility_id = $request->facility_id;
                $facility_type_id = $request->facility_type_id;
                $terrain_id = $request->terrain_id;
                $status_id = $request->status_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'gas_major_gas_facilities', 'column_1');
                    }
                    if (! empty($facility_id)) {
                        $this->updateTempRecord($id, 'gas_major_gas_facilities', 'column_2');
                    }
                    if (! empty($facility_type_id)) {
                        $this->updateTempRecord($id, 'gas_major_gas_facilities', 'column_3');
                    }
                    if (! empty($terrain_id)) {
                        $this->updateTempRecord($id, 'gas_major_gas_facilities', 'column_4');
                    }
                    if (! empty($status_id)) {
                        $this->updateTempRecord($id, 'gas_major_gas_facilities', 'column_4');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\gas_major_gas_facilities::class, $id, 'gas_major_gas_facilities');
                }

                //send mail
                //self::send_all_mail("GAS - Gas Facility ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Gas Facility', 'Update Record');
                } else {
                    self::log_audit_trail('Gas Facility', 'Add Record');
                }

                if ($request->ajax()) {
                    $gas_facility_details = ['year'=>$gas_facility->year, 'month'=>$gas_facility->month, 'company'=>$gas_facility->company->company_name, 'facility'=>$gas_facility->facility->facility_name, 'facility_type'=>$gas_facility->facility_type->facility_type_name, 'location'=>$gas_facility->location_id, 'terrain'=>$gas_facility->terrain->terrain_name, 'gas_status'=>$gas_facility->gas_status->status_name, 'design_capacity'=>$gas_facility->design_capacity, 'operating_capacity'=>$gas_facility->operating_capacity, 'facility_design_life'=>$gas_facility->facility_design_life, 'date_of_commissioning'=>$gas_facility->date_of_commissioning, 'date_of_commissioning'=>$gas_facility->date_of_commissioning, 'license_status'=>$gas_facility->license_status, 'id'=>$gas_facility->id];

                    return response()->json(['status'=>'ok', 'message'=>$gas_facility_details, 'info'=>'New Gas Facility Added Successfully.']);
                } else {
                    return redirect()->route('gas.index')->with('info', 'Gas Facility Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editGasFacility(Request $request)
    {
        $GAS_FAC = \App\gas_major_gas_facilities::where('id', $request->id)->first();

        return view('gas.modals.editGasFacility', compact('GAS_FAC'));
    }

    public function upload_gas_facility(Request $request)
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
                // $year = $row['A'];      $month = $row['B'];   $facility_id = $row['D'];
                // $gas = \App\gas_major_gas_facilities::where('year', $year)->where('month', $month)->where('facility_id', $facility_id)->first();
                // if($gas)
                // {
                //     $facility = $gas->facility->facility_name;
                //     return redirect()->route('gas')->with('error', 'Sorry, Record Already Exist For ' .$facility. ', ' .$month. ' '.$year. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else   { goto edit; }
                // {
                //     edit:
                if ($key >= 2) {
                    $created_by = \Auth::user()->name;

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\facility::class, 'facility_name', "%{$row['D']}%", $row['D']);
                    $results_3 = $this->resolveMasterData(\App\facility_type::class, 'facility_type_name', "%{$row['E']}%", $row['E']);
                    $results_4 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['G']}%", $row['G']);
                    $results_5 = $this->resolveMasterData(\App\gas_status::class, 'status_name', "%{$row['L']}%", $row['L']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['D'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['E'];
                        } else {
                            $column_3 = '';
                        }
                        if ($results_4['stage_id'] == 3) {
                            $column_4 = $row['G'];
                        } else {
                            $column_4 = '';
                        }
                        if ($results_5['stage_id'] == 3) {
                            $column_5 = $row['L'];
                        } else {
                            $column_5 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'gas_major_gas_facilities',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4, 'column_5' => $column_5,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $facility_id = 0;
                        } else {
                            $facility_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $facility_type_id = 0;
                        } else {
                            $facility_type_id = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $terrain_id = 0;
                        } else {
                            $terrain_id = $results_4['name'];
                        }
                        if ($results_5['stage_id'] == 3) {
                            $status_id = 0;
                        } else {
                            $status_id = $results_5['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $facility_id = $results_2['name'];
                        $facility_type_id = $results_3['name'];
                        $terrain_id = $results_4['name'];
                        $status_id = $results_5['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_major_gas_facilities::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'company_id' => $company_id,
                                'facility_id' => $facility_id,
                                'facility_type_id' => $facility_type_id,
                                'location_id' => $row['F'],
                                'terrain_id' => $terrain_id,
                                'design_capacity' => $row['H'],
                                'operating_capacity' => $row['I'],
                                'facility_design_life' => $row['J'],
                                'date_of_commissioning' => $row['K'],
                                'status_id' => $status_id,
                                'license_status' => $row['M'],
                                'batch_number' => date('d-M'),
                                'created_by' => $created_by,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3) {
                        $this->updateTable(\App\gas_major_gas_facilities::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $facility_id = '';
                    $facility_type_id = '';
                    $terrain_id = '';
                    $status_id = '';

                    //send mail
                    self::send_all_mail('GAS - Gas Facility ');
                    //Audit Logging
                    self::log_audit_trail('Gas Facility', 'Data Bulk Upload');
                }
                //  }
            }

            return redirect()->route('gas.index')->with('info', 'Major Gas Facilities Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewGasFacility(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Facilities', 'Viewed Data');
        $GAS_FACILITY = \App\gas_major_gas_facilities::where('id', $request->id)->first();

        return view('gas.view.viewGasFacility', compact('GAS_FACILITY'));
    }

    public function download_gas_facility($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_major_gas_facilities::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orWhere('license_status', 'like', "%$txt%")->orWhere('location_id', 'like', "%$txt%")
            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })
            ->orwhereHas('facility', function ($query) use ($txt) {
                $query->where('facility_name', 'like', "%$txt%");
            })
            ->orwhereHas('facility_type', function ($query) use ($txt) {
                $query->where('facility_type_name', 'like', "%$txt%");
            })
            ->orwhereHas('terrain', function ($query) use ($txt) {
                $query->where('terrain_name', 'like', "%$txt%");
            })
            ->orwhereHas('gas_status', function ($query) use ($txt) {
                $query->where('status_name', 'like', "%$txt%");
            })->get();
        } else {
            $data = \App\gas_major_gas_facilities::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Facilities', 'Downloaded Data');
        $view = 'gas.excel.gas_facility_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Facilities.xlsx');
    }

    public function approveGasFacility(Request $request)
    {
        $facilities = \App\gas_major_gas_facilities::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasFacility', compact('facilities'));
    }

    public function add_gas_products(Request $request)
    {
        try {
            $product_type = $request->product_type;      //getting the Product Type
            //INSERTING NEW
            $add_ret_out = \App\gas_product_monitoring::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                // 'company_id' => $request->company_id,
                'product_type' => $product_type,
                'category_id' => $request->categories_id,
                // 'state_id' => $request->state_id,
                // 'lga' => $request->lga,
                'zone' => $request->zone,
                // 'no_of_plant' => $request->no_of_plant,
                'capacity' => $request->capacity,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $category_id = $request->category_id;  //$company_id = $request->company_id;  $state_id = $request->state_id;
            if (! empty($id)) {
                if (! empty($category_id)) {
                    $this->updateTempRecord($id, 'gas_product_monitoring', 'column_1');
                }
                // if(!empty($company_id)){ $this->updateTempRecord($id, 'gas_product_monitoring', 'column_2'); }
                // if(!empty($state_id)){ $this->updateTempRecord($id, 'gas_product_monitoring', 'column_3'); }

                //clear temp record
                $this->clearTempRecord(\App\gas_product_monitoring::class, $id, 'gas_product_monitoring');
            }

            //send mail
            //self::send_all_mail("GAS - Gas Products ".$product_type." ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Gas Products '.$product_type.' ', 'Update Record');
            } else {
                self::log_audit_trail('Gas Products '.$product_type.' ', 'Add Record');
            }

            if ($request->ajax()) {
                $ret_out_details = ['year'=>$add_ret_out->year, 'month'=>$add_ret_out->month, 'category'=>$add_ret_out->category->category_name,  'product_type'=>$add_ret_out->product_type, 'zone'=>$add_ret_out->zone, 'capacity'=>$add_ret_out->capacity, 'id'=>$add_ret_out->id];

                return response()->json(['status'=>'ok', 'message'=>$ret_out_details, 'info'=>'New Gas Products '.$product_type.' Added Successfully.']);
            } else {
                return redirect()->route('gas.index')->with('info', 'Gas Products '.$product_type.' Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editGasProducts(Request $request)
    {
        $GAS_PROD = \App\gas_product_monitoring::where('id', $request->id)->first();

        return view('gas.modals.editGasProducts', compact('GAS_PROD'));
    }

    public function upload_gas_products(Request $request)
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
                    if ($row['D'] != null) {
                        //script to check if name exist in master record
                        // $results_1 = $this->resolveMasterData('\App\company', 'company_name', "%{$row['C']}%", $row['C']);
                        $results_1 = $this->resolveMasterData(\App\gas_category::class, 'category_name', "%{$row['D']}%", $row['D']);
                        // $results_3 = $this->resolveMasterData('\App\down_outlet_states', 'state_name', "%{$row['E']}%", $row['E']);

                        if ($results_1['stage_id'] == 3) {
                            //checking individual columns if there is a match
                            if ($results_1['stage_id'] == 3) {
                                $column_1 = $row['D'];
                            } else {
                                $column_1 = '';
                            }
                            // if($results_2['stage_id'] == 3){ $column_2 = $row['D']; }else{ $column_2 = ''; }
                            // if($results_3['stage_id'] == 3){ $column_3 = $row['E']; }else{ $column_3 = ''; }

                            //INSERT INTO UNRESOLVED TABLE
                            $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'gas_product_monitoring',
                                    'column_1' => $column_1, //'column_2' => $column_2, 'column_3' => $column_3,
                                ]);
                            // if($results_1['stage_id'] == 3){ $company_id = 0; }else{ $company_id = $results_1['name']; }
                            if ($results_1['stage_id'] == 3) {
                                $category_id = 0;
                            } else {
                                $category_id = $results_1['name'];
                            }
                            // if($results_3['stage_id'] == 3){ $state_id = 0; }else{$state_id = $results_3['name']; }
                        } else {
                            $category_id = $results_1['name'];  //$company_id = $results_1['name'];  $state_id = $results_3['name'];
                        }
                    } else {
                        $category_id = null;
                    }

                    $product_type = $row['C'];

                    //UPLOADING NEW
                    $add_prod = \App\gas_product_monitoring::updateOrCreate(['year'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            // 'company_id' => $company_id,
                            'product_type'=> $product_type,
                            'category_id' => $category_id,
                            // 'state_id' => $state_id,
                            // 'lga' => $row['F'],
                            'zone' => $row['E'],
                            'capacity' => $row['F'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    if ($row['D'] != null) {
                        //UPDATE ID RECORD
                        if ($results_1['stage_id'] == 3) {
                            $this->updateTable(\App\gas_product_monitoring::class, 'pending_id', $add_prod->id, $pend->id);
                            $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                        }
                        $category_id = '';  //$company_id = '';  $state_id = '';
                    }
                }
            }

            //send mail
            self::send_all_mail('GAS - Gas Products '.$product_type.' ');
            //Audit Logging
            self::log_audit_trail('Gas Products '.$product_type.' ', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Gas Products '.$product_type.' Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewGasProducts(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Retail Outlet', 'Viewed Data');
        $GAS_PROD = \App\gas_product_monitoring::where('id', $request->id)->first();

        return view('gas.view.viewGasProducts', compact('GAS_PROD'));
    }

    public function download_gas_lpg($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_product_monitoring::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhere('product_type', 'LPG')->orwhere('lga', 'like', "%$txt%")->orwhere('zone', 'like', "%$txt%")
                ->orwhere('capacity', 'like', "%$txt%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%$txt%");})
                ->orwhereHas('category', function ($query) use ($txt) {
                    $query->where('category_name', 'like', "%$txt%");
                })
                // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%$txt%"); })
                ->get();
        } else {
            $data = \App\gas_product_monitoring::where('product_type', 'LPG')->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Products LPG', 'Downloaded Data');

        $view = 'gas.excel.gas_product_monitoring_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Product - LPG.xlsx');
    }

    public function download_gas_cng($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_product_monitoring::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orwhere('product_type', 'CNG')
                ->orwhere('lga', 'like', "%$txt%")->orwhere('zone', 'like', "%$txt%")
                // ->orwhere('capacity', 'like', "%$txt%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%$txt%");})
                ->orwhereHas('category', function ($query) use ($txt) {
                    $query->where('category_name', 'like', "%$txt%");
                })
                // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%$txt%"); })
                ->get();
        } else {
            $data = \App\gas_product_monitoring::where('product_type', 'CNG')->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Products CNG', 'Downloaded Data');

        $view = 'gas.excel.gas_product_monitoring_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Product - CNG.xlsx');
    }

    public function download_gas_lng($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_product_monitoring::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orwhere('product_type', 'LNG')
                ->orwhere('lga', 'like', "%$txt%")->orwhere('zone', 'like', "%$txt%")
                ->orwhere('capacity', 'like', "%$txt%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%$txt%");})
                ->orwhereHas('category', function ($query) use ($txt) {
                    $query->where('category_name', 'like', "%$txt%");
                })
                // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%$txt%"); })
                ->get();
        } else {
            $data = \App\gas_product_monitoring::where('product_type', 'LNG')->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Products LNG', 'Downloaded Data');

        $view = 'gas.excel.gas_product_monitoring_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Product - LNG.xlsx');
    }

    public function download_gas_propane($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_product_monitoring::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orwhere('product_type', 'PROPANE')
                ->orwhere('lga', 'like', "%$txt%")->orwhere('zone', 'like', "%$txt%")
                ->orwhere('capacity', 'like', "%$txt%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%$txt%");})
                ->orwhereHas('category', function ($query) use ($txt) {
                    $query->where('category_name', 'like', "%$txt%");
                })
                // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%$txt%"); })
                ->get();
        } else {
            $data = \App\gas_product_monitoring::where('product_type', 'PROPANE')->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Products PROPANE', 'Downloaded Data');

        $view = 'gas.excel.gas_product_monitoring_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Product - PROPANE.xlsx');
    }

    public function approveGasProducts(Request $request)
    {
        $gas_prod = \App\gas_product_monitoring::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasProducts', compact('gas_prod'));
    }

    public function add_product_volume_permit(Request $request)
    {
        $import_permit_no = $request->import_permit_no;
        $year = $request->year;
        $prod_vol = \App\gas_product_vol_import_permit::where('import_permit_no', $import_permit_no)->where('year', $year)->first();
        if ($prod_vol) {
            if ($request->ajax() && $request->id == '') {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$import_permit_no.' Permit For Year '.$year.'. Please Check Existing Records.']);
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
                $add_pvp = \App\gas_product_vol_import_permit::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    'import_permit_no' => $request->import_permit_no,
                    'issued_date' => date('Y-m-d', strtotime($request->issued_date)),
                    'product_id' => $request->product_id,
                    'volume' => $request->volume,
                    'validity_period' => $request->validity_period,
                    'country_id' => $request->country_id,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                $product_id = $request->product_id;
                $country_id = $request->country_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'gas_product_vol_import_permit', 'column_1');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'gas_product_vol_import_permit', 'column_2');
                    }
                    if (! empty($country_id)) {
                        $this->updateTempRecord($id, 'gas_product_vol_import_permit', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\gas_product_vol_import_permit::class, $id, 'gas_product_vol_import_permit');
                }

                //send mail
                //self::send_all_mail(" GAS - Products Volumes (Import Permits) ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Products Volumes (Import Permits)', 'Update Record');
                } else {
                    self::log_audit_trail('Products Volumes (Import Permits)', 'Add Record');
                }

                if ($request->ajax()) {
                    $pvp_details = ['year'=>$add_pvp->year, 'month'=>$add_pvp->month, 'company'=>$add_pvp->company->company_name, 'import_permit_no'=>$add_pvp->import_permit_no, 'issued_date'=>$add_pvp->issued_date, 'product'=>$add_pvp->product->product_name, 'volume'=>$add_pvp->volume, 'validity_period'=>$add_pvp->validity_period, 'country'=>$add_pvp->country->country_name, 'id'=>$add_pvp->id];

                    return response()->json(['status'=>'ok', 'message'=>$pvp_details, 'info'=>'New Gas Products Volumes (Import Permits) Added Successfully.']);
                } else {
                    return redirect()->route('gas.index')->with('info', 'Gas Products Volumes (Import Permits) Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editProductVolumePermit(Request $request)
    {
        $GAS_IMP = \App\gas_product_vol_import_permit::where('id', $request->id)->first();

        return view('gas.modals.editProductVolumePermit', compact('GAS_IMP'));
    }

    public function upload_product_volume_permit(Request $request)
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
                    $created_by = \Auth::user()->name;

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['G']}%", $row['G']);
                    $results_3 = $this->resolveMasterData('\App\country', 'country_name', "%{$row['I']}%", $row['I']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['G'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['I'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'gas_product_vol_import_permit',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $country_id = 0;
                        } else {
                            $country_id = $results_3['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $product_id = $results_2['name'];
                        $country_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_product_vol_import_permit::updateOrCreate(['year'=> $row['A'],
                        'import_permit_no'=> $row['C'], ],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'import_permit_no' => $row['D'],
                            'issued_date' => date('Y-m-d', strtotime($row['E'])),
                            'validity_period' => $row['F'],
                            'product_id' => $product_id,
                            'volume' => $row['H'],
                            'country_id' => $country_id,
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\gas_product_vol_import_permit::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $product_id = '';
                    $country_id = '';
                }
            }

            //send mail
            self::send_all_mail(' GAS - Products Volumes (Import Permits) ');
            //Audit Logging
            self::log_audit_trail('Products Volumes (Import Permits)', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Gas Product Volumes (Import Permit Issued) Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewProductVolumePermit(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Import Permit', 'Viewed Data');
        $GAS_IMP = \App\gas_product_vol_import_permit::where('id', $request->id)->first();

        return view('gas.view.viewProductVolumePermit', compact('GAS_IMP'));
    }

    public function download_product_volume_permit($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_product_vol_import_permit::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->where('import_permit_no', 'like', "%$txt%")->orwhere('issued_date', 'like', "%$txt%")
                ->where('volume', 'like', "%$txt%")->orwhere('validity_period', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('country', function ($query) use ($txt) {
                    $query->where('country_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\gas_product_vol_import_permit::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Import Permit', 'Downloaded Data');

        $view = 'gas.excel.import_permit_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Import Permits.xlsx');
    }

    public function approveVolumePermit(Request $request)
    {
        $volume_permits = \App\gas_product_vol_import_permit::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveVolumePermit', compact('volume_permits'));
    }

    public function add_refinery_production(Request $request)
    {
        $import_permit_no = $request->import_permit_no;
        $year = $request->year;
        $ref_prod = \App\gas_refinery_production_volumes::where('import_permit_no', $import_permit_no)->where('year', $year)->first();
        if ($ref_prod) {
            if ($request->ajax() && $request->id == '') {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$import_permit_no.' Permit Number For Year '.$year.'. Please Check Existing Records.']);
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
                $add_ref_prod = \App\gas_refinery_production_volumes::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    'vessel_name' => $request->vessel_name,
                    'import_permit_no' => $request->import_permit_no,
                    'state_id' => $request->state_id,
                    'zone' => $request->zone,
                    'product_id' => $request->product_id,
                    'volume' => $request->volume,
                    'date_discharged' => date('Y-m-d', strtotime($request->date_discharged)),
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                $state_id = $request->state_id;
                $product_id = $request->product_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'gas_refinery_production_volumes', 'column_1');
                    }
                    if (! empty($state_id)) {
                        $this->updateTempRecord($id, 'gas_refinery_production_volumes', 'column_2');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'gas_refinery_production_volumes', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\gas_refinery_production_volumes::class, $id, 'gas_refinery_production_volumes');
                }

                //send mail
                //self::send_all_mail(" GAS - Gas Products Importation by Vessels ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Gas Products Importation by Vessels', 'Update Record');
                } else {
                    self::log_audit_trail('Gas Products Importation by Vessels', 'Add Record');
                }

                if ($request->ajax()) {
                    $ref_prod_details = ['year'=>$add_ref_prod->year, 'month'=>$add_ref_prod->month, 'company'=>$add_ref_prod->company->company_name, 'vessel_name'=>$add_ref_prod->vessel_name, 'import_permit_no'=>$add_ref_prod->import_permit_no, 'state'=>$add_ref_prod->state->state_name, 'zone'=>$add_ref_prod->zone, 'product'=>$add_ref_prod->product->product_name, 'volume'=>$add_ref_prod->volume, 'date_discharged'=>$add_ref_prod->date_discharged, 'id'=>$add_ref_prod->id];

                    return response()->json(['status'=>'ok', 'message'=>$ref_prod_details, 'info'=>'New Gas Products Importation by Vessels Added Successfully.']);
                } else {
                    return redirect()->route('gas.index')->with('info', 'Gas Products Importation by Vessels Updated Successfully');
                }
            } catch (\Exception $e) {
                return  response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
            }
        }
    }

    public function editRefineryProduction(Request $request)
    {
        $GAS_ACT = \App\gas_refinery_production_volumes::where('id', $request->id)->first();

        return view('gas.modals.editRefineryProduction', compact('GAS_ACT'));
    }

    public function viewRefineryProduction(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Actual Import', 'Viewed Data');
        $GAS_ACT = \App\gas_refinery_production_volumes::where('id', $request->id)->first();

        return view('gas.view.viewRefineryProduction', compact('GAS_ACT'));
    }

    public function upload_refinery_production(Request $request)
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

                        //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['F']}%", $row['F']);
                    $results_3 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['H']}%", $row['H']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['F'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['H'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'gas_refinery_production_volumes',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_3['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $state_id = $results_2['name'];
                        $product_id = $results_3['name'];
                    }

                    if ($row['J'] != null) {
                        $date_discharged = date('Y-m-d', strtotime($row['J']));
                    } else {
                        $date_discharged = null;
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_refinery_production_volumes::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'vessel_name' => $row['D'],
                            'import_permit_no' => $row['E'],
                            'state_id' => $state_id,
                            'zone' => $row['G'],
                            'product_id' => $product_id,
                            'volume' => $row['I'],
                            'date_discharged' => $date_discharged,
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\gas_product_vol_import_permit::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $state_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' GAS - Gas Products Importation by Vessels ');
            //Audit Logging
            self::log_audit_trail('Gas Products Importation by Vessels ', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Gas Actual Importation by Vessels Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_refinery_production($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_refinery_production_volumes::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->where('import_permit_no', 'like', "%$txt%")->orwhere('vessel_name', 'like', "%$txt%")
                ->where('volume', 'like', "%$txt%")->orwhere('date_discharged', 'like', "%$txt%")
                ->orwhere('zone', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\gas_refinery_production_volumes::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Actual Import', 'Downloaded Data');

        $view = 'gas.excel.refinery_production_vol_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Actual Imports.xlsx');
    }

    public function approveRefineryProduction(Request $request)
    {
        $gas_actual = \App\gas_refinery_production_volumes::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveRefineryProduction', compact('gas_actual'));
    }

    public function add_gas_actual_production(Request $request)
    {
        $import_permit_no = $request->import_permit_no;
        $year = $request->year;
        $ref_prod = \App\gas_actual_production::where('import_permit_no', $import_permit_no)->where('year', $year)->first();
        if ($ref_prod) {
            if ($request->ajax() && $request->id == '') {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$import_permit_no.' Permit Number For Year '.$year.'. Please Check Existing Records.']);
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
                $add_ref_prod = \App\gas_actual_production::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    'vessel_name' => $request->vessel_name,
                    'import_permit_no' => $request->import_permit_no,
                    'state_id' => $request->state_id,
                    'zone' => $request->zone,
                    'product_id' => $request->product_id,
                    'volume' => $request->volume,
                    'date_discharged' => date('Y-m-d', strtotime($request->date_discharged)),
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                $state_id = $request->state_id;
                $product_id = $request->product_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'gas_actual_production', 'column_1');
                    }
                    if (! empty($state_id)) {
                        $this->updateTempRecord($id, 'gas_actual_production', 'column_2');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'gas_actual_production', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\gas_actual_production::class, $id, 'gas_actual_production');
                }

                //send mail
                //self::send_all_mail(" GAS - Gas Actual Production ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Gas Actual Production', 'Update Record');
                } else {
                    self::log_audit_trail('Gas Actual Production', 'Add Record');
                }

                if ($request->ajax()) {
                    $ref_prod_details = ['year'=>$add_ref_prod->year, 'month'=>$add_ref_prod->month, 'company'=>$add_ref_prod->company->company_name, 'vessel_name'=>$add_ref_prod->vessel_name, 'import_permit_no'=>$add_ref_prod->import_permit_no, 'state'=>$add_ref_prod->state->state_name, 'zone'=>$add_ref_prod->zone, 'product'=>$add_ref_prod->product->product_name, 'volume'=>$add_ref_prod->volume, 'date_discharged'=>$add_ref_prod->date_discharged, 'id'=>$add_ref_prod->id];

                    return response()->json(['status'=>'ok', 'message'=>$ref_prod_details, 'info'=>'New Gas Actual Production Added Successfully.']);
                } else {
                    return redirect()->route('gas.index')->with('info', 'Gas Actual Production Updated Successfully');
                }
            } catch (\Exception $e) {
                return  response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
            }
        }
    }

    public function editGasActualProduction(Request $request)
    {
        $GAS_ACT = \App\gas_actual_production::where('id', $request->id)->first();

        return view('gas.modals.editGasActualProduction', compact('GAS_ACT'));
    }

    public function viewGasActualProduction(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Actual Import', 'Viewed Data');
        $GAS_ACT = \App\gas_actual_production::where('id', $request->id)->first();

        return view('gas.view.viewGasActualProduction', compact('GAS_ACT'));
    }

    public function upload_gas_actual_production(Request $request)
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

                        //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['F']}%", $row['F']);
                    $results_3 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['H']}%", $row['H']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['F'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['H'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'gas_actual_production',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_3['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $state_id = $results_2['name'];
                        $product_id = $results_3['name'];
                    }

                    if ($row['J'] != null) {
                        $date_discharged = date('Y-m-d', strtotime($row['J']));
                    } else {
                        $date_discharged = null;
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_actual_production::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'vessel_name' => $row['D'],
                            'import_permit_no' => $row['E'],
                            'state_id' => $state_id,
                            'zone' => $row['G'],
                            'product_id' => $product_id,
                            'volume' => $row['I'],
                            'date_discharged' => $date_discharged,
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\gas_product_vol_import_permit::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $state_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' GAS - Gas Actual Production ');
            //Audit Logging
            self::log_audit_trail('Gas Actual Production ', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Gas Actual Importation Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_gas_actual_production($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_actual_production::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->where('import_permit_no', 'like', "%$txt%")->orwhere('vessel_name', 'like', "%$txt%")
                ->where('volume', 'like', "%$txt%")->orwhere('date_discharged', 'like', "%$txt%")
                ->orwhere('zone', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\gas_actual_production::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Actual Import', 'Downloaded Data');

        $view = 'gas.excel.gas_actual_production_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Actual Productions.xlsx');
    }

    public function approveGasActualProduction(Request $request)
    {
        $gas_actual = \App\gas_actual_production::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasActualProduction', compact('gas_actual'));
    }

    public function add_gas_export_volume_vessel(Request $request)
    {
        try {  //return $request->all();
            //INSERTING NEW
            $add_gas_exp = \App\gas_export_volume_vessel::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'equity_holder_id' => $request->equity_holder_id,
                'stream_id' => $request->stream_id,
                'product_id' => $request->product_id,
                'no_of_vessel' => $request->no_of_vessel,
                'volume' => $request->volume,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            // $equity_holder_id = $request->equity_holder_id;
            $stream_id = $request->stream_id;
            $product_id = $request->product_id;
            if (! empty($id)) {
                // if(!empty($equity_holder_id)){ $this->updateTempRecord($id, 'gas_export_volume_vessel', 'column_1'); }
                if (! empty($stream_id)) {
                    $this->updateTempRecord($id, 'gas_export_volume_vessel', 'column_2');
                }
                if (! empty($product_id)) {
                    $this->updateTempRecord($id, 'gas_export_volume_vessel', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\gas_export_volume_vessel::class, $id, 'gas_export_volume_vessel');
            }

            //send mail
            //self::send_all_mail(" GAS - Export By Volume & Vessel ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Export By Volume & Vessel', 'Update Record');
            } else {
                self::log_audit_trail('Export By Volume & Vessel', 'Add Record');
            }

            if ($request->ajax()) {
                $gas_exp_details = ['year'=>$add_gas_exp->year, 'month'=>$add_gas_exp->month, 'equity'=>$add_gas_exp->equity_holder_id, 'stream'=>$add_gas_exp->stream->stream_name, 'product'=>$add_gas_exp->product->product_name, 'no_of_vessel'=>$add_gas_exp->no_of_vessel, 'volume'=>$add_gas_exp->volume, 'id'=>$add_gas_exp->id];

                return response()->json(['status'=>'ok', 'message'=>$gas_exp_details, 'info'=>'New Export By Volume & Vessel Added Successfully.']);
            } else {
                return redirect()->route('gas.index')->with('info', 'Export By Volume & Vessel Updated Successfully');
            }
        } catch (\Exception $e) {
            return  response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function editGasExportVolumeVessel(Request $request)
    {
        $GAS_EXP = \App\gas_export_volume_vessel::where('id', $request->id)->first();

        return view('gas.modals.editGasExportVolumeVessel', compact('GAS_EXP'));
    }

    public function viewGasExportVolumeVessel(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Export Volume Vessel', 'Viewed Data');
        $GAS_EXP = \App\gas_export_volume_vessel::where('id', $request->id)->first();

        return view('gas.view.viewGasExportVolumeVessel', compact('GAS_EXP'));
    }

    public function upload_gas_export_volume_vessel(Request $request)
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

                        //script to check if name exist in master record
                    // $results_1 = $this->resolveMasterData('\App\company', 'company_name', "%{$row['C']}%", $row['C']);
                    $results_1 = $this->resolveMasterData(\App\Stream::class, 'stream_name', "%{$row['D']}%", $row['D']);
                    $results_2 = $this->resolveMasterData(\App\down_product::class, 'product_name', "%{$row['E']}%", $row['E']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        // if($results_1['stage_id'] == 3){ $column_1 = $row['C']; }else{ $column_1 = ''; }
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['D'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['E'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'gas_export_volume_vessel',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        // if($results_1['stage_id'] == 3){ $equity_holder_id = 0; }else{ $equity_holder_id = $results_1['name']; }
                        if ($results_1['stage_id'] == 3) {
                            $stream_id = 0;
                        } else {
                            $stream_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_2['name'];
                        }
                    } else {
                        $stream_id = $results_1['name'];
                        $product_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_export_volume_vessel::updateOrCreate(['id'=> $request->id,
                        // 'equity_holder_id'=> $this->resolveModelId('\App\company', 'company_name', $row['C']),
                        // 'stream_id'=> $this->resolveModelId('\App\Stream', 'stream_name', $row['D']),
                        // 'product_id'=> $this->resolveModelId('\App\down_product', 'product_name', $row['E'])
                    ],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'equity_holder_id' => $row['C'],
                            'stream_id' => $stream_id,
                            'product_id' => $product_id,
                            'no_of_vessel' => $row['F'],
                            'volume' => $row['G'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\gas_export_volume_vessel::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $stream_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' GAS - Gas Export Volume ');
            //Audit Logging
            self::log_audit_trail('Gas Export Volume ', 'Data Bulk Upload');

            return redirect()->route('gas.index')->with('info', 'Gas Refinery Production Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_gas_export_volume_vessel($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_export_volume_vessel::where('year', 'like', '%$txt%')->orwhere('month', 'like', '%$txt%')
                ->orwhere('no_of_vessel', 'like', "%$txt%")->orwhere('volume', 'like', "%$txt%")
                ->orwhereHas('equity', function ($query) use ($txt) {
                    $query->where('company_name', 'like', '%$txt%');
                })
                ->orwhereHas('stream', function ($query) use ($txt) {
                    $query->where('stream_name', 'like', '%$txt%');
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', '%$txt%');
                })
                ->get();
        } else {
            $data = \App\gas_export_volume_vessel::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Export Volume Vessel', 'Downloaded Data');

        $view = 'gas.excel.gas_export_volume_vessel_excel';

        return \Excel::download(new \App\Imports\gas\ImportGasData($data, $view), 'Gas Export Volume Vessels.xlsx');
    }

    public function approveGasExportVolumeVessel(Request $request)
    {
        $gas_export = \App\gas_export_volume_vessel::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('gas.approve.approveGasExportVolumeVessel', compact('gas_export'));
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
            self::log_audit_trail('Gas Data', 'Data Deleted');
        } catch (\Exception $e) {
            // return response()->json(['status'=>'error', 'message'=>'Sorry, An Error Occurred .' .$e->getMessage()]);
            return  redirect()->route('gas.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }
}
