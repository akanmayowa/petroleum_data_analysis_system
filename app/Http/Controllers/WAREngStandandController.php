<?php

namespace App\Http\Controllers;

use App\Http\Resources\WAREngStandandApplication as WAREngStandandApplicationResource;
use App\Http\Resources\WAREngStandandDevelopment as WAREngStandandDevelopmentResource;
use App\Http\Resources\WAREngStandandMaintenance as WAREngStandandMaintenanceResource;
use App\Http\Resources\WAREngStandandPermit as WAREngStandandPermitResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WAREngStandandController extends Controller
{
    public function __construct(Request $request)
    {
        \Auth::loginUsingId($request->user_id);
    }

    //function for sending email
    public function send_all_mail($request, $upload_name)
    {
        // dd($request->user_id);
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
            case 'eng_standand_application':
                return $this->AddEngStandandApplication($request);
            break;

            case 'eng_standand_permit':
                return $this->AddEngStandandPermit($request);
            break;

            case 'eng_standand_development':
                return $this->AddEngStandandDevelopment($request);
            break;

            case 'eng_standand_maintenance':
                return $this->AddEngStandandMaintenance($request);
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
            case 'eng_standand_application':
                $eng_standand_application = \App\WAREngStandandApplication::findOrFail($id);

                return new WAREngStandandApplicationResource($eng_standand_application);
            break;

            case 'eng_standand_permit':
                $eng_standand_permit = \App\WAREngStandandPermit::findOrFail($id);

                return new WAREngStandandPermitResource($eng_standand_permit);
            break;

            case 'eng_standand_development':
                $eng_standand_development = \App\WAREngStandandDevelopment::findOrFail($id);

                return new WAREngStandandDevelopmentResource($eng_standand_development);
            break;

            case 'eng_standand_maintenance':
                $eng_standand_maintenance = \App\WAREngStandandMaintenance::findOrFail($id);

                return new WAREngStandandMaintenanceResource($eng_standand_maintenance);
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
            case 'eng_standand_application':
                $eng_standand_application = \App\WAREngStandandApplication::findOrFail($id);
                if ($eng_standand_application->delete()) {
                    //Audit Logging
                    self::log_audit_trail('Application', 'Deleted Data');

                    return new WAREngStandandApplicationResource($eng_standand_application);
                }
            break;

            case 'eng_standand_permit':
                $eng_standand_permit = \App\WAREngStandandPermit::findOrFail($id);
                if ($eng_standand_permit->delete()) {
                    //Audit Logging
                    self::log_audit_trail('Permit', 'Deleted Data');

                    return new WAREngStandandPermitResource($eng_standand_permit);
                }
            break;

            case 'eng_standand_development':
                $eng_standand_development = \App\WAREngStandandDevelopment::findOrFail($id);
                if ($eng_standand_development->delete()) {
                    //Audit Logging
                    self::log_audit_trail('Development', 'Deleted Data');

                    return new WAREngStandandDevelopmentResource($eng_standand_development);
                }
            break;

            case 'eng_standand_maintenance':
                $eng_standand_maintenance = \App\WAREngStandandMaintenance::findOrFail($id);
                if ($eng_standand_maintenance->delete()) {
                    //Audit Logging
                    self::log_audit_trail('MainTenance', 'Deleted Data');

                    return new WAREngStandandMaintenanceResource($eng_standand_maintenance);
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
            case 'application':
                return $this->uploadApplication($request);
            break;

            case 'permit':
                return $this->uploadPermit($request);
            break;

            case 'development':
                return $this->uploadDevelopment($request);
            break;

            case 'maintenance':
                return $this->uploadMaintenance($request);
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
            $eng_standand_applications = \App\WAREngStandandApplication::orderBy('id', 'desc')->get();

            return ['data'=>$eng_standand_applications];
        } else {
            $eng_standand_applications = \App\WAREngStandandApplication::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandApplicationResource::collection($eng_standand_applications);
        }
    }

    public function AddEngStandandApplication(Request $request)
    {
        $eng_standand_application = $request->isMethod('put') ? \App\WAREngStandandApplication::findOrFail($request->eng_standand_application_id) : new \App\WAREngStandandApplication;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $eng_standand_application->id = $request->eng_standand_application_id;
            $eng_standand_application->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_application->week = $request->week;
            $eng_standand_application->processing_plant_received = $request->processing_plant_received;
            $eng_standand_application->processing_plant_issued = $request->processing_plant_issued;
            $eng_standand_application->pet_refinery_received = $request->pet_refinery_received;
            $eng_standand_application->pet_refinery_issued = $request->pet_refinery_issued;
            $eng_standand_application->petrochemical_received = $request->petrochemical_received;
            $eng_standand_application->petrochemical_issued = $request->petrochemical_issued;
            $eng_standand_application->oil_facility_received = $request->oil_facility_received;
            $eng_standand_application->oil_facility_issued = $request->oil_facility_issued;
            $eng_standand_application->fert_plant_received = $request->fert_plant_received;
            $eng_standand_application->fert_plant_issued = $request->fert_plant_issued;
            $eng_standand_application->alternate_fuel_received = $request->alternate_fuel_received;
            $eng_standand_application->alternate_fuel_issued = $request->alternate_fuel_issued;
            $eng_standand_application->pts_received = $request->pts_received;
            $eng_standand_application->pts_issued = $request->pts_issued;
            $eng_standand_application->opll_received = $request->opll_received;
            $eng_standand_application->opll_issued = $request->opll_issued;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Updated Record');
        } else {
            // $eng_standand_application->id = $request->eng_standand_application_id;
            $eng_standand_application->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_application->week = $request->week;
            $eng_standand_application->processing_plant_received = $request->processing_plant_received;
            $eng_standand_application->processing_plant_issued = $request->processing_plant_issued;
            $eng_standand_application->pet_refinery_received = $request->pet_refinery_received;
            $eng_standand_application->pet_refinery_issued = $request->pet_refinery_issued;
            $eng_standand_application->petrochemical_received = $request->petrochemical_received;
            $eng_standand_application->petrochemical_issued = $request->petrochemical_issued;
            $eng_standand_application->oil_facility_received = $request->oil_facility_received;
            $eng_standand_application->oil_facility_issued = $request->oil_facility_issued;
            $eng_standand_application->fert_plant_received = $request->fert_plant_received;
            $eng_standand_application->fert_plant_issued = $request->fert_plant_issued;
            $eng_standand_application->alternate_fuel_received = $request->alternate_fuel_received;
            $eng_standand_application->alternate_fuel_issued = $request->alternate_fuel_issued;
            $eng_standand_application->pts_received = $request->pts_received;
            $eng_standand_application->pts_issued = $request->pts_issued;
            $eng_standand_application->opll_received = $request->opll_received;
            $eng_standand_application->opll_issued = $request->opll_issued;
            $eng_standand_application->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Added Record');
        }

        if ($eng_standand_application->save()) {
            return new WAREngStandandApplicationResource($eng_standand_application);
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
                    $uploaded = \App\WAREngStandandApplication::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'processing_plant_received' => $row['C'],
                        'processing_plant_issued' => $row['D'],
                        'pet_refinery_received' => $row['E'],
                        'pet_refinery_issued' => $row['F'],
                        'petrochemical_received' => $row['G'],
                        'petrochemical_issued' => $row['H'],
                        'oil_facility_received' => $row['I'],
                        'oil_facility_issued' => $row['J'],
                        'fert_plant_received' => $row['K'],
                        'fert_plant_issued' => $row['L'],
                        'alternate_fuel_received' => $row['M'],
                        'alternate_fuel_issued' => $row['N'],
                        'pts_received' => $row['O'],
                        'pts_issued' => $row['P'],
                        'opll_received' => $row['Q'],
                        'opll_issued' => $row['R'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Bulk Data Upload');

            $eng_standand_applications = \App\WAREngStandandApplication::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandApplicationResource::collection($eng_standand_applications);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexPermit(Request $request)
    {
        //
        if ($request->filled('all')) {
            $eng_standand_permits = \App\WAREngStandandPermit::orderBy('id', 'desc')->get();

            return ['data'=>$eng_standand_permits];
        } else {
            $eng_standand_permits = \App\WAREngStandandPermit::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandPermitResource::collection($eng_standand_permits);
        }
    }

    public function AddEngStandandPermit(Request $request)
    {
        $eng_standand_permit = $request->isMethod('put') ? \App\WAREngStandandPermit::findOrFail($request->eng_standand_permit_id) : new \App\WAREngStandandPermit;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $eng_standand_permit->id = $request->eng_standand_permit_id;
            $eng_standand_permit->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_permit->week = $request->week;
            $eng_standand_permit->general_received = $request->general_received;
            $eng_standand_permit->general_issued = $request->general_issued;
            $eng_standand_permit->major_received = $request->major_received;
            $eng_standand_permit->major_issued = $request->major_issued;
            $eng_standand_permit->specialised_received = $request->specialised_received;
            $eng_standand_permit->specialised_issued = $request->specialised_issued;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Permit');
            //Audit Logging
            $this->log_audit_trail($request, 'Permit', 'Updated Record');
        } else {
            // $eng_standand_permit->id = $request->eng_standand_permit_id;
            $eng_standand_permit->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_permit->week = $request->week;
            $eng_standand_permit->general_received = $request->general_received;
            $eng_standand_permit->general_issued = $request->general_issued;
            $eng_standand_permit->major_received = $request->major_received;
            $eng_standand_permit->major_issued = $request->major_issued;
            $eng_standand_permit->specialised_received = $request->specialised_received;
            $eng_standand_permit->specialised_issued = $request->specialised_issued;
            $eng_standand_permit->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Permit');
            //Audit Logging
            $this->log_audit_trail($request, 'Permit', 'Added Record');
        }

        if ($eng_standand_permit->save()) {
            return new WAREngStandandPermitResource($eng_standand_permit);
        }
    }

    public function uploadPermit(Request $request)
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
                    $uploaded = \App\WAREngStandandPermit::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'general_received' => $row['C'],
                        'general_issued' => $row['D'],
                        'major_received' => $row['E'],
                        'major_issued' => $row['F'],
                        'specialised_received' => $row['G'],
                        'specialised_issued' => $row['H'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Permit');
            //Audit Logging
            $this->log_audit_trail($request, 'Permit', 'Bulk Data Upload');

            $eng_standand_permits = \App\WAREngStandandPermit::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandPermitResource::collection($eng_standand_permits);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexDevelopment(Request $request)
    {
        //
        if ($request->filled('all')) {
            $eng_standand_developments = \App\WAREngStandandDevelopment::orderBy('id', 'desc')->get();

            return ['data'=>$eng_standand_developments];
        } else {
            $eng_standand_developments = \App\WAREngStandandDevelopment::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandDevelopmentResource::collection($eng_standand_developments);
        }
    }

    public function AddEngStandandDevelopment(Request $request)
    {
        $eng_standand_development = $request->isMethod('put') ? \App\WAREngStandandDevelopment::findOrFail($request->eng_standand_development_id) : new \App\WAREngStandandDevelopment;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $eng_standand_development->id = $request->eng_standand_development_id;
            $eng_standand_development->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_development->week = $request->week;
            $eng_standand_development->deep_offshore_project = $request->deep_offshore_project;
            $eng_standand_development->western_area_project = $request->western_area_project;
            $eng_standand_development->eastern_area_project = $request->eastern_area_project;
            $eng_standand_development->pipeline_project = $request->pipeline_project;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Updated Record');
        } else {
            // $eng_standand_development->id = $request->eng_standand_development_id;
            $eng_standand_development->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_development->week = $request->week;
            $eng_standand_development->deep_offshore_project = $request->deep_offshore_project;
            $eng_standand_development->western_area_project = $request->western_area_project;
            $eng_standand_development->eastern_area_project = $request->eastern_area_project;
            $eng_standand_development->pipeline_project = $request->pipeline_project;
            $eng_standand_development->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Application', 'Updated Record');
        }

        if ($eng_standand_development->save()) {
            return new WAREngStandandDevelopmentResource($eng_standand_development);
        }
    }

    public function uploadDevelopment(Request $request)
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
                    $uploaded = \App\WAREngStandandDevelopment::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'deep_offshore_project' => $row['C'],
                        'western_area_project' => $row['D'],
                        'eastern_area_project' => $row['E'],
                        'pipeline_project' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - Development');
            //Audit Logging
            $this->log_audit_trail($request, 'Development', 'Bulk Data Upload');

            $eng_standand_developments = \App\WAREngStandandDevelopment::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandDevelopmentResource::collection($eng_standand_developments);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexMaintenance(Request $request)
    {
        //
        if ($request->filled('all')) {
            $eng_standand_maintenances = \App\WAREngStandandMaintenance::orderBy('id', 'desc')->get();

            return ['data'=>$eng_standand_maintenances];
        } else {
            $eng_standand_maintenances = \App\WAREngStandandMaintenance::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandMaintenanceResource::collection($eng_standand_maintenances);
        }
    }

    public function AddEngStandandMaintenance(Request $request)
    {
        $eng_standand_maintenance = $request->isMethod('put') ? \App\WAREngStandandMaintenance::findOrFail($request->eng_standand_maintenance_id) : new \App\WAREngStandandMaintenance;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $eng_standand_maintenance->id = $request->eng_standand_maintenance_id;
            $eng_standand_maintenance->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_maintenance->week = $request->week;
            $eng_standand_maintenance->system_failure = $request->system_failure;
            $eng_standand_maintenance->system_failure_resolved = $request->system_failure_resolved;
            $eng_standand_maintenance->printer_failure = $request->printer_failure;
            $eng_standand_maintenance->printer_failure_resolved = $request->printer_failure_resolved;
            $eng_standand_maintenance->application_error = $request->application_error;
            $eng_standand_maintenance->application_error_resolved = $request->application_error_resolved;
            $eng_standand_maintenance->adhoc_issues = $request->adhoc_issues;
            $eng_standand_maintenance->adhoc_issues_resolved = $request->adhoc_issues_resolved;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - MainTenance');
            //Audit Logging
            $this->log_audit_trail($request, 'MainTenance', 'Updated Record');
        } else {
            // $eng_standand_maintenance->id = $request->eng_standand_maintenance_id;
            $eng_standand_maintenance->date = date('Y-m-d', strtotime($request->date));
            $eng_standand_maintenance->week = $request->week;
            $eng_standand_maintenance->system_failure = $request->system_failure;
            $eng_standand_maintenance->system_failure_resolved = $request->system_failure_resolved;
            $eng_standand_maintenance->printer_failure = $request->printer_failure;
            $eng_standand_maintenance->printer_failure_resolved = $request->printer_failure_resolved;
            $eng_standand_maintenance->application_error = $request->application_error;
            $eng_standand_maintenance->application_error_resolved = $request->application_error_resolved;
            $eng_standand_maintenance->adhoc_issues = $request->adhoc_issues;
            $eng_standand_maintenance->adhoc_issues_resolved = $request->adhoc_issues_resolved;
            $eng_standand_maintenance->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - MainTenance');
            //Audit Logging
            $this->log_audit_trail($request, 'MainTenance', 'Added Record');
        }

        if ($eng_standand_maintenance->save()) {
            return new WAREngStandandMaintenanceResource($eng_standand_maintenance);
        }
    }

    public function uploadMaintenance(Request $request)
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
                    $uploaded = \App\WAREngStandandMaintenance::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'deep_offshore_project' => $row['C'],
                        'western_area_project' => $row['D'],
                        'eastern_area_project' => $row['E'],
                        'pipeline_project' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Eng & Standand - MainTenance');
            //Audit Logging
            $this->log_audit_trail($request, 'MainTenance', 'Bulk Data Upload');

            $eng_standand_maintenances = \App\WAREngStandandMaintenance::orderBy('id', 'desc')->paginate(15);

            return WAREngStandandMaintenanceResource::collection($eng_standand_maintenances);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexEndStandandMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'application_es':
                return $this->getMonthlyEngStandandReportApplication($request);
            break;

            case 'permit':
                return $this->getMonthlyEngStandandReportPermit($request);
            break;

            case 'development_es':
                return $this->getMonthlyEngStandandReportDevelopment($request);
            break;

            case 'maintenance_es':
                return $this->getMonthlyEngStandandReportMaintenance($request);
            break;

            default:
                return $this->getMonthlyEngStandandReportApplication($request);
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

    public function getMonthlyEngStandandReportApplication(Request $request)
    {
        $data = ['processing_plant_received'=>'Gas Plant-Received',
            'processing_plant_issued'=>'Gas Plant-Issued',
            'pet_refinery_received'=>'Petrochemicals Refinery Received',
            'pet_refinery_issued'=>'Petrochemicals Refinery Issued',
            'petrochemical_received'=>'Petrochemicals Received',
            'petrochemical_issued'=>'Petrochemicals Issued',
            'oil_facility_received'=>'Oil Facility-Received',
            'oil_facility_issued'=>'Oil Facility-Issued',
            'fert_plant_received'=>'Fert plants-Received',
            'fert_plant_issued'=>'Fert plants-Issued',
            'alternate_fuel_received'=>'Alternate fuels-Received',
            'alternate_fuel_issued'=>'Alternate fuels-Issued',
            'pts_received'=>'PTS-Received',
            'pts_issued'=>'PTS-Issued',
            'opll_received'=>'OPLL Received',
            'opll_issued'=>'OPLL Issued',
        ];

        return $this->getMonthlyData($request, $data, \App\WAREngStandandApplication::class);
    }

    public function getMonthlyEngStandandReportPermit(Request $request)
    {
        $data = ['general_received'=>'General-Received',
            'general_issued'=>'General-Issued',
            'major_received'=>'Major Received',
            'major_issued'=>'Major Issued',
            'specialised_received'=>'Specialised Received',
            'specialised_issued'=>'Specialised Issued',
        ];

        return $this->getMonthlyData($request, $data, \App\WAREngStandandPermit::class);
    }

    public function getMonthlyEngStandandReportDevelopment(Request $request)
    {
        $data = ['deep_offshore_project'=>'No. of Deep offshore Projects',
            'western_area_project'=>'No. of western Area projects',
            'eastern_area_project'=>'No. of Eastern Area projects',
            'pipeline_project'=>'No. of Pipeline projects',
        ];

        return $this->getMonthlyData($request, $data, \App\WAREngStandandDevelopment::class);
    }

    public function getMonthlyEngStandandReportMaintenance(Request $request)
    {
        $data = ['system_failure'=>'No of system faillures',
            'system_failure_resolved'=>'No of system faillures Resolved',
            'printer_failure'=>'No Printer Faillures',
            'printer_failure_resolved'=>'No Printer Faillures Resolved',
            'application_error'=>'No of application Errors',
            'application_error_resolved'=>'No of application Errors Resolved',
            'adhoc_issues'=>'No of Adhoc Issues',
            'adhoc_issues_resolved'=>'No of Adhoc Issues Resolved',
        ];

        return $this->getMonthlyData($request, $data, \App\WAREngStandandMaintenance::class);
    }
}
