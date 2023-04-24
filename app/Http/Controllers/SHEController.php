<?php

namespace App\Http\Controllers;

use App\Approval;
use DB;
use Excel;
use App\Notifications\Approved;
use App\Notifications\Completed;
use App\Notifications\emailNOGIARManager;
use App\Notifications\Rejected;
use App\Stage;
use App\Traits\ExcelExport;
use App\Workflow;
use App\WorkflowSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SHEController extends Controller
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
        $users = \App\EmailList::where('division', 'HSE')->get();
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
            'section' => 'HSE',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $companies = $man_company = $chem_company = $comp_company = $effl_company = $env_company = $rad_company = \App\company::orderBy('company_name', 'asc')->get();
        $facilities = \App\facility::orderBy('facility_name', 'asc')->get();
        $type_facility = \App\she_type_of_facility::orderBy('type_of_facility_name', 'asc')->get();
        $state = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        $osc_zone = \App\she_zone::orderBy('zone_name', 'asc')->get();
        $she_status = \App\gas_status::where('id', '<=', '4')->orderBy('status_name', 'asc')->get();
        $fac_types = $type_facility_wm = \App\facility_type::where('type_id', '=', '4')->orderBy('facility_type_name', 'asc')->get();
        $field_offices = \App\down_field_office::orderBy('field_office_name', 'asc')->get();
        $status = \App\she_status::where('status_name', '<>', 'Under Processing')->orderBy('status_name', 'asc')->get();
        $study_types = \App\she_study_type::where('type', 'study')->orderBy('type_name', 'asc')->get();
        $study_status = \App\she_study_type::where('type', 'status')->orderBy('type_name', 'asc')->get();

        $pet_cates = \App\she_pet_category::where('type', 'Pet')->orderBy('category_name', 'asc')->get();
        $pet_actions = \App\she_pet_action::orderBy('action_name', 'asc')->get();
        $pet_status = \App\she_pet_status::where('type', 'Pet')->orderBy('status_name', 'asc')->get();

        $lab_cates = \App\she_pet_category::where('type', 'Lab')->orderBy('category_name', 'asc')->get();
        $lab_status = \App\she_pet_status::where('type', 'Lab')->orderBy('status_name', 'asc')->get();

        $spill_fac_types = \App\she_spill_facility::orderBy('type_name', 'asc')->get();
        $terrains = \App\terrain::orderBy('terrain_name', 'asc')->get();

        return view('she-accident-report.index', compact('companies', 'facilities', 'man_company', 'type_facility', 'state', 'she_status', 'fac_types', 'terrains', 'field_offices', 'status', 'spill_fac_types', 'study_status', 'type_facility_wm', 'pet_cates', 'pet_actions', 'pet_status', 'lab_cates', 'lab_status', 'chem_company', 'comp_company', 'effl_company', 'env_company', 'rad_company', 'study_types', 'osc_zone'));
    }

    public function test(Request $request)
    {
        $add_she_up = \App\she_accident_report_upstream::first();
        $upload_name = 'HEALTH SAFETY & ENVIRONMENT - Accident Report – Upstream ';
        //get module workflow id
        $approval_workflow_id = WorkflowSetting::where('module', 'HSE')->first()->workflow_id;
        //get the workflow model

        //get the first stage of the workflow
        $stage = Workflow::find($approval_workflow_id)->stages->first();
        //check stage type
        //if stage type is user, notify user

        if ($stage->type == 1) {
            $add_she_up->approvals()->create([
                'stage_id'=>$stage->id, 'comments'=>'', 'status'=>0, 'approver_id'=>$stage->user_id,
            ]);
            $message = ',  Data for '.$upload_name.' has been uploaded/Modified by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';
            if ($stage->user) {
                $stage->user->notify(new Approved($message, $stage->user->email, $stage->user->name));
            }
            //if stage type id role notify all users with that role
        } elseif ($stage->type == 2) {
            $add_she_up->approvals()->create([
                'leave_request_id' => $request->id, 'stage_id'=>$stage->id, 'comments'=>'', 'status'=>0, 'approver_id'=>0,
            ]);
            foreach ($stage->role->users as $user) {
                $message = ',  Data for '.$upload_name.' has been uploaded/Modified by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';
                $user->notify(new Approved($message, $user->email, $user->name));
            }
        }

        return 'success';
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
                return redirect()->route('she-accident-report.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
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
                return redirect()->route('she-accident-report.index')->with('info', $name.' Pending Data Has Been Approved Successfully');
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

            case 'add_she_accident_report_up':
                return $this->add_she_accident_report_up($request);
            break;

            case 'upload_she_accident_report_up':
                return $this->upload_she_accident_report_up($request);
            break;

            case 'add_she_accident_report_down':
                return $this->add_she_accident_report_down($request);
            break;

            case 'upload_she_accident_report_down':
                return $this->upload_she_accident_report_down($request);
            break;

            case 'add_she_spill_incidence_report':
                return $this->add_she_spill_incidence_report($request);
            break;

            case 'upload_she_spill_incidence_report':
                return $this->upload_she_spill_incidence_report($request);
            break;

            case 'add_she_water_volumes':
                return $this->add_she_water_volumes($request);
            break;

            case 'upload_she_water_volumes':
                return $this->upload_she_water_volumes($request);
            break;

            case 'add_she_waste_volumes':
                return $this->add_she_waste_volumes($request);
            break;

            case 'upload_she_waste_volumes':
                return $this->upload_she_waste_volumes($request);
            break;

            case 'add_she_effluent_waste_discharged':
                return $this->add_she_effluent_waste_discharged($request);
            break;

            case 'upload_she_effluent_waste_discharged':
                return $this->upload_she_effluent_waste_discharged($request);
            break;

            case 'add_she_offshore_safety_permit':
                return $this->add_she_offshore_safety_permit($request);
            break;

            case 'upload_she_offshore_safety_permit':
                return $this->upload_she_offshore_safety_permit($request);
            break;

            case 'add_she_accredited_waste_manager':
                return $this->add_she_accredited_waste_manager($request);
            break;

            case 'upload_she_accredited_waste_manager':
                return $this->upload_she_accredited_waste_manager($request);
            break;

            case 'add_she_waste_management_facilities':
                return $this->add_she_waste_management_facilities($request);
            break;

            case 'upload_she_waste_management_facilities':
                return $this->upload_she_waste_management_facilities($request);
            break;

            case 'add_os_contingency':
                return $this->add_she_oil_spill_contingency($request);
            break;

            case 'upload_she_oil_spill_contingency':
                return $this->upload_she_oil_spill_contingency($request);
            break;

            case 'add_pettitions_received':
                return $this->add_pettitions_received($request);
            break;

            case 'upload_pettitions_received':
                return $this->upload_pettitions_received($request);
            break;

            case 'add_chemical_certification':
                return $this->add_chemical_certification($request);
            break;

            case 'upload_chemical_certification':
                return $this->upload_chemical_certification($request);
            break;

            case 'add_accredited_laboratories':
                return $this->add_accredited_laboratories($request);
            break;

            case 'upload_accredited_laboratories':
                return $this->upload_accredited_laboratories($request);
            break;

            case 'add_drilling_chemical':
                return $this->add_drilling_chemical($request);
            break;

            case 'upload_drilling_chemical':
                return $this->upload_drilling_chemical($request);
            break;

            case 'add_environmental_restoration':
                return $this->add_environmental_restoration($request);
            break;

            case 'upload_environmental_restoration':
                return $this->upload_environmental_restoration($request);
            break;

            case 'add_environmental_studies':
                return $this->add_environmental_studies($request);
            break;

            case 'upload_environmental_studies':
                return $this->upload_environmental_studies($request);
            break;

            case 'add_environmental_compliance':
                return $this->add_environmental_compliance($request);
            break;

            case 'upload_environmental_compliance':
                return $this->upload_environmental_compliance($request);
            break;

            case 'add_medical_training_center':
                return $this->add_medical_training_center($request);
            break;

            case 'upload_medical_training_center':
                return $this->upload_medical_training_center($request);
            break;

            case 'add_radiation_safety_permit':
                return $this->add_radiation_safety_permit($request);
            break;

            case 'upload_radiation_safety_permit':
                return $this->upload_radiation_safety_permit($request);
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

            case 'modals_editSheAccidentReportUP':
                // code...
                return $this->editSheAccidentReportUP($request);
            break;

            case 'view_viewSheAccidentReportUP':
                // code...
                return $this->viewSheAccidentReportUP($request);
            break;

            case 'approve_approveUpstreamIncident':
                // code...
                return $this->approveUpstreamIncident($request);
            break;

            case 'modals_editSheAccidentReportDOWN':
                // code...
                return $this->editSheAccidentReportDOWN($request);
            break;

            case 'view_viewSheAccidentReportDOWN':
                // code...
                return $this->viewSheAccidentReportDOWN($request);
            break;

            case 'approve_approveDownstreamIncident':
                // code...
                return $this->approveDownstreamIncident($request);
            break;

            case 'modals_editSpillIncidenceReport':
                // code...
                return $this->editSpillIncidenceReport($request);
            break;

            case 'view_viewSpillIncidenceReport':
                // code...
                return $this->viewSpillIncidenceReport($request);
            break;

            case 'approve_approveSpillIncident':
                // code...
                return $this->approveSpillIncident($request);
            break;

            case 'modals_editSheWaterVolume':
                // code...
                return $this->editSheWaterVolume($request);
            break;

            case 'view_viewSheWaterVolume':
                // code...
                return $this->viewSheWaterVolume($request);
            break;

            case 'approve_approveWaterVolume':
                // code...
                return $this->approveWaterVolume($request);
            break;

            case 'modals_editSheWasteVolume':
                // code...
                return $this->editSheWasteVolume($request);
            break;

            case 'view_viewSheWasteVolume':
                // code...
                return $this->viewSheWasteVolume($request);
            break;

            case 'approve_approveWasteVolume':
                // code...
                return $this->approveWasteVolume($request);
            break;

            case 'modals_editSheEffluentWasteDischarged':
                // code...
                return $this->editSheEffluentWasteDischarged($request);
            break;

            case 'view_viewEffluentWasteDischarged':
                // code...
                return $this->viewEffluentWasteDischarged($request);
            break;

            case 'approve_approveEffluentWasteDischarged':
                // code...
                return $this->approveEffluentWasteDischarged($request);
            break;

            case 'modals_editSheSafetyPermit':
                // code...
                return $this->editSheSafetyPermit($request);
            break;

            case 'view_viewSheSafetyPermit':
                // code...
                return $this->viewSheSafetyPermit($request);
            break;

            case 'approve_approveSafetyPermit':
                // code...
                return $this->approveSafetyPermit($request);
            break;

            case 'modals_editSheAccreditedWasteManager':
                // code...
                return $this->editSheAccreditedWasteManager($request);
            break;

            case 'view_viewSheAccreditedWasteManager':
                // code...
                return $this->viewSheAccreditedWasteManager($request);
            break;

            case 'approve_AccreditedWasteManager':
                // code...
                return $this->AccreditedWasteManager($request);
            break;

            case 'modals_editSheWasteManagementFacilities':
                // code...
                return $this->editSheWasteManagementFacilities($request);
            break;

            case 'view_viewSheWasteManagementFacilities':
                // code...
                return $this->viewSheWasteManagementFacilities($request);
            break;

            case 'approve_WasteManagementFacilities':
                // code...
                return $this->WasteManagementFacilities($request);
            break;

            case 'modals_editSheOilSpillContingency':
                // code...
                return $this->editSheOilSpillContingency($request);
            break;

            case 'view_viewSheOilSpillContingency':
                // code...
                return $this->viewSheOilSpillContingency($request);
            break;

            case 'approve_approveOilSpillContingency':
                // code...
                return $this->approveOilSpillContingency($request);
            break;

            case 'modals_editPettitionsReceived':
                // code...
                return $this->editPettitionsReceived($request);
            break;

            case 'approve_approvePettitionsReceived':
                // code...
                return $this->approvePettitionsReceived($request);
            break;

            case 'modals_editChemicalCertification':
                // code...
                return $this->editChemicalCertification($request);
            break;

            case 'approve_approveChemicalCertification':
                // code...
                return $this->approveChemicalCertification($request);
            break;

            case 'modals_editAccreditedLaboratories':
                // code...
                return $this->editAccreditedLaboratories($request);
            break;

            case 'approve_approveAccreditedLaboratories':
                // code...
                return $this->approveAccreditedLaboratories($request);
            break;

            case 'modals_editDrillingChemical':
                // code...
                return $this->editDrillingChemical($request);
            break;

            case 'modals_editEnvironmentalRestoration':
                // code...
                return $this->editEnvironmentalRestoration($request);
            break;

            case 'approve_approveEnvironmentalRestoration':
                // code...
                return $this->approveEnvironmentalRestoration($request);
            break;

            case 'modals_editEnvironmentalStudies':
                // code...
                return $this->editEnvironmentalStudies($request);
            break;

            case 'approve_approveEnvironmentalStudies':
                // code...
                return $this->approveEnvironmentalStudies($request);
            break;

            case 'modals_editEnvironmentalCompliance':
                // code...
                return $this->editEnvironmentalCompliance($request);
            break;

            case 'approve_approveEnvironmentalCompliance':
                // code...
                return $this->approveEnvironmentalCompliance($request);
            break;

            case 'modals_editMedicalTrainingCenter':
                // code...
                return $this->editMedicalTrainingCenter($request);
            break;

            case 'approve_approveMedicalTrainingCenter':
                // code...
                return $this->approveMedicalTrainingCenter($request);
            break;

            case 'modals_editRadiationSafetyPermit':
                // code...
                return $this->editRadiationSafetyPermit($request);
            break;

            case 'approve_approveRadiationSafetyPermit':
                // code...
                return $this->approveRadiationSafetyPermit($request);
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

    public function add_she_accident_report_up(Request $request)
    {
        try {
            //INSERTING NEW Accident Report – Upstream
            $add_she_up = \App\she_accident_report_upstream::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'incidents' => $request->incidents,
                'work_related' => $request->work_related,
                'non_work_related' => $request->non_work_related,
                'fatal_incident' => $request->fatal_incident,
                'non_fatal_incident' => $request->non_fatal_incident,
                'work_related_fatal_incident' => $request->work_related_fatal_incident,
                'non_work_related_fatal_incident' => $request->non_work_related_fatal_incident,
                'fatality' => $request->fatality,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //notify user that approval process has started
            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Incident Report – Upstream ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Incident Report – Upstream ', 'Update Record');
            } else {
                self::log_audit_trail('Incident Report – Upstream', 'Add Record');
            }

            if ($request->ajax()) {
                $up_details = ['year'=>$add_she_up->year, 'month'=>$add_she_up->month, 'incidents'=>$add_she_up->incidents, 'work_related'=>$add_she_up->work_related, 'non_work_related'=>$add_she_up->non_work_related, 'fatal_incident'=>$add_she_up->fatal_incident, 'non_fatal_incident'=>$add_she_up->non_fatal_incident, 'work_related_fatal_incident'=>$add_she_up->work_related_fatal_incident, 'non_work_related_fatal_incident'=>$add_she_up->non_work_related_fatal_incident, 'fatality'=>$add_she_up->fatality, 'id'=>$add_she_up->id];

                return response()->json(['status'=>'ok', 'message'=>$up_details, 'info'=>'Accident Report – Upstream Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Accident Report – Upstream Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSheAccidentReportUP(Request $request)
    {
        $SHE_UP = \App\she_accident_report_upstream::where('id', $request->id)->first();

        return view('she-accident-report.modals.editSheAccidentReportUP', compact('SHE_UP'));
    }

    public function upload_she_accident_report_up(Request $request)
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

                    //UPLOADING NEW
                    $add_prod = \App\she_accident_report_upstream::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'incidents' => $row['C'],
                            'work_related' => $row['D'],
                            'non_work_related' => $row['E'],
                            'fatal_incident' => $row['F'],
                            'non_fatal_incident' => $row['G'],
                            'work_related_fatal_incident' => $row['H'],
                            'non_work_related_fatal_incident' => $row['I'],
                            'fatality' => $row['J'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Incident Report – Upstream ');
            //Audit Logging
            self::log_audit_trail('Incident Report – Upstream ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Accident Report – Upstream Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSheAccidentReportUP(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Incident -Upstream', 'Viewed Data');
        $SHE_UP = \App\she_accident_report_upstream::where('id', $request->id)->first();

        return view('she-accident-report.view.viewSheAccidentReportUP', compact('SHE_UP'));
    }

    public function download_she_accident_report_up($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_accident_report_upstream::where('year', 'like', "%$txt%")
            ->orWhere('month', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_accident_report_upstream::get();
        }
        // dd($data);

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Incident -Upstream', 'Downloaded Data');

        $view = 'she-accident-report.excel.incident_upstream';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Incident Report Upstream.xlsx');
    }

    public function approveUpstreamIncident(Request $request)
    {
        $up_incidents = \App\she_accident_report_upstream::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveUpstreamIncident', compact('up_incidents'));
    }

    public function add_she_accident_report_down(Request $request)
    {
        try {
            //INSERTING NEW Accident Report – Downstream
            $add_she_down = \App\she_accident_report_downstream::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'incidents' => $request->incidents,
                'work_related' => $request->work_related,
                'non_work_related' => $request->non_work_related,
                'fatal_incident' => $request->fatal_incident,
                'non_fatal_incident' => $request->non_fatal_incident,
                'work_related_fatal_incident' => $request->work_related_fatal_incident,
                'non_work_related_fatal_incident' => $request->non_work_related_fatal_incident,
                'fatality' => $request->fatality,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Incident Report – Downstream ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Incident Report – Downstream', 'Update Record');
            } else {
                self::log_audit_trail('Incident Report – Downstream', 'Add Record');
            }

            if ($request->ajax()) {
                $down_details = ['year'=>$add_she_down->year, 'month'=>$add_she_down->month, 'incidents'=>$add_she_down->incidents, 'work_related'=>$add_she_down->work_related, 'non_work_related'=>$add_she_down->non_work_related, 'fatal_incident'=>$add_she_down->fatal_incident, 'non_fatal_incident'=>$add_she_down->non_fatal_incident, 'work_related_fatal_incident'=>$add_she_down->work_related_fatal_incident, 'non_work_related_fatal_incident'=>$add_she_down->non_work_related_fatal_incident, 'fatality'=>$add_she_down->fatality, 'id'=>$add_she_down->id];

                return response()->json(['status'=>'ok', 'message'=>$down_details, 'info'=>'Accident Report – Downstream Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Accident Report – Downstream Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSheAccidentReportDOWN(Request $request)
    {
        $SHE_DOWN = \App\she_accident_report_downstream::where('id', $request->id)->first();

        return view('she-accident-report.modals.editSheAccidentReportDOWN', compact('SHE_DOWN'));
    }

    public function upload_she_accident_report_down(Request $request)
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

                    //UPLOADING NEW
                    $add_prod = \App\she_accident_report_downstream::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'incidents' => $row['C'],
                            'work_related' => $row['D'],
                            'non_work_related' => $row['E'],
                            'fatal_incident' => $row['F'],
                            'non_fatal_incident' => $row['G'],
                            'work_related_fatal_incident' => $row['H'],
                            'non_work_related_fatal_incident' => $row['I'],
                            'fatality' => $row['J'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Incident Report – Downstream ');
            //Audit Logging
            self::log_audit_trail('Incident Report – Downstream ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Accident Report – Downstream Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSheAccidentReportDOWN(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Incident -Downstream', 'Viewed Data');
        $SHE_DOWN = \App\she_accident_report_downstream::where('id', $request->id)->first();

        return view('she-accident-report.view.viewSheAccidentReportDOWN', compact('SHE_DOWN'));
    }

    public function download_she_accident_report_down($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_accident_report_downstream::where('year', 'like', "%$txt%")->orWhere('month', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_accident_report_downstream::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Incident -Downstream', 'Downloaded Data');

        $view = 'she-accident-report.excel.incident_downstream';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Incident Report Downstream.xlsx');
    }

    public function approveDownstreamIncident(Request $request)
    {
        $down_incidents = \App\she_accident_report_downstream::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveDownstreamIncident', compact('down_incidents'));
    }

    public function add_she_spill_incidence_report(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $hse_spill = \App\she_spill_incidence_report::where('month', $month)->where('year', $year)->first();
        if ($hse_spill) {
            if ($request->ajax()) {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$month.', Year '.$year.'. Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            try {
                edit:
                //INSERTING NEW Spill Incidence
                $add_spill = \App\she_spill_incidence_report::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'natural_accident' => $request->natural_accident,
                    'corrosion' => $request->corrosion,
                    'equipment_failure' => $request->equipment_failure,
                    'sabotage' => $request->sabotage,
                    'human_error' => $request->human_error,
                    'ytbd' => $request->ytbd,
                    'mystery' => $request->mystery,
                    'erosion_wave_sand' => $request->erosion_wave_sand,
                    'operational_maintenance' => $request->operational_maintenance,
                    'sunken_barge' => $request->sunken_barge,
                    'total_no_of_spills' => $request->natural_accident + $request->corrosion + $request->equipment_failure + $request->sabotage + $request->human_error + $request->ytbd + $request->mystery + $request->erosion_wave_sand + $request->operational_maintenance + $request->sunken_barge,
                    'volume_spilled' => $request->volume_spilled,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //send mail
                //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Spill Incidence ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('Spill Incidence', 'Update Record');
                } else {
                    self::log_audit_trail('Spill Incidence', 'Add Record');
                }

                if ($request->ajax()) {
                    $spill_details = ['year'=>$add_spill->year, 'month'=>$add_spill->month, 'natural_accident'=>$add_spill->natural_accident, 'corrosion'=>$add_spill->corrosion, 'equipment_failure'=>$add_spill->equipment_failure, 'sabotage'=>$add_spill->sabotage, 'human_error'=>$add_spill->human_error, 'ytbd'=>$add_spill->ytbd, 'mystery'=>$add_spill->mystery, 'erosion_wave_sand'=>$add_spill->erosion_wave_sand, 'operational_maintenance'=>$add_spill->operational_maintenance, 'sunken_barge'=>$add_spill->sunken_barge, 'total_no_of_spills'=>$add_spill->total_no_of_spills, 'volume_spilled'=>$add_spill->volume_spilled, 'id'=>$add_spill->id];

                    return response()->json(['status'=>'ok', 'message'=>$spill_details, 'info'=>'Spill Incidence Added Successfully.']);
                } else {
                    return redirect()->route('she-accident-report.index')->with('info', 'Spill Incidence Updated Successfully');
                }
            } catch (\Exception $e) {
                return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editSpillIncidenceReport(Request $request)
    {
        $SHE_SPILL = \App\she_spill_incidence_report::where('id', $request->id)->first();

        return view('she-accident-report.modals.editSpillIncidenceReport', compact('SHE_SPILL'));
    }

    public function upload_she_spill_incidence_report(Request $request)
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

                    //UPLOADING NEW
                    $add_prod = \App\she_spill_incidence_report::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'natural_accident' => $row['C'],
                            'corrosion' => $row['D'],
                            'equipment_failure' => $row['E'],
                            'sabotage' => $row['F'],
                            'human_error' => $row['G'],
                            'ytbd' => $row['H'],
                            'mystery' => $row['I'],
                            'erosion_wave_sand' => $row['J'],
                            'operational_maintenance' => $row['K'],
                            'sunken_barge' => $row['L'],
                            'total_no_of_spills' => $row['C'] + $row['D'] + $row['E'] + $row['F'] + $row['G'] + $row['H'] + $row['I'] + $row['J'] + $row['K'] + $row['L'],
                            'volume_spilled' => $row['M'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Spill Incidence ');
            //Audit Logging
            self::log_audit_trail('Spill Incidence', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Accident Report – Spill Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSpillIncidenceReport(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Spill Incident', 'Viewed Data');
        $SHE_SPILL = \App\she_spill_incidence_report::where('id', $request->id)->first();

        return view('she-accident-report.view.viewSpillIncidenceReport', compact('SHE_SPILL'));
    }

    public function download_she_spill_incidence_report($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_spill_incidence_report::where('year', 'like', "%$txt%")->orWhere('month', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_spill_incidence_report::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Spill Incident', 'Downloaded Data');

        $view = 'she-accident-report.excel.spill_incident';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Spill Incident Report.xlsx');
    }

    public function approveSpillIncident(Request $request)
    {
        $spill_incidents = \App\she_spill_incidence_report::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveSpillIncident', compact('spill_incidents'));
    }

    public function add_she_water_volumes(Request $request)
    {
        $id = $request->id;
        $year = $request->year;
        $month = $request->month;
        $company_id = $request->company_id;
        $facility_id = $request->facility_id;
        $water_vol = \App\she_water_volumes_generated::where('year', $year)->where('month', $month)->
                            where('facility_id', $facility_id)->where('company_id', $company_id)->first();
        // if($water_vol)
        // {
        //     if($request->ajax())
        //      {   $comp = $water_vol->company->company_name;
        //          return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$comp.', Year ' .$year. '. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
        //      }else   { goto edit; }
        // }
        // else   { goto edit; }
        // {
        try {
            edit:
                //INSERTING NEW
                $add_water = \App\she_water_volumes_generated::updateOrCreate(['id'=> $id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'company_id' => $request->company_id,
                    'facility_id' => $request->facility_id,
                    'concession_id' => $request->concession_id,
                    'terrain' => $request->terrain,
                    // 'water_depth' => $request->water_depth,
                    // 'distance_from_shore' => $request->distance_from_shore,
                    'volume' => $request->volume,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'she_water_volumes_generated', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_water_volumes_generated::class, $id, 'she_water_volumes_generated');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Water Volume Generated ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Water Volume Generated', 'Update Record');
            } else {
                self::log_audit_trail('Water Volume Generated', 'Add Record');
            }

            if ($request->ajax()) {
                $water_details = ['year'=>$add_water->year, 'month'=>$add_water->month, 'company'=>$add_water->company->company_name, 'facility'=>$add_water->facility_id, 'terrain'=>$add_water->terrain, 'concession_id'=>$add_water->concession_id, 'volume'=>$add_water->volume, 'id'=>$add_water->id];

                return response()->json(['status'=>'ok', 'message'=>$water_details, 'info'=>'Water Volume Generated Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Water Volume Generated Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
        // }
    }

    public function editSheWaterVolume(Request $request)
    {
        $WATER_VOL = \App\she_water_volumes_generated::where('id', $request->id)->first();

        return view('she-accident-report.modals.editSheWaterVolume', compact('WATER_VOL'));
    }

    public function upload_she_water_volumes(Request $request)
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
                                'year' => $row['A'], 'type' => 'she_water_volumes_generated', 'column_1' => $column_1,
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
                    $add_ = \App\she_water_volumes_generated::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'facility_id' => $row['D'],
                            'terrain' => $row['E'],
                            'concession_id' => $row['F'],
                            'volume' => $row['G'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\she_water_volumes_generated::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Water Volume Generated ');
            //Audit Logging
            self::log_audit_trail('Water Volume Generated', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Produced Water Volume Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSheWaterVolume(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Water Vol Generated', 'Viewed Data');
        $WATER_VOL = \App\she_water_volumes_generated::where('id', $request->id)->first();

        return view('she-accident-report.view.viewSheWaterVolume', compact('WATER_VOL'));
    }

    public function download_she_water_volumes($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_water_volumes_generated::where('year', 'like', "%$txt%")->orWhere('month', 'like', "%$txt%")
                ->orwhere('concession_id', 'like', "%$txt%")->orwhere('terrain', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('facility', function ($query) use ($txt) {
                    $query->where('facility_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\she_water_volumes_generated::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Water Vol Generated', 'Viewed Data');

        $view = 'she-accident-report.excel.water_volume_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Water Vol Generated.xlsx');
    }

    public function approveWaterVolume(Request $request)
    {
        $water_vols = \App\she_water_volumes_generated::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveWaterVolume', compact('water_vols'));
    }

    public function add_she_waste_volumes(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $waste_vol = \App\she_drilling_waste_volumes::where('month', $month)->where('year', $year)->first();
        if ($waste_vol) {
            if ($request->ajax()) {
                return response()->json(['status'=>'error', 'info'=>'Sorry, Record Already Exist For '.$month.', Year '.$year.'. &nbsp; &nbsp; &nbsp; Please Check Existing Records.']);
            } else {
                goto edit;
            }
        } else {
            goto edit;
        }
        {
            edit:
            try {
                //INSERTING NEW
                $add_waste = \App\she_drilling_waste_volumes::updateOrCreate(['id'=> $request->id],
                [
                    'year' => $request->year,
                    'month' => $request->month,
                    'sum_of_wbmc' => $request->sum_of_wbmc,
                    'sum_of_obmc' => $request->sum_of_obmc,
                    'sum_of_spent_wbm' => $request->sum_of_spent_wbm,
                    'sum_of_spent_obm' => $request->sum_of_spent_obm,
                    'batch_number' => date('d-M'),
                    'created_by' => \Auth::user()->name,
                ]);

                //send mail
                //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Produced Waste Volume ");
                //Audit Logging
                $id = $request->id;
                if ($id) {
                    self::log_audit_trail('UProduced Waste Volume', 'Update Record');
                } else {
                    self::log_audit_trail('UProduced Waste Volume', 'Add Record');
                }

                if ($request->ajax()) {
                    $waste_details = ['year'=>$add_waste->year, 'month'=>$add_waste->month, 'sum_of_wbmc'=>$add_waste->sum_of_wbmc, 'water_depth'=>$add_waste->water_depth, 'sum_of_obmc'=>$add_waste->sum_of_obmc, 'sum_of_spent_wbm'=>$add_waste->sum_of_spent_wbm, 'sum_of_spent_obm'=>$add_waste->sum_of_spent_obm, 'id'=>$add_waste->id];

                    return response()->json(['status'=>'ok', 'message'=>$waste_details, 'info'=>'Produced Waste Volume Added Successfully.']);
                } else {
                    return redirect()->route('she-accident-report.index')->with('info', 'Produced Waste Volume Updated Successfully');
                }
            } catch (\Exception $e) {
                return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            }
        }
    }

    public function editSheWasteVolume(Request $request)
    {
        $WASTE_VOL = \App\she_drilling_waste_volumes::where('id', $request->id)->first();

        return view('she-accident-report.modals.editSheWasteVolume', compact('WASTE_VOL'));
    }

    public function upload_she_waste_volumes(Request $request)
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

                    //UPLOADING NEW
                    $add_ = \App\she_drilling_waste_volumes::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'sum_of_wbmc' => $row['C'],
                            'sum_of_obmc' => $row['D'],
                            'sum_of_spent_wbm' => $row['E'],
                            'sum_of_spent_obm' => $row['F'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Produced Waste Volume ');
            //Audit Logging
            self::log_audit_trail('Produced Waste Volume', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Drilling Waste Volume Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSheWasteVolume(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Produced Waste Vol', 'Viewed Data');
        $WASTE_VOL = \App\she_drilling_waste_volumes::where('id', $request->id)->first();

        return view('she-accident-report.view.viewSheWasteVolume', compact('WASTE_VOL'));
    }

    public function download_she_waste_volumes($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_drilling_waste_volumes::where('year', 'like', "%$txt%")->orWhere('month', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_drilling_waste_volumes::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Produced Waste Vol', 'Downloaded Data');

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Produced Waste Volume.xlsx');
    }

    public function approveWasteVolume(Request $request)
    {
        $waste_vols = \App\she_drilling_waste_volumes::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveWasteVolume', compact('waste_vols'));
    }

    public function add_she_effluent_waste_discharged(Request $request)
    {
        try {
            //INSERTING NEW
            $add_app = \App\she_effluent_waste_discharged::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'well_name' => $request->well_name,
                'spent_wbm' => $request->spent_wbm,
                'spent_obm' => $request->spent_obm,
                'wbm_generated' => $request->wbm_generated,
                'obm_generated' => $request->obm_generated,
                'waste_manager' => $request->waste_manager,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'she_effluent_waste_discharged', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_effluent_waste_discharged::class, $id, 'she_effluent_waste_discharged');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Effluent Waste Discharged ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Effluent Waste Discharged', 'Update Record');
            } else {
                self::log_audit_trail('Effluent Waste Discharged', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$add_app->year, 'month'=>$add_app->month, 'company'=>$add_app->company->company_name, 'well_name'=>$add_app->well_name, 'spent_wbm'=>$add_app->spent_wbm, 'spent_obm'=>$add_app->spent_obm, 'wbm_generated'=>$add_app->wbm_generated, 'obm_generated'=>$add_app->obm_generated, 'waste_manager'=>$add_app->waste_manager, 'id'=>$add_app->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Effluent Waste Discharged Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Effluent Waste Discharged Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSheEffluentWasteDischarged(Request $request)
    {
        $MANAGE = \App\she_effluent_waste_discharged::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $MANAGE->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('she-accident-report.modals.editSheEffluentWasteDischarged', compact('MANAGE', 'one_com', 'all_com'));
    }

    public function upload_she_effluent_waste_discharged(Request $request)
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
                                'year' => $row['A'], 'type' => 'she_effluent_waste_discharged', 'column_1' => $column_1,
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
                    $add_ = \App\she_effluent_waste_discharged::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'well_name' => $row['D'],
                            'spent_wbm' => $row['E'],
                            'spent_obm' => $row['F'],
                            'wbm_generated' => $row['G'],
                            'obm_generated' => $row['H'],
                            'waste_manager' => $row['I'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\she_effluent_waste_discharged::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Effluent Waste Discharged ');
            //Audit Logging
            self::log_audit_trail('Effluent Waste Discharged ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Effluent Waste Discharged Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_effluent_waste_discharged($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_effluent_waste_discharged::where('year', 'like', "%$txt%")->orWhere('month', 'like', "%$txt%")
                ->orwhere('well_name', 'like', "%$txt%")->orwhere('spent_wbm', 'like', "%$txt%")
                ->orwhere('spent_obm', 'like', "%$txt%")->orwhere('wbm_generated', 'like', "%$txt%")
                ->orwhere('obm_generated', 'like', "%$txt%")->orwhere('waste_manager', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\she_effluent_waste_discharged::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Effluent Waste Discharged', 'Downloaded Data');

        $view = 'she-accident-report.excel.she_effluent_waste_discharged_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Effluent Waste Discharged.xlsx');
    }

    public function approveEffluentWasteDischarged(Request $request)
    {
        $effluents = \App\she_effluent_waste_discharged::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveEffluentWasteDischarged', compact('effluents'));
    }

    public function add_she_offshore_safety_permit(Request $request)
    {
        try {
            //INSERTING NEW
            $add_permit = \App\she_offshore_safety_permit::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'personnel_registered' => $request->personnel_registered,
                'personnel_captured' => $request->personnel_captured,
                'permits_issued' => $request->permits_issued,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Offshore Safety Permit (OSP) Summary ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Offshore Safety Permit (OSP) Summary', 'Update Record');
            } else {
                self::log_audit_trail('Offshore Safety Permit (OSP) Summary', 'Add Record');
            }

            if ($request->ajax()) {
                $permit_details = ['year'=>$add_permit->year, 'personnel_registered'=>$add_permit->personnel_registered, 'personnel_captured'=>$add_permit->personnel_captured, 'water_depth'=>$add_permit->water_depth, 'permits_issued'=>$add_permit->permits_issued, 'id'=>$add_permit->id];

                return response()->json(['status'=>'ok', 'message'=>$permit_details, 'info'=>'New Offshore Safety Permit (OSP) Summary Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Offshore Safety Permit (OSP) Summary Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSheSafetyPermit(Request $request)
    {
        $PERMIT = \App\she_offshore_safety_permit::where('id', $request->id)->first();

        return view('she-accident-report.modals.editSheSafetyPermit', compact('PERMIT'));
    }

    public function upload_she_offshore_safety_permit(Request $request)
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

                    //UPLOADING NEW
                    $add_ = \App\she_offshore_safety_permit::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'personnel_registered' => $row['B'],
                            'personnel_captured' => $row['C'],
                            'permits_issued' => $row['D'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Offshore Safety Permit (OSP) Summary ');
            //Audit Logging
            self::log_audit_trail('Offshore Safety Permit (OSP) Summary', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Offshore Safety Permit (OSP) Summary Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewSheSafetyPermit(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('OSP -Safety Permit', 'Viewed Data');
        $PERMIT = \App\she_offshore_safety_permit::where('id', $request->id)->first();

        return view('she-accident-report.view.viewSheSafetyPermit', compact('PERMIT'));
    }

    public function download_she_offshore_safety_permit($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_offshore_safety_permit::where('year', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_offshore_safety_permit::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('OSP -Safety Permit', 'Downloaded Data');

        $view = 'she-accident-report.excel.osp_safety_permit';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Offshore Safety Permit.xlsx');
    }

    public function approveSafetyPermit(Request $request)
    {
        $safety_permits = \App\she_offshore_safety_permit::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveSafetyPermit', compact('safety_permits'));
    }

    public function add_she_accredited_waste_manager(Request $request)
    {
        try {
            //INSERTING NEW
            $add_manag = \App\she_accredited_waste_manager::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'company_id' => $request->company_id,
                'type_of_facility_id' => $request->type_of_facility_id,
                'facility_description' => $request->facility_description,
                'state_id' => $request->state_id,
                'operational_status_id' => $request->operational_status_id,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $type_of_facility_id = $request->type_of_facility_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'she_accredited_waste_manager', 'column_1');
                }
                if (! empty($type_of_facility_id)) {
                    $this->updateTempRecord($id, 'she_accredited_waste_manager', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_accredited_waste_manager::class, $id, 'she_accredited_waste_manager');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Accredited Waste Manager ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Upstream Accredited Waste Manager', 'Update Record');
            } else {
                self::log_audit_trail('Upstream Accredited Waste Manager', 'Add Record');
            }

            if ($request->ajax()) {
                $manager_details = ['year'=>$add_manag->year, 'company'=>'Company', 'type_of_facility'=>$add_manag->type_of_facility->facility_type_name, 'facility_description'=>$add_manag->facility_description, 'location_area'=>$add_manag->state_name, 'operational_status'=>$add_manag->operational_status_id, 'id'=>$add_manag->id];

                return response()->json(['status'=>'ok', 'message'=>$manager_details, 'info'=>'New Accredited Waste Manager Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Accredited Waste Manager Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSheAccreditedWasteManager(Request $request)
    {
        $MANAGE = \App\she_accredited_waste_manager::where('id', $request->id)->first();

        $one_com = \App\company::where('id', $MANAGE->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_fac = \App\facility_type::where('id', $MANAGE->type_of_facility_id)->first();
        $all_fac = \App\facility_type::orderBy('facility_type_name', 'asc')->where('type_id', '4')->get();
        $one_loc = \App\down_outlet_states::where('id', $MANAGE->state_id)->first();
        $all_loc = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        $one_sta = \App\gas_status::where('id', $MANAGE->operational_status_id)->first();
        $all_sta = \App\gas_status::where('id', '<=', '4')->orderBy('status_name', 'asc')->get();

        return view('she-accident-report.modals.editSheAccreditedWasteManager', compact('MANAGE', 'one_com', 'all_com', 'one_fac', 'all_fac', 'one_loc', 'all_loc', 'one_sta', 'all_sta'));
    }

    public function upload_she_accredited_waste_manager(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\facility_type::class, 'facility_type_name', "%{$row['C']}%", $row['C']);

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
                                'year' => $row['A'], 'type' => 'she_accredited_waste_manager',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $type_of_facility_id = 0;
                        } else {
                            $type_of_facility_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $type_of_facility_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\she_accredited_waste_manager::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'company_id' => $company_id,
                            // 'others' => $row['C'],
                            'type_of_facility_id' => $type_of_facility_id,
                            'facility_description' => $row['D'],
                            'state_id' => $row['E'],
                            'operational_status_id' => $row['F'],
                            // 'stage_id' => $results['stage_id'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\she_accredited_waste_manager::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                    $type_of_facility_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Accredited Waste Manager ');
            //Audit Logging
            self::log_audit_trail('Accredited Waste Manager ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Accredited Waste Manager Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_accredited_waste_manager($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_accredited_waste_manager::where('year', 'like', "%$txt%")->orwhere('facility_description', 'like', "%$txt%")->orwhere('state_id', 'like', "%$txt%")->orwhere('operational_status_id', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('type_of_facility', function ($query) use ($txt) {
                    $query->where('facility_type_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\she_accredited_waste_manager::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Accredited Waste Managers', 'Downloaded Data');

        $view = 'she-accident-report.excel.accredited_managers_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Accredited Waste Managers.xlsx');
    }

    public function viewSheAccreditedWasteManager(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Accredited Waste Managers', 'Viewed Data');
        $MANAGE = \App\she_accredited_waste_manager::where('id', $request->id)->first();

        $one_com = \App\company::where('id', $MANAGE->company_id)->first();
        $one_fac = \App\facility_type::where('id', $MANAGE->type_of_facility_id)->first();
        $one_loc = \App\down_outlet_states::where('id', $MANAGE->state_id)->first();
        $one_sta = \App\gas_status::where('id', $MANAGE->operational_status_id)->first();

        return view('she-accident-report.view.viewSheAccreditedWasteManager', compact('MANAGE', 'one_com', 'one_fac', 'one_loc', 'one_sta'));
    }

    public function AccreditedWasteManager(Request $request)
    {
        $acc_mgts = \App\she_accredited_waste_manager::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.AccreditedWasteManager', compact('acc_mgts'));
    }

    public function add_she_waste_management_facilities(Request $request)
    {
        try {
            //INSERTING NEW
            $add_manag = \App\she_accredited_waste_management_facility::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'type_of_facility_id' => $request->type_of_facility_id,
                'operational_permit' => $request->operational_permit,
                'status' => $request->status,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $type_of_facility_id = $request->type_of_facility_id;
            if (! empty($id)) {
                if (! empty($type_of_facility_id)) {
                    $this->updateTempRecord($id, 'she_accredited_waste_management_facility', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_accredited_waste_management_facility::class, $id, 'she_accredited_waste_management_facility');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT -  Waste Management Facilities ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('HSE  Waste Management Facilities', 'Update Record');
            } else {
                self::log_audit_trail('HSE  Waste Management Facilities', 'Add Record');
            }

            if ($request->ajax()) {
                $manager_details = ['year'=>$add_manag->year, 'month'=>$add_manag->month, 'type_of_facility'=>$add_manag->type_of_facility->facility_type_name, 'operational_permit'=>$add_manag->operational_permit, 'status'=>$add_manag->status, 'id'=>$add_manag->id];

                return response()->json(['status'=>'ok', 'message'=>$manager_details, 'info'=>'New  Waste Management Facilities Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', ' Waste Management Facilities Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSheWasteManagementFacilities(Request $request)
    {
        $MANAGE = \App\she_accredited_waste_management_facility::where('id', $request->id)->first();

        $one_fac = \App\facility_type::where('id', $MANAGE->type_of_facility_id)->first();
        $all_fac = \App\facility_type::orderBy('facility_type_name', 'asc')->where('type_id', '4')->get();

        return view('she-accident-report.modals.editSheWasteManagementFacilities', compact('MANAGE', 'one_fac', 'all_fac'));
    }

    public function upload_she_waste_management_facilities(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\facility_type::class, 'facility_type_name', "%{$row['C']}%", $row['C']);

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
                                'year' => $row['A'], 'type' => 'she_accredited_waste_management_facility', 'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $type_of_facility_id = 0;
                        } else {
                            $type_of_facility_id = $results_1['name'];
                        }
                    } else {
                        $type_of_facility_id = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\she_accredited_waste_management_facility::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'type_of_facility_id' => $type_of_facility_id,
                            'operational_permit' => $row['D'],
                            'status' => $row['E'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\she_accredited_waste_management_facility::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $type_of_facility_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Accredited Waste Manager ');
            //Audit Logging
            self::log_audit_trail('Accredited Waste Manager ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Accredited Waste Manager Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_waste_management_facilities($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_accredited_waste_management_facility::where('year', 'like', "%$txt%")->orWhere('month', 'like', "%$txt%")->orwhere('operational_permit', 'like', "%$txt%")->orwhere('status', 'like', "%$txt%")
                ->orwhereHas('facility_type', function ($query) use ($txt) {
                    $query->where('facility_type_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\she_accredited_waste_management_facility::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Waste Management Facilities', 'Downloaded Data');

        $view = 'she-accident-report.excel.waste_mgt_facilities_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Waste MGT Facilities.xlsx');
    }

    public function viewSheWasteManagementFacilities(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Waste Management Facilities', 'Viewed Data');
        $MANAGE = \App\she_accredited_waste_management_facility::where('id', $request->id)->first();

        $one_fac = \App\facility_type::where('id', $MANAGE->type_of_facility_id)->first();

        return view('she-accident-report.view.viewSheWasteManagementFacilities', compact('MANAGE', 'one_fac', 'all_fac'));
    }

    public function WasteManagementFacilities(Request $request)
    {
        $acc_mgts = \App\she_accredited_waste_management_facility::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.WasteManagementFacilities', compact('acc_mgts'));
    }

    public function add_she_oil_spill_contingency(Request $request)
    {
        try {  //return $request->all();

            //INSERTING NEW
            $add_os_conti = \App\SheOilSpillContingency::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'state_id' => $request->state_id,
                'types' => $request->types,
                'terrain_id' => $request->terrain_id,
                'no_of_company' => $request->no_of_company,
                'actual_no_of_company' => $request->actual_no_of_company,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $state_id = $request->state_id;
            $types = $request->types;
            $terrain_id = $request->terrain_id;
            if (! empty($id)) {
                if (! empty($state_id)) {
                    $this->updateTempRecord($id, 'SheOilSpillContingency', 'column_1');
                }
                if (! empty($types)) {
                    $this->updateTempRecord($id, 'SheOilSpillContingency', 'column_2');
                }
                if (! empty($terrain_id)) {
                    $this->updateTempRecord($id, 'SheOilSpillContingency', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\SheOilSpillContingency::class, $id, 'SheOilSpillContingency');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Oil Spill Contingency ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Oil Spill Contingency', 'Update Record');
            } else {
                self::log_audit_trail('Oil Spill Contingency', 'Add Record');
            }

            if ($request->ajax()) {
                $os_conti_details = ['year'=>$add_os_conti->year, 'zone'=>$add_os_conti->zone->zone_name, 'fac_types'=>$add_os_conti->type->type_name, 'terrain'=>$add_os_conti->terrain->terrain_name, 'no_of_company'=>$add_os_conti->no_of_company, 'actual_no_of_company'=>$add_os_conti->actual_no_of_company, 'id'=>$add_os_conti->id];

                return response()->json(['status'=>'ok', 'message'=>$os_conti_details, 'info'=>'New Oil Spill Contingency Updated Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Oil Spill Contingency Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSheOilSpillContingency(Request $request)
    {
        $MANAGE = \App\SheOilSpillContingency::where('id', $request->id)->first();

        $one_zon = \App\she_zone::where('id', $MANAGE->zone_id)->first();
        $all_zon = \App\she_zone::orderBy('zone_name', 'asc')->get();
        $one_typ = \App\she_spill_facility::where('id', $MANAGE->types)->first();
        $all_typ = \App\she_spill_facility::orderBy('type_name', 'asc')->get();
        $one_ter = \App\terrain::where('id', $MANAGE->terrain_id)->first();
        $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();

        return view('she-accident-report.modals.editSheOilSpillContingency', compact('MANAGE', 'one_zon', 'all_zon', 'one_typ', 'all_typ', 'one_ter', 'all_ter'));
    }

    public function upload_she_oil_spill_contingency(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\she_zone::class, 'zone_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\she_spill_facility::class, 'type_name', "%{$row['C']}%", $row['C']);
                    $results_3 = $this->resolveMasterData(\App\terrain::class, 'terrain_name', "%{$row['D']}%", $row['D']);

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
                                'year' => $row['A'], 'type' => 'SheOilSpillContingency',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['state_id'] == 3) {
                            $state_id = 0;
                        } else {
                            $state_id = $results_1['name'];
                        }
                        if ($results_2['types'] == 3) {
                            $types = 0;
                        } else {
                            $types = $results_2['name'];
                        }
                        if ($results_3['terrain_id'] == 3) {
                            $terrain_id = 0;
                        } else {
                            $terrain_id = $results_3['name'];
                        }
                    } else {
                        $state_id = $results_1['name'];
                        $types = $results_2['name'];
                        $terrain_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\SheOilSpillContingency::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'state_id' => $state_id,
                            'types' => $types,
                            'terrain_id' => $terrain_id,
                            'no_of_company' => $row['E'],
                            'actual_no_of_company' => $row['F'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\SheOilSpillContingency::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $state_id = '';
                    $types = '';
                    $terrain_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Oil Spill Contingency ');
            //Audit Logging
            self::log_audit_trail('Oil Spill Contingency ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Oil Spill Contingency Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_oil_spill_contigency($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\SheOilSpillContingency::where('year', 'like', "%$txt%")->orwhere('no_of_company', 'like', "%$txt%")->orwhere('actual_no_of_company', 'like', "%$txt%")
            ->orwhereHas('zone', function ($query) use ($txt) {
                $query->where('zone_name', 'like', "%$txt%");
            })
            ->orwhereHas('types', function ($query) use ($txt) {
                $query->where('type_name', 'like', "%$txt%");
            })
            ->orwhereHas('terrain', function ($query) use ($txt) {
                $query->where('terrain_name', 'like', "%$txt%");
            })->get();
        } else {
            $data = \App\SheOilSpillContingency::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Oil Spill Contingency', 'Downloaded Data');

        $view = 'she-accident-report.excel.oil_contingency_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Oil Spill Contingency.xlsx');
    }

    public function viewSheOilSpillContingency(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Oil Spill Contingency', 'Viewed Data');
        $MANAGE = \App\SheOilSpillContingency::where('id', $request->id)->first();

        $one_sta = \App\down_outlet_states::where('id', $MANAGE->state_id)->first();

        return view('she-accident-report.view.viewSheOilSpillContingency', compact('MANAGE', 'one_sta'));
    }

    public function approveOilSpillContingency(Request $request)
    {
        $contingency = \App\SheOilSpillContingency::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveOilSpillContingency', compact('contingency'));
    }

    public function add_pettitions_received(Request $request)
    {   //return $request->all();
        try {
            //INSERTING NEW
            $add_pet = \App\she_pettitions_received::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'petitioner' => $request->petitioner,
                'petitionee' => $request->petitionee,
                'category_id' => $request->category_id,
                'action_taken_id' => $request->action_taken_id,
                'status_id' => $request->status_id,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $category_id = $request->category_id;
            $action_taken_id = $request->action_taken_id;
            $status_id = $request->status_id;
            if (! empty($id)) {
                if (! empty($category_id)) {
                    $this->updateTempRecord($id, 'she_pettitions_received', 'column_1');
                }
                if (! empty($action_taken_id)) {
                    $this->updateTempRecord($id, 'she_pettitions_received', 'column_2');
                }
                if (! empty($status_id)) {
                    $this->updateTempRecord($id, 'she_pettitions_received', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_pettitions_received::class, $id, 'she_pettitions_received');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Pettitions Received ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Pettitions Received', 'Update Record');
            } else {
                self::log_audit_trail('Pettitions Received', 'Add Record');
            }

            if ($request->ajax()) {
                $add_pet_details = ['year'=>$add_pet->year, 'month'=>$add_pet->month, 'petitioner'=>$add_pet->petitioner, 'petitionee'=>$add_pet->petitionee, 'category'=>$add_pet->category->category_name, 'action_taken'=>$add_pet->action->action_name, 'status'=>$add_pet->status->status_name, 'id'=>$add_pet->id];

                return response()->json(['status'=>'ok', 'message'=>$add_pet_details, 'info'=>'New Pettitions Received Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Pettitions Received Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editPettitionsReceived(Request $request)
    {
        $MANAGE = \App\she_pettitions_received::where('id', $request->id)->first();

        return view('she-accident-report.modals.editPettitionsReceived', compact('MANAGE'));
    }

    public function upload_pettitions_received(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\she_pet_category::class, 'category_name', "%{$row['E']}%", $row['E']);
                    $results_2 = $this->resolveMasterData(\App\she_pet_action::class, 'action_name', "%{$row['F']}%", $row['F']);
                    $results_3 = $this->resolveMasterData(\App\she_pet_status::class, 'status_name', "%{$row['G']}%", $row['G']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['E'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['F'];
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
                                'year' => $row['A'], 'type' => 'she_pettitions_received',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $category_id = 0;
                        } else {
                            $category_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $action_taken_id = 0;
                        } else {
                            $action_taken_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $status_id = 0;
                        } else {
                            $status_id = $results_3['name'];
                        }
                    } else {
                        $category_id = $results_1['name'];
                        $action_taken_id = $results_2['name'];
                        $status_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\she_pettitions_received::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'petitioner' => $row['C'],
                            'petitionee' => $row['D'],
                            'category_id' => $category_id,
                            'action_taken_id' => $action_taken_id,
                            'status_id' => $status_id,
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\she_pettitions_received::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $category_id = '';
                    $action_taken_id = '';
                    $status_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Pettitions Received ');
            //Audit Logging
            self::log_audit_trail('Pettitions Received ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Pettitions Received Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_pettitions_received($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_pettitions_received::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orWhere('petitioner', 'like', "%$txt%")->orWhere('petitionee', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_pettitions_received::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Pettitions Received', 'Downloaded Data');

        $view = 'she-accident-report.excel.she_pettitions_received_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Pettitions Received.xlsx');
    }

    public function approvePettitionsReceived(Request $request)
    {
        $pettitions = \App\she_pettitions_received::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approvePettitionsReceived', compact('pettitions'));
    }

    public function add_chemical_certification(Request $request)
    {
        try {
            //INSERTING NEW
            $add_app = \App\she_chemical_certification::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'others' => $request->others,
                'chemical_name' => $request->chemical_name,
                'chemical_type' => $request->chemical_type,
                'certification_category_id' => $request->certification_category_id,
                'certification_date' => date('Y-m-d', strtotime($request->certification_date)),
                'status_id' => $request->status_id,
                'remark' => $request->remark,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $certification_category_id = $request->certification_category_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'she_chemical_certification', 'column_1');
                }
                if (! empty($certification_category_id)) {
                    $this->updateTempRecord($id, 'she_chemical_certification', 'column_2');
                }
                // if(!empty($status_id)){ $this->updateTempRecord($id, 'she_chemical_certification', 'column_3'); }

                //clear temp record
                $this->clearTempRecord(\App\she_chemical_certification::class, $id, 'she_chemical_certification');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Chemical Certifications ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Chemical Certifications', 'Update Record');
            } else {
                self::log_audit_trail('Chemical Certifications', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$add_app->year, 'month'=>$add_app->month, 'company'=>'Company', 'chemical_name'=>$add_app->chemical_name, 'chemical_type'=>$add_app->chemical_type, 'category'=>$add_app->category->category_name, 'status'=>$add_app->status->status_name, 'certification_date'=>$add_app->certification_date, 'remark'=>$add_app->remark, 'id'=>$add_app->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Chemical Certifications Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Chemical Certifications Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editChemicalCertification(Request $request)
    {
        $MANAGE = \App\she_chemical_certification::where('id', $request->id)->first();

        return view('she-accident-report.modals.editChemicalCertification', compact('MANAGE'));
    }

    public function upload_chemical_certification(Request $request)
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
                    $results_2 = $this->resolveMasterData(\App\she_pet_category::class, 'category_name', "%{$row['F']}%", $row['F']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
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

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'she_chemical_certification',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $certification_category_id = 0;
                        } else {
                            $certification_category_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $certification_category_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\she_chemical_certification::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'chemical_name' => $row['D'],
                            'chemical_type' => $row['E'],
                            'certification_category_id' => $certification_category_id,
                            'certificate_date' => date('Y-m-d', strtotime($row['G'])),
                            'status_id' => $row['H'],
                            'remark' => $row['I'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\she_chemical_certification::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                    $certification_category_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Chemical Certifications ');
            //Audit Logging
            self::log_audit_trail('Chemical Certifications ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Chemical Certifications Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_chemical_certification($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_chemical_certification::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orWhere('status_id', 'like', "%$txt%")->orWhere('chemical_name', 'like', "%$txt%")
                ->orWhere('chemical_type', 'like', "%$txt%")->orWhere('certification_date', 'like', "%$txt%")
                ->orWhere('remark', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('she_pet_category', function ($query) use ($txt) {
                    $query->where('category_name', 'like', "%$txt%");
                })
                // ->orwhereHas('she_pet_status', function($query) use ($txt){   $query->where('status_name','like',"%$txt%");     })
                ->get();
        } else {
            $data = \App\she_chemical_certification::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Chemical Certifications', 'Downloaded Data');

        $view = 'she-accident-report.excel.she_chemical_certification_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Chemical Certifications.xlsx');
    }

    public function approveChemicalCertification(Request $request)
    {
        $chem_certifications = \App\she_chemical_certification::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveChemicalCertification', compact('chem_certifications'));
    }

    public function add_accredited_laboratories(Request $request)
    {
        try {
            //INSERTING NEW
            $add_app = \App\she_accredited_laboratory::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'laboratory_name' => $request->laboratory_name,
                'laboratory_services' => $request->laboratory_services,
                'zones' => $request->zones,
                'no_of_accredited_lab' => $request->no_of_accredited_lab,
                'request_type' => $request->request_type,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $zones = $request->zones;
            if (! empty($id)) {
                if (! empty($zones)) {
                    $this->updateTempRecord($id, 'she_accredited_laboratory', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_accredited_laboratory::class, $id, 'she_accredited_laboratory');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Accredited Laboratories ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Accredited Laboratories', 'Update Record');
            } else {
                self::log_audit_trail('Accredited Laboratories', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$add_app->year, 'month'=>$add_app->month, 'laboratory_services'=>$add_app->laboratory_services, 'zones'=>$add_app->field_office->zones, 'laboratory_name'=>$add_app->laboratory_name, 'no_of_accredited_lab'=>$add_app->no_of_accredited_lab, 'request_type'=>$add_app->request_type, 'id'=>$add_app->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Accredited Laboratories Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Accredited Laboratories Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editAccreditedLaboratories(Request $request)
    {
        $MANAGE = \App\she_accredited_laboratory::where('id', $request->id)->first();
        $one_zon = \App\down_field_office::where('id', $MANAGE->zones)->first();
        $all_zon = \App\down_field_office::orderBy('field_office_name', 'asc')->get();

        return view('she-accident-report.modals.editAccreditedLaboratories', compact('MANAGE', 'one_zon', 'all_zon'));
    }

    public function upload_accredited_laboratories(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\down_field_office::class, 'field_office_name', "%{$row['E']}%", $row['E']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['E'];
                        } else {
                            $column_1 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'she_accredited_laboratory', 'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $zones = 0;
                        } else {
                            $zones = $results_1['name'];
                        }
                    } else {
                        $zones = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\she_accredited_laboratory::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'laboratory_name' => $row['C'],
                            'laboratory_services' => $row['D'],
                            'zones' => $zones,
                            // 'no_of_accredited_lab' => $row['F'],
                            'request_type' => $row['F'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\she_accredited_laboratory::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $zones = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Accredited Laboratories ');
            //Audit Logging
            self::log_audit_trail('Accredited Laboratories ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Accredited Laboratories Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_accredited_laboratories($type, Request $request)  //"%{$request->q}%"
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_accredited_laboratory::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orWhere('laboratory_name', 'like', "%$txt%")
                ->orWhere('request_type', 'like', "%$txt%")
                ->orwhereHas('field_office', function ($query) use ($txt) {
                    $query->where('field_office_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\she_accredited_laboratory::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Accredited Laboratories', 'Downloaded Data');

        $view = 'she-accident-report.excel.accredited_laboratories_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Accredited Laboratories.xlsx');
    }

    public function approveAccreditedLaboratories(Request $request)
    {
        $acc_labs = \App\she_accredited_laboratory::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveAccreditedLaboratories', compact('acc_labs'));
    }

    public function add_drilling_chemical(Request $request)
    {
        try {
            //INSERTING NEW
            $add_app = \App\she_drilling_chemical::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'fluid_type' => $request->fluid_type,
                'number' => $request->number,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Drilling Chemical ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Drilling Chemical', 'Update Record');
            } else {
                self::log_audit_trail('Drilling Chemical', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$add_app->year, 'month'=>$add_app->month, 'fluid_type'=>$add_app->fluid_type, 'number'=>$add_app->number, 'id'=>$add_app->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Drilling Chemical Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Drilling Chemical Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editDrillingChemical(Request $request)
    {
        $MANAGE = \App\she_drilling_chemical::where('id', $request->id)->first();

        return view('she-accident-report.modals.editDrillingChemical', compact('MANAGE'));
    }

    public function upload_drilling_chemical(Request $request)
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

                    //UPLOADING NEW
                    $add_ = \App\she_drilling_chemical::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'fluid_type' => $row['C'],
                            'number' => $row['D'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Drilling Chemical ');
            //Audit Logging
            self::log_audit_trail('Drilling Chemical ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Drilling Chemical Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_dilling_chemical($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_drilling_chemical::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_drilling_chemical::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Drilling Chemical', 'Downloaded Data');

        $view = 'she-accident-report.excel.dilling_chemical_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Drilling Chemicals.xlsx');
    }

    public function add_environmental_restoration(Request $request)
    {
        try {
            //INSERTING NEW
            $add_app = \App\she_environmental_restoration::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'service' => $request->service,
                'status_id' => $request->status_id,
                'new' => $request->new,
                'renew' => $request->renew,
                'total' => ($request->new + $request->renew),
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $status_id = $request->status_id;
            if (! empty($id)) {
                if (! empty($status_id)) {
                    $this->updateTempRecord($id, 'she_environmental_restoration', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_environmental_restoration::class, $id, 'she_environmental_restoration');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Environmental Restoration ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Environmental Restoration', 'Update Record');
            } else {
                self::log_audit_trail('Environmental Restoration', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$add_app->year, 'month'=>$add_app->month, 'service'=>$add_app->service, 'status'=>$add_app->status->status_name, 'new'=>$add_app->new, 'renew'=>$add_app->renew, 'total'=>$add_app->total, 'id'=>$add_app->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Applications For Environmental Restoration Services Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Applications For Environmental Restoration Services Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editEnvironmentalRestoration(Request $request)
    {
        $MANAGE = \App\she_environmental_restoration::where('id', $request->id)->first();
        $one_sta = \App\she_status::where('id', $MANAGE->status_id)->first();
        $all_sta = \App\she_status::where('status_name', '<>', 'Under Processing')->orderBy('status_name', 'asc')->get();

        return view('she-accident-report.modals.editEnvironmentalRestoration', compact('MANAGE', 'one_sta', 'all_sta'));
    }

    public function upload_environmental_restoration(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\she_status::class, 'status_name', "%{$row['D']}%", $row['D']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['D'];
                        } else {
                            $column_1 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'she_environmental_restoration', 'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $status_id = 0;
                        } else {
                            $status_id = $results_1['name'];
                        }
                    } else {
                        $status_id = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\she_environmental_restoration::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'service' => $row['C'],
                            'status_id' => $status_id,
                            'new' => $row['E'],
                            'renew' => $row['F'],
                            'total' => ($row['E'] + $row['F']),
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\she_environmental_restoration::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $status_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Environmental Restoration ');
            //Audit Logging
            self::log_audit_trail('Environmental Restoration ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Applications For Environmental Restoration Services Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_environmental_restoration($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_environmental_restoration::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")
            ->orwhereHas('status', function ($query) use ($txt) {
                $query->where('status_name', 'like', "%$txt%");
            })->get();
        } else {
            $data = \App\she_environmental_restoration::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Environmental Restoration', 'Downloaded Data');

        $view = 'she-accident-report.excel.she_environmental_restoration_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Environmental Restoration.xlsx');
    }

    public function approveEnvironmentalRestoration(Request $request)
    {
        $env_restorations = \App\she_environmental_restoration::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveEnvironmentalRestoration', compact('env_restorations'));
    }

    public function add_environmental_studies(Request $request)
    {
        try {
            //INSERTING NEW
            $env_stu = \App\she_environmental_studies::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'type_id' => $request->type_id,
                'status_id' => $request->status_id,
                'study_title' => $request->study_title,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $type_id = $request->type_id;
            $status_id = $request->status_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'she_environmental_studies', 'column_1');
                }
                if (! empty($type_id)) {
                    $this->updateTempRecord($id, 'she_environmental_studies', 'column_2');
                }
                if (! empty($status_id)) {
                    $this->updateTempRecord($id, 'she_environmental_studies', 'column_3');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_environmental_studies::class, $id, 'she_environmental_studies');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Environmental Studies ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Environmental Studies', 'Update Record');
            } else {
                self::log_audit_trail('Environmental Studies', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$env_stu->year, 'month'=>$env_stu->month, 'company'=>$env_stu->company->company_name, 'study_title'=>$env_stu->study_title, 'types'=>$env_stu->type->type_name, 'status'=>$env_stu->status->type_name, 'id'=>$env_stu->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Environmental Studies Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Environmental Studies Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editEnvironmentalStudies(Request $request)
    {
        $MANAGE = \App\she_environmental_studies::where('id', $request->id)->first();
        $one_typ = \App\she_study_type::where('id', $MANAGE->type_id)->first();
        $all_typ = \App\she_study_type::where('type', 'study')->orderBy('type_name', 'asc')->get();
        $one_sta = \App\she_study_type::where('id', $MANAGE->status_id)->first();
        $all_sta = \App\she_study_type::where('type', 'status')->orderBy('type_name', 'asc')->get();
        $one_com = \App\company::where('id', $MANAGE->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('she-accident-report.modals.editEnvironmentalStudies', compact('MANAGE', 'one_typ', 'all_typ', 'one_sta', 'all_sta', 'one_com', 'all_com'));
    }

    public function upload_environmental_studies(Request $request)
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
                    $results_2 = $this->resolveMasterData(\App\she_study_type::class, 'type_name', "%{$row['E']}%", $row['E']);
                    $results_3 = $this->resolveMasterData(\App\she_study_type::class, 'type_name', "%{$row['F']}%", $row['F']);

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
                            $column_3 = $row['F'];
                        } else {
                            $column_3 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['A'], 'type' => 'she_environmental_studies',
                                'column_1' => $column_1, 'column_2' => $column_2, 'column_3' => $column_3,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $type_id = 0;
                        } else {
                            $type_id = $results_2['name'];
                        }
                        if ($results_3['stage_id'] == 3) {
                            $status_id = 0;
                        } else {
                            $status_id = $results_3['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $type_id = $results_2['name'];
                        $status_id = $results_3['name'];
                    }

                    //UPLOADING NEW
                    $add_ = \App\she_environmental_studies::updateOrCreate([
                        'company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['C']),
                        'type_id'=> $this->resolveModelId(\App\she_study_type::class, 'type_name', $row['E']),
                        'study_title'=> $row['D'], 'year'=> $row['A'], 'month'=> $row['B'], ],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'study_title' => $row['D'],
                            'type_id' => $type_id,
                            'status_id' => $status_id,
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3 || $results_3['stage_id'] == 3) {
                        $this->updateTable(\App\she_environmental_studies::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                    $type_id = '';
                    $status_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Environmental Studies ');
            //Audit Logging
            self::log_audit_trail('Environmental Studies ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Environmental Studies Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_environmental_studies($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_environmental_studies::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orWhere('study_title', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('type', function ($query) use ($txt) {
                    $query->where('type_name', 'like', "%$txt%");
                })
                ->orwhereHas('status', function ($query) use ($txt) {
                    $query->where('type_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\she_environmental_studies::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Environmental Studies', 'Downloaded Data');

        $view = 'she-accident-report.excel.she_environmental_studies_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Environmental Studies.xlsx');
    }

    public function approveEnvironmentalStudies(Request $request)
    {
        $env_studies = \App\she_environmental_studies::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveEnvironmentalStudies', compact('env_studies'));
    }

    public function add_environmental_compliance(Request $request)
    {
        try {
            //INSERTING NEW
            $env_stu = \App\she_environmental_compliance_monitoring::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'compliance' => $request->compliance,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'she_environmental_compliance_monitoring', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\she_environmental_compliance_monitoring::class, $id, 'she_environmental_compliance_monitoring');
            }

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Environmental Compliance Monitoring ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Environmental Compliance Monitoring', 'Update Record');
            } else {
                self::log_audit_trail('Environmental Compliance Monitoring', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$env_stu->year, 'month'=>$env_stu->month, 'company'=>$env_stu->company->company_name, 'compliance'=>$env_stu->compliance, 'id'=>$env_stu->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Environmental Compliance Monitoring Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Environmental Compliance Monitoring Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editEnvironmentalCompliance(Request $request)
    {
        $MANAGE = \App\she_environmental_compliance_monitoring::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $MANAGE->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('she-accident-report.modals.editEnvironmentalCompliance', compact('MANAGE', 'one_com', 'all_com'));
    }

    public function upload_environmental_compliance(Request $request)
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
                                'year' => $row['A'], 'type' => 'she_environmental_compliance_monitoring', 'column_1' => $column_1,
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
                    $add_ = \App\she_environmental_compliance_monitoring::updateOrCreate(['company_id'=> $this->resolveModelId(\App\company::class, 'company_name', $row['C']), 'year'=> $row['A'], 'month'=> $row['B']],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'compliance' => $row['D'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\she_environmental_compliance_monitoring::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Environmental Compliance Monitoring ');
            //Audit Logging
            self::log_audit_trail('Environmental Compliance Monitoring ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Environmental Compliance Monitoring Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_environmental_compliance($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_environmental_compliance_monitoring::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })->get();
        } else {
            $data = \App\she_environmental_compliance_monitoring::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Environmental Compliance Monitoring', 'Downloaded Data');

        $view = 'she-accident-report.excel.she_environmental_compliance_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Environmental Compliance Monitoring.xlsx');
    }

    public function approveEnvironmentalCompliance(Request $request)
    {
        $env_compliances = \App\she_environmental_compliance_monitoring::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveEnvironmentalCompliance', compact('env_compliances'));
    }

    public function add_medical_training_center(Request $request)
    {
        try {
            //INSERTING NEW
            $env_stu = \App\she_medical_training_center::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'companies' => $request->companies,
                'facility_address' => $request->facility_address,
                'approved_courses' => $request->approved_courses,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Medical Training Center ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Medical Training Center', 'Update Record');
            } else {
                self::log_audit_trail('Medical Training Center', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$env_stu->year, 'companies'=>$env_stu->companies, 'facility_address'=>$env_stu->facility_address, 'approved_courses'=>$env_stu->approved_courses, 'id'=>$env_stu->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Medical Training Center Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Medical Training Center Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMedicalTrainingCenter(Request $request)
    {
        $MANAGE = \App\she_medical_training_center::where('id', $request->id)->first();

        return view('she-accident-report.modals.editMedicalTrainingCenter', compact('MANAGE'));
    }

    public function upload_medical_training_center(Request $request)
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

                    //UPLOADING NEW
                    $add_ = \App\she_medical_training_center::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'companies' => $row['B'],
                            'facility_address' => $row['C'],
                            'approved_courses' => $row['D'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Medical Training Center ');
            //Audit Logging
            self::log_audit_trail('Medical Training Center ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Medical Training Center Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_medical_training_center($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_medical_training_center::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orWhere('facility_address', 'like', "%$txt%")->orWhere('approved_courses', 'like', "%$txt%")->get();
        } else {
            $data = \App\she_medical_training_center::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Medical Training Center', 'Downloaded Data');

        $view = 'she-accident-report.excel.medical_training_center_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Medical Training Center.xlsx');
    }

    public function approveMedicalTrainingCenter(Request $request)
    {
        $training_centers = \App\she_medical_training_center::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveMedicalTrainingCenter', compact('training_centers'));
    }

    public function add_radiation_safety_permit(Request $request)
    {
        try {
            //INSERTING NEW
            $env_stu = \App\she_radiation_safety_permit::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'month' => $request->month,
                'company_id' => $request->company_id,
                'well_type' => $request->well_type,
                'well_name' => $request->well_name,
                'concession' => $request->concession,
                'count' => $request->count,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            //self::send_all_mail("HEALTH SAFETY & ENVIRONMENT - Radiation Safety Permit ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Radiation Safety Permit', 'Update Record');
            } else {
                self::log_audit_trail('Radiation Safety Permit', 'Add Record');
            }

            if ($request->ajax()) {
                $add_app_details = ['year'=>$env_stu->year, 'month'=>$env_stu->month, 'company'=>$env_stu->company->company_name, 'well_type'=>$env_stu->well_type, 'well_name'=>$env_stu->well_name, 'concession'=>$env_stu->concession, 'count'=>$env_stu->count, 'id'=>$env_stu->id];

                return response()->json(['status'=>'ok', 'message'=>$add_app_details, 'info'=>'New Radiation Safety Permit Added Successfully.']);
            } else {
                return redirect()->route('she-accident-report.index')->with('info', 'Radiation Safety Permit Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editRadiationSafetyPermit(Request $request)
    {
        $MANAGE = \App\she_radiation_safety_permit::where('id', $request->id)->first();

        $one_com = \App\company::where('id', $MANAGE->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();

        return view('she-accident-report.modals.editRadiationSafetyPermit', compact('MANAGE', 'one_com', 'all_com'));
    }

    public function upload_radiation_safety_permit(Request $request)
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
                                'year' => $row['A'], 'type' => 'she_radiation_safety_permit', 'column_1' => $column_1,
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
                    $add_ = \App\she_radiation_safety_permit::updateOrCreate(['id'=> $request->id],
                        [
                            'year' => $row['A'],
                            'month' => $row['B'],
                            'company_id' => $company_id,
                            'well_type' => $row['D'],
                            'well_name' => $row['E'],
                            'concession' => $row['F'],
                            'count' => $row['G'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\she_radiation_safety_permit::class, 'pending_id', $add_->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                    }
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail('HEALTH SAFETY & ENVIRONMENT - Radiation Safety Permit ');
            //Audit Logging
            self::log_audit_trail('Radiation Safety Permit ', 'Data Bulk Upload');

            return redirect()->route('she-accident-report.index')->with('info', 'Radiation Safety Permit Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_she_radiation_safety_permit($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\she_radiation_safety_permit::where('year', 'like', "%$txt%")->orwhere('month', 'like', "%$txt%")->orwhere('well_type', 'like', "%$txt%")->orwhere('count', 'like', "%$txt%")
                ->orwhere('well_name', 'like', "%$txt%")->orwhere('concession', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })->get();
        } else {
            $data = \App\she_radiation_safety_permit::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Radiation Safety Permit', 'Downloaded Data');

        $view = 'she-accident-report.excel.she_radiation_safety_permit_excel';

        return \Excel::download(new \App\Imports\hse\ImportHSEData($data, $view), 'Radiation Safety Permit.xlsx');
    }

    public function approveRadiationSafetyPermit(Request $request)
    {
        $radiations = \App\she_radiation_safety_permit::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('she-accident-report.approve.approveRadiationSafetyPermit', compact('radiations'));
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
            self::log_audit_trail('HSE Data', 'Data Deleted');
        } catch (\Exception $e) {
            // return response()->json(['status'=>'error', 'message'=>'Sorry, An Error Occurred .' .$e->getMessage()]);
            return  redirect()->route('she-accident-report.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }
}
