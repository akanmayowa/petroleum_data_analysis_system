<?php

namespace App\Http\Controllers;

use App\Notifications\emailNOGIARManager;
use App\Traits\ExcelExport;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DistributionController extends Controller
{
    use ExcelExport;

    //\
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    //function for sending email
    public function send_all_mail($upload_name)
    {
        //getting the number of DWP USERS
        $users = \App\EmailList::where('division', 'Engineering and Standard')->get();
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
    public function send_approve_mail($pending_data, $role_1, $role_2)
    {
        //getting the number of DWP USERS
        $count = \App\User::where('role', $role_1)->orwhere('role', $role_2)->get();
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
            'section' => 'E&S',
            'record' => $record,
            'action' => $action,
        ]);
    }

    public function index(Request $request)
    {
        $company_down = $company_ppp = $companies_ppp = $owner_ddl = $company_ddl = $company_tech = $company_up = \App\company::orderBy('company_name', 'asc')->get();
        $concession_up = \App\concession::orderBy('concession_name', 'asc')->get();
        $locations_ppp = $location_ddl = $field_lrp = \App\field::orderBy('field_name', 'asc')->get();
        $state_lrp = $state_list = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        // $phase_ddl = \App\gas_status::where('id', '3')->orwhere('id', '6')->orwhere('id', '7')->orderBy('status_name', 'asc')->get();
        $service_ddl = \App\es_service::orderBy('service_name', 'asc')->get();
        $facility_ddl = \App\facility::orderBy('facility_name', 'asc')->get();
        $status_tech = $phase_ddl = $pl_status = $validity = $status_up = $status_down = $plant_status = \App\es_project_status::orderBy('status_name', 'asc')->get();
        return view('transport.index', compact('company_ppp', 'locations_ppp', 'companies_ppp', 'concession_up', 'plant_status', 'state_list', 'owner_ddl', 'pl_status', 'phase_ddl', 'service_ddl', 'facility_ddl', 'company_ddl', 'location_ddl', 'status_up', 'status_down', 'validity', 'field_lrp', 'state_lrp', 'company_tech', 'status_tech', 'company_up', 'company_down'));
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

            case 'add_processing_plant_project':
                return $this->add_processing_plant_project($request);
            break;

            case 'upload_processing_plant_project':
                return $this->upload_processing_plant_project($request);
            break;

            case 'add_refinery_project':
                return $this->add_refinery_project($request);
            break;

            case 'upload_refinery_project':
                return $this->upload_refinery_project($request);
            break;

            case 'add_down_project':
                return $this->add_down_project($request);
            break;

            case 'upload_down_project':
                return $this->upload_down_project($request);
            break;

            case 'add_gas_project':
                return $this->add_gas_project($request);
            break;

            case 'upload_gas_project':
                return $this->upload_gas_project($request);
            break;

            case 'add_upstream_project':
                return $this->add_upstream_project($request);
            break;

            case 'upload_upstream_project':
                return $this->upload_upstream_project($request);
            break;

            case 'add_pipeline_project':
                return $this->add_pipeline_project($request);
            break;

            case 'upload_pipeline_project':
                return $this->upload_pipeline_project($request);
            break;

            case 'add_metering':
                return $this->add_metering($request);
            break;

            case 'upload_metering':
                return $this->upload_metering($request);
            break;

            case 'add_technology':
                return $this->add_technology($request);
            break;

            case 'upload_technology':
                return $this->upload_technology($request);
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

            case 'modals_editOilProcessingPlantProject':
                // code...
                return $this->editOilProcessingPlantProject($request);
            break;

            case 'view_viewOilProcessingPlantProject':
                // code...
                return $this->viewOilProcessingPlantProject($request);
            break;

            case 'approve_approveProcessingPlantProject':
                // code...
                return $this->approveProcessingPlantProject($request);
            break;

            case 'modals_editRefineryProject':
                // code...
                return $this->editRefineryProject($request);
            break;

            case 'view_viewRefineryProject':
                // code...
                return $this->viewRefineryProject($request);
            break;

            case 'approve_approveRefineryProject':
                // code...
                return $this->approveRefineryProject($request);
            break;

            case 'modals_editDownPlantProject':
                // code...
                return $this->editDownPlantProject($request);
            break;

            case 'view_viewDownPlantProject':
                // code...
                return $this->viewDownPlantProject($request);
            break;

            case 'approve_approveDownPlantProject':
                // code...
                return $this->approveDownPlantProject($request);
            break;

            case 'modals_editProcessingPlantProject':
                // code...
                return $this->editProcessingPlantProject($request);
            break;

            case 'view_viewProcessingPlantProject':
                // code...
                return $this->viewProcessingPlantProject($request);
            break;

            case 'approve_approveGasProject':
                // code...
                return $this->approveGasProject($request);
            break;

            case 'modals_editUpstreamProject':
                // code...
                return $this->editUpstreamProject($request);
            break;

            case 'view_viewUpstreamProject':
                // code...
                return $this->viewUpstreamProject($request);
            break;

            case 'approve_approveUpstreamProject':
                // code...
                return $this->approveUpstreamProject($request);
            break;

            case 'modals_editPipelineProject':
                // code...
                return $this->editPipelineProject($request);
            break;

            case 'view_viewPipelineProject':
                // code...
                return $this->viewPipelineProject($request);
            break;

            case 'approve_approvePipelineProject':
                // code...
                return $this->approvePipelineProject($request);
            break;

            case 'modals_editMetering':
                // code...
                return $this->editMetering($request);
            break;

            case 'view_viewMetering':
                // code...
                return $this->viewMetering($request);
            break;

            case 'approve_approveMetering':
                // code...
                return $this->approveMetering($request);
            break;

            case 'modals_editTechnology':
                // code...
                return $this->editTechnology($request);
            break;

            case 'view_viewTechnology':
                // code...
                return $this->viewTechnology($request);
            break;

            case 'approve_approveTechnology':
                // code...
                return $this->approveTechnology($request);
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

    public function add_processing_plant_project(Request $request)
    {
        try {
            //INSERTING NEW Oil Processing Development Projects
            $gas_plant = \App\up_processing_plant_project::updateOrCreate(['id'=> $request->id],
            [
                'project' => $request->project,
                'company_id' => $request->company_id,
                'others' => $request->others,
                'terrain_id' => $request->terrain_id,
                'location' => $request->location,
                'expected_oil' => $request->expected_oil,
                'expected_gas' => $request->expected_gas,
                'expected_water' => $request->expected_water,
                'expected_efi' => $request->expected_efi,
                'facility_type' => $request->facility_type,
                'development_type' => $request->development_type,
                'start_date' => $request->start_date,
                'completion_date' => $request->completion_date,
                'status_id' => $request->status_id,
                'remark' => $request->remark,
                'year' => $request->year,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'up_processing_plant_project', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\up_processing_plant_project::class, $id, 'up_processing_plant_project');
            }

            //send mail
            //self::send_all_mail("PROJECTS & TRANSPORTION - Major Oil Production (Addition) Development Projects ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Major Oil Production Projects', 'Update Record');
            } else {
                self::log_audit_trail('Major Oil Production Projects', 'Add Record');
            }

            //$gas_plant = \App\up_processing_plant_project::where('id', $add_gas_plant)->first();

            if ($request->ajax()) {
                $gas_plant_details = ['year'=>$gas_plant->year, 'project'=>$gas_plant->project, 'company'=>'Company', 'others'=>$gas_plant->others, 'terrain'=>$gas_plant->terrain_id, 'location'=>$gas_plant->location, 'expected_oil'=>$gas_plant->expected_oil, 'expected_gas'=>$gas_plant->expected_gas,  'expected_water'=>$gas_plant->expected_water,  'expected_efi'=>$gas_plant->expected_efi, 'facility_type'=>$gas_plant->facility_type, 'development_type'=>$gas_plant->development_type, 'start_date'=>$gas_plant->start_date, 'completion_date'=>$gas_plant->completion_date, 'status'=>$gas_plant->status_id, 'remark'=>$gas_plant->remark, 'id'=>$gas_plant->id];

                return response()->json(['status'=>'ok', 'message'=>$gas_plant_details, 'info'=>'New Oil (Addition) Processing Development Projects Added Successfully.']);
            } else {
                return redirect()->route('transport.index')->with('info', 'Oil Processing (Addition) Development Projects Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editOilProcessingPlantProject(Request $request)
    {
        $GAS_PLANT = \App\up_processing_plant_project::where('id', $request->id)->first();

        return view('transport.modals.editOilProcessingPlantProject', compact('GAS_PLANT'));
    }

    public function upload_processing_plant_project(Request $request)
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
                                'year' => $row['P'], 'type' => 'up_processing_plant_project', 'column_1' => $column_1,
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
                    $add_prod = \App\up_processing_plant_project::updateOrCreate(['id'=> $request->id],
                        [
                            'project' => $row['A'],
                            'location' => $row['B'],
                            'company_id' => $company_id,
                            'others' => $row['D'],
                            'terrain_id' => $row['E'],
                            'expected_oil' => $row['F'],
                            'expected_gas' => $row['G'],
                            'expected_water' => $row['H'],
                            'expected_efi' => $row['I'],
                            'facility_type' => $row['J'],
                            'development_type' => $row['K'],
                            'start_date' => $row['L'],
                            'completion_date' => $row['M'],
                            'status_id' => $row['N'],
                            'remark' => $row['O'],
                            'year' => $row['P'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\up_processing_plant_project::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                }
            }

            //send mail
            self::send_all_mail('PROJECTS & TRANSPORTION - Major Oil Production (Addition) Development Projects ');
            //Audit Logging
            self::log_audit_trail('Major Oil Production Project', 'Data Bulk Upload');

            return redirect()->route('transport.index')->with('info', 'Major Oil Production (Addition) Development Projects Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewOilProcessingPlantProject(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Major Oil Projects', 'Viewed Data');
        $GAS_PLANT = \App\up_processing_plant_project::where('id', $request->id)->first();

        return view('transport.view.viewOilProcessingPlantProject', compact('GAS_PLANT'));
    }

    public function download_processing_plant_project($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\up_processing_plant_project::where('year', 'like', "%$txt%")->orwhere('project', 'like', "%$txt%")->orwhere('terrain_id', 'like', "%$txt%")->orwhere('development_type', 'like', "%$txt%")->orwhere('location', 'like', "%$txt%")->orwhere('development_type', 'like', "%$txt%")->orwhere('facility_type', 'like', "%$txt%")
            ->orwhere('start_date', 'like', "%$txt%")->orwhere('completion_date', 'like', "%$txt%")

            ->orwhereHas('company', function ($query) use ($txt) {
                $query->where('company_name', 'like', "%$txt%");
            })
            ->orwhereHas('status', function ($query) use ($txt) {
                $query->where('status_name', 'like', "%$txt%");
            })
                ->get();
        } else {
            $data = \App\up_processing_plant_project::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Major Oil Projects', 'Downloaded Data');

        $view = 'transport.excel.upstream_project_excel';

        return \Excel::download(new \App\Imports\es\ImportESData($data, $view), 'Major Oil Production.xlsx');
    }

    public function approveProcessingPlantProject(Request $request)
    {
        $processing_plants = \App\up_processing_plant_project::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('transport.approve.approveProcessingPlantProject', compact('processing_plants'));
    }

    public function add_refinery_project(Request $request)
    {
        try {
            // $company = \App\concession::where('id', $request->field_id)->first();
            // if($company){ $company_id = $company->company_id; }  else{ $company_id = 0; }

            //INSERTING NEW Refinery  Projects
            $add_ref_proj = \App\es_licensed_refinery_project::updateOrCreate(['id'=> $request->id],
            [
                'project_name' => $request->project_name,
                // 'company_id' => $company_id,
                'field_id' => $request->field_id,
                'location' => $request->location,
                'capacity' => $request->capacity,
                'refinery_type' => $request->refinery_type,
                'license_granted' => $request->license_granted,
                'estimated_completion' => $request->estimated_completion,
                'license_validity' => $request->license_validity,
                'license_expiration_date' => date('Y-m-d', strtotime($request->license_expiration_date)),
                'status_remark' => $request->status_remark,
                'year' => $request->year,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $license_validity = $request->license_validity;
            if (! empty($id)) {
                if (! empty($license_validity)) {
                    $this->updateTempRecord($id, 'es_licensed_refinery_project', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\es_licensed_refinery_project::class, $id, 'es_licensed_refinery_project');
            }

            //send mail
            //self::send_all_mail("PROJECTS & TRANSPORTION - Status Licensed Refinery Projects ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Status Licensed Refinery Projects', 'Update Record');
            } else {
                self::log_audit_trail('Status Licensed Refinery Projects', 'Add Record');
            }

            if ($request->ajax()) {
                $down_ref_proj_details = ['year'=>$add_ref_proj->year, 'project_name'=>$add_ref_proj->project_name, 'field'=>$add_ref_proj->field_id, 'location'=>$add_ref_proj->location, 'capacity'=>$add_ref_proj->capacity, 'refinery_type'=>$add_ref_proj->refinery_type, 'license_granted'=>$add_ref_proj->license_granted, 'estimated_completion'=>$add_ref_proj->estimated_completion, 'license_validity'=>$add_ref_proj->validity->status_name, 'license_expiration_date'=>$add_ref_proj->license_expiration_date, 'status_remark'=>$add_ref_proj->status_remark, 'id'=>$add_ref_proj->id];

                return response()->json(['status'=>'ok', 'message'=>$down_ref_proj_details, 'info'=>'New Status Licensed Refinery Projects Added Successfully.', 'id'=>$add_plant]);
            } else {
                return redirect()->route('transport.index')->with('info', 'Status Licensed Refinery Projects Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editRefineryProject(Request $request)
    {
        $REF_PROJ = \App\es_licensed_refinery_project::where('id', $request->id)->first();

        return view('transport.modals.editRefineryProject', compact('REF_PROJ'));
    }

    public function upload_refinery_project(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\es_project_status::class, 'status_name', "%{$row['H']}%", $row['H']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['H'];
                        } else {
                            $column_1 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['J'], 'type' => 'es_licensed_refinery_project',
                                'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $license_validity = 0;
                        } else {
                            $license_validity = $results_1['name'];
                        }
                    } else {
                        $license_validity = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\es_licensed_refinery_project::updateOrCreate(['id'=> $request->id],
                        [
                            'project_name' => $row['A'],
                            // 'company_id' => $this->resolveModelId('\App\company', 'company_name', $row['B']),
                            'field_id' => $row['B'],
                            'location' => $row['C'],
                            'capacity' => $row['D'],
                            'refinery_type' => $row['E'],
                            'license_granted' => $row['F'],
                            'estimated_completion' => $row['G'],
                            'license_validity' => $license_validity,
                            'license_expiration_date' => date('Y-m-d', strtotime($row['I'])),
                            'status_remark' => $row['J'],
                            'year' => $row['K'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\es_licensed_refinery_project::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $license_validity = '';
                }
            }

            //send mail
            self::send_all_mail('PROJECTS & TRANSPORTION - Status Licensed Refinery Projects ');
            //Audit Logging
            self::log_audit_trail('Status Licensed Refinery Projects', 'Data Bulk Upload');

            return redirect()->route('transport.index')->with('info', 'Status Licensed Refinery Projects Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewRefineryProject(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Licensed Refinery Projects', 'Viewed Data');
        $REF_PROJ = \App\es_licensed_refinery_project::where('id', $request->id)->first();

        return view('transport.view.viewRefineryProject', compact('REF_PROJ'));
    }

    public function download_refinery_project($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\es_licensed_refinery_project::where('year', 'like', "%$txt%")
            ->orwhere('project_name', 'like', "%$txt%")
            ->orwhere('capacity', 'like', "%$txt%")->orwhere('refinery_type', 'like', "%$txt%")
            ->orwhere('status_id', 'like', "%$txt%")->orwhere('field_id', 'like', "%$txt%")
            ->orwhere('license_granted', 'like', "%$txt%")->orwhere('estimated_completion', 'like', "%$txt%")
            ->orwhere('license_expiration_date', 'like', "%$txt%")->orwhere('status_remark', 'like', "%$txt%")

            ->orwhereHas('validity', function ($query) use ($txt) {
                $query->where('status_name', 'like', "%$txt%");
            })
                ->get();
        } else {
            $data = \App\es_licensed_refinery_project::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Licensed Refinery Projects', 'Downloaded Data');

        $view = 'transport.excel.refinery_project_excel';

        return \Excel::download(new \App\Imports\es\ImportESData($data, $view), 'Licensed Refinery Projects.xlsx');
    }

    public function approveRefineryProject(Request $request)
    {
        $ref_projects = \App\es_licensed_refinery_project::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('transport.approve.approveRefineryProject', compact('ref_projects'));
    }

    public function add_down_project(Request $request)
    {
        try {
            //INSERTING NEW Gas  Projects
            $add_plant = \App\down_petrochemical_plant_project::updateOrCreate(['id'=> $request->id],
            [
                'company' => $request->company,
                'location' => $request->location,
                'plant_name' => $request->plant_name,
                'plant_type' => $request->plant_type,
                'capacity_by_unit' => $request->capacity_by_unit,
                'output_yield' => $request->output_yield,
                'status' => $request->status,
                'start_year' => $request->start_year,
                'estimated_completion' => $request->estimated_completion,
                'project_desc_by_unit' => $request->project_desc_by_unit,
                'feed' => $request->feed,
                'remark' => $request->remark,
                'year' => $request->year,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $status = $request->status;
            if (! empty($id)) {
                if (! empty($status)) {
                    $this->updateTempRecord($id, 'down_petrochemical_plant_project', 'column_1');
                }

                //clear temp record
                $this->clearTempRecord(\App\down_petrochemical_plant_project::class, $id, 'down_petrochemical_plant_project');
            }

            //send mail
            //self::send_all_mail("PROJECTS & TRANSPORTION - Major Petrochemical Plant Projects ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Major Petrochemical Plant Projects', 'Update Record');
            } else {
                self::log_audit_trail('Major Petrochemical Plant Projects', 'Add Record');
            }

            if ($request->ajax()) {
                $down_plant_details = ['year'=>$add_plant->year, 'company'=>$add_plant->company, 'location'=>$add_plant->location, 'plant_name'=>$add_plant->plant_name, 'plant_type'=>$add_plant->plant_type, 'capacity_by_unit'=>$add_plant->capacity_by_unit, 'output_yield'=>$add_plant->output_yield, 'status'=>$add_plant->statuses->status_name, 'start_year'=>$add_plant->start_year, 'estimated_completion'=>$add_plant->estimated_completion, 'project_desc_by_unit'=>$add_plant->project_desc_by_unit, 'feed'=>$add_plant->feed, 'remark'=>$add_plant->remark, 'id'=>$add_plant->id];

                return response()->json(['status'=>'ok', 'message'=>$down_plant_details, 'info'=>'New Major Petrochemical Plant Projects Added Successfully.', 'id'=>$add_plant]);
            } else {
                return redirect()->route('transport.index')->with('info', 'Major Petrochemical Plant Projects Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editDownPlantProject(Request $request)
    {
        $PET_PLANT = \App\down_petrochemical_plant_project::where('id', $request->id)->first();

        return view('transport.modals.editDownPlantProject', compact('PET_PLANT'));
    }

    public function upload_down_project(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\es_project_status::class, 'status_name', "%{$row['G']}%", $row['G']);

                    if ($results_1['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['G'];
                        } else {
                            $column_1 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['M'], 'type' => 'down_petrochemical_plant_project',
                                'column_1' => $column_1,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $status = 0;
                        } else {
                            $status = $results_1['name'];
                        }
                    } else {
                        $status = $results_1['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\down_petrochemical_plant_project::updateOrCreate(['id'=> $request->id],
                        [
                            'company' => $row['A'],
                            'location' => $row['B'],
                            'plant_name' => $row['C'],
                            'plant_type' => $row['D'],
                            'capacity_by_unit' => $row['E'],
                            'output_yield' => $row['F'],
                            'status' => $status,
                            'start_year' => $row['H'],
                            'estimated_completion' => $row['I'],
                            'project_desc_by_unit' => $row['J'],
                            'feed' => $row['K'],
                            'remark' => $row['L'],
                            'year' => $row['M'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3) {
                        $this->updateTable(\App\down_petrochemical_plant_project::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $status = '';
                }
            }

            //send mail
            self::send_all_mail('PROJECTS & TRANSPORTION - Major Petrochemical Plant Projects ');
            //Audit Logging
            self::log_audit_trail('Major Petrochemical Plant Projects', 'Data Bulk Upload');

            return redirect()->route('transport.index')->with('info', 'Major Petrochemical Plant Projects Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewDownPlantProject(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Pet Plant Projects', 'Viewed Data');
        $PET_PLANT = \App\down_petrochemical_plant_project::where('id', $request->id)->first();

        return view('transport.view.viewDownPlantProject', compact('PET_PLANT'));
    }

    public function download_down_project($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\down_petrochemical_plant_project::where('year', 'like', "%$txt%")
                ->orwhere('company', 'like', "%$txt%")
                ->orwhere('location', 'like', "%$txt%")->orwhere('plant_name', 'like', "%$txt%")
                ->orwhere('plant_type', 'like', "%$txt%")
                ->orwhere('start_year', 'like', "%$txt%")->orwhere('estimated_completion', 'like', "%$txt%")
                ->orwhereHas('statuses', function ($query) use ($txt) {
                    $query->where('status_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\down_petrochemical_plant_project::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Pet Plant Projects', 'Downloaded Data');
        $data = \App\down_petrochemical_plant_project::get();
        $view = 'transport.excel.downstream_project_excel';

        return \Excel::download(new \App\Imports\es\ImportESData($data, $view), 'Pet Plant Projects.xlsx');
    }

    public function approveDownPlantProject(Request $request)
    {
        $down_projects = \App\down_petrochemical_plant_project::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('transport.approve.approveDownPlantProject', compact('down_projects'));
    }

    public function add_gas_project(Request $request)
    {
        try {
            //INSERTING NEW Gas  Projects
            $gas_plant = \App\gas_processing_plant_project::updateOrCreate(['id'=> $request->id],
            [
                'project_title' => $request->project_title,
                'project_objective' => $request->project_objective,
                'lng' => $request->lng,
                'ng' => $request->ng,
                'cng' => $request->cng,
                'lpg' => $request->lpg,
                'ngr' => $request->ngr,
                'condensate' => $request->condensate,
                'fertilizer' => $request->fertilizer,
                'petrochemical' => $request->petrochemical,
                'company_id' => $request->company_id,
                'others' => $request->others,
                'location_id' => $request->location_id,
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'end_date' => date('Y-m-d', strtotime($request->end_date)),
                'status_id' => $request->status_id,
                'year' => $request->year,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $status_id = $request->status_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'gas_processing_plant_project', 'column_1');
                }
                if (! empty($status_id)) {
                    $this->updateTempRecord($id, 'gas_processing_plant_project', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\gas_processing_plant_project::class, $id, 'gas_processing_plant_project');
            }

            //send mail
            //self::send_all_mail("PROJECTS & TRANSPORTION - Gas Projects ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Gas Projects', 'Update Record');
            } else {
                self::log_audit_trail('Gas Projects', 'Add Record');
            }

            // $gas_plant = \App\gas_processing_plant_project::where('id', $add_gas_plant)->first();

            if ($request->ajax()) {
                $gas_plant_details = ['year'=>$gas_plant->year, 'project_title'=>$gas_plant->project_title, 'project_objective'=>$gas_plant->project_objective, 'lng'=>$gas_plant->lng, 'ng'=>$gas_plant->ng, 'cng'=>$gas_plant->cng, 'lpg'=>$gas_plant->lpg, 'ngr'=>$gas_plant->ngr, 'condensate'=>$gas_plant->condensate, 'fertilizer'=>$gas_plant->fertilizer, 'petrochemical'=>$gas_plant->petrochemical, 'company'=>'Company', 'location'=>$gas_plant->location_id, 'start_date'=>$gas_plant->start_date, 'end_date'=>$gas_plant->end_date, 'status'=>$gas_plant->status->status, 'id'=>$gas_plant->id];

                return response()->json(['status'=>'ok', 'message'=>$gas_plant_details, 'info'=>'New Gas Projects Added Successfully.']);
            } else {
                return redirect()->route('transport.index')->with('info', 'Gas Projects Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editProcessingPlantProject(Request $request)
    {
        $GAS_PLANT = \App\gas_processing_plant_project::where('id', $request->id)->first();

        return view('transport.modals.editProcessingPlantProject', compact('GAS_PLANT'));
    }

    public function upload_gas_project(Request $request)
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
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['K']}%", $row['K']);
                    $results_2 = $this->resolveMasterData(\App\es_project_status::class, 'status_name', "%{$row['P']}%", $row['P']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['K'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['P'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['Q'], 'type' => 'gas_processing_plant_project',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $status_id = 0;
                        } else {
                            $status_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $status_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\gas_processing_plant_project::updateOrCreate(['id'=> $request->id],
                        [
                            'project_title' => $row['A'],
                            'project_objective' => $row['B'],
                            'lng' => $row['C'],
                            'ng' => $row['D'],
                            'cng' => $row['E'],
                            'lpg' => $row['F'],
                            'ngr' => $row['G'],
                            'condensate' => $row['H'],
                            'fertilizer' => $row['I'],
                            'petrochemical' => $row['J'],
                            'company_id' => $company_id,
                            'others' => $row['L'],
                            'location_id' => $row['M'],
                            'start_date' => date('Y-m-d', strtotime($row['N'])),
                            'end_date' => date('Y-m-d', strtotime($row['O'])),
                            'status_id' => $status_id,
                            'year' => $row['Q'],
                            'batch_number' => date('d-M'),
                            'created_by' => $created_by,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\gas_processing_plant_project::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $status_id = '';
                }
            }

            //send mail
            self::send_all_mail('PROJECTS & TRANSPORTION - Gas Projects ');
            //Audit Logging
            self::log_audit_trail('Gas Projects', 'Data Bulk Upload');

            return redirect()->route('transport.index')->with('info', 'Gas Projects Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewProcessingPlantProject(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Gas Projects', 'Viewed Data');
        $GAS_PLANT = \App\gas_processing_plant_project::where('id', $request->id)->first();

        return view('transport.view.viewProcessingPlantProject', compact('GAS_PLANT'));
    }

    public function download_gas_project($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\gas_processing_plant_project::where('project_title', 'like', "%$txt%")
                ->orwhere('project_title', 'like', "%$txt%")
                ->orWhere('project_objective', 'like', "%$txt%")->orWhere('location_id', 'like', "%$txt%")
                ->orWhere('lng', 'like', "%$txt%")->orWhere('ng', 'like', "%$txt%")
                ->orWhere('cng', 'like', "%$txt%")->orWhere('lpg', 'like', "%$txt%")
                ->orWhere('ngr', 'like', "%$txt%")->orWhere('condensate', 'like', "%$txt%")
                ->orWhere('fertilizer', 'like', "%$txt%")->orWhere('petrochemical', 'like', "%$txt%")
                ->orWhere('start_date', 'like', "%$txt%")->orWhere('end_date', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('state_name', 'like', "%$txt%");
                })
                ->orwhereHas('status', function ($query) use ($txt) {
                    $query->where('status_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\gas_processing_plant_project::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Gas Projects', 'Downloaded Data');

        $view = 'transport.excel.downstream_project_excel';

        return \Excel::download(new \App\Imports\es\ImportESData($data, $view), 'Gas Projects.xlsx');
    }

    public function approveGasProject(Request $request)
    {
        $gas_projects = \App\gas_processing_plant_project::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('transport.approve.approveGasProject', compact('gas_projects'));
    }

    public function add_pipeline_project(Request $request)
    {
        try {
            //INSERTING NEW Gas Pipeline Projects
            $gas_plant = \App\es_pipeline_project::updateOrCreate(['id'=> $request->id],
            [
                'pipeline_name' => $request->pipeline_name,
                'owner_id' => $request->owner_id,
                'owner_details' => $request->owner_details,
                'origin' => $request->origin,
                'destination' => $request->destination,
                'nominal_size' => $request->nominal_size,
                'length' => $request->length,
                'process_fluid' => $request->process_fluid,
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'commissioning_date' => date('Y-m-d', strtotime($request->commissioning_date)),
                'status_id' => $request->status_id,
                'remark' => $request->remark,
                'year' => $request->year,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $owner_id = $request->owner_id;
            $status_id = $request->status_id;
            if (! empty($id)) {
                if (! empty($owner_id)) {
                    $this->updateTempRecord($id, 'es_pipeline_project', 'column_1');
                }
                if (! empty($status_id)) {
                    $this->updateTempRecord($id, 'es_pipeline_project', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\es_pipeline_project::class, $id, 'es_pipeline_project');
            }

            //send mail
            //self::send_all_mail("PROJECTS & TRANSPORTION (E&S) - Pipeline Projects ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Pipeline Projects', 'Update Record');
            } else {
                self::log_audit_trail('Pipeline Projects', 'Add Record');
            }

            // $gas_plant = \App\gas_processing_plant_project::where('id', $add_gas_plant)->first();

            if ($request->ajax()) {
                $gas_plant_details = ['year'=>$gas_plant->year, 'pipeline_name'=>$gas_plant->pipeline_name, 'owner'=>'Company',  'origin'=>$gas_plant->origin, 'destination'=>$gas_plant->destination, 'nominal_size'=>$gas_plant->nominal_size, 'length'=>$gas_plant->length, 'process_fluid'=>$gas_plant->process_fluid, 'start_date'=>$gas_plant->start_date, 'commissioning_date'=>$gas_plant->commissioning_date, 'status'=>$gas_plant->status->status_name, 'remark'=>$gas_plant->remark, 'id'=>$gas_plant->id];

                return response()->json(['status'=>'ok', 'message'=>$gas_plant_details, 'info'=>'New Pipeline Projects Added Successfully.']);
            } else {
                return redirect()->route('transport.index')->with('info', 'Pipeline Projects Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editPipelineProject(Request $request)
    {
        $PIPELINE = \App\es_pipeline_project::where('id', $request->id)->first();

        return view('transport.modals.editPipelineProject', compact('PIPELINE'));
    }

    public function upload_pipeline_project(Request $request)
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
                    $results_2 = $this->resolveMasterData(\App\es_project_status::class, 'status_name', "%{$row['K']}%", $row['K']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
                        } else {
                            $column_1 = '';
                        }
                        if ($results_2['stage_id'] == 3) {
                            $column_2 = $row['K'];
                        } else {
                            $column_2 = '';
                        }

                        //INSERT INTO UNRESOLVED TABLE
                        $pend = \App\unresolvedMasterData::updateOrCreate(['id'=> $request->id],
                            [
                                'year' => $row['M'], 'type' => 'es_pipeline_project',
                                'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $owner_id = 0;
                        } else {
                            $owner_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $status_id = 0;
                        } else {
                            $status_id = $results_2['name'];
                        }
                    } else {
                        $owner_id = $results_1['name'];
                        $status_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\es_pipeline_project::updateOrCreate(['id'=> $request->id],
                        [
                            'pipeline_name' => $row['A'],
                            'owner_id' => $owner_id,
                            'owner_details' => $row['C'],
                            'origin' => $row['D'],
                            'destination' => $row['E'],
                            'nominal_size' => $row['F'],
                            'length' => $row['G'],
                            'process_fluid' => $row['H'],
                            'start_date' => date('Y-m-d', strtotime($row['I'])),
                            'commissioning_date' => date('Y-m-d', strtotime($row['J'])),
                            'status_id' => $status_id,
                            'remark' => $row['L'],
                            'year' => $row['M'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\es_pipeline_project::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $owner_id = '';
                    $status_id = '';
                }
            }

            //send mail
            self::send_all_mail('PROJECTS & TRANSPORTION (E&S) - Pipeline Projects ');
            //Audit Logging
            self::log_audit_trail('Pipeline Projects', 'Data Bulk Upload');

            return redirect()->route('transport.index')->with('info', 'Pipeline Projects Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewPipelineProject(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Pipeline Projects', 'Viewed Data');
        $PIPELINE = \App\es_pipeline_project::where('id', $request->id)->first();

        return view('transport.view.viewPipelineProject', compact('PIPELINE'));
    }

    public function download_pipeline_project($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\es_pipeline_project::where('year', 'like', "%$txt%")
                ->orwhere('pipeline_name', 'like', "%$txt%")
                ->orwhere('owner_details', 'like', "%$txt%")->orwhere('origin', 'like', "%$txt%")
                ->orwhere('destination', 'like', "%$txt%")->orwhere('process_fluid', 'like', "%$txt%")
                ->orwhere('start_date', 'like', "%$txt%")->orwhere('commissioning_date', 'like', "%$txt%")
                ->orwhereHas('owner', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('status', function ($query) use ($txt) {
                    $query->where('status_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\es_pipeline_project::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Pipeline Projects', 'Downloaded Data');

        $view = 'transport.excel.pipeline_project_excel';

        return \Excel::download(new \App\Imports\es\ImportESData($data, $view), 'Pipeline Projects.xlsx');
    }

    public function approvePipelineProject(Request $request)
    {
        $pipe_projects = \App\es_pipeline_project::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();
        return view('transport.approve.approvePipelineProject', compact('pipe_projects'));
    }

    public function add_metering(Request $request)
    {
        try {
            //INSERTING NEW Gas Matering Projects
            $meter = \App\es_metering::updateOrCreate(['id'=> $request->id],
            [
                'facility_id' => $request->facility_id,
                'company_id' => $request->company_id,
                'others' => $request->others,
                'objective' => $request->objective,
                'service_id' => $request->service_id,
                'phase_id' => $request->phase_id,
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'commissioning_date' => date('Y-m-d', strtotime($request->commissioning_date)),
                'remark' => $request->remark,
                'year' => $request->year,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING UNRESOLVED TABLE RECORDS
            $id = $request->id;
            $company_id = $request->company_id;
            $service_id = $request->service_id;
            if (! empty($id)) {
                if (! empty($company_id)) {
                    $this->updateTempRecord($id, 'es_metering', 'column_1');
                }
                if (! empty($service_id)) {
                    $this->updateTempRecord($id, 'es_metering', 'column_2');
                }

                //clear temp record
                $this->clearTempRecord(\App\es_metering::class, $id, 'es_metering');
            }

            //send mail
            //self::send_all_mail("PROJECTS & TRANSPORTION (E&S) - Matering Projects ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Matering Projects', 'Update Record');
            } else {
                self::log_audit_trail('Matering Projects', 'Add Record');
            }

            if ($request->ajax()) {
                $meter_details = ['year'=>$meter->year, 'facility'=>$meter->facility_id, 'company'=>'Company', 'objective'=>$meter->objective, 'service'=>$meter->service->service_name, 'phase'=>$meter->phase_id, 'start_date'=>$meter->start_date, 'commissioning_date'=>$meter->commissioning_date, 'remark'=>$meter->remark, 'id'=>$meter->id];

                return response()->json(['status'=>'ok', 'message'=>$meter_details, 'info'=>'New Matering Projects Added Successfully.']);
            } else {
                return redirect()->route('transport.index')->with('info', 'Matering Projects Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMetering(Request $request)
    {
        $METER = \App\es_metering::where('id', $request->id)->first();

        return view('transport.modals.editMetering', compact('METER'));
    }

    public function upload_metering(Request $request)
    {
        $this->validate($request,
        [
            'file' => 'required|mimes:csv,xlsx,txt',
        ]);

        try {
            $getFile = $request->file('file')->getRealPath();

            return $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {

                        //script to check if name exist in master record
                    $results_1 = $this->resolveMasterData(\App\company::class, 'company_name', "%{$row['B']}%", $row['B']);
                    $results_2 = $this->resolveMasterData(\App\es_service::class, 'service_name', "%{$row['D']}%", $row['D']);

                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        //checking individual columns if there is a match
                        if ($results_1['stage_id'] == 3) {
                            $column_1 = $row['B'];
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
                                'year' => $row['I'], 'type' => 'es_metering', 'column_1' => $column_1, 'column_2' => $column_2,
                            ]);
                        if ($results_1['stage_id'] == 3) {
                            $company_id = 0;
                        } else {
                            $company_id = $results_1['name'];
                        }
                        if ($results_2['stage_id'] == 3) {
                            $service_id = 0;
                        } else {
                            $service_id = $results_2['name'];
                        }
                    } else {
                        $company_id = $results_1['name'];
                        $service_id = $results_2['name'];
                    }

                    //UPLOADING NEW
                    $add_prod = \App\es_metering::updateOrCreate(['id'=> $request->id],
                        [
                            'facility_id' => $row['A'],
                            'company_id' => $company_id,
                            'objective' => $row['C'],
                            'service_id' => $service_id,
                            'phase_id' => $row['E'],
                            'start_date' => date('Y-m-d', strtotime($row['F'])),
                            'commissioning_date' => date('Y-m-d', strtotime($row['G'])),
                            'remark' => $row['H'],
                            'year' => $row['I'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                    if ($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3) {
                        $this->updateTable(\App\es_metering::class, 'pending_id', $add_prod->id, $pend->id);
                        $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_prod->id);
                    }
                    $company_id = '';
                    $service_id = '';
                }
            }

            //send mail
            self::send_all_mail('PROJECTS & TRANSPORTION (E&S) - Metering Projects ');
            //Audit Logging
            self::log_audit_trail('Metering Projects', 'Data Bulk Upload');

            return redirect()->route('transport.index')->with('info', 'Metering Projects Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewMetering(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Metering', 'Viewed Data');
        $METER = \App\es_metering::where('id', $request->id)->first();

        return view('transport.view.viewMetering', compact('METER'));
    }

    public function download_metering($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\es_metering::where('year', 'like', "%$txt%")->orwhere('objective', 'like', "%$txt%")
                ->orwhere('start_date', 'like', "%$txt%")->orwhere('facility_id', 'like', "%$txt%")
                ->orwhere('commissioning_date', 'like', "%$txt%")->orwhere('OTHERS', 'like', "%$txt%")
                ->orwhere('phase_id', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                ->orwhereHas('service', function ($query) use ($txt) {
                    $query->where('service_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\es_metering::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Metering', 'Downloaded Data');

        $view = 'transport.excel.metering_excel';

        return \Excel::download(new \App\Imports\es\ImportESData($data, $view), 'Metering.xlsx');
    }

    public function approveMetering(Request $request)
    {
        $meterings = \App\es_metering::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('transport.approve.approveMetering', compact('meterings'));
    }

    public function add_technology(Request $request)
    {
        try {
            // return $request->all();
            //INSERTING NEW Gas Technology Adoptation
            $tech = \App\es_technology::updateOrCreate(['id' => $request->id],
            [
                'technology' => $request->technology,
                'application' => $request->application,
                'adoptation_date' => $request->adoptation_date,
                'company_id' => $request->company_id,
                'others' => $request->others,
                'location_id' => $request->location_id,
                'others_location' => $request->others_location,
                'status' => $request->status_id,
                'remark' => $request->remark,
                'year' => $request->year,
                'batch_number' => date('d-M'),
                'created_by' => \Auth::user()->name,
            ]);

            // return $tech;

            //UPDATING UNRESOLVED TABLE RECORDS
            // $id = $request->id;
            // $company_id = $request->company_id;  $location_id = $request->location_id;   //$status = $request->status_id;
            // if(!empty($id))
            // {
            //     if(!empty($company_id)){ $this->updateTempRecord($id, 'es_technology', 'column_1'); }
            //     if(!empty($location_id)){ $this->updateTempRecord($id, 'es_technology', 'column_2'); }
            //     // if(!empty($status)){ $this->updateTempRecord($id, 'es_technology', 'column_3'); }

            //     //clear temp record
            //     $this->clearTempRecord('\App\es_technology', $id, 'es_technology');
            // }

            //send mail
            //self::send_all_mail("PROJECTS & TRANSPORTION (E&S) - Technology Adoptation ");
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Technology Adoptation ', 'Update Record');
            } else {
                self::log_audit_trail('Technology Adoptation ', 'Add Record');
            }

            if ($request->ajax()) {
                $tech_details = ['year'=>$tech->year, 'technology'=>$tech->technology, 'application'=>$tech->application, 'adoptation_date'=>$tech->adoptation_date, 'company'=>$tech->company_id, 'location'=>$tech->location_id, 'status'=>$tech->status, 'remark'=>$tech->remark, 'id'=>$tech->id];

                return response()->json(['status'=>'ok', 'message'=>$tech_details, 'info'=>'New Technology Adoptation Added Successfully.']);
            } else {
                return redirect()->route('transport.index')->with('info', 'Technology Adoptation Updated Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editTechnology(Request $request)
    {
        $TECH = \App\es_technology::where('id', $request->id)->first();

        return view('transport.modals.editTechnology', compact('TECH'));
    }

    public function upload_technology(Request $request)
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
                    // $results_1 = $this->resolveMasterData('\App\company', 'company_name', "%{$row['D']}%", $row['D']);
                    // $results_2 = $this->resolveMasterData('\App\field', 'field_name', "%{$row['E']}%", $row['E']);
                    // $results_3 = $this->resolveMasterData('\App\es_project_status', 'status_name', "%{$row['F']}%", $row['F']);

                    // if($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3)
                    // {
                    //     //checking individual columns if there is a match
                    //     if($results_1['stage_id'] == 3){ $column_1 = $row['D']; }else{ $column_1 = ''; }
                    //     if($results_2['stage_id'] == 3){ $column_2 = $row['E']; }else{ $column_2 = ''; }
                    //     // if($results_3['stage_id'] == 3){ $column_3 = $row['F']; }else{ $column_3 = ''; }

                    //     //INSERT INTO UNRESOLVED TABLE
                    //     $pend = \App\unresolvedMasterData::updateOrCreate
                    //     (['id'=> $request->id],
                    //     [
                    //         'year' => $row['H'], 'type' => 'es_technology',
                    //         'column_1' => $column_1, 'column_2' => $column_2,
                    //     ]);
                    //     if($results_1['stage_id'] == 3){ $company_id = 0; }else{ $company_id = $results_1['name']; }
                    //     if($results_2['stage_id'] == 3){ $location_id = 0; }else{$location_id = $results_2['name']; }
                    //     // if($results_3['stage_id'] == 3){ $status = 0; }else{$status = $results_3['name']; }
                    // }else
                    // {
                    //     $company_id = $results_1['name'];  $location_id = $results_2['name'];
                    // }

                    //UPLOADING NEW
                    $add_ = \App\es_technology::updateOrCreate(['id'=> $request->id],
                        [
                            'technology' => $row['A'],
                            'application' => $row['B'],
                            'adoptation_date' => $row['C'],
                            'company_id' => $row['D'],
                            'location_id' => $row['E'],
                            'status' => $row['F'],
                            'remark' => $row['G'],
                            'year' => $row['H'],
                            // 'others' => $row['I'],
                            // 'others_location' => $row['J'],
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //UPDATE ID RECORD
                        // if($results_1['stage_id'] == 3 || $results_2['stage_id'] == 3)
                        // {
                        //     $this->updateTable('\App\es_technology', 'pending_id', $add_->id, $pend->id);
                        //     $this->updateTable('\App\unresolvedMasterData', 'tab_id', $pend->id, $add_->id);
                        // }
                        // $company_id = ''; $location_id = ''; //$status = '';
                }
            }

            //send mail
            self::send_all_mail('PROJECTS & TRANSPORTION (E&S) - Technology Adoptation ');
            //Audit Logging
            self::log_audit_trail('Technology Adoptation', 'Data Bulk Upload');

            return redirect()->route('transport.index')->with('info', 'Technology Adoptation Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewTechnology(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Technology Adoptation', 'Viewed Data');
        $TECH = \App\es_technology::where('id', $request->id)->first();

        return view('transport.view.viewTechnology', compact('TECH'));
    }

    public function download_technology($type, Request $request)
    {
        $txt = Session::get('st');
        if ($txt != null) {
            $data = \App\es_technology::where('year', 'like', "%$txt%")->orwhere('technology', 'like', "%$txt%")
                ->orwhere('application', 'like', "%$txt%")->orwhere('status', 'like', "%$txt%")
                ->orwhere('adoptation_date', 'like', "%$txt%")->orwhere('status', 'like', "%$txt%")
                ->orwhere('others', 'like', "%$txt%")
                ->orwhereHas('company', function ($query) use ($txt) {
                    $query->where('company_name', 'like', "%$txt%");
                })
                // ->orwhereHas('statuses', function($query) use ($txt){      $query->where('status_name','like',"%$txt%");     })
                ->orwhereHas('location', function ($query) use ($txt) {
                    $query->where('field_name', 'like', "%$txt%");
                })
                ->get();
        } else {
            $data = \App\es_technology::get();
        }

        Session::put('search_text', null);
        //Audit Logging
        self::log_audit_trail('Technology Adoptation', 'Downloaded Data');

        $view = 'transport.excel.technology_excel';

        return \Excel::download(new \App\Imports\es\ImportESData($data, $view), 'Technology Adoptation.xlsx');
    }

    public function approveTechnology(Request $request)
    {
        $technologies = \App\es_technology::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('transport.approve.approveTechnology', compact('technologies'));
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
            self::log_audit_trail('Project & Transport Data', 'Data Deleted');
        } catch (\Exception $e) {
            // return response()->json(['status'=>'error', 'message'=>'Sorry, An Error Occurred .' .$e->getMessage()]);
            return  redirect()->route('transport.index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }
}
