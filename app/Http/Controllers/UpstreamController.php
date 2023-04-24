<?php

namespace App\Http\Controllers;

use App\Notifications\emailNOGIARManager;
use Illuminate\Support\Facades\Validator;

use App\Traits\ExcelExport;
use App\Traits\Micellenous;
use Carbon\Carbon;
use DateTime;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UpstreamController extends Controller
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
        $users = \App\EmailList::where('division', 'UPSTREAM')->get();
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
        //\Auth::user()->notify(new emailNOGIARManager( $message, $sender, $name));
    }

    //MIDSTREAM EMAIL
    public function send_all_mail_gas($upload_name)
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
        //\Auth::user()->notify(new emailNOGIARManager( $message, $sender, $name));
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

    //function for sending approved email    notifyCustodianByEmail("UPSTREAM - ".$name." ", 13);
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
            'section' => 'Upstream',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $basin = \App\Basin::orderBy('basin_name', 'asc')->get();
        $company_cp = $company_sd = $company_rig = $company_wt = $company_wc = $company_wct = $company_ty = $companies = $company_mf = $companie = $company_dps = $company_oil = $company_ppp = $company_w = $company_fdp = $company_fsum = $company_def = $company_oils = $company_con = $company_gas = $company_depl = \App\company::orderBy('company_name', 'asc')->get();
        $field_cp = $field_sd = $field_wt = $field_wc = $field_wct = $fields = $field_com = $field_work = $field_plug = $field = $field_mf = $field_gas = $marginal_fields = $field_oil = $field_fdp = $field_gfdp = $field_dg = $field_gic = \App\field::orderBy('field_name', 'asc')->get();
        $contract_cp = $contract_wct = $contracts = $contract_oil = $contract_con = $contract_fsum = $contract_def = $contract_rate = $contract_depl = $contract_dri = \App\contract::orderBy('contract_name', 'asc')->get();
        $contract = $contracts = \App\contract::where('contract_name', '<>', 'Marginal')->orderBy('contract_name', 'asc')->get();
        $terrain_cp = $terrain_sd = $terrain = $terrain_oap = $terrain_aop = $terrain_oil = $well_terrain = $terrain_rig = $terrain_dg = $terrain_roil = $terrain_con = \App\terrain::orderBy('terrain_name', 'asc')->get();
        $terrain_opl = $terrain_oml = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();
        $statuses = \App\status_category::get();
        $rig_type = \App\RigType::orderBy('rig_type_name', 'asc')->get();
        $seismic_typed = \App\SeismicType::orderBy('seismic_type_name', 'asc')->get();
        $concessions = $concession = \App\concession::orderBy('concession_name', 'asc')->get();
        $facilities = $facility_dg = $facility_wk = \App\facility::orderBy('facility_name', 'asc')->get();
        $facility_types = \App\facility_type::orderBy('facility_type_name', 'asc')->where('type_id', '1')->get();
        $locations = $location_ppp = \App\location::orderBy('location_name', 'asc')->get();
        $status_oil = \App\gas_status::orderBy('status_name', 'asc')->where('id', '>=', '2')->where('id', '<=', '4')->get();
        $well_class = \App\well_class::orderBy('class_name', 'asc')->get();
        $well_act = \App\up_well_activities::where('class_id', '5')->orderBy('id', 'asc')->get();
        $well_type = \App\well_type::orderBy('type_name', 'asc')->get();
        $lic_status = \App\up_license_status::where('id', '<>', '2')->orderBy('license_status_name', 'asc')->get();

        $area_of_surveys = \App\area_of_survey::orderBy('area_of_survey_name', 'asc')->get();
        $type_of_surveys = \App\type_of_survey::orderBy('type_of_survey_name', 'asc')->get();

        $geophysical = \App\up_geophysical::orderBy('geophysical_name', 'asc')->get();
        $geotechnical = \App\up_geotechnical::orderBy('geotechnical_name', 'asc')->get();

        return view('upstream.index', compact('basin', 'company_cp', 'field_cp', 'contract_cp', 'terrain_rig', 'statuses', 'company_sd', 'company_rig', 'field_sd', 'company_wt', 'company_w', 'field_wt', 'company_wc', 'field_wc', 'company_wct', 'company_ty', 'field_wct', 'contract_wct', 'terrain_sd', 'rig_type', 'fields', 'seismic_typed', 'field_com', 'field_work', 'field_plug', 'companies', 'company_mf', 'companie', 'company_dps', 'concessions', 'concession', 'contracts', 'contract', 'terrain_opl', 'terrain_oml', 'terrain', 'terrain_oap', 'terrain_aop', 'field', 'field_mf', 'company_oil', 'facilities', 'facility_types', 'locations', 'location_ppp', 'status_oil', 'terrain_oil', 'company_ppp', 'field_gas', 'well_terrain', 'well_class', 'well_act', 'well_type', 'marginal_fields', 'terrain_cp', 'lic_status', 'field_oil', 'company_fdp', 'field_fdp', 'field_gfdp', 'field_dg', 'field_gic', 'terrain_dg', 'facility_dg', 'facility_wk', 'area_of_surveys', 'type_of_surveys', 'company_dps', 'contract_oil', 'terrain_roil', 'contract_con', 'terrain_con', 'company_fsum', 'contract_fsum', 'company_def', 'contract_def', 'contract_rate', 'contract_depl', 'geophysical', 'geotechnical', 'company_oils', 'company_con', 'company_gas', 'company_depl', 'contract_dri'));
    }

    //search for download
    public function downloadSearchData(Request $request)
    {
        // Session::put('st', $request->search_text);
        session()->put('st', $request->search_text);
        session()->save();
    }

    // SET APPROVED STAGE ID FOR ONE RECORD
    public function setStageId(Request $request)
    {
        try {
            $model_name = "";
            if($request->model_name == "App\\es_pipeline"){
            $model_name = $request->model_name;
                $model_name = "App\\es_pipeline_project";
            }else{
                $model_name = $request->model_name;
            }

            $stage_id = $request->stage_id;

            if($request->model_name == "App\\bala_multiclient_project_status"){
                $data = [
                    'stage_id' => $stage_id,   'approved_by' => \Auth::user()->id,   'approved_at' => date('Y-m-d h:i:s'),
                ];
            }else{
                $data = [
                    'stage_id' => $stage_id,   'approve_by' => \Auth::user()->id,   'approve_at' => date('Y-m-d h:i:s'),
                ];
            }


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
                return redirect()->route('upstream.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    // SEND NOTIFICATION MAIL TO CUSTODIAN ABOUT APPROVED RECORD
    public function notifyCustodian(Request $request)
    {
        try {
            $model_name = "";
            if($request->model_name == "App\\es_pipeline"){
            $model_name = $request->model_name;
                $model_name = "App\\es_pipeline_project";
            }else{
                $model_name = $request->model_name;
            }
            $name = $request->name;
            //SENDING APPROVED EMAIL NOTIFICATION
            self::notifyCustodianByEmail(' '.$name.' ', $model_name);
            //Audit Logging
            self::log_audit_trail($name, 'Approved Data');

            if ($request->ajax()) {
                return response()->json(['status'=>'ok']);
            } else {
                return redirect()->route('upstream.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        switch ($request->type) {
            case 'add_bala_opl':
                return $this->add_bala_opl($request);
            break;

            case 'upload_bala_opl':
                return $this->upload_bala_opl($request);
            break;

            case 'add_bala_oml':
                return $this->add_bala_oml($request);
            break;

            case 'upload_bala_oml':
                return $this->upload_bala_oml($request);
            break;

            case 'add_marginal_field':
                return $this->add_marginal_field($request);
            break;

            case 'upload_marginal_field':
                return $this->upload_marginal_field($request);
            break;

            case 'add_data_project_status':
                return $this->add_data_project_status($request);
            break;

            case 'upload_data_project_status':
                return $this->upload_data_project_status($request);
            break;

            case 'add_open_acreage':
                return $this->add_open_acreage($request);
            break;

            case 'upload_open_acreage':
                return $this->upload_open_acreage($request);
            break;

            case 'add_reserve':
                return $this->add_reserve($request);
            break;

            case 'upload_reserve':
                return $this->upload_reserve($request);
            break;

            case 'add_reserve_oil':
                return $this->add_reserve_oil($request);
            break;

            case 'upload_reserve_oil':
                return $this->upload_reserve_oil($request);
            break;

            case 'add_reserve_gas':
                return $this->add_reserve_gas($request);
            break;

            case 'upload_reserve_gas':
                return $this->upload_reserve_gas($request);
            break;

            case 'add_crude_production':
                return $this->add_crude_production($request);
            break;

            case 'upload_crude_production':
                return $this->upload_crude_production($request);
            break;

            case 'add_production_deferment':
                return $this->add_production_deferment($request);
            break;

            case 'upload_production_deferment':
                return $this->upload_production_deferment($request);
            break;

            case 'add_seismic_data':
                return $this->add_seismic_data($request);
            break;

            case 'upload_seismic_data':
                return $this->upload_seismic_data($request);
            break;

            case 'add_rig_disposition':
                return $this->add_rig_disposition($request);
            break;

            case 'upload_rig_disposition':
                return $this->upload_rig_disposition($request);
            break;

            case 'add_well_activities':
                return $this->add_well_activities($request);
            break;

            case 'upload_well_activities':
                return $this->upload_well_activities($request);
            break;

            case 'add_drilling_gas':
                return $this->add_drilling_gas($request);
            break;

            case 'upload_drilling_gas':
                return $this->upload_drilling_gas($request);
            break;

            case 'add_gas_initial_completion':
                return $this->add_gas_initial_completion($request);
            break;

            case 'upload_gas_initial_completion':
                return $this->upload_gas_initial_completion($request);
            break;

            case 'add_well_completion':
                return $this->add_well_completion($request);
            break;

            case 'upload_well_completion':
                return $this->upload_well_completion($request);
            break;

            case 'add_well_workover':
                return $this->add_well_workover($request);
            break;

            case 'upload_well_workover':
                return $this->upload_well_workover($request);
            break;

            case 'add_well_plugback_abandonment':
                return $this->add_well_plugback_abandonment($request);
            break;

            case 'upload_well_plugback_abandonment':
                return $this->upload_well_plugback_abandonment($request);
            break;

            case 'add_oil_facility':
                return $this->add_oil_facility($request);
            break;

            case 'upload_oil_facility':
                return $this->upload_oil_facility($request);
            break;

            case 'add_field_development_plan':
                return $this->add_field_development_plan($request);
            break;

            case 'upload_field_development_plan':
                return $this->upload_field_development_plan($request);
            break;

            case 'add_approved_gas_development_plan':
                return $this->add_approved_gas_development_plan($request);
            break;

            case 'upload_approved_gas_development_plan':
                return $this->upload_approved_gas_development_plan($request);
            break;

            case 'add_field_summary':
                return $this->add_field_summary($request);
            break;

            case 'upload_field_summary':
                return $this->upload_field_summary($request);
            break;

            case 'add_replacement_rate':
                return $this->add_replacement_rate($request);
            break;

            case 'upload_replacement_rate':
                return $this->upload_replacement_rate($request);
            break;

            case 'add_depletion_rate':
                return $this->add_depletion_rate($request);
            break;

            case 'upload_depletion_rate':
                return $this->upload_depletion_rate($request);
            break;

            case 'add_gas_depletion_rate':
                return $this->add_gas_depletion_rate($request);
            break;

            case 'upload_gas_depletion_rate':
                return $this->upload_gas_depletion_rate($request);
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
            case 'modals_editBalaOPL':
                // code...
                return $this->editBalaOPL($request);
            break;

            case 'view_viewBalaOPL':
                // code...
                return $this->viewBalaOPL($request);
            break;

            case 'approve_approveBalaOPL':
                // code...
                return $this->approveBalaOPL($request);
            break;

            case 'modals_editBalaOML':
                // code...
                return $this->editBalaOML($request);
            break;

            case 'view_viewBalaOML':
                // code...
                return $this->viewBalaOML($request);
            break;

            case 'approve_approveBalaOML':
                // code...
                return $this->approveBalaOML($request);
            break;

            case 'modals_editBalaMarginalField':
                // code...
                return $this->editBalaMarginalField($request);
            break;

            case 'view_viewBalaMarginalField':
                // code...
                return $this->viewBalaMarginalField($request);
            break;

            case 'approve_approveBalaMarginalField':
                // code...
                return $this->approveBalaMarginalField($request);
            break;

            case 'modals_editBalaProjectStatus':
                // code...
                return $this->editBalaProjectStatus($request);
            break;

            case 'view_viewBalaProjectStatus':
                // code...
                return $this->viewBalaProjectStatus($request);
            break;

            case 'approve_approveBalaProjectStatus':
                // code...
                return $this->approveBalaProjectStatus($request);
            break;

            case 'modals_editOpenAcreage':
                // code...
                return $this->editOpenAcreage($request);
            break;

            case 'view_viewOpenAcreage':
                // code...
                return $this->viewOpenAcreage($request);
            break;

            case 'approve_approveOpenAcreage':
                // code...
                return $this->approveOpenAcreage($request);
            break;

            case 'modals_editReserve':
                // code...
                return $this->editReserve($request);
            break;

            case 'view_viewReserve':
                // code...
                return $this->viewReserve($request);
            break;

            case 'approve_approveReserve':
                // code...
                return $this->approveReserve($request);
            break;

            case 'modals_editReserveOil':
                // code...
                return $this->editReserveOil($request);
            break;

            case 'view_viewReserveOil':
                // code...
                return $this->viewReserveOil($request);
            break;

            case 'approve_approveReserveOil':
                // code...
                return $this->approveReserveOil($request);
            break;

            case 'modals_editReserveGas':
                // code...
                return $this->editReserveGas($request);
            break;

            case 'view_viewReserveGas':
                // code...
                return $this->viewReserveGas($request);
            break;

            case 'approve_approveReserveGas':
                // code...
                return $this->approveReserveGas($request);
            break;

            case 'modals_editCrudeProduction':
                // code...
                return $this->editCrudeProduction($request);
            break;

            case 'view_viewCrudeProduction':
                // code...
                return $this->viewCrudeProduction($request);
            break;

            case 'approve_approveProvisional':
                // code...
                return $this->approveProvisional($request);
            break;

            case 'modals_editProductionDeferment':
                // code...
                return $this->editProductionDeferment($request);
            break;

            case 'view_viewProductionDeferment':
                // code...
                return $this->viewProductionDeferment($request);
            break;

            case 'approve_approveProductionDeferment':
                // code...
                return $this->approveProductionDeferment($request);
            break;

            case 'modals_editSeismicData':
                // code...
                return $this->editSeismicData($request);
            break;

            case 'view_viewSeismicData':
                // code...
                return $this->viewSeismicData($request);
            break;

            case 'approve_approveSeismic':
                // code...
                return $this->approveSeismic($request);
            break;

            case 'modals_editRigDisposition':
                // code...
                return $this->editRigDisposition($request);
            break;

            case 'view_viewRigDisposition':
                // code...
                return $this->viewRigDisposition($request);
            break;

            case 'approve_approveRig':
                // code...
                return $this->approveRig($request);
            break;

            case 'modals_editWellActivities':
                // code...
                return $this->editWellActivities($request);
            break;

            case 'view_viewWellActivities':
                // code...
                return $this->viewWellActivities($request);
            break;

            case 'approve_approveWell':
                // code...
                return $this->approveWell($request);
            break;

            case 'modals_editDrillingGas':
                // code...
                return $this->editDrillingGas($request);
            break;

            case 'view_viewDrillingGas':
                // code...
                return $this->viewDrillingGas($request);
            break;

            case 'approve_approveDrillingGas':
                // code...
                return $this->approveDrillingGas($request);
            break;

            case 'modals_editGasInitialCompletion':
                // code...
                return $this->editGasInitialCompletion($request);
            break;

            case 'view_viewGasInitialCompletion':
                // code...
                return $this->viewGasInitialCompletion($request);
            break;

            case 'approve_approveGasInitialCompletion':
                // code...
                return $this->approveGasInitialCompletion($request);
            break;

            case 'modals_editWellCompletion':
                // code...
                return $this->editWellCompletion($request);
            break;

            case 'view_approveCompletion':
                // code...
                return $this->approveCompletion($request);
            break;

            case 'approve_completion':
                // code...
                return $this->approveCompletion($request);
            break;

            case 'modals_editWellWorkover':
                // code...
                return $this->editWellWorkover($request);
            break;

            case 'view_viewWellWorkove':
                // code...
                return $this->WellWorkove($request);
            break;

            case 'approve_approveWorkover':
                // code...
                return $this->approveWorkover($request);
            break;

            case 'modals_editWellPlugbackAbandonment':
                // code...
                return $this->editWellPlugbackAbandonment($request);
            break;

            case 'view_viewWellPlugbackAbandonment':
                // code...
                return $this->WellPlugbackAbandonment($request);
            break;

            case 'approve_approvePlugback':
                // code...
                return $this->approvePlugback($request);
            break;

            case 'modals_editOilFacility':
                // code...
                return $this->editOilFacility($request);
            break;

            case 'view_viewOilFacility':
                // code...
                return $this->viewOilFacility($request);
            break;

            case 'approve_approveOilFacility':
                // code...
                return $this->approveOilFacility($request);
            break;

            case 'modals_editFieldDevelopmentPlan':
                // code...
                return $this->editFieldDevelopmentPlan($request);
            break;

            case 'view_viewFieldDevelopmentPlan':
                // code...
                return $this->viewFieldDevelopmentPlan($request);
            break;

            case 'approve_approveFieldDevelopmentPlan':
                // code...
                return $this->approveFieldDevelopmentPlan($request);
            break;

            case 'modals_editApprovedGasDevelopmentPlan':
                // code...
                return $this->editApprovedGasDevelopmentPlan($request);
            break;

            case 'view_viewApprovedGasDevelopmentPlan':
                // code...
                return $this->viewApprovedGasDevelopmentPlan($request);
            break;

            case 'approve_approveApprovedGasDevelopmentPlan':
                // code...
                return $this->approveApprovedGasDevelopmentPlan($request);
            break;

            case 'modals_editFieldSummary':
                // code...
                return $this->editFieldSummary($request);
            break;

            case 'view_viewFieldSummary':
                // code...
                return $this->viewFieldSummary($request);
            break;

            case 'approve_approveFieldSummary':
                // code...
                return $this->approveFieldSummary($request);
            break;

            case 'modals_editReplacementRate':
                // code...
                return $this->editReplacementRate($request);
            break;

            case 'view_viewReplacementRate':
                // code...
                return $this->viewReplacementRate($request);
            break;

            case 'approve_approveReplacementRate':
                // code...
                return $this->approveReplacementRate($request);
            break;

            case 'modals_editDepletionRate':
                // code...
                return $this->editDepletionRate($request);
            break;

            case 'view_viewDepletionRate':
                // code...
                return $this->viewDepletionRate($request);
            break;

            case 'approve_approveDepletionRate':
                // code...
                return $this->approveDepletionRate($request);
            break;

            case 'modals_editGasDepletionRate':
                // code...
                return $this->editGasDepletionRate($request);
            break;

            case 'approve_approveGasDepletionRate':
                // code...
                return $this->approveGasDepletionRate($request);
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

    public function add_bala_opl(Request $request)
    {
        try {
            //dd($request->all());
            //INSERTING NEW (OPL) Oil Prospective License
            $add_bala_opl = \App\Bala_opl::updateOrCreate(['id'=> $request->id],
            [
                'company_id' => $request->company_id,
                'concession_held_id' => $request->concession_held_id,
                'equity_distribution' => $request->equity_distribution,
                'contract_type' => $request->contract_type,
                'year_of_award' => $request->year_of_award,
                'license_expire_date' => $request->license_expire_date,
                'area' => $request->area,
                'geological_terrain_id' => $request->geological_terrain_id,
                'comment' => $request->comment,
                'year' => $request->year,
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $concession_held_id = $request->concession_held_id;
            $contract_type = $request->contract_type;
            $geological_terrain_id = $request->geological_terrain_id;
            if (! empty($id)) {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $request->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->year_of_award,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'year' => $request->year,
                    'created_by' => $add_bala_opl->created_by,
                    'created_at' => $add_bala_opl->created_at,
                    'updated_by' => \Auth::user()->name,
                    'updated_at' => date('Y-m-d h:i:s'),
                ]);

                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'Bala_opl', 'column_1');
                }
                if (! empty($concession_held_id)) {
                    $this->updateTempRecord($id, 'Bala_opl', 'column_2');
                }
                if (! empty($contract_type)) {
                    $this->updateTempRecord($id, 'Bala_opl', 'column_3');
                }
                if (! empty($geological_terrain_id)) {
                    $this->updateTempRecord($id, 'Bala_opl', 'column_4');
                }

                //clear temp record
                $this->clearTempRecord(\App\Bala_opl::class, $id, 'Bala_opl');
            } else {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $add_bala_opl->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->year_of_award,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'year' => $request->year,
                    'created_by' => \Auth::user()->name,
                    'created_at' => date('Y-m-d h:i:s'),
                ]);
            }

            // if(!empty($id))
            // {
            //     if(!empty($company_id)){ $this->updateTempRecord($id, 'Bala_opl', 'column_1'); }
            //     if(!empty($concession_held_id)){ $this->updateTempRecord($id, 'Bala_opl', 'column_2'); }
            //     if(!empty($contract_type)){ $this->updateTempRecord($id, 'Bala_opl', 'column_3'); }
            //     if(!empty($geological_terrain_id)){ $this->updateTempRecord($id, 'Bala_opl', 'column_4'); }

            //     //clear temp record
            //     $this->clearTempRecord('\App\Bala_opl', $id, 'Bala_opl');
            // }

            //sending mail
            self::send_all_mail('UPSTREAM - (OPL) Oil Prospective Lease ');
            //Audit Logging
            self::log_audit_trail('(OPL) Oil Prospective Lease', 'Added Data');

            if ($request->ajax()) {
                $opl_details = ['company'=>$add_bala_opl->company->company_name, 'concession'=>$add_bala_opl->concession->concession_name, 'equity_distribution'=>$add_bala_opl->equity_distribution, 'contract'=>$add_bala_opl->contract->contract_name, 'year_of_award'=>$add_bala_opl->year_of_award, 'license_expire_date'=>$add_bala_opl->license_expire_date, 'area'=>$add_bala_opl->area, 'terrain'=>$add_bala_opl->terrain->terrain_name, 'comment'=>$add_bala_opl->comment, 'id'=>$add_bala_opl->id];

                return response()->json(['status'=>'ok', 'message'=>$opl_details, 'info'=>'New (OPL) Oil Prospective Lease Added Successfully. ']);
            } else {
                return redirect()->route('upstream.index')->with('info', '(OPL) Oil Prospective Lease Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaOPL(Request $request)
    {
        $OPL_ = \App\Bala_opl::where('id', $request->id)->first();
        $one_comp = \App\company::where('id', $OPL_->company_id)->first();
        $all_comp = \App\company::orderBy('company_name', 'asc')->get();
        $one_conc = \App\concession::where('id', $OPL_->concession_held_id)->first();
        $all_conc = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_cont = \App\contract::where('id', $OPL_->contract_type)->first();
        $all_cont = \App\contract::where('contract_name', '<>', 'Marginal')->orderBy('contract_name', 'asc')->get();
        $one_terr = \App\up_concession_terrain::where('id', $OPL_->geological_terrain_id)->first();
        $all_terr = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();

        return view('upstream.modals.editBalaOPL', compact('OPL_', 'one_comp', 'all_conc', 'one_conc', 'all_cont', 'one_cont', 'all_comp', 'one_terr', 'all_terr'));
    }

    public function upload_bala_opl(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\concession::class, 'concession_name', "%{$row['B']}%", $row['B']);
                    $results_3 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['D']}%", $row['D']);
                    $results_4 = $this->resolveMasterData(\App\up_concession_terrain::class, 'terrain_name', "%{$row['H']}%", $row['H']);

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
                            $column_3 = $row['D'];
                        } else {
                            $column_3 = '';
                        }
                        if ($results_4['stage_id'] == 3) {
                            $column_4 = $row['H'];
                        } else {
                            $column_4 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => null, 'type' => 'Bala_opl',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $concession_held_id = 0;
                        } else {
                            $concession_held_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $contract_type = 0;
                        } else {
                            $contract_type = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $geological_terrain_id = 0;
                        } else {
                            $geological_terrain_id = $results_4['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $concession_held_id = $results_2['name'];
                        $contract_type = $results_3['name'];
                        $geological_terrain_id = $results_4['name'];
                    }

                    //INSERTING NEW
                    $add_ = \App\Bala_opl::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $company_id,
                            'concession_held_id' => $concession_held_id,
                            'equity_distribution' => $row['C'],
                            'contract_type' => $contract_type,
                            'year_of_award' => $row['E'],
                            'license_expire_date' => $row['F'],
                            'area' => $row['G'],
                            'geological_terrain_id' => $geological_terrain_id,
                            'comment' => $row['I'],
                            'year' => $row['J'],
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3) {
                        $this->updateTable(\App\Bala_opl::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                    $concession_held_id = '';
                    $contract_type = '';
                    $geological_terrain_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - (OPL) Oil Prospective Lease ');
            //Audit Logging
            self::log_audit_trail('(OPL) Oil Prospective Lease', 'Bulk Data Upload');

            return redirect()->route('upstream.index')->with('info', 'Oil Prospective License Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaOPL(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('(OPL) Oil Prospective Lease', 'Viewed Data');
        $OPL = \App\Bala_opl::where('id', $request->id)->first();
        $opl_history = \App\bala_opl_oml_history::where('history_id', $request->id)->orderBy('id', 'asc')->get();

        $one_comp = \App\company::where('id', $OPL->company_id)->first();
        $one_conc = \App\concession::where('id', $OPL->concession_held_id)->first();
        $one_cont = \App\contract::where('id', $OPL->contract_type)->first();
        $one_terr = \App\up_concession_terrain::where('id', $OPL->geological_terrain_id)->first();

        return view('upstream.view.viewBalaOPL', compact('OPL', 'opl_history', 'one_comp', 'one_conc', 'one_cont', 'one_terr'));
    }

    public function downloadOPL($type, Request $request)
    {
        $txt = Session::get('st');
        // dd($txt);
        if ($txt != null) 
        {
            $data = \App\Bala_opl::where('year_of_award', 'like', "%$txt%")->orwhere('license_expire_date', 'like', "%$txt%")
            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })
            ->orwhereHas('concession', function ($query) use ($txt) {
                $query->where('concession_name', 'like', "%$txt%");
            })
            ->orwhereHas('terrain', function ($query) use ($txt) {
                $query->where('terrain_name', 'like', "%$txt%");
            })
            ->orwhereHas('contract', function ($query) use ($txt) {
                $query->where('contract_name', 'like', "%$txt%");
            })->get();
        } else {
            $data = \App\Bala_opl::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('(OPL) Oil Prospective Lease', 'Downloaded Data');

        $view = 'upstream.excel.opl_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Oil Prospective Licenses.xlsx');
    }

    public function approveOPL(Request $request)
    {
        $OPL = \App\Bala_opl::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();
        return view('upstream.approve.approveOPL', compact('OPL'));
    }

    public function add_bala_oml(Request $request)
    {
        try 
        {
            // return $request->all();
            //INSERTING NEW (OML) Oil Mining Lease
            $add_bala_oml = \App\Bala_oml::updateOrCreate(['id'=> $request->id],
            [
                'company_id' => $request->company_id,
                'concession_held_id' => $request->concession_held_id,
                'equity_distribution' => $request->equity_distribution,
                'contract_type' => $request->contract_type,
                'date_of_grant' => $request->date_of_grant,
                'license_expire_date' => $request->license_expire_date,
                'area' => $request->area,
                'geological_terrain_id' => $request->geological_terrain_id,
                'comment' => $request->comment,
                'year' => $request->year,
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $concession_held_id = $request->concession_held_id;
            $contract_type = $request->contract_type;
            $geological_terrain_id = $request->geological_terrain_id;
            if (! empty($id)) {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $request->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->date_of_grant,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'year' => $request->year,
                    'created_by' => $add_bala_oml->created_by,
                    'created_at' => $add_bala_oml->created_at,
                    'updated_by' => \Auth::user()->name,
                    'updated_at' => date('Y-m-d h:i:s'),
                ]);

                // dd('IS COMPANY EMPTY ? ' . $company_id);

                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'Bala_oml', 'column_1');
                }
                if (! empty($concession_held_id)) {
                    $this->updateTempRecord($id, 'Bala_oml', 'column_2');
                }
                if (! empty($contract_type)) {
                    $this->updateTempRecord($id, 'Bala_oml', 'column_3');
                }
                if (! empty($geological_terrain_id)) {
                    $this->updateTempRecord($id, 'Bala_oml', 'column_4');
                }

                //clear temp record
                $this->clearTempRecord(\App\Bala_oml::class, $id, 'Bala_oml');
            } else {
                $add_hist = DB::table('bala_opl_oml_history')->insert([
                    'history_id' => $add_bala_oml->id,
                    'company_id' => $request->company_id,
                    'concession_held_id' => $request->concession_held_id,
                    'equity_distribution' => $request->equity_distribution,
                    'contract_type' => $request->contract_type,
                    'year_of_award' => $request->date_of_grant,
                    'license_expire_date' => $request->license_expire_date,
                    'area' => $request->area,
                    'geological_terrain_id' => $request->geological_terrain_id,
                    'comment' => $request->comment,
                    'year' => $request->year,
                    'created_by' => \Auth::user()->name,
                    'created_at' => date('Y-m-d h:i:s'),
                ]);
            }

            //UPDATING UNRESOLVED TABLE RECORDS
            // $id = $request->id;
            // $company_id = $request->company_id;  $concession_held_id = $request->concession_held_id;
            // $contract_type = $request->contract_type;  $geological_terrain_id = $request->geological_terrain_id;
            // if(!empty($id))
            // {
            //     if(!empty($company_id)){ $this->updateTempRecord($id, 'Bala_oml', 'column_1'); }
            //     if(!empty($concession_held_id)){ $this->updateTempRecord($id, 'Bala_oml', 'column_2'); }
            //     if(!empty($contract_type)){ $this->updateTempRecord($id, 'Bala_oml', 'column_3'); }
            //     if(!empty($geological_terrain_id)){ $this->updateTempRecord($id, 'Bala_oml', 'column_4'); }

            //     //clear temp record
            //     $this->clearTempRecord('\App\Bala_oml', $id, 'Bala_oml');
            // }

            //send mail
            self::send_all_mail('UPSTREAM - (OML) Oil Mining Lease ');
            //Audit Logging
            self::log_audit_trail('(OML) Oil Mining Lease', 'Added Data');

            if ($request->ajax()) {
                $oml_details = ['company'=>$add_bala_oml->company->company_name, 'concession'=>$add_bala_oml->concession->concession_name, 'equity_distribution'=>$add_bala_oml->equity_distribution, 'contract'=>$add_bala_oml->contract->contract_name, 'year_of_award'=>$add_bala_oml->year_of_award, 'license_expire_date'=>$add_bala_oml->license_expire_date, 'area'=>$add_bala_oml->area, 'terrain'=>$add_bala_oml->terrain->terrain_name, 'comment'=>$add_bala_oml->comment, 'id'=>$add_bala_oml->id];

                return response()->json(['status'=>'ok', 'message'=>$oml_details, 'info'=>'New (OML) Oil Mining Lease Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', '(OML) Oil Mining Lease Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaOML(Request $request)
    {
        $OML_ = \App\Bala_oml::where('id', $request->id)->first();
        $one_comp = \App\company::where('id', $OML_->company_id)->first();
        $all_comp = \App\company::orderBy('company_name', 'asc')->get();
        $one_conc = \App\concession::where('id', $OML_->concession_held_id)->first();
        $all_conc = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_cont = \App\contract::where('id', $OML_->contract_type)->first();
        $all_cont = \App\contract::where('contract_name', '<>', 'Marginal')->orderBy('contract_name', 'asc')->get();
        $one_terr = \App\up_concession_terrain::where('id', $OML_->geological_terrain_id)->first();
        $all_terr = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();

        return view('upstream.modals.editBalaOML', compact('OML_', 'one_comp', 'all_conc', 'one_conc', 'all_cont', 'one_cont', 'all_comp', 'one_terr', 'all_terr'));
    }

    public function upload_bala_oml(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\concession::class, 'concession_name', "%{$row['B']}%", $row['B']);
                    $results_3 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['D']}%", $row['D']);
                    $results_4 = $this->resolveMasterData(\App\up_concession_terrain::class, 'terrain_name', "%{$row['H']}%", $row['H']);

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
                            $column_3 = $row['D'];
                        } else {
                            $column_3 = '';
                        }
                        if ($results_4['stage_id'] == 3) {
                            $column_4 = $row['H'];
                        } else {
                            $column_4 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => null, 'type' => 'Bala_oml',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $concession_held_id = 0;
                        } else {
                            $concession_held_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $contract_type = 0;
                        } else {
                            $contract_type = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $geological_terrain_id = 0;
                        } else {
                            $geological_terrain_id = $results_4['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $concession_held_id = $results_2['name'];
                        $contract_type = $results_3['name'];
                        $geological_terrain_id = $results_4['name'];
                    }

                    //INSERTING NEW
                    $add_ = \App\Bala_oml::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $company_id,
                            'concession_held_id' => $concession_held_id,
                            'equity_distribution' => $row['C'],
                            'contract_type' => $contract_type,
                            'date_of_grant' => $row['E'],
                            'license_expire_date' => $row['F'],
                            'area' => $row['G'],
                            'geological_terrain_id' => $geological_terrain_id,
                            'comment' => $row['I'],
                            'year' => $row['J'],
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3) {
                        $this->updateTable(\App\Bala_oml::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                    $concession_held_id = '';
                    $contract_type = '';
                    $geological_terrain_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - (OML) Oil Mining Lease ');
            //Audit Logging
            self::log_audit_trail('(OML) Oil Mining Lease', 'Bulk Data Upload');

            return redirect()->route('upstream.index')->with('info', 'Oil Mining Lease Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaOML(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('(OML) Oil Mining Lease', 'Viewed Data');
        $OML = \App\Bala_oml::where('id', $request->id)->first();
        $opl_history = \App\bala_opl_oml_history::where('history_id', $request->id)->orderBy('id', 'asc')->get();
        $one_comp = \App\company::where('id', $OML->company_id)->first();
        $all_comp = \App\company::orderBy('company_name', 'asc')->get();
        $one_conc = \App\concession::where('id', $OML->concession_held_id)->first();
        $all_conc = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_cont = \App\contract::where('id', $OML->contract_type)->first();
        $all_cont = \App\contract::where('contract_name', '<>', 'Marginal')->orderBy('contract_name', 'asc')->get();
        $one_terr = \App\up_concession_terrain::where('id', $OML->geological_terrain_id)->first();
        $all_terr = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();

        return view('upstream.view.viewBalaOML', compact('OML', 'opl_history', 'one_comp', 'one_conc', 'one_cont', 'one_terr'));
    }

    public function downloadOML($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\Bala_oml::where('date_of_grant', 'like', "%$txt%")
            ->orwhere('license_expire_date', 'like', "%$txt%")
            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', '$txt');
            })
            ->orwhereHas('concession', function ($query) use ($txt) {
                $query->where('concession_name', 'like', '$txt');
            })
            ->orwhereHas('terrain', function ($query) use ($txt) {
                $query->where('terrain_name', 'like', '$txt');
            })
            ->orwhereHas('contract', function ($query) use ($txt) {
                $query->where('contract_name', 'like', '$txt');
            })
            ->get();
        } else {
            $data = \App\Bala_oml::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('(OML) Oil Mining Lease', 'Downloaded Data');

        $view = 'upstream.excel.oml_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Oil Mining Lease.xlsx');
    }

    public function approveOML(Request $request)
    {
        $OML = \App\Bala_oml::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();
        return view('upstream.approve.approveOML', compact('OML'));
    }

    public function add_marginal_field(Request $request)
    {
        try {
            //INSERTING NEW list Of Marginal Fields
            $add_bala_mf = \App\Bala_marginal_field::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'company_id' => $request->company_id,
                'field_id' => $request->field_id,
                'blocks' => $request->blocks,
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $field_id = $request->field_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'Bala_marginal_field', 'column_1');
                }
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'Bala_marginal_field', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\Bala_marginal_field::class, $id, 'Bala_marginal_field');
            }

            //send mail
            self::send_all_mail('UPSTREAM - Marginal Fields ');
            //Audit Logging
            self::log_audit_trail('Marginal Fields', 'Added Data');

            if ($request->ajax()) {
                $field_details = ['company'=>$add_bala_mf->company->company_name, 'field'=>$add_bala_mf->field->field_name, 'blocks'=>$add_bala_mf->blocks, 'id'=>$add_bala_mf->id];

                return response()->json(['status'=>'ok', 'message'=>$field_details, 'info'=>'New list Of Marginal Fields Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'list Of Marginal Fields Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaMarginalField(Request $request)
    {
        $M_FIELD_ = \App\Bala_marginal_field::where('id', $request->id)->first();

        return view('upstream.modals.editBalaMarginalField', compact('M_FIELD_'));
    }

    public function upload_marginal_field(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);

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
                                'year' => $row['A'], 'type' => 'Bala_marginal_field',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $field_id = $results_2['name'];
                    }

                    //INSERTING NEW
                    $add_ = \App\Bala_marginal_field::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'company_id' => $company_id,
                            'field_id' => $field_id,
                            'blocks' => $row['D'],
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\Bala_marginal_field::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                    $field_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Marginal Fields ');
            //Audit Logging
            self::log_audit_trail('Marginal Fields', 'Bulk Data Uploaded');

            return redirect()->route('upstream.index')->with('info', 'List Of Marginal Fields Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaMarginalField(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Marginal Fields', 'Viewed Data');
        $M_FIELD = \App\Bala_marginal_field::where('id', $request->id)->first();

        return view('upstream.view.viewBalaMarginalField', compact('M_FIELD'));
    }

    public function downloadBalaMarginalField($type, Request $request)
    {
        if ($txt != null) {
            $data = \App\Bala_marginal_field::where('year', 'like', "%$txt%")->orwhere('blocks', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\Bala_marginal_field::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Marginal Fields', 'Downloaded Data');

        $view = 'upstream.excel.marginal_field_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Marginal Fields.xlsx');
    }

    public function approveBalaMarginalField(Request $request)
    {
        $MField = \App\Bala_marginal_field::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveBalaMarginalField', compact('MField'));
    }

    public function add_data_project_status(Request $request)
    {
        try {
            //INSERTING NEW Multi-Client Data Projects Status
            $add_bala_dps = \App\bala_multiclient_project_status::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'company_id' => $request->company_id,
                'survey_name' => $request->survey_name,
                'agreement_date' => $request->agreement_date,
                'area_of_survey_block_id' => $request->area_of_survey_block_id,
                'type_of_survey_project_id' => $request->type_of_survey_project_id,
                'quantum_of_survey' => $request->quantum_of_survey,
                'year_of_survey' => $request->year_of_survey,
                'remark' => $request->remark,
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $area_of_survey_block_id = $request->area_of_survey_block_id;
            $type_of_survey_project_id = $request->type_of_survey_project_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'bala_multiclient_project_status', 'column_1');
                }
                if (! empty($area_of_survey_block_id)) {
                    $this->updateTempRecord($id, 'bala_multiclient_project_status', 'column_2');
                }
                if (! empty($type_of_survey_project_id)) {
                    $this->updateTempRecord($id, 'bala_multiclient_project_status', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\bala_multiclient_project_status::class, $id, 'bala_multiclient_project_status');
            }

            //send mail
            self::send_all_mail('CONCESSION - Multi-Client Project Status ');
            //Audit Logging
            self::log_audit_trail('Multi-Client Project Status', 'Added Data');

            if ($request->ajax()) {
                $pstatus_details = ['year'=>$add_bala_dps->year, 'company'=>$add_bala_dps->company->company_name, 'survey_name'=>$add_bala_dps->survey_name, 'agreement_date'=>$add_bala_dps->agreement_date, 'area_of_survey'=>$add_bala_dps->area_of_survey->area_of_survey_name, 'type_of_survey'=>$add_bala_dps->type_of_survey->type_of_survey_name, 'quantum_of_survey'=>$add_bala_dps->quantum_of_survey, 'year_of_survey'=>$add_bala_dps->year_of_survey, 'remark'=>$add_bala_dps->remark, 'id'=>$add_bala_dps->id];

                return response()->json(['status'=>'ok', 'message'=>$pstatus_details, 'info'=>'New Multi-Client Data Projects Status Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Multi-Client Data Projects Status Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editBalaProjectStatus(Request $request)
    {
        $PRO_STA_ = \App\bala_multiclient_project_status::where('id', $request->id)->first();

        return view('upstream.modals.editBalaProjectStatus', compact('PRO_STA_'));
    }

    public function upload_data_project_status(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\area_of_survey::class, 'area_of_survey_name', "%{$row['E']}%", $row['E']);
                    $results_3 = $this->resolveMasterData(\App\type_of_survey::class, 'type_of_survey_name', "%{$row['F']}%", $row['F']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['E'];
                        } else {
                            $column_2 = '';
                        }
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['F'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'bala_multiclient_project_status',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $area_of_survey_block_id = 0;
                        } else {
                            $area_of_survey_block_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $type_of_survey_project_id = 0;
                        } else {
                            $type_of_survey_project_id = $results_3['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $area_of_survey_block_id = $results_2['name'];
                        $type_of_survey_project_id = $results_3['name'];
                    }

                    //INSERTING NEW
                    $add_ = \App\bala_multiclient_project_status::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'company_id' => $company_id,
                            'survey_name' => $row['C'],
                            'agreement_date' => $row['D'],
                            'area_of_survey_block_id' => $area_of_survey_block_id,
                            'type_of_survey_project_id' => $type_of_survey_project_id,
                            'quantum_of_survey' => $row['G'],
                            'year_of_survey' => $row['H'],
                            'remark' => $row['I'],
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\bala_multiclient_project_status::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                    $area_of_survey_block_id = '';
                    $type_of_survey_project_id = '';
                }
            }

            //send mail
            self::send_all_mail('CONCESSION - Multi-Client Project Status ');
            //Audit Logging
            self::log_audit_trail('Multi-Client Project Status', 'Bulk Uploaded');

            return redirect()->route('upstream.index')->with('info', 'Multi-Client Data Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaProjectStatus(Request $request)
    {
        $PRO_STATUS = \App\bala_multiclient_project_status::where('id', $request->id)->first();

        return view('upstream.view.viewBalaProjectStatus', compact('PRO_STATUS'));
    }

    public function downloadBalaProjectStatus($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\bala_multiclient_project_status::where('year', 'like', "%$txt%")
                ->orwhere('survey_name', 'like', "%$txt%")->orwhere('agreement_date', 'like', "%$txt%")
                ->orwhere('remark', 'like', "%$txt%")->orwhere('year_of_survey', 'like', "%$txt%")
                ->whereHas('company', function ($query) use ($txt) {
                    $query->orwhere('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('area_of_survey', function ($query) use ($txt) {
                    $query->where('area_of_survey_name', 'like', "%$txt%");
                })
                ->orwhereHas('type_of_survey', function ($query) use ($txt) {
                    $query->where('type_of_survey_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\bala_multiclient_project_status::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Multi-Client Project', 'Downloaded Data');
        $view = 'upstream.excel.multiclient';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Multi-Client Projects.xlsx');
    }

    public function approveBalaProjectStatus(Request $request)
    {
        $multiClient = \App\bala_multiclient_project_status::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveBalaProjectStatus', compact('multiClient'));
    }

    public function add_open_acreage(Request $request)
    {
        try {
            //INSERTING NEW Multi-Client Data Projects Status
            $add_bala_dps = \App\Bala_block::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'basin_id' => $request->basin_id,
                'opl_blocks_allocated' => $request->opl_blocks_allocated,
                'oml_blocks_allocated' => $request->oml_blocks_allocated,
                'blocks_open' => $request->blocks_open,
                'total_block' => $request->opl_blocks_allocated + $request->oml_blocks_allocated + $request->blocks_open,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $basin_id = $request->basin_id;
            if (! empty($id)) {
                if (! empty($basin_id)) {
                    $this->updateTempRecord($id, 'Bala_block', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\Bala_block::class, $id, 'Bala_block');
            }

            //send mail
            self::send_all_mail('CONCESSION - Open Acreage ');
            //Audit Logging
            self::log_audit_trail('Open Acreage', 'Added Data');

            if ($request->ajax()) {
                $pstatus_details = ['year'=>$add_bala_dps->year, 'basin'=>$add_bala_dps->basin->basin_name, 'opl_blocks_allocated'=>$add_bala_dps->opl_blocks_allocated, 'oml_blocks_allocated'=>$add_bala_dps->oml_blocks_allocated, 'blocks_open'=>$add_bala_dps->blocks_open, 'total_block'=>$add_bala_dps->total_block, 'id'=>$add_bala_dps->id];

                return response()->json(['status'=>'ok', 'message'=>$pstatus_details, 'info'=>'New Open Acreage Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Open Acreage Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editOpenAcreage(Request $request)
    {
        $MANAGE = \App\Bala_block::where('id', $request->id)->first();
        $one_bas = \App\Basin::where('id', $MANAGE->basin_id)->first();
        $all_bas = \App\Basin::orderBy('basin_name', 'asc')->get();

        return view('upstream.modals.editOpenAcreage', compact('MANAGE', 'one_bas', 'all_bas'));
    }

    public function upload_open_acreage(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\Basin::class, 'basin_name', "%{$row['B']}%", $row['B']);

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
                                'year' => $row['A'], 'type' => 'Bala_block', 'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $basin_id = 0;
                        } else {
                            $basin_id = $results_1['name'];
                        }
                    } else {
                        $basin_id = $results_1['name'];
                    }

                    //INSERTING NEW
                    $add_ = \App\Bala_block::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'basin_id' => $basin_id,
                            'opl_blocks_allocated' => $row['C'],
                            'oml_blocks_allocated' => $row['D'],
                            'blocks_open' => $row['E'],
                            'total_block' => ($row['C'] + $row['D'] + $row['E']),
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\Bala_block::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $basin_id = '';
                }
            }

            //send mail
            self::send_all_mail('CONCESSION - Open Acreage ');
            //Audit Logging
            self::log_audit_trail('Open Acreage', 'Bulk Uploaded');

            return redirect()->route('upstream.index')->with('info', 'Open Acreage Data Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewOpenAcreage(Request $request)
    {
        $PRO_STATUS = \App\Bala_block::where('id', $request->id)->first();

        return view('upstream.view.viewOpenAcreage', compact('PRO_STATUS'));
    }

    public function downloadOpenAcreage($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\Bala_block::where('year', 'like', "%$txt%")
                ->orwhereHas('basin', function ($query) use ($txt) {
                    $query->where('basin_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\Bala_block::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Open Acreage', 'Downloaded Data');
        $view = 'upstream.excel.open_acreage';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $data), 'Open Acreage.xlsx');
    }

    public function approveOpenAcreage(Request $request)
    {
        $open_acreage = \App\Bala_block::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveOpenAcreage', compact('open_acreage'));
    }

    public function add_reserve(Request $request)
    {
        // $field_id = $request->field_id;        $year = $request->year;
        // $up_res = \App\up_reserves_report::where('field_id', $field_id)->where('year', $year)->first();
        // if($up_res)
        // {
        //     if($request->ajax() && $request->id == '')
        //      {
        //         $field = $up_res->field->field_name;
        //         return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$field.' Field For Year ' .$year.' Please Check Existing Records.']);

        //      }
        //      else { goto edit; }
        // }
        // else { goto edit; }
        // {
        //     edit:
        try {
            $concession = \App\concession::where('company_id', $request->company_id)->first();
            if ($concession) {
                $terrain_id = $concession->terrain_id;
            } else {
                $terrain_id = null;
            }

            //INSERTING NEW Provisional Crude Production
            $add_res = \App\up_reserves_report::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    // 'type_id' => $request->type_id,
                    'contract_id' => $request->contract_id,
                    'terrain_id' => $terrain_id,
                    'company_id' => $request->company_id,
                    'condensate_reserves' => $request->condensate_reserves,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $contract_id = $request->contract_id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_reserves_report', 'column_1');
                }
                if (! empty($contract_id)) {
                    $this->updateTempRecord($id, 'up_reserves_report', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_reserves_report::class, $id, 'up_reserves_report');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Condensates Reserves ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Condensate Record', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Condensate Record', 'Add Record');
            }

            if ($request->ajax()) {
                $reserve_details = ['year'=>$add_res->year, 'month'=>$add_res->month, 'company'=>$add_res->company->company_name, 'contract'=>$add_res->contract->contract_name, 'condensate_reserves'=>$add_res->condensate_reserves, 'id'=>$add_res->id];

                return response()->json(['status'=>'ok', 'message'=>$reserve_details, 'info'=>'New Condensates Reserves Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Condensates Reserves Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        // }
    }

    public function editReserve(Request $request)
    {
        $RESERVE_ = \App\up_reserves_report::where('id', $request->id)->first();

        $one_con = \App\contract::where('id', $RESERVE_->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();
        $one_ter = \App\terrain::where('id', $RESERVE_->terrain_id)->first();
        $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();
        $one_fie = \App\company::where('id', $RESERVE_->company_id)->first();
        $all_fie = \App\company::orderBy('company_name', 'asc')->get();

        return view('upstream.modals.editReserve', compact('RESERVE_', 'one_con', 'all_con', 'one_ter', 'all_ter', 'one_fie', 'all_fie'));
    }

    public function upload_reserve(Request $request)
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
                // $company_id = $row['C'];        $year = $row['A'];
                // $up_res = \App\up_reserves_report::where('company_id', $company_id)->where('year', $year)->first();
                // if(isset($up_res))
                // {
                //     $company = $up_res->company->company_name;
                //     return  redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$company.' company For Year ' .$year.' Please Check Existing Records And Remove All Duplicate Records.');
                // }
                // else { goto edit; }
                // {
                //     edit:

                if ($key >= 2) {

                            //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['D']}%", $row['D']);
                    $results_2 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['D'];
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
                                    'year' => $row['A'], 'type' => 'up_reserves_report', 'column_1' => $column_1, 'column_2' => $column_2,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $contract_id = $results_2['name'];
                    }

                    $comp_id = $this->resolveModelId(\App\company::class, 'company_name', $row['D']);
                    $cont_id = $this->resolveModelId(\App\contract::class, 'contract_name', $row['C']);
                    $FIELD = \App\field::where('company_id', $comp_id)->where('contract_id', $cont_id)->first();
                    if ($FIELD) {
                        $terrain_id = $FIELD->terrain_id;
                    } else {
                        $terrain_id = null;
                    }
                    //INSERTING NEW Rig Disposition
                    $add_resevered = \App\up_reserves_report::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'contract_id' => $contract_id,
                                'terrain_id' => $terrain_id,
                                'company_id' => $company_id,
                                'condensate_reserves' => $row['E'],
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_reserves_report::class, 'pending_id', $add_resevered->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_resevered->id);
                    }
                    $company_id = '';
                    $contract_id = '';
                }
                // }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Condensates Reserves ');
            //Audit Logging
            self::log_audit_trail('Upstream  Condensates Reserves', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Condensates Reserves Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewReserve(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Condensate Reserves', 'Viewed Data');
        $RESERVE = \App\up_reserves_report::where('id', $request->id)->first();

        return view('upstream.view.viewReserve', compact('RESERVE'));
    }

    public function download_reserve($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_reserves_report::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhere('condensate_reserves', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('contract', function ($query) use ($txt) {
                    $query->where('contract_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_reserves_report::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Condensate Reserves', 'Downloaded Data');

        $view = 'upstream.excel.condensate_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Condensate Reserves.xlsx');
    }

    public function approveReserve(Request $request)
    {
        $condensate = \App\up_reserves_report::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveReserve', compact('condensate'));
    }

    public function add_reserve_oil(Request $request)
    {
        // $company_id = $request->company_id;        $year = $request->year;
        // $up_res = \App\up_reserves_oil::where('company_id', $company_id)->where('year', $year)->first();
        // if($up_res)
        // {
        //     if($request->ajax() && $request->id == '')
        //      {
        //         $company = $up_res->company->company_name;
        //         return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$company.' company For Year ' .$year. ' Please Check Existing Records.']);

        //      }
        //      else { goto edit; }
        // }
        // else { goto edit; }
        // {
        //     edit:
        try {
            $FIELD = \App\field::where('company_id', $request->company_id)->where('contract_id', $request->contract_id)->first();
            if ($FIELD) {
                $terrain_id = $FIELD->terrain_id;
            } else {
                $terrain_id = null;
            }

            //INSERTING NEW Provisional Crude Production
            $add_res = \App\up_reserves_oil::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'contract_id' => $request->contract_id,
                    'terrain_id' => $terrain_id,
                    'company_id' => $request->company_id,
                    'oil_reserves' => $request->oil_reserves,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $contract_id = $request->contract_id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_reserves_oil', 'column_1');
                }
                if (! empty($contract_id)) {
                    $this->updateTempRecord($id, 'up_reserves_oil', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_reserves_oil::class, $id, 'up_reserves_oil');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Oil Reserves ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Oil Record', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Oil Record', 'Add Record');
            }

            if ($request->ajax()) {
                $reserve_details = ['year'=>$add_res->year, 'month'=>$add_res->month, 'company'=>$add_res->company->company_name, 'contract'=>$add_res->contract->contract_name, 'oil_reserves'=>$add_res->oil_reserves, 'id'=>$add_res->id];

                return response()->json(['status'=>'ok', 'message'=>$reserve_details, 'info'=>'New Oil Reserves Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Oil Reserves Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        // }
    }

    public function editReserveOil(Request $request)
    {
        $RESERVE_ = \App\up_reserves_oil::where('id', $request->id)->first();

        $one_con = \App\contract::where('id', $RESERVE_->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();
        $one_ter = \App\terrain::where('id', $RESERVE_->terrain_id)->first();
        $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();
        $one_fie = \App\company::where('id', $RESERVE_->company_id)->first();
        $all_fie = \App\company::orderBy('company_name', 'asc')->get();

        return view('upstream.modals.editReserveOil', compact('RESERVE_', 'one_con', 'all_con', 'one_ter', 'all_ter', 'one_fie', 'all_fie'));
    }

    public function upload_reserve_oil(Request $request)
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
                // $company_id = $row['C'];        $year = $row['A'];
                // $up_res = \App\up_reserves_oil::where('company_id', $company_id)->where('year', $year)->first();
                // if(isset($up_res))
                // {
                //     $company = $up_res->company->company_name;
                //     return  redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$company.' company For Year ' .$year. ' Please Check Existing Records And Remove All Duplicate Records.');
                // }
                // else { goto edit; }
                // {
                //     edit:

                if ($key >= 2) {
                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['D']}%", $row['D']);
                    $results_2 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['C']}%", $row['C']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['D'];
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
                                    'year' => $row['A'], 'type' => 'up_reserves_oil', 'column_1' => $column_1, 'column_2' => $column_2,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $contract_id = $results_2['name'];
                    }

                    $comp_id = $this->resolveModelId(\App\company::class, 'company_name', $row['D']);
                    $cont_id = $this->resolveModelId(\App\contract::class, 'contract_name', $row['C']);
                    $FIELD = \App\field::where('company_id', $comp_id)->where('contract_id', $cont_id)->first();
                    if ($FIELD) {
                        $terrain_id = $FIELD->terrain_id;
                    } else {
                        $terrain_id = null;
                    }
                    //INSERTING NEW
                    $add_resevered = \App\up_reserves_oil::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'contract_id' => $contract_id,
                                'terrain_id' => $terrain_id,
                                'company_id' => $company_id,
                                'oil_reserves' => $row['E'],
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_reserves_oil::class, 'pending_id', $add_resevered->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_resevered->id);
                    }
                    $company_id = '';
                    $contract_id = '';
                }
                // }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Oil Reserves ');
            //Audit Logging
            self::log_audit_trail('Upstream Oil Reserves', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Oil Reserves Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewReserveOil(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Oil Reserves', 'Viewed Data');
        $RESERVE = \App\up_reserves_oil::where('id', $request->id)->first();
        $one_con = \App\contract::where('id', $RESERVE->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();
        $one_ter = \App\terrain::where('id', $RESERVE->terrain_id)->first();
        $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();
        $one_fie = \App\company::where('id', $RESERVE->company_id)->first();
        $all_fie = \App\company::orderBy('company_name', 'asc')->get();

        return view('upstream.view.viewReserveOil', compact('RESERVE'));
    }

    public function download_reserve_oil($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_reserves_oil::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhere('oil_reserves', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('contract', function ($query) use ($txt) {
                    $query->where('contract_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_reserves_oil::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Oil Reserves', 'Downloaded Data');

        $view = 'upstream.excel.oil_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Oil Reserves.xlsx');
    }

    public function approveReserveOil(Request $request)
    {
        $oil = \App\up_reserves_oil::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveReserveOil', compact('oil'));
    }

    public function add_reserve_gas(Request $request)
    {
        $company_id = $request->company_id;
        $year = $request->year;
        $month = $request->month;
        $up_res = \App\up_reserves_report::where('company_id', $company_id)->where('year', $year)->where('month', $month)->first();
        if ($up_res) {
            if ($request->ajax() && $request->id == '') {
                $company = $up_res->company->company_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$company.' company For Year '.$year.' Month '.$month.' Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            edit:
            try {
                //INSERTING NEW Provisional Crude Production
                $add_res = \App\up_reserves_gas::updateOrCreate(['id'=> $request->id],
                [

                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    'description' => $request->description,
                    'associated_gas' => $request->associated_gas,
                    'non_associated_gas' => $request->non_associated_gas,
                    'total_gas' => $request->total_gas,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'up_reserves_gas', 'column_1');
                    }
                    //clear temp record
                    $this->clearTempRecord(\App\up_reserves_gas::class, $id, 'up_reserves_gas');
                }

                //send mail
                //self::send_all_mail_gas("UPSTREAM - Associated Gas (AG) and Non Associated Gas (NAG) Reserves ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Upstream Gas Reserves', 'Update Record');
                } else {
                    self::log_audit_trail('Upstream Gas Reserves', 'Add Record');
                }

                if ($request->ajax()) {
                    $reserve_details = ['year'=>$add_res->year, 'month'=>$add_res->month, 'company'=>$add_res->company->company_name, 'associated_gas'=>$add_res->associated_gas, 'non_associated_gas'=>$add_res->non_associated_gas, 'total_gas'=>$add_res->total_gas, 'id'=>$add_res->id];

                    return response()->json(['status'=>'ok', 'message'=>$reserve_details, 'info'=>'New AG NAG Gas Reserves Added Successfully.']);
                } else {
                    return redirect()->route('upstream.index')->with('info', 'AG NAG Gas Reserves Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editReserveGas(Request $request)
    {
        $RESERVE_ = \App\up_reserves_gas::where('id', $request->id)->first();

        $one_fie = \App\company::where('id', $RESERVE_->company_id)->first();
        $all_fie = \App\company::orderBy('company_name', 'asc')->get();

        return view('upstream.modals.editReserveGas', compact('RESERVE_', 'one_fie', 'all_fie'));
    }

    public function upload_reserve_gas(Request $request)
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
                // $company_id = $row['C'];        $year = $row['A'];      $month = $row['B'];
                // $up_res = \App\up_reserves_gas::where('company_id', $company_id)->where('year', $year)->where('month', $month)->first();
                // if(isset($up_res))
                // {
                //     $company = $up_res->company->company_name;
                //     return  redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$company.' company For Year ' .$year. ' Month ' .$month. ' Please Check Existing Records And Remove All Duplicate Records.');
                // }
                // else { goto edit; }
                // {
                //     edit:
                if ($key >= 2) {
                    //AUTO SUM OF VALUES
                    $associated_gas = $row['D'];
                    $non_associated_gas = $row['E'];
                    $total_gas = $associated_gas + $non_associated_gas;

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);

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
                                    'year' => $row['A'], 'type' => 'up_reserves_gas', 'column_1' => $column_1,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                    }

                    $drow = \App\field::where('company_id', $results_1)->first();
                    if ($drow) {
                        $contract_id = $drow->contract_id;
                    } else {
                        $contract_id = null;
                    }

                    //INSERTING NEW
                    $add_resevered = \App\up_reserves_gas::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'company_id' => $company_id,
                                'associated_gas' => $row['D'],
                                'non_associated_gas' => $row['E'],
                                'total_gas' => $total_gas,
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                                'contract_id' => $contract_id,
                                'description' => $row['F'],
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\up_reserves_gas::class, 'pending_id', $add_resevered->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_resevered->id);
                    }
                    $company_id = '';
                }
                // }
            }

            //send mail
            self::send_all_mail_gas('UPSTREAM - Associated Gas (AG) and Non Associated Gas (NAG) Reserves ');
            //Audit Logging
            self::log_audit_trail('Upstream GAS Reserves', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'AG NAG, Gas Reserves Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewReserveGas(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Reserves', 'Viewed Data');
        $RESERVE = \App\up_reserves_gas::where('id', $request->id)->first();

        return view('upstream.view.viewReserveGas', compact('RESERVE'));
    }

    public function download_reserve_gas($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_reserves_gas::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_reserves_gas::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Reserves', 'Downloaded Data');

        $view = 'upstream.excel.gas_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Gas Reserves.xlsx');
    }

    public function approveReserveGas(Request $request)
    {
        $gas = \App\up_reserves_gas::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveReserveGas', compact('gas'));
    }

    public function add_crude_production(Request $request)
    {
        $field_id = $request->field_id;
        $contract_id = $request->contract_id;
        $terrain_id = $request->terrain_id;
        $year = $request->year;
        $crude_prod = \App\up_provisional_crude_production::where('year', $year)->where('field_id', $field_id)->where('contract_id', $contract_id)->where('terrain_id', $terrain_id)->first();
        if ($crude_prod) {
            if ($request->ajax() && $request->id == '') {
                $field = $crude_prod->field->field_name;
                $contract = $crude_prod->contract->contract_name;
                $terrain = $crude_prod->terrain->terrain_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$field.' Field For Year '.$year.' Terrain '.$terrain.' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            edit:
            try {
                $total_pcp = $request->january + $request->febuary + $request->march + $request->april + $request->may + $request->june + $request->july + $request->august + $request->september + $request->october + $request->november + $request->december;
                $yrs = $year;
                $yr = '0000';
                $ave_prod = 0;
                //script to determine if year is a leap year or not
                $isLeap = DateTime::createFromFormat('Y', $yrs)->format('L') === '1';
                if ($isLeap == true) {
                    $yr = 366;
                } else {
                    $yr = 365;
                }
                $ave_prod = ($total_pcp / $yr);
                // $percentage_production = ($total_pcp * 100) / $yearly_total;

                //getting the company based on the field selected
                $field_comp = \App\field::where('id', $request->field_id)->first();
                if ($field_comp) {
                    $company_id = $field_comp->company_id;
                } else {
                    $company_id = 0;
                }

                //INSERTING NEW Provisional Crude Production
                $add_crude_prod = \App\up_provisional_crude_production::updateOrCreate(['id'=> $request->id],
                [
                    'company_id' => $request->company_id,
                    'field_id' => $request->field_id,
                    'contract_id' => $request->contract_id,
                    'terrain_id' => $request->terrain_id,
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
                    'company_total' => $total_pcp,
                    'average_production' => $ave_prod,
                    'percentage_production' => '0.00',
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                $field_id = $request->field_id;
                $contract_id = $request->contract_id;
                $terrain_id = $request->terrain_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'up_provisional_crude_production', 'column_1');
                    }
                    if (! empty($field_id)) {
                        $this->updateTempRecord($id, 'up_provisional_crude_production', 'column_2');
                    }
                    if (! empty($contract_id)) {
                        $this->updateTempRecord($id, 'up_provisional_crude_production', 'column_3');
                    }
                    if (! empty($terrain_id)) {
                        $this->updateTempRecord($id, 'up_provisional_crude_production', 'column_4');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\up_provisional_crude_production::class, $id, 'up_provisional_crude_production');
                }

                //self::send_all_mail("UPSTREAM - Provisional Crude Production ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Provisional Crude Production', 'Update Record');
                } else {
                    self::log_audit_trail('Provisional Crude Production', 'Add Record');
                }

                if ($request->ajax()) {
                    $crude_prod_details = ['company'=>$add_crude_prod->company->company_name, 'field'=>$add_crude_prod->field->field_name,  'year'=>$add_crude_prod->year, 'january'=>$add_crude_prod->january, 'febuary'=>$add_crude_prod->febuary, 'march'=>$add_crude_prod->march, 'april'=>$add_crude_prod->april, 'may'=>$add_crude_prod->may, 'june'=>$add_crude_prod->june, 'july'=>$add_crude_prod->july, 'august'=>$add_crude_prod->august, 'september'=>$add_crude_prod->september, 'october'=>$add_crude_prod->october, 'november'=>$add_crude_prod->november, 'december'=>$add_crude_prod->december, 'company_total'=>$add_crude_prod->company_total, 'average_production'=>$add_crude_prod->average_production, 'percentage_production'=>$add_crude_prod->percentage_production, 'id'=>$add_crude_prod->id];

                    return response()->json(['status'=>'ok', 'message'=>$crude_prod_details, 'info'=>'New Provisional Crude Production Added Successfully.']);
                } else {
                    return redirect()->route('upstream.index')->with('info', 'Provisional Crude Production Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editCrudeProduction(Request $request)
    {
        $CRU_PROD_ = \App\up_provisional_crude_production::where('id', $request->id)->first();

        return view('upstream.modals.editCrudeProduction', compact('CRU_PROD_'));
    }

    public function upload_crude_production(Request $request)
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
                //$field_id = $row['A'];   $contract_id = $row['B'];   $terrain_id = $row['C'];    $year = $row['D'];
                // $crude_prod = \App\up_provisional_crude_production::where('year', $year)->where('field_id', $field_id)->where('contract_id', $contract_id)->where('terrain_id', $terrain_id)->first();
                // if($crude_prod)
                // {
                // $field = $crude_prod->field->field_name;   $contract = $crude_prod->contract->contract_name;   $terrain = $crude_prod->terrain->terrain_name;
                //         return redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$field.' Field, Year ' .$year. ' Terrain ' .$terrain. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else { goto edit; }
                // {
                //     edit:
                if ($key >= 2) {
                    //function to check if a year is leap year.
                    $total_pcp = $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'] + $row['M'] + $row['N'] + $row['O'] + $row['P'];
                    $yrs = $row['E'];
                    $yr = '0000';
                    $ave_prod = 0;
                    $isLeap = DateTime::createFromFormat('Y', $yrs)->format('L') === '1';
                    if ($isLeap == true) {
                        $yr = 366;
                    } else {
                        $yr = 365;
                    }
                    $ave_prod = ($total_pcp / $yr);

                    //######### UNCOMMENT THIS WHEN FIELDS ARE SUPPLY
                    //getting the company based on the field selected
                    // $field_comp = \App\field::where('id', $row['A'])->first();
                    // if($field_comp)
                    // {
                    //     $company_id = $field_comp->company_id;
                    // }else { $company_id = 0; }

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['B']}%", $row['B']);
                    $results_3 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['C']}%", $row['C']);
                    $results_4 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['D']}%", $row['D']);

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
                            $column_4 = $row['D'];
                        } else {
                            $column_4 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['E'], 'type' => 'up_provisional_crude_production',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $terrain_id = 0;
                        } else {
                            $terrain_id = $results_4['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $field_id = $results_2['name'];
                        $contract_id = $results_3['name'];
                        $terrain_id = $results_4['name'];
                    }

                    //INSERTING NEW Provisional Crude Production
                    $add = \App\up_provisional_crude_production::updateOrCreate(['company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['A']),
                        'field_id'=> $this->resolveModelId(\App\field::class, 'field_name', $row['B']),
                        'contract_id'=> $this->resolveModelId(\App\contract::class, 'contract_name', $row['C']),
                        'terrain_id'=> $this->resolveModelId(\App\terrain::class, 'terrain_name', $row['D']),
                        'year'=> $row['E'], ],
                            [
                                'company_id' => $company_id,
                                'field_id' => $field_id,
                                'contract_id' => $contract_id,
                                'terrain_id' => $terrain_id,
                                'year' => $row['E'],
                                'january' => $row['F'],
                                'febuary' => $row['G'],
                                'march' => $row['H'],
                                'april' => $row['I'],
                                'may' => $row['J'],
                                'june' => $row['K'],
                                'july' => $row['L'],
                                'august' => $row['M'],
                                'september' => $row['N'],
                                'october' => $row['O'],
                                'november' => $row['P'],
                                'december' => $row['Q'],
                                'company_total' => $total_pcp,
                                'average_production' => $ave_prod,
                                'percentage_production' => '0.00',
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3) {
                        $this->updateTable(\App\up_provisional_crude_production::class, 'pending_id', $add->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add->id);
                    }
                    $company_id = '';
                    $field_id = '';
                    $contract_id = '';
                    $terrain_id = '';
                }
                // }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Provisional Crude Production ');
            //Audit Logging
            self::log_audit_trail('Provisional Crude Production', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Provisional Crude Production Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewCrudeProduction(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Provisional Crude Prod', 'Viewed Data');
        $CRU_PROD = \App\up_provisional_crude_production::where('id', $request->id)->first();
        return view('upstream.view.viewCrudeProduction', compact('CRU_PROD'));
    }

    public function download_crude_production($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_provisional_crude_production::where('year', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })->orwhereHas('contract', function ($query) use ($txt) {
                    $query->where('contract_name', 'like', "%$txt%");
                })->orwhereHas('terrain', function ($query) use ($txt) {
                    $query->where('terrain_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_provisional_crude_production::get();
        }

        Session::put('search_text', null);

        //Audit Logging
        self::log_audit_trail('Provisional Crude Prod', 'Downloaded Data');

        $view = 'upstream.excel.provisional_crude_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Provisional Crude Prod.xlsx');
    }

    public function approveProvisional(Request $request)
    {
        $provisional = \App\up_provisional_crude_production::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveProvisional', compact('provisional'));
    }

    public function add_production_deferment(Request $request)
    {
        $contract_id = $request->contract_id;
        $company_id = $request->company_id;
        $month = $request->month;
        $year = $request->year;
        $crude_prod = \App\up_crude_production_deferment::where('year', $year)->where('month', $month)->where('company_id', $company_id)->where('contract_id', $contract_id)->first();
        if ($crude_prod) {
            if ($request->ajax() && $request->id == '') {
                $company = $crude_prod->company->company_name;
                $contract = $crude_prod->contract->contract_name;
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$company.' Company For Year '.$year.' Contract '.$contract.' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            edit:
            try {
                $year = $request->year;
                $month = $request->month;
                switch ($month) {
                    case 'January': $mon = 1; break;
                    case 'February': $mon = 2; break;
                    case 'March': $mon = 3; break;
                    case 'April': $mon = 4; break;
                    case 'May': $mon = 5; break;
                    case 'June': $mon = 6; break;
                    case 'July': $mon = 7; break;
                    case 'August': $mon = 8; break;
                    case 'September': $mon = 9; break;
                    case 'October': $mon = 10; break;
                    case 'November': $mon = 11; break;
                    case 'December': $mon = 12; break;

                    default:   break;
                }

                $days = cal_days_in_month(CAL_GREGORIAN, $mon, $year);

                //INSERTING NEW Provisional Crude Production
                $add_crude_prod = \App\up_crude_production_deferment::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    'contract_id' => $request->contract_id,
                    'value' => $request->value,
                    'average_daily_production' => ($request->value / $days),
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $company_id = $request->company_id;
                $contract_id = $request->contract_id;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'up_crude_production_deferment', 'column_1');
                    }
                    if (! empty($contract_id)) {
                        $this->updateTempRecord($id, 'up_crude_production_deferment', 'column_2');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\up_crude_production_deferment::class, $id, 'up_crude_production_deferment');
                }

                //self::send_all_mail("UPSTREAM - Crude Production Deferment ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Crude Production Deferment', 'Update Record');
                } else {
                    self::log_audit_trail('Crude Production Deferment', 'Add Record');
                }

                if ($request->ajax()) {
                    $crude_prod_details = ['company'=>$add_crude_prod->company->company_name, 'contract'=>$add_crude_prod->contract->contract_name, 'year'=>$add_crude_prod->year, 'month'=>$add_crude_prod->month, 'value'=>$add_crude_prod->value, 'id'=>$add_crude_prod->id];

                    return response()->json(['status'=>'ok', 'message'=>$crude_prod_details, 'info'=>'New Provisional Crude Production Deferment Added Successfully.']);
                } else {
                    return redirect()->route('upstream.index')->with('info', 'Provisional Crude Production Deferment Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editProductionDeferment(Request $request)
    {
        $CRU_PROD_ = \App\up_crude_production_deferment::where('id', $request->id)->first();

        return view('upstream.modals.editProductionDeferment', compact('CRU_PROD_'));
    }

    public function upload_production_deferment(Request $request)
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
                    $month = $row['D'];
                    if ($month == 'January') {
                        $days = 31;
                    } elseif ($month == 'Febuary') {
                        $days = 28;
                    } elseif ($month == 'March') {
                        $days = 31;
                    } elseif ($month == 'April') {
                        $days = 30;
                    } elseif ($month == 'May') {
                        $days = 31;
                    } elseif ($month == 'June') {
                        $days = 30;
                    } elseif ($month == 'July') {
                        $days = 31;
                    } elseif ($month == 'August') {
                        $days = 31;
                    } elseif ($month == 'September') {
                        $days = 30;
                    } elseif ($month == 'October') {
                        $days = 31;
                    } elseif ($month == 'November') {
                        $days = 30;
                    } elseif ($month == 'December') {
                        $days = 31;
                    }

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['A']}%", $row['A']);
                    $results_2 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['B']}%", $row['B']);

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
                                'year' => $row['C'], 'type' => 'up_crude_production_deferment',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $contract_id = $results_2['name'];
                    }

                    //INSERTING NEW Provisional Crude Production
                    $add_prod = \App\up_crude_production_deferment::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $company_id,
                            'contract_id' => $contract_id,
                            'year' => $row['C'],
                            'month' => $row['D'],
                            'value' => $row['E'],
                            'average_daily_production' => ($row['E'] / $days),
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_crude_production_deferment::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $contract_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Crude Production Deferment ');
            //Audit Logging
            self::log_audit_trail('Crude Production Deferment', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Crude Production Deferment Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewProductionDeferment(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Crude Prod Defer', 'Viewed Data');
        $CRU_PROD = \App\up_crude_production_deferment::where('id', $request->id)->first();

        return view('upstream.view.viewProductionDeferment', compact('CRU_PROD'));
    }

    public function download_production_deferment($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_crude_production_deferment::where('year', 'like', "%$txt%")
                ->orwhere('month', 'like', Session::get("%$txt%"))->orwhere('value', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('contract', function ($query) use ($txt) {
                    $query->where('contract_name', 'like', '$txt');
                })
            ->get();
        } else {
            $data = \App\up_crude_production_deferment::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Crude Prod Defer', 'Downloaded Data');

        $view = 'upstream.excel.crude_production_deferment_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Crude Production Deferment.xlsx');
    }

    public function approveProductionDeferment(Request $request)
    {
        $deferments = \App\up_crude_production_deferment::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveProductionDeferment', compact('deferments'));
    }

    public function add_seismic_data(Request $request)
    {
        try {
            //INSERTING NEW Seismic Data
            $add_seismic_data = \App\up_seismic_data::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'field_id' => $request->field_id,
                'terrain_id' => $request->terrain_id,
                'geophysical_id' => $request->geophysical_id,
                'geotechnical_id' => $request->geotechnical_id,
                'seismic_type' => $request->seismic_type,
                'approved_coverage' => $request->approved_coverage,
                'actual_coverage' => $request->actual_coverage,
                'status' => $request->status,
                'remark' => $request->remark,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $terrain_id = $request->terrain_id;
            $geophysical_id = $request->geophysical_id;
            $geotechnical_id = $request->geotechnical_id;
            $seismic_type = $request->seismic_type;
            $status = $request->status;
            if (! empty($id)) {
                if (! empty($terrain_id)) {
                    $this->updateTempRecord($id, 'up_seismic_data', 'column_1');
                }
                if (! empty($geophysical_id)) {
                    $this->updateTempRecord($id, 'up_seismic_data', 'column_2');
                }
                if (! empty($geotechnical_id)) {
                    $this->updateTempRecord($id, 'up_seismic_data', 'column_3');
                }
                if (! empty($seismic_type)) {
                    $this->updateTempRecord($id, 'up_seismic_data', 'column_4');
                }
                if (! empty($status)) {
                    $this->updateTempRecord($id, 'up_seismic_data', 'column_5');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_seismic_data::class, $id, 'up_seismic_data');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Seismic Data ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Seismic Data', 'Update Record');
            } else {
                self::log_audit_trail('Seismic Data', 'Add Record');
            }

            if ($request->ajax()) {
                $seismic_data_details = ['year'=>$add_seismic_data->year, 'month'=>$add_seismic_data->month, 'field'=>$add_seismic_data->field_id, 'terrain'=>$add_seismic_data->terrain->terrain_name, 'geophysical'=>'', 'geotechnical'=>'', 'seismic_type'=>$add_seismic_data->seismic_types->seismic_type_name, 'approved_coverage'=>$add_seismic_data->approved_coverage, 'actual_coverage'=>$add_seismic_data->actual_coverage, 'status'=>$add_seismic_data->status, 'remark'=>$add_seismic_data->remark, 'id'=>$add_seismic_data->id];

                return response()->json(['status'=>'ok', 'message'=>$seismic_data_details, 'info'=>'New Seismic Data Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Seismic Data Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSeismicData(Request $request)
    {
        $SEIS_DA_ = \App\up_seismic_data::where('id', $request->id)->first();

        $one_sei = \App\SeismicType::where('id', $SEIS_DA_->seismic_type)->first();
        $all_sei = \App\SeismicType::orderBy('seismic_type_name', 'asc')->get();

        return view('upstream.modals.editSeismicData', compact('SEIS_DA_', 'one_sei', 'all_sei'));
    }

    public function upload_seismic_data(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['D']}%", $row['D']);
                    $results_2 = $this->resolveMasterData(\App\up_geophysical::class, 'geophysical_name', "%{$row['E']}%", $row['E']);
                    $results_3 = $this->resolveMasterData(\App\up_geotechnical::class, 'geotechnical_name', "%{$row['F']}%", $row['F']);
                    $results_4 = $this->resolveMasterData(\App\SeismicType::class, 'seismic_type_name', "%{$row['G']}%", $row['G']);
                    $results_5 = $this->resolveMasterData(\App\status_category::class, 'status', "%{$row['J']}%", $row['J']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3) {
                        //checking individual columns if there is a match
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
                        if ($results_3['stage_id'] == 3) {
                            $column_3 = $row['F'];
                        } else {
                            $column_3 = '';
                        }
                        if ($results_4['stage_id'] == 3) {
                            $column_4 = $row['G'];
                        } else {
                            $column_4 = '';
                        }
                        if ($results_5['stage_id'] == 3) {
                            $column_5 = $row['J'];
                        } else {
                            $column_5 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'up_seismic_data',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4, 'column_5' => $column_5,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $terrain_id = 0;
                        } else {
                            $terrain_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $geophysical_id = 0;
                        } else {
                            $geophysical_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $geotechnical_id = 0;
                        } else {
                            $geotechnical_id = $results_3['name'];
                        }
                        if ($results_4['stage_id'] == 3) {
                            $seismic_type = 0;
                        } else {
                            $seismic_type = $results_4['name'];
                        }
                        if ($results_5['stage_id'] == 3) {
                            $status = 0;
                        } else {
                            $status = $results_5['name'];
                        }
                    } else {
                        $terrain_id = $results_1['name'];
                        $geophysical_id = $results_2['name'];
                        $geotechnical_id = $results_3['name'];
                        $seismic_type = $results_4['name'];
                        $status = $results_5['name'];
                    }

                    //INSERTING NEW
                    $add_seis = \App\up_seismic_data::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'field_id' => $row['C'],
                            'terrain_id' => $terrain_id,
                            'geophysical_id' => $geophysical_id,
                            'geotechnical_id' => $geotechnical_id,
                            'seismic_type' => $seismic_type,
                            'approved_coverage' => $row['H'],
                            'actual_coverage' => $row['I'],
                            'status' => $status,
                            'remark' => $row['K'],
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3) {
                        $this->updateTable(\App\up_seismic_data::class, 'pending_id', $add_seis->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_seis->id);
                    }
                    $terrain_id = '';
                    $geophysical_id = '';
                    $geotechnical_id = '';
                    $seismic_type = '';
                    $status = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Seismic Data ');
            //Audit Logging
            self::log_audit_trail('Seismic Data', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Seiemic Data Updated Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSeismicData(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Seismic Data', 'Viewed Data');
        $SEIS_DATA = \App\up_seismic_data::where('id', $request->id)->first();

        return view('upstream.view.viewSeismicData', compact('SEIS_DATA'));
    }

    public function download_seismic_data($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_seismic_data::where('year', 'like', "%$txt%")
                ->orwhere('month', 'like', "%$txt%")->orwhere('field_id', 'like', "%$txt%")
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
                ->orwhereHas('geophysical', function ($query) use ($txt) {
                    $query->where('geophysical_name', 'like', "%$txt%");
                })
                ->orwhereHas('geotechnical', function ($query) use ($txt) {
                    $query->where('geotechnical_name', 'like', "%$txt%");
                })
                ->orwhereHas('seismic_types', function ($query) use ($txt) {
                    $query->where('seismic_type_name', 'like', "%$txt%");
                })
                ->orwhereHas('status_category', function ($query) use ($txt) {
                    $query->where('status', 'like', "%$txt%");
                })
                ->orwhereHas('terrain', function ($query) use ($txt) {
                    $query->where('terrain_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_seismic_data::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Seismic Data', 'Downloaded Data');

        $view = 'upstream.excel.seismic_data_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Seismic Data.xlsx');
    }

    public function approveSeismic(Request $request)
    {
        $seismic = \App\up_seismic_data::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveSeismic', compact('seismic'));
    }

    public function add_rig_disposition(Request $request)
    {
        // $year = $request->year;   $rig_type_id = $request->rig_type_id;
        // $rig_disp = \App\up_rig_disposition::where('year', $year)->where('rig_type_id', $rig_type_id)->first();
        // if($rig_disp)
        // {
        //     if($request->ajax() && $request->id == '')
        //      {
        //         $rig_type = $rig_disp->rig_type->rig_type_name;
        //         return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$rig_type.' Rig Type For Year ' .$year. ' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
        //      }
        //      else { goto edit; }
        // }
        // else { goto edit; }
        // {
        //     edit:
        try {
            //INSERTING NEW Rig Disposition
            $add_rig = \App\up_rig_disposition::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'rig_type_id' => $request->rig_type_id,
                    'terrain_id' => $request->terrain_id,
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
            $rig_type_id = $request->rig_type_id;
            $terrain_id = $request->terrain_id;
            if (! empty($id)) {
                if (! empty($rig_type_id)) {
                    $this->updateTempRecord($id, 'up_rig_disposition', 'column_1');
                }
                if (! empty($terrain_id)) {
                    $this->updateTempRecord($id, 'up_rig_disposition', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_rig_disposition::class, $id, 'up_rig_disposition');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Rig Disposition ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Rig Disposition', 'Update Record');
            } else {
                self::log_audit_trail('Rig Disposition', 'Add Record');
            }

            if ($request->ajax()) {
                $rig_disp_details = ['year'=>$add_rig->year, 'rig_type'=>$add_rig->rig_type->rig_type_name, 'terrain'=>$add_rig->terrain->terrain_name, 'january'=>$add_rig->january, 'febuary'=>$add_rig->febuary, 'march'=>$add_rig->march, 'april'=>$add_rig->april, 'may'=>$add_rig->may, 'june'=>$add_rig->june, 'july'=>$add_rig->july, 'august'=>$add_rig->august, 'september'=>$add_rig->september, 'october'=>$add_rig->october, 'november'=>$add_rig->november, 'december'=>$add_rig->december, 'id'=>$add_rig->id];

                return response()->json(['status'=>'ok', 'message'=>$rig_disp_details, 'info'=>'New Rig Disposition Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Rig Disposition Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        // }
    }

    public function editRigDisposition(Request $request)
    {
        $RIG_DIS_ = \App\up_rig_disposition::where('id', $request->id)->first();

        return view('upstream.modals.editRigDisposition', compact('RIG_DIS_'));
    }

    public function upload_rig_disposition(Request $request)
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
                // $year = $row['A'];
                // $rig_type_id = $this->resolveModelId('\App\RigType', 'rig_type_name', $row['B']);
                // $terrain_id = $this->resolveModelId('\App\terrain', 'terrain_name', $row['C']);
                // $rig_disp = \App\up_rig_disposition::where('year', $year)->where('rig_type_id', $rig_type_id)->where('terrain_id', $terrain_id)->first();
                // if($rig_disp)
                // {
                //     $rig_type = $rig_disp->rig_type->rig_type_name;
                //     return redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$rig_type.' Rig Type, Year ' .$year. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else { goto edit; }
                // {
                // edit:
                if ($key >= 2) {

                            //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\RigType::class, 'rig_type_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['C']}%", $row['C']);

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
                                    'year' => $row['A'], 'type' => 'up_rig_disposition',
                                    'column_1' => $column_1, 'column_2' => $column_2,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $rig_type_id = 0;
                        } else {
                            $rig_type_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $terrain_id = 0;
                        } else {
                            $terrain_id = $results_2['name'];
                        }
                    } else {
                        $rig_type_id = $results_1['name'];
                        $terrain_id = $results_2['name'];
                    }

                    //INSERTING NEW Rig Disposition
                    $add_rig = \App\up_rig_disposition::updateOrCreate(['year'=> $row['A'],
                        'rig_type_id'=> $this->resolveModelId(\App\RigType::class, 'rig_type_name', $row['B']),
                        'terrain_id'=> $this->resolveModelId(\App\terrain::class, 'terrain_name', $row['C']), ],
                            [
                                'year' => $row['A'],
                                'rig_type_id' => $rig_type_id,
                                'terrain_id' => $terrain_id,
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
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_rig_disposition::class, 'pending_id', $add_rig->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_rig->id);
                    }
                    $rig_type_id = '';
                    $terrain_id = '';
                }
                // }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Rig Disposition ');
            //Audit Logging
            self::log_audit_trail('Rig Disposition ', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Rig Disposition Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRigDisposition(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Rig Disposition', 'Viewed Data');
        $RIG_DISP = \App\up_rig_disposition::where('id', $request->id)->first();

        return view('upstream.view.viewRigDisposition', compact('RIG_DISP'));
    }

    public function download_rig_disposition($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_rig_disposition::where('year', 'like', "%$txt%")
                ->orwhereHas('rig_type', function ($query) use ($txt) {
                    $query->where('rig_type_name', 'like', "%$txt%");
                })
                ->orwhereHas('terrain', function ($query) use ($txt) {
                    $query->where('terrain_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_rig_disposition::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Rig Disposition', 'Downloaded Data');

        $view = 'upstream.excel.rig_disposition_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Rig Disposition.xlsx');
    }

    public function approveRig(Request $request)
    {
        $rig = \App\up_rig_disposition::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveRig', compact('rig'));
    }

    public function add_well_activities(Request $request)
    {
        //checking if for upstream or gas
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section = 'OTHERS';
        }

        $year = $request->year;
        $month = $request->month;
        $terrain_id = $request->terrain_id;
        $class_id = $request->class_id;
        $well_act = \App\up_well_activities::where('year', $year)->where('month', $month)->where('terrain_id', $terrain_id)->where('class_id', $class_id)->first();
        if ($well_act) {
            if ($request->ajax() && $request->id == '') {
                $terrain = $well_act->terrain->terrain_name;
                $class = $well_act->class->class_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$terrain.' Terrain For Year '.$year.' Month '.$month.' Class '.$class.' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            edit:
            try {
                $type_id = $request->type_id;
                if ($type_id != null) {
                    $type_id == 0;
                } else {
                }
                //if($request->type == '') { $type == '0'; } else { $type == $request->type }
                //INSERTING NEW Well Activities By Terrain
                $add_wt = \App\up_well_activities::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'terrain_id' => $request->terrain_id,
                    'class_id' => $request->class_id,
                    'type_id' => $request->type_id,
                    'contract_id' => $request->contract_id,
                    'no_of_well' => $request->no_of_well,
                    'section' => $section,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $terrain_id = $request->terrain_id;
                $class_id = $request->class_id;
                $type_id = $request->type_id;
                $contract_id = $request->contract_id;
                if (! empty($id)) {
                    if (! empty($terrain_id)) {
                        $this->updateTempRecord($id, 'up_well_activities', 'column_1');
                    }
                    if (! empty($class_id)) {
                        $this->updateTempRecord($id, 'up_well_activities', 'column_2');
                    }
                    if (! empty($type_id)) {
                        $this->updateTempRecord($id, 'up_well_activities', 'column_3');
                    }
                    if (! empty($contract_id)) {
                        $this->updateTempRecord($id, 'up_well_activities', 'column_4');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\up_well_activities::class, $id, 'up_well_activities');
                }

                //send mail
                //self::send_all_mail("UPSTREAM - Well Activities ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Well Activities', 'Update Record');
                } else {
                    self::log_audit_trail('Well Activities', 'Add Record');
                }

                if ($request->ajax()) {
                    $terrain_well_details = ['year'=>$add_wt->year, 'month'=>$add_wt->month, 'terrain'=>$add_wt->terrain->terrain_name, 'class'=>$add_wt->class->class_name, 'type'=>$type_id, 'contract'=>$add_wt->contract->contract_name, 'no_of_well'=>$add_wt->no_of_well, 'id'=>$add_wt->id];

                    return response()->json(['status'=>'ok', 'message'=>$terrain_well_details, 'info'=>'New Well Activities Added Successfully.']);
                } else {
                    return redirect()->route('upstream.index')->with('info', 'Well Activities Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editWellActivities(Request $request)
    {
        $WELL = \App\up_well_activities::where('id', $request->id)->first();
        $one_ter = \App\terrain::where('id', $WELL->terrain_id)->first();
        $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();
        $one_cla = \App\well_class::where('id', $WELL->class_id)->first();
        $all_cla = \App\well_class::orderBy('class_name', 'asc')->get();
        $one_typ = \App\well_type::where('id', $WELL->type_id)->first();
        $all_typ = \App\well_type::orderBy('type_name', 'asc')->get();
        $one_con = \App\contract::where('id', $WELL->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();

        return view('upstream.modals.editWellActivities', compact('WELL', 'one_ter', 'all_ter', 'one_cla', 'all_cla', 'one_typ', 'all_typ', 'one_con', 'all_con'));
    }

    public function upload_well_activities(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }

            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                $year = $row['A'];
                $month = $row['B'];
                $terrain_id = $row['C'];
                $class_id = $row['D'];
                $well_act = \App\up_well_activities::where('year', $year)->where('month', $month)->where('terrain_id', $terrain_id)->where('class_id', $class_id)->first();
                if ($well_act) {
                    $class = $well_act->class->class_name;
                    $terrain = $well_act->terrain->terrain_name;

                    return redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$class.' Class, Year '.$year.', '.$month.' Terrain '.$terrain.' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                } else {
                    goto edit;
                }
                {
                        edit:
                         if ($key >= 2) {

                            //script to check if name exist in master record
                             $results_1 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['C']}%", $row['C']);
                             $results_2 = $this->resolveMasterData(\App\well_class::class, 'class_name', "%{$row['D']}%", $row['D']);
                             $results_3 = $this->resolveMasterData(\App\well_type::class, 'type_name', "%{$row['E']}%", $row['E']);
                             $results_4 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['F']}%", $row['F']);

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
                                     $column_3 = $row['E'];
                                 } else {
                                     $column_3 = '';
                                 }
                                 if ($results_4['stage_id'] == 3) {
                                     $column_4 = $row['F'];
                                 } else {
                                     $column_4 = '';
                                 }

                                 //INSERT INTO UNRESOLVED TABLE
                                 $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'up_well_activities',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4,
                                ]);
                                 if ($results_1['stage_id'] == 3) {
                                     $terrain_id = 0;
                                 } else {
                                     $terrain_id = $results_1['name'];
                                 }
                                 if ($results_2['stage_id'] == 3) {
                                     $class_id = 0;
                                 } else {
                                     $class_id = $results_2['name'];
                                 }
                                 if ($results_3['stage_id'] == 3) {
                                     $type_id = 0;
                                 } else {
                                     $type_id = $results_3['name'];
                                 }
                                 if ($results_4['stage_id'] == 3) {
                                     $contract_id = 0;
                                 } else {
                                     $contract_id = $results_4['name'];
                                 }
                             } else {
                                 $terrain_id = $results_1['name'];
                                 $class_id = $results_2['name'];
                                 $type_id = $results_3['name'];
                                 $contract_id = $results_4['name'];
                             }

                             //setting type_id to null if class is Development
                             if ($row['D'] == 'Development') {
                                 $type_id = null;
                             }
                             //INSERTING NEW Well Activities
                             $add_rig = \App\up_well_activities::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'terrain_id' => $terrain_id,
                                'class_id' => $class_id,
                                'type_id' => $type_id,
                                'contract_id' => $contract_id,
                                'no_of_well' => $row['G'],
                                'section' => $section,
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => \Auth::user()->name,
                            ]);

                             //UPDATE ID RECORD
                             if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3) {
                                 $this->updateTable(\App\up_well_activities::class, 'pending_id', $add_rig->id, $pend->id);
                                 $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_rig->id);
                             }
                             $terrain_id = '';
                             $class_id = '';
                             $type_id = '';
                             $contract_id = '';
                         }
                     }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Well Activities ');
            //Audit Logging
            self::log_audit_trail('Well Activities', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Well Activities Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewWellActivities(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Well Activities', 'Viewed Data');
        $WELL = \App\up_well_activities::where('id', $request->id)->first();
        $one_ter = \App\terrain::where('id', $WELL->terrain_id)->first();
        $one_cla = \App\well_class::where('id', $WELL->class_id)->first();
        $one_typ = \App\well_type::where('id', $WELL->type_id)->first();
        $one_con = \App\contract::where('id', $WELL->contract_id)->first();

        return view('upstream.view.viewWellActivities', compact('WELL', 'one_ter', 'one_cla', 'one_typ', 'one_con'));
    }

    public function download_well_activities($type, Request $request)
    {
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) 
        {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section_up = 'UPSTREAM';
            $section_ga = 'GAS';
            $section_ot = 'OTHERS';
        }

        $txt = Session::get('st');
        if ($txt != null) 
        {
            // dd(Session::get('st'));
            $data = \App\up_well_activities::where('year', 'like', "%$txt%")
                ->orwhereHas('type', function ($query) use ($txt) {
                    $query->where('type_name', 'like', "%$txt%");
                })
                ->orwhereHas('terrain', function ($query) use ($txt) {
                    $query->where('terrain_name', 'like', "%$txt%");
                })->where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)
            ->get();
        } else {
            $data = \App\up_well_activities::where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)->get();
        }

        Session::put('search_text', null);

        //Audit Logging
        self::log_audit_trail('Well Activities', 'Downloaded Data');

        $view = 'upstream.excel.well_activities_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Well Activities.xlsx');
    }

    public function approveWell(Request $request)
    {
        $well = \App\up_well_activities::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveWell', compact('well'));
    }

    public function add_drilling_gas(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $field_id = $request->field_id;
        $type_id = 1;
        $well_act = \App\up_drilling_gas::where('year', $year)->where('month', $month)->where('field_id', $field_id)->where('well', $request->well)->where('type_id', $type_id)->first();
        if ($well_act) {
            if ($request->ajax() && $request->id == '') {
                $field = $well_act->field->field_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$well.' '.$field.' Field For Year '.$year.' Month '.$month.' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            edit:
            try {
                $field = \App\field::where('id', $request->field_id)->first();
                if ($field) {
                    $concession_id = $field->concession_id;
                    $company_id = $field->company_id;
                } else {
                    $concession_id = null;
                    $company_id = null;
                }

                if ($request->ag_reserve != null) {
                    $type_id = 1;
                } elseif ($request->gas_reserve != null) {
                    $type_id = 2;
                }
                $id = $request->id;
                if (! empty($id)) {
                    $company_id = $request->company_id;
                } else {
                    $company_id = null;
                }

                //INSERTING NEW Well
                $add_wt = \App\up_drilling_gas::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'field_id' => $request->field_id,
                    'company_id' => $field->company_id,
                    'concession_id' => $field->concession_id,
                    'well' => $request->well,
                    'type_id' => $type_id,
                    'terrain_id' => $request->terrain_id,
                    // 'facility_id' => $request->facility_id,
                    'reserves' => $request->reserves,
                    'off_take' => $request->off_take,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $field_id = $request->field_id;
                $terrain_id = $request->terrain_id;
                if (! empty($id)) {
                    if (! empty($field_id)) {
                        $this->updateTempRecord($id, 'up_drilling_gas', 'column_1');
                    }
                    if (! empty($terrain_id)) {
                        $this->updateTempRecord($id, 'up_drilling_gas', 'column_2');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\up_drilling_gas::class, $id, 'up_drilling_gas');
                }

                //send mail
                //self::send_all_mail("UPSTREAM - Drilling Gas Activities ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Drilling Gas Activities', 'Update Record');
                } else {
                    self::log_audit_trail('Drilling Gas Activities', 'Add Record');
                }

                if ($request->ajax()) {
                    $well_details = ['year'=>$add_wt->year, 'month'=>$add_wt->month, 'field'=>$add_wt->field->field_name, 'company'=>'', 'concession'=>'', 'well'=>$add_wt->well, 'terrain'=>$add_wt->terrain->terrain_name, 'reserves'=>$add_wt->reserves, 'off_take'=>$add_wt->off_take, 'id'=>$add_wt->id];

                    return response()->json(['status'=>'ok', 'message'=>$well_details, 'info'=>'New Drilling Gas Activities Added Successfully.']);
                } else {
                    return redirect()->route('upstream.index')->with('info', 'Drilling Gas Activities Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editDrillingGas(Request $request)
    {
        $WELL = \App\up_drilling_gas::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $WELL->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();
        $one_com = \App\company::where('id', $WELL->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_con = \App\concession::where('id', $WELL->concession_id)->first();
        $all_con = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_ter = \App\terrain::where('id', $WELL->terrain_id)->first();
        $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();

        return view('upstream.modals.editDrillingGas', compact('WELL', 'one_fie', 'all_fie', 'one_com', 'all_com', 'one_con', 'all_con', 'one_ter', 'all_ter'));
    }

    public function upload_drilling_gas(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['E']}%", $row['E']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
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

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'up_drilling_gas',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $terrain_id = 0;
                        } else {
                            $terrain_id = $results_2['name'];
                        }
                    } else {
                        $field_id = $results_1['name'];
                        $terrain_id = $results_2['name'];
                    }   //return $results_1['name'];

                    $field = \App\field::where('id', $results_1)->first();
                    $type_id = 1;
                    if ($field) {
                        $company_id = $field->company_id;
                        $concession_id = $field->concession_id;
                    } else {
                        $company_id = 0;
                        $concession_id = 0;
                    }

                    if ($results_2 == null) {
                        $terrain_id = $field->terrain_id;
                    }

                    //INSERTING NEW Well Drilling Gas
                    $add_rig = \App\up_drilling_gas::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'field_id' => $field_id,
                            'company_id' => $company_id,
                            'concession_id' => $concession_id,
                            'well' => $row['D'],
                            'type_id' => $type_id,
                            'terrain_id' => $terrain_id,
                            // 'facility_id' => $facility_id,
                            'reserves' => $row['F'],
                            'off_take' => $row['G'],
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_drilling_gas::class, 'pending_id', $add_rig->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_rig->id);
                    }
                    $field_id = '';
                    $terrain_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Drilling Gas ');
            //Audit Logging
            self::log_audit_trail('Drilling Gas', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Drilling Gas Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewDrillingGas(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Drilling Gas', 'Viewed Data');
        $WELL = \App\up_drilling_gas::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $WELL->field_id)->first();
        $one_com = \App\company::where('id', $WELL->company_id)->first();
        $one_con = \App\concession::where('id', $WELL->concession_id)->first();
        $one_ter = \App\terrain::where('id', $WELL->terrain_id)->first();

        return view('upstream.view.viewDrillingGas', compact('WELL', 'one_fie', 'one_com', 'one_con', 'one_ter'));
    }

    public function download_drilling_gas($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_drilling_gas::where('year', 'like', "%$txt%")->orwhere('well', 'like', "%$txt%")
                ->orwhere('reserves', 'like', "%$txt%")->orwhere('off_take', 'like', "%$txt%")
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
                ->orwhereHas('concession', function ($query) use ($txt) {
                    $query->where('concession_name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('terrain', function ($query) use ($txt) {
                    $query->where('terrain_name', 'like', "%$txt%");
                })->where('type_id', 1)
            ->get();
        } else {
            $data = \App\up_drilling_gas::where('type_id', 1)->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Drilling Gas', 'Downloaded Data');

        $view = 'upstream.excel.up_drilling_gas_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Drilling Gas.xlsx');
    }

    public function approveDrillingGas(Request $request)
    {
        $drilling_gas = \App\up_drilling_gas::where('stage_id', '0')->where('type_id', 1)->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveDrillingGas', compact('drilling_gas'));
    }

    public function add_gas_initial_completion(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $field_id = $request->field_id;
        $type_id = 2;
        $well_act = \App\up_drilling_gas::where('year', $year)->where('month', $month)->where('field_id', $field_id)->where('well', $request->well)->where('type_id', $type_id)->first();
        if ($well_act) {
            if ($request->ajax() && $request->id == '') {
                $field = $well_act->field->field_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$well.' '.$field.' Field For Year '.$year.' Month '.$month.' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            edit:
            try {
                $field = \App\field::where('id', $request->field_id)->first();
                if ($field) {
                    $concession_id = $field->concession_id;
                    $company_id = $field->company_id;
                } else {
                    $concession_id = null;
                    $company_id = null;
                }

                $id = $request->id;
                if (! empty($id)) {
                    $company_id = $request->company_id;
                } else {
                    $company_id = null;
                }

                //INSERTING NEW Well
                $add_wt = \App\up_drilling_gas::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'field_id' => $request->field_id,
                    'company_id' => $field->company_id,
                    'concession_id' => $field->concession_id,
                    'well' => $request->well,
                    'type_id' => $type_id,
                    'facility_id' => $request->facility_id,
                    'reserves' => $request->reserves,
                    'off_take' => $request->off_take,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //UPDATING UNRESOLVED TABLE RECORDS
                $id = $request->id;
                $field_id = $request->field_id;
                $facility_id = $request->facility_id;
                if (! empty($id)) {
                    if (! empty($field_id)) {
                        $this->updateTempRecord($id, 'up_drilling_gas', 'column_1');
                    }
                    // if(!empty($terrain_id)){ $this->updateTempRecord($id, 'up_drilling_gas', 'column_2'); }
                    if (! empty($facility_id)) {
                        $this->updateTempRecord($id, 'up_drilling_gas', 'column_3');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\up_drilling_gas::class, $id, 'up_drilling_gas');
                }

                //send mail
                //self::send_all_mail("UPSTREAM - Gas Initial Completion ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Gas Initial Completion', 'Update Record');
                } else {
                    self::log_audit_trail('Gas Initial Completion', 'Add Record');
                }

                if ($request->ajax()) {
                    $well_details = ['year'=>$add_wt->year, 'month'=>$add_wt->month, 'field'=>$add_wt->field->field_name, 'company'=>'', 'concession'=>'', 'well'=>$add_wt->well, 'facility'=>$add_wt->facility->facility_name, 'reserves'=>$add_wt->reserves, 'off_take'=>$add_wt->off_take, 'id'=>$add_wt->id];

                    return response()->json(['status'=>'ok', 'message'=>$well_details, 'info'=>'New Gas Initial Completion Added Successfully.']);
                } else {
                    return redirect()->route('upstream.index')->with('info', 'Gas Initial Completion Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editGasInitialCompletion(Request $request)
    {
        $WELL = \App\up_drilling_gas::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $WELL->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();
        $one_com = \App\company::where('id', $WELL->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_con = \App\concession::where('id', $WELL->concession_id)->first();
        $all_con = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_fac = \App\facility::where('id', $WELL->facility_id)->first();
        $all_fac = \App\facility::orderBy('facility_name', 'asc')->get();

        return view('upstream.modals.editGasInitialCompletion', compact('WELL', 'one_fie', 'all_fie', 'one_com', 'all_com', 'one_con', 'all_con', 'one_fac', 'all_fac'));
    }

    public function upload_gas_initial_completion(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);
                    // $results_2 = $this->resolveMasterData('\App\terrain', 'terrain_name', "%{$row['F']}%", $row['F']);
                    $results_2 = $this->resolveMasterData(\App\facility::class, 'facility_name', "%{$row['E']}%", $row['E']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['C'];
                        } else {
                            $column_1 = '';
                        }
                        // if($results_2['stage_id'] == 3){ $column_2 = $row['F']; }else{ $column_2 = ''; }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['E'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'up_drilling_gas',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_1['name'];
                        }
                        // if($results_2['stage_id'] == 3){ $terrain_id = 0; }else{$terrain_id = $results_2['name']; }
                        if ($results_2['stage_id'] == 3) {
                            $facility_id = 0;
                        } else {
                            $facility_id = $results_2['name'];
                        }
                    } else {
                        $field_id = $results_1['name'];
                        $facility_id = $results_2['name'];
                    }

                    $field = \App\field::where('id', $results_1)->first();
                    $type_id = 2;
                    if ($field) {
                        $company_id = $field->company_id;
                        $concession_id = $field->concession_id;
                    } else {
                        $company_id = 0;
                        $concession_id = 0;
                    }

                    // if($results_2 == NULL){ $terrain_id = $field->terrain_id; }

                    //INSERTING NEW Well Drilling Gas
                    $add_rig = \App\up_drilling_gas::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'field_id' => $field_id,
                            'company_id' => $company_id,
                            'concession_id' => $concession_id,
                            'well' => $row['D'],
                            'type_id' => $type_id,
                            'facility_id' => $facility_id,
                            'reserves' => $row['F'],
                            'off_take' => $row['G'],
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_drilling_gas::class, 'pending_id', $add_rig->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_rig->id);
                    }
                    $field_id = '';
                    $facility_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Gas Initial Completion ');
            //Audit Logging
            self::log_audit_trail('Gas Initial Completion', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Gas Initial Completion Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewGasInitialCompletion(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Drilling Gas', 'Viewed Data');
        $WELL = \App\up_drilling_gas::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $WELL->field_id)->first();
        $one_com = \App\company::where('id', $WELL->company_id)->first();
        $one_con = \App\concession::where('id', $WELL->concession_id)->first();
        $one_fac = \App\facility::where('id', $WELL->facility_id)->first();

        return view('upstream.view.viewGasInitialCompletion', compact('WELL', 'one_fie', 'one_com', 'one_con', 'one_fac'));
    }

    public function download_gas_initial_completions($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_drilling_gas::where('year', 'like', "%$txt%")->orwhere('well', 'like', "%$txt%")
                ->orwhere('reserves', 'like', "%$txt%")->orwhere('off_take', 'like', "%$txt%")
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
                ->orwhereHas('concession', function ($query) use ($txt) {
                    $query->where('concession_name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                // ->orwhereHas('terrain', function($query) use ($txt) {   $query->where('terrain_name','like',"%$txt%");    })
                ->orwhereHas('facility', function ($query) use ($txt) {
                    $query->where('facility_name', 'like', "%$txt%");
                })->where('type_id', 2)
            ->get();
        } else {
            $data = \App\up_drilling_gas::where('type_id', 2)->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Initial Completion', 'Downloaded Data');

        $view = 'upstream.excel.up_drilling_gas_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Gas Initial Completion.xlsx');
    }

    public function approveGasInitialCompletion(Request $request)
    {
        $drilling_gas = \App\up_drilling_gas::where('stage_id', '0')->where('type_id', 2)->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveGasInitialCompletion', compact('drilling_gas'));
    }

    public function getDownload()
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path().'/public/assets/images/datatemplate/Upstream/smaplereserves.xlsx';

        $headers = ['Content-Type' => 'application/pdf'];

        return response()->download(public_path('/public/assets/images/datatemplate/Upstream/smaplereserves.xlsx'));
    }

    public function add_well_completion(Request $request)
    {
        
        try {
          
            $validate = Validator::make($request->all(), [
                'type_id' => 'required',
            ]);
            
            if($validate->fails())
            {
                return response()->json([
                            'status'=>'false',
                            'info'=> 'Completion Type is Required',
                            'message' => 'Completion Type is Required']);
            }
            
            
           
            //checking if for upstream or gas   
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }
            
            $field = \App\field::where('id', $request->field_id)->first();

            
            if ($field) {
                $concession = \App\concession::where('company_id', $field->company_id)->first();
             
            } else {
                $concession = '';
            }
        
            $authUser = auth()->user();
            //INSERTING NEW Well Activities By Contract
            $add_comp = \App\up_well_completion::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'field_id' => $request->field_id,
                'contract_id' => $concession->contract_id ?? null,
                'terrain_id' => $concession->terrain_id ?? null,
                'well_type' => $request->well_type ?? null,
                'type_id' => $request->type_id ??  1,
                'number_of_well' => $request->number_of_well,
                'section' => $section,
                'batch_number' => \Carbon\Carbon::now()->format('y-m-d'),
                'created_by' => $authUser->name ?? $authUser->id,
            ]);

            
      
            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $field_id = $request->field_id;
            $well_type = $request->well_type;
            $type_id = $request->type_id;
            if (! empty($id)) {
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'up_well_completion', 'column_1');
                }
                if (! empty($well_type)) {
                    $this->updateTempRecord($id, 'up_well_completion', 'column_2');
                }
                if (! empty($type_id)) {
                    $this->updateTempRecord($id, 'up_well_completion', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_well_completion::class, $id, 'up_well_completion');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Well Completion ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Well Completion', 'Update Record');
            } else {
                self::log_audit_trail('Well Completion', 'Add Record');
            }

            if ($request->ajax()) {
                $completion_details = ['year'=>$add_comp->year, 'month'=>$add_comp->month, 'field'=>$add_comp->field->field_name, 'well_type'=>$add_comp->well_type, 'type'=>$add_comp->type, 'number_of_well'=>$add_comp->number_of_well, 'id'=>$add_comp->id];

                return response()->json(['status'=>'ok', 'message'=>$completion_details, 'info'=>'New Well Completion Activities Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Well Completion Activities Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editWellCompletion(Request $request)
    {
        $WEL_COMP = \App\up_well_completion::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $WEL_COMP->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();

        return view('upstream.modals.editWellCompletion', compact('WEL_COMP', 'one_fie', 'all_fie'));
    }

    public function upload_well_completion(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }

            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                $f_id = $this->resolveModelId(\App\field::class, 'field_name', $row['C']);
                $field = \App\field::where('id', $f_id)->first();
                if ($field) {
                    $concession = \App\concession::where('company_id', $field->company_id)->first();
                } else {
                    $concession = '';
                }

                if ($key >= 2) {

                        //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\completion_type::class, 'type_name', "%{$row['D']}%", $row['D']);
                    $results_3 = $this->resolveMasterData(\App\completion_type::class, 'type_name', "%{$row['E']}%", $row['E']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
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

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'up_well_completion',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $well_type = 0;
                        } else {
                            $well_type = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $type_id = 0;
                        } else {
                            $type_id = $results_3['name'];
                        }
                    } else {
                        $field_id = $results_1['name'];
                        $well_type = $results_2['name'];
                        $type_id = $results_3['name'];
                    }

                    //INSERTING NEW Rig Disposition
                    $add_rig = \App\up_well_completion::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'field_id' =>  $field_id,
                            'contract_id' => $concession->contract_id,
                            'terrain_id' => $concession->terrain_id,
                            'well_type' =>  $well_type,
                            'type_id' =>  $type_id,
                            'number_of_well' => $row['F'],
                            'section' => $section,
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' =>  \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\up_well_completion::class, 'pending_id', $add_rig->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_rig->id);
                    }
                    $field_id = '';
                    $well_type = '';
                    $type_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Well Completion ');
            //Audit Logging
            self::log_audit_trail('Well Completion', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Well Completion Activities Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_well_completion($type, Request $request)
    {
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section_up = 'UPSTREAM';
            $section_ga = 'GAS';
            $section_ot = 'OTHERS';
        }

        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_well_completion::where('year', 'like', "%$txt%")
            ->orwhere('month', 'like', "%$txt%")
            ->orwhereHas('field', function ($query) use ($txt) {
                $query->where('field_name', 'like', "%$txt%");
            })
            ->orwhereHas('welltype', function ($query) use ($txt) {
                $query->where('type_name', 'like', "%$txt%");
            })
            ->orwhereHas('type', function ($query) use ($txt) {
                $query->where('type_name', 'like', "%$txt%");
            })->where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)
            ->get();
        } else {
            $data = \App\up_well_completion::where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)->get();
        }

        Session::put('search_text', null);

        //Audit Logging
        self::log_audit_trail('Well Activities Completion', 'Viewed Data');

        $view = 'upstream.excel.well_completion_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Well Activity Completion.xlsx');
    }

    public function approveCompletion(Request $request)
    {
        $completion = \App\up_well_completion::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveCompletion', compact('completion'));
    }

    public function add_well_workover(Request $request)
    {
        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }
            $field = \App\field::where('id', $request->field_id)->first();
            $id = $request->id;

            // for editting to get company and concession
            if ($id != '') {
                $company_id = $request->company_id;
                $concession_id = $request->concession_id;
            } else {
                $company_id = $field->company_id;
                $concession_id = $field->concession_id;
            }

            //INSERTING NEW Well Activities workover
            $add_work = \App\up_well_workover::updateOrCreate(['id'=> $request->id],
            [

                'year' => $request->year,
                'month' => $request->month,
                'field_id' => $request->field_id,
                'type_id' => $request->type_id,
                'company_id' => $company_id,
                'concession_id' => $concession_id,
                'well' => $request->well,
                'facility_id' => $request->facility_id,
                'section' => $section,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,

            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $field_id = $request->field_id;
            $facility_id = $request->facility_id;
            if (! empty($id)) {
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'up_well_workover', 'column_1');
                }
                if (! empty($facility_id)) {
                    $this->updateTempRecord($id, 'up_well_workover', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_well_workover::class, $id, 'up_well_workover');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Well Workover ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Well Workover', 'Update Record');
            } else {
                self::log_audit_trail('Well Workover', 'Add Record');
            }

            if ($request->ajax()) {
                $workover_details = ['year'=>$add_work->year, 'month'=>$add_work->month, 'field'=>$add_work->field->field_name, 'company'=>$add_work->company->company_name, 'concession'=>$add_work->concession->concession_name, 'type'=>$add_work->type, 'well'=>$add_work->well, 'facility'=>$add_work->facility->facility_name, 'id'=>$add_work->id];

                return response()->json(['status'=>'ok', 'message'=>$workover_details, 'info'=>'New Well Workover Activities Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Well Workover Activities Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editWellWorkover(Request $request)
    {
        $WEL_WORK = \App\up_well_workover::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $WEL_WORK->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();
        $one_com = \App\company::where('id', $WEL_WORK->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_con = \App\concession::where('id', $WEL_WORK->concession_id)->first();
        $all_con = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_fac = \App\facility::where('id', $WEL_WORK->facility_id)->first();
        $all_fac = \App\facility::orderBy('facility_name', 'asc')->get();

        return view('upstream.modals.editWellWorkover', compact('WEL_WORK', 'one_fie', 'all_fie', 'one_com', 'all_com', 'one_con', 'all_con', 'one_fac', 'all_fac'));
    }

    public function upload_well_workover(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }

            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {

                        //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\workover_type::class, 'type_name', "%{$row['D']}%", $row['D']);
                    $results_3 = $this->resolveMasterData(\App\facility::class, 'facility_name', "%{$row['F']}%", $row['F']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
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

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'up_well_workover',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $facility_id = 0;
                        } else {
                            $facility_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $facility_id = 0;
                        } else {
                            $facility_id = $results_3['name'];
                        }
                    } else {
                        $field_id = $results_1['name'];
                        $type_id = $results_2['name'];
                        $facility_id = $results_3['name'];
                    }

                    $field = \App\field::where('field_name', $row['C'])->first();
                    //INSERTING NEW Rig workover
                    $add_work = \App\up_well_workover::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'field_id' => $field_id,
                            'type_id' => $type_id,
                            'company_id' => $field->company_id,
                            'concession_id' => $field->concession_id,
                            'well' => $row['E'],
                            'facility_id' => $facility_id,
                            'section' => $section,
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' =>  \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\up_well_workover::class, 'pending_id', $add_work->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_work->id);
                    }
                    $field_id = '';
                    $type_id = '';
                    $facility_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Well Workover ');
            //Audit Logging
            self::log_audit_trail('Well Workover', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Well Workover Activities Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_well_workover($type, Request $request)
    {
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section_up = 'UPSTREAM';
            $section_ga = 'GAS';
            $section_ot = 'OTHERS';
        }

        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_well_workover::where('year', 'like', "%$txt%")
            ->orwhere('month', 'like', "%$txt%")->orwhere('well', 'like', "%$txt%")
            ->orwhereHas('field', function ($query) use ($txt) {
                $query->where('field_name', 'like', "%$txt%");
            })
            ->orwhereHas('type', function ($query) use ($txt) {
                $query->where('type_name', 'like', "%$txt%");
            })
            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })
            ->orwhereHas('concession', function ($query) use ($txt) {
                $query->where('concession_name', 'like', "%$txt%");
            })
            ->orwhereHas('facility', function ($query) use ($txt) {
                $query->where('facility_name', 'like', "%$txt%");
            })->where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)
            ->get();
        } else {
            $data = \App\up_well_workover::where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Well Activities Workover', 'Viewed Data');

        $view = 'upstream.excel.well_workover_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Well Workover.xlsx');
    }

    public function approveWorkover(Request $request)
    {
        $workover = \App\up_well_workover::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveWorkover', compact('workover'));
    }

    public function add_well_plugback_abandonment(Request $request)
    {
        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }

            //INSERTING NEW Well Activities plugroute_'upstream.index'abandonment
            $add_plug = \App\up_well_plugback_abandonment::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'field_id' => $request->field_id,
                'type_id' => $request->type_id,
                'number_of_well' => $request->number_of_well,
                'section' => $section,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $field_id = $request->field_id;
            if (! empty($id)) {
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'up_well_plugback_abandonment', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_well_plugback_abandonment::class, $id, 'up_well_plugback_abandonment');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Well Plugback Abandonment ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Well Plugback Abandonment', 'Update Record');
            } else {
                self::log_audit_trail('Well Plugback Abandonment', 'Add Record');
            }

            if ($request->ajax()) {
                $workover_details = ['year'=>$add_plug->year, 'month'=>$add_plug->month, 'field'=>$add_plug->field->field_name, 'type'=>$add_plug->type, 'number_of_well'=>$add_plug->number_of_well, 'id'=>$add_plug->id];

                return response()->json(['status'=>'ok', 'message'=>$workover_details, 'info'=>'New Well Plugback Abandonment Activities Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Well Plugback Abandonment Activities Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editWellPlugbackAbandonment(Request $request)
    {
        $WEL_PLUG = \App\up_well_plugback_abandonment::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $WEL_PLUG->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();

        return view('upstream.modals.editWellPlugbackAbandonment', compact('WEL_PLUG', 'one_fie', 'all_fie'));
    }

    public function upload_well_plugback_abandonment(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }

            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {

                        //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);
                    $results_2 = $this->resolveMasterData(\App\plugback_type::class, 'type_name', "%{$row['D']}%", $row['D']);

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
                                'year' => $row['A'], 'type' => 'up_well_plugback_abandonment', 'column_1' => $column_1,
                                'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $type_id = 0;
                        } else {
                            $type_id = $results_2['name'];
                        }
                    } else {
                        $field_id = $results_1['name'];
                        $type_id = $results_2['name'];
                    }

                    //INSERTING NEW Rig workover
                    $add_work = \App\up_well_plugback_abandonment::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'field_id' => $field_id,
                            'type_id' => $type_id,
                            'number_of_well' => $row['E'],
                            'section' => $section,
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' =>  \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_well_plugback_abandonment::class, 'pending_id', $add_work->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_work->id);
                    }
                    $field_id = '';
                    $type_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Well Plugback Abandonment ');
            //Audit Logging
            self::log_audit_trail('Well Plugback Abandonment', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Well Plugback Abandonment Activities Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_well_plugback_abandonment($type, Request $request)
    {
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section_up = 'UPSTREAM';
            $section_ga = 'GAS';
            $section_ot = 'OTHERS';
        }

        if ($txt != null) {
            $data = \App\up_well_plugback_abandonment::where('year', 'like', Session::get('st'))
            ->orwhere('month', 'like', Session::get('st'))
            ->orwhereHas('field', function ($query) use ($request) {
                $query->where('field_name', 'like', Session::get('st'));
            })
            ->orwhereHas('type', function ($query) use ($request) {
                $query->where('type_name', 'like', Session::get('st'));
            })->where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)
            ->get();
        } else {
            $data = \App\up_well_plugback_abandonment::where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Well Activities Plugback Abandonment', 'Viewed Data');

        $view = 'upstream.excel.well_plugback_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Well Plugback Abandonment.xlsx');
    }

    public function approvePlugback(Request $request)
    {
        $plugback = \App\up_well_plugback_abandonment::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approvePlugback', compact('plugback'));
    }

    public function add_oil_facility(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $company_id = $request->company_id;
        $facility_id = $request->facility_id;
        $gas_facs = \App\up_major_oil_facilities::where('year', $year)->where('month', $month)->where('company_id', $company_id)->where('facility_id', $facility_id)->first();
        if ($gas_facs) {
            if ($request->ajax() && $request->id == '') {
                $comp = $gas_facs->company->company_name;
                $fac = $gas_facs->facility->facility_name;

                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$fac.' Facility For Year '.$year.' Month '.$month.' Company '.$company.' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW Oil Facility

                $gas_facility = \App\up_major_oil_facilities::updateOrCreate(['id'=> $request->id],
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
                $location_id = $request->location_id;
                $terrain_id = $request->terrain_id;
                $status_id = $request->status_id;
                $license_status = $request->license_status;
                if (! empty($id)) {
                    if (! empty($company_id)) {
                        $this->updateTempRecord($id, 'up_major_oil_facilities', 'column_1');
                    }
                    if (! empty($facility_id)) {
                        $this->updateTempRecord($id, 'up_major_oil_facilities', 'column_2');
                    }
                    if (! empty($facility_type_id)) {
                        $this->updateTempRecord($id, 'up_major_oil_facilities', 'column_3');
                    }
                    if (! empty($location_id)) {
                        $this->updateTempRecord($id, 'up_major_oil_facilities', 'column_4');
                    }
                    if (! empty($terrain_id)) {
                        $this->updateTempRecord($id, 'up_major_oil_facilities', 'column_5');
                    }
                    if (! empty($status_id)) {
                        $this->updateTempRecord($id, 'up_major_oil_facilities', 'column_6');
                    }
                    if (! empty($license_status)) {
                        $this->updateTempRecord($id, 'up_major_oil_facilities', 'column_7');
                    }

                    //clear temp record
                    $this->clearTempRecord(\App\up_major_oil_facilities::class, $id, 'up_major_oil_facilities');
                }

                //send mail
                //self::send_all_mail("UPSTREAM - Well Oil Facility ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Upstream Oil Facility', 'Update Record');
                } else {
                    self::log_audit_trail('Upstream Oil Facility', 'Add Record');
                }

                if ($request->ajax()) {
                    $gas_facility_details = ['year'=>$gas_facility->year, 'month'=>$gas_facility->month, 'company'=>$gas_facility->company->company_name, 'facility'=>$gas_facility->facility->facility_name, 'facility_type'=>$gas_facility->facility_type->facility_type_name, 'location'=>$gas_facility->location->location_name, 'terrain'=>$gas_facility->terrain->terrain_name, 'gas_status'=>$gas_facility->gas_status->status_name, 'design_capacity'=>$gas_facility->design_capacity, 'operating_capacity'=>$gas_facility->operating_capacity, 'facility_design_life'=>$gas_facility->facility_design_life, 'date_of_commissioning'=>$gas_facility->date_of_commissioning, 'date_of_commissioning'=>$gas_facility->date_of_commissioning, 'license_status'=>$gas_facility->license_status, 'id'=>$gas_facility->id];

                    return response()->json(['status'=>'ok', 'message'=>$gas_facility_details, 'info'=>'New Oil Facility Added Successfully.']);
                } else {
                    return redirect()->route('upstream.index')->with('info', 'Oil Facility Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editOilFacility(Request $request)
    {
        $GAS_FAC = \App\up_major_oil_facilities::where('id', $request->id)->first();

        return view('upstream.modals.editOilFacility', compact('GAS_FAC'));
    }

    public function upload_oil_facility(Request $request)
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
                $month = $row['B'];
                $company_id = $row['C'];
                $facility_id = $row['D'];
                $terrain_id = $row['G'];
                $well_act = \App\up_major_oil_facilities::where('year', $year)->where('month', $month)->where('facility_id', $facility_id)->where('company_id', $company_id)->first();
                if ($well_act) {
                    $company = $well_act->company->company_name;
                    $facility = $well_act->facility->facility_name;

                    return redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$facility.' Facility, Year '.$year.', '.$month.' Company '.$company.' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                } else {
                    goto edit;
                }
                {
                        edit:
                         if ($key >= 2) {
                             $created_by = \Auth::user()->name;

                             //script to check if name exist in master record
                             $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['C']}%", $row['C']);
                             $results_2 = $this->resolveMasterData(\App\facility::class, 'facility_name', "%{$row['D']}%", $row['D']);
                             $results_3 = $this->resolveMasterData(\App\facility_type::class, 'facility_type_name', "%{$row['E']}%", $row['E']);
                             $results_4 = $this->resolveMasterData(\App\location::class, 'location_name', "%{$row['F']}%", $row['F']);
                             $results_5 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['G']}%", $row['G']);
                             $results_6 = $this->resolveMasterData(\App\gas_status::class, 'status_name', "%{$row['L']}%", $row['L']);

                             $results_7 = $this->resolveMasterData(\App\up_license_status::class, 'license_status_name', "%{$row['M']}%", $row['M']);

                             if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3 || $results_6['stage_id'] == 3 || $results_7['stage_id'] == 3) {
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
                                     $column_4 = $row['F'];
                                 } else {
                                     $column_4 = '';
                                 }
                                 if ($results_5['stage_id'] == 3) {
                                     $column_5 = $row['G'];
                                 } else {
                                     $column_5 = '';
                                 }
                                 if ($results_6['stage_id'] == 3) {
                                     $column_6 = $row['L'];
                                 } else {
                                     $column_6 = '';
                                 }
                                 if ($results_7['stage_id'] == 3) {
                                     $column_7 = $row['M'];
                                 } else {
                                     $column_7 = '';
                                 }

                                 //INSERT INTO UNRESOLVED TABLE
                                 $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                                [
                                    'year' => $row['A'], 'type' => 'up_major_oil_facilities',
                                    'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3, 'column_4' => $column_4, 'column_5' => $column_5, 'column_6' => $column_6, 'column_7' => $column_7,
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
                                     $location_id = 0;
                                 } else {
                                     $location_id = $results_4['name'];
                                 }
                                 if ($results_5['stage_id'] == 3) {
                                     $terrain_id = 0;
                                 } else {
                                     $terrain_id = $results_5['name'];
                                 }
                                 if ($results_6['stage_id'] == 3) {
                                     $status_id = 0;
                                 } else {
                                     $status_id = $results_6['name'];
                                 }
                                 if ($results_7['stage_id'] == 3) {
                                     $license_status = 0;
                                 } else {
                                     $license_status = $results_7['name'];
                                 }
                             } else {
                                 $company_id = $results_1['name'];
                                 $facility_id = $results_2['name'];
                                 $facility_type_id = $results_3['name'];
                                 $location_id = $results_4['name'];
                                 $terrain_id = $results_5['name'];
                                 $status_id = $results_6['name'];
                                 $license_status = $results_7['name'];
                             }

                             //UPLOADING NEW
                             $add_prod = \App\up_major_oil_facilities::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'month' => $row['B'],
                                'company_id' => $company_id,
                                'facility_id' => $facility_id,
                                'facility_type_id' => $facility_type_id,
                                'location_id' => $location_id,
                                'terrain_id' => $terrain_id,
                                'design_capacity' => $row['H'],
                                'operating_capacity' => $row['I'],
                                'facility_design_life' => $row['J'],
                                'date_of_commissioning' => $row['K'],
                                'status_id' => $status_id,
                                'license_status' => $license_status,
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => $created_by,
                            ]);

                             //UPDATE ID RECORD
                             if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3 || $results_4['stage_id'] == 3 || $results_5['stage_id'] == 3 || $results_6['stage_id'] == 3 || $results_7['stage_id'] == 3) {
                                 $this->updateTable(\App\up_major_oil_facilities::class, 'pending_id', $add_prod->id, $pend->id);
                                 $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                             }
                             $company_id = '';
                             $facility_id = '';
                             $facility_type_id = '';
                             $location_id = '';
                             $terrain_id = '';
                             $status_id = '';
                             $license_status = '';
                         }
                     }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Well Oil Facility ');
            //Audit Logging
            self::log_audit_trail('Upstream Oil Facility', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Major Oil Facilities Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewOilFacility(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Oil Facilities', 'Viewed Data');
        $GAS_FACILITY = \App\up_major_oil_facilities::where('id', $request->id)->first();

        return view('upstream.view.viewOilFacility', compact('GAS_FACILITY'));
    }

    public function download_oil_facility($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_major_oil_facilities::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })
            ->orwhereHas('facility', function ($query) use ($txt) {
                $query->where('facility_name', 'like', "%$txt%");
            })
            ->orwhereHas('facility_type', function ($query) use ($txt) {
                $query->where('facility_type_name', 'like', "%$txt%");
            })
            ->orwhereHas('location', function ($query) use ($txt) {
                $query->where('location_name', 'like', "%$txt%");
            })
            ->orwhereHas('terrain', function ($query) use ($txt) {
                $query->where('terrain_name', 'like', "%$txt%");
            })
            ->orwhereHas('gas_status', function ($query) use ($txt) {
                $query->where('status_name', 'like', "%$txt%");
            })
            ->orwhereHas('up_license_status', function ($query) use ($txt) {
                $query->where('license_status_name', 'like', "%$txt%");
            })
            ->get();
        } else {
            $data = \App\up_major_oil_facilities::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Oil Facilities', 'Downloaded Data');

        $view = 'upstream.excel.oil_facility_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Oil Facilities.xlsx');
    }

    public function approveOilFacility(Request $request)
    {
        $oil_fac = \App\up_major_oil_facilities::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveOilFacility', compact('oil_fac'));
    }

    public function add_field_development_plan(Request $request)
    {
        //checking if for upstream or gas
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section = 'OTHERS';
        }

        // $company_id = $request->company_id;      $field_id = $request->field_id;
        // $fdp = \App\up_field_development_plan::where('company_id', $company_id)->where('field_id', $field_id)->first();
        // if($fdp)
        // {
        //     if($request->ajax() && $request->id == '')
        //      {    $comp = $fdp->company->company_name;     $fac = $fdp->field->field_name;
        //           return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$field.' Field, Company ' .$company. ' Please Check Existing Records To Avoid Uploading Duplicate Records.']);
        //      }else   { goto edit; }
        // }
        // else   { goto edit; }
        // {
        try {
            edit:
                //INSERTING NEW FDP
                $fdp = \App\up_field_development_plan::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'company_id' => $request->company_id,
                    'field_id' => $request->field_id,
                    'production_rate' => $request->production_rate,
                    'expected_reserves' => $request->expected_reserves,
                    'commencement_date' => $request->commencement_date,
                    'no_of_well' => $request->no_of_well,
                    'remark' => $request->remark,
                    'section' => $section,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $field_id = $request->field_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_field_development_plan', 'column_1');
                }
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'up_field_development_plan', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_field_development_plan::class, $id, 'up_field_development_plan');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Field Development Plan ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Field Development Plan', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Field Development Plan', 'Add Record');
            }

            if ($request->ajax()) {
                $fdp_details = ['year'=>$fdp->year, 'company'=>$fdp->company->company_name, 'field'=>$fdp->field->field_name, 'production_rate'=>$fdp->production_rate, 'expected_reserves'=>$fdp->expected_reserves, 'commencement_date'=>$fdp->commencement_date, 'no_of_well'=>$fdp->no_of_well, 'remark'=>$fdp->remark, 'id'=>$fdp->id];

                return response()->json(['status'=>'ok', 'message'=>$fdp_details, 'info'=>'New Field Development Plan Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Field Development Plan Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        // }
    }

    public function editFieldDevelopmentPlan(Request $request)
    {
        $FDP = \App\up_field_development_plan::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $FDP->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_fie = \App\field::where('id', $FDP->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();

        return view('upstream.modals.editFieldDevelopmentPlan', compact('FDP', 'one_com', 'all_com', 'one_fie', 'all_fie'));
    }

    public function upload_field_development_plan(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }

            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                // $year = $row['A'];  $company_id = $row['B'];   $field = $row['C'];
                // $fdp = \App\up_field_development_plan::where('year', $year)->where('field_id', $field)->where('company_id', $company_id)->first();
                // if($fdp)
                // {
                //     $company = $fdp->company->company_name;   $field = $fdp->field->field_name;
                //     return redirect()->route('upstream')->with('error', 'Sorry, Record Already Exist For '.$field.' Field, & Company ' .$company. ' Please Check Existing Records To Avoid Uploading Duplicate Records.');
                // }
                // else { goto edit; }
                // {
                //     edit:
                if ($key >= 2) {
                    $created_by = \Auth::user()->name;

                    //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['C']}%", $row['C']);

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
                                    'year' => $row['A'], 'type' => 'up_field_development_plan',
                                    'column_1' => $column_1, 'column_2' => $column_2,
                                ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $field_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\up_field_development_plan::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'],
                                'company_id' => $company_id,
                                'field_id' => $field_id,
                                'production_rate' => $row['D'],
                                'expected_reserves' => $row['E'],
                                'commencement_date' => $row['F'],
                                'no_of_well' => $row['G'],
                                'remark' => $row['H'],
                                'section' => $section,
                                'stage_id' => '0',
                                'batch_number' => date('d-M'),
                                'created_by' => $created_by,
                            ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_field_development_plan::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $field_id = '';
                }
                // }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Field Development Plan ');
            //Audit Logging
            self::log_audit_trail('Upstream Field Development Plan', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Field Development Plan Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    // public function viewOilFacility(Request $request)
    // {
    //     //Audit Logging
    //     self::log_audit_trail('Oil Facilities', 'Viewed Data');
    //      $GAS_FACILITY = \App\up_major_oil_facilities::where('id',$request->id)->first();
    //      return view('upstream.view.viewOilFacility',compact('GAS_FACILITY'));
    // }

    public function download_field_development_plan($type, Request $request)
    {
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section_up = 'UPSTREAM';
            $section_ga = 'GAS';
            $section_ot = 'OTHERS';
        }

        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_field_development_plan::where('year', 'like', "%$txt%")
            ->orwhere('production_rate', 'like', "%$txt%")->orwhere('expected_reserves', 'like', "%$txt%")
            ->orwhere('commencement_date', 'like', "%$txt%")->orwhere('remark', 'like', "%$txt%")
            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })
            ->orwhereHas('field', function ($query) use ($txt) {
                $query->where('field_name', 'like', "%$txt%");
            })->where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)
            ->get();
        } else {
            $data = \App\up_field_development_plan::where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Field Development Plan', 'Downloaded Data');

        $view = 'upstream.excel.up_field_development_plan_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Field Development Plan.xlsx');
    }

    public function approveFieldDevelopmentPlan(Request $request)
    {
        $oil_fad = \App\up_field_development_plan::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveFieldDevelopmentPlan', compact('oil_fad'));
    }

    public function add_approved_gas_development_plan(Request $request)
    {
        try {
            $field = \App\field::where('id', $request->field_id)->first();
            if ($field) {
                $concession_id = $field->concession_id;
                $company_id = $field->company_id;
            } else {
                $concession_id = null;
                $company_id = null;
            }

            if ($request->ag_reserve != null) {
                $type_id = 1;
            } elseif ($request->gas_reserve != null) {
                $type_id = 2;
            }
            $id = $request->id;
            if (! empty($id)) {
                $company_id = $request->company_id;
            } else {
                $company_id = null;
            }

            //INSERTING NEW
            $fdp = \App\up_approved_gas_development_plan::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'field_id' => $request->field_id,
                'concession_id' => $concession_id,
                'company_id' => $company_id,
                'type_id' => $request->type_id,
                'gas_reserve' => $request->gas_reserve,
                'condensate' => $request->condensate,
                'ag_reserve' => $request->ag_reserve,
                'off_take_rate' => $request->off_take_rate,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $field_id = $request->field_id;
            $company_id = $request->company_id;
            $concession_id = $request->concession_id;
            if (! empty($id)) {
                if (! empty($field_id)) {
                    $this->updateTempRecord($id, 'up_approved_gas_development_plan', 'column_1');
                }
                if (! empty($concession_id)) {
                    $this->updateTempRecord($id, 'up_approved_gas_development_plan', 'column_2');
                }
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_approved_gas_development_plan', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_approved_gas_development_plan::class, $id, 'up_approved_gas_development_plan');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Approved Gas Development Plan ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Approved Gas Development Plan', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Approved Gas Development Plan', 'Add Record');
            }

            if ($request->ajax()) {
                $fdp_details = ['year'=>$fdp->year, 'field'=>$fdp->field->field_name, 'concession'=>null, 'company'=>null, 'gas_reserve'=>$fdp->gas_reserve, 'condensate'=>$fdp->condensate, 'ag_reserve'=>$fdp->ag_reserve, 'off_take_rate'=>$fdp->off_take_rate, 'id'=>$fdp->id];

                return response()->json(['status'=>'ok', 'message'=>$fdp_details, 'info'=>'New Approved Gas Development Plan Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Approved Gas Development Plan Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editApprovedGasDevelopmentPlan(Request $request)
    {
        $FDP = \App\up_approved_gas_development_plan::where('id', $request->id)->first();
        $one_fie = \App\field::where('id', $FDP->field_id)->first();
        $all_fie = \App\field::orderBy('field_name', 'asc')->get();
        $one_com = \App\company::where('id', $FDP->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_con = \App\concession::where('id', $FDP->concession_id)->first();
        $all_con = \App\concession::orderBy('concession_name', 'asc')->get();

        return view('upstream.modals.editApprovedGasDevelopmentPlan', compact('FDP', 'one_com', 'all_com', 'one_fie', 'all_fie', 'one_con', 'all_con'));
    }

    public function upload_approved_gas_development_plan(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\field::class, 'field_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\concession::class, 'concession_name', "%{$row['C']}%", $row['C']);
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
                            'year' => $row['A'], 'type' => 'up_approved_gas_development_plan', 'column_1' => $column_1,
                            'column_2' => $column_2, 'column_3' => $column_3,
                        ]);
                        if ($results_1['stage_id'] == 3) {
                            $field_id = 0;
                        } else {
                            $field_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $concession_id = 0;
                        } else {
                            $concession_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_3['name'];
                        }
                    } else {
                        $field_id = $results_1['name'];
                        $concession_id = $results_2['name'];
                        $company_id = $results_3['name'];
                    }

                    //
                    if ($row['C'] == null) {
                        $field = \App\field::where('field_name', $row['B'])->first();
                        if ($field) {
                            $concession_id = $field->concession_id;
                        } else {
                            $concession_id = null;
                        }
                    } else {
                    }

                    if ($row['G'] != null) {
                        $type_id = 1;
                    }
                    if ($row['E'] != null) {
                        $type_id = 2;
                    }

                    //UPLOADING NEW
                    $add_prod = \App\up_approved_gas_development_plan::updateOrCreate(['id'=> $request->id],
                    [
                        'year' => $row['A'],
                        'field_id' => $field_id,
                        'concession_id' => $concession_id,
                        'company_id' => $company_id,
                        'type_id' => $type_id,
                        'gas_reserve' => $row['E'],
                        'condensate' => $row['F'],
                        'ag_reserve' => $row['G'],
                        'off_take_rate' => $row['H'],
                        'stage_id' => '0',
                        'batch_number' => date('d-M'),
                        'created_by' => $created_by,
                    ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\up_approved_gas_development_plan::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $field_id = '';
                    $concession_id = '';
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Approved Gas Development Plan ');
            //Audit Logging
            self::log_audit_trail('Upstream Approved Gas Development Plan', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Approved Gas Development Plan Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    // public function viewOilFacility(Request $request)
    // {
    //     //Audit Logging
    //     self::log_audit_trail('Oil Facilities', 'Viewed Data');
    //      $GAS_FACILITY = \App\up_approved_gas_development_plan::where('id',$request->id)->first();
    //      return view('upstream.view.viewOilFacility',compact('GAS_FACILITY'));
    // }

    public function download_approved_gas_development_plan($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_approved_gas_development_plan::where('year', 'like', "%$txt%")
                ->orwhere('gas_reserve', 'like', "%$txt%")->orwhere('condensate', 'like', "%$txt%")
                ->orwhere('ag_reserve', 'like', "%$txt%")->orwhere('off_take_rate', 'like', "%$txt%")
                ->orwhereHas('field', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
                ->orwhereHas('concession', function ($query) use ($txt) {
                    $query->where('concession_name', 'like', "%$txt%");
                })
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_approved_gas_development_plan::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Approved Gas Development Plan', 'Downloaded Data');

        $view = 'upstream.excel.up_approved_gas_development_plan_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Approved Gas Development Plan.xlsx');
    }

    public function approveApprovedGasDevelopmentPlan(Request $request)
    {
        $gas_dp = \App\up_approved_gas_development_plan::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveApprovedGasDevelopmentPlan', compact('gas_dp'));
    }

    public function add_field_summary(Request $request)
    {
        try {
            //checking if for upstream or gas
            $role = \Auth::user()->role_obj->id;
            if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
                $section = 'UPSTREAM';
            } elseif ($role == 17 || $role == 19 || $role == 20) {
                $section = 'GAS';
            } else {
                $section = 'OTHERS';
            }

            //INSERTING NEW FDP
            $fdp = \App\up_field_summary::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'contract_id' => $request->contract_id,
                'producing_field' => $request->producing_field,
                'well' => $request->well,
                'string' => $request->string,
                'section' => $section,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $contract_id = $request->contract_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_field_summary', 'column_1');
                }
                if (! empty($contract_id)) {
                    $this->updateTempRecord($id, 'up_field_summary', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_field_summary::class, $id, 'up_field_summary');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Field Summary ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Field Summary', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Field Summary', 'Add Record');
            }

            if ($request->ajax()) {
                $fdp_details = ['year'=>$fdp->year, 'month'=>$fdp->month, 'company'=>$fdp->company->company_name, 'contract'=>$fdp->contract->contract_name, 'producing_field'=>$fdp->producing_field, 'well'=>$fdp->well, 'string'=>$fdp->string, 'id'=>$fdp->id];

                return response()->json(['status'=>'ok', 'message'=>$fdp_details, 'info'=>'New Field Summary Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Field Summary Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editFieldSummary(Request $request)
    {
        $FDP = \App\up_field_summary::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $FDP->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_con = \App\contract::where('id', $FDP->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();

        return view('upstream.modals.editFieldSummary', compact('FDP', 'one_com', 'all_com', 'one_con', 'all_con'));
    }

    public function upload_field_summary(Request $request)
    {
        //checking if for upstream or gas
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section = 'OTHERS';
        }

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
                    $results_2 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['D']}%", $row['D']);

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
                            'year' => $row['A'], 'type' => 'up_field_summary',
                            'column_1' => $column_1, 'column_2' => $column_2,
                        ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $contract_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\up_field_summary::updateOrCreate(['id'=> $request->id],
                    [
                        'year' => $row['A'],
                        'month' => $row['B'],
                        'company_id' => $company_id,
                        'contract_id' => $contract_id,
                        'producing_field' => $row['E'],
                        'well' => $row['F'],
                        'string' => $row['G'],
                        'section' => $section,
                        'stage_id' => '0',
                        'batch_number' => date('d-M'),
                        'created_by' => $created_by,
                    ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_field_summary::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $contract_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Field Summary ');
            //Audit Logging
            self::log_audit_trail('Upstream Field Summary', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Field Summary Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    // public function viewOilFacility(Request $request)
    // {
    //     //Audit Logging
    //     self::log_audit_trail('Oil Facilities', 'Viewed Data');
    //      $GAS_FACILITY = \App\up_field_summary::where('id',$request->id)->first();
    //      return view('upstream.view.viewOilFacility',compact('GAS_FACILITY'));
    // }

    public function download_field_summary($type, Request $request)
    {
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) {
            $section = 'UPSTREAM';
        } elseif ($role == 17 || $role == 19 || $role == 20) {
            $section = 'GAS';
        } else {
            $section_up = 'UPSTREAM';
            $section_ga = 'GAS';
            $section_ot = 'OTHERS';
        }

        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_field_development_plan::where('year', 'like', "%$txt%")
            ->orwhere('production_rate', 'like', "%$txt%")->orwhere('expected_reserves', 'like', "%$txt%")
            ->orwhere('commencement_date', 'like', "%$txt%")->orwhere('remark', 'like', "%$txt%")
            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })
            ->orwhereHas('field', function ($query) use ($txt) {
                $query->where('field_name', 'like', "%$txt%");
            })->where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)
            ->get();
        } else {
            $data = \App\up_field_development_plan::where('section', $section_up)->orwhere('section', $section_ga)->orwhere('section', $section_ot)->get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Field Summary', 'Downloaded Data');

        $view = 'upstream.excel.up_field_summary_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Field Summary.xlsx');
    }

    public function approveFieldSummary(Request $request)
    {
        $field_sum = \App\up_field_summary::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveFieldSummary', compact('field_sum'));
    }

    public function add_replacement_rate(Request $request)
    {
        try {
            //INSERTING NEW FDP
            $fdp = \App\up_reserve_replacement_rate::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'contract_id' => $request->contract_id,
                'oil_condensate_reserve' => $request->oil_condensate_reserve,
                'oil_condensate_production' => $request->oil_condensate_production,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $contract_id = $request->contract_id;
            if (! empty($id)) {
                if (! empty($contract_id)) {
                    $this->updateTempRecord($id, 'up_reserve_replacement_rate', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_reserve_replacement_rate::class, $id, 'up_reserve_replacement_rate');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Reserve Replacement Rate ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Reserve Replacement Rate', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Reserve Replacement Rate', 'Add Record');
            }

            if ($request->ajax()) {
                $fdp_details = ['year'=>$fdp->year, 'month'=>$fdp->month, 'contract'=>$fdp->contract->contract_name, 'oil_condensate_reserve'=>$fdp->oil_condensate_reserve, 'oil_condensate_production'=>$fdp->oil_condensate_production, 'id'=>$fdp->id];

                return response()->json(['status'=>'ok', 'message'=>$fdp_details, 'info'=>'New Reserve Replacement Rate Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Reserve Replacement Rate Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editReplacementRate(Request $request)
    {
        $RESERVE_ = \App\up_reserve_replacement_rate::where('id', $request->id)->first();
        $one_con = \App\contract::where('id', $RESERVE_->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();

        return view('upstream.modals.editReplacementRate', compact('RESERVE_', 'one_con', 'all_con'));
    }

    public function upload_replacement_rate(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['C']}%", $row['C']);

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
                            'year' => $row['A'], 'type' => 'up_reserve_replacement_rate',
                            'column_1' => $column_1,
                        ]);
                        if ($results_1['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_1['name'];
                        }
                    } else {
                        $contract_id = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\up_reserve_replacement_rate::updateOrCreate(['id'=> $request->id],
                    [
                        'year' => $row['A'],
                        'month' => $row['B'],
                        'contract_id' => $contract_id,
                        'oil_condensate_reserve' => $row['D'],
                        'oil_condensate_production' => $row['E'],
                        'stage_id' => '0',
                        'batch_number' => date('d-M'),
                        'created_by' => $created_by,
                    ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\up_reserve_replacement_rate::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $contract_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Reserve Replacement Rate ');
            //Audit Logging
            self::log_audit_trail('Upstream Reserve Replacement Rate', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Reserve Replacement Rate Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    // public function viewOilFacility(Request $request)
    // {
    //     //Audit Logging
    //     self::log_audit_trail('Oil Facilities', 'Viewed Data');
    //      $GAS_FACILITY = \App\up_reserve_replacement_rate::where('id',$request->id)->first();
    //      return view('upstream.view.viewOilFacility',compact('GAS_FACILITY'));
    // }

    public function download_replacement_rate($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_reserve_replacement_rate::where('year', 'like', "%$txt%")
                ->orwhere('month', 'like', "%$txt%")->orwhere('oil_condensate_reserve', 'like', "%$txt%")
                ->orwhere('oil_condensate_production', 'like', "%$txt%")
                ->orwhereHas('contract', function ($query) use ($txt) {
                    $query->where('contract_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_reserve_replacement_rate::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Replacement Rate', 'Downloaded Data');

        $view = 'upstream.excel.up_replacement_rate_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'upstream Replacement Rate.xlsx');
    }

    public function approveReplacementRate(Request $request)
    {
        $rate = \App\up_reserve_replacement_rate::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveReplacementRate', compact('rate'));
    }

    public function add_depletion_rate(Request $request)
    {
        try {
            //INSERTING NEW FDP
            $depl = \App\up_reserve_addition_depletion_rate::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'contract_id' => $request->contract_id,
                'prev_oil_condensate' => $request->prev_oil_condensate,
                'curr_oil_condensate' => $request->curr_oil_condensate,
                'production' => $request->production,
                'net_addition' => $request->net_addition,
                'percent_net_addition' => $request->percent_net_addition,
                'depletion_rate' => $request->depletion_rate,
                'life_index' => $request->life_index,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $contract_id = $request->contract_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_reserve_addition_depletion_rate', 'column_1');
                }
                if (! empty($contract_id)) {
                    $this->updateTempRecord($id, 'up_reserve_addition_depletion_rate', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_reserve_addition_depletion_rate::class, $id, 'up_reserve_addition_depletion_rate');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Reserve Depletion Rate ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Reserve Depletion Rate', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Reserve Depletion Rate', 'Add Record');
            }

            if ($request->ajax()) {
                $depl_details = ['year'=>$depl->year, 'month'=>$depl->month, 'company'=>$depl->company->company_name, 'contract'=>$depl->contract->contract_name, 'prev_oil_condensate'=>$depl->prev_oil_condensate, 'curr_oil_condensate'=>$depl->curr_oil_condensate, 'production'=>$depl->production, 'net_addition'=>$depl->net_addition, 'percent_net_addition'=>$depl->percent_net_addition, 'depletion_rate'=>$depl->depletion_rate, 'life_index'=>$depl->life_index, 'id'=>$depl->id];

                return response()->json(['status'=>'ok', 'message'=>$depl_details, 'info'=>'New Reserve Depletion Rate Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Reserve Depletion Rate Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editDepletionRate(Request $request)
    {
        $RESERVE_ = \App\up_reserve_addition_depletion_rate::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $RESERVE_->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_con = \App\contract::where('id', $RESERVE_->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();

        return view('upstream.modals.editDepletionRate', compact('RESERVE_', 'one_con', 'all_con', 'one_com', 'all_com'));
    }

    public function upload_depletion_rate(Request $request)
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
                    $results_2 = $this->resolveMasterData(\App\contract::class, 'contract_name', "%{$row['D']}%", $row['D']);

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
                            'year' => $row['A'], 'type' => 'up_reserve_addition_depletion_rate',
                            'column_1' => $column_1, 'column_2' => $column_2,
                        ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $contract_id = 0;
                        } else {
                            $contract_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $contract_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\up_reserve_addition_depletion_rate::updateOrCreate(['id'=> $request->id],
                    [
                        'year' => $row['A'],
                        'month' => $row['B'],
                        'company_id' => $company_id,
                        'contract_id' => $contract_id,
                        'oil_condensate' => $row['E'],
                        'production' => $row['F'],
                        'net_addition' => $row['G'],
                        'percent_net_addition' => $row['H'],
                        'depletion_rate' => $row['I'],
                        'life_index' => $row['j'],
                        'stage_id' => '0',
                        'batch_number' => date('d-M'),
                        'created_by' => $created_by,
                    ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\up_reserve_addition_depletion_rate::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $contract_id = '';
                }
            }

            //send mail
            self::send_all_mail('UPSTREAM - Reserve Depletion Rate ');
            //Audit Logging
            self::log_audit_trail('Upstream Reserve Depletion Rate', 'Data Bulk Upload');

            return redirect()->route('upstream.index')->with('info', 'Reserve Depletion Rate Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    // public function viewOilFacility(Request $request)
    // {
    //     //Audit Logging
    //     self::log_audit_trail('Oil Facilities', 'Viewed Data');
    //      $GAS_FACILITY = \App\up_reserve_addition_depletion_rate::where('id',$request->id)->first();
    //      return view('upstream.view.viewOilFacility',compact('GAS_FACILITY'));
    // }

    public function download_depletion_rate($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_reserve_addition_depletion_rate::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orwhere('production', 'like', "%$txt%")->orwhere('net_addition', 'like', "%$txt%")->orwhere('percent_net_addition', 'like', "%$txt%")->orwhere('depletion_rate', 'like', "%$txt%")->orwhere('oil_condensate', 'like', "%$txt%")->orwhere('life_index', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('contract', function ($query) use ($txt) {
                    $query->where('contract_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_reserve_addition_depletion_rate::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Depletion Rate', 'Downloaded Data');

        $view = 'upstream.excel.up_replacement_rate_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Depletion Rate.xlsx');
    }

    public function approveDepletionRate(Request $request)
    {
        $rate = \App\up_reserve_addition_depletion_rate::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveDepletionRate', compact('rate'));
    }

    public function calculate_ratio(Request $request)
    {
        $pyear = $request->year;
        $prev_year = ($pyear - 1);
        $curr_year = $request->year;
        $reserve_total_prev[] = '';
        $reserve_total_curr[] = '';   //$production[] = '';
        $oil_comp_prev_yr = 'oil_comp_'.$prev_year;
        $oil_comp_curr_yr = 'oil_comp_'.$curr_year;
        $cond_comp_prev_yr = 'cond_comp_'.$prev_year;
        $cond_comp_curr_yr = 'cond_comp_'.$curr_year;

        $oil_reserves = \App\up_reserves_oil::get();
        $oil_comp_prev_yr = $oil_reserves->where('year', $prev_year);
        $oil_comp_curr_yr = $oil_reserves->where('year', $curr_year);

        $cond_reserves = \App\up_reserves_report::get();
        $cond_comp_prev_yr = $cond_reserves->where('year', $prev_year);
        $cond_comp_curr_yr = $cond_reserves->where('year', $curr_year);

        //POPULATING PREVIOUS YEAR RESERVE
        foreach ($oil_comp_curr_yr as $k => $company) {
            //previous year    //reserve total
            $oil_p = \App\up_reserves_oil::where('company_id', $company->company_id)->where('year', $prev_year)->sum('oil_reserves');
            $cond_p = \App\up_reserves_report::where('company_id', $company->company_id)->where('year', $prev_year)->sum('condensate_reserves');
            $reserve_total_prev = ($oil_p + $cond_p);
            $yr[$k] = $prev_year;

            //current year
            //reserve total
            $oil_c = \App\up_reserves_oil::where('company_id', $company->company_id)->where('year', $curr_year)->sum('oil_reserves');
            $cond_c = \App\up_reserves_report::where('company_id', $company->company_id)->where('year', $curr_year)->sum('condensate_reserves');
            $reserve_total_curr = ($oil_c + $cond_c);
            $yr[$k] = $curr_year;

            //production total
            $productn = \App\up_provisional_crude_production::where('company_id', $company->company_id)->where('year', $curr_year)->sum('company_total');
            $production = ($productn / 1000000);
            $net_addition = ($reserve_total_curr - $reserve_total_prev);
            if ($reserve_total_curr == 0) {
                $depletion_rate = 0;
            } else {
                $depletion_rate = (($production * 100) / $reserve_total_curr);
            }
            if ($reserve_total_curr == 0) {
                $percent_net_addition = 0;
            } else {
                $percent_net_addition = (($net_addition * 100) / $reserve_total_curr);
            }
            if ($production == 0) {
                $life_index = 0;
            } else {
                $life_index = ($reserve_total_curr / $production);
            }

            //UPLOADING NEW
            $add_prod = \App\up_reserve_addition_depletion_rate::updateOrCreate(['id'=> $request->id],
            [
                'year' => $curr_year,
                'month' => $company->month,
                'company_id' => $company->company_id,
                'contract_id' => $company->contract_id,
                'prev_oil_condensate' => $reserve_total_prev,
                'curr_oil_condensate' => $reserve_total_curr,
                'production' => $production,
                'net_addition' => $net_addition,
                'percent_net_addition' => $percent_net_addition,
                'depletion_rate' => $depletion_rate,
                'life_index' => $life_index,
                'stage_id' => '0',
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);
        }
        // dd($production_curr);

        //send mail
        self::send_all_mail('UPSTREAM - Reserve Ratio ');
        //Audit Logging
        self::log_audit_trail('Upstream Reserve Ratio', 'Data Calculated');

        return redirect()->route('upstream.index')->with('info', 'Reserve Depletion Replacement Rate Computed Successfully');
    }

    public function add_gas_depletion_rate(Request $request)
    {
        try {
            //INSERTING NEW FDP
            $depl = \App\up_gas_reserve_addition_depletion_rate::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'contract_id' => $request->contract_id,
                'prev_gas_reserve' => $request->prev_gas_reserve,
                'curr_gas_reserve' => $request->curr_gas_reserve,
                'production' => $request->production,
                'net_addition' => $request->net_addition,
                'percent_net_addition' => $request->percent_net_addition,
                'depletion_rate' => $request->depletion_rate,
                'life_index' => $request->life_index,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $contract_id = $request->contract_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_gas_reserve_addition_depletion_rate', 'column_1');
                }
                if (! empty($contract_id)) {
                    $this->updateTempRecord($id, 'up_gas_reserve_addition_depletion_rate', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_gas_reserve_addition_depletion_rate::class, $id, 'up_gas_reserve_addition_depletion_rate');
            }

            //send mail
            //self::send_all_mail("UPSTREAM - Reserve Depletion Rate ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Gas Reserve Depletion Rate', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Gas Reserve Depletion Rate', 'Add Record');
            }

            if ($request->ajax()) {
                $depl_details = ['year'=>$depl->year, 'month'=>$depl->month, 'company'=>$depl->company->company_name, 'contract'=>$depl->contract->contract_name, 'prev_gas_reserve'=>$depl->prev_gas_reserve, 'curr_gar_reserve'=>$depl->curr_gar_reserve, 'production'=>$depl->production, 'net_addition'=>$depl->net_addition, 'percent_net_addition'=>$depl->percent_net_addition, 'depletion_rate'=>$depl->depletion_rate, 'life_index'=>$depl->life_index, 'id'=>$depl->id];

                return response()->json(['status'=>'ok', 'message'=>$depl_details, 'info'=>'New Gas Reserve Depletion Rate Added Successfully.']);
            } else {
                return redirect()->route('upstream.index')->with('info', 'Gas Reserve Depletion Rate Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editGasDepletionRate(Request $request)
    {
        $RESERVE_ = \App\up_gas_reserve_addition_depletion_rate::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $RESERVE_->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_con = \App\contract::where('id', $RESERVE_->contract_id)->first();
        $all_con = \App\contract::orderBy('contract_name', 'asc')->get();

        return view('upstream.modals.editGasDepletionRate', compact('RESERVE_', 'one_con', 'all_con', 'one_com', 'all_com'));
    }

    public function download_gas_depletion_rate($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) 
        {
            $data = \App\up_gas_reserve_addition_depletion_rate::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orwhere('production', 'like', "%$txt%")->orwhere('net_addition', 'like', "%$txt%")->orwhere('percent_net_addition', 'like', "%$txt%")->orwhere('depletion_rate', 'like', "%$txt%")->orwhere('prev_gas_reserve', 'like', "%$txt%")->orwhere('life_index', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('contract', function ($query) use ($txt) {
                    $query->where('contract_name', 'like', "%$txt%");
                })
            ->get();
        } else {
            $data = \App\up_gas_reserve_addition_depletion_rate::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Depletion Rate', 'Downloaded Data');

        $view = 'upstream.excel.up_gas_replacement_rate_excel';

        return \Excel::download(new \App\Imports\upstream\ImportUpstreamData($data, $view), 'Gas Depletion Rate.xlsx');
    }

    public function approveGasDepletionRate(Request $request)
    {
        $rate = \App\up_gas_reserve_addition_depletion_rate::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('upstream.approve.approveGasDepletionRate', compact('rate'));
    }

    public function calculate_ratio_gas(Request $request)
    {
        $request_year = $request->year;
        $prev_year = $request_year - 1;
        $curr_year = $request_year;
        $reserve_total_prev[] = '';
        $reserve_total_curr[] = '';   //$production[] = '';
        $gas_comp_prev_yr = 'gas_comp_'.$prev_year;
        $gas_comp_curr_yr = 'gas_comp_'.$curr_year;

        $gas_reserves = \App\up_reserves_gas::get();
        $gas_comp_prev_yr = $gas_reserves->where('year', $prev_year);
        $gas_comp_curr_yr = $gas_reserves->where('year', $curr_year);

        //POPULATING PREVIOUS YEAR RESERVE
        foreach ($gas_comp_curr_yr as $k => $company) {
            //getting company contract
            $comp_detail = \App\field::where('company_id', $company->company_id)->first();
            if ($comp_detail) {
                if ($comp_detail->contract_id != null) {
                    $contract_id = $comp_detail->contract_id;
                } else {
                    $contract_id = null;
                }
            } else {
                $contract_id = null;
            }

            //previous year total
            $gas_total_prev = \App\up_reserves_gas::where('company_id', $company->company_id)->where('year', $prev_year)->sum('total_gas');

            //current year total
            $gas_total_curr = \App\up_reserves_gas::where('company_id', $company->company_id)->where('year', $curr_year)->sum('total_gas');

            //production total
            $productn = \App\gas_summary_of_gas_production::where('company_id', $company->company_id)->where('year', $curr_year)->sum('total');
            $production = ($productn / 1000000);
            $net_addition = ($gas_total_curr - $gas_total_prev);
            if ($gas_total_curr == 0) {
                $depletion_rate = 0;
            } else {
                $depletion_rate = (($production * 100) / $gas_total_curr);
            }
            if ($gas_total_curr == 0) {
                $percent_net_addition = 0;
            } else {
                $percent_net_addition = (($net_addition * 100) / $gas_total_curr);
            }
            if ($production == 0) {
                $life_index = 0;
            } else {
                $life_index = ($gas_total_curr / $production);
            }

            //UPLOADING NEW
            $add_prod = \App\up_gas_reserve_addition_depletion_rate::updateOrCreate(['id'=> $request->id],
            [
                'year' => $curr_year,
                'month' => $company->month,
                'company_id' => $company->company_id,
                'contract_id' => $contract_id,
                'prev_gas_reserve' => $gas_total_prev,
                'curr_gas_reserve' => $gas_total_curr,
                'production' => $production,
                'net_addition' => $net_addition,
                'percent_net_addition' => $percent_net_addition,
                'depletion_rate' => $depletion_rate,
                'life_index' => $life_index,
                'stage_id' => '0',
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);
        }
        // dd($production_curr);

        //send mail
        self::send_all_mail('UPSTREAM - Gas Reserve Ratio ');
        //Audit Logging
        self::log_audit_trail('Upstream Gas Reserve Ratio', 'Data Calculated');

        return redirect()->route('upstream.index')->with('info', 'Gas Reserve Depletion Replacement Rate Computed Successfully');
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
            self::log_audit_trail('Upstream Data', 'Data Deleted');
        } catch (\Exception $e) {
            // return response()->json(['status'=>'error', 'message'=>'Sorry, An Error Occurred .' .$e->getMessage()]);
            return  redirect()->route('upstream.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }
}
