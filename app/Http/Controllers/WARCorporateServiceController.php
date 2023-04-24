<?php

namespace App\Http\Controllers;

use App\Http\Resources\WARCorporateServiceDiseasePattern as WARCorporateServiceDiseasePatternResource;
use App\Http\Resources\WARCorporateServiceLogistics as WARCorporateServiceLogisticsResource;
use App\Http\Resources\WARCorporateServiceMedicalService as WARCorporateServiceMedicalServiceResource;
use App\Http\Resources\WARCorporateServiceStaffMatter as WARCorporateServiceStaffMatterResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WARCorporateServiceController extends Controller
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
            case 'staff_matter':
                return $this->AddCorporateServiceStaffMatter($request);
            break;

            case 'medical_service':
                return $this->AddMedicalService($request);
            break;

            case 'disease_pattern':
                return $this->AddDiseasePattern($request);
            break;

            case 'logistic':
                return $this->AddLogistics($request);
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
            case 'staff_matter':
                $staff_matter = \App\WARCorporateServiceStaffMatter::findOrFail($id);

                return new WARCorporateServiceStaffMatterResource($staff_matter);
            break;

            case 'medical_service':
                $medical_service = \App\WARCorporateServiceMedicalService::findOrFail($id);

                return new WARCorporateServiceMedicalServiceResource($medical_service);
            break;

            case 'disease_pattern':
                $disease_pattern = \App\WARCorporateServiceDiseasePattern::findOrFail($id);

                return new WARCorporateServiceDiseasePatternResource($disease_pattern);
            break;

            case 'logistic':
                $logistic = \App\WARCorporateServiceLogistics::findOrFail($id);

                return new WARCorporateServiceLogisticsResource($logistic);
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
    public function destroy(Request $request, $id, $type)
    {
        //
        switch ($type) {
            case 'staff_matter':
                $staff_matter = \App\WARCorporateServiceStaffMater::findOrFail($id);
                if ($staff_matter->delete()) {
                    //send mail
                    // $this->send_all_mail($request, 'Corporate Service - Staff Matters');
                    //Audit Logging
                    // $this->log_audit_trail($request, 'Staff Matters', 'Deleted Record');

                    return new WARCorporateServiceStaffMaterResource($staff_matter);
                }
            break;

            case 'medical_service':
                $medical_service = \App\WARCorporateServiceMedicalService::findOrFail($id);
                if ($medical_service->delete()) {
                    return new WARCorporateServiceMedicalServiceResource($medical_service);
                }
            break;

            case 'disease_pattern':
                $disease_pattern = \App\WARCorporateServiceDiseasePattern::findOrFail($id);
                if ($disease_pattern->delete()) {
                    return new WARCorporateServiceDiseasePatternResource($disease_pattern);
                }
            break;

            case 'logistic':
                $logistic = \App\WARCorporateServiceLogistics::findOrFail($id);
                if ($logistic->delete()) {
                    return new WARCorporateServiceLogisticsResource($logistic);
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
            case 'staff_matter':
                return $this->uploadStaffMatters($request);
            break;

            case 'medical_service':
                return $this->uploadMedicalService($request);
            break;

            case 'disease_pattern':
                return $this->uploadDiseasePattern($request);
            break;

            case 'logistic':
                return $this->uploadLogistics($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function indexCorporateService(Request $request)
    {
        //
        if ($request->filled('all')) {
            $staff_matters = \App\WARCorporateServiceStaffMatter::orderBy('id', 'desc')->get();

            return ['data'=>$staff_matters];
        } else {
            $staff_matters = \App\WARCorporateServiceStaffMatter::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceStaffMatterResource::collection($staff_matters);
        }
    }

    public function AddCorporateServiceStaffMatter(Request $request)
    {
        $staff_matter = $request->isMethod('put') ? \App\WARCorporateServiceStaffMatter::findOrFail($request->staff_matter_id) : new \App\WARCorporateServiceStaffMatter;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $staff_matter->id = $request->staff_matter_id;
            $staff_matter->date = date('Y-m-d', strtotime($request->date));
            $staff_matter->week = $request->week;
            $staff_matter->staff_strength = $request->staff_strength;
            $staff_matter->retired = $request->retired;
            $staff_matter->deceased = $request->deceased;
            $staff_matter->commence_annual_leave = $request->commence_annual_leave;
            $staff_matter->resumed_annaul_leave = $request->resumed_annaul_leave;
            $staff_matter->new_disiplinary_case = $request->new_disiplinary_case;
            $staff_matter->contractor_registered = $request->contractor_registered;
            $staff_matter->local_training = $request->local_training;
            $staff_matter->overseas_training = $request->overseas_training;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Staff Matters');
            //Audit Logging
            $this->log_audit_trail($request, 'Staff Matters', 'Updated Record');
        } else {
            // $staff_matter->id = $request->staff_matter_id;
            $staff_matter->date = date('Y-m-d', strtotime($request->date));
            $staff_matter->week = $request->week;
            $staff_matter->staff_strength = $request->staff_strength;
            $staff_matter->retired = $request->retired;
            $staff_matter->deceased = $request->deceased;
            $staff_matter->commence_annual_leave = $request->commence_annual_leave;
            $staff_matter->resumed_annaul_leave = $request->resumed_annaul_leave;
            $staff_matter->new_disiplinary_case = $request->new_disiplinary_case;
            $staff_matter->contractor_registered = $request->contractor_registered;
            $staff_matter->local_training = $request->local_training;
            $staff_matter->overseas_training = $request->overseas_training;
            $staff_matter->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Staff Matters');
            //Audit Logging
            $this->log_audit_trail($request, 'Staff Matters', 'Added Record');
        }

        if ($staff_matter->save()) {
            return new WARCorporateServiceStaffMatterResource($staff_matter);
        }
    }

    public function uploadStaffMatters(Request $request)
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
                    $uploaded = \App\WARCorporateServiceStaffMatter::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'staff_strength' => $row['C'],
                        'retired' => $row['D'],
                        'deceased' => $row['E'],
                        'commence_annual_leave' => $row['F'],
                        'resumed_annaul_leave' => $row['G'],
                        'new_disiplinary_case' => $row['H'],
                        'contractor_registered' => $row['I'],
                        'local_training' => $row['J'],
                        'overseas_training' => $row['K'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Staff Matters');
            //Audit Logging
            $this->log_audit_trail($request, 'Staff Matters', 'Data Bulk Upload');

            $staff_matters = \App\WARCorporateServiceStaffMatter::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceStaffMatterResource::collection($staff_matters);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexMedicalService(Request $request)
    {
        //
        if ($request->filled('all')) {
            $medical_services = \App\WARCorporateServiceMedicalService::orderBy('id', 'desc')->get();

            return ['data'=>$medical_services];
        } else {
            $medical_services = \App\WARCorporateServiceMedicalService::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceMedicalServiceResource::collection($medical_services);
        }
    }

    public function AddMedicalService(Request $request)
    {
        $medical_service = $request->isMethod('put') ? \App\WARCorporateServiceMedicalService::findOrFail($request->medical_service_id) : new \App\WARCorporateServiceMedicalService;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $medical_service->id = $request->medical_service_id;
            $medical_service->date = date('Y-m-d', strtotime($request->date));
            $medical_service->week = $request->week;
            $medical_service->clinic_visit = $request->clinic_visit;
            $medical_service->referral = $request->referral;
            $medical_service->sick_leave_case = $request->sick_leave_case;
            $medical_service->maternity_leave = $request->maternity_leave;
            $medical_service->health_talk = $request->health_talk;
            $medical_service->health_walk = $request->health_walk;
            $medical_service->immunization = $request->immunization;
            $medical_service->canteen_visit = $request->canteen_visit;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Medical Services');
            //Audit Logging
            $this->log_audit_trail($request, 'Medical Services', 'Updated Record');
        } else {
            // $medical_service->id = $request->medical_service_id;
            $medical_service->date = date('Y-m-d', strtotime($request->date));
            $medical_service->week = $request->week;
            $medical_service->clinic_visit = $request->clinic_visit;
            $medical_service->referral = $request->referral;
            $medical_service->sick_leave_case = $request->sick_leave_case;
            $medical_service->maternity_leave = $request->maternity_leave;
            $medical_service->health_talk = $request->health_talk;
            $medical_service->health_walk = $request->health_walk;
            $medical_service->immunization = $request->immunization;
            $medical_service->canteen_visit = $request->canteen_visit;
            $medical_service->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Medical Services');
            //Audit Logging
            $this->log_audit_trail($request, 'Medical Services', 'Added Record');
        }

        if ($medical_service->save()) {
            return new WARCorporateServiceMedicalServiceResource($medical_service);
        }
    }

    public function uploadMedicalService(Request $request)
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
                    $uploaded = \App\WARCorporateServiceMedicalService::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'clinic_visit' => $row['C'],
                        'referral' => $row['D'],
                        'sick_leave_case' => $row['E'],
                        'maternity_leave' => $row['F'],
                        'health_talk' => $row['G'],
                        'health_walk' => $row['H'],
                        'immunization' => $row['I'],
                        'canteen_visit' => $row['J'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Staff Matters');
            //Audit Logging
            $this->log_audit_trail($request, 'Staff Matters', 'Data Bulk Upload');

            $medical_services = \App\WARCorporateServiceMedicalService::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceMedicalServiceResource::collection($medical_services);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexDiseasePattern(Request $request)
    {
        //
        if ($request->filled('all')) {
            $disease_patterns = \App\WARCorporateServiceDiseasePattern::orderBy('id', 'desc')->get();

            return ['data'=>$disease_patterns];
        } else {
            $disease_patterns = \App\WARCorporateServiceDiseasePattern::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceDiseasePatternResource::collection($disease_patterns);
        }
    }

    public function AddDiseasePattern(Request $request)
    {
        $disease_pattern = $request->isMethod('put') ? \App\WARCorporateServiceDiseasePattern::findOrFail($request->disease_pattern_id) : new \App\WARCorporateServiceDiseasePattern;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $disease_pattern->id = $request->disease_pattern_id;
            $disease_pattern->date = date('Y-m-d', strtotime($request->date));
            $disease_pattern->week = $request->week;
            $disease_pattern->arthritis = $request->arthritis;
            $disease_pattern->malaria = $request->malaria;
            $disease_pattern->urti = $request->urti;
            $disease_pattern->diabetes = $request->diabetes;
            $disease_pattern->hypertension = $request->hypertension;
            $disease_pattern->viral_syndrome = $request->viral_syndrome;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Disease Pattern');
            //Audit Logging
            $this->log_audit_trail($request, 'Disease Pattern', 'Update Record');
        } else {
            // $disease_pattern->id = $request->disease_pattern_id;
            $disease_pattern->date = date('Y-m-d', strtotime($request->date));
            $disease_pattern->week = $request->week;
            $disease_pattern->arthritis = $request->arthritis;
            $disease_pattern->malaria = $request->malaria;
            $disease_pattern->urti = $request->urti;
            $disease_pattern->diabetes = $request->diabetes;
            $disease_pattern->hypertension = $request->hypertension;
            $disease_pattern->viral_syndrome = $request->viral_syndrome;
            $disease_pattern->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Disease Pattern');
            //Audit Logging
            $this->log_audit_trail($request, 'Disease Pattern', 'Update Record');
        }

        if ($disease_pattern->save()) {
            return new WARCorporateServiceDiseasePatternResource($disease_pattern);
        }
    }

    public function uploadDiseasePattern(Request $request)
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
                    $uploaded = \App\WARCorporateServiceDiseasePattern::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'arthritis' => $row['C'],
                        'malaria' => $row['D'],
                        'urti' => $row['E'],
                        'diabetes' => $row['F'],
                        'hypertension' => $row['G'],
                        'viral_syndrome' => $row['H'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Disease Pattern');
            //Audit Logging
            $this->log_audit_trail($request, 'Disease Pattern', 'Bulk Data Upload');

            $disease_patterns = \App\WARCorporateServiceDiseasePattern::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceDiseasePatternResource::collection($disease_patterns);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexLogistics(Request $request)
    {
        //
        if ($request->filled('all')) {
            $logistics = \App\WARCorporateServiceLogistics::orderBy('id', 'desc')->get();

            return ['data'=>$logistics];
        } else {
            $logistics = \App\WARCorporateServiceLogistics::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceLogisticsResource::collection($logistics);
        }
    }

    public function AddLogistics(Request $request)
    {
        $logistic = $request->isMethod('put') ? \App\WARCorporateServiceLogistics::findOrFail($request->logistic_id) : new \App\WARCorporateServiceLogistics;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $logistic->id = $request->logistic_id;
            $logistic->date = date('Y-m-d', strtotime($request->date));
            $logistic->week = $request->week;
            $logistic->newly_received_vehicle = $request->newly_received_vehicle;
            $logistic->fleet_utilization = $request->fleet_utilization;
            $logistic->coaster_bus = $request->coaster_bus;
            $logistic->hilux = $request->hilux;
            $logistic->cars = $request->cars;
            $logistic->peugeot_bus = $request->peugeot_bus;
            $logistic->mits_p_up_van = $request->mits_p_up_van;
            $logistic->land_cruiser = $request->land_cruiser;
            $logistic->prado_suv = $request->prado_suv;
            $logistic->hiace_bus = $request->hiace_bus;
            $logistic->ambulance = $request->ambulance;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Logistics');
            //Audit Logging
            $this->log_audit_trail($request, 'Logistics', 'Updated Record');
        } else {
            // $logistic->id = $request->logistic_id;
            $logistic->date = date('Y-m-d', strtotime($request->date));
            $logistic->week = $request->week;
            $logistic->newly_received_vehicle = $request->newly_received_vehicle;
            $logistic->fleet_utilization = $request->fleet_utilization;
            $logistic->coaster_bus = $request->coaster_bus;
            $logistic->hilux = $request->hilux;
            $logistic->cars = $request->cars;
            $logistic->peugeot_bus = $request->peugeot_bus;
            $logistic->mits_p_up_van = $request->mits_p_up_van;
            $logistic->land_cruiser = $request->land_cruiser;
            $logistic->prado_suv = $request->prado_suv;
            $logistic->hiace_bus = $request->hiace_bus;
            $logistic->ambulance = $request->ambulance;
            $logistic->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Logistics');
            //Audit Logging
            $this->log_audit_trail($request, 'Logistics', 'Added Record');
        }

        if ($logistic->save()) {
            return new WARCorporateServiceLogisticsResource($logistic);
        }
    }

    public function uploadLogistics(Request $request)
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
                    $uploaded = \App\WARCorporateServiceLogistics::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'newly_received_vehicle' => $row['C'],
                        'fleet_utilization' => $row['D'],
                        'coaster_bus' => $row['E'],
                        'hilux' => $row['F'],
                        'cars' => $row['G'],
                        'peugeot_bus' => $row['H'],
                        'mits_p_up_van' => $row['I'],
                        'land_cruiser' => $row['J'],
                        'prado_suv' => $row['K'],
                        'hiace_bus' => $row['L'],
                        'ambulance' => $row['M'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Corporate Service - Disease Pattern');
            //Audit Logging
            $this->log_audit_trail($request, 'Disease Pattern', 'Bulk Data Upload');

            $logistics = \App\WARCorporateServiceLogistics::orderBy('id', 'desc')->paginate(15);

            return WARCorporateServiceLogisticsResource::collection($logistics);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexCorporateServiceMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'staff_matter':
                return $this->getMonthlyCorporateServiceReportStaffMatters($request);
            break;

            case 'medical':
                return $this->getMonthlyCorporateServiceReportMedical($request);
            break;

            case 'disease':
                return $this->getMonthlyCorporateServiceReportDisease($request);
            break;

            case 'logistic':
                return $this->getMonthlyCorporateServiceReportLogistics($request);
            break;

            default:
                return $this->getMonthlyCorporateServiceReportStaffMatters($request);
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

    public function getMonthlyCorporateServiceReportStaffMatters(Request $request)
    {
        $data = ['staff_strength'=>'Staff Strength',
            'retired'=>'Retired',
            'deceased'=>'Deceased',
            'commence_annual_leave'=>'Commence Annual Leave',
            'resumed_annaul_leave'=>'Resumed Annual Leave',
            'new_disiplinary_case'=>'Disciplinary Cases',
            'contractor_registered'=>'Contractors  Registered',
            'local_training'=>'Local Training',
            'overseas_training'=>'Overseas Training',
        ];

        return $this->getMonthlyData($request, $data, \App\WARCorporateServiceStaffMatter::class);
    }

    public function getMonthlyCorporateServiceReportMedical(Request $request)
    {
        $data = ['clinic_visit'=>'Patient Attendance/Clinic Visits',
            'referral'=>'Referrals',
            'sick_leave_case'=>'Sick Leave',
            'maternity_leave'=>'Maternity Leave',
            'health_talk'=>'YTD on Health Talk',
            'health_walk'=>'YTD on Health Walk',
            'immunization'=>'YTD on Immunization',
            'canteen_visit'=>'YTD on Canteen Visits',
        ];

        return $this->getMonthlyData($request, $data, \App\WARCorporateServiceMedicalService::class);
    }

    public function getMonthlyCorporateServiceReportDisease(Request $request)
    {
        $data = ['arthritis'=>'Arthritis',
            'malaria'=>'Malaria',
            'urti'=>'URTI',
            'diabetes'=>'Diabetes',
            'hypertension'=>'Hypertension',
            'viral_syndrome'=>'Viral Syndrome',
        ];

        return $this->getMonthlyData($request, $data, \App\WARCorporateServiceDiseasePattern::class);
    }

    public function getMonthlyCorporateServiceReportLogistics(Request $request)
    {
        $data = ['newly_received_vehicle'=>'New Vehicles',
            'fleet_utilization'=>'Utility-Total Fleet',
            'coaster_bus'=>'Coaster Buses',
            'hilux'=>'Hilux',
            'cars'=>'Cars',
            'peugeot_bus'=>'Peugeot Buses',
            'mits_p_up_van'=>'Mits Pick/up Van',
            'land_cruiser'=>'Toyota Land Cruisers',
            'prado_suv'=>'Prado Jeep',
            'hiace_bus'=>'Hiace Buses',
            'ambulance'=>'Ambulance',
        ];

        return $this->getMonthlyData($request, $data, \App\WARCorporateServiceLogistics::class);
    }
}
