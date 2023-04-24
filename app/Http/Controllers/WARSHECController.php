<?php

namespace App\Http\Controllers;

use App\Http\Resources\WARSHECApplication as WARSHECApplicationResource;
use App\Http\Resources\WARSHECIncidenceMgt as WARSHECIncidenceMgtResource;
use App\Http\Resources\WARSHECOspRegistreation as WARSHECOspRegistreationResource;
use App\Http\Resources\WARSHECOtherReport as WARSHECOtherReportResource;
use App\Http\Resources\WARSHECSpillIncidenceMgt as WARSHECSpillIncidenceMgtResource;
use App\Http\Resources\WARSHECWasteManagement as WARSHECWasteManagementResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WARSHECController extends Controller
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
            case 'shec_application':
                return $this->AddSHECApplication($request);
            break;

            case 'shec_osp_registration':
                return $this->AddSHECOspRegistration($request);
            break;

            case 'shec_incidence_mgt':
                return $this->AddSHECIncidenceMgt($request);
            break;

            case 'shec_spill_incidence_mgt':
                return $this->AddSHECSpillIncidenceMgt($request);
            break;

            case 'shec_waste_management':
                return $this->AddSHECWasteManagement($request);
            break;

            case 'shec_other_report':
                return $this->AddSHECOtherReport($request);
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
            case 'shec_application':
                $shec_application = \App\WARSHECApplication::findOrFail($id);

                return new WARSHECApplicationResource($shec_application);
            break;

            case 'shec_osp_registration':
                $shec_osp_registration = \App\WARSHECOspRegistreation::findOrFail($id);

                return new WARSHECOspRegistreationResource($shec_osp_registration);
            break;

            case 'shec_incidence_mgt':
                $shec_incidence_mgt = \App\WARSHECIncidenceMgt::findOrFail($id);

                return new WARSHECIncidenceMgtResource($shec_incidence_mgt);
            break;

            case 'shec_spill_incidence_mgt':
                $shec_spill_incidence_mgt = \App\WARSHECSpillIncidenceMgt::findOrFail($id);

                return new WARSHECSpillIncidenceMgtResource($shec_spill_incidence_mgt);
            break;

            case 'shec_waste_management':
                $shec_waste_management = \App\WARSHECWasteManagement::findOrFail($id);

                return new WARSHECWasteManagementResource($shec_waste_management);
            break;

            case 'shec_other_report':
                $shec_other_report = \App\WARSHECOtherReport::findOrFail($id);

                return new WARSHECOtherReportResource($shec_other_report);
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
            case 'shec_application':
                $shec_application = \App\WARSHECApplication::findOrFail($id);
                if ($shec_application->delete()) {
                    return new WARSHECApplicationResource($shec_application);
                }
            break;

            case 'shec_osp_registration':
                $shec_osp_registration = \App\WARSHECOspRegistreation::findOrFail($id);
                if ($shec_osp_registration->delete()) {
                    return new WARSHECOspRegistreationResource($shec_osp_registration);
                }
            break;

            case 'shec_incidence_mgt':
                $shec_incidence_mgt = \App\WARSHECIncidenceMgt::findOrFail($id);
                if ($shec_incidence_mgt->delete()) {
                    return new WARSHECIncidenceMgtResource($shec_incidence_mgt);
                }
            break;

            case 'shec_spill_incidence_mgt':
                $shec_spill_incidence_mgt = \App\WARSHECSpillIncidenceMgt::findOrFail($id);
                if ($shec_spill_incidence_mgt->delete()) {
                    return new WARSHECSpillIncidenceMgtResource($shec_spill_incidence_mgt);
                }
            break;

            case 'shec_waste_management':
                $shec_waste_management = \App\WARSHECWasteManagement::findOrFail($id);
                if ($shec_waste_management->delete()) {
                    return new WARSHECWasteManagementResource($shec_waste_management);
                }
            break;

            case 'shec_other_report':
                $shec_other_report = \App\WARSHECOtherReport::findOrFail($id);
                if ($shec_other_report->delete()) {
                    return new WARSHECOtherReportResource($shec_other_report);
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
            case 'application_shec':
                return $this->uploadApplication($request);
            break;

            case 'osp_registration':
                return $this->uploadOSPRegistration($request);
            break;

            case 'incidence':
                return $this->uploadIncidenceMgt($request);
            break;

            case 'spill_incidence':
                return $this->uploadSpillIncidenceMgt($request);
            break;

            case 'waste_management':
                return $this->uploadWasteManagement($request);
            break;

            case 'others':
                return $this->uploadOtherReport($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function indexApplication(Request $request)
    {
        //
        if ($request->filled('all')) {
            $shec_applications = \App\WARSHECApplication::orderBy('id', 'desc')->get();

            return ['data'=>$shec_applications];
        } else {
            $shec_applications = \App\WARSHECApplication::orderBy('id', 'desc')->paginate(15);

            return WARSHECApplicationResource::collection($shec_applications);
        }
    }

    public function AddSHECApplication(Request $request)
    {
        $shec_application = $request->isMethod('put') ? \App\WARSHECApplication::findOrFail($request->shec_application_id) : new \App\WARSHECApplication;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $shec_application->id = $request->shec_application_id;
            $shec_application->date = date('Y-m-d', strtotime($request->date));
            $shec_application->week = $request->week;
            $shec_application->environment_application_receiced = $request->environment_application_receiced;
            $shec_application->environment_application_issued = $request->environment_application_issued;
            $shec_application->discharge_permit_receiced = $request->discharge_permit_receiced;
            $shec_application->discharge_permit_issued = $request->discharge_permit_issued;
            $shec_application->radiation_safety_permit_receiced = $request->radiation_safety_permit_receiced;
            $shec_application->radiation_safety_permit_issued = $request->radiation_safety_permit_issued;
            $shec_application->safety_case_permit_receiced = $request->safety_case_permit_receiced;
            $shec_application->safety_case_permit_issued = $request->safety_case_permit_issued;
            $shec_application->lab_accredition_receiced = $request->lab_accredition_receiced;
            $shec_application->lab_accredition_issued = $request->lab_accredition_issued;
            $shec_application->chemical_application_receiced = $request->chemical_application_receiced;
            $shec_application->chemical_application_issued = $request->chemical_application_issued;
            $shec_application->registration_application_received = $request->registration_application_received;
            $shec_application->registration_application_issued = $request->registration_application_issued;

            //send mail
            $this->send_all_mail($request, 'SHEC - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Updated Record');
        } else {
            // $shec_application->id = $request->shec_application_id;
            $shec_application->date = date('Y-m-d', strtotime($request->date));
            $shec_application->week = $request->week;
            $shec_application->environment_application_receiced = $request->environment_application_receiced;
            $shec_application->environment_application_issued = $request->environment_application_issued;
            $shec_application->discharge_permit_receiced = $request->discharge_permit_receiced;
            $shec_application->discharge_permit_issued = $request->discharge_permit_issued;
            $shec_application->radiation_safety_permit_receiced = $request->radiation_safety_permit_receiced;
            $shec_application->radiation_safety_permit_issued = $request->radiation_safety_permit_issued;
            $shec_application->safety_case_permit_receiced = $request->safety_case_permit_receiced;
            $shec_application->safety_case_permit_issued = $request->safety_case_permit_issued;
            $shec_application->lab_accredition_receiced = $request->lab_accredition_receiced;
            $shec_application->lab_accredition_issued = $request->lab_accredition_issued;
            $shec_application->chemical_application_receiced = $request->chemical_application_receiced;
            $shec_application->chemical_application_issued = $request->chemical_application_issued;
            $shec_application->registration_application_received = $request->registration_application_received;
            $shec_application->registration_application_issued = $request->registration_application_issued;
            $shec_application->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'SHEC - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Added Record');
        }

        if ($shec_application->save()) {
            return new WARSHECApplicationResource($shec_application);
        }
    }

    public function uploadApplication(Request $request)
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
                    $uploaded = \App\WARSHECApplication::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'environment_application_receiced' => $row['C'],
                        'environment_application_issued' => $row['D'],
                        'discharge_permit_receiced' => $row['E'],
                        'discharge_permit_issued' => $row['F'],
                        'radiation_safety_permit_receiced' => $row['G'],
                        'radiation_safety_permit_issued' => $row['H'],
                        'safety_case_permit_receiced' => $row['I'],
                        'safety_case_permit_issued' => $row['J'],
                        'lab_accredition_receiced' => $row['K'],
                        'lab_accredition_issued' => $row['L'],
                        'chemical_application_receiced' => $row['M'],
                        'chemical_application_issued' => $row['N'],
                        'registration_application_received' => $row['O'],
                        'registration_application_issued' => $row['P'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'SHEC - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Bulk Data Upload');

            $shec_applications = \App\WARSHECApplication::orderBy('id', 'desc')->paginate(15);

            return WARSHECApplicationResource::collection($shec_applications);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexRegistration(Request $request)
    {
        //
        if ($request->filled('all')) {
            $shec_osp_registrations = \App\WARSHECOspRegistreation::orderBy('id', 'desc')->get();

            return ['data'=>$shec_osp_registrations];
        } else {
            $shec_osp_registrations = \App\WARSHECOspRegistreation::orderBy('id', 'desc')->paginate(15);

            return WARSHECOspRegistreationResource::collection($shec_osp_registrations);
        }
    }

    public function AddSHECOspRegistration(Request $request)
    {
        $shec_osp_registration = $request->isMethod('put') ? \App\WARSHECOspRegistreation::findOrFail($request->shec_osp_registration_id) : new \App\WARSHECOspRegistreation;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $shec_osp_registration->id = $request->shec_osp_registration_id;
            $shec_osp_registration->date = date('Y-m-d', strtotime($request->date));
            $shec_osp_registration->week = $request->week;
            $shec_osp_registration->personel_captured = $request->personel_captured;
            $shec_osp_registration->image_captured = $request->image_captured;
            $shec_osp_registration->permit_issued = $request->permit_issued;

            //send mail
            $this->send_all_mail($request, 'SHEC - OSP Registration');
            //Audit Logging
            $this->log_audit_trail($request, 'OSP Registration', 'Updated Record');
        } else {
            // $shec_osp_registration->id = $request->shec_osp_registration_id;
            $shec_osp_registration->date = date('Y-m-d', strtotime($request->date));
            $shec_osp_registration->week = $request->week;
            $shec_osp_registration->personel_captured = $request->personel_captured;
            $shec_osp_registration->image_captured = $request->image_captured;
            $shec_osp_registration->permit_issued = $request->permit_issued;
            $shec_osp_registration->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'SHEC - OSP Registration');
            //Audit Logging
            $this->log_audit_trail($request, 'OSP Registration', 'Added Record');
        }

        if ($shec_osp_registration->save()) {
            return new WARSHECOspRegistreationResource($shec_osp_registration);
        }
    }

    public function uploadOSPRegistration(Request $request)
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
                    $uploaded = \App\WARSHECOspRegistreation::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'personel_captured' => $row['C'],
                        'image_captured' => $row['D'],
                        'permit_issued' => $row['E'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'SHEC - OSP Registration');
            //Audit Logging
            $this->log_audit_trail($request, 'OSP Registration', 'Updated Record');

            $shec_osp_registrations = \App\WARSHECOspRegistreation::orderBy('id', 'desc')->paginate(15);

            return WARSHECOspRegistreationResource::collection($shec_osp_registrations);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexIncidenceMgt(Request $request)
    {
        //
        if ($request->filled('all')) {
            $shec_incidence_mgts = \App\WARSHECIncidenceMgt::orderBy('id', 'desc')->get();

            return ['data'=>$shec_incidence_mgts];
        } else {
            $shec_incidence_mgts = \App\WARSHECIncidenceMgt::orderBy('id', 'desc')->paginate(15);

            return WARSHECIncidenceMgtResource::collection($shec_incidence_mgts);
        }
    }

    public function AddSHECIncidenceMgt(Request $request)
    {
        $shec_incidence_mgt = $request->isMethod('put') ? \App\WARSHECIncidenceMgt::findOrFail($request->shec_incidence_mgt_id) : new \App\WARSHECIncidenceMgt;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $shec_incidence_mgt->id = $request->shec_incidence_mgt_id;
            $shec_incidence_mgt->date = date('Y-m-d', strtotime($request->date));
            $shec_incidence_mgt->week = $request->week;
            $shec_incidence_mgt->incidence_accident = $request->incidence_accident;
            $shec_incidence_mgt->fatal_incidence = $request->fatal_incidence;
            $shec_incidence_mgt->fatalities = $request->fatalities;
            $shec_incidence_mgt->work_related = $request->work_related;
            $shec_incidence_mgt->non_work_related = $request->non_work_related;

            //send mail
            $this->send_all_mail($request, 'SHEC - Incidence Management');
            //Audit Logging
            $this->log_audit_trail($request, 'Incidence Management', 'Updated Record');
        } else {
            // $shec_incidence_mgt->id = $request->shec_incidence_mgt_id;
            $shec_incidence_mgt->date = date('Y-m-d', strtotime($request->date));
            $shec_incidence_mgt->week = $request->week;
            $shec_incidence_mgt->incidence_accident = $request->incidence_accident;
            $shec_incidence_mgt->fatal_incidence = $request->fatal_incidence;
            $shec_incidence_mgt->fatalities = $request->fatalities;
            $shec_incidence_mgt->work_related = $request->work_related;
            $shec_incidence_mgt->non_work_related = $request->non_work_related;
            $shec_incidence_mgt->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'SHEC - Incidence Management');
            //Audit Logging
            $this->log_audit_trail($request, 'Incidence Management', 'Added Record');
        }

        if ($shec_incidence_mgt->save()) {
            return new WARSHECIncidenceMgtResource($shec_incidence_mgt);
        }
    }

    public function uploadIncidenceMgt(Request $request)
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
                    $uploaded = \App\WARSHECIncidenceMgt::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'incidence_accident' => $row['C'],
                        'fatal_incidence' => $row['D'],
                        'fatalities' => $row['E'],
                        'work_related' => $row['F'],
                        'non_work_related' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'SHEC - Incidence Management');
            //Audit Logging
            $this->log_audit_trail($request, 'Incidence Management', 'Bulk Data Upload');

            $shec_incidence_mgts = \App\WARSHECIncidenceMgt::orderBy('id', 'desc')->paginate(15);

            return WARSHECIncidenceMgtResource::collection($shec_incidence_mgts);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexSpillIncidenceMgt(Request $request)
    {
        //
        if ($request->filled('all')) {
            $shec_spill_incidence_mgts = \App\WARSHECSpillIncidenceMgt::orderBy('id', 'desc')->get();

            return ['data'=>$shec_spill_incidence_mgts];
        } else {
            $shec_spill_incidence_mgts = \App\WARSHECSpillIncidenceMgt::orderBy('id', 'desc')->paginate(15);

            return WARSHECSpillIncidenceMgtResource::collection($shec_spill_incidence_mgts);
        }
    }

    public function AddSHECSpillIncidenceMgt(Request $request)
    {
        $shec_spill_incidence_mgt = $request->isMethod('put') ? \App\WARSHECSpillIncidenceMgt::findOrFail($request->shec_spill_incidence_mgt_id) : new \App\WARSHECSpillIncidenceMgt;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $shec_spill_incidence_mgt->id = $request->shec_spill_incidence_mgt_id;
            $shec_spill_incidence_mgt->date = date('Y-m-d', strtotime($request->date));
            $shec_spill_incidence_mgt->week = $request->week;
            $shec_spill_incidence_mgt->spill_number = $request->spill_number;
            $shec_spill_incidence_mgt->spill_volume = $request->spill_volume;
            $shec_spill_incidence_mgt->quantity_recoverd = $request->quantity_recoverd;
            $shec_spill_incidence_mgt->jiv_conducted = $request->jiv_conducted;
            $shec_spill_incidence_mgt->community_issued = $request->community_issued;

            //send mail
            $this->send_all_mail($request, 'SHEC - Spill Incidence Mgt');
            //Audit Logging
            $this->log_audit_trail($request, 'Spill Incidence Mgt', 'Updated Record');
        } else {
            // $shec_spill_incidence_mgt->id = $request->shec_spill_incidence_mgt_id;
            $shec_spill_incidence_mgt->date = date('Y-m-d', strtotime($request->date));
            $shec_spill_incidence_mgt->week = $request->week;
            $shec_spill_incidence_mgt->spill_number = $request->spill_number;
            $shec_spill_incidence_mgt->spill_volume = $request->spill_volume;
            $shec_spill_incidence_mgt->quantity_recoverd = $request->quantity_recoverd;
            $shec_spill_incidence_mgt->jiv_conducted = $request->jiv_conducted;
            $shec_spill_incidence_mgt->community_issued = $request->community_issued;
            $shec_spill_incidence_mgt->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'SHEC - Spill Incidence Mgt');
            //Audit Logging
            $this->log_audit_trail($request, 'Spill Incidence Mgt', 'Added Record');
        }

        if ($shec_spill_incidence_mgt->save()) {
            return new WARSHECSpillIncidenceMgtResource($shec_spill_incidence_mgt);
        }
    }

    public function uploadSpillIncidenceMgt(Request $request)
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
                    $uploaded = \App\WARSHECSpillIncidenceMgt::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'spill_number' => $row['C'],
                        'spill_volume' => $row['D'],
                        'quantity_recoverd' => $row['E'],
                        'jiv_conducted' => $row['F'],
                        'community_issued' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'SHEC - Spill Incidence Mgt');
            //Audit Logging
            $this->log_audit_trail($request, 'Spill Incidence Mgt', 'Bulk Data Upload');

            $shec_spill_incidence_mgts = \App\WARSHECSpillIncidenceMgt::orderBy('id', 'desc')->paginate(15);

            return WARSHECSpillIncidenceMgtResource::collection($shec_spill_incidence_mgts);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexWasteManagement(Request $request)
    {
        //
        if ($request->filled('all')) {
            $shec_waste_managements = \App\WARSHECWasteManagement::orderBy('id', 'desc')->get();

            return ['data'=>$shec_waste_managements];
        } else {
            $shec_waste_managements = \App\WARSHECWasteManagement::orderBy('id', 'desc')->paginate(15);

            return WARSHECWasteManagementResource::collection($shec_waste_managements);
        }
    }

    public function AddSHECWasteManagement(Request $request)
    {
        $shec_waste_management = $request->isMethod('put') ? \App\WARSHECWasteManagement::findOrFail($request->shec_waste_management_id) : new \App\WARSHECWasteManagement;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $shec_waste_management->id = $request->shec_waste_management_id;
            $shec_waste_management->date = date('Y-m-d', strtotime($request->date));
            $shec_waste_management->week = $request->week;
            $shec_waste_management->tdu_new_application = $request->tdu_new_application;
            $shec_waste_management->tdu_approval_granted = $request->tdu_approval_granted;
            $shec_waste_management->incinerator_new_application = $request->incinerator_new_application;
            $shec_waste_management->incinerator_approval_granted = $request->incinerator_approval_granted;
            $shec_waste_management->wbm_new_application = $request->wbm_new_application;
            $shec_waste_management->wbm_approval_granted = $request->wbm_approval_granted;
            $shec_waste_management->tank_cleaning_new_application = $request->tank_cleaning_new_application;
            $shec_waste_management->tank_cleaning_approval_granted = $request->tank_cleaning_approval_granted;
            $shec_waste_management->solid_control_new_application = $request->solid_control_new_application;
            $shec_waste_management->solid_control_approval_granted = $request->solid_control_approval_granted;
            $shec_waste_management->spill_clean_up_new_application = $request->spill_clean_up_new_application;
            $shec_waste_management->spill_clean_up_approval_granted = $request->spill_clean_up_approval_granted;
            $shec_waste_management->remediation_new_application = $request->remediation_new_application;
            $shec_waste_management->remediation_approval_granted = $request->remediation_approval_granted;
            $shec_waste_management->produced_water_new_application = $request->produced_water_new_application;
            $shec_waste_management->produced_water_approval_granted = $request->produced_water_approval_granted;
            $shec_waste_management->waste_slop_new_application = $request->waste_slop_new_application;
            $shec_waste_management->waste_slop_approval_granted = $request->waste_slop_approval_granted;

            //send mail
            $this->send_all_mail($request, 'SHEC - Waste Management');
            //Audit Logging
            $this->log_audit_trail($request, 'Waste Management', 'Updated Record');
        } else {
            // $shec_waste_management->id = $request->shec_waste_management_id;
            $shec_waste_management->date = date('Y-m-d', strtotime($request->date));
            $shec_waste_management->week = $request->week;
            $shec_waste_management->tdu_new_application = $request->tdu_new_application;
            $shec_waste_management->tdu_approval_granted = $request->tdu_approval_granted;
            $shec_waste_management->incinerator_new_application = $request->incinerator_new_application;
            $shec_waste_management->incinerator_approval_granted = $request->incinerator_approval_granted;
            $shec_waste_management->wbm_new_application = $request->wbm_new_application;
            $shec_waste_management->wbm_approval_granted = $request->wbm_approval_granted;
            $shec_waste_management->tank_cleaning_new_application = $request->tank_cleaning_new_application;
            $shec_waste_management->tank_cleaning_approval_granted = $request->tank_cleaning_approval_granted;
            $shec_waste_management->solid_control_new_application = $request->solid_control_new_application;
            $shec_waste_management->solid_control_approval_granted = $request->solid_control_approval_granted;
            $shec_waste_management->spill_clean_up_new_application = $request->spill_clean_up_new_application;
            $shec_waste_management->spill_clean_up_approval_granted = $request->spill_clean_up_approval_granted;
            $shec_waste_management->remediation_new_application = $request->remediation_new_application;
            $shec_waste_management->remediation_approval_granted = $request->remediation_approval_granted;
            $shec_waste_management->produced_water_new_application = $request->produced_water_new_application;
            $shec_waste_management->produced_water_approval_granted = $request->produced_water_approval_granted;
            $shec_waste_management->waste_slop_new_application = $request->waste_slop_new_application;
            $shec_waste_management->waste_slop_approval_granted = $request->waste_slop_approval_granted;
            $shec_waste_management->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'SHEC - Waste Management');
            //Audit Logging
            $this->log_audit_trail($request, 'Waste Management', 'Added Record');
        }

        if ($shec_waste_management->save()) {
            return new WARSHECWasteManagementResource($shec_waste_management);
        }
    }

    public function uploadWasteManagement(Request $request)
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
                    $uploaded = \App\WARSHECWasteManagement::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'tdu_new_application' => $row['C'],
                        'tdu_approval_granted' => $row['D'],
                        'incinerator_new_application' => $row['E'],
                        'incinerator_approval_granted' => $row['F'],
                        'wbm_new_application' => $row['G'],
                        'wbm_approval_granted' => $row['H'],
                        'tank_cleaning_new_application' => $row['I'],
                        'tank_cleaning_approval_granted' => $row['J'],
                        'solid_control_new_application' => $row['K'],
                        'solid_control_approval_granted' => $row['L'],
                        'spill_clean_up_new_application' => $row['M'],
                        'spill_clean_up_approval_granted' => $row['N'],
                        'remediation_new_application' => $row['O'],
                        'remediation_approval_granted' => $row['P'],
                        'produced_water_new_application' => $row['Q'],
                        'produced_water_approval_granted' => $row['R'],
                        'waste_slop_new_application' => $row['S'],
                        'waste_slop_approval_granted' => $row['T'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'SHEC - Waste Management');
            //Audit Logging
            $this->log_audit_trail($request, 'Waste Management', 'Bulk Data Upload');

            $shec_waste_managements = \App\WARSHECWasteManagement::orderBy('id', 'desc')->paginate(15);

            return WARSHECWasteManagementResource::collection($shec_waste_managements);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexOtherReport(Request $request)
    {
        //
        if ($request->filled('all')) {
            $shec_other_reports = \App\WARSHECOtherReport::orderBy('id', 'desc')->get();

            return ['data'=>$shec_other_reports];
        } else {
            $shec_other_reports = \App\WARSHECOtherReport::orderBy('id', 'desc')->paginate(15);

            return WARSHECOtherReportResource::collection($shec_other_reports);
        }
    }

    public function AddSHECOtherReport(Request $request)
    {
        $shec_other_report = $request->isMethod('put') ? \App\WARSHECOtherReport::findOrFail($request->shec_other_report_id) : new \App\WARSHECOtherReport;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $shec_other_report->id = $request->shec_other_report_id;
            $shec_other_report->date = date('Y-m-d', strtotime($request->date));
            $shec_other_report->week = $request->week;
            $shec_other_report->hazop = $request->hazop;
            $shec_other_report->rbi = $request->rbi;
            $shec_other_report->psv_certification = $request->psv_certification;
            $shec_other_report->leak_test = $request->leak_test;
            $shec_other_report->rig_inspection = $request->rig_inspection;
            $shec_other_report->vessel_inspection = $request->vessel_inspection;
            $shec_other_report->new_technologies = $request->new_technologies;
            $shec_other_report->conpliance_monitoring = $request->conpliance_monitoring;
            $shec_other_report->project_monitoring_activities = $request->project_monitoring_activities;
            $shec_other_report->facility_inspection_audit = $request->facility_inspection_audit;
            $shec_other_report->safety_training = $request->safety_training;
            $shec_other_report->permit_withdrawal_cases = $request->permit_withdrawal_cases;

            //send mail
            $this->send_all_mail($request, 'SHEC - Other Report');
            //Audit Logging
            $this->log_audit_trail($request, 'Other Report', 'Updated Record');
        } else {
            // $shec_other_report->id = $request->shec_other_report_id;
            $shec_other_report->date = date('Y-m-d', strtotime($request->date));
            $shec_other_report->week = $request->week;
            $shec_other_report->hazop = $request->hazop;
            $shec_other_report->rbi = $request->rbi;
            $shec_other_report->psv_certification = $request->psv_certification;
            $shec_other_report->leak_test = $request->leak_test;
            $shec_other_report->rig_inspection = $request->rig_inspection;
            $shec_other_report->vessel_inspection = $request->vessel_inspection;
            $shec_other_report->new_technologies = $request->new_technologies;
            $shec_other_report->conpliance_monitoring = $request->conpliance_monitoring;
            $shec_other_report->project_monitoring_activities = $request->project_monitoring_activities;
            $shec_other_report->facility_inspection_audit = $request->facility_inspection_audit;
            $shec_other_report->safety_training = $request->safety_training;
            $shec_other_report->permit_withdrawal_cases = $request->permit_withdrawal_cases;
            $shec_other_report->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'SHEC - Other Report');
            //Audit Logging
            $this->log_audit_trail($request, 'Other Report', 'Added Record');
        }

        if ($shec_other_report->save()) {
            return new WARSHECOtherReportResource($shec_other_report);
        }
    }

    public function uploadOtherReport(Request $request)
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
                    $uploaded = \App\WARSHECOtherReport::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'hazop' => $row['C'],
                        'rbi' => $row['D'],
                        'psv_certification' => $row['E'],
                        'leak_test' => $row['F'],
                        'rig_inspection' => $row['G'],
                        'vessel_inspection' => $row['H'],
                        'new_technologies' => $row['I'],
                        'conpliance_monitoring' => $row['J'],
                        'project_monitoring_activities' => $row['K'],
                        'facility_inspection_audit' => $row['L'],
                        'safety_training' => $row['M'],
                        'permit_withdrawal_cases' => $row['N'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'SHEC - Other Report');
            //Audit Logging
            $this->log_audit_trail($request, 'Other Report', 'Bulk Data Upload');

            $shec_other_reports = \App\WARSHECOtherReport::orderBy('id', 'desc')->paginate(15);

            return WARSHECOtherReportResource::collection($shec_other_reports);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexSHECMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'application_shec':
                return $this->getMonthlySHECReportApplication($request);
            break;

            case 'osp_registration':
                return $this->getMonthlySHECReportOSPRegistration($request);
            break;

            case 'incidence':
                return $this->getMonthlySHECReportIncidence($request);
            break;

            case 'spill_incidence':
                return $this->getMonthlySHECReportSpillIncidence($request);
            break;

            case 'waste_management':
                return $this->getMonthlySHECReportWasteManagement($request);
            break;

            case 'others':
                return $this->getMonthlySHECReportOthers($request);
            break;

            default:
                return $this->getMonthlySHECReportApplication($request);
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

    public function getMonthlySHECReportApplication(Request $request)
    {
        $data = ['environment_application_receiced'=>'Environmental Studies Received',
            'environment_application_issued'=>'Environmental Studies issued',
            'discharge_permit_receiced'=>'Discharge Permits Received',
            'discharge_permit_issued'=>'Discharge Permits Issued',
            'radiation_safety_permit_receiced'=>'Radiation Permits Received',
            'radiation_safety_permit_issued'=>'Radiation Permits Issued',
            'safety_case_permit_receiced'=>'Safety Cases Received',
            'safety_case_permit_issued'=>'Safety Cases Issued',
            'lab_accredition_receiced'=>'Lab Accreditatiod Received',
            'lab_accredition_issued'=>'Lab Accreditatiod Issued',
            'chemical_application_receiced'=>'Oil Field Received',
            'chemical_application_issued'=>'Oil Field Issued',
            'registration_application_received'=>'Point Sour Reg Received',
            'registration_application_issued'=>'Point Sour Reg issued',
        ];

        return $this->getMonthlyData($request, $data, \App\WARSHECApplication::class);
    }

    public function getMonthlySHECReportOSPRegistration(Request $request)
    {
        $data = ['personel_captured'=>'Personnel Registered',
            'image_captured'=>'Image Captured',
            'permit_issued'=>'Permit issued',
        ];

        return $this->getMonthlyData($request, $data, \App\WARSHECOspRegistreation::class);
    }

    public function getMonthlySHECReportIncidence(Request $request)
    {
        $data = ['incidence_accident'=>'Incidents/Accidents',
            'fatal_incidence'=>'Fatal Incidents',
            'fatalities'=>'Fatalities',
            'work_related'=>'Work Related',
            'non_work_related'=>'Non-Work Related',
        ];

        return $this->getMonthlyData($request, $data, \App\WARSHECIncidenceMgt::class);
    }

    public function getMonthlySHECReportSpillIncidence(Request $request)
    {
        $data = ['spill_number'=>'Spill Number',
            'spill_volume'=>'Spill Volume (bbls)',
            'quantity_recoverd'=>'Quantity Recovered(bbls)',
            'jiv_conducted'=>'No. of JIV Conducted',
            'community_issued'=>'No. of Community Issues',
        ];

        return $this->getMonthlyData($request, $data, \App\WARSHECSpillIncidenceMgt::class);
    }

    public function getMonthlySHECReportWasteManagement(Request $request)
    {
        $data = ['tdu_new_application'=>'TDU-Application',
            'tdu_approval_granted'=>'TDU-Approved Granted',
            'incinerator_new_application'=>'Incinerator Application',
            'incinerator_approval_granted'=>'Incinerator Approved Granted',
            'wbm_new_application'=>'WBM Application',
            'wbm_approval_granted'=>'WBM Approved Granted',
            'tank_cleaning_new_application'=>'Tank Cleaning Application',
            'tank_cleaning_approval_granted'=>'Tank Cleaning Approved Granted',
            'solid_control_new_application'=>'Solid Control Application',
            'solid_control_approval_granted'=>'Solid Control Approved Granted',
            'spill_clean_up_new_application'=>'Spill Clean up Application',
            'spill_clean_up_approval_granted'=>'Spill Clean up Approved Granted',
            'remediation_new_application'=>'Remediation Application',
            'remediation_approval_granted'=>'Remediation Approved Granted',
            'produced_water_new_application'=>'Prod Water Application',
            'produced_water_approval_granted'=>'Prod Water Approved Granted',
            'waste_slop_new_application'=>'Waste Water/Slop Application',
            'waste_slop_approval_granted'=>'Waste Water/Slop Approved Granted',
        ];

        return $this->getMonthlyData($request, $data, \App\WARSHECWasteManagement::class);
    }

    public function getMonthlySHECReportOthers(Request $request)
    {
        $data = ['hazop'=>'HAZOP',
            'rbi'=>'RBI',
            'psv_certification'=>'PSV Certificate',
            'leak_test'=>'Leak Test',
            'rig_inspection'=>'Rig Inspection',
            'vessel_inspection'=>'Vessel Inspection',
            'new_technologies'=>'New Technology',
            'conpliance_monitoring'=>'Compliance Monitoring',
            'project_monitoring_activities'=>'Proj monitoring',
            'facility_inspection_audit'=>'Facility Inspection Audit',
            'safety_training'=>'Safety Training',
            'permit_withdrawal_cases'=>'Permit Withdrawal Case',
        ];

        return $this->getMonthlyData($request, $data, \App\WARSHECOtherReport::class);
    }
}
