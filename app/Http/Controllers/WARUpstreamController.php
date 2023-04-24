<?php

namespace App\Http\Controllers;

use App\Http\Resources\WARAcquisition as WARAcquisitionResource;
use App\Http\Resources\WARCrudeOilProduction as WARCrudeOilProductionResource;
use App\Http\Resources\WARDepletionRate as WARDepletionRateResource;
use App\Http\Resources\WARFDPApplication as WARFDPApplicationResource;
use App\Http\Resources\WARReEntry as WARReEntryResource;
use App\Http\Resources\WARRevenueGenerated as WARRevenueGeneratedResource;
use App\Http\Resources\WARRigDisposition as WARRigDispositionResource;
use App\Http\Resources\WARUnitization as WARUnitizationResource;
use App\Http\Resources\WARWellDrilling as WARWellDrillingResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WARUpstreamController extends Controller
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
    public function index(Request $request)
    {
        return $request->path();
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
        // return $request->type;
        switch ($request->type) {
            case 'acquisition':
                return $this->AddAquisition($request);
            break;

            case 'well_drilling':
                return $this->AddWellDrilling($request);
            break;

            case 'well_re_entries':
                return $this->AddWellReEntry($request);
            break;

            case 'rig_disposition':
                return $this->AddRigDisposition($request);
            break;

            case 'fdp_application':
                return $this->AddFDPApplication($request);
            break;

            case 'depletion_rate':
                return $this->AddDepletionRate($request);
            break;

            case 'crude_oil_production':
                return $this->AddCrudeOilProduction($request);
            break;

            case 'revenue_generated':
                return $this->AddRevenueGenerated($request);
            break;

            case 'unitization':
                return $this->AddUnitization($request);
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
    public function show($id, $type)
    {
        //
        switch ($type) {
            case 'acquisition':
                $acquisition = \App\WARAcquisition::findOrFail($id);

                return new WARAcquisitionResource($acquisition);
            break;

            case 'well_drilling':
                $well_drilling = \App\WARWellDrilling::findOrFail($id);

                return new WARWellDrillingResource($well_drilling);
            break;

            case 'well_re_entry':
                $well_re_entry = \App\WARReEntry::findOrFail($id);

                return new WARReEntryResource($well_re_entry);
            break;

            case 'rig_disposition':
                $rig_disposition = \App\WARRigDisposition::findOrFail($id);

                return new WARRigDispositionResource($rig_disposition);
            break;

            case 'fdp_application':
                $fdp_application = \App\WARFDPApplication::findOrFail($id);

                return new WARFDPApplicationResource($fdp_application);
            break;

            case 'depletion_rate':
                $depletion_rate = \App\WARDepletionRate::findOrFail($id);

                return new WARDepletionRateResource($depletion_rate);
            break;

            case 'crude_oil_production':
                $crude_oil_production = \App\WARCrudeOilProduction::findOrFail($id);

                return new WARCrudeOilProductionResource($crude_oil_production);
            break;

            case 'revenue_generated':
                $revenue_generated = \App\WARRevenueGenerated::findOrFail($id);

                return new WARRevenueGeneratedResource($revenue_generated);
            break;

            case 'unitization':
                $unitization = \App\WARUnitization::findOrFail($id);

                return new WARUnitizationResource($unitization);
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
     * @param  \Illuminate\Http\Request  $requests
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
            case 'acquisition':
                $acquisition = \App\WARAcquisition::findOrFail($id);
                if ($acquisition->delete()) {
                    return new WARAcquisitionResource($acquisition);
                }
            break;

            case 'well_drilling':
                $well_drilling = \App\WARWellDrilling::findOrFail($id);
                if ($well_drilling->delete()) {
                    return new WARWellDrillingResource($well_drilling);
                }
            break;

            case 'well_re_entry':
                $well_re_entry = \App\WARReEntry::findOrFail($id);
                if ($well_re_entry->delete()) {
                    return new WARReEntryResource($well_re_entry);
                }
            break;

            case 'rig_disposition':
                $rig_disposition = \App\WARRigDisposition::findOrFail($id);
                if ($rig_disposition->delete()) {
                    return new WARRigDispositionResource($rig_disposition);
                }
            break;

            case 'fdp_application':
                $fdp_application = \App\WARFDPApplication::findOrFail($id);
                if ($fdp_application->delete()) {
                    return new WARFDPApplicationResource($fdp_application);
                }
            break;

            case 'depletion_rate':
                $depletion_rate = \App\WARDepletionRate::findOrFail($id);
                if ($depletion_rate->delete()) {
                    return new WARDepletionRateResource($depletion_rate);
                }
            break;

            case 'crude_oil_production':
                $crude_oil_production = \App\WARCrudeOilProduction::findOrFail($id);
                if ($crude_oil_production->delete()) {
                    return new WARCrudeOilProductionResource($crude_oil_production);
                }
            break;

            case 'revenue_generated':
                $revenue_generated = \App\WARRevenueGenerated::findOrFail($id);
                if ($revenue_generated->delete()) {
                    return new WARRevenueGeneratedResource($revenue_generated);
                }
            break;

            case 'unitization':
                $unitization = \App\WARUnitization::findOrFail($id);
                if ($unitization->delete()) {
                    return new WARUnitizationResource($unitization);
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
            case 'acquisition':
                return $this->uploadAcquisition($request);
            break;

            case 'well_drilling':
                return $this->uploadDrilling($request);
            break;

            case 're_entry':
                return $this->uploadReEntry($request);
            break;

            case 'rig_disposition':
                return $this->uploadRigDisposition($request);
            break;

            case 'fdp_application':
                return $this->uploadFDPApplication($request);
            break;

            case 'depletion_rate':
                return $this->uploadDepletionRate($request);
            break;

            case 'crude_oil_production':
                return $this->uploadCrudeOilProduction($request);
            break;

            case 'revenue_generated':
                return $this->uploadRevenueGenerated($request);
            break;

            case 'unitization':
                return $this->uploadUnitization($request);
            break;

            default:
                // code...
            break;
        }
    }

    //get weeks
    public function getWeeks()
    {
        $weeks = \App\Week::orderBy('week', 'asc')->get();

        return ['data'=>$weeks];
    }

    //get refineries
    public function getRefineries()
    {
        $refineries = \App\down_plant_location::orderBy('plant_location_name', 'asc')->get();

        return ['data'=>$refineries];
    }

    //get market segment
    public function getSegments()
    {
        $segments = \App\down_market_segment::orderBy('market_segment_name', 'asc')->get();

        return ['data'=>$segments];
    }

    public function indexAquisition(Request $request)
    {
        //
        if ($request->filled('all')) {
            $acquisitions = \App\WARAcquisition::orderBy('id', 'desc')->get();

            return ['data'=>$acquisitions];
        } else {
            $acquisitions = \App\WARAcquisition::orderBy('id', 'desc')->paginate(5);

            return WARAcquisitionResource::collection($acquisitions);
        }
    }

    public function AddAquisition(Request $request)
    {
        $acquisition = $request->isMethod('put') ? \App\WARAcquisition::findOrFail($request->acquisition_id) : new \App\WARAcquisition;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $acquisition->id = $request->acquisition_id;
            $acquisition->date = date('Y-m-d', strtotime($request->date));
            $acquisition->week = $request->week;
            $acquisition->seismic_data_acquired = $request->seismic_data_acquired;
            $acquisition->cumulative_seismic_acquired = $request->cumulative_seismic_acquired;
            $acquisition->annual_seismic_acquisition = $request->annual_seismic_acquisition;
            $acquisition->seismic_data_processed = $request->seismic_data_processed;

            //send mail
            $this->send_all_mail($request, 'Upstream - Seismic Acquisition');
            //Audit Logging
            $this->log_audit_trail($request, 'Seismic Acquisition', 'Updated Record');
        } else {
            // $acquisition->id = $request->acquisition_id;
            $acquisition->date = date('Y-m-d', strtotime($request->date));
            $acquisition->week = $request->week;
            $acquisition->seismic_data_acquired = $request->seismic_data_acquired;
            $acquisition->cumulative_seismic_acquired = $request->cumulative_seismic_acquired;
            $acquisition->annual_seismic_acquisition = $request->annual_seismic_acquisition;
            $acquisition->seismic_data_processed = $request->seismic_data_processed;
            $acquisition->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Seismic Acquisition');
            //Audit Logging
            $this->log_audit_trail($request, 'Seismic Acquisition', 'Added Record');
        }
        if ($acquisition->save()) {
            return new WARAcquisitionResource($acquisition);
        }
    }

    public function uploadAcquisition(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK ACQUISITION
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARAcquisition::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'seismic_data_acquired' => $row['C'],
                        'cumulative_seismic_acquired' => $row['D'],
                        'annual_seismic_acquisition' => $row['E'],
                        'seismic_data_processed' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Seismic Acquisition');
            //Audit Logging
            $this->log_audit_trail($request, 'Seismic Acquisition', 'Bulk Data Upload');

            $acquisitions = \App\WARAcquisition::orderBy('id', 'desc')->paginate(15);

            return WARAcquisitionResource::collection($acquisitions);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexWellDrilling(Request $request)
    {
        //
        if ($request->filled('all')) {
            $well_drillings = \App\WARWellDrilling::orderBy('id', 'desc')->get();

            return ['data'=>$well_drillings];
        } else {
            $well_drillings = \App\WARWellDrilling::orderBy('id', 'desc')->paginate(15);

            return WARWellDrillingResource::collection($well_drillings);
        }
    }

    public function AddWellDrilling(Request $request)
    {
        $well_drilling = $request->isMethod('put') ? \App\WARWellDrilling::findOrFail($request->well_drilling_id) : new \App\WARWellDrilling;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $well_drilling->id = $request->well_drilling_id;
            $well_drilling->date = date('Y-m-d', strtotime($request->date));
            $well_drilling->week = $request->week;
            $well_drilling->exploration_commenced = $request->exploration_commenced;
            $well_drilling->exploration_ongoing = $request->exploration_ongoing;
            $well_drilling->exploration_completed = $request->exploration_completed;
            $well_drilling->appraisal_commenced = $request->appraisal_commenced;
            $well_drilling->appraisal_ongoing = $request->appraisal_ongoing;
            $well_drilling->appraisal_completed = $request->appraisal_completed;
            $well_drilling->development_commenced = $request->development_commenced;
            $well_drilling->development_ongoing = $request->development_ongoing;
            $well_drilling->development_completed = $request->development_completed;
            $well_drilling->well_completion = $request->well_completion;
            $well_drilling->well_spudded = $request->well_spudded;
            $well_drilling->drilling_rig = $request->drilling_rig;

            //send mail
            $this->send_all_mail($request, 'Upstream - Drilling Activities');
            //Audit Logging
            $this->log_audit_trail($request, 'Drilling Activities', 'Updated Record');
        } else {
            // $well_drilling->id = $request->well_drilling_id;
            $well_drilling->date = date('Y-m-d', strtotime($request->date));
            $well_drilling->week = $request->week;
            $well_drilling->exploration_commenced = $request->exploration_commenced;
            $well_drilling->exploration_ongoing = $request->exploration_ongoing;
            $well_drilling->exploration_completed = $request->exploration_completed;
            $well_drilling->appraisal_commenced = $request->appraisal_commenced;
            $well_drilling->appraisal_ongoing = $request->appraisal_ongoing;
            $well_drilling->appraisal_completed = $request->appraisal_completed;
            $well_drilling->development_commenced = $request->development_commenced;
            $well_drilling->development_ongoing = $request->development_ongoing;
            $well_drilling->development_completed = $request->development_completed;
            $well_drilling->well_completion = $request->well_completion;
            $well_drilling->well_spudded = $request->well_spudded;
            $well_drilling->drilling_rig = $request->drilling_rig;
            $well_drilling->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Drilling Activities');
            //Audit Logging
            $this->log_audit_trail($request, 'Drilling Activities', 'Added Record');
        }

        if ($well_drilling->save()) {
            return new WARWellDrillingResource($well_drilling);
        }
    }

    public function uploadDrilling(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK DRILLING
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARWellDrilling::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'exploration_commenced' => $row['C'],
                        'exploration_ongoing' => $row['D'],
                        'exploration_completed' => $row['E'],
                        'appraisal_commenced' => $row['F'],
                        'appraisal_ongoing' => $row['G'],
                        'appraisal_completed' => $row['H'],
                        'development_commenced' => $row['I'],
                        'development_ongoing' => $row['J'],
                        'development_completed' => $row['K'],
                        'well_completion' => $row['L'],
                        'well_spudded' => $row['M'],
                        'drilling_rig' => $row['N'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Drilling Activities');
            //Audit Logging
            $this->log_audit_trail($request, 'Drilling Activities', 'Bulk Data Upload');

            $well_drillings = \App\WARWellDrilling::orderBy('id', 'desc')->paginate(15);

            return WARWellDrillingResource::collection($well_drillings);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexWellReEntry(Request $request)
    {
        //
        if ($request->filled('all')) {
            $well_re_entries = \App\WARReEntry::orderBy('id', 'desc')->get();

            return ['data'=>$well_re_entries];
        } else {
            $well_re_entries = \App\WARReEntry::orderBy('id', 'desc')->paginate(15);

            return WARReEntryResource::collection($well_re_entries);
        }
    }

    public function AddWellReEntry(Request $request)
    {
        $well_re_entry = $request->isMethod('put') ? \App\WARReEntry::findOrFail($request->well_re_entry_id) : new \App\WARReEntry;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $well_re_entry->id = $request->well_re_entry_id;
            $well_re_entry->date = date('Y-m-d', strtotime($request->date));
            $well_re_entry->week = $request->week;
            $well_re_entry->re_entry_commenced = $request->re_entry_commenced;
            $well_re_entry->re_entry_ongoing = $request->re_entry_ongoing;
            $well_re_entry->re_entry_completed = $request->re_entry_completed;
            $well_re_entry->workover_commenced = $request->workover_commenced;
            $well_re_entry->workover_ongoing = $request->workover_ongoing;
            $well_re_entry->workover_completed = $request->workover_completed;
            $well_re_entry->re_entry_completion = $request->re_entry_completion;
            $well_re_entry->re_entry_workover = $request->re_entry_workover;
            $well_re_entry->re_entry_reserve_addition = $request->re_entry_reserve_addition;
            $well_re_entry->well_expected_rate = $request->well_expected_rate;

            //send mail
            $this->send_all_mail($request, 'Upstream - Re Entry');
            //Audit Logging
            $this->log_audit_trail($request, 'Re Entry', 'Updated Record');
        } else {
            // $well_re_entry->id = $request->well_re_entry_id;
            $well_re_entry->date = date('Y-m-d', strtotime($request->date));
            $well_re_entry->week = $request->week;
            $well_re_entry->re_entry_commenced = $request->re_entry_commenced;
            $well_re_entry->re_entry_ongoing = $request->re_entry_ongoing;
            $well_re_entry->re_entry_completed = $request->re_entry_completed;
            $well_re_entry->workover_commenced = $request->workover_commenced;
            $well_re_entry->workover_ongoing = $request->workover_ongoing;
            $well_re_entry->workover_completed = $request->workover_completed;
            $well_re_entry->re_entry_completion = $request->re_entry_completion;
            $well_re_entry->re_entry_workover = $request->re_entry_workover;
            $well_re_entry->re_entry_reserve_addition = $request->re_entry_reserve_addition;
            $well_re_entry->well_expected_rate = $request->well_expected_rate;
            $well_re_entry->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Re Entry');
            //Audit Logging
            $this->log_audit_trail($request, 'Re Entry', 'Added Record');
        }

        if ($well_re_entry->save()) {
            return new WARReEntryResource($well_re_entry);
        }
    }

    public function uploadReEntry(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK RE-ENTRY
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARReEntry::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        're_entry_commenced' => $row['C'],
                        're_entry_ongoing' => $row['D'],
                        're_entry_completed' => $row['E'],
                        'workover_commenced' => $row['F'],
                        'workover_ongoing' => $row['G'],
                        'workover_completed' => $row['H'],
                        're_entry_completion' => $row['I'],
                        're_entry_workover' => $row['J'],
                        're_entry_reserve_addition' => $row['K'],
                        'well_expected_rate' => $row['L'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Re Entry');
            //Audit Logging
            $this->log_audit_trail($request, 'Re Entry', 'Bulk Data Upload');

            $well_re_entries = \App\WARReEntry::orderBy('id', 'desc')->paginate(15);

            return WARReEntryResource::collection($well_re_entries);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexRigDisposition(Request $request)
    {
        //
        if ($request->filled('all')) {
            $rig_dispositions = \App\WARRigDisposition::orderBy('id', 'desc')->get();

            return ['data'=>$rig_dispositions];
        } else {
            $rig_dispositions = \App\WARRigDisposition::orderBy('id', 'desc')->paginate(15);

            return WARRigDispositionResource::collection($rig_dispositions);
        }
    }

    public function AddRigDisposition(Request $request)
    {
        $rig_disposition = $request->isMethod('put') ? \App\WARRigDisposition::findOrFail($request->rig_disposition_id) : new \App\WARRigDisposition;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $rig_disposition->id = $request->rig_disposition_id;
            $rig_disposition->date = date('Y-m-d', strtotime($request->date));
            $rig_disposition->week = $request->week;
            $rig_disposition->active_rig = $request->active_rig;
            $rig_disposition->statcked_rig = $request->statcked_rig;
            $rig_disposition->rig_on_standby = $request->rig_on_standby;
            $rig_disposition->total_rig = $request->total_rig;

            //send mail
            $this->send_all_mail($request, 'Upstream - Rig Disposition');
            //Audit Logging
            $this->log_audit_trail($request, 'Rig Disposition', 'Updated Record');
        } else {
            // $rig_disposition->id = $request->well_re_entry_id;
            $rig_disposition->date = date('Y-m-d', strtotime($request->date));
            $rig_disposition->week = $request->week;
            $rig_disposition->active_rig = $request->active_rig;
            $rig_disposition->statcked_rig = $request->statcked_rig;
            $rig_disposition->rig_on_standby = $request->rig_on_standby;
            $rig_disposition->total_rig = $request->total_rig;
            $rig_disposition->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Rig Disposition');
            //Audit Logging
            $this->log_audit_trail($request, 'Rig Disposition', 'Added Record');
        }

        if ($rig_disposition->save()) {
            return new WARRigDispositionResource($rig_disposition);
        }
    }

    public function uploadRigDisposition(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK DRILLING
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARRigDisposition::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'active_rig' => $row['C'],
                        'statcked_rig' => $row['D'],
                        'rig_on_standby' => $row['E'],
                        'total_rig' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Rig Disposition');
            //Audit Logging
            $this->log_audit_trail($request, 'Rig Disposition', 'Updated Record');

            $rig_dispositions = \App\WARRigDisposition::orderBy('id', 'desc')->paginate(15);

            return WARRigDispositionResource::collection($rig_dispositions);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexFDPApplication(Request $request)
    {
        //
        if ($request->filled('all')) {
            $fdp_applications = \App\WARFDPApplication::orderBy('id', 'desc')->get();

            return ['data'=>$fdp_applications];
        } else {
            $fdp_applications = \App\WARFDPApplication::orderBy('id', 'desc')->paginate(15);

            return WARFDPApplicationResource::collection($fdp_applications);
        }
    }

    public function AddFDPApplication(Request $request)
    {
        $fdp_application = $request->isMethod('put') ? \App\WARFDPApplication::findOrFail($request->fdp_application_id) : new \App\WARFDPApplication;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $fdp_application->id = $request->fdp_application_id;
            $fdp_application->date = date('Y-m-d', strtotime($request->date));
            $fdp_application->week = $request->week;
            $fdp_application->application_received = $request->application_received;
            $fdp_application->application_approved = $request->application_approved;
            $fdp_application->production_rate = $request->production_rate;
            $fdp_application->expected_reserve = $request->expected_reserve;
            $fdp_application->total_cost = $request->total_cost;

            //send mail
            $this->send_all_mail($request, 'Upstream - FDP application');
            //Audit Logging
            $this->log_audit_trail($request, 'FDP application', 'Updated Record');
        } else {
            // $fdp_application->id = $request->fdp_application_id;
            $fdp_application->date = date('Y-m-d', strtotime($request->date));
            $fdp_application->week = $request->week;
            $fdp_application->application_received = $request->application_received;
            $fdp_application->application_approved = $request->application_approved;
            $fdp_application->production_rate = $request->production_rate;
            $fdp_application->expected_reserve = $request->expected_reserve;
            $fdp_application->total_cost = $request->total_cost;
            $fdp_application->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - FDP application');
            //Audit Logging
            $this->log_audit_trail($request, 'FDP application', 'Added Record');
        }

        if ($fdp_application->save()) {
            return new WARFDPApplicationResource($fdp_application);
        }
    }

    public function uploadFDPApplication(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK DRILLING
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARFDPApplication::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'application_received' => $row['C'],
                        'application_approved' => $row['D'],
                        'production_rate' => $row['E'],
                        'expected_reserve' => $row['F'],
                        'total_cost' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - FDP application');
            //Audit Logging
            $this->log_audit_trail($request, 'FDP application', 'Bulk Data Upload');

            $fdp_applications = \App\WARFDPApplication::orderBy('id', 'desc')->paginate(15);

            return WARFDPApplicationResource::collection($fdp_applications);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexDepletionRate(Request $request)
    {
        //
        if ($request->filled('all')) {
            $depletion_rates = \App\WARDepletionRate::orderBy('id', 'desc')->get();

            return ['data'=>$depletion_rates];
        } else {
            $depletion_rates = \App\WARDepletionRate::orderBy('id', 'desc')->paginate(15);

            return WARDepletionRateResource::collection($depletion_rates);
        }
    }

    public function AddDepletionRate(Request $request)
    {
        $depletion_rate = $request->isMethod('put') ? \App\WARDepletionRate::findOrFail($request->depletion_rate_id) : new \App\WARDepletionRate;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $depletion_rate->id = $request->depletion_rate_id;
            $depletion_rate->date = date('Y-m-d', strtotime($request->date));
            $depletion_rate->week = $request->week;
            $depletion_rate->annual_production_oil = $request->annual_production_oil;
            $depletion_rate->annual_production_condensate = $request->annual_production_condensate;
            $depletion_rate->depletion_rate_oil = $request->depletion_rate_oil;
            $depletion_rate->depletion_rate_condensate = $request->depletion_rate_condensate;
            $depletion_rate->year_start_reserve_oil = $request->year_start_reserve_oil;
            $depletion_rate->year_start_reserve_condensate = $request->year_start_reserve_condensate;
            $depletion_rate->life_index_oil = $request->life_index_oil;
            $depletion_rate->life_index_condensate = $request->life_index_condensate;

            //send mail
            $this->send_all_mail($request, 'Upstream - Depletion Rate');
            //Audit Logging
            $this->log_audit_trail($request, 'Depletion Rate', 'Updated Record');
        } else {
            // $depletion_rate->id = $request->depletion_rate_id;
            $depletion_rate->date = date('Y-m-d', strtotime($request->date));
            $depletion_rate->week = $request->week;
            $depletion_rate->annual_production_oil = $request->annual_production_oil;
            $depletion_rate->annual_production_condensate = $request->annual_production_condensate;
            $depletion_rate->depletion_rate_oil = $request->depletion_rate_oil;
            $depletion_rate->depletion_rate_condensate = $request->depletion_rate_condensate;
            $depletion_rate->year_start_reserve_oil = $request->year_start_reserve_oil;
            $depletion_rate->year_start_reserve_condensate = $request->year_start_reserve_condensate;
            $depletion_rate->life_index_oil = $request->life_index_oil;
            $depletion_rate->life_index_condensate = $request->life_index_condensate;
            $depletion_rate->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Depletion Rate');
            //Audit Logging
            $this->log_audit_trail($request, 'Depletion Rate', 'Added Record');
        }

        if ($depletion_rate->save()) {
            return new WARDepletionRateResource($depletion_rate);
        }
    }

    public function uploadDepletionRate(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK DRILLING
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARDepletionRate::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'annual_production_oil' => $row['C'],
                        'annual_production_condensate' => $row['D'],
                        'depletion_rate_oil' => $row['E'],
                        'depletion_rate_condensate' => $row['F'],
                        'year_start_reserve_oil' => $row['G'],
                        'year_start_reserve_condensate' => $row['H'],
                        'life_index_oil' => $row['I'],
                        'life_index_condensate' => $row['J'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Depletion Rate');
            //Audit Logging
            $this->log_audit_trail($request, 'Depletion Rate', 'Bulk Data Upload');

            $depletion_rates = \App\WARDepletionRate::orderBy('id', 'desc')->paginate(15);

            return WARDepletionRateResource::collection($depletion_rates);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexCrudeOilProduction(Request $request)
    {
        //
        if ($request->filled('all')) {
            $crude_oil_productions = \App\WARCrudeOilProduction::orderBy('id', 'desc')->get();

            return ['data'=>$crude_oil_productions];
        } else {
            $crude_oil_productions = \App\WARCrudeOilProduction::orderBy('id', 'desc')->paginate(15);

            return WARCrudeOilProductionResource::collection($crude_oil_productions);
        }
    }

    public function AddCrudeOilProduction(Request $request)
    {
        $crude_oil_production = $request->isMethod('put') ? \App\WARCrudeOilProduction::findOrFail($request->crude_oil_production_id) : new \App\WARCrudeOilProduction;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $crude_oil_production->id = $request->crude_oil_production_id;
            $crude_oil_production->date = date('Y-m-d', strtotime($request->date));
            $crude_oil_production->week = $request->week;
            $crude_oil_production->avg_oil_condensate_production = $request->avg_oil_condensate_production;
            $crude_oil_production->deferment = $request->deferment;
            $crude_oil_production->producing_companies = $request->producing_companies;
            $crude_oil_production->producing_field = $request->producing_field;
            $crude_oil_production->shut_in_field = $request->shut_in_field;

            //send mail
            $this->send_all_mail($request, 'Upstream - Crude Oil Prod');
            //Audit Logging
            $this->log_audit_trail($request, 'Crude Oil Prod', 'Updated Record');
        } else {
            // $depletion_rate->id = $request->depletion_rate_id;
            $crude_oil_production->date = date('Y-m-d', strtotime($request->date));
            $crude_oil_production->week = $request->week;
            $crude_oil_production->avg_oil_condensate_production = $request->avg_oil_condensate_production;
            $crude_oil_production->deferment = $request->deferment;
            $crude_oil_production->producing_companies = $request->producing_companies;
            $crude_oil_production->producing_field = $request->producing_field;
            $crude_oil_production->shut_in_field = $request->shut_in_field;
            $crude_oil_production->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Crude Oil Prod');
            //Audit Logging
            $this->log_audit_trail($request, 'Crude Oil Prod', 'Added Record');
        }

        if ($crude_oil_production->save()) {
            return new WARCrudeOilProductionResource($crude_oil_production);
        }
    }

    public function uploadCrudeOilProduction(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK DRILLING
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARCrudeOilProduction::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'avg_oil_condensate_production' => $row['C'],
                        'deferment' => $row['D'],
                        'producing_companies' => $row['E'],
                        'producing_field' => $row['F'],
                        'shut_in_field' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Crude Oil Prod');
            //Audit Logging
            $this->log_audit_trail($request, 'Crude Oil Prod', 'Updated Record');

            $crude_oil_productions = \App\WARCrudeOilProduction::orderBy('id', 'desc')->paginate(15);

            return WARCrudeOilProductionResource::collection($crude_oil_productions);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexRevenueGenerated(Request $request)
    {
        //
        if ($request->filled('all')) {
            $revenue_generateds = \App\WARRevenueGenerated::orderBy('id', 'desc')->get();

            return ['data'=>$revenue_generateds];
        } else {
            $revenue_generateds = \App\WARRevenueGenerated::orderBy('id', 'desc')->paginate(15);

            return WARRevenueGeneratedResource::collection($revenue_generateds);
        }
    }

    public function AddRevenueGenerated(Request $request)
    {
        $revenue_generated = $request->isMethod('put') ? \App\WARRevenueGenerated::findOrFail($request->revenue_generated_id) : new \App\WARRevenueGenerated;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $revenue_generated->id = $request->revenue_generated_id;
            $revenue_generated->date = date('Y-m-d', strtotime($request->date));
            $revenue_generated->week = $request->week;
            $revenue_generated->revenue_generated = $request->revenue_generated;

            //send mail
            $this->send_all_mail($request, 'Upstream - Revenue Generated');
            //Audit Logging
            $this->log_audit_trail($request, 'Revenue Generated', 'Updated Record');
        } else {
            // $revenue_generated->id = $request->depletion_rate_id;
            $revenue_generated->date = date('Y-m-d', strtotime($request->date));
            $revenue_generated->week = $request->week;
            $revenue_generated->revenue_generated = $request->revenue_generated;
            $revenue_generated->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Revenue Generated');
            //Audit Logging
            $this->log_audit_trail($request, 'Revenue Generated', 'Added Record');
        }

        if ($revenue_generated->save()) {
            return new WARRevenueGeneratedResource($revenue_generated);
        }
    }

    public function uploadRevenueGenerated(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK DRILLING
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARRevenueGenerated::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'revenue_generated' => $row['C'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Revenue Generated');
            //Audit Logging
            $this->log_audit_trail($request, 'Revenue Generated', 'Bulk Data Upload');

            $revenue_generateds = \App\WARRevenueGenerated::orderBy('id', 'desc')->paginate(15);

            return WARRevenueGeneratedResource::collection($revenue_generateds);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexUnitization(Request $request)
    {
        //
        if ($request->filled('all')) {
            $unitizations = \App\WARUnitization::orderBy('id', 'desc')->get();

            return ['data'=>$unitizations];
        } else {
            $unitizations = \App\WARUnitization::orderBy('id', 'desc')->paginate(15);

            return WARUnitizationResource::collection($unitizations);
        }
    }

    public function AddUnitization(Request $request)
    {
        $unitization = $request->isMethod('put') ? \App\WARUnitization::findOrFail($request->unitization_id) : new \App\WARUnitization;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $unitization->id = $request->unitization_id;
            $unitization->date = date('Y-m-d', strtotime($request->date));
            $unitization->week = $request->week;
            $unitization->unitized_field = $request->unitized_field;

            //send mail
            $this->send_all_mail($request, 'Upstream - Unitization');
            //Audit Logging
            $this->log_audit_trail($request, 'Unitization', 'Updated Record');
        } else {
            // $unitization->id = $request->unitization_id;
            $unitization->date = date('Y-m-d', strtotime($request->date));
            $unitization->week = $request->week;
            $unitization->unitized_field = $request->unitized_field;
            $unitization->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Upstream - Unitization');
            //Audit Logging
            $this->log_audit_trail($request, 'Unitization', 'Added Record');
        }

        if ($unitization->save()) {
            return new WARUnitizationResource($unitization);
        }
    }

    public function uploadUnitization(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    //INSERTING BULK DRILLING
                    $day = Carbon::createFromFormat('m/d/Y', $row['A'])->format('Y-m-d');
                    $uploaded = \App\WARUnitization::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'unitized_field' => $row['C'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Upstream - Unitization');
            //Audit Logging
            $this->log_audit_trail($request, 'Unitization', 'Bulk Data Upload');

            $unitizations = \App\WARUnitization::orderBy('id', 'desc')->paginate(15);

            return WARUnitizationResource::collection($unitizations);
        } catch (\Exception $e) {
            return $e;
        }
    }

    //
    private function decodeExcelRawData($raw)
    {
        $r = explode($this->delimiter, $raw);
        // dd($r);
        // echo count($r);
        // dd($r);
        if (count($r) > 1 && empty($r[0])) {
            $r = $r[1];
            $binary = base64_decode($r);
            $bin = [];
            $binary = explode("\n", $binary);
            foreach ($binary as $bin_) {
                $bin[] = str_getcsv($bin_);
            }
            unset($bin[count($bin) - 1]);

            $columns = $bin[0];
            unset($bin[0]);
            $data = [];
            $refined = [];

            foreach ($bin as $bin_) {
                foreach ($columns as $k=>$col) {
                    $data[$col] = $bin_[$k];
                }
                $refined[] = $data;
                $data = []; //reset data here.
            }

            return $refined;
        } else {
            return [];
        }
    }

    public function indexUpstreamMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'acquisition':
                return $this->getMonthlyUpstreamReportAquisition($request);
            break;

            case 'drilling':
                return $this->getMonthlyUpstreamReportDrilling($request);
            break;

            case 're_entry':
                return $this->getMonthlyUpstreamReportReEntry($request);
            break;

            case 'rig':
                return $this->getMonthlyUpstreamReportRig($request);
            break;

            case 'fdp':
                return $this->getMonthlyUpstreamReportFDP($request);
            break;

            case 'depletion':
                return $this->getMonthlyUpstreamReportDepletion($request);
            break;

            case 'crude_oil':
                return $this->getMonthlyUpstreamReportCrudeOil($request);
            break;

            case 'revenue':
                return $this->getMonthlyUpstreamReportRevenue($request);
            break;

            case 'unitization':
                return $this->getMonthlyUpstreamReportUnitization($request);
            break;

            default:
                return $this->getMonthlyUpstreamReportAquisition($request);
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

    public function getMonthlyUpstreamReportAquisition(Request $request)
    {
        $data = ['seismic_data_acquired'=>'Siesmic data quantum acquired - 3D Kms',
            'cumulative_seismic_acquired'=>'Cumulative Siesmic Acquired - 3D Kms',
            'annual_seismic_acquisition'=>'Annual seismic aquisation target - 3D Kms',
            'seismic_data_processed'=>'Siesmic data Quantum Processed - 3D Kms',
        ];

        return $this->getMonthlyData($request, $data, \App\WARAcquisition::class);
    }

    public function getMonthlyUpstreamReportDrilling(Request $request)
    {
        $data = ['exploration_commenced'=>'Exploration Drilling Commenced',
            'exploration_ongoing'=>'Exploration Drilling Ongoing',
            'exploration_completed'=>'Exploration Drilling Completed',
            'appraisal_commenced'=>'Appraisal Drilling Commenced',
            'appraisal_ongoing'=>'Appraisal Drilling Ongoing',
            'appraisal_completed'=>'Appraisal Drilling Completed',
            'development_commenced'=>'Development Drilling Commenced',
            'development_ongoing'=>'Development Drilling Ongoing',
            'development_completed'=>'Development Drilling Completed',
            'well_completion'=>'Well Completion',
            'well_spudded'=>'Well Spudded',
            'drilling_rig'=>'Drilling Rig',
        ];

        return $this->getMonthlyData($request, $data, \App\WARWellDrilling::class);
    }

    public function getMonthlyUpstreamReportReEntry(Request $request)
    {
        $data = ['re_entry_commenced'=>'Well re_entry Commenced',
            're_entry_ongoing'=>'Well re_entry Ongoing',
            're_entry_completed'=>'Well re_entry Completed',
            'workover_commenced'=>'Well re_entry Commenced',
            'workover_ongoing'=>'Well re_entry Ongoing',
            'workover_completed'=>'Well re_entry Completed',
            're_entry_completion'=>'Well re_entry Completion',
            're_entry_workover'=>'Well re_entry Workover',
            're_entry_reserve_addition'=>'Well re_entry Reserve Addition (MMBO)',
            'well_expected_rate'=>'Well Expected Rate (Bopd)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARReEntry::class);
    }

    public function getMonthlyUpstreamReportRig(Request $request)
    {
        $data = ['active_rig'=>'No. of Active Rigs',
            'statcked_rig'=>'No. of Stacked Rigs',
            'rig_on_standby'=>'No. of Rigs on Standby',
            'total_rig'=>'Total no of Rigs',
        ];

        return $this->getMonthlyData($request, $data, \App\WARRigDisposition::class);
    }

    public function getMonthlyUpstreamReportFDP(Request $request)
    {
        $data = ['application_received'=>'FDP applications Received',
            'application_approved'=>'FDP applications Approved',
            'production_rate'=>'Anticipated production Rate(BOPD)',
            'expected_reserve'=>'Expected Reserve(MMSTB)',
            'total_cost'=>'Total cost (MM$)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARFDPApplication::class);
    }

    public function getMonthlyUpstreamReportDepletion(Request $request)
    {
        $date = date('Y');
        $oil = 'Reserves as at '.$date.' Oil(MMB)';
        $con = 'Reserves as at '.$date.' Condensate(MMB)';
        $data = ['annual_production_oil'=>'Estimated annual production-Oil(MMB)',
            'annual_production_condensate'=>'Estimated annual production-Condensate(MMB)',
            'depletion_rate_oil'=>'Depletion Rate-Oil (%)',
            'depletion_rate_condensate'=>'Depletion Rate-Condensate (%)',
            'year_start_reserve_oil'=>$oil,
            'year_start_reserve_condensate'=> $con,
            'life_index_oil'=>'Life Index-Oil(Years)',
            'life_index_condensate'=>'Life Index-Condensate(Years)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDepletionRate::class);
    }

    public function getMonthlyUpstreamReportCrudeOil(Request $request)
    {
        $data = ['avg_oil_condensate_production'=>'No of Avg Oil & Condensate Prod(BOPD)',
            'deferment'=>'No of Deferment (BOPD)',
            'producing_companies'=>'No of Producing Companies',
            'producing_field'=>'No of Producing Fields',
            'shut_in_field'=>'No of Shut-in Fields',
        ];

        return $this->getMonthlyData($request, $data, \App\WARCrudeOilProduction::class);
    }

    public function getMonthlyUpstreamReportRevenue(Request $request)
    {
        $data = ['revenue_generated'=>'Amount of Revenue generated from Proposal/request(N)'];

        return $this->getMonthlyData($request, $data, \App\WARRevenueGenerated::class);
    }

    public function getMonthlyUpstreamReportUnitization(Request $request)
    {
        $data = ['unitized_field'=>'No of unitized fields'];

        return $this->getMonthlyData($request, $data, \App\WARUnitization::class);
    }
}
