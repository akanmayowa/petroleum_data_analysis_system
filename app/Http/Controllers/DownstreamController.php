<?php

namespace App\Http\Controllers;

use App\Notifications\emailNOGIARManager;
use App\Traits\ExcelExport;
use App\Traits\Micellenous;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DownstreamController extends Controller
{
    use ExcelExport;

    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //function for sending email
    public function send_all_mail($upload_name)
    {
        //getting the number of DWP USERS
        $users = \App\EmailList::where('division', 'DOWNSTREAM')->get();
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

    //function for sending approved email
    public function notifyCustodianByEmail($section, $model_name)
    {
        //getting the number of DWP USERS
        $total = $model_name::all();
        $count = $total->count();
        $approved = $total->where('stage_id', 1)->count();
        $pending = $total->where('stage_id', 0)->count();
        $custodians = $model_name::distinct()->get(['created_by']);
        foreach ($custodians as $custodian) {
            $user = \App\User::where('name', $custodian->created_by)->first();
            $sender = $user->email;
            $name = $user->name;
            $message = ', A Batch of Pending '.$section.' Data has been Approve by '.\Auth::user()->name.
            '. '.$approved.' Records have been approved so far out of '.$count.'. '.$pending.' Records are still pending approval'.
            '. Please review all pending data for corrections.';

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => \Auth::user()->id,
            'section' => 'Downstream',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $dest_stream = $stream_ave = $streams = $streams_prod = $streams_export = $stream_ddl = \App\Stream::orderBy('stream_name', 'asc')->get();

        $locations = $location = $refinery_rvol = $refinery_plant = $refinery_ddl = \App\down_plant_location::orderBy('plant_location_name', 'asc')->get();
        $ownerships = $ownership = $ownership_dep = $ownership_jet = \App\down_ownership::orderBy('ownership_name', 'asc')->get();
        $configuration = \App\down_configuration::get();
        $plant_type = \App\down_plant_type::get();
        $feedstocks = $feedstock = \App\down_feedstock::get();
        $products = $product = \App\down_product::orderBy('product_name', 'asc')->get();

        $ref_d_cap = \App\down_refinary_design_capacity::where('id', '1')->first();

        $ref_cap_util_year = \App\down_refinary_capacity_utilization::get();

        $product_dep = $product_jet = $product_term = $ref_product = $iv_products = $product_rpro = $product_vess = $product_rvol = $product_ddl = \App\down_import_product::orderBy('product_name', 'asc')->get();
        $product_cap = \App\down_import_product::where('product_name', 'PMS')->orwhere('product_name', 'AGO')->orwhere('product_name', 'DPK')->orderBy('product_name', 'asc')->get();

        $market_segs = $market_seg = $segment_cap = $market_segment = $market_seg_cap = \App\down_market_segment::orderBy('market_segment_name', 'asc')->get();
        $m_category = $market_segment_cap = $range_mkt_seg = $market_seg_cap->where('id', '>', 1)->where('id', '<', 6);
        $field_office = \App\down_field_office::orderBy('field_office_name', 'asc')->get();

        $states = $states_cap = $state_ddl = $states_ddl = $state_plant_ddl = $state_dep_ddl = $state_jet_ddl = $state_term_ddl = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        $company_mak = $company_dest = $company_ddl = $company_reconcile = $company_rpro = $ownership_term = \App\company::orderBy('company_name', 'asc')->get();
        $location_mak = \App\down_storage_location::get();
        $countries = $country_ddl = \App\Country::orderBy('country_name', 'asc')->get();

        $continents = $continent_ddl = \App\Region::orderBy('name', 'asc')->get();
        $facility_types = \App\facility_type::orderBy('facility_type_name', 'asc')->where('type_id', '2')->get();
        $contract_ddl = \App\contract::orderBy('contract_name', 'asc')->get();

        //$streams_prod = DB::table('stream as s')->leftJoin('down_terminal_stream_prod as dt','s.id','=','dt.stream_id')->whereNull('dt.stream_id')->get();
        //$streams_prod = DB::table('down_terminal_stream_prod as dt')->rightJoin('stream as s','s.id','=','dt.stream_id')->whereNull('dt.stream_id')->get();
        //$streams_export = DB::table('down_monthly_summary_crude_export as dt')->rightJoin('stream as s','s.id','=','dt.stream_id')->whereNull('dt.stream_id')->get()

        return view('downstream.index', compact('streams', 'stream_ddl', 'streams_prod', 'streams_export', 'location', 'ownership', 'configuration', 'plant_type', 'feedstock', 'product', 'ref_d_cap', 'locations', 'ownerships', 'feedstocks', 'products', 'ref_product', 'ref_cap_util_year', 'iv_products', 'market_seg', 'market_segs', 'range_mkt_seg', 'product_rpro', 'product_vess', 'refinery_rvol', 'product_rvol', 'states', 'states_cap', 'state_ddl', 'states_ddl', 'state_plant_ddl', 'segment_cap', 'product_cap', 'm_category', 'market_segment', 'market_segment_cap', 'company_mak', 'location_mak', 'refinery_plant', 'stream_ave', 'countries', 'continents', 'refinery_ddl', 'state_dep_ddl', 'state_jet_ddl', 'state_term_ddl', 'ownership_dep', 'ownership_jet', 'ownership_term', 'product_dep', 'product_jet', 'product_term', 'dest_stream', 'product_ddl', 'company_dest', 'facility_types', 'continent_ddl', 'company_ddl', 'country_ddl', 'company_reconcile', 'contract_ddl', 'company_rpro', 'field_office'));
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
        //      return response()->json(['status'=>'ok', 'message'=>'New (OPL) Oil Prospective Lease Added Successfully. ']);
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
                return redirect()->route('downstream.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
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
                return redirect()->route('downstream.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
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
        switch ($request->type) {
            case 'add_terminal_stream_prod':
                return $this->add_terminal_stream_prod($request);
            break;

            case 'upload_terminal_stream_prod':
                return $this->upload_terminal_stream_prod($request);
            break;

            case 'add_monthly_summary_crude_export':
                return $this->add_monthly_summary_crude_export($request);
            break;

            case 'upload_monthly_summary_crude_export':
                return $this->upload_monthly_summary_crude_export($request);
            break;

            case 'add_crude_export_destination':
                return $this->add_crude_export_destination($request);
            break;

            case 'upload_crude_export_destination':
                return $this->upload_crude_export_destination($request);
            break;

            case 'add_crude_export_company':
                return $this->add_crude_export_company($request);
            break;

            case 'upload_crude_export_company':
                return $this->upload_crude_export_company($request);
            break;

            case 'add_petrochemical_plant':
                return $this->add_petrochemical_plant($request);
            break;

            case 'upload_petrochemical_plant':
                return $this->upload_petrochemical_plant($request);
            break;

            case 'add_refinary_capacity':
                return $this->add_refinary_capacity($request);
            break;

            case 'upload_refinary_capacity':
                return $this->upload_refinary_capacity($request);
            break;

            case 'add_refinary_performance':
                return $this->add_refinary_performance($request);
            break;

            case 'upload_refinary_performance':
                return $this->upload_refinary_performance($request);
            break;

            case 'add_depot':
                return $this->add_depot($request);
            break;

            case 'upload_depot':
                return $this->upload_depot($request);
            break;

            case 'add_jetty':
                return $this->add_jetty($request);
            break;

            case 'upload_jetty':
                return $this->upload_jetty($request);
            break;

            case 'add_terminal':
                return $this->add_terminal($request);
            break;

            case 'upload_terminal':
                return $this->upload_terminal($request);
            break;

            case 'add_product_volume_permit':
                return $this->add_product_volume_permit($request);
            break;

            case 'upload_product_volume_permit':
                return $this->upload_product_volume_permit($request);
            break;

            case 'add_product_volume_permit_vessel':
                return $this->add_product_volume_permit_vessel($request);
            break;

            case 'upload_product_volume_permit_vessel':
                return $this->upload_product_volume_permit_vessel($request);
            break;

            case 'add_refinery_production':
                return $this->add_refinery_production($request);
            break;

            case 'upload_refinery_production':
                return $this->upload_refinery_production($request);
            break;

            case 'add_refinery_production_volume':
                return $this->add_refinery_production_volume($request);
            break;

            case 'upload_refinery_production_volume':
                return $this->upload_refinery_production_volume($request);
            break;

            case 'add_prod_ave_price_range':
                return $this->add_prod_ave_price_range($request);
            break;

            case 'upload_prod_ave_price_range':
                return $this->upload_prod_ave_price_range($request);
            break;

            case 'add_retail_outlet':
                return $this->add_retail_outlet($request);
            break;

            case 'upload_retail_outlet':
                return $this->upload_retail_outlet($request);
            break;

            case 'add_retail_outlet_capacity':
                return $this->add_retail_outlet_capacity($request);
            break;

            case 'upload_retail_outlet_capacity':
                return $this->upload_retail_outlet_capacity($request);
            break;

            case 'add_license_marketer_storage':
                return $this->add_license_marketer_storage($request);
            break;

            case 'upload_license_marketer_storage':
                return $this->upload_license_marketer_storage($request);
            break;

            case 'add_import_product':
                return $this->add_import_product($request);
            break;

            case 'upload_import_product':
                return $this->upload_import_product($request);
            break;

            case 'add_ave_price_crude':
                return $this->addAvePriceCrude($request);
            break;

            case 'upload_ave_price_crude':
                return $this->uploadAveCrudePrice($request);
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
            case 'modals_editStreamProd':
                // code...
                return $this->editStreamProd($request);
            break;

            case 'view_viewStreamProd':
                // code...
                return $this->viewStreamProd($request);
            break;

            case 'approve_approveReconciled':
                // code...
                return $this->approveReconciled($request);
            break;

            case 'modals_editSummaryExport':
                // code...
                return $this->editSummaryExport($request);
            break;

            case 'view_viewSummaryExport':
                // code...
                return $this->viewSummaryExport($request);
            break;

            case 'approve_approveExport':
                // code...
                return $this->approveExport($request);
            break;

            case 'modals_editExportByDestination':
                // code...
                return $this->editExportByDestination($request);
            break;

            case 'view_viewExportByDestination':
                // code...
                return $this->viewExportByDestination($request);
            break;

            case 'approve_approveDestination':
                // code...
                return $this->approveDestination($request);
            break;

            case 'modals_editExportByCompany':
                // code...
                return $this->editExportByCompany($request);
            break;

            case 'view_viewExportByCompany':
                // code...
                return $this->viewExportByCompany($request);
            break;

            case 'approve_approveCompany':
                // code...
                return $this->approveCompany($request);
            break;

            case 'modals_editPetrolchemicalPlant':
                // code...
                return $this->editPetrolchemicalPlant($request);
            break;

            case 'view_viewPetrolchemicalPlant':
                // code...
                return $this->viewPetrolchemicalPlant($request);
            break;

            case 'approve_approvePetPlant':
                // code...
                return $this->approvePetPlant($request);
            break;

            case 'modals_editRefinaryCapacity':
                // code...
                return $this->editRefinaryCapacity($request);
            break;

            case 'view_viewRefinaryCapacity':
                // code...
                return $this->viewRefinaryCapacity($request);
            break;

            case 'approve_approveRefCapacity':
                // code...
                return $this->approveRefCapacity($request);
            break;

            case 'modals_editRefinaryPerformance':
                // code...
                return $this->editRefinaryPerformance($request);
            break;

            case 'view_viewRefinaryPerformance':
                // code...
                return $this->viewRefinaryPerformance($request);
            break;

            case 'approve_approveRefPerformance':
                // code...
                return $this->approveRefPerformance($request);
            break;

            case 'modals_editDepot':
                // code...
                return $this->editDepot($request);
            break;

            case 'view_viewDepot':
                // code...
                return $this->viewDepot($request);
            break;

            case 'approve_approveDepot':
                // code...
                return $this->approveDepot($request);
            break;

            case 'modals_editJetty':
                // code...
                return $this->editJetty($request);
            break;

            case 'view_viewJetty':
                // code...
                return $this->viewJetty($request);
            break;

            case 'approve_approveJetty':
                // code...
                return $this->approveJetty($request);
            break;

            case 'modals_editTerminal':
                // code...
                return $this->editTerminal($request);
            break;

            case 'view_viewTerminal':
                // code...
                return $this->viewTerminal($request);
            break;

            case 'approve_approveTerminal':
                // code...
                return $this->approveTerminal($request);
            break;

            case 'modals_editProductVolumePermit':
                // code...
                return $this->editProductVolumePermit($request);
            break;

            case 'view_viewProductVolumePermit':
                // code...
                return $this->viewProductVolumePermit($request);
            break;

            case 'approve_approvePermit':
                // code...
                return $this->approvePermit($request);
            break;

            case 'modals_editVessel':
                // code...
                return $this->editVessel($request);
            break;

            case 'view_viewProductVolumePermitVessel':
                // code...
                return $this->viewProductVolumePermitVessel($request);
            break;

            case 'approve_approvePermitVessel':
                // code...
                return $this->approvePermitVessel($request);
            break;

            case 'modals_editRefineryProduction':
                // code...
                return $this->editRefineryProduction($request);
            break;

            case 'view_viewRefineryProduction':
                // code...
                return $this->viewRefineryProduction($request);
            break;

            case 'approve_approveRefProd':
                // code...
                return $this->approveRefProd($request);
            break;

            case 'modals_editRefineryVolume':
                // code...
                return $this->editRefineryVolume($request);
            break;

            case 'view_viewRefineryVolume':
                // code...
                return $this->viewRefineryVolume($request);
            break;

            case 'approve_approveRefVolume':
                // code...
                return $this->approve_ref_volume($request);
            break;

            case 'modals_editAvePriceRange':
                // code...
                return $this->editAvePriceRange($request);
            break;

            case 'view_viewAvePriceRange':
                // code...
                return $this->viewAvePriceRange($request);
            break;

            case 'approve_approvePriceRange':
                // code...
                return $this->approvePriceRange($request);
            break;

            case 'modals_editRetailOutlet':
                // code...
                return $this->editRetailOutlet($request);
            break;

            case 'view_viewRetailOutlet':
                // code...
                return $this->viewRetailOutlet($request);
            break;

            case 'approve_approveOutlet':
                // code...
                return $this->approveOutlet($request);
            break;

            case 'modals_editOutletCapacity':
                // code...
                return $this->editOutletCapacity($request);
            break;

            case 'view_viewOutletCapacity':
                // code...
                return $this->viewOutletCapacity($request);
            break;

            case 'approve_approveCapacity':
                // code...
                return $this->approveCapacity($request);
            break;

            case 'modals_editLicenseMarketer':
                // code...
                return $this->editLicenseMarketer($request);
            break;

            case 'view_viewLicenseMarketer':
                // code...
                return $this->viewLicenseMarketer($request);
            break;

            case 'approve_approveMarketer':
                // code...
                return $this->approveMarketer($request);
            break;

            case 'modals_editImportProduct':
                // code...
                return $this->editImportProduct($request);
            break;

            case 'view_viewImportProduct':
                // code...
                return $this->viewImportProduct($request);
            break;

            case 'approve_approveProduct':
                // code...
                return $this->approveProduct($request);
            break;

            case 'modals_editAveCrudePrice':
                // code...
                return $this->editAveCrudePrice($request);
            break;

            case 'view_viewAveCrudePrice':
                // code...
                return $this->viewAveCrudePrice($request);
            break;

            case 'approve_approveAvePrice':
                // code...
                return $this->approveAvePrice($request);
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

    public function add_terminal_stream_prod(Request $request)
    {

        // $stream_id = $request->stream_id;        $year = $request->year;      $type = $request->production_type_id;
        // $crude_prod = \App\down_terminal_stream_prod::where('stream_id', $stream_id)->where('year', $year)->where('production_type_id', $type)->first();
        // if($crude_prod)
        // {
        //     if($request->ajax() && $request->id == '')
        //      {   $stream = $crude_prod->stream->stream_name;
        // if($type == '1'){ $p_type ==  'Oil'; }
        // else if($type == '2'){ $p_type ==  'Condensate'; }
        // else if($type == '3'){ $p_type ==  'Gas'; }

        //         return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$stream.' Stream For Year ' .$year. '  &nbsp; &nbsp; &nbsp; Production Type ' .$type. ' Please Check Existing Records.']);

        //      }
        //      else { goto edit; }
        // }
        // else { goto edit; }
        // {
        //     edit:
        try {
            //INSERTING NEW Provisional Crude Production

            $add_crude_prod = \App\down_terminal_stream_prod::updateOrCreate(['id'=> $request->id],
                [
                    'stream_id' => $request->stream_id,
                    'company_id' => $request->company_id,
                    'contract_id' => $request->contract_id,
                    'sulphur_content' => $request->sulphur_content,
                    'year' => $request->year,
                    'production_type_id' => $request->production_type_id,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'api' => $request->api,
                    'stream_total' => $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $stream_id = $request->stream_id;
            $company_id = $request->company_id;
            $contract_id = $request->contract_id;
            $production_type_id = $request->production_type_id;
            if (! empty($id)) {
                if (! empty($stream_id)) {
                    $this->updateTempRecord($id, 'down_terminal_stream_prod', 'column_1');
                }
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'down_terminal_stream_prod', 'column_2');
                }
                if (! empty($contract_id)) {
                    $this->updateTempRecord($id, 'down_terminal_stream_prod', 'column_3');
                }
                if (! empty($production_type_id)) {
                    $this->updateTempRecord($id, 'down_terminal_stream_prod', 'column_4');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_terminal_stream_prod::class, $id, 'down_terminal_stream_prod');
            }

            //send mail
            //self::send_all_mail("DOWNSTREAM - Reconciled Crude Production ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Reconciled Crude Production', 'Update Record');
            } else {
                self::log_audit_trail('Reconciled Crude Production', 'Add Record');
            }

            if ($request->ajax()) {
                $crude_prod_details = ['stream'=>$add_crude_prod->stream->stream_name, 'company'=>$add_crude_prod->company->company_name, 'contract'=>$add_crude_prod->contract->contract_name, 'surphur'=>$add_crude_prod->sulphur_content, 'year'=>$add_crude_prod->year, 'january'=>$add_crude_prod->january, 'febuary'=>$add_crude_prod->febuary, 'march'=>$add_crude_prod->march, 'april'=>$add_crude_prod->april, 'may'=>$add_crude_prod->may, 'june'=>$add_crude_prod->june, 'july'=>$add_crude_prod->july, 'august'=>$add_crude_prod->august, 'september'=>$add_crude_prod->september, 'october'=>$add_crude_prod->october, 'november'=>$add_crude_prod->november, 'december'=>$add_crude_prod->december, 'api'=>$add_crude_prod->api, 'stream_total'=>$add_crude_prod->stream_total, 'id'=>$add_crude_prod->id];

                return response()->json(['status'=>'ok', 'message'=>$crude_prod_details, 'info'=>'New Reconciled Crude Production Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Reconciled Crude Production Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        // }
    }

    public function editStreamProd(Request $request)
    {
        $STRE_ = \App\down_terminal_stream_prod::where('id', $request->id)->first();

        return view('downstream.modals.editStreamProd', compact('STRE_'));
    }

    public function upload_terminal_stream_prod(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\Stream::class, 'stream_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['B']}%", $row['B']);
                    $results_3 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['C']}%", $row['C']);
                    $results_4 = $this->resolveMasterData(\App\down_production_type::class, 'production_type_name', "%{$row['E']}%", $row['E']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['A'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['B'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['C'];
                        } else {
                            $column_3 = '';
                        }
                        if ($results_4['stage_id'] == 3) {
                            $column_4 = $row['E'];
                        } else {
                            $column_4 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['F'], 'type' => 'down_terminal_stream_prod',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $stream_id = 0;
                        } else {
                            $stream_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $production_type_id = 0;
                        } else {
                            $production_type_id = $results_4['name'];
                        }
                    } else {
                        $stream_id = $results_1['name'];
                        $company_id = $results_2['name'];
                        $contract_id = $results_3['name'];
                        $production_type_id = $results_4['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_terminal_stream_prod::updateOrCreate(['stream_id'=> $this->resolveModelId(\App\Stream::class, 'stream_name', $row['A']),
                        'company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['B']),
                        'contract_id'=> $this->resolveModelId(\App\contract::class, 'contract_name', $row['C']),
                        'production_type_id'=> $this->resolveModelId(\App\down_production_type::class, 'production_type_name', $row['E']),
                        'year'=> $row['F'], ],
                        [
                            'stream_id' => $stream_id,
                            'company_id' => $company_id,
                            'contract_id' => $contract_id,
                            'sulphur_content' => $row['D'],
                            'production_type_id' => $production_type_id,
                            'year' => $row['F'],
                            'january' => $row['G'],
                            'febuary' => $row['H'],
                            'march' => $row['I'],
                            'april' => $row['J'],
                            'may' => $row['K'],
                            'june' => $row['L'],
                            'july' => $row['M'],
                            'august' => $row['N'],
                            'september' => $row['O'],
                            'october' => $row['P'],
                            'november' => $row['Q'],
                            'december' => $row['R'],
                            'api' => $row['S'],
                            'stream_total' => $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'] + $row['P'] + $row['Q'] + $row['R'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3) {
                        $this->updateTable(\App\down_terminal_stream_prod::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $stream_id = '';
                    $company_id = '';
                    $contract_id = '';
                    $production_type_id = '';
                }
            }

            //send mail
            self::send_all_mail('DOWNSTREAM - Reconciled Crude Production ');
            //Audit Logging
            self::log_audit_trail('Reconciled Crude Productions', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Reconciled Crude Production Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewStreamProd(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Reconciled Crude Production', 'Viewed Data');
        $STREAM = \App\down_terminal_stream_prod::where('id', $request->id)->first();

        return view('downstream.view.viewStreamProd', compact('STREAM'));
    }

    public function download_terminal_stream_prod($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_terminal_stream_prod::where('year', 'like', "%$txt%")
                ->orwhereHas('stream', function ($query) use ($txt) {
                    $query->where('stream_name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('prod_type', function ($query) use ($txt) {
                    $query->where('production_type_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_terminal_stream_prod::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Reconciled Crude Production', 'Downloaded Data');

        $view = 'downstream.excel.reconsiled_crude_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Reconciled Crude Prod.xlsx');
    }

    public function approveReconciled(Request $request)
    {
        $reconciled = \App\down_terminal_stream_prod::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveReconciled', compact('reconciled'));
    }

    public function add_monthly_summary_crude_export(Request $request)
    {
        $stream_id = $request->stream_id;
        $year = $request->year;
        $type = $request->production_type_id;
        $crude_prod = \App\down_monthly_summary_crude_export::where('stream_id', $stream_id)->where('year', $year)->where('production_type_id', $type)->first();
        if ($crude_prod) {
            if ($request->ajax() && $request->id == '') {
                $stream = $crude_prod->stream->stream_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$stream.' Stream For Year '.$year.'  &nbsp; &nbsp; &nbsp; Production Type '.$type.' Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW Monthly Summary of Crude Export
                $add_crude_exp = \App\down_monthly_summary_crude_export::updateOrCreate(['id'=> $request->id],
                [
                    'stream_id' => $request->stream_id,
                    'year' => $request->year,
                    'production_type_id' => $request->production_type_id,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'api' => $request->api,
                    'stream_total' => $request->stream_total,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $stream_id = $request->stream_id;
                $production_type_id = $request->production_type_id;
                if (! empty($id)) {
                    if (! empty($stream_id)) {
                        $this->updateTempRecord($id, 'down_monthly_summary_crude_export', 'column_1');
                    }
                    if (! empty($production_type_id)) {
                        $this->updateTempRecord($id, 'down_monthly_summary_crude_export', 'column_2');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_monthly_summary_crude_export::class, $id, 'down_monthly_summary_crude_export');
                }

                //send mail
                //self::send_all_mail("DOWNSTREAM - Monthly Summary of Crude Export ");
                //Audit Logging
                self::log_audit_trail('Monthly Summary of Crude Export', 'Data Bulk Upload');

                if ($request->ajax()) {
                    $crude_export_details = ['stream'=>$add_crude_exp->stream->stream_name, 'year'=>$add_crude_exp->year, 'january'=>$add_crude_exp->january, 'febuary'=>$add_crude_exp->febuary, 'march'=>$add_crude_exp->march, 'april'=>$add_crude_exp->april, 'may'=>$add_crude_exp->may, 'june'=>$add_crude_exp->june, 'july'=>$add_crude_exp->july, 'august'=>$add_crude_exp->august, 'september'=>$add_crude_exp->september, 'october'=>$add_crude_exp->october, 'november'=>$add_crude_exp->november, 'december'=>$add_crude_exp->december, 'api'=>$add_crude_exp->api, 'stream_total'=>$add_crude_exp->stream_total, 'id'=>$add_crude_exp->id];

                    return response()->json(['status'=>'ok', 'message'=>$crude_export_details, 'info'=>'New Monthly Summary of Crude Export Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Monthly Summary of Crude Export Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editSummaryExport(Request $request)
    {
        $CRUD_EXP_ = \App\down_monthly_summary_crude_export::where('id', $request->id)->first();

        return view('downstream.modals.editSummaryExport', compact('CRUD_EXP_'));
    }

    public function upload_monthly_summary_crude_export(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\Stream::class, 'stream_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\down_production_type::class, 'production_type_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['A'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['B'], 'type' => 'down_monthly_summary_crude_export',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $stream_id = 0;
                        } else {
                            $stream_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $production_type_id = 0;
                        } else {
                            $production_type_id = $results_2['name'];
                        }
                    } else {
                        $stream_id = $results_1['name'];
                        $production_type_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_monthly_summary_crude_export::updateOrCreate(['stream_id'=> $this->resolveModelId(\App\Stream::class, 'stream_name', $row['A']),
                        'production_type_id'=> $this->resolveModelId(\App\down_production_type::class, 'production_type_name', $row['C']),
                        'year'=> $row['B'], ],
                        [
                            'stream_id' => $stream_id,
                            'year' => $row['B'],
                            'production_type_id' => $production_type_id,
                            'january' => $row['D'],
                            'febuary' => $row['E'],
                            'march' => $row['F'],
                            'april' => $row['G'],
                            'may' => $row['H'],
                            'june' => $row['I'],
                            'july' => $row['J'],
                            'august' => $row['K'],
                            'september' => $row['L'],
                            'october' => $row['M'],
                            'november' => $row['N'],
                            'december' => $row['O'],
                            'api' => $row['P'],
                            'stream_total' => $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\down_monthly_summary_crude_export::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $stream_id = '';
                    $production_type_id = '';
                }
            }

            //send mail
            self::send_all_mail('DOWNSTREAM - Monthly Summary of Crude Export ');
            //Audit Logging
            self::log_audit_trail('Monthly Summary of Crude Export', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Monthly Summary of Crude / Condensate Export Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSummaryExport(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Crude Export', 'Viewed Data');
        $CRUD_EXPORT = \App\down_monthly_summary_crude_export::where('id', $request->id)->first();

        return view('downstream.view.viewSummaryExport', compact('CRUD_EXPORT'));
    }

    public function download_monthly_summary_crude_export($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_monthly_summary_crude_export::where('year', 'like', "%$txt%")
                ->orwhereHas('stream', function ($query) use ($txt) {
                    $query->where('stream_name', 'like', "%$txt%");
                })
                ->orwhereHas('prod_type', function ($query) use ($txt) {
                    $query->where('production_type_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_monthly_summary_crude_export::get();
        }  //dd($data);


        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Crude Export', 'Downloaded Data');

        $view = 'downstream.excel.crude_export_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Crude Export.xlsx');
    }

    public function approveExport(Request $request)
    {
        $export = \App\down_monthly_summary_crude_export::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveExport', compact('export'));
    }

    public function add_crude_export_destination(Request $request)
    {
        $year = $request->year;
        $country_id = $request->country_id;
        $stream_id = $request->stream_id;
        $dest = \App\down_crude_export_by_destination::where('year', $year)->where('country_id', $country_id)->where('stream_id', $stream_id)->first();
        if ($dest) {
            if ($request->ajax() && $request->id == '') {
                $exp_country = $dest->country->country_name;
                $stream = $dest->stream->stream_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$exp_country.' Export Destination For Year '.$year.' '.$stream.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //mapping country to region
                $country_id = $request->country_id;
                $country_region = \App\country::where('id', $country_id)->first();

                //INSERTING NEW Crude Export By Destination
                $add_exp_dest = \App\down_crude_export_by_destination::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'stream_id' => $request->stream_id,
                    'company_id' => $request->company_id,
                    'destination' => $country_region->region_id,
                    'country_id' => $country_id,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'stream_total' => $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);   //return $add_exp_dest->region->name;

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $stream_id = $request->stream_id;
                $company_id = $request->company_id;
                $country_id = $request->country_id;
                if (! empty($id)) {
                    if (! empty($stream_id)) {
                        $this->updateTempRecord($id, 'down_crude_export_by_destination', 'column_1');
                    }
                    // if(!empty($destination)){ $this->updateTempRecord($id, 'down_crude_export_by_destination', 'column_3'); }
                    if (! empty($country_id)) {
                        $this->updateTempRecord($id, 'down_crude_export_by_destination', 'column_2');
                    }
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'down_crude_export_by_destination', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_crude_export_by_destination::class, $id, 'down_crude_export_by_destination');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Crude Export By Destination ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Crude Export By Destination', 'Update Record');
                } else {
                    self::log_audit_trail('Crude Export By Destination', 'Add Record');
                }

                if ($request->ajax()) {
                    $export_dest_details = ['year'=>$add_exp_dest->year, 'stream'=>$add_exp_dest->stream->stream_name, 'destination'=>$add_exp_dest->region->name, 'country'=>'Country', 'january'=>$add_exp_dest->january, 'febuary'=>$add_exp_dest->febuary, 'march'=>$add_exp_dest->march, 'april'=>$add_exp_dest->april, 'may'=>$add_exp_dest->may, 'june'=>$add_exp_dest->june, 'july'=>$add_exp_dest->july, 'august'=>$add_exp_dest->august, 'september'=>$add_exp_dest->september, 'october'=>$add_exp_dest->october, 'november'=>$add_exp_dest->november, 'december'=>$add_exp_dest->december, 'id'=>$add_exp_dest->id];

                    return response()->json(['status'=>'ok', 'message'=>$export_dest_details, 'info'=>'New Crude Export By Destination Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Crude Export By Destination Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editExportByDestination(Request $request)
    {
        $EXP_DEST_ = \App\down_crude_export_by_destination::where('id', $request->id)->first();
        $one_con = \App\Country::where('id', $EXP_DEST_->country_id)->first();
        $all_con = \App\Country::orderBy('country_name', 'asc')->get();
        $one_cont = \App\Region::where('id', $EXP_DEST_->destination)->first();
        $all_cont = \App\Region::orderBy('name', 'asc')->get();
        $one_str = \App\Stream::where('id', $EXP_DEST_->stream_id)->first();
        $all_str = \App\Stream::orderBy('stream_name', 'asc')->get();
        $one_com = \App\company::where('id', $EXP_DEST_->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('downstream.modals.editExportByDestination', compact('EXP_DEST_', 'one_con', 'all_con', 'one_cont', 'all_cont', 'one_str', 'all_str', 'one_com', 'all_com'));
    }

    public function upload_crude_export_destination(Request $request)
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
                // $year = $row['A'];      $stream_id = $row['B'];    $destination = $row['C'];    $country_id = $row['D'];
                // $gas_supplys = \App\down_crude_export_by_destination::where('stream_id', $stream_id)->where('year', $year)->where('destination', $destination)->where('country_id', $country_id)->first();
                // if($gas_supplys)
                // {
                //     $stream = $gas_supplys->stream->stream_name;
                //     return redirect()->route('downstream')->with('error', 'Sorry, Record Already Exist For '.$stream.' Company, Year ' .$year. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else   { goto edit; }
                // {
                //     edit:

                if ($key >= 2) {
                    //mapping country to region
                    $country_id = $this->resolveModelId(\App\Country::class, 'country_name', $row['C']);
                    $country_region = \App\country::where('id', $country_id)->first();
                    if ($country_region) {
                        $region_id = $country_region->region_id;
                    } elseif ($country_region) {
                        $region_id = null;
                    }

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\Stream::class, 'stream_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\Country::class, 'country_name', "%{$row['C']}%", $row['C']);
                    $results_3 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['D']}%", $row['D']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id']) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['D'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'down_crude_export_by_destination',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $stream_id = 0;
                        } else {
                            $stream_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $country_id = 0;
                        } else {
                            $country_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_3['name'];
                        }
                    } else {
                        $stream_id = $results_1['name'];
                        $country_id = $results_2['name'];
                        $company_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_crude_export_by_destination::updateOrCreate(
                                ['year'=> $row['A'],
                                    'stream_id'=> $this->resolveModelId(\App\Stream::class, 'stream_name', $row['B']),
                                    'country_id'=> $this->resolveModelId(\App\Country::class, 'country_name', $row['C']),
                                    'company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['D']), ],
                            [
                                'year' => $row['A'],
                                'stream_id' => $stream_id,
                                'destination' => $region_id,
                                'country_id' => $country_id,
                                'company_id' => $company_id,
                                'january' => $row['E'],
                                'febuary' => $row['F'],
                                'march' => $row['G'],
                                'april' => $row['H'],
                                'may' => $row['I'],
                                'june' => $row['J'],
                                'july' => $row['K'],
                                'august' => $row['L'],
                                'september' => $row['M'],
                                'october' => $row['N'],
                                'november' => $row['O'],
                                'december' => $row['P'],
                                'stream_total' => $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'] + $row['P'],
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\down_crude_export_by_destination::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $stream_id = '';
                    $country_id = '';
                    $company_id = '';
                }
                //}
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Crude Export By Destination ');
            //Audit Logging
            self::log_audit_trail('Crude Export By Destination', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Crude Export By Destination Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewExportByDestination(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Crude Export Destination', 'Viewed Data');
        $EXPORT_DEST = \App\down_crude_export_by_destination::where('id', $request->id)->first();
        $one_con = \App\Country::where('id', $EXPORT_DEST->country_id)->first();
        $all_con = \App\Country::orderBy('country_name', 'asc')->get();
        $one_cont = \App\Region::where('id', $EXPORT_DEST->destination)->first();
        $all_cont = \App\Region::orderBy('name', 'asc')->get();
        $one_str = \App\Stream::where('id', $EXPORT_DEST->stream_id)->first();
        $all_str = \App\Stream::orderBy('stream_name', 'asc')->get();
        $one_com = \App\company::where('id', $EXPORT_DEST->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('downstream.view.viewExportByDestination', compact('EXPORT_DEST', 'one_con', 'all_con', 'one_cont', 'all_cont', 'one_str', 'all_str', 'one_com'));
    }

    public function download_crude_export_destination($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_crude_export_by_destination::where('year', 'like', "%$txt%")
                ->orwhereHas('stream', function ($query) use ($txt) {
                    $query->where('stream_name', 'like', "%$txt%");
                })
                ->orwhereHas('country', function ($query) use ($txt) {
                    $query->where('country_name', 'like', "%$txt%");
                })
                ->orwhereHas('region', function ($query) use ($txt) {
                    $query->where('name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_crude_export_by_destination::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Crude Export Destination', 'Downloaded Data');

        $view = 'downstream.excel.crude_export_destination_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Crude Export Destination.xlsx');
    }

    public function approveDestination(Request $request)
    {
        $destination = \App\down_crude_export_by_destination::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveDestination', compact('destination'));
    }

    public function add_crude_export_company(Request $request)
    {
        $destination = $request->destination;
        $year = $request->year;
        $country_id = $request->country_id;
        $company_id = $request->company_id;
        $dest = \App\down_crude_export_by_company::where('year', $year)->where('country_id', $country_id)->where('company_id', $company_id)->where('destination', $destination)->first();
        if ($dest) {
            if ($request->ajax() && $request->id == '') {
                $exp_dest = $dest->region->name;
                $exp_country = $dest->country->country_name;
                $company = $dest->company->company_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$exp_dest.' '.$exp_country.' Export Destination For Year '.$year.' '.$company.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:

                //INSERTING NEW Crude Export By Company
                $add_exp_dest = \App\down_crude_export_by_company::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'company_id' => $request->company_id,
                    'destination' => $request->destination,
                    'country_id' => $request->country_id,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                $destination = $request->destination;
                $country_id = $request->country_id;
                if (! empty($id)) {
                    if (! empty($destination)) {
                        $this->updateTempRecord($id, 'down_crude_export_by_company', 'column_1');
                    }
                    if (! empty($country_id)) {
                        $this->updateTempRecord($id, 'down_crude_export_by_company', 'column_2');
                    }
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'down_crude_export_by_company', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_crude_export_by_company::class, $id, 'down_crude_export_by_company');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Crude Export By Company, Destination ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Crude Export By Company', 'Update Record');
                } else {
                    self::log_audit_trail('Crude Export By Company', 'Add Record');
                }

                if ($request->ajax()) {
                    $export_dest_details = ['year'=>$add_exp_dest->year, 'company'=>$add_exp_dest->company->company_name, 'january'=>$add_exp_dest->january, 'febuary'=>$add_exp_dest->febuary, 'march'=>$add_exp_dest->march, 'april'=>$add_exp_dest->april, 'may'=>$add_exp_dest->may, 'june'=>$add_exp_dest->june, 'july'=>$add_exp_dest->july, 'august'=>$add_exp_dest->august, 'september'=>$add_exp_dest->september, 'october'=>$add_exp_dest->october, 'november'=>$add_exp_dest->november, 'december'=>$add_exp_dest->december, 'destination'=>$add_exp_dest->region->name, 'country'=>$add_exp_dest->country->country_name, 'created_by'=>$add_exp_dest->created_by, 'id'=>$add_exp_dest->id];

                    return response()->json(['status'=>'ok', 'message'=>$export_dest_details, 'info'=>'New Crude Export By Destination/Company Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Crude Export By Destination/Company Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editExportByCompany(Request $request)
    {
        $EXP_DEST_ = \App\down_crude_export_by_company::where('id', $request->id)->first();
        $one_con = \App\Country::where('id', $EXP_DEST_->country_id)->first();
        $all_con = \App\Country::orderBy('country_name', 'asc')->get();
        $one_cont = \App\Region::where('id', $EXP_DEST_->destination)->first();
        $all_cont = \App\Region::orderBy('name', 'asc')->get();
        $one_com = \App\company::where('id', $EXP_DEST_->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('downstream.modals.editExportByCompany', compact('EXP_DEST_', 'one_con', 'all_con', 'one_cont', 'all_cont', 'one_com', 'all_com'));
    }

    public function upload_crude_export_company(Request $request)
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
                $year = $row['A'];
                $destination = $this->resolveModelId(\App\Region::class, 'name', $row['B']);
                $country_id = $this->resolveModelId(\App\Country::class, 'country_name', $row['C']);
                $company_id = $this->resolveModelId(\App\company::class, 'company_name', $row['D']);

                // $exp_comp = \App\down_crude_export_by_company::where('year', $year)->where('destination', $destination)->where('country_id', $country_id)->first();
                // if($exp_comp)
                // {
                //     // $stream = $exp_comp->stream->stream_name;
                //     return redirect()->route('downstream')->with('error', 'Sorry, Record Already Exist For Company, Year ' .$year. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else   { goto edit; }
                // {
                //     edit:
                if ($key >= 2) {

                            //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\Region::class, 'name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\Country::class, 'country_name', "%{$row['C']}%", $row['C']);
                    $results_3 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['D']}%", $row['D']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['D'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'down_crude_export_by_company',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $destination = 0;
                        } else {
                            $destination = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $country_id = 0;
                        } else {
                            $country_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_3['name'];
                        }
                    } else {
                        $destination = $results_1['name'];
                        $country_id = $results_2['name'];
                        $company_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_crude_export_by_company::updateOrCreate(['year'=> $row['A'],
                        'destination'=> $this->resolveModelId(\App\Region::class, 'name', $row['B']),
                        'country_id'=> $this->resolveModelId(\App\Country::class, 'country_name', $row['C']),
                        'company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['D']), ],
                            [
                                'year' => $row['A'],
                                'destination' => $destination,
                                'country_id' => $country_id,
                                'company_id' => $company_id,
                                'january' => $row['E'],
                                'febuary' => $row['F'],
                                'march' => $row['G'],
                                'april' => $row['H'],
                                'may' => $row['I'],
                                'june' => $row['J'],
                                'july' => $row['K'],
                                'august' => $row['L'],
                                'september' => $row['M'],
                                'october' => $row['N'],
                                'november' => $row['O'],
                                'december' => $row['P'],
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\down_crude_export_by_company::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $destination = '';
                    $country_id = '';
                    $company_id = '';
                }
                // }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Crude Export By Company, Destination ');
            //Audit Logging
            self::log_audit_trail('Crude Export By Company, Destination', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Crude Export By Destination/Company Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewExportByCompany(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Crude Export By Company', 'Viewed Data');
        $EXPORT_DEST = \App\down_crude_export_by_company::where('id', $request->id)->first();
        $one_con = \App\Country::where('id', $EXPORT_DEST->country_id)->first();
        $all_con = \App\Country::orderBy('country_name', 'asc')->get();
        $one_cont = \App\Region::where('id', $EXPORT_DEST->destination)->first();
        $all_cont = \App\Region::orderBy('name', 'asc')->get();
        $one_com = \App\company::where('id', $EXPORT_DEST->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('downstream.view.viewExportByCompany', compact('EXPORT_DEST', 'one_con', 'all_con', 'one_cont', 'all_cont', 'one_com'));
    }

    public function download_crude_export_company($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_crude_export_by_company::where('year', 'like', "%$txt%")
                ->orwhereHas('country', function ($query) use ($txt) {
                    $query->where('country_name', 'like', "%$txt%");
                })
                ->orwhereHas('region', function ($query) use ($txt) {
                    $query->where('name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_crude_export_by_company::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Crude Export By Company', 'Downloaded Data');

        $view = 'downstream.excel.crude_export_company_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Crude Export By Company.xlsx');
    }

    public function approveCompany(Request $request)
    {
        $company = \App\down_crude_export_by_company::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveCompany', compact('company'));
    }

    public function add_petrochemical_plant(Request $request)
    {
        try {
            //INSERTING NEW Crude Export By Pet Plant
            $add_p_plant = \App\down_petrochemical_plant::updateOrCreate(['id'=> $request->id],
            [
                'plant_location' => $request->plant_location,
                'state_id' => $request->state_id,
                'location' => $request->location,
                'ownership_id' => $request->owners,
                'ownership' => $request->ownership,
                'plant_type' => $request->plant_type,
                'plant_capacity' => $request->plant_capacity,
                'feedstock' => $request->feedstock,
                'products' => $request->products,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $state_id = $request->state_id;
            $location = $request->location;
            $ownership = $request->ownership;
            $plant_type = $request->plant_type;
            $feedstock = $request->feedstock;
            $products = $request->products;
            if (! empty($id)) {
                if (! empty($state_id)) {
                    $this->updateTempRecord($id, 'down_petrochemical_plant', 'column_1');
                }
                if (! empty($location)) {
                    $this->updateTempRecord($id, 'down_petrochemical_plant', 'column_2');
                }
                if (! empty($ownership)) {
                    $this->updateTempRecord($id, 'down_petrochemical_plant', 'column_3');
                }
                if (! empty($plant_type)) {
                    $this->updateTempRecord($id, 'down_petrochemical_plant', 'column_4');
                }
                if (! empty($feedstock)) {
                    $this->updateTempRecord($id, 'down_petrochemical_plant', 'column_4');
                }
                if (! empty($products)) {
                    $this->updateTempRecord($id, 'down_petrochemical_plant', 'column_4');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_petrochemical_plant::class, $id, 'down_petrochemical_plant');
            }

            //send mail
            //self::send_all_mail(" DOWNSTREAM - Petrochemical Plant ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Petrochemical Plant', 'Update Record');
            } else {
                self::log_audit_trail('Petrochemical Plant', 'Add Record');
            }

            if ($request->ajax()) {
                $plant_details = ['locations'=>$add_p_plant->locations->plant_location_name,
                    'state'=>$add_p_plant->state->state_name,
                    'location'=>$add_p_plant->location,
                    'ownership'=>$add_p_plant->ownerships->ownership_name,
                    'plant_type'=>$add_p_plant->plant_types->plant_type_name,
                    'plant_capacity'=>$add_p_plant->plant_capacity,
                    'feedstock'=>$add_p_plant->feedstocks->feedstock_name,
                    'products'=>$add_p_plant->product->product_name,
                    'created_by'=>$add_p_plant->created_by, 'id'=>$add_p_plant->id, ];

                return response()->json(['status'=>'ok', 'message'=>$plant_details, 'info'=>'New Petrochemical Plant Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Petrochemical Plant Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editPetrolchemicalPlant(Request $request)
    {
        $p_plants = \App\down_petrochemical_plant::where('id', $request->id)->first();

        return view('downstream.modals.editPetrolchemicalPlant', compact('p_plants'));
    }

    public function upload_petrochemical_plant(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\down_plant_location::class, 'plant_location_name', "%{$row['C']}%", $row['C']);
                    $results_3 = $this->resolveMasterData(\App\down_ownership::class, 'ownership_name', "%{$row['D']}%", $row['D']);
                    $results_4 = $this->resolveMasterData(\App\down_plant_type::class, 'plant_type_name', "%{$row['E']}%", $row['E']);
                    $results_5 = $this->resolveMasterData(\App\down_feedstock::class, 'feedstock_name', "%{$row['G']}%", $row['G']);
                    $results_6 = $this->resolveMasterData(\App\down_product::class, 'product_name', "%{$row['H']}%", $row['H']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3 || $results_6['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['D'];
                        } else {
                            $column_3 = '';
                        }
                        if ($results_4['stage_id'] == 3) {
                            $column_4 = $row['E'];
                        } else {
                            $column_4 = '';
                        }
                        if ($results_5['stage_id'] == 3) {
                            $column_5 = $row['G'];
                        } else {
                            $column_5 = '';
                        }
                        if ($results_6['stage_id'] == 3) {
                            $column_6 = $row['H'];
                        } else {
                            $column_6 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => '', 'type' => 'down_petrochemical_plant',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                                'column_4' => $column_4, 'column_5' => $column_5, 'column_6' => $column_6,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $location = 0;
                        } else {
                            $location = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $ownership = 0;
                        } else {
                            $ownership = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $plant_type = 0;
                        } else {
                            $plant_type = $results_4['name'];
                        }
                        if ($results_5['stage_id'] == 3) {
                            $feedstock = 0;
                        } else {
                            $feedstock = $results_5['name'];
                        }
                        if ($results_6['stage_id'] == 3) {
                            $products = 0;
                        } else {
                            $products = $results_6['name'];
                        }
                    } else {
                        $state_id = $results_1['name'];
                        $location = $results_2['name'];
                        $ownership = $results_3['name'];
                        $plant_type = $results_4['name'];
                        $feedstock = $results_5['name'];
                        $products = $results_6['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_petrochemical_plant::updateOrCreate(['id'=> $request->id],
                        [
                            'plant_location' => $row['A'],
                            'state_id' => $state_id,
                            'location' => $location,
                            'ownership' => $ownership,
                            'plant_type' => $plant_type,
                            'plant_capacity' => $row['F'],
                            'feedstock' => $feedstock,
                            'products' => $products,
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3 || $results_6['stage_id'] == 3) {
                        $this->updateTable(\App\down_petrochemical_plant::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $state_id = '';
                    $location = '';
                    $ownership = '';
                    $plant_type = '';
                    $feedstock = '';
                    $products = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Petrochemical Plant ');
            //Audit Logging
            self::log_audit_trail('Petrochemical Plant', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Petrochemical Plant Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewPetrolchemicalPlant(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Petrochemical Plant', 'Viewed Data');
        $P_PLANT = \App\down_petrochemical_plant::where('id', $request->id)->first();

        return view('downstream.view.viewPetrolchemicalPlant', compact('P_PLANT'));
    }

    public function download_petrochemical_plant($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_petrochemical_plant::where('year', 'like', "%$txt%")
                ->orwhereHas('locations', function ($query) use ($txt) {
                    $query->where('plant_location_name', 'like', "%$txt%");
                })
                ->orwhereHas('ownerships', function ($query) use ($txt) {
                    $query->where('ownership_name', 'like', "%$txt%");
                })
                ->orwhereHas('plant_types', function ($query) use ($txt) {
                    $query->where('plant_type_name', 'like', "%$txt%");
                })
                ->orwhereHas('feedstocks', function ($query) use ($txt) {
                    $query->where('feedstock_name', 'like', "%$txt%");
                })
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_petrochemical_plant::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Petrochemical Plant', 'Downloaded Data');

        $view = 'downstream.excel.crude_export_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Petrochemical Plant.xlsx');
    }

    public function approvePetPlant(Request $request)
    {
        $pet_plant = \App\down_petrochemical_plant::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approvePetPlant', compact('pet_plant'));
    }

    public function add_refinary_capacity(Request $request)
    {
        $refinery_id = $request->refinery_id;
        $year = $request->year;     //$state_id = $request->state_id;
        $ref_cap = \App\down_refinary_capacity_utilization::where('refinery_id', $refinery_id)->where('year', $year)->first();
        if ($ref_cap) {
            if ($request->ajax() && $request->id == '') {
                $refinery = $ref_cap->refinery->plant_location_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$refinery.' Refinery Capacity For Year '.$year.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:   //return $request->all();
                //TOTAL
                $total = $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december;
                //TOTAL UTILIZED
                $ref_d_cap = \App\down_refinery_performance::where('refinery_id', $request->refinery_id)->where('processing_unit', 'Crude distillation')->first();

                if ($ref_d_cap && $total != 0) {
                    $capacity_utilization = (($ref_d_cap->value * 100) / $total);
                }

                //

                //INSERTING NEW Performance
                $add_ref_cap = \App\down_refinary_capacity_utilization::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'refinery_id' => $request->refinery_id,
                    // 'product_id' => $request->product_id,
                    // 'state_id' => $request->state_id,
                    // 'location' => $request->location,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'total' => $total,
                    'total_utilization' => $ref_d_cap->value - $total,
                    'capacity_utilization' => $capacity_utilization,
                    'q1' => $request->january + $request->febuary + $request->march,
                    'q2' => $request->april + $request->may + $request->june,
                    'q3' => $request->july + $request->august + $request->september,
                    'q4' => $request->october + $request->november + $request->december,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $refinery_id = $request->refinery_id;  //$product_id = $request->product_id;    $state_id = $request->state_id;
                if (! empty($id)) {
                    if (! empty($refinery_id)) {
                        $this->updateTempRecord($id, 'down_refinary_capacity_utilization', 'column_1');
                    }
                    // if(!empty($product_id)){ $this->updateTempRecord($id, 'down_refinary_capacity_utilization', 'column_2'); }
                    // if(!empty($state_id)){ $this->updateTempRecord($id, 'down_refinary_capacity_utilization', 'column_3'); }

                    //clear temp record
                    $this->clearTempRecord(\App\down_refinary_capacity_utilization::class, $id, 'down_refinary_capacity_utilization');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Refinery Performance ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Refinery Performance', 'Update Record');
                } else {
                    self::log_audit_trail('Refinery Performance', 'Add Record');
                }

                if ($request->ajax()) {
                    $ref_cap_details = ['year'=>$add_ref_cap->year, 'refinery'=>$add_ref_cap->refinery->plant_location_name,  'january'=>$add_ref_cap->january, 'febuary'=>$add_ref_cap->febuary, 'march'=>$add_ref_cap->march, 'april'=>$add_ref_cap->april, 'may'=>$add_ref_cap->may, 'june'=>$add_ref_cap->june, 'july'=>$add_ref_cap->july, 'august'=>$add_ref_cap->august, 'september'=>$add_ref_cap->september, 'october'=>$add_ref_cap->october, 'november'=>$add_ref_cap->november, 'december'=>$add_ref_cap->december,
                        'total'=>$add_ref_cap->total,
                        'total_utilization'=>$add_ref_cap->total_utilization,
                        'capacity_utilization'=>$add_ref_cap->capacity_utilization, 'id'=>$add_ref_cap->id, ];

                    return response()->json(['status'=>'ok', 'message'=>$ref_cap_details, 'info'=>'New Refinery Performance Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Refinery Performance Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editRefinaryCapacity(Request $request)
    {
        $REF_CAP = \App\down_refinary_capacity_utilization::where('id', $request->id)->first();
        $wrpc = \App\down_refinery_performance::where('refinery_id', '1')->first();
        $krpc = \App\down_refinery_performance::where('refinery_id', '2')->first();
        $new_phrc = \App\down_refinery_performance::where('refinery_id', '3')->first();
        $ndpr = \App\down_refinery_performance::where('refinery_id', '4')->first();
        $old_phrc = \App\down_refinery_performance::where('refinery_id', '5')->first();

        $one_ref = \App\down_plant_location::where('id', $REF_CAP->refinery_id)->first();
        $all_ref = \App\down_plant_location::orderBy('plant_location_name', 'asc')->get();
        // $one_sta = \App\down_outlet_states::where('id', $REF_CAP->state_id)->first();
        // $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        // $one_pro = \App\down_import_product::where('id', $REF_CAP->product_id)->first();
        // $all_pro = \App\down_import_product::orderBy('product_name', 'asc')->get();

        return view('downstream.modals.editRefinaryCapacity', compact('REF_CAP', 'wrpc', 'krpc', 'new_phrc', 'ndpr', 'old_phrc', 'one_ref', 'all_ref'));
    }

    public function upload_refinary_capacity(Request $request)
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
                    $ref_id = $this->resolveModelId(\App\down_plant_location::class, 'plant_location_name', $row['B']);

                    $total = $row['C'] + $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'];

                    $ref_d_cap = \App\down_refinery_performance::where('refinery_id', $ref_id)->where('processing_unit', 'Crude distillation')->first();

                    if ($ref_d_cap && $total != 0) {
                        $capacity_utilization = (($ref_d_cap->value * 100) / $total);
                    }

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\down_plant_location::class, 'plant_location_name', "%{$row['B']}%", $row['B']);
                    // $results_2 = $this->resolveMasterData('\App\down_import_product', 'product_name', "%{$row['C']}%", $row['C']);
                    // $results_3 = $this->resolveMasterData('\App\down_outlet_states', 'state_name', "%{$row['D']}%", $row['D']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        // if($results_2['stage_id'] == 3){ $column_2 = $row['C']; }else{ $column_2 = ''; }
                        // if($results_3['stage_id'] == 3){ $column_3 = $row['D']; }else{ $column_3 = ''; }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_refinary_capacity_utilization',
                                'column_1' => $column_1, //'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $refinery_id = 0;
                        } else {
                            $refinery_id = $results_1['name'];
                        }
                        // if($results_2['stage_id'] == 3){ $product_id = 0; }else{$product_id = $results_2['name']; }
                            // if($results_3['stage_id'] == 3){ $state_id = 0; }else{$state_id = $results_3['name']; }
                    } else {
                        $refinery_id = $results_1['name'];  //$product_id = $results_2['name'];  $state_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_refinary_capacity_utilization::updateOrCreate(['year'=> $row['A'],
                        'refinery_id'=> $ref_id,
                        // 'product_id'=> $this->resolveModelId('\App\down_import_product', 'product_name', $row['C']),
                        // 'state_id'=> $this->resolveModelId('\App\down_outlet_states', 'state_name', $row['D'])
                    ],
                        [
                            'year' => $row['A'],
                            'refinery_id' => $refinery_id,
                            // 'product_id' => $product_id,
                            // 'state_id' => $state_id,
                            // 'location' => $row['E'],
                            'january' => $row['C'],
                            'febuary' => $row['D'],
                            'march' => $row['E'],
                            'april' => $row['F'],
                            'may' => $row['G'],
                            'june' => $row['H'],
                            'july' => $row['I'],
                            'august' => $row['J'],
                            'september' => $row['K'],
                            'october' => $row['L'],
                            'november' => $row['M'],
                            'december' => $row['N'],
                            'total' => $total,
                            'total_utilization' => $ref_d_cap->value - $total,
                            'capacity_utilization' => $capacity_utilization,
                            'q1' => $row['C'] + $row['D'] + $row['E'],
                            'q2' => $row['F'] + $row['G'] + $row['H'],
                            'q3' => $row['I'] + $row['J'] + $row['K'],
                            'q4' => $row['L'] + $row['M'] + $row['N'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\down_refinary_capacity_utilization::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $refinery_id = ''; //$product_id = ''; $state_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Refinery Performance ');
            //Audit Logging
            self::log_audit_trail('Refinery Performance', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Refinery Performance Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRefinaryCapacity(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Refinery Performance', 'Viewed Data');
        $REF_CAPACITY = \App\down_refinary_capacity_utilization::where('id', $request->id)->first();
        $ref_dsg_cap = \App\down_refinary_design_capacity::first();
        $wrpc = \App\down_refinery_performance::where('refinery_id', '1')->first();
        $krpc = \App\down_refinery_performance::where('refinery_id', '2')->first();
        $new_phrc = \App\down_refinery_performance::where('refinery_id', '3')->first();
        $ndpr = \App\down_refinery_performance::where('refinery_id', '4')->first();
        $old_phrc = \App\down_refinery_performance::where('refinery_id', '5')->first();

        $one_ref = \App\down_plant_location::where('id', $REF_CAPACITY->refinery_id)->first();
        $all_ref = \App\down_plant_location::orderBy('plant_location_name', 'asc')->get();
        // $one_sta = \App\down_outlet_states::where('id', $REF_CAPACITY->state_id)->first();
        // $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        // $one_pro = \App\down_import_product::where('id', $REF_CAPACITY->product_id)->first();
        // $all_pro = \App\down_import_product::orderBy('product_name', 'asc')->get();
        $ref_d_cap = \App\down_refinery_performance::where('refinery_id', $REF_CAPACITY->refinery_id)->where('processing_unit', 'Crude distillation')->first();

        return view('downstream.view.viewRefinaryCapacity', compact('REF_CAPACITY', 'ref_dsg_cap', 'wrpc', 'krpc', 'new_phrc', 'ndpr', 'old_phrc', 'one_ref', 'all_ref', 'ref_d_cap'));
    }

    public function download_refinary_capacity($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_refinary_capacity_utilization::where('year', 'like', "%$txt%")
                ->orwhere('location', 'like', "%$txt%")
                // ->orwhereHas('state', function($query) use ($txt){ $query->where('state_name','like', "%$txt%");   })
                // ->orwhereHas('product', function($query) use ($txt){ $query->where('product_name','like', "%$txt%"); })
                ->orwhereHas('refinery', function ($query) use ($txt) {
                    $query->where('plant_location_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_refinary_capacity_utilization::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Refinery Performance', 'Downloaded Data');

        $view = 'downstream.excel.refinery_cap_util_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Refinery Performance.xlsx');
    }

    public function approveRefCapacity(Request $request)
    {
        $ref_capacity = \App\down_refinary_capacity_utilization::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveRefCapacity', compact('ref_capacity'));
    }

    public function add_refinary_performance(Request $request)
    {
        try {
            //INSERTING NEW Refinery Plants in Nigeria
            $add_ref_perf = \App\down_refinery_performance::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'processing_unit' => $request->processing_unit,
                'refinery_id' => $request->refinery_id,
                'location' => $request->location,
                'value' => $request->value,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $refinery_id = $request->refinery_id;
            if (! empty($id)) {
                if (! empty($refinery_id)) {
                    $this->updateTempRecord($id, 'down_refinery_performance', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_refinery_performance::class, $id, 'down_refinery_performance');
            }

            //send mail
            //self::send_all_mail(" DOWNSTREAM - Refinery Details ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Refinery Details', 'Update Record');
            } else {
                self::log_audit_trail('Refinery Details', 'Add Record');
            }

            if ($request->ajax()) {
                $ref_perf_details = ['year'=>$add_ref_perf->year, 'processing_unit'=>$add_ref_perf->processing_unit, 'refinery'=>$add_ref_perf->refinery->plant_location_name, 'location'=>$add_ref_perf->location, 'value'=>$add_ref_perf->value, 'id'=>$add_ref_perf->id];

                return response()->json(['status'=>'ok', 'message'=>$ref_perf_details, 'info'=>'New Refinery Details Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Refinery Details Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editRefinaryPerformance(Request $request)
    {
        $REF_PERF = \App\down_refinery_performance::where('id', $request->id)->first();

        return view('downstream.modals.editRefinaryPerformance', compact('REF_PERF'));
    }

    public function upload_refinary_performance(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_plant_location::class, 'plant_location_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_refinery_performance', 'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $refinery_id = 0;
                        } else {
                            $refinery_id = $results_1['name'];
                        }
                    } else {
                        $refinery_id = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_refinery_performance::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'processing_unit' => $row['B'],
                            'refinery_id' => $refinery_id,
                            'location' => $row['D'],
                            'value' => $row['E'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\down_refinery_performance::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $refinery_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Refinery Details ');
            //Audit Logging
            self::log_audit_trail('Refinery Details', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Refinery Plants in Nigeria Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRefinaryPerformance(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Refinery Details', 'Viewed Data');
        $REF_PERFORMANCE = \App\down_refinery_performance::where('id', $request->id)->first();

        return view('downstream.view.viewRefinaryPerformance', compact('REF_PERFORMANCE'));
    }

    public function download_refinary_performance($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_refinery_performance::where('year', 'like', "%$txt%")
                ->orwhere('location', 'like', "%$txt%")->orwhere('processing_unit', 'like', "%$txt%")->orwhere('location', 'like', "%$txt%")->orwhere('value', 'like', "%$txt%")
                ->orwhereHas('refinery', function ($query) use ($txt) {
                    $query->where('plant_location_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_refinery_performance::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Refinery Details', 'Downloaded Data');

        $view = 'downstream.excel.refinery_performance_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Refinery Details.xlsx');
    }

    public function approveRefPerformance(Request $request)
    {
        $ref_performance = \App\down_refinery_performance::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveRefPerformance', compact('ref_performance'));
    }

    public function add_depot(Request $request)
    {
        try {
            //INSERTING NEW Depot
            $add_ = \App\down_depot::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'depot_name' => $request->depot_name,
                'state_id' => $request->state_id,
                'location' => $request->location,
                'ownership_id' => $request->ownership_id,
                'design_capacity' => $request->design_capacity,
                'truckout' => $request->truckout,
                'product_id' => $request->product_id,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $state_id = $request->state_id;
            $ownership_id = $request->ownership_id;
            $product_id = $request->product_id;
            if (! empty($id)) {
                if (! empty($state_id)) {
                    $this->updateTempRecord($id, 'down_depot', 'column_1');
                }
                if (! empty($ownership_id)) {
                    $this->updateTempRecord($id, 'down_depot', 'column_2');
                }
                if (! empty($product_id)) {
                    $this->updateTempRecord($id, 'down_depot', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_depot::class, $id, 'down_depot');
            }

            //send mail
            //self::send_all_mail(" DOWNSTREAM - Depot Details ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Depot Details', 'Update Record');
            } else {
                self::log_audit_trail('Depot Details', 'Add Record');
            }

            if ($request->ajax()) {
                $ref_perf_details = ['year'=>$add_->year, 'depot_name'=>$add_->depot_name, 'state'=>$add_->state->state_name, 'location'=>$add_->location, 'ownership'=>$add_->ownership->ownership_name, 'design_capacity'=>$add_->design_capacity, 'truckout'=>$add_->truckout, 'product'=>$add_->product->product_name, 'created_by'=>$add_->created_by, 'id'=>$add_->id];

                return response()->json(['status'=>'ok', 'message'=>$ref_perf_details, 'info'=>'New Depot Details Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Depot Details Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editDepot(Request $request)
    {
        $DEPOT = \App\down_depot::where('id', $request->id)->first();

        return view('downstream.modals.editDepot', compact('DEPOT'));
    }

    public function upload_depot(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        // try{
        //     DB::transaction(function () use($request) {

        //     });
        // }
        // catch(\Exception $e){
        //     return $e->getMessage();
        // }

        DB::beginTransaction();
        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                $year = $row['A'];
                $depot_name = $row['B'];
                $state_id = $row['C'];
                $test = \App\down_depot::where('year', $year)->where('depot_name', $depot_name)->where('state_id', $state_id)->first();
                if ($test) {
                    $state = $test->state->state_name;

                    return redirect()->route('downstream')->with('error', 'Sorry, Record Already Exist For '.$depot_name.' Company, Year '.$year.' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                } else {
                    goto edit;
                }
                {
                       edit:

                         if ($key >= 2) {

                            //script to check if name exist in master record
                             $results_1 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['C']}%", $row['C']);
                             $results_2 = $this->resolveMasterData(\App\down_ownership::class, 'ownership_name', "%{$row['E']}%", $row['E']);
                             $results_3 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['H']}%", $row['H']);

                             if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                                 //checking individual columns if there is a match
                                 if ($results_1['stage_id'] == 3) {
                                     $column_1 = $row['C'];
                                 } else {
                                     $column_1 = '';
                                 }
                                 if ($results_2['stage_id'] == 3) {
                                     $column_2 = $row['E'];
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
                                    'year' => $row['A'], 'type' => 'down_depot',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                                ]);
                                 if ($results_1['stage_id'] == 3) {
                                     $state_id = 0;
                                 } else {
                                     $state_id = $results_1['name'];
                                 }
                                 if ($results_2['stage_id'] == 3) {
                                     $ownership_id = 0;
                                 } else {
                                     $ownership_id = $results_2['name'];
                                 }
                                 if ($results_3['stage_id'] == 3) {
                                     $product_id = 0;
                                 } else {
                                     $product_id = $results_3['name'];
                                 }
                             } else {
                                 $state_id = $results_1['name'];
                                 $ownership_id = $results_2['name'];
                                 $product_id = $results_3['name'];
                             }

                             //UPLOADING NEW
                             $add_prod = \App\down_depot::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'depot_name' => $row['B'],
                                'state_id' => $state_id,
                                'location' => $row['D'],
                                'ownership_id' => $ownership_id,
                                'design_capacity' => $row['F'],
                                'truckout' => $row['G'],
                                'product_id' => $product_id,
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                             //UPDATE ID RECORD
                             if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                                 $this->updateTable(\App\down_depot::class, 'pending_id', $add_prod->id, $pend->id);
                                 $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                             }
                             $state_id = '';
                             $ownership_id = '';
                             $product_id = '';
                         }
                     }
            }
            DB::commit();
            $success = true;
            //send mail
            self::send_all_mail(' DOWNSTREAM - Depot Details ');
            //Audit Logging
            self::log_audit_trail('Depot Details', 'Data Bulk Upload');

            return redirect()->route('downstream')->with('info', 'Depot Details Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            DB::rollback();
            $success = false;
            if (! $success) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, Record Already Exist ');
            }
        }
    }

    public function viewDepot(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Depot Details', 'Viewed Data');
        $DEPOT = \App\down_depot::where('id', $request->id)->first();

        return view('downstream.view.viewDepot', compact('DEPOT'));
    }

    public function download_depot($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_depot::where('year', 'like', "%$txt%")->orwhere('depot_name', 'like', "%$txt%")->orwhere('location', 'like', "%$txt%")->orwhere('truckout', 'like', "%$txt%")
                ->orwhereHas('ownership', function ($query) use ($txt) {
                    $query->where('ownership_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_depot::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Depot Details', 'Downloaded Data');

        $view = 'downstream.excel.depot_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Depot Facilities.xlsx');
    }

    public function approveDepot(Request $request)
    {
        $depot = \App\down_depot::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveDepot', compact('depot'));
    }

    public function
    add_jetty(Request $request)
    {
        try {
            //INSERTING NEW jetty
            $add_ = \App\down_jetty::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'jetty_name' => $request->jetty_name,
                'state_id' => $request->state_id,
                'location' => $request->location,
                'ownership_id' => $request->ownership_id,
                'design_capacity' => $request->design_capacity,
                'product_id' => $request->product_id,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $state_id = $request->state_id;
            $ownership_id = $request->ownership_id;
            $product_id = $request->product_id;
            if (! empty($id)) {
                if (! empty($state_id)) {
                    $this->updateTempRecord($id, 'down_jetty', 'column_1');
                }
                if (! empty($ownership_id)) {
                    $this->updateTempRecord($id, 'down_jetty', 'column_2');
                }
                if (! empty($product_id)) {
                    $this->updateTempRecord($id, 'down_jetty', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_jetty::class, $id, 'down_jetty');
            }

            //send mail
            //self::send_all_mail(" DOWNSTREAM - Jetty Details ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Facilities - Jetty Details', 'Update Record');
            } else {
                self::log_audit_trail('Facilities - Jetty Details', 'Add Record');
            }

            if ($request->ajax()) {
                $ref_perf_details = ['year'=>$add_->year, 'jetty_name'=>$add_->jetty_name, 'state'=>$add_->state->state_name, 'location'=>$add_->location,
                    'ownership'=>$add_->ownership->ownership_name, 'design_capacity'=>$add_->design_capacity, 'product'=>$add_->product->product_name,
                    'created_by'=>$add_->created_by, 'id'=>$add_->id, ];

                return response()->json(['status'=>'ok', 'message'=>$ref_perf_details, 'info'=>'New Jetty Details Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Jetty Details Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editJetty(Request $request)
    {
        $JETTY = \App\down_jetty::where('id', $request->id)->first();

        return view('downstream.modals.editJetty', compact('JETTY'));
    }

    public function upload_jetty(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\down_ownership::class, 'ownership_name', "%{$row['E']}%", $row['E']);
                    $results_3 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['G']}%", $row['G']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['E'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['G'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_jetty',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $ownership_id = 0;
                        } else {
                            $ownership_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_3['name'];
                        }
                    } else {
                        $state_id = $results_1['name'];
                        $ownership_id = $results_2['name'];
                        $product_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_jetty::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'jetty_name' => $row['B'],
                            'state_id' => $state_id,
                            'location' => $row['D'],
                            'ownership_id' => $ownership_id,
                            'design_capacity' => $row['F'],
                            'product_id' => $product_id,
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\down_jetty::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $state_id = '';
                    $ownership_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Jetty Details ');
            //Audit Logging
            self::log_audit_trail('Facilities Jetty Details', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Jetty Details Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewJetty(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Jetty Details', 'Viewed Data');
        $JETTY = \App\down_jetty::where('id', $request->id)->first();

        return view('downstream.view.viewJetty', compact('JETTY'));
    }

    public function download_jetty($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_jetty::where('year', 'like', "%$txt%")->orwhere('jetty_name', 'like', "%$txt%")
                ->orwhere('location', 'like', "%$txt%")->orwhere('truckout', 'like', "%$txt%")
                ->orwhereHas('ownership', function ($query) use ($txt) {
                    $query->where('ownership_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_jetty::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Jetty Details', 'Downloaded Data');

        $view = 'downstream.excel.jetty_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Jetty Facilities.xlsx');
    }

    public function approveJetty(Request $request)
    {
        $jetty = \App\down_jetty::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveJetty', compact('jetty'));
    }

    public function add_terminal(Request $request)
    {
        try {
            //INSERTING NEW Terminal
            $add_ = \App\down_terminal::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'terminal_name' => $request->terminal_name,
                'facility_type_id' => $request->facility_type_id,
                'state_id' => $request->state_id,
                'location' => $request->location,
                'ownership_id' => $request->ownership_id,
                'design_capacity' => $request->design_capacity,
                'product_id' => $request->product_id,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $facility_type_id = $request->facility_type_id;
            $state_id = $request->state_id;
            $ownership_id = $request->ownership_id;
            $product_id = $request->product_id;
            if (! empty($id)) {
                if (! empty($facility_type_id)) {
                    $this->updateTempRecord($id, 'down_terminal', 'column_1');
                }
                if (! empty($state_id)) {
                    $this->updateTempRecord($id, 'down_terminal', 'column_2');
                }
                if (! empty($ownership_id)) {
                    $this->updateTempRecord($id, 'down_terminal', 'column_3');
                }
                if (! empty($product_id)) {
                    $this->updateTempRecord($id, 'down_terminal', 'column_4');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_terminal::class, $id, 'down_terminal');
            }

            //send mail
            //self::send_all_mail(" DOWNSTREAM - Terminal Details ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Facilities - Terminal Details', 'Update Record');
            } else {
                self::log_audit_trail('Facilities - Terminal Details', 'Add Record');
            }

            if ($request->ajax()) {
                $ref_perf_details = ['year'=>$add_->year, 'terminal_name'=>$add_->terminal_name, 'facility_type'=>$add_->facility_type->facility_type_name, 'state'=>$add_->state->state_name, 'location'=>$add_->location, 'ownership'=>$add_->ownership->ownership_name, 'design_capacity'=>$add_->design_capacity, 'product'=>$add_->product->product_name, 'created_by'=>$add_->created_by, 'id'=>$add_->id];

                return response()->json(['status'=>'ok', 'message'=>$ref_perf_details, 'info'=>'New Terminal Details Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Terminal Details Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editTerminal(Request $request)
    {
        $TERM = \App\down_terminal::where('id', $request->id)->first();

        return view('downstream.modals.editTerminal', compact('TERM'));
    }

    public function upload_terminal(Request $request)
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
                    $row_h = ucfirst($row['H']);
                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\facility_type::class, 'facility_type_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['D']}%", $row['D']);
                    $results_3 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['F']}%", $row['F']);
                    $results_4 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row_h}%", $row_h);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3) {
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
                            $column_3 = $row['F'];
                        } else {
                            $column_3 = '';
                        }
                        if ($results_4['stage_id'] == 3) {
                            $column_4 = $row_h;
                        } else {
                            $column_4 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_terminal',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $facility_type_id = 0;
                        } else {
                            $facility_type_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $ownership_id = 0;
                        } else {
                            $ownership_id = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_4['name'];
                        }
                    } else {
                        $facility_type_id = $results_1['name'];
                        $state_id = $results_2['name'];
                        $ownership_id = $results_3['name'];
                        $product_id = $results_4['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_terminal::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'terminal_name' => $row['B'],
                            'facility_type_id' => $facility_type_id,
                            'state_id' => $state_id,
                            'location' => $row['E'],
                            'ownership_id' => $ownership_id,
                            'design_capacity' => $row['G'],
                            'product_id' => $product_id,
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\down_terminal::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $facility_type_id = '';
                    $state_id = '';
                    $ownership_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Terminal Details ');
            //Audit Logging
            self::log_audit_trail('Facilities - Terminal Details', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Terminal Details Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewTerminal(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Terminal Details', 'Viewed Data');
        $TERM = \App\down_terminal::where('id', $request->id)->first();

        return view('downstream.view.viewTerminal', compact('TERM'));
    }

    public function download_terminal($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_terminal::where('year', 'like', "%$txt%")->orwhere('terminal_name', 'like', "%$txt%")
                ->orwhere('location', 'like', "%$txt%")->orwhere('truckout', 'like', "%$txt%")
                ->orwhereHas('facility_type', function ($query) use ($txt) {
                    $query->where('facility_type_name', 'like', "%$txt%");
                })
                ->orwhereHas('ownership', function ($query) use ($txt) {
                    $query->where('ownership_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_terminal::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Terminal Details', 'Downloaded Data');

        $view = 'downstream.excel.terminal_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Terminal Facilities.xlsx');
    }

    public function approveTerminal(Request $request)
    {
        $terminal = \App\down_terminal::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveTerminal', compact('terminal'));
    }

    public function add_import_product(Request $request)
    {
        try {
            //INSERTING NEW
            $add_imp_prod = \App\down_import_product::updateOrCreate(['id'=> $request->id],
            [
                'product_name' => $request->product_name,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail(' DOWNSTREAM - Import Product ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('All Product Listing', 'Update Record');
            } else {
                self::log_audit_trail('All Product Listing', 'Add Record');
            }

            if ($request->ajax()) {
                $imp_prod_details = ['product'=>$add_imp_prod->product_name, 'id'=>$add_imp_prod->id];

                return response()->json(['status'=>'ok', 'message'=>$imp_prod_details, 'info'=>'New Import Product Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Import Product Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editImportProduct(Request $request)
    {
        $IMP_PROD = \App\down_import_product::where('id', $request->id)->first();

        return view('downstream.modals.editImportProduct', compact('IMP_PROD'));
    }

    public function upload_import_product(Request $request)
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
                    //UPLOADING NEW
                    $add_prod = \App\down_import_product::updateOrCreate(['id'=> $request->id],
                        [
                            'product_name' => $row['A'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Import Product ');
            //Audit Logging
            self::log_audit_trail('All Product Listing', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Import Product Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewImportProduct(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Products Details', 'Viewed Data');
        $PRODUCTS = \App\down_import_product::where('id', $request->id)->first();

        return view('downstream.view.viewImportProduct', compact('PRODUCTS'));
    }

    public function download_import_product($type)
    {
        //Audit Logging
        self::log_audit_trail('Products Details', 'Downloaded Data');
        $data = \App\down_import_product::get()->toArray();

        return Excel::create('Downstream_Import_Product', function ($excel) use ($data) {
            $excel->sheet('Import_Product', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function approveProduct(Request $request)
    {
        $product = \App\down_import_product::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveProduct', compact('product'));
    }

    public function add_product_volume_permit(Request $request)
    {
        $product_id = $request->product_id;
        $market_segment_id = $request->market_segment_id;
        $year = $request->year;
        $prod_vol = \App\down_product_vol_import_permit::where('product_id', $product_id)->where('market_segment_id', $market_segment_id)->where('year', $year)->first();
        if ($prod_vol) {
            if ($request->ajax() && $request->id == '') {
                $prod_name = $prod_vol->product->product_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$prod_name.' Product For Year '.$year.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                    if ($product_id == 1) {
                        $conv = 1341;
                    } elseif ($product_id == 2) {
                        $conv = 1164;
                    } elseif ($product_id == 3) {
                        $conv = 1164;
                    } elseif ($product_id == 4) {
                        $conv = 1232;
                    } elseif ($product_id == 7) {
                        $conv = 1067;
                    } elseif ($product_id == 8) {
                        $conv = 961.9992;
                    } elseif ($product_id == 6) {
                        $conv = 1050;
                    } elseif ($product_id == 5) {
                        $conv = 1754.389;
                    }

                $total = $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december;

                $total_MT = ($total / $conv);

                //INSERTING NEW
                $add_pvp = \App\down_product_vol_import_permit::updateOrCreate(['id'=> $request->id],
                [
                    'market_segment_id' => $request->market_segment_id,
                    'product_id' => $request->product_id,
                    'year' => $request->year,
                    'january' => ($request->january * $conv),
                    'febuary' => ($request->febuary * $conv),
                    'march' => ($request->march * $conv),
                    'april' => ($request->april * $conv),
                    'may' => ($request->may * $conv),
                    'june' => ($request->june * $conv),
                    'july' => ($request->july * $conv),
                    'august' => ($request->august * $conv),
                    'september' => ($request->september * $conv),
                    'october' => ($request->october * $conv),
                    'november' => ($request->november * $conv),
                    'december' => ($request->december * $conv),
                    'total' => $total,
                    'total_litres' => $total_MT,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $market_segment_id = $request->market_segment_id;
                $product_id = $request->product_id;
                if (! empty($id)) {
                    if (! empty($market_segment_id)) {
                        $this->updateTempRecord($id, 'down_product_vol_import_permit', 'column_1');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'down_product_vol_import_permit', 'column_2');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_product_vol_import_permit::class, $id, 'down_product_vol_import_permit');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Products Volumes (Import Permits) ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Products Volumes (Import Permits)', 'Update Record');
                } else {
                    self::log_audit_trail('Products Volumes (Import Permits)', 'Add Record');
                }

                if ($request->ajax()) {
                    $pvp_details = ['market_segment'=>$add_pvp->market_segment->market_segment_name, 'product'=>$add_pvp->product->product_name, 'year'=>$add_pvp->year, 'january'=>$add_pvp->january, 'febuary'=>$add_pvp->febuary, 'march'=>$add_pvp->march, 'april'=>$add_pvp->april, 'may'=>$add_pvp->may, 'june'=>$add_pvp->june, 'july'=>$add_pvp->july, 'august'=>$add_pvp->august, 'september'=>$add_pvp->september, 'october'=>$add_pvp->october, 'november'=>$add_pvp->november, 'december'=>$add_pvp->december, 'total'=>$add_pvp->total, 'id'=>$add_pvp->id];

                    return response()->json(['status'=>'ok', 'message'=>$pvp_details, 'info'=>'New Products Volumes (Import Permits) Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Products Volumes (Import Permits) Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editProductVolumePermit(Request $request)
    {
        $PRO_VOL_PERM = \App\down_product_vol_import_permit::where('id', $request->id)->first();

        return view('downstream.modals.editProductVolumePermit', compact('PRO_VOL_PERM'));
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
                    $product_id = $this->resolveModelId(\App\down_import_product::class, 'product_name', $row['B']);
                    if ($product_id == 1) {
                        $conv = 1341;
                    } elseif ($product_id == 2) {
                        $conv = 1164;
                    } elseif ($product_id == 3) {
                        $conv = 1164;
                    } elseif ($product_id == 4) {
                        $conv = 1232;
                    } elseif ($product_id == 7) {
                        $conv = 1067;
                    } elseif ($product_id == 8) {
                        $conv = 961.9992;
                    } elseif ($product_id == 6) {
                        $conv = 1050;
                    } elseif ($product_id == 5) {
                        $conv = 1754.389;
                    }

                    $total = $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'];

                    $total_MT = ($total / $conv);

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\down_market_segment::class, 'market_segment_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['B']}%", $row['B']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['A'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['B'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['C'], 'type' => 'down_product_vol_import_permit',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $market_segment_id = 0;
                        } else {
                            $market_segment_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_2['name'];
                        }
                    } else {
                        $market_segment_id = $results_1['name'];
                        $product_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_product_vol_import_permit::updateOrCreate([
                        'market_segment_id'=> $this->resolveModelId(\App\down_market_segment::class, 'market_segment_name', $row['A']),
                        'product_id'=> $this->resolveModelId(\App\down_import_product::class, 'product_name', $row['B']),
                        'year'=> $row['C'], ],
                        [
                            'market_segment_id' => $market_segment_id,
                            'product_id' => $product_id,
                            'year' => $row['C'],
                            'january' => ($row['D'] * $conv),
                            'febuary' => ($row['E'] * $conv),
                            'march' => ($row['F'] * $conv),
                            'april' => ($row['G'] * $conv),
                            'may' => ($row['H'] * $conv),
                            'june' => ($row['I'] * $conv),
                            'july' => ($row['J'] * $conv),
                            'august' => ($row['K'] * $conv),
                            'september' => ($row['L'] * $conv),
                            'october' => ($row['M'] * $conv),
                            'november' => ($row['N'] * $conv),
                            'december' => ($row['O'] * $conv),
                            'total' => $total,
                            'total_litres' => $total_MT,
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\down_product_vol_import_permit::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $market_segment_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Products Volumes (Import Permits) ');
            //Audit Logging
            self::log_audit_trail('Products Volumes (Import Permits) ', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Petroleum Product Volumes (Import Permit Issued) Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewProductVolumePermit(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Products Vol Import Permit', 'Viewed Data');
        $PRO_VOL_PERM = \App\down_product_vol_import_permit::where('id', $request->id)->first();

        return view('downstream.view.viewProductVolumePermit', compact('PRO_VOL_PERM'));
    }

    public function download_product_volume_permit($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\down_product_vol_import_permit::where('year', 'like', "%$txt%")
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('market_segment', function ($query) use ($txt) {
                    $query->where('market_segment_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_product_vol_import_permit::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Products Vol Import Permit', 'Downloaded Data');

        $view = 'downstream.excel.import_permit_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Products Vol Import Permit.xlsx');
    }

    public function approvePermit(Request $request)
    {
        $permit = \App\down_product_vol_import_permit::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approvePermit', compact('permit'));
    }

    public function add_product_volume_permit_vessel(Request $request)
    {
        $product_id = $request->product_id;
        $field_office_id = $request->field_office_id;
        $year = $request->year;
        $prod_vol = \App\down_product_vol_import_permit_vessel::where('product_id', $product_id)->where('field_office_id', $field_office_id)->where('year', $year)->first();
        if ($prod_vol) {
            if ($request->ajax() && $request->id == '') {
                $prod_name = $prod_vol->product->product_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$prod_name.' Product For Year '.$year.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
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
                $add_pvp = \App\down_product_vol_import_permit_vessel::updateOrCreate(['id'=> $request->id],
                [
                    'depot_name' => $request->depot_name,
                    'field_office_id' => $request->field_office_id,
                    'product_id' => $request->product_id,
                    'year' => $request->year,
                    'value' => $request->value,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $field_office_id = $request->field_office_id;
                $product_id = $request->product_id;
                if (! empty($id)) {
                    if (! empty($field_office_id)) {
                        $this->updateTempRecord($id, 'down_product_vol_import_permit_vessel', 'column_1');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'down_product_vol_import_permit_vessel', 'column_2');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_product_vol_import_permit_vessel::class, $id, 'down_product_vol_import_permit_vessel');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Products Volumes Field Office (Vessel Import Permits) ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Products Vols Vessel (Import Permits)', 'Update Record');
                } else {
                    self::log_audit_trail('Products Vols Vessel (Import Permits)', 'Add Record');
                }

                if ($request->ajax()) {
                    $pvp_details = ['field_office'=>$add_pvp->field_office->field_office_name, 'product'=>$add_pvp->product->product_name, 'year'=>$add_pvp->year, 'value'=>$add_pvp->value, 'id'=>$add_pvp->id];

                    return response()->json(['status'=>'ok', 'message'=>$pvp_details, 'info'=>'New Products Volumes Field Office (Vessel Import Permits) Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Products Volumes Field Office (Vessel Import Permits) Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editVessel(Request $request)
    {
        $PRO_VOL_PERM_VESS = \App\down_product_vol_import_permit_vessel::where('id', $request->id)->first();

        return view('downstream.modals.editVessel', compact('PRO_VOL_PERM_VESS'));
    }

    public function upload_product_volume_permit_vessel(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_field_office::class, 'field_office_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\down_product::class, 'product_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }
                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['D'], 'type' => 'down_product_vol_import_permit_vessel',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_office_id = 0;
                        } else {
                            $field_office_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_2['name'];
                        }
                    } else {
                        $field_office_id = $results_1['name'];
                        $product_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_product_vol_import_permit_vessel::updateOrCreate(['id'=> $request->id],
                        [
                            'depot_name' => $row['A'],
                            'field_office_id' => $field_office_id,
                            'product_id' => $product_id,
                            'year' => $row['D'],
                            'value' => $row['E'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\down_product_vol_import_permit_vessel::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $field_office_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Products Volumes By Vessel (Import Permits) ');
            //Audit Logging
            self::log_audit_trail('Products Volumes By Vessel (Import Permits) ', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Petroleum Product Volumes By Vessel (Import Permit Issued) Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewProductVolumePermitVessel(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Products Vol By Vessel Import Permit', 'Viewed Data');
        $PRO_VOL_PERM_VESS = \App\down_product_vol_import_permit_vessel::where('id', $request->id)->first();

        return view('downstream.view.viewProductVolumePermitVessel', compact('PRO_VOL_PERM_VESS'));
    }

    public function download_product_volume_permit_vessel($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_product_vol_import_permit_vessel::where('year', 'like', "%$txt%")
                ->orwhere('depot_name', 'like', "%$txt%")
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('field_office', function ($query) use ($txt) {
                    $query->where('field_office_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_product_vol_import_permit_vessel::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Products Vol Vessel Import Permit', 'Downloaded Data');

        $view = 'downstream.excel.import_permit_vessel_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Product Vol Vessel Permits.xlsx');
    }

    public function approvePermitVessel(Request $request)
    {
        $permit_vessel = \App\down_product_vol_import_permit_vessel::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approvePermitVessel', compact('permit_vessel'));
    }

    public function add_refinery_production(Request $request)
    {
        $product_id = $request->product_id;
        $year = $request->year;
        $ref_prod = \App\down_refinary_production::where('product_id', $product_id)->where('year', $year)->first();
        if ($ref_prod) {
            if ($request->ajax() && $request->id == '') {
                $prod_name = $ref_prod->product->product_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$prod_name.' Product For Year '.$year.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //script to convert to litres
                if ($product_id == 1) {
                    $conv = 1341;
                } elseif ($product_id == 2) {
                    $conv = 1164;
                } elseif ($product_id == 3) {
                    $conv = 1164;
                } elseif ($product_id == 4) {
                    $conv = 1232;
                } elseif ($product_id == 7) {
                    $conv = 1067;
                } elseif ($product_id == 8) {
                    $conv = 961.9992;
                } elseif ($product_id == 6) {
                    $conv = 1050;
                } elseif ($product_id == 5) {
                    $conv = 1754.389;
                }

                $total = $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december;

                $total_MT = ($total / $conv);
                //INSERTING NEW
                $add_ref_prod = \App\down_refinary_production::updateOrCreate(['id'=> $request->id],
                [
                    'market_segment_id' => $request->market_segment_id,
                    'product_id' => $request->product_id,
                    'company_id' => $request->company_id,
                    'year' => $request->year,
                    'january' => ($request->january * $conv),
                    'febuary' => ($request->febuary * $conv),
                    'march' => ($request->march * $conv),
                    'april' => ($request->april * $conv),
                    'may' => ($request->may * $conv),
                    'june' => ($request->june * $conv),
                    'july' => ($request->july * $conv),
                    'august' => ($request->august * $conv),
                    'september' => ($request->september * $conv),
                    'october' => ($request->october * $conv),
                    'november' => ($request->november * $conv),
                    'december' => ($request->december * $conv),
                    'total' => $total,
                    'total_litres' => $total_MT,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $market_segment_id = $request->market_segment_id;
                $product_id = $request->product_id;
                $company_id = $request->company_id;
                if (! empty($id)) {
                    if (! empty($market_segment_id)) {
                        $this->updateTempRecord($id, 'down_refinary_production', 'column_1');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'down_refinary_production', 'column_2');
                    }
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'down_refinary_production', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_refinary_production::class, $id, 'down_refinary_production');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Petroleum Products Importation by Market Segment ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Petroleum Products Importation by Market Segment', 'Update Record');
                } else {
                    self::log_audit_trail('Petroleum Products Importation by Market Segment', 'Add Record');
                }

                if ($request->ajax()) {
                    $ref_prod_details = ['market_segment'=>$add_ref_prod->market_segment->market_segment_name, 'product'=>$add_ref_prod->product->product_name, 'company'=>$add_ref_prod->company->company_name, 'year'=>$add_ref_prod->year, 'january'=>$add_ref_prod->january, 'febuary'=>$add_ref_prod->febuary, 'march'=>$add_ref_prod->march, 'april'=>$add_ref_prod->april, 'may'=>$add_ref_prod->may, 'june'=>$add_ref_prod->june, 'july'=>$add_ref_prod->july, 'august'=>$add_ref_prod->august, 'september'=>$add_ref_prod->september, 'october'=>$add_ref_prod->october, 'november'=>$add_ref_prod->november, 'december'=>$add_ref_prod->december, 'total'=>$add_ref_prod->total, 'total_litres'=>$add_ref_prod->total_litres, 'id'=>$add_ref_prod->id];

                    return response()->json(['status'=>'ok', 'message'=>$ref_prod_details, 'info'=>'New Petroleum Products Importation by Market Segment Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Petroleum Products Importation by Market Segment Updated Successfully');
                }
            } catch (\Exception $e) {
                return  response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
            }
        }
    }

    public function editRefineryProduction(Request $request)
    {
        $REF_PROD = \App\down_refinary_production::where('id', $request->id)->first();

        return view('downstream.modals.editRefineryProduction', compact('REF_PROD'));
    }

    public function viewRefineryProduction(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Products Import By MKT Segment', 'Viewed Data');
        $REFINERY_PROD = \App\down_refinary_production::where('id', $request->id)->first();

        return view('downstream.view.viewRefineryProduction', compact('REFINERY_PROD'));
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
                    //Script to convert product Volume To Litres
                    $product_id = $this->resolveModelId(\App\down_import_product::class, 'product_name', $row['B']);
                    if ($product_id == 1) {
                        $conv = 1341;
                    } elseif ($product_id == 2) {
                        $conv = 1164;
                    } elseif ($product_id == 3) {
                        $conv = 1164;
                    } elseif ($product_id == 4) {
                        $conv = 1232;
                    } elseif ($product_id == 7) {
                        $conv = 1067;
                    } elseif ($product_id == 8) {
                        $conv = 961.9992;
                    } elseif ($product_id == 6) {
                        $conv = 1050;
                    } elseif ($product_id == 5) {
                        $conv = 1754.389;
                    }

                    $total = $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'] + $row['P'];

                    $total_MT = ($total / $conv);

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\down_market_segment::class, 'market_segment_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['B']}%", $row['B']);
                    $results_3 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['A'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['B'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['C'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_refinary_production',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $market_segment_id = 0;
                        } else {
                            $market_segment_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_3['name'];
                        }
                    } else {
                        $market_segment_id = $results_1['name'];
                        $product_id = $results_2['name'];
                        $company_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_refinary_production::updateOrCreate(['market_segment_id'=> $this->resolveModelId(\App\down_market_segment::class, 'market_segment_name', $row['A']),
                        'product_id'=> $this->resolveModelId(\App\down_import_product::class, 'product_name', $row['B']),
                        'company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['C']), 'year'=> $row['D'], ],
                        [
                            'market_segment_id' => $market_segment_id,
                            'product_id' => $product_id,
                            'company_id' => $company_id,
                            'year' => $row['D'],
                            'january' => ($row['E'] * $conv),
                            'febuary' => ($row['F'] * $conv),
                            'march' => ($row['G'] * $conv),
                            'april' => ($row['H'] * $conv),
                            'may' => ($row['I'] * $conv),
                            'june' => ($row['J'] * $conv),
                            'july' => ($row['K'] * $conv),
                            'august' => ($row['L'] * $conv),
                            'september' => ($row['M'] * $conv),
                            'october' => ($row['N'] * $conv),
                            'november' => ($row['O'] * $conv),
                            'december' => ($row['P'] * $conv),
                            'total' => $total,
                            'total_litres' => $total_MT,
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\down_refinary_production::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $market_segment_id = '';
                    $product_id = '';
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Petroleum Products Importation by Market Segment ');
            //Audit Logging
            self::log_audit_trail('Petroleum Products Importation by Market Segment ', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Refinery Production (AGO, DPK, PMS etc.) Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_refinery_production($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_refinary_production::where('year', 'like', "%$txt%")
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('market_segment', function ($query) use ($txt) {
                    $query->where('market_segment_name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\down_refinary_production::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Products Import By MKT Segment', 'Downloaded Data');

        $view = 'downstream.excel.refinery_production_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Product Import MKT Segment.xlsx');
    }

    public function approveRefProd(Request $request)
    {
        $ref_production = \App\down_refinary_production::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveRefProd', compact('ref_production'));
    }

    public function add_refinery_production_volume(Request $request)
    {
        $product_id = $request->product_id;
        $refinery_id = $request->refinery_id;
        $year = $request->year;
        $stream_id = $request->stream_id;
        $ref_prod = \App\down_refinery_production_volumes::where('product_id', $product_id)->where('refinery_id', $refinery_id)->where('year', $year)->where('stream_id', $stream_id)->first();
        if ($ref_prod) {
            if ($request->ajax() && $request->id == '') {
                $prod_name = $ref_prod->product->product_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$prod_name.' Product For Year '.$year.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //$product_names = \App\down_refinery_production_volumes::where('product_id', $product_id)->first();     $prod_name = $product_names->product->product_name;

                    if ($product_id == 1) {
                        $conv = 1341;
                    } elseif ($product_id == 2) {
                        $conv = 1164;
                    } elseif ($product_id == 3) {
                        $conv = 1164;
                    } elseif ($product_id == 4) {
                        $conv = 1232;
                    } elseif ($product_id == 7) {
                        $conv = 1067;
                    } elseif ($product_id == 8) {
                        $conv = 961.9992;
                    } elseif ($product_id == 6) {
                        $conv = 1050;
                    } elseif ($product_id == 5) {
                        $conv = 1754.389;
                    }

                $total = $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december;

                $total_litres = ($total * $conv);
                //INSERTING NEW
                $add_ref_prod = \App\down_refinery_production_volumes::updateOrCreate(['id'=> $request->id],
                [
                    'refinery_id' => $request->refinery_id,
                    'product_id' => $request->product_id,
                    'year' => $request->year,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'total' => $total,
                    'total_litres' => $total_litres,
                    'stream_id' => $stream_id,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $refinery_id = $request->refinery_id;
                $product_id = $request->product_id;
                $stream_id = $request->stream_id;
                if (! empty($id)) {
                    if (! empty($refinery_id)) {
                        $this->updateTempRecord($id, 'down_refinery_production_volumes', 'column_1');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'down_refinery_production_volumes', 'column_2');
                    }
                    if (! empty($stream_id)) {
                        $this->updateTempRecord($id, 'down_refinery_production_volumes', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_refinery_production_volumes::class, $id, 'down_refinery_production_volumes');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Refinery Production ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Refinery Production Volumes', 'Update Record');
                } else {
                    self::log_audit_trail('Refinery Production Volumes', 'Add Record');
                }

                if ($request->ajax()) {
                    $ref_prod_vol_details = ['refinery'=>$add_ref_prod->refinery->plant_location_name, 'product'=>$add_ref_prod->product->product_name, 'year'=>$add_ref_prod->year, 'january'=>$add_ref_prod->january, 'febuary'=>$add_ref_prod->febuary, 'march'=>$add_ref_prod->march, 'april'=>$add_ref_prod->april, 'may'=>$add_ref_prod->may, 'june'=>$add_ref_prod->june, 'july'=>$add_ref_prod->july, 'august'=>$add_ref_prod->august, 'september'=>$add_ref_prod->september, 'october'=>$add_ref_prod->october, 'november'=>$add_ref_prod->november, 'december'=>$add_ref_prod->december, 'total'=>$add_ref_prod->total, 'stream'=>$add_ref_prod->stream->stream_name, 'id'=>$add_ref_prod->id];

                    return response()->json(['status'=>'ok', 'message'=>$ref_prod_vol_details, 'info'=>'New Refinery Production Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Refinery Production Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editRefineryVolume(Request $request)
    {
        $REF_VOL = \App\down_refinery_production_volumes::where('id', $request->id)->first();

        return view('downstream.modals.editRefineryVolume', compact('REF_VOL'));
    }

    public function upload_refinery_production_volume(Request $request)
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
                    $product_id = $this->resolveModelId(\App\down_import_product::class, 'product_name', $row['B']);
                    if ($product_id == 1) {
                        $conv = 1341;
                    } elseif ($product_id == 2) {
                        $conv = 1164;
                    } elseif ($product_id == 3) {
                        $conv = 1164;
                    } elseif ($product_id == 4) {
                        $conv = 1232;
                    } elseif ($product_id == 7) {
                        $conv = 1067;
                    } elseif ($product_id == 8) {
                        $conv = 961.9992;
                    } elseif ($product_id == 6) {
                        $conv = 1050;
                    } elseif ($product_id == 5) {
                        $conv = 1754.389;
                    }

                    $total = $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'];

                    $total_litres = ($total * $conv);

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\down_plant_location::class, 'plant_location_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['B']}%", $row['B']);
                    // $results_3 = $this->resolveMasterData('\App\Stream', 'stream_name', "%{$row['P']}%", $row['P']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['A'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['B'];
                        } else {
                            $column_2 = '';
                        }
                        // if($results_3['stage_id'] == 3){ $column_3 = $row['P']; }else{ $column_3 = ''; }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['C'], 'type' => 'down_refinery_production_volumes',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $refinery_id = 0;
                        } else {
                            $refinery_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_2['name'];
                        }
                        // if($results_3['stage_id'] == 3){ $stream_id = 0; }else{$stream_id = $results_3['name']; }
                    } else {
                        $refinery_id = $results_1['name'];
                        $product_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_refinery_production_volumes::updateOrCreate(['refinery_id'=> $this->resolveModelId(\App\down_plant_location::class, 'plant_location_name', $row['A']),
                        'product_id'=> $this->resolveModelId(\App\down_import_product::class, 'product_name', $row['B']),
                        // 'stream_id'=> $this->resolveModelId('\App\Stream', 'stream_name', $row['P']),
                        'year'=> $row['C'], ],
                        [
                            'refinery_id' => $refinery_id,
                            'product_id' => $product_id,
                            'year' => $row['C'],
                            'january' => $row['D'],
                            'febuary' => $row['E'],
                            'march' => $row['F'],
                            'april' => $row['G'],
                            'may' => $row['H'],
                            'june' => $row['I'],
                            'july' => $row['J'],
                            'august' => $row['K'],
                            'september' => $row['L'],
                            'october' => $row['M'],
                            'november' => $row['N'],
                            'december' => $row['O'],
                            'total' => $total,
                            'total_litres' => $total_litres,
                            // 'stream_id' => $row['P'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\down_refinery_production_volumes::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $refinery_id = '';
                    $product_id = '';  //$stream_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Refinery Production ');
            //Audit Logging
            self::log_audit_trail('Refinery Production Volumes', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Refinery Production Volumes. Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRefineryVolume(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Refinery Production Vol', 'Viewed Data');
        $REF_VOLUME = \App\down_refinery_production_volumes::where('id', $request->id)->first();

        return view('downstream.view.viewRefineryVolume', compact('REF_VOLUME'));
    }

    public function download_refinery_production_volume($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_refinery_production_volumes::where('year', 'like', "%$txt%")
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->orwhereHas('refinery', function ($query) use ($txt) {
                    $query->where('plant_location_name', 'like', "%$txt%");
                })
                ->orwhereHas('stream', function ($query) use ($txt) {
                    $query->where('stream_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\down_refinery_production_volumes::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Refinery Production Vol', 'Downloaded Data');

        $view = 'downstream.excel.refinery_production_vol_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Refinery Production Volumes.xlsx');
    }

    public function approve_ref_volume(Request $request)
    {
        $ref_prod_vol = \App\down_refinery_production_volumes::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approve_ref_volume', compact('ref_prod_vol'));
    }

    public function add_prod_ave_price_range(Request $request)
    {
        $production_type = $request->production_type;
        $year = $request->year;
        $month = $request->month;
        $prod_type = \App\down_ave_consumer_price_range::where('production_type', $production_type)->where('year', $year)->first();
        if ($prod_type) {
            if ($request->ajax() && $request->id == '') {
                if ($prod_type->production_type == 1) {
                    $Production_Type = 'Major';
                } elseif ($prod_type->production_type == 2) {
                    $Production_Type = 'Independent Marketers';
                } elseif ($prod_type->production_type == 4 || $prod_type->production_type == 5) {
                    $Production_Type = 'NNPC';
                }

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$Production_Type.' Market Segment For Year '.$year.', '.$month.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW Products Average Consumer Price Range
                $add_ave_pr = \App\down_ave_consumer_price_range::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'production_type' => $request->production_type,
                    'pms' => $request->pms,
                    'pms_to' => $request->pms_to,
                    'ago' => $request->ago,
                    'ago_to' => $request->ago_to,
                    'dpk' => $request->dpk,
                    'dpk_to' => $request->dpk_to,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $production_type = $request->production_type;
                if (! empty($id)) {
                    if (! empty($production_type)) {
                        $this->updateTempRecord($id, 'down_ave_consumer_price_range', 'column_1');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_ave_consumer_price_range::class, $id, 'down_ave_consumer_price_range');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Products Average Consumer Price Range ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Products Average Consumer Price Range', 'Update Record');
                } else {
                    self::log_audit_trail('Products Average Consumer Price Range', 'Add Record');
                }

                if ($request->ajax()) {
                    $ave_price_details = ['year'=>$add_ave_pr->year, 'month'=>$add_ave_pr->month, 'production_type'=>$add_ave_pr->production_types->market_segment_name, 'pms'=>$add_ave_pr->pms, 'pms_to'=>$add_ave_pr->pms_to, 'ago'=>$add_ave_pr->ago, 'ago_to'=>$add_ave_pr->ago_to, 'dpk'=>$add_ave_pr->dpk, 'dpk_to'=>$add_ave_pr->dpk_to, 'created_by'=>$add_ave_pr->created_by, 'id'=>$add_ave_pr->id];

                    return response()->json(['status'=>'ok', 'message'=>$ave_price_details, 'info'=>'New Products Average Consumer Price Range Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Products Average Consumer Price Range Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editAvePriceRange(Request $request)
    {
        $APR_ = \App\down_ave_consumer_price_range::where('id', $request->id)->first();

        $one_seg = \App\down_market_segment::where('id', $APR_->production_type)->first();
        $all_seg = \App\down_market_segment::where('id', '>', 1)->where('id', '<', 6)->orderBy('market_segment_name', 'asc')->get();

        return view('downstream.modals.editAvePriceRange', compact('APR_', 'one_seg', 'all_seg'));
    }

    public function upload_prod_ave_price_range(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_market_segment::class, 'market_segment_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_ave_consumer_price_range', 'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $production_type = 0;
                        } else {
                            $production_type = $results_1['name'];
                        }
                    } else {
                        $production_type = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_ave_consumer_price_range::updateOrCreate(['year' => $row['A'], 'month' => $row['B'],
                        'production_type' => $this->resolveModelId(\App\down_market_segment::class, 'market_segment_name', $row['C']), ],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'production_type' => $production_type,
                            'pms' => $row['D'],
                            'pms_to' => $row['E'],
                            'ago' => $row['F'],
                            'ago_to' => $row['G'],
                            'dpk' => $row['H'],
                            'dpk_to' => $row['I'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\down_ave_consumer_price_range::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $production_type = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Products Average Consumer Price Range ');
            //Audit Logging
            self::log_audit_trail('Products Average Consumer Price Range', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Products Average Consumer Price Range Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewAvePriceRange(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Product Ave Price Range', 'Viewed Data');
        $AVE_PRICE = \App\down_ave_consumer_price_range::where('id', $request->id)->first();
        $one_seg = \App\down_market_segment::where('id', $AVE_PRICE->production_type)->first();

        return view('downstream.view.viewAvePriceRange', compact('AVE_PRICE', 'one_seg'));
    }

    public function download_prod_ave_price_range($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_ave_consumer_price_range::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhere('pms', 'like', "%$txt%")->orwhere('pms_to', 'like', "%$txt%")
                ->orwhere('ago', 'like', "%$txt%")->orwhere('ago_to', 'like', "%$txt%")
                ->orwhere('dpk', 'like', "%$txt%")->orwhere('dpk_to', 'like', "%$txt%")
                ->orwhereHas('production_type', function ($query) use ($txt) {
                    $query->where('market_segment_name', 'like', "%$txt%");
                })
                ->orwhereHas('refinery', function ($query) use ($txt) {
                    $query->where('plant_location_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\down_ave_consumer_price_range::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Product Ave Price Range', 'Downloaded Data');

        $view = 'downstream.excel.ave_price_range_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Product Ave Price Range.xlsx');
    }

    public function approvePriceRange(Request $request)
    {
        $price_range = \App\down_ave_consumer_price_range::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approvePriceRange', compact('price_range'));
    }

    public function add_retail_outlet(Request $request)
    {
        $state_id = $request->state_id;
        $year = $request->year;
        $market_segment_id = $request->market_segment_id;
        $out_cap = \App\down_retail_outlet_summary::where('state_id', $state_id)->where('year', $year)->where('market_segment_id', $market_segment_id)->first();
        if ($out_cap) {
            if ($request->ajax() && $request->id == '') {
                $out_cap_state = $out_cap->state->state_name;
                $cap_market_segment = $out_cap->market_segment->market_segment_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$out_cap_state.' State,  Year '.$year.' Market Segment '.$cap_market_segment.'. Please Check Existing Records.']);
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

                $add_ret_out = \App\down_retail_outlet_summary::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'state_id' => $request->state_id,
                    'market_segment_id' => $request->market_segment_id,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'total' => $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $state_id = $request->state_id;
                $market_segment_id = $request->market_segment_id;
                if (! empty($id)) {
                    if (! empty($state_id)) {
                        $this->updateTempRecord($id, 'down_retail_outlet_summary', 'column_1');
                    }
                    if (! empty($market_segment_id)) {
                        $this->updateTempRecord($id, 'down_retail_outlet_summary', 'column_2');
                    }
                    //clear temp record
                    $this->clearTempRecord(\App\down_retail_outlet_summary::class, $id, 'down_retail_outlet_summary');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Retail Outlet Count ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Retail Outlet Count', 'Update Record');
                } else {
                    self::log_audit_trail('Retail Outlet Count', 'Add Record');
                }

                if ($request->ajax()) {
                    $ret_out_details = ['year'=>$add_ret_out->year, 'state'=>$add_ret_out->state->state_name, 'market_segment'=>$add_ret_out->market_segment->market_segment_name, 'january'=>$add_ret_out->january, 'febuary'=>$add_ret_out->febuary, 'march'=>$add_ret_out->march, 'april'=>$add_ret_out->april, 'may'=>$add_ret_out->may, 'june'=>$add_ret_out->june, 'july'=>$add_ret_out->july, 'august'=>$add_ret_out->august, 'september'=>$add_ret_out->september, 'october'=>$add_ret_out->october, 'november'=>$add_ret_out->november, 'december'=>$add_ret_out->december, 'total'=>$add_ret_out->total, 'id'=>$add_ret_out->id];

                    return response()->json(['status'=>'ok', 'message'=>$ret_out_details, 'info'=>'New Retail Outlet Count Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Retail Outlet Count Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editRetailOutlet(Request $request)
    {
        $RET_OUT = \App\down_retail_outlet_summary::where('id', $request->id)->first();
        $one_sta = \App\down_outlet_states::where('id', $RET_OUT->state_id)->first();
        $all_sta = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        $one_mak = \App\down_market_segment::where('id', $RET_OUT->market_segment_id)->first();
        $all_mak = \App\down_market_segment::orderBy('market_segment_name', 'asc')->get();

        return view('downstream.modals.editRetailOutlet', compact('RET_OUT', 'one_sta', 'all_sta', 'one_mak', 'all_mak'));
    }

    public function upload_retail_outlet(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\down_market_segment::class, 'market_segment_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_retail_outlet_summary',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $market_segment_id = 0;
                        } else {
                            $market_segment_id = $results_2['name'];
                        }
                    } else {
                        $state_id = $results_1['name'];
                        $market_segment_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_retail_outlet_summary::updateOrCreate(['year'=> $row['A'],
                        'state_id'=> $this->resolveModelId(\App\down_outlet_states::class, 'state_name', $row['B']),
                        'market_segment_id'=> $this->resolveModelId(\App\down_market_segment::class, 'market_segment_name', $row['C']), ],
                        [
                            'year' => $row['A'],
                            'state_id' => $state_id,
                            'market_segment_id' => $market_segment_id,
                            'january' => $row['D'],
                            'febuary' => $row['E'],
                            'march' => $row['F'],
                            'april' => $row['G'],
                            'may' => $row['H'],
                            'june' => $row['I'],
                            'july' => $row['J'],
                            'august' => $row['K'],
                            'september' => $row['L'],
                            'october' => $row['M'],
                            'november' => $row['N'],
                            'december' => $row['O'],
                            'total' => $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\down_retail_outlet_summary::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $state_id = '';
                    $market_segment_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Retail Outlet Count ');
            //Audit Logging
            self::log_audit_trail('Retail Outlet Count', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Retail Outlet Count Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRetailOutlet(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Retail Outlet Count', 'Viewed Data');
        $RET_OUTLET = \App\down_retail_outlet_summary::where('id', $request->id)->first();

        return view('downstream.view.viewRetailOutlet', compact('RET_OUTLET'));
    }

    public function download_retail_outlet($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_retail_outlet_summary::where('year', 'like', "%$txt%")
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })
                ->orwhereHas('market_segment', function ($query) use ($txt) {
                    $query->where('market_segment_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\down_retail_outlet_summary::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Retail Outlet Count', 'Downloaded Data');

        $view = 'downstream.excel.retail_outlet_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Retail Outlet Count.xlsx');
    }

    public function approveOutlet(Request $request)
    {
        $outlet = \App\down_retail_outlet_summary::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveOutlet', compact('outlet'));
    }

    public function add_retail_outlet_capacity(Request $request)
    {
        $state_id = $request->state_id;
        $year = $request->year;
        $market_segment_id = $request->market_segment_id;
        $out_cap = \App\down_outlet_storage_capacity::where('state_id', $state_id)->where('year', $year)->where('market_segment_id', $market_segment_id)->first();
        if ($out_cap) {
            if ($request->ajax() && $request->id == '') {
                $out_cap_state = $out_cap->state->state_name;
                $cap_market_segment = $out_cap->market_segment->market_segment_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$out_cap_state.' State,  Year '.$year.' Market Segment '.$cap_market_segment.'. Please Check Existing Records.']);
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
                $add_out_cap = \App\down_outlet_storage_capacity::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'state_id' => $request->state_id,
                    'market_segment_id' => $request->market_segment_id,
                    'product_id' => $request->product_id,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'total' => $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $state_id = $request->state_id;
                $market_segment_id = $request->market_segment_id;
                $product_id = $request->product_id;
                if (! empty($id)) {
                    if (! empty($state_id)) {
                        $this->updateTempRecord($id, 'down_outlet_storage_capacity', 'column_1');
                    }
                    if (! empty($market_segment_id)) {
                        $this->updateTempRecord($id, 'down_outlet_storage_capacity', 'column_2');
                    }
                    if (! empty($product_id)) {
                        $this->updateTempRecord($id, 'down_outlet_storage_capacity', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\down_outlet_storage_capacity::class, $id, 'down_outlet_storage_capacity');
                }

                //send mail
                //self::send_all_mail(" DOWNSTREAM - Retail Outlet Storage Capacity ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Retail Outlet Storage Capacity', 'Update Record');
                } else {
                    self::log_audit_trail('Retail Outlet Storage Capacity', 'Add Record');
                }

                if ($request->ajax()) {
                    $out_cap_details = ['year'=>$add_out_cap->year, 'state'=>$add_out_cap->state->state_name, 'market_segment'=>$add_out_cap->market_segment->market_segment_name, 'product'=>$add_out_cap->product->product_name, 'january'=>$add_out_cap->january, 'febuary'=>$add_out_cap->febuary, 'march'=>$add_out_cap->march, 'april'=>$add_out_cap->april, 'may'=>$add_out_cap->may, 'june'=>$add_out_cap->june, 'july'=>$add_out_cap->july, 'august'=>$add_out_cap->august, 'september'=>$add_out_cap->september, 'october'=>$add_out_cap->october, 'november'=>$add_out_cap->november, 'december'=>$add_out_cap->december, 'total'=>$add_out_cap->total, 'id'=>$add_out_cap->id];

                    return response()->json(['status'=>'ok', 'message'=>$out_cap_details, 'info'=>'New Retail Outlet Storage Capacity Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Retail Outlet Storage Capacity Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editOutletCapacity(Request $request)
    {
        $OUT_CAP = \App\down_outlet_storage_capacity::where('id', $request->id)->first();

        return view('downstream.modals.editOutletCapacity', compact('OUT_CAP'));
    }

    public function upload_retail_outlet_capacity(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_outlet_states::class, 'state_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\down_market_segment::class, 'market_segment_name', "%{$row['C']}%", $row['C']);
                    $results_3 = $this->resolveMasterData(\App\down_import_product::class, 'product_name', "%{$row['D']}%", $row['D']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['D'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_outlet_storage_capacity',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $market_segment_id = 0;
                        } else {
                            $market_segment_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $product_id = 0;
                        } else {
                            $product_id = $results_3['name'];
                        }
                    } else {
                        $state_id = $results_1['name'];
                        $market_segment_id = $results_2['name'];
                        $product_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_outlet_storage_capacity::updateOrCreate(['year'=> $row['A'],
                        'state_id'=> $this->resolveModelId(\App\down_outlet_states::class, 'state_name', $row['B']),
                        'market_segment_id'=> $this->resolveModelId(\App\down_market_segment::class, 'market_segment_name', $row['C']),
                        'product_id'=> $this->resolveModelId(\App\down_product::class, 'product_name', $row['D']), ],
                        [
                            'year' => $row['A'],
                            'state_id' => $state_id,
                            'market_segment_id' => $market_segment_id,
                            'product_id' => $product_id,
                            'january' => $row['E'],
                            'febuary' => $row['F'],
                            'march' => $row['G'],
                            'april' => $row['H'],
                            'may' => $row['I'],
                            'june' => $row['J'],
                            'july' => $row['K'],
                            'august' => $row['L'],
                            'september' => $row['M'],
                            'october' => $row['N'],
                            'november' => $row['O'],
                            'december' => $row['P'],
                            'total' => $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'] + $row['P'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\down_outlet_storage_capacity::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $state_id = '';
                    $market_segment_id = '';
                    $product_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Retail Outlet Storage Capacity ');
            //Audit Logging
            self::log_audit_trail('Retail Outlet Storage Capacity', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Retail Outlet Storage Capacity Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewOutletCapacity(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Retail Outlet Capacity', 'Viewed Data');
        $OUT_CAPACITY = \App\down_outlet_storage_capacity::where('id', $request->id)->first();

        return view('downstream.view.viewOutletCapacity', compact('OUT_CAPACITY'));
    }

    public function download_retail_outlet_capacity($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_outlet_storage_capacity::where('year', 'like', "%$txt%")
                ->orwhereHas('state', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })
                ->orwhereHas('market_segment', function ($query) use ($txt) {
                    $query->where('market_segment_name', 'like', "%$txt%");
                })
                ->orwhereHas('product', function ($query) use ($txt) {
                    $query->where('product_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\down_outlet_storage_capacity::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Retail Outlet Capacity', 'Downloaded Data');

        $view = 'downstream.excel.retail_capacity_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Retail Storage Capacity.xlsx');
    }

    public function approveCapacity(Request $request)
    {
        $capacity = \App\down_outlet_storage_capacity::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveCapacity', compact('capacity'));
    }

    public function add_license_marketer_storage(Request $request)
    {
        try {
            //INSERTING NEW

            $add_marketer = \App\down_licensed_oil_makerters::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'market_category_id' => $request->market_category_id,
                'company_id' => $request->company_id,
                'location_id' => $request->location_id,
                'storage_capacity' => $request->storage_capacity,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);


            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $market_category_id = $request->market_category_id;
            $company_id = $request->company_id;
            $location_id = $request->location_id;
            if (! empty($id)) {
                if (! empty($market_category_id)) {
                    $this->updateTempRecord($id, 'down_licensed_oil_makerters', 'column_1');
                }
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'down_licensed_oil_makerters', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_licensed_oil_makerters::class, $id, 'down_licensed_oil_makerters');
            }

            //send mail
            //self::send_all_mail(" DOWNSTREAM - Lubricant blending plant ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Lubricant blending plant', 'Update Record');
            } else {
                self::log_audit_trail('Lubricant blending plant', 'Add Record');
            }

            if ($request->ajax()) {
                $marketer_details = ['year'=>$add_marketer->year, 'market_category'=>$add_marketer->market_category->market_segment_name, 'company'=>$add_marketer->company->company_name, 'location'=>$add_marketer->location_id, 'storage_capacity'=>$add_marketer->storage_capacity, 'id'=>$add_marketer->id];
                return response()->json(['status'=>'ok', 'message'=>$marketer_details, 'info'=>'New Lubricant blending plant Added Successfully.']);
            } else {
                return redirect()->route('downstream.index')->with('info', 'Lubricant blending plant Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editLicenseMarketer(Request $request)
    {
        $LIC_MAK = \App\down_licensed_oil_makerters::where('id', $request->id)->first();

        return view('downstream.modals.editLicenseMarketer', compact('LIC_MAK'));
    }

    public function upload_license_marketer_storage(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_market_segment::class, 'market_segment_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['C'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'down_licensed_oil_makerters',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $market_category_id = 0;
                        } else {
                            $market_category_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_2['name'];
                        }
                    } else {
                        $market_category_id = $results_1['name'];
                        $company_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_licensed_oil_makerters::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'market_category_id' => $market_category_id,
                            'company_id' => $company_id,
                            'location_id' => $row['D'],
                            'storage_capacity' => $row['E'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\down_licensed_oil_makerters::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $market_category_id = '';
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail(' DOWNSTREAM - Lubricant blending plant ');
            //Audit Logging
            self::log_audit_trail('Lubricant blending plant', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Lubricant blending plant Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewLicenseMarketer(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Lubricant Blending Plants', 'Viewed Data');
        $L_MARKETERS = \App\down_licensed_oil_makerters::where('id', $request->id)->first();

        return view('downstream.view.viewLicenseMarketer', compact('L_MARKETERS'));
    }

    public function download_license_marketer_storage($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_licensed_oil_makerters::where('year', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('market_category', function ($query) use ($txt) {
                    $query->where('market_segment_name', 'like', "%$txt%");
                })
                ->orwhereHas('location', function ($query) use ($txt) {
                    $query->where('location_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\down_licensed_oil_makerters::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Lubricant Blending Plants', 'Downloaded Data');

        $view = 'downstream.excel.licensed_marketers_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Lubricant Blending Plant.xlsx');
    }

    public function approveMarketer(Request $request)
    {
        $marketer = \App\down_licensed_oil_makerters::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveMarketer', compact('marketer'));
    }

    public function addAvePriceCrude(Request $request)
    {
        $stream_id = $request->stream_id;
        $year = $request->year;
        $ave_pri = \App\up_ave_price_crude_stream::where('stream_id', $stream_id)->where('year', $year)->first();
        if ($ave_pri) {
            if ($request->ajax() && $request->id == '') {
                $stream = $ave_pri->stream->stream_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$stream.', Year '.$year.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW Average Price of Nigeria Crude Streams
                $add_ave = \App\up_ave_price_crude_stream::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'stream_id' => $request->stream_id,
                    'january' => $request->january,
                    'febuary' => $request->febuary,
                    'march' => $request->march,
                    'april' => $request->april,
                    'may' => $request->may,
                    'june' => $request->june,
                    'july' => $request->july,
                    'august' => $request->august,
                    'september' => $request->september,
                    'october' => $request->october,
                    'november' => $request->november,
                    'december' => $request->december,
                    'stream_total' => $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $stream_id = $request->stream_id;
                if (! empty($id)) {
                    if (! empty($stream_id)) {
                        $this->updateTempRecord($id, 'up_ave_price_crude_stream', 'column_1');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\up_ave_price_crude_stream::class, $id, 'up_ave_price_crude_stream');
                }

                //send mail
                //self::send_all_mail("DOWNSTREAM - Average Price of Nigeria Crude Streams ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Crude Streams Average Price', 'Update Record');
                } else {
                    self::log_audit_trail('Crude Streams Average Price', 'Add Record');
                }

                if ($request->ajax()) {
                    $ave_price_details = ['year'=>$add_ave->year, 'stream'=>$add_ave->stream->stream_name, 'january'=>$add_ave->january, 'febuary'=>$add_ave->febuary, 'march'=>$add_ave->march, 'april'=>$add_ave->april, 'may'=>$add_ave->may, 'june'=>$add_ave->june, 'july'=>$add_ave->july, 'august'=>$add_ave->august, 'september'=>$add_ave->september, 'october'=>$add_ave->october, 'november'=>$add_ave->november, 'december'=>$add_ave->december, 'id'=>$add_ave->id];

                    return response()->json(['status'=>'ok', 'message'=>$ave_price_details, 'info'=>'New Average Price of Nigeria Crude Streams Added Successfully.']);
                } else {
                    return redirect()->route('downstream.index')->with('info', 'Average Price of Nigeria Crude Streams Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editAveCrudePrice(Request $request)
    {
        $AVE_PRI_ = \App\up_ave_price_crude_stream::where('id', $request->id)->first();

        return view('downstream.modals.editAveCrudePrice', compact('AVE_PRI_'));
    }

    public function uploadAveCrudePrice(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\Stream::class, 'stream_name', "%{$row['B']}%", $row['B']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['E'], 'type' => 'up_ave_price_crude_stream', 'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $stream_id = 0;
                        } else {
                            $stream_id = $results_1['name'];
                        }
                    } else {
                        $stream_id = $results_1['name'];
                    }

                    //INSERTING NEW
                    $add_ = \App\up_ave_price_crude_stream::updateOrCreate(['year'=> $row['A'],
                        'stream_id'=> $this->resolveModelId(\App\Stream::class, 'stream_name', $row['B']), ],
                        [
                            'year' => $row['A'],
                            'stream_id' => $stream_id,
                            'january' => $row['C'],
                            'febuary' => $row['D'],
                            'march' => $row['E'],
                            'april' => $row['F'],
                            'may' => $row['G'],
                            'june' => $row['H'],
                            'july' => $row['I'],
                            'august' => $row['J'],
                            'september' => $row['K'],
                            'october' => $row['L'],
                            'november' => $row['M'],
                            'december' => $row['N'],
                            'stream_total' => $row['C'] + $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\up_ave_price_crude_stream::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $stream_id = '';
                }
            }

            //send mail
            self::send_all_mail('DOWNSTREAM - Average Price of Nigeria Crude Streams ');
            //Audit Logging
            self::log_audit_trail('Crude Stream Average Price', 'Data Bulk Upload');

            return redirect()->route('downstream.index')->with('info', 'Average Price of Nigeria Crude Streams Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewAveCrudePrice(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Ave Crude Pricing', 'Viewed Data');
        $AVE_PRICE = \App\up_ave_price_crude_stream::where('id', $request->id)->first();

        return view('downstream.view.viewAveCrudePrice', compact('AVE_PRICE'));
    }

    public function download_ave_price_crude($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_ave_price_crude_stream::where('year', 'like', "%$txt%")
                ->orwhereHas('stream', function ($query) use ($txt) {
                    $query->where('stream_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\up_ave_price_crude_stream::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Ave Crude Pricing', 'Downloaded Data');

        $view = 'downstream.excel.ave_crude_price_excel';

        return \Excel::download(new \App\Imports\downstream\ImportDownstreamData($data, $view), 'Average Crude Pricing.xlsx');
    }

    public function approveAvePrice(Request $request)
    {
        $ave_prices = \App\up_ave_price_crude_stream::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('downstream.approve.approveAvePrice', compact('ave_prices'));
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
            self::log_audit_trail('Downstream Data', 'Data Deleted');
        } catch (\Exception $e) {
            // return response()->json(['status'=>'error', 'message'=>'Sorry, An Error Occurred .' .$e->getMessage()]);
            return  redirect()->route('downstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }
}
