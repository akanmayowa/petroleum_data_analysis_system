<?php

namespace App\Http\Controllers;

use App\Http\Resources\WARDownstreamDepotApplication as WARDownstreamDepotApplicationResource;
use App\Http\Resources\WARDownstreamDepotStock as WARDownstreamDepotStockResource;
use App\Http\Resources\WARDownstreamLicense as WARDownstreamLicenseResource;
use App\Http\Resources\WARDownstreamProductImport as WARDownstreamProductImportResource;
use App\Http\Resources\WARDownstreamRefineryKRPC as WARDownstreamRefineryKRPCResource;
use App\Http\Resources\WARDownstreamRefineryPerformanceUtilization as WARDownstreamRefineryPerformanceUtilizationResource;
use App\Http\Resources\WARDownstreamRefineryPerformanceUtilizationTotal as WARDownstreamRefineryPerformanceUtilizationTotalResource;
use App\Http\Resources\WARDownstreamRefineryPHRC as WARDownstreamRefineryPHRCResource;
use App\Http\Resources\WARDownstreamRefineryTotal as WARDownstreamRefineryTotalResource;
use App\Http\Resources\WARDownstreamRefineryWRPC as WARDownstreamRefineryWRPCResource;
use App\Http\Resources\WARDownstreamRomApplication as WARDownstreamRomApplicationResource;
use App\Http\Resources\WARDownstreamSurveillance as WARDownstreamSurveillanceResource;
use App\Http\Resources\WARDownstreamTerminalOperation as WARDownstreamTerminalOperationResource;
use App\Http\Resources\WARDownstreamTerminalOperationApplication as WARDownstreamTerminalOperationApplicationResource;
use App\Http\Resources\WARDownstreamTruckOut as WARDownstreamTruckOutResource;
use App\Http\Resources\WARDownstreamTruckOutMarketer as WARDownstreamTruckOutMarketerResource;
use App\Notifications\emailNOGIARManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WARDownstreamController extends Controller
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
            case 'downstream_rom_application':
                return $this->AddDownstreamRomApplication($request);
            break;

            case 'downstream_license':
                return $this->AddDownstreamLicense($request);
            break;

            case 'downstream_surveillance':
                return $this->AddDownstreamSurveillance($request);
            break;

            case 'downstream_depot_stock':
                return $this->AddDownstreamDepotStock($request);
            break;

            case 'downstream_product_import':
                return $this->AddDownstreamProductImport($request);
            break;

            case 'downstream_refinery_krpc':
                return $this->AddDownstreamRefineryKRPC($request);
            break;

            case 'downstream_refinery_wrpc':
                return $this->AddDownstreamRefineryWRPC($request);
            break;

            case 'downstream_refinery_phrc':
                return $this->AddDownstreamRefineryPHRC($request);
            break;

            case 'downstream_refinery_performance_utilization':
                return $this->AddDownstreamRefineryPerformanceUtilization($request);
            break;

            case 'downstream_truck_out':
                return $this->AddDownstreamTruckOut($request);
            break;

            case 'downstream_truck_out_marketer':
                return $this->AddDownstreamTruckOutMarketer($request);
            break;

            case 'downstream_depot_application':
                return $this->AddDownstreamDepotApplication($request);
            break;

            case 'downstream_terminal_operation':
                return $this->AddDownstreamTerminalOperation($request);
            break;

            case 'downstream_terminal_operation_application':
                return $this->AddDownstreamTerminalOperationApplication($request);
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
            case 'downstream_rom_application':
                $downstream_rom_application = \App\WARDownstreamRomApplication::findOrFail($id);

                return new WARDownstreamRomApplicationResource($downstream_rom_application);
            break;

            case 'downstream_license':
                $downstream_license = \App\WARDownstreamLicense::findOrFail($id);

                return new WARDownstreamLicenseResource($downstream_license);
            break;

            case 'downstream_surveillance':
                $downstream_surveillance = \App\WARDownstreamSurveillance::findOrFail($id);

                return new WARDownstreamSurveillanceResource($downstream_surveillance);
            break;

            case 'downstream_depot_stock':
                $downstream_depot_stock = \App\WARDownstreamDepotStock::findOrFail($id);

                return new WARDownstreamDepotStockResource($downstream_depot_stock);
            break;

            case 'downstream_product_import':
                $downstream_product_import = \App\WARDownstreamProductImport::findOrFail($id);

                return new WARDownstreamProductImportResource($downstream_product_import);
            break;

            case 'downstream_refinery_krpc':
                $downstream_refinery_krpc = \App\WARDownstreamRefineryKRPC::findOrFail($id);

                return new WARDownstreamRefineryKRPCResource($downstream_refinery_krpc);
            break;

            case 'downstream_refinery_wrpc':
                $downstream_refinery_wrpc = \App\WARDownstreamRefineryWRPC::findOrFail($id);

                return new WARDownstreamRefineryWRPCResource($downstream_refinery_wrpc);
            break;

            case 'downstream_refinery_phrc':
                $downstream_refinery_phrc = \App\WARDownstreamRefineryPHRC::findOrFail($id);

                return new WARDownstreamRefineryPHRCResource($downstream_refinery_phrc);
            break;

            case 'downstream_refinery_performance_utilization':
                $downstream_refinery_performance_utilization = \App\WARDownstreamRefineryPerformanceUtilization::findOrFail($id);

                return new WARDownstreamRefineryPerformanceUtilizationResource($downstream_refinery_performance_utilization);
            break;

            case 'downstream_truck_out':
                $downstream_truck_out = \App\WARDownstreamTruckOut::findOrFail($id);

                return new WARDownstreamTruckOutResource($downstream_truck_out);
            break;

            case 'downstream_truck_out_marketer':
                $downstream_truck_out_marketer = \App\WARDownstreamTruckOutMarketer::findOrFail($id);

                return new WARDownstreamTruckOutMarketerResource($downstream_truck_out_marketer);
            break;

            case 'downstream_depot_application':
                $downstream_depot_application = \App\WARDownstreamDepotApplication::findOrFail($id);

                return new WARDownstreamDepotApplicationResource($downstream_depot_application);
            break;

            case 'downstream_terminal_operation':
                $downstream_terminal_operation = \App\WARDownstreamTerminalOperation::findOrFail($id);

                return new WARDownstreamTerminalOperationResource($downstream_terminal_operation);
            break;

            case 'downstream_terminal_operation_application':
                $downstream_terminal_operation_application = \App\WARDownstreamTerminalOperationApplication::findOrFail($id);

                return new WARDownstreamTerminalOperationApplicationResource($downstream_terminal_operation_application);
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
            case 'downstream_rom_application':
                $downstream_rom_application = \App\WARDownstreamRomApplication::findOrFail($id);
                if ($downstream_rom_application->delete()) {
                    return new WARDownstreamRomApplicationResource($downstream_rom_application);
                }
            break;

            case 'downstream_license':
                $downstream_license = \App\WARDownstreamLicense::findOrFail($id);
                if ($downstream_license->delete()) {
                    return new WARDownstreamLicenseResource($downstream_license);
                }
            break;

            case 'downstream_surveillance':
                $downstream_surveillance = \App\WARDownstreamSurveillance::findOrFail($id);
                if ($downstream_surveillance->delete()) {
                    return new WARDownstreamSurveillanceResource($downstream_surveillance);
                }
            break;

            case 'downstream_depot_stock':
                $downstream_depot_stock = \App\WARDownstreamDepotStock::findOrFail($id);
                if ($downstream_depot_stock->delete()) {
                    return new WARDownstreamDepotStockResource($downstream_depot_stock);
                }
            break;

            case 'downstream_product_import':
                $downstream_product_import = \App\WARDownstreamProductImport::findOrFail($id);
                if ($downstream_product_import->delete()) {
                    return new WARDownstreamProductImportResource($downstream_product_import);
                }
            break;

            case 'downstream_refinery_krpc':
                $downstream_refinery_krpc = \App\WARDownstreamRefineryKRPC::findOrFail($id);
                if ($downstream_refinery_krpc->delete()) {
                    return new WARDownstreamRefineryKRPCResource($downstream_refinery_krpc);
                }
            break;

            case 'downstream_refinery_wrpc':
                $downstream_refinery_wrpc = \App\WARDownstreamRefineryWRPC::findOrFail($id);
                if ($downstream_refinery_wrpc->delete()) {
                    return new WARDownstreamRefineryWRPCResource($downstream_refinery_wrpc);
                }
            break;

            case 'downstream_refinery_phrc':
                $downstream_refinery_phrc = \App\WARDownstreamRefineryPHRC::findOrFail($id);
                if ($downstream_refinery_phrc->delete()) {
                    return new WARDownstreamRefineryPHRCResource($downstream_refinery_phrc);
                }
            break;

            case 'downstream_refinery_performance_utilization':
                $downstream_refinery_performance_utilization = \App\WARDownstreamRefineryPerformanceUtilization::findOrFail($id);
                if ($downstream_refinery_performance_utilization->delete()) {
                    return new WARDownstreamRefineryPerformanceUtilizationResource($downstream_refinery_performance_utilization);
                }
            break;

            case 'downstream_truck_out':
                $downstream_truck_out = \App\WARDownstreamTruckOut::findOrFail($id);
                if ($downstream_truck_out->delete()) {
                    return new WARDownstreamTruckOutResource($downstream_truck_out);
                }
            break;

            case 'downstream_truck_out_marketer':
                $downstream_truck_out_marketer = \App\WARDownstreamTruckOutMarketer::findOrFail($id);
                if ($downstream_truck_out_marketer->delete()) {
                    return new WARDownstreamTruckOutMarketerResource($downstream_truck_out_marketer);
                }
            break;

            case 'downstream_depot_application':
                $downstream_depot_application = \App\WARDownstreamDepotApplication::findOrFail($id);
                if ($downstream_depot_application->delete()) {
                    return new WARDownstreamDepotApplicationResource($downstream_depot_application);
                }
            break;

            case 'downstream_terminal_operation':
                $downstream_terminal_operation = \App\WARDownstreamTerminalOperation::findOrFail($id);
                if ($downstream_terminal_operation->delete()) {
                    return new WARDownstreamTerminalOperationResource($downstream_terminal_operation);
                }
            break;

            case 'downstream_terminal_operation_application':
                $downstream_terminal_operation_application = \App\WARDownstreamTerminalOperationApplication::findOrFail($id);
                if ($downstream_terminal_operation_application->delete()) {
                    return new WARDownstreamTerminalOperationApplicationResource($downstream_terminal_operation_application);
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
            case 'rom_application':
                return $this->uploadRomApplication($request);
            break;

            case 'license':
                return $this->uploadLicense($request);
            break;

            case 'surveillance':
                return $this->uploadSurvillance($request);
            break;

            case 'depot_stock':
                return $this->uploadDepotStock($request);
            break;

            case 'product_import':
                return $this->uploadProductImport($request);
            break;

            case 'refinery_krpc':
                return $this->uploadRefineryKRPC($request);
            break;

            case 'refinery_wrpc':
                return $this->uploadRefineryWRPC($request);
            break;

            case 'refinery_phrc_old':
                return $this->uploadRefineryPHRCOld($request);
            break;

            case 'refinery_phrc_new':
                return $this->uploadRefineryPHRCNew($request);
            break;

            case 'refinery_performance_utilization':
                return $this->uploadUtilization($request);
            break;

            case 'truck_out':
                return $this->uploadTruckOut($request);
            break;

            case 'truck_out_marketer':
                return $this->uploadMerketSegment($request);
            break;

            case 'depot_application':
                return $this->uploadDepotApplication($request);
            break;

            case 'terminal_operation':
                return $this->uploadTerminalOperation($request);
            break;

            case 'terminal_operation_application':
                return $this->uploadTerminalOperationApplication($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function indexRomApplication(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_rom_applications = \App\WARDownstreamRomApplication::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_rom_applications];
        } else {
            $downstream_rom_applications = \App\WARDownstreamRomApplication::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRomApplicationResource::collection($downstream_rom_applications);
        }
    }

    public function AddDownstreamRomApplication(Request $request)
    {
        $downstream_rom_application = $request->isMethod('put') ? \App\WARDownstreamRomApplication::findOrFail($request->downstream_rom_application_id) : new \App\WARDownstreamRomApplication;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_rom_application->id = $request->downstream_rom_application_id;
            $downstream_rom_application->date = date('Y-m-d', strtotime($request->date));
            $downstream_rom_application->week = $request->week;
            $downstream_rom_application->suitability_inspection_received = $request->suitability_inspection_received;
            $downstream_rom_application->suitability_inspection_approved = $request->suitability_inspection_approved;
            $downstream_rom_application->atc_received = $request->atc_received;
            $downstream_rom_application->atc_approved = $request->atc_approved;
            $downstream_rom_application->pressure_test_received = $request->pressure_test_received;
            $downstream_rom_application->pressure_test_approved = $request->pressure_test_approved;
            $downstream_rom_application->tank_buried_received = $request->tank_buried_received;
            $downstream_rom_application->tank_buried_approved = $request->tank_buried_approved;
            $downstream_rom_application->leak_detection_received = $request->leak_detection_received;
            $downstream_rom_application->leak_detection_approved = $request->leak_detection_approved;
            $downstream_rom_application->final_inspection_received = $request->final_inspection_received;
            $downstream_rom_application->final_inspection_approved = $request->final_inspection_approved;
            $downstream_rom_application->renewal_inspection_received = $request->renewal_inspection_received;
            $downstream_rom_application->renewal_inspection_approved = $request->renewal_inspection_approved;
            $downstream_rom_application->vessel_license_received = $request->vessel_license_received;
            $downstream_rom_application->vessel_license_approved = $request->vessel_license_approved;

            //send mail
            $this->send_all_mail($request, 'Downstream - ROM Application');
            //Audit Logging
            $this->log_audit_trail($request, 'ROM Application', 'Updated Record');
        } else {
            // $downstream_rom_application->id = $request->downstream_rom_application_id;
            $downstream_rom_application->date = date('Y-m-d', strtotime($request->date));
            $downstream_rom_application->week = $request->week;
            $downstream_rom_application->suitability_inspection_received = $request->suitability_inspection_received;
            $downstream_rom_application->suitability_inspection_approved = $request->suitability_inspection_approved;
            $downstream_rom_application->atc_received = $request->atc_received;
            $downstream_rom_application->atc_approved = $request->atc_approved;
            $downstream_rom_application->pressure_test_received = $request->pressure_test_received;
            $downstream_rom_application->pressure_test_approved = $request->pressure_test_approved;
            $downstream_rom_application->tank_buried_received = $request->tank_buried_received;
            $downstream_rom_application->tank_buried_approved = $request->tank_buried_approved;
            $downstream_rom_application->leak_detection_received = $request->leak_detection_received;
            $downstream_rom_application->leak_detection_approved = $request->leak_detection_approved;
            $downstream_rom_application->final_inspection_received = $request->final_inspection_received;
            $downstream_rom_application->final_inspection_approved = $request->final_inspection_approved;
            $downstream_rom_application->renewal_inspection_received = $request->renewal_inspection_received;
            $downstream_rom_application->renewal_inspection_approved = $request->renewal_inspection_approved;
            $downstream_rom_application->vessel_license_received = $request->vessel_license_received;
            $downstream_rom_application->vessel_license_approved = $request->vessel_license_approved;
            $downstream_rom_application->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - ROM Application');
            //Audit Logging
            $this->log_audit_trail($request, 'ROM Application', 'Added Record');
        }

        if ($downstream_rom_application->save()) {
            return new WARDownstreamRomApplicationResource($downstream_rom_application);
        }
    }

    public function uploadRomApplication(Request $request)
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
                    $uploaded = \App\WARDownstreamRomApplication::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'suitability_inspection_received' => $row['C'],
                        'suitability_inspection_approved' => $row['D'],
                        'atc_received' => $row['E'],
                        'atc_approved' => $row['F'],
                        'pressure_test_received' => $row['G'],
                        'pressure_test_approved' => $row['H'],
                        'tank_buried_received' => $row['I'],
                        'tank_buried_approved' => $row['J'],
                        'leak_detection_received' => $row['K'],
                        'leak_detection_approved' => $row['L'],
                        'final_inspection_received' => $row['M'],
                        'final_inspection_approved' => $row['N'],
                        'renewal_inspection_received' => $row['O'],
                        'renewal_inspection_approved' => $row['P'],
                        'vessel_license_received' => $row['Q'],
                        'vessel_license_approved' => $row['R'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - ROM Application');
            //Audit Logging
            $this->log_audit_trail($request, 'ROM Application', 'Bulk Data Upload');

            $downstream_rom_applications = \App\WARDownstreamRomApplication::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRomApplicationResource::collection($downstream_rom_applications);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexLicense(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_licenses = \App\WARDownstreamLicense::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_licenses];
        } else {
            $downstream_licenses = \App\WARDownstreamLicense::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamLicenseResource::collection($downstream_licenses);
        }
    }

    public function AddDownstreamLicense(Request $request)
    {
        $downstream_license = $request->isMethod('put') ? \App\WARDownstreamLicense::findOrFail($request->downstream_license_id) : new \App\WARDownstreamLicense;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_license->id = $request->downstream_license_id;
            $downstream_license->date = date('Y-m-d', strtotime($request->date));
            $downstream_license->week = $request->week;
            $downstream_license->category_a_new = $request->category_a_new;
            $downstream_license->category_a_renewal = $request->category_a_renewal;
            $downstream_license->category_b_new = $request->category_b_new;
            $downstream_license->category_b_renewal = $request->category_b_renewal;
            $downstream_license->category_c_new = $request->category_c_new;
            $downstream_license->category_c_renewal = $request->category_c_renewal;
            $downstream_license->total_cat_a = $request->total_cat_a;
            $downstream_license->total_cat_b = $request->total_cat_b;
            $downstream_license->total_cat_c = $request->total_cat_c;

            //send mail
            $this->send_all_mail($request, 'Downstream - License');
            //Audit Logging
            $this->log_audit_trail($request, 'License', 'Updated Record');
        } else {
            // $downstream_license->id = $request->downstream_license_id;
            $downstream_license->date = date('Y-m-d', strtotime($request->date));
            $downstream_license->week = $request->week;
            $downstream_license->category_a_new = $request->category_a_new;
            $downstream_license->category_a_renewal = $request->category_a_renewal;
            $downstream_license->category_b_new = $request->category_b_new;
            $downstream_license->category_b_renewal = $request->category_b_renewal;
            $downstream_license->category_c_new = $request->category_c_new;
            $downstream_license->category_c_renewal = $request->category_c_renewal;
            $downstream_license->total_cat_a = $request->total_cat_a;
            $downstream_license->total_cat_b = $request->total_cat_b;
            $downstream_license->total_cat_c = $request->total_cat_c;
            $downstream_license->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - License');
            //Audit Logging
            $this->log_audit_trail($request, 'License', 'Updated Record');
        }

        if ($downstream_license->save()) {
            return new WARDownstreamLicenseResource($downstream_license);
        }
    }

    public function uploadLicense(Request $request)
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
                    $uploaded = \App\WARDownstreamLicense::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'category_a_new' => $row['C'],
                        'category_a_renewal' => $row['D'],
                        'category_b_new' => $row['E'],
                        'category_b_renewal' => $row['F'],
                        'category_c_new' => $row['G'],
                        'category_c_renewal' => $row['H'],
                        'total_cat_a' => $row['I'],
                        'total_cat_b' => $row['J'],
                        'total_cat_c' => $row['K'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - License');
            //Audit Logging
            $this->log_audit_trail($request, 'License', 'Bulk Data Upload');

            $downstream_licenses = \App\WARDownstreamLicense::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamLicenseResource::collection($downstream_licenses);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexSurveillance(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_surveillances = \App\WARDownstreamSurveillance::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_surveillances];
        } else {
            $downstream_surveillances = \App\WARDownstreamSurveillance::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamSurveillanceResource::collection($downstream_surveillances);
        }
    }

    public function AddDownstreamSurveillance(Request $request)
    {
        $downstream_surveillance = $request->isMethod('put') ? \App\WARDownstreamSurveillance::findOrFail($request->downstream_surveillance_id) : new \App\WARDownstreamSurveillance;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_surveillance->id = $request->downstream_surveillance_id;
            $downstream_surveillance->date = date('Y-m-d', strtotime($request->date));
            $downstream_surveillance->week = $request->week;
            $downstream_surveillance->station_visited = $request->station_visited;
            $downstream_surveillance->station_with_pms = $request->station_with_pms;
            $downstream_surveillance->sealed_under_dispensing = $request->sealed_under_dispensing;
            $downstream_surveillance->sealed_for_over_price = $request->sealed_for_over_price;
            $downstream_surveillance->sealed_for_hoarding = $request->sealed_for_hoarding;
            $downstream_surveillance->sealed_for_diversion = $request->sealed_for_diversion;
            $downstream_surveillance->sealed_for_violation_of_seal = $request->sealed_for_violation_of_seal;
            $downstream_surveillance->other = $request->other;
            $downstream_surveillance->total_station_sealed = $request->total_station_sealed;

            //send mail
            $this->send_all_mail($request, 'Downstream - Surveillance');
            //Audit Logging
            $this->log_audit_trail($request, 'Surveillance', 'Updated Record');
        } else {
            // $downstream_surveillance->id = $request->downstream_surveillance_id;
            $downstream_surveillance->date = date('Y-m-d', strtotime($request->date));
            $downstream_surveillance->week = $request->week;
            $downstream_surveillance->station_visited = $request->station_visited;
            $downstream_surveillance->station_with_pms = $request->station_with_pms;
            $downstream_surveillance->sealed_under_dispensing = $request->sealed_under_dispensing;
            $downstream_surveillance->sealed_for_over_price = $request->sealed_for_over_price;
            $downstream_surveillance->sealed_for_hoarding = $request->sealed_for_hoarding;
            $downstream_surveillance->sealed_for_diversion = $request->sealed_for_diversion;
            $downstream_surveillance->sealed_for_violation_of_seal = $request->sealed_for_violation_of_seal;
            $downstream_surveillance->other = $request->other;
            $downstream_surveillance->total_station_sealed = $request->total_station_sealed;
            $downstream_surveillance->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - Surveillance');
            //Audit Logging
            $this->log_audit_trail($request, 'Surveillance', 'Added Record');
        }

        if ($downstream_surveillance->save()) {
            return new WARDownstreamSurveillanceResource($downstream_surveillance);
        }
    }

    public function uploadSurvillance(Request $request)
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
                    $uploaded = \App\WARDownstreamSurveillance::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'station_visited' => $row['C'],
                        'station_with_pms' => $row['D'],
                        'sealed_under_dispensing' => $row['E'],
                        'sealed_for_over_price' => $row['F'],
                        'sealed_for_hoarding' => $row['G'],
                        'sealed_for_diversion' => $row['H'],
                        'sealed_for_violation_of_seal' => $row['I'],
                        'other' => $row['J'],
                        'total_station_sealed' => $row['K'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - ROM Application');
            //Audit Logging
            $this->log_audit_trail($request, 'ROM Application', 'Bulk Data Upload');

            $downstream_surveillances = \App\WARDownstreamSurveillance::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamSurveillanceResource::collection($downstream_surveillances);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexDepotStock(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_depot_stocks = \App\WARDownstreamDepotStock::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_depot_stocks];
        } else {
            $downstream_depot_stocks = \App\WARDownstreamDepotStock::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamDepotStockResource::collection($downstream_depot_stocks);
        }
    }

    public function AddDownstreamDepotStock(Request $request)
    {
        $downstream_depot_stock = $request->isMethod('put') ? \App\WARDownstreamDepotStock::findOrFail($request->downstream_depot_stock_id) : new \App\WARDownstreamDepotStock;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_depot_stock->id = $request->downstream_depot_stock_id;
            $downstream_depot_stock->date = date('Y-m-d', strtotime($request->date));
            $downstream_depot_stock->week = $request->week;
            $downstream_depot_stock->pms_open_stock = $request->pms_open_stock;
            $downstream_depot_stock->pms_reciept = $request->pms_reciept;
            $downstream_depot_stock->pms_lifting_transfer = $request->pms_lifting_transfer;
            $downstream_depot_stock->pms_closing_stock = $request->pms_closing_stock;
            $downstream_depot_stock->dpk_open_stock = $request->dpk_open_stock;
            $downstream_depot_stock->dpk_reciept = $request->dpk_reciept;
            $downstream_depot_stock->dpk_lifting_transfer = $request->dpk_lifting_transfer;
            $downstream_depot_stock->dpk_closing_stock = $request->dpk_closing_stock;
            $downstream_depot_stock->ago_open_stock = $request->ago_open_stock;
            $downstream_depot_stock->ago_reciept = $request->ago_reciept;
            $downstream_depot_stock->ago_lifting_transfer = $request->ago_lifting_transfer;
            $downstream_depot_stock->ago_closing_stock = $request->ago_closing_stock;

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot Stock');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot Stock', 'Updated Record');
        } else {
            // $downstream_depot_stock->id = $request->downstream_depot_stock_id;
            $downstream_depot_stock->date = date('Y-m-d', strtotime($request->date));
            $downstream_depot_stock->week = $request->week;
            $downstream_depot_stock->pms_open_stock = $request->pms_open_stock;
            $downstream_depot_stock->pms_reciept = $request->pms_reciept;
            $downstream_depot_stock->pms_lifting_transfer = $request->pms_lifting_transfer;
            $downstream_depot_stock->pms_closing_stock = $request->pms_closing_stock;
            $downstream_depot_stock->dpk_open_stock = $request->dpk_open_stock;
            $downstream_depot_stock->dpk_reciept = $request->dpk_reciept;
            $downstream_depot_stock->dpk_lifting_transfer = $request->dpk_lifting_transfer;
            $downstream_depot_stock->dpk_closing_stock = $request->dpk_closing_stock;
            $downstream_depot_stock->ago_open_stock = $request->ago_open_stock;
            $downstream_depot_stock->ago_reciept = $request->ago_reciept;
            $downstream_depot_stock->ago_lifting_transfer = $request->ago_lifting_transfer;
            $downstream_depot_stock->ago_closing_stock = $request->ago_closing_stock;
            $downstream_depot_stock->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot Stock');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot Stock', 'Added Record');
        }

        if ($downstream_depot_stock->save()) {
            return new WARDownstreamDepotStockResource($downstream_depot_stock);
        }
    }

    public function uploadDepotStock(Request $request)
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
                    $uploaded = \App\WARDownstreamDepotStock::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'pms_open_stock' => $row['C'],
                        'pms_reciept' => $row['D'],
                        'pms_lifting_transfer' => $row['E'],
                        'pms_closing_stock' => $row['F'],
                        'dpk_open_stock' => $row['G'],
                        'dpk_reciept' => $row['H'],
                        'dpk_lifting_transfer' => $row['I'],
                        'dpk_closing_stock' => $row['J'],
                        'ago_open_stock' => $row['K'],
                        'ago_reciept' => $row['L'],
                        'ago_lifting_transfer' => $row['M'],
                        'ago_closing_stock' => $row['N'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot Stock');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot Stock', 'Bulk Data Upload');

            $downstream_depot_stocks = \App\WARDownstreamDepotStock::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamDepotStockResource::collection($downstream_depot_stocks);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexProductImport(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_product_imports = \App\WARDownstreamProductImport::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_product_imports];
        } else {
            $downstream_product_imports = \App\WARDownstreamProductImport::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamProductImportResource::collection($downstream_product_imports);
        }
    }

    public function AddDownstreamProductImport(Request $request)
    {
        $downstream_product_import = $request->isMethod('put') ? \App\WARDownstreamProductImport::findOrFail($request->downstream_product_import_id) : new \App\WARDownstreamProductImport;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_product_import->id = $request->downstream_product_import_id;
            $downstream_product_import->date = date('Y-m-d', strtotime($request->date));
            $downstream_product_import->week = $request->week;
            $downstream_product_import->pms = $request->pms;
            $downstream_product_import->hhk = $request->hhk;
            $downstream_product_import->ago = $request->ago;
            $downstream_product_import->atk = $request->atk;

            //send mail
            $this->send_all_mail($request, 'Downstream - Product Import');
            //Audit Logging
            $this->log_audit_trail($request, 'Product Import', 'Updated Record');
        } else {
            // $downstream_product_import->id = $request->downstream_product_import_id;
            $downstream_product_import->date = date('Y-m-d', strtotime($request->date));
            $downstream_product_import->week = $request->week;
            $downstream_product_import->pms = $request->pms;
            $downstream_product_import->hhk = $request->hhk;
            $downstream_product_import->ago = $request->ago;
            $downstream_product_import->atk = $request->atk;
            $downstream_product_import->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - Product Import');
            //Audit Logging
            $this->log_audit_trail($request, 'Product Import', 'Added Record');
        }

        if ($downstream_product_import->save()) {
            return new WARDownstreamProductImportResource($downstream_product_import);
        }
    }

    public function uploadProductImport(Request $request)
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
                    $uploaded = \App\WARDownstreamProductImport::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'pms' => $row['C'],
                        'hhk' => $row['D'],
                        'ago' => $row['E'],
                        'atk' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Product Import');
            //Audit Logging
            $this->log_audit_trail($request, 'Product Import', 'Bulk Data Upload');

            $downstream_product_imports = \App\WARDownstreamProductImport::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamProductImportResource::collection($downstream_product_imports);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexRefineryKRPC(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_refinery_krpcs = \App\WARDownstreamRefineryKRPC::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_refinery_krpcs];
        } else {
            $downstream_refinery_krpcs = \App\WARDownstreamRefineryKRPC::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryKRPCResource::collection($downstream_refinery_krpcs);
        }
    }

    public function AddDownstreamRefineryKRPC(Request $request)
    {
        $downstream_refinery_krpc = $request->isMethod('put') ?
        \App\WARDownstreamRefineryKRPC::findOrFail($request->downstream_refinery_krpc_id) : new \App\WARDownstreamRefineryKRPC;
        $date = date('Y', strtotime($request->date));

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_refinery_krpc->id = $request->downstream_refinery_krpc_id;
            $downstream_refinery_krpc->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_krpc->week = $request->week;
            $downstream_refinery_krpc->pms = $request->pms;
            $downstream_refinery_krpc->hhk = $request->hhk;
            $downstream_refinery_krpc->ago = $request->ago;
            $downstream_refinery_krpc->atk = $request->atk;
            $downstream_refinery_krpc->fuel_oil = $request->fuel_oil;

            if ($downstream_refinery_krpc->save()) {
                //sum all data
                $week_data = \App\WARDownstreamRefineryTotal::where('week', $request->week)->whereYear('date', $date)->first();
                //compute new values
                $new_pms = ($week_data->pms - $request->pms);
                $new_hhk = ($week_data->hhk - $request->hhk);
                $new_ago = ($week_data->ago - $request->ago);
                $new_atk = ($week_data->atk - $request->atk);
                $new_fuel_oil = ($week_data->fuel_oil - $request->fuel_oil);

                //update total
                $data = [
                    'date' => $date,
                    'week' => $request->week,
                    'pms' => $new_pms,
                    'hhk' => $new_hhk,
                    'ago' => $new_ago,
                    'atk' => $new_atk,
                    'fuel_oil' => $new_fuel_oil,
                ];
                \App\WARDownstreamRefineryTotal::where('id', $week_data->id)->update($data);

                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery KRPC');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery KRPC', 'Updated Record');

                return new WARDownstreamRefineryKRPCResource($downstream_refinery_krpc);
            }
        } else {
            // $downstream_refinery_krpc->id = $request->downstream_refinery_krpc_id;
            $downstream_refinery_krpc->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_krpc->week = $request->week;
            $downstream_refinery_krpc->pms = $request->pms;
            $downstream_refinery_krpc->hhk = $request->hhk;
            $downstream_refinery_krpc->ago = $request->ago;
            $downstream_refinery_krpc->atk = $request->atk;
            $downstream_refinery_krpc->fuel_oil = $request->fuel_oil;
            $downstream_refinery_krpc->created_by = $request->user_id;

            if ($downstream_refinery_krpc->save()) {
                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery KRPC');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery KRPC', 'Added Record');

                $record = \App\WARDownstreamRefineryTotal::where('week', $request->week)->whereYear('date', $date)
                                                            ->first();
                if (! $record) {
                    //add total
                    $total = new \App\WARDownstreamRefineryTotal;
                    $total->date = $date;
                    $total->week = $request->week;
                    $total->refinery_id = 2;
                    $total->pms = $request->pms;
                    $total->hhk = $request->hhk;
                    $total->ago = $request->ago;
                    $total->atk = $request->atk;
                    $total->fuel_oil = $request->fuel_oil;
                    $total->created_by = $request->user_id;

                    if ($total->save()) {
                        return new WARDownstreamRefineryKRPCResource($downstream_refinery_krpc);
                    }
                } else {
                    //compute new values
                    $new_pms = ($record->pms + $request->pms);
                    $new_hhk = ($record->hhk + $request->hhk);
                    $new_ago = ($record->ago + $request->ago);
                    $new_atk = ($record->atk + $request->atk);
                    $new_fuel_oil = ($record->fuel_oil + $request->fuel_oil);

                    //update total
                    $data = [
                        'date' => $date,
                        'week' => $request->week,
                        'pms' => $new_pms,
                        'hhk' => $new_hhk,
                        'ago' => $new_ago,
                        'atk' => $new_atk,
                        'fuel_oil' => $new_fuel_oil,
                    ];
                    \App\WARDownstreamRefineryTotal::where('id', $record->id)->update($data);

                    return new WARDownstreamRefineryKRPCResource($downstream_refinery_krpc);
                }
            }
        }
    }

    public function uploadRefineryKRPC(Request $request)
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
                    $uploaded = \App\WARDownstreamRefineryKRPC::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'pms' => $row['C'],
                        'hhk' => $row['D'],
                        'ago' => $row['E'],
                        'atk' => $row['F'],
                        'fuel_oil' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Refinery KRPC');
            //Audit Logging
            $this->log_audit_trail($request, 'Refinery KRPC', 'Bulk Data Upload');

            $downstream_refinery_krpcs = \App\WARDownstreamRefineryKRPC::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryKRPCResource::collection($downstream_refinery_krpcs);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexRefineryWRPC(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_refinery_wrpcs = \App\WARDownstreamRefineryWRPC::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_refinery_wrpcs];
        } else {
            $downstream_refinery_wrpcs = \App\WARDownstreamRefineryWRPC::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryWRPCResource::collection($downstream_refinery_wrpcs);
        }
    }

    public function AddDownstreamRefineryWRPC(Request $request)
    {
        $downstream_refinery_wrpc = $request->isMethod('put') ?
        \App\WARDownstreamRefineryWRPC::findOrFail($request->downstream_refinery_wrpc_id) : new \App\WARDownstreamRefineryWRPC;
        $date = date('Y', strtotime($request->date));

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_refinery_wrpc->id = $request->downstream_refinery_wrpc_id;
            $downstream_refinery_wrpc->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_wrpc->week = $request->week;
            $downstream_refinery_wrpc->pms = $request->pms;
            $downstream_refinery_wrpc->hhk = $request->hhk;
            $downstream_refinery_wrpc->ago = $request->ago;
            $downstream_refinery_wrpc->atk = $request->atk;
            $downstream_refinery_wrpc->fuel_oil = $request->fuel_oil;

            if ($downstream_refinery_wrpc->save()) {
                //sum all data
                $week_data = \App\WARDownstreamRefineryTotal::where('week', $request->week)->whereYear('date', $date)->first();
                //compute new values
                $new_pms = ($week_data->pms - $request->pms);
                $new_hhk = ($week_data->hhk - $request->hhk);
                $new_ago = ($week_data->ago - $request->ago);
                $new_atk = ($week_data->atk - $request->atk);
                $new_fuel_oil = ($week_data->fuel_oil - $request->fuel_oil);

                //update total
                $data = [
                    'date' => $date,
                    'week' => $request->week,
                    'pms' => $new_pms,
                    'hhk' => $new_hhk,
                    'ago' => $new_ago,
                    'atk' => $new_atk,
                    'fuel_oil' => $new_fuel_oil,
                ];
                \App\WARDownstreamRefineryTotal::where('id', $week_data->id)->update($data);

                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery WRPC');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery WRPC', 'Updated Record');

                return new WARDownstreamRefineryKRPCResource($downstream_refinery_wrpc);
            }
        } else {
            // $downstream_refinery_wrpc->id = $request->downstream_refinery_wrpc_id;
            $downstream_refinery_wrpc->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_wrpc->week = $request->week;
            $downstream_refinery_wrpc->pms = $request->pms;
            $downstream_refinery_wrpc->hhk = $request->hhk;
            $downstream_refinery_wrpc->ago = $request->ago;
            $downstream_refinery_wrpc->atk = $request->atk;
            $downstream_refinery_wrpc->fuel_oil = $request->fuel_oil;
            $downstream_refinery_wrpc->created_by = $request->user_id;

            if ($downstream_refinery_wrpc->save()) {
                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery WRPC');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery WRPC', 'Added Record');

                $record = \App\WARDownstreamRefineryTotal::where('week', $request->week)->whereYear('date', $date)
                                                         ->first();
                if (! $record) {
                    //add total
                    $total = new \App\WARDownstreamRefineryTotal;
                    $total->date = $date;
                    $total->week = $request->week;
                    $total->refinery_id = 1;
                    $total->pms = $request->pms;
                    $total->hhk = $request->hhk;
                    $total->ago = $request->ago;
                    $total->atk = $request->atk;
                    $total->fuel_oil = $request->fuel_oil;
                    $total->created_by = $request->user_id;

                    if ($total->save()) {
                        return new WARDownstreamRefineryWRPCResource($downstream_refinery_wrpc);
                    }
                } else {
                    //compute new values
                    $new_pms = ($record->pms + $request->pms);
                    $new_hhk = ($record->hhk + $request->hhk);
                    $new_ago = ($record->ago + $request->ago);
                    $new_atk = ($record->atk + $request->atk);
                    $new_fuel_oil = ($record->fuel_oil + $request->fuel_oil);

                    //update total
                    $data = [
                        'date' => $date,
                        'week' => $request->week,
                        'pms' => $new_pms,
                        'hhk' => $new_hhk,
                        'ago' => $new_ago,
                        'atk' => $new_atk,
                        'fuel_oil' => $new_fuel_oil,
                    ];
                    \App\WARDownstreamRefineryTotal::where('id', $record->id)->update($data);

                    return new WARDownstreamRefineryWRPCResource($downstream_refinery_wrpc);
                }
            }
        }
    }

    public function uploadRefineryWRPC(Request $request)
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
                    $uploaded = \App\WARDownstreamRefineryWRPC::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'pms' => $row['C'],
                        'hhk' => $row['D'],
                        'ago' => $row['E'],
                        'atk' => $row['F'],
                        'fuel_oil' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Refinery WRPC');
            //Audit Logging
            $this->log_audit_trail($request, 'Refinery WRPC', 'Bulk Data Upload');

            $downstream_refinery_wrpcs = \App\WARDownstreamRefineryWRPC::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryWRPCResource::collection($downstream_refinery_wrpcs);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexRefineryPHRC(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_refinery_phrcs = \App\WARDownstreamRefineryPHRC::where('type_id', 1)->orderBy('id', 'desc')->get();

            return ['data'=>$downstream_refinery_phrcs];
        } else {
            $downstream_refinery_phrcs = \App\WARDownstreamRefineryPHRC::where('type_id', 1)->orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryPHRCResource::collection($downstream_refinery_phrcs);
        }
    }

    public function indexRefineryPHRCNew(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_refinery_phrcs = \App\WARDownstreamRefineryPHRC::where('type_id', 2)->orderBy('id', 'desc')->get();

            return ['data'=>$downstream_refinery_phrcs];
        } else {
            $downstream_refinery_phrcs = \App\WARDownstreamRefineryPHRC::where('type_id', 2)->orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryPHRCResource::collection($downstream_refinery_phrcs);
        }
    }

    public function uploadRefineryPHRCOld(Request $request)
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
                    $uploaded = \App\WARDownstreamRefineryPHRC::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'pms' => $row['C'],
                        'hhk' => $row['D'],
                        'ago' => $row['E'],
                        'atk' => $row['F'],
                        'fuel_oil' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Refinery PHRC Old');
            //Audit Logging
            $this->log_audit_trail($request, 'Refinery PHRC Old', 'Bulk Data Upload');

            $downstream_refinery_phrcs = \App\WARDownstreamRefineryPHRC::where('type_id', 1)->orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryPHRCResource::collection($downstream_refinery_phrcs);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function uploadRefineryPHRCNew(Request $request)
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
                    $uploaded = \App\WARDownstreamRefineryPHRC::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'pms' => $row['C'],
                        'hhk' => $row['D'],
                        'ago' => $row['E'],
                        'atk' => $row['F'],
                        'fuel_oil' => $row['G'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Refinery PHRC New');
            //Audit Logging
            $this->log_audit_trail($request, 'Refinery PHRC New', 'Bulk Data Upload');

            $downstream_refinery_phrcs = \App\WARDownstreamRefineryPHRC::where('type_id', 2)->orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryPHRCResource::collection($downstream_refinery_phrcs);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function AddDownstreamRefineryPHRC(Request $request)
    {
        $downstream_refinery_phrc = $request->isMethod('put') ?
        \App\WARDownstreamRefineryPHRC::findOrFail($request->downstream_refinery_phrc_id) : new \App\WARDownstreamRefineryPHRC;
        $date = date('Y', strtotime($request->date));

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_refinery_phrc->id = $request->downstream_refinery_phrc_id;
            $downstream_refinery_phrc->type_id = $request->type_id;
            $downstream_refinery_phrc->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_phrc->week = $request->week;
            $downstream_refinery_phrc->pms = $request->pms;
            $downstream_refinery_phrc->hhk = $request->hhk;
            $downstream_refinery_phrc->ago = $request->ago;
            $downstream_refinery_phrc->atk = $request->atk;
            $downstream_refinery_phrc->fuel_oil = $request->fuel_oil;

            if ($downstream_refinery_phrc->save()) {
                //sum all data
                $week_data = \App\WARDownstreamRefineryTotal::where('week', $request->week)->whereYear('date', $date)->first();
                //compute new values
                $new_pms = ($week_data->pms - $request->pms);
                $new_hhk = ($week_data->hhk - $request->hhk);
                $new_ago = ($week_data->ago - $request->ago);
                $new_atk = ($week_data->atk - $request->atk);
                $new_fuel_oil = ($week_data->fuel_oil - $request->fuel_oil);

                //update total
                $data = [
                    'date' => $date,
                    'week' => $request->week,
                    'pms' => $new_pms,
                    'hhk' => $new_hhk,
                    'ago' => $new_ago,
                    'atk' => $new_atk,
                    'fuel_oil' => $new_fuel_oil,
                ];
                \App\WARDownstreamRefineryTotal::where('id', $week_data->id)->update($data);

                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery PHRC');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery PHRC', 'Updated Record');

                return new WARDownstreamRefineryKRPCResource($downstream_refinery_phrc);
            }
        } else {
            // $downstream_refinery_phrc->id = $request->downstream_refinery_phrc_id;
            $downstream_refinery_phrc->type_id = $request->type_id;
            $downstream_refinery_phrc->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_phrc->week = $request->week;
            $downstream_refinery_phrc->pms = $request->pms;
            $downstream_refinery_phrc->hhk = $request->hhk;
            $downstream_refinery_phrc->ago = $request->ago;
            $downstream_refinery_phrc->atk = $request->atk;
            $downstream_refinery_phrc->fuel_oil = $request->fuel_oil;
            $downstream_refinery_phrc->created_by = $request->user_id;

            if ($downstream_refinery_phrc->save()) {
                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery PHRC');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery PHRC', 'Added Record');

                $record = \App\WARDownstreamRefineryTotal::where('week', $request->week)->whereYear('date', $date)
                                                         ->first();
                if (! $record) {
                    //add total
                    $total = new \App\WARDownstreamRefineryTotal;
                    $total->date = $date;
                    $total->week = $request->week;
                    $total->pms = $request->pms;
                    $total->refinery_id = 3;
                    $total->hhk = $request->hhk;
                    $total->ago = $request->ago;
                    $total->atk = $request->atk;
                    $total->fuel_oil = $request->fuel_oil;
                    $total->created_by = $request->user_id;

                    if ($total->save()) {
                        return new WARDownstreamRefineryPHRCResource($downstream_refinery_phrc);
                    }
                } else {
                    //compute new values
                    $new_pms = ($record->pms + $request->pms);
                    $new_hhk = ($record->hhk + $request->hhk);
                    $new_ago = ($record->ago + $request->ago);
                    $new_atk = ($record->atk + $request->atk);
                    $new_fuel_oil = ($record->fuel_oil + $request->fuel_oil);

                    //update total
                    $data = [
                        'date' => $date,
                        'week' => $request->week,
                        'pms' => $new_pms,
                        'hhk' => $new_hhk,
                        'ago' => $new_ago,
                        'atk' => $new_atk,
                        'fuel_oil' => $new_fuel_oil,
                    ];
                    \App\WARDownstreamRefineryTotal::where('id', $record->id)->update($data);

                    return new WARDownstreamRefineryPHRCResource($downstream_refinery_phrc);
                }
            }
        }
    }

    public function indexRefineryTotal(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_refinery_totals = \App\WARDownstreamRefineryTotal::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_refinery_totals];
        } else {
            $downstream_refinery_totals = \App\WARDownstreamRefineryTotal::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryTotalResource::collection($downstream_refinery_totals);
        }
    }

    public function indexRefineryPerformanceUtilization(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_refinery_performance_utilizations = \App\WARDownstreamRefineryPerformanceUtilization::with('refinery')->orderBy('id', 'desc')->get();

            return ['data'=>$downstream_refinery_performance_utilizations];
        } else {
            $downstream_refinery_performance_utilizations = \App\WARDownstreamRefineryPerformanceUtilization::with('refinery')->orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryPerformanceUtilizationResource::collection($downstream_refinery_performance_utilizations);
        }
    }

    public function AddDownstreamRefineryPerformanceUtilization(Request $request)
    {
        $downstream_refinery_performance_utilization = $request->isMethod('put') ? \App\WARDownstreamRefineryPerformanceUtilization::findOrFail($request->downstream_refinery_performance_utilization_id) : new \App\WARDownstreamRefineryPerformanceUtilization;
        $date = date('Y', strtotime($request->date));

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_refinery_performance_utilization->id = $request->downstream_refinery_performance_utilization_id;
            $downstream_refinery_performance_utilization->refinery_id = $request->refinery_id;
            $downstream_refinery_performance_utilization->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_performance_utilization->week = $request->week;
            $downstream_refinery_performance_utilization->install_capacity = $request->install_capacity;
            $downstream_refinery_performance_utilization->opening_stock = $request->opening_stock;
            $downstream_refinery_performance_utilization->crude_receipt = $request->crude_receipt;
            $downstream_refinery_performance_utilization->crude_processed = $request->crude_processed;
            $downstream_refinery_performance_utilization->closing_stock = $request->closing_stock;
            $downstream_refinery_performance_utilization->capacity_utilization = $request->capacity_utilization;

            if ($downstream_refinery_performance_utilization->save()) {
                //sum all data
                $week_data = \App\WARDownstreamRefineryPerformanceUtilizationTotal::where('week', $request->week)->whereYear('date', $date)->first();
                //compute new values
                $new_install_capacity = ($week_data->install_capacity - $request->install_capacity);
                $new_opening_stock = ($week_data->opening_stock - $request->opening_stock);
                $new_crude_receipt = ($week_data->crude_receipt - $request->crude_receipt);
                $new_crude_processed = ($week_data->crude_processed - $request->crude_processed);
                $new_closing_stock = ($week_data->closing_stock - $request->closing_stock);
                $new_capacity_utilization = ($week_data->capacity_utilization - $request->capacity_utilization);

                //update total
                $data = [
                    'date' => $date,
                    'week' => $request->week,
                    'install_capacity' => $new_install_capacity,
                    'opening_stock' => $new_opening_stock,
                    'crude_receipt' => $new_crude_receipt,
                    'crude_processed' => $new_crude_processed,
                    'closing_stock' => $new_closing_stock,
                    'capacity_utilization' => $new_capacity_utilization,
                ];
                \App\WARDownstreamRefineryPerformanceUtilizationTotal::where('id', $week_data->id)->update($data);

                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery Perf Util');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery Perf Util', 'Updated Record');

                return new WARDownstreamRefineryPerformanceUtilizationResource($downstream_refinery_performance_utilization);
            }
        } else {
            // $downstream_refinery_performance_utilization->id = $request->downstream_refinery_performance_utilization_id;
            $downstream_refinery_performance_utilization->refinery_id = $request->refinery_id;
            $downstream_refinery_performance_utilization->date = date('Y-m-d', strtotime($request->date));
            $downstream_refinery_performance_utilization->week = $request->week;
            $downstream_refinery_performance_utilization->install_capacity = $request->install_capacity;
            $downstream_refinery_performance_utilization->opening_stock = $request->opening_stock;
            $downstream_refinery_performance_utilization->crude_receipt = $request->crude_receipt;
            $downstream_refinery_performance_utilization->crude_processed = $request->crude_processed;
            $downstream_refinery_performance_utilization->closing_stock = $request->closing_stock;
            $downstream_refinery_performance_utilization->capacity_utilization = $request->capacity_utilization;
            $downstream_refinery_performance_utilization->created_by = $request->user_id;

            if ($downstream_refinery_performance_utilization->save()) {
                //send mail
                $this->send_all_mail($request, 'Downstream - Refinery Perf Util');
                //Audit Logging
                $this->log_audit_trail($request, 'Refinery Perf Util', 'Added Record');

                $record = \App\WARDownstreamRefineryPerformanceUtilizationTotal::where('week', $request->week)->whereYear('date', $date)
                                                         ->first();
                if (! $record) {
                    //add total
                    $total = new \App\WARDownstreamRefineryPerformanceUtilizationTotal;
                    $total->date = $date;
                    $total->week = $request->week;
                    $total->refinery_id = $request->refinery_id;
                    $total->install_capacity = $request->install_capacity;
                    $total->opening_stock = $request->opening_stock;
                    $total->crude_receipt = $request->crude_receipt;
                    $total->crude_processed = $request->crude_processed;
                    $total->closing_stock = $request->closing_stock;
                    $total->capacity_utilization = $request->capacity_utilization;
                    $total->created_by = $request->user_id;

                    if ($total->save()) {
                        return new WARDownstreamRefineryPerformanceUtilizationResource($downstream_refinery_performance_utilization);
                    }
                } else {
                    //compute new values
                    $new_install_capacity = ($record->install_capacity + $request->install_capacity);
                    $new_opening_stock = ($record->opening_stock + $request->opening_stock);
                    $new_crude_receipt = ($record->crude_receipt + $request->crude_receipt);
                    $new_crude_processed = ($record->crude_processed + $request->crude_processed);
                    $new_closing_stock = ($record->closing_stock + $request->closing_stock);
                    $new_capacity_utilization = ($record->capacity_utilization + $request->capacity_utilization);

                    //update total
                    $data = [
                        'date' => $date,
                        'week' => $request->week,
                        'install_capacity' => $new_install_capacity,
                        'opening_stock' => $new_opening_stock,
                        'crude_receipt' => $new_crude_receipt,
                        'crude_processed' => $new_crude_processed,
                        'closing_stock' => $new_closing_stock,
                        'capacity_utilization' => $new_capacity_utilization,
                    ];
                    \App\WARDownstreamRefineryPerformanceUtilizationTotal::where('id', $record->id)->update($data);

                    return new WARDownstreamRefineryPerformanceUtilizationResource($downstream_refinery_performance_utilization);
                }
            }
        }

        if ($downstream_refinery_performance_utilization->save()) {
            return new WARDownstreamRefineryPerformanceUtilizationResource($downstream_refinery_performance_utilization);
        }
    }

    public function indexRefineryPerformanceUtilizationTotal(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_refinery_performance_utilization_totals = \App\WARDownstreamRefineryPerformanceUtilizationTotal::with('refinery')->orderBy('id', 'desc')->get();

            return ['data'=>$downstream_refinery_performance_utilization_totals];
        } else {
            $downstream_refinery_performance_utilization_totals = \App\WARDownstreamRefineryPerformanceUtilizationTotal::with('refinery')->orderBy('id', 'desc')->paginate(15);

            return WARDownstreamRefineryPerformanceUtilizationTotalResource::collection($downstream_refinery_performance_utilization_totals);
        }
    }

    public function indexTruckOut(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_truck_outs = \App\WARDownstreamTruckOut::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_truck_outs];
        } else {
            $downstream_truck_outs = \App\WARDownstreamTruckOut::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTruckOutResource::collection($downstream_truck_outs);
        }
    }

    public function AddDownstreamTruckOut(Request $request)
    {
        $downstream_truck_out = $request->isMethod('put') ? \App\WARDownstreamTruckOut::findOrFail($request->downstream_truck_out_id) : new \App\WARDownstreamTruckOut;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_truck_out->id = $request->downstream_truck_out_id;
            $downstream_truck_out->date = date('Y-m-d', strtotime($request->date));
            $downstream_truck_out->week = $request->week;
            $downstream_truck_out->pms = $request->pms;
            $downstream_truck_out->hhk = $request->hhk;
            $downstream_truck_out->ago = $request->ago;
            $downstream_truck_out->atk = $request->atk;

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot TruckOut');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot TruckOut', 'Updated Record');
        } else {
            // $downstream_truck_out->id = $request->downstream_truck_out_id;
            $downstream_truck_out->date = date('Y-m-d', strtotime($request->date));
            $downstream_truck_out->week = $request->week;
            $downstream_truck_out->pms = $request->pms;
            $downstream_truck_out->hhk = $request->hhk;
            $downstream_truck_out->ago = $request->ago;
            $downstream_truck_out->atk = $request->atk;
            $downstream_truck_out->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot TruckOut');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot TruckOut', 'Added Record');
        }

        if ($downstream_truck_out->save()) {
            return new WARDownstreamTruckOutResource($downstream_truck_out);
        }
    }

    public function uploadTruckOut(Request $request)
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
                    $uploaded = \App\WARDownstreamTruckOut::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'pms' => $row['C'],
                        'hhk' => $row['D'],
                        'ago' => $row['E'],
                        'atk' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot TruckOut');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot TruckOut', 'Bulk Data Upload');

            $downstream_truck_outs = \App\WARDownstreamTruckOut::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTruckOutResource::collection($downstream_truck_outs);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexTruckOutMarketer(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_truck_out_marketers = \App\WARDownstreamTruckOutMarketer::with('segment')->orderBy('id', 'desc')->get();

            return ['data'=>$downstream_truck_out_marketers];
        } else {
            $downstream_truck_out_marketers = \App\WARDownstreamTruckOutMarketer::with('segment')->orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTruckOutMarketerResource::collection($downstream_truck_out_marketers);
        }
    }

    public function AddDownstreamTruckOutMarketer(Request $request)
    {
        $downstream_truck_out_marketer = $request->isMethod('put') ? \App\WARDownstreamTruckOutMarketer::findOrFail($request->downstream_truck_out_marketer_id) : new \App\WARDownstreamTruckOutMarketer;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_truck_out_marketer->id = $request->downstream_truck_out_marketer_id;
            $downstream_truck_out_marketer->date = date('Y-m-d', strtotime($request->date));
            $downstream_truck_out_marketer->week = $request->week;
            $downstream_truck_out_marketer->segment_id = $request->segment_id;
            $downstream_truck_out_marketer->pms = $request->pms;
            $downstream_truck_out_marketer->dpk = $request->dpk;
            $downstream_truck_out_marketer->ago = $request->ago;

            //send mail
            $this->send_all_mail($request, 'Downstream - TruckOut Mkt Segment');
            //Audit Logging
            $this->log_audit_trail($request, 'TruckOut Mkt Segment', 'Updated Record');
        } else {
            // $downstream_truck_out_marketer->id = $request->downstream_truck_out_marketer_id;
            $downstream_truck_out_marketer->date = date('Y-m-d', strtotime($request->date));
            $downstream_truck_out_marketer->week = $request->week;
            $downstream_truck_out_marketer->segment_id = $request->segment_id;
            $downstream_truck_out_marketer->pms = $request->pms;
            $downstream_truck_out_marketer->dpk = $request->dpk;
            $downstream_truck_out_marketer->ago = $request->ago;
            $downstream_truck_out_marketer->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - TruckOut Mkt Segment');
            //Audit Logging
            $this->log_audit_trail($request, 'TruckOut Mkt Segment', 'Added Record');
        }

        if ($downstream_truck_out_marketer->save()) {
            return new WARDownstreamTruckOutMarketerResource($downstream_truck_out_marketer);
        }
    }

    public function uploadMerketSegment(Request $request)
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
                    $uploaded = \App\WARDownstreamTruckOutMarketer::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'segment_id' => $row['C'],
                        'pms' => $row['D'],
                        'dpk' => $row['E'],
                        'ago' => $row['F'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - TruckOut Mkt Segment');
            //Audit Logging
            $this->log_audit_trail($request, 'TruckOut Mkt Segment', 'Bulk Data Upload');

            $downstream_truck_out_marketers = \App\WARDownstreamTruckOutMarketer::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTruckOutMarketerResource::collection($downstream_truck_out_marketers);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexDepotApplication(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_depot_applications = \App\WARDownstreamDepotApplication::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_depot_applications];
        } else {
            $downstream_depot_applications = \App\WARDownstreamDepotApplication::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamDepotApplicationResource::collection($downstream_depot_applications);
        }
    }

    public function AddDownstreamDepotApplication(Request $request)
    {
        $downstream_depot_application = $request->isMethod('put') ? \App\WARDownstreamDepotApplication::findOrFail($request->downstream_depot_application_id) : new \App\WARDownstreamDepotApplication;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_depot_application->id = $request->downstream_depot_application_id;
            $downstream_depot_application->date = date('Y-m-d', strtotime($request->date));
            $downstream_depot_application->week = $request->week;
            $downstream_depot_application->proposal_received = $request->proposal_received;
            $downstream_depot_application->proposal_approved = $request->proposal_approved;
            $downstream_depot_application->presentation_received = $request->presentation_received;
            $downstream_depot_application->presentation_approved = $request->presentation_approved;
            $downstream_depot_application->assessment_received = $request->assessment_received;
            $downstream_depot_application->assessment_approved = $request->assessment_approved;
            $downstream_depot_application->atc_received = $request->atc_received;
            $downstream_depot_application->atc_approved = $request->atc_approved;
            $downstream_depot_application->presure_test_received = $request->presure_test_received;
            $downstream_depot_application->presure_test_approved = $request->presure_test_approved;
            $downstream_depot_application->calibration_received = $request->calibration_received;
            $downstream_depot_application->calibration_approved = $request->calibration_approved;
            $downstream_depot_application->final_inspection_received = $request->final_inspection_received;
            $downstream_depot_application->final_inspection_approved = $request->final_inspection_approved;
            $downstream_depot_application->renewal_inspection_received = $request->renewal_inspection_received;
            $downstream_depot_application->renewal_inspection_approved = $request->renewal_inspection_approved;
            $downstream_depot_application->new_lto_received = $request->new_lto_received;
            $downstream_depot_application->new_lto_approved = $request->new_lto_approved;
            $downstream_depot_application->renewal_lto_received = $request->renewal_lto_received;
            $downstream_depot_application->renewal_lto_approved = $request->renewal_lto_approved;
            $downstream_depot_application->import_permit_received = $request->import_permit_received;
            $downstream_depot_application->import_permit_approved = $request->import_permit_approved;

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot Application', 'Updated Record');
        } else {
            // $downstream_depot_application->id = $request->downstream_depot_application_id;
            $downstream_depot_application->date = date('Y-m-d', strtotime($request->date));
            $downstream_depot_application->week = $request->week;
            $downstream_depot_application->proposal_received = $request->proposal_received;
            $downstream_depot_application->proposal_approved = $request->proposal_approved;
            $downstream_depot_application->presentation_received = $request->presentation_received;
            $downstream_depot_application->presentation_approved = $request->presentation_approved;
            $downstream_depot_application->assessment_received = $request->assessment_received;
            $downstream_depot_application->assessment_approved = $request->assessment_approved;
            $downstream_depot_application->atc_received = $request->atc_received;
            $downstream_depot_application->atc_approved = $request->atc_approved;
            $downstream_depot_application->presure_test_received = $request->presure_test_received;
            $downstream_depot_application->presure_test_approved = $request->presure_test_approved;
            $downstream_depot_application->calibration_received = $request->calibration_received;
            $downstream_depot_application->calibration_approved = $request->calibration_approved;
            $downstream_depot_application->final_inspection_received = $request->final_inspection_received;
            $downstream_depot_application->final_inspection_approved = $request->final_inspection_approved;
            $downstream_depot_application->renewal_inspection_received = $request->renewal_inspection_received;
            $downstream_depot_application->renewal_inspection_approved = $request->renewal_inspection_approved;
            $downstream_depot_application->new_lto_received = $request->new_lto_received;
            $downstream_depot_application->new_lto_approved = $request->new_lto_approved;
            $downstream_depot_application->renewal_lto_received = $request->renewal_lto_received;
            $downstream_depot_application->renewal_lto_approved = $request->renewal_lto_approved;
            $downstream_depot_application->import_permit_received = $request->import_permit_received;
            $downstream_depot_application->import_permit_approved = $request->import_permit_approved;
            $downstream_depot_application->created_by = 1;

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot Application', 'Added Record');
        }

        if ($downstream_depot_application->save()) {
            return new WARDownstreamDepotApplicationResource($downstream_depot_application);
        }
    }

    public function uploadRDepotApplication(Request $request)
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
                    $uploaded = \App\WARDownstreamDepotApplication::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'proposal_received' => $row['C'],
                        'proposal_approved' => $row['D'],
                        'presentation_received' => $row['E'],
                        'presentation_approved' => $row['F'],
                        'assessment_received' => $row['G'],
                        'assessment_approved' => $row['H'],
                        'atc_received' => $row['I'],
                        'atc_approved' => $row['J'],
                        'presure_test_received' => $row['K'],
                        'presure_test_approved' => $row['L'],
                        'calibration_received' => $row['M'],
                        'calibration_approved' => $row['N'],
                        'final_inspection_received' => $row['O'],
                        'final_inspection_approved' => $row['P'],
                        'renewal_inspection_received' => $row['Q'],
                        'renewal_inspection_approved' => $row['R'],
                        'new_lto_received' => $row['S'],
                        'new_lto_approved' => $row['T'],
                        'renewal_lto_received' => $row['U'],
                        'renewal_lto_approved' => $row['V'],
                        'import_permit_received' => $row['W'],
                        'import_permit_approved' => $row['X'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot Application', 'Bulk Data Upload');

            $downstream_depot_applications = \App\WARDownstreamDepotApplication::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamDepotApplicationResource::collection($downstream_depot_applications);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexTerminalOperation(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_terminal_operations = \App\WARDownstreamTerminalOperation::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_terminal_operations];
        } else {
            $downstream_terminal_operations = \App\WARDownstreamTerminalOperation::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTerminalOperationResource::collection($downstream_terminal_operations);
        }
    }

    public function AddDownstreamTerminalOperation(Request $request)
    {
        $downstream_terminal_operation = $request->isMethod('put') ? \App\WARDownstreamTerminalOperation::findOrFail($request->downstream_terminal_operation_id) : new \App\WARDownstreamTerminalOperation;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_terminal_operation->id = $request->downstream_terminal_operation_id;
            $downstream_terminal_operation->date = date('Y-m-d', strtotime($request->date));
            $downstream_terminal_operation->week = $request->week;
            $downstream_terminal_operation->oil_condensate_production = $request->oil_condensate_production;
            $downstream_terminal_operation->oil_condensate_export = $request->oil_condensate_export;
            $downstream_terminal_operation->refinery_supply = $request->refinery_supply;

            //send mail
            $this->send_all_mail($request, 'Downstream - Terminal Operation');
            //Audit Logging
            $this->log_audit_trail($request, 'Terminal Operation', 'Updated Record');
        } else {
            // $downstream_terminal_operation->id = $request->downstream_terminal_operation_id;
            $downstream_terminal_operation->date = date('Y-m-d', strtotime($request->date));
            $downstream_terminal_operation->week = $request->week;
            $downstream_terminal_operation->oil_condensate_production = $request->oil_condensate_production;
            $downstream_terminal_operation->oil_condensate_export = $request->oil_condensate_export;
            $downstream_terminal_operation->refinery_supply = $request->refinery_supply;
            $downstream_terminal_operation->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - Terminal Operation');
            //Audit Logging
            $this->log_audit_trail($request, 'Terminal Operation', 'Added Record');
        }

        if ($downstream_terminal_operation->save()) {
            return new WARDownstreamTerminalOperationResource($downstream_terminal_operation);
        }
    }

    public function uploadDepotApplication(Request $request)
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
                    $uploaded = \App\WARDownstreamTerminalOperation::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'oil_condensate_production' => $row['C'],
                        'oil_condensate_export' => $row['D'],
                        'refinery_supply' => $row['E'],
                        'created_by' => 1,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Depot Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Depot Application', 'Bulk Data Upload');

            $downstream_terminal_operations = \App\WARDownstreamTerminalOperation::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTerminalOperationResource::collection($downstream_terminal_operations);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexTerminalOperationApplication(Request $request)
    {
        //
        if ($request->filled('all')) {
            $downstream_terminal_operations = \App\WARDownstreamTerminalOperationApplication::orderBy('id', 'desc')->get();

            return ['data'=>$downstream_terminal_operations];
        } else {
            $downstream_terminal_operations = \App\WARDownstreamTerminalOperationApplication::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTerminalOperationApplicationResource::collection($downstream_terminal_operations);
        }
    }

    public function AddDownstreamTerminalOperationApplication(Request $request)
    {
        $downstream_terminal_operation_application = $request->isMethod('put') ? \App\WARDownstreamTerminalOperationApplication::findOrFail($request->downstream_terminal_operation_application_id) : new \App\WARDownstreamTerminalOperationApplication;

        // return $request->all();
        if ($request->isMethod('put') == true) {
            $downstream_terminal_operation_application->id = $request->downstream_terminal_operation_application_id;
            $downstream_terminal_operation_application->date = date('Y-m-d', strtotime($request->date));
            $downstream_terminal_operation_application->week = $request->week;
            $downstream_terminal_operation_application->export_permit_received = $request->export_permit_received;
            $downstream_terminal_operation_application->export_permit_approved = $request->export_permit_approved;
            $downstream_terminal_operation_application->establishment_received = $request->establishment_received;
            $downstream_terminal_operation_application->establishment_approved = $request->establishment_approved;
            $downstream_terminal_operation_application->suttle_trucking_received = $request->suttle_trucking_received;
            $downstream_terminal_operation_application->suttle_trucking_approved = $request->suttle_trucking_approved;
            $downstream_terminal_operation_application->suttle_bargingreceived = $request->suttle_bargingreceived;
            $downstream_terminal_operation_application->suttle_bargingapproved = $request->suttle_bargingapproved;
            $downstream_terminal_operation_application->tank_calibration_received = $request->tank_calibration_received;
            $downstream_terminal_operation_application->tank_calibration_approved = $request->tank_calibration_approved;
            $downstream_terminal_operation_application->calibration_proving_received = $request->calibration_proving_received;
            $downstream_terminal_operation_application->calibration_proving_approved = $request->calibration_proving_approved;
            $downstream_terminal_operation_application->instrument_calibration_received = $request->instrument_calibration_received;
            $downstream_terminal_operation_application->instrument_calibration_approved = $request->instrument_calibration_approved;

            //send mail
            $this->send_all_mail($request, 'Downstream - Operation Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Operation Application', 'Updated Record');
        } else {
            // $downstream_terminal_operation_application->id = $request->downstream_terminal_operation_application_id;
            $downstream_terminal_operation_application->date = date('Y-m-d', strtotime($request->date));
            $downstream_terminal_operation_application->week = $request->week;
            $downstream_terminal_operation_application->export_permit_received = $request->export_permit_received;
            $downstream_terminal_operation_application->export_permit_approved = $request->export_permit_approved;
            $downstream_terminal_operation_application->establishment_received = $request->establishment_received;
            $downstream_terminal_operation_application->establishment_approved = $request->establishment_approved;
            $downstream_terminal_operation_application->suttle_trucking_received = $request->suttle_trucking_received;
            $downstream_terminal_operation_application->suttle_trucking_approved = $request->suttle_trucking_approved;
            $downstream_terminal_operation_application->suttle_bargingreceived = $request->suttle_bargingreceived;
            $downstream_terminal_operation_application->suttle_bargingapproved = $request->suttle_bargingapproved;
            $downstream_terminal_operation_application->tank_calibration_received = $request->tank_calibration_received;
            $downstream_terminal_operation_application->tank_calibration_approved = $request->tank_calibration_approved;
            $downstream_terminal_operation_application->calibration_proving_received = $request->calibration_proving_received;
            $downstream_terminal_operation_application->calibration_proving_approved = $request->calibration_proving_approved;
            $downstream_terminal_operation_application->instrument_calibration_received = $request->instrument_calibration_received;
            $downstream_terminal_operation_application->instrument_calibration_approved = $request->instrument_calibration_approved;
            $downstream_terminal_operation_application->created_by = $request->user_id;

            //send mail
            $this->send_all_mail($request, 'Downstream - Operation Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Operation Application', 'Added Record');
        }

        if ($downstream_terminal_operation_application->save()) {
            return new WARDownstreamTerminalOperationApplicationResource($downstream_terminal_operation_application);
        }
    }

    public function uploadTerminalOperationApplication(Request $request)
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
                    $uploaded = \App\WARDownstreamTerminalOperationApplication::updateOrCreate(['id'=> $request->id],
                    [
                        'date' => $day,
                        'week' => $row['B'],
                        'export_permit_received' => $row['C'],
                        'export_permit_approved' => $row['D'],
                        'establishment_received' => $row['E'],
                        'establishment_approved' => $row['F'],
                        'suttle_trucking_received' => $row['G'],
                        'suttle_trucking_approved' => $row['H'],
                        'suttle_bargingreceived' => $row['I'],
                        'suttle_bargingapproved' => $row['J'],
                        'tank_calibration_received' => $row['K'],
                        'tank_calibration_approved' => $row['L'],
                        'calibration_proving_received' => $row['M'],
                        'calibration_proving_approved' => $row['N'],
                        'instrument_calibration_received' => $row['O'],
                        'instrument_calibration_approved' => $row['P'],
                        'created_by' => $request->user_id,
                    ]);
                }
            }

            //send mail
            $this->send_all_mail($request, 'Downstream - Operation Application');
            //Audit Logging
            $this->log_audit_trail($request, 'Operation Application', 'Bulk Data Upload');

            $downstream_terminal_operations = \App\WARDownstreamTerminalOperationApplication::orderBy('id', 'desc')->paginate(15);

            return WARDownstreamTerminalOperationApplicationResource::collection($downstream_terminal_operations);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function indexDownstreamMonthlyActivity($path, $year, Request $request)
    {
        $path = explode('/', $request->path());
        switch ($path[2]) {
            case 'rom':
                return $this->getMonthlyUpstreamReportROM($request);
            break;

            case 'license':
                return $this->getMonthlyUpstreamReportLicense($request);
            break;

            case 'surveillance':
                return $this->getMonthlyUpstreamReportSurveillance($request);
            break;

            case 'depot_stock':
                return $this->getMonthlyUpstreamReportDepotStock($request);
            break;

            case 'depot_application':
                return $this->getMonthlyUpstreamReportDepotApplication($request);
            break;

            case 'product_import':
                return $this->getMonthlyUpstreamReportProductImport($request);
            break;

            case 'KRPC':
                return $this->getMonthlyUpstreamReportProductionKRPC($request);
            break;

            case 'WRPC':
                return $this->getMonthlyUpstreamReportProductionWRPC($request);
            break;

            case 'PHRC_old':
                return $this->getMonthlyUpstreamReportProductionPHRCOld($request);
            break;

            case 'PHRC_new':
                return $this->getMonthlyUpstreamReportProductionPHRCNew($request);
            break;

            case 'Total':
                return $this->getMonthlyUpstreamReportProductionTotal($request);
            break;

            case 'utilization_WRPC':
                return $this->getMonthlyUpstreamReportRefineryPerformanceWRPC($request);
            break;

            case 'utilization_KRPC':
                return $this->getMonthlyUpstreamReportRefineryPerformanceKRPC($request);
            break;

            case 'utilization_PHRC_new':
                return $this->getMonthlyUpstreamReportRefineryPerformancePHRC_new($request);
            break;

            case 'utilization_NDPR':
                return $this->getMonthlyUpstreamReportRefineryPerformanceNDPR($request);
            break;

            case 'utilization_PHRC_old':
                return $this->getMonthlyUpstreamReportRefineryPerformancePHRC_old($request);
            break;

            case 'utilization_total':
                return $this->getMonthlyUpstreamReportRefineryPerformanceTotal($request);
            break;

            case 'truck_out':
                return $this->getMonthlyUpstreamReportTruckOut($request);
            break;

            case 'market_nnpc':
                return $this->getMonthlyUpstreamReportMarketNNPC($request);
            break;

            case 'market_major':
                return $this->getMonthlyUpstreamReportMarketMajor($request);
            break;

            case 'market_independent':
                return $this->getMonthlyUpstreamReportMarketIndependent($request);
            break;

            case 'terminal_operation':
                return $this->getMonthlyUpstreamReportTerminalOperation($request);
            break;

            case 'terminal_operation_application':
                return $this->getMonthlyUpstreamReportTerminalOperationApplication($request);
            break;

            default:
                // return $this->getMonthlyUpstreamReportROM($request);
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

    public function getMonthlyUpstreamReportROM(Request $request)
    {
        $data = ['suitability_inspection_received'=>'Suitability Insp-Received',
            'suitability_inspection_approved'=>'ASuitability Insp-Received',
            'atc_received'=>'ATC- Received',
            'atc_approved'=>'ATC- Approved',
            'pressure_test_received'=>'Pressure test -Received',
            'pressure_test_approved'=>'Pressure test -Approved',
            'tank_buried_received'=>'Tank Burial- Received',
            'tank_buried_approved'=>'Tank Burial- Approved',
            'leak_detection_received'=>'Leak Test- Received',
            'leak_detection_approved'=>'Leak Test- Received',
            'final_inspection_received'=>'Final insp -Received',
            'final_inspection_approved'=>'Final insp -Received',
            'renewal_inspection_received'=>'Renewal insp- Received',
            'renewal_inspection_approved'=>'Renewal insp- Approved',
            'vessel_license_received'=>'Vessel License- Received',
            'vessel_license_approved'=>'Vessel License- Approved',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamRomApplication::class);
    }

    public function getMonthlyUpstreamReportLicense(Request $request)
    {
        $data = ['category_a_new'=>'Catigory A- New',
            'category_a_renewal'=>'Catigory A- Renewal',
            'category_b_new'=>'Catigory B- New',
            'category_b_renewal'=>'Catigory B- Renewal',
            'category_c_new'=>'Catigory C- New',
            'category_c_renewal'=>'Catigory C- Renewal',
            'total_cat_a'=>'Total CAT A',
            'total_cat_b'=>'Total CAT B',
            'total_cat_c'=>'Total CAT C',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamLicense::class);
    }

    public function getMonthlyUpstreamReportSurveillance(Request $request)
    {
        $data = ['station_visited'=>'Station visited',
            'station_with_pms'=>'Station With PMS',
            'sealed_under_dispensing'=>'Sealed for under Dispensing',
            'sealed_for_over_price'=>'Sealed for Over Pricing',
            'sealed_for_hoarding'=>'Sealed for Hoarding',
            'sealed_for_diversion'=>'Sealed for Diversion',
            'sealed_for_violation_of_seal'=>'Sealed for Violation of seal',
            'other'=>'Others',
            'total_station_sealed'=>'Total Station Sealed',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamSurveillance::class);
    }

    public function getMonthlyUpstreamReportDepotStock(Request $request)
    {
        $data = ['pms_open_stock'=>'PMS Opening Stock',
            'pms_reciept'=>'PMS Reciept',
            'pms_lifting_transfer'=>'PMS Lifting/Tranfers',
            'pms_closing_stock'=>'PMS Closing Stock',
            'dpk_open_stock'=>'DPK Opening Stock',
            'dpk_reciept'=>'DPK Reciept',
            'dpk_lifting_transfer'=>'DPK Lifting/Tranfers',
            'dpk_closing_stock'=>'DPK Closing Stock',
            'ago_open_stock'=>'AGO Opening Stock',
            'ago_reciept'=>'AGO Reciept',
            'ago_lifting_transfer'=>'AGO Lifting/Tranfers',
            'ago_closing_stock'=>'AGO Closing Stock',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamDepotStock::class);
    }

    public function getMonthlyUpstreamReportDepotApplication(Request $request)
    {
        $data = ['proposal_received'=>'Proposal- Received',
            'proposal_approved'=>'Proposal- Approved',
            'presentation_received'=>'Presentation- Received',
            'presentation_approved'=>'Presentation- Approved',
            'assessment_received'=>'Assesment-Received',
            'assessment_approved'=>'Assesment-Approved',
            'atc_received'=>'ATC-Received',
            'atc_approved'=>'ATC-Approved',
            'presure_test_received'=>'Test-Received',
            'presure_test_approved'=>'Test-Approved',
            'calibration_received'=>'Calibration-Received',
            'calibration_approved'=>'Calibration-Approved',
            'final_inspection_received'=>'Final Inspection-Received',
            'final_inspection_approved'=>'Final Inspection-Approved',
            'renewal_inspection_received'=>'Renewal Inspection-Received',
            'renewal_inspection_approved'=>'Renewal Inspection-Approved',
            'new_lto_received'=>'New LTO- Received',
            'new_lto_approved'=>'New LTO- Approved',
            'renewal_lto_received'=>'Renewal LTO Received',
            'renewal_lto_approved'=>'Renewal LTO Approved',
            'import_permit_received'=>'Permit-Received',
            'import_permit_approved'=>'Permit-Approved',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamDepotApplication::class);
    }

    public function getMonthlyUpstreamReportProductImport(Request $request)
    {
        $data = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamProductImport::class);
    }

    public function getMonthlyUpstreamReportProductionKRPC(Request $request)
    {
        $data = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
            'fuel_oil'=>'FUEL OIL',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamRefineryKRPC::class);
    }

    public function getMonthlyUpstreamReportProductionWRPC(Request $request)
    {
        $data = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
            'fuel_oil'=>'FUEL OIL',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamRefineryWRPC::class);
    }

    public function getMonthlyUpstreamReportProductionPHRCOld(Request $request)
    {
        $datas = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
            'fuel_oil'=>'FUEL OIL',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamRefineryPHRC::where('type_id', 1)->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportProductionPHRCNew(Request $request)
    {
        $datas = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
            'fuel_oil'=>'FUEL OIL',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamRefineryPHRC::where('type_id', 2)->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportProductionTotal(Request $request)
    {
        $data = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
            'fuel_oil'=>'FUEL OIL',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamRefineryTotal::class);
    }

    public function getMonthlyUpstreamReportRefineryPerformanceWRPC(Request $request)
    {
        $datas = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamRefineryPerformanceUtilization::where('refinery_id', 1)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportRefineryPerformanceKRPC(Request $request)
    {
        $datas = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamRefineryPerformanceUtilization::where('refinery_id', 2)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportRefineryPerformancePHRC_new(Request $request)
    {
        $datas = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamRefineryPerformanceUtilization::where('refinery_id', 3)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportRefineryPerformanceNDPR(Request $request)
    {
        $datas = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamRefineryPerformanceUtilization::where('refinery_id', 4)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportRefineryPerformancePHRC_old(Request $request)
    {
        $datas = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamRefineryPerformanceUtilization::where('refinery_id', 5)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportRefineryPerformanceTotal(Request $request)
    {
        $data = ['install_capacity'=>'Install Capacity (BPSD)',
            'opening_stock'=>'Opening Stock',
            'crude_receipt'=>'Crude Receipt',
            'crude_processed'=>'Crude Processed',
            'closing_stock'=>'Closing Stock',
            'capacity_utilization'=>'Capacity Utilisation %',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamRefineryPerformanceUtilizationTotal::class);
    }

    public function getMonthlyUpstreamReportTruckOut(Request $request)
    {
        $data = ['pms'=>'PMS',
            'hhk'=>'HHK',
            'ago'=>'AGO',
            'atk'=>'ATK',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamTruckOut::class);
    }

    public function getMonthlyUpstreamReportMarketNNPC(Request $request)
    {
        $datas = ['pms'=>'PMS',
            'dpk'=>'DPK',
            'ago'=>'AGO',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamTruckOutMarketer::where('segment_id', 1)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportMarketMajor(Request $request)
    {
        $datas = ['pms'=>'PMS',
            'dpk'=>'DPK',
            'ago'=>'AGO',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamTruckOutMarketer::where('segment_id', 2)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportMarketIndependent(Request $request)
    {
        $datas = ['pms'=>'PMS',
            'dpk'=>'DPK',
            'ago'=>'AGO',
        ];

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
                $monthVal[$data][$months] = \App\WARDownstreamTruckOutMarketer::where('segment_id', 3)
                                                                                 ->where('date', '>=', $year_from)
                                                                                 ->where('date', '<=', $year_to)
                                                                                 ->whereIn('week', $weekArr[$months])->sum($data);
            }
        }

        $mergedVal = [];
        foreach ($monthVal as $key=>$value) {
            $mergedVal[] = array_merge($value, ['name'=>$datas[$key]]);
        }

        return $mergedVal;
    }

    public function getMonthlyUpstreamReportTerminalOperation(Request $request)
    {
        $data = ['oil_condensate_production'=>'Crude oil and condensate production(bbls)',
            'oil_condensate_export'=>'Crude Oil and condensate Export(Bbls)',
            'refinery_supply'=>'Refinery Supply(Bbls)',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamTerminalOperation::class);
    }

    public function getMonthlyUpstreamReportTerminalOperationApplication(Request $request)
    {
        $data = ['export_permit_received'=>'Permits Received',
            'export_permit_approved'=>'Permits Approved',
            'establishment_received'=>'Establishment-Received',
            'establishment_approved'=>'Establishment-Approved',
            'suttle_trucking_received'=>'Trucking-Received',
            'suttle_trucking_approved'=>'Trucking-Approved',
            'suttle_bargingreceived'=>'Barging-Received',
            'suttle_bargingapproved'=>'Barging-Approved',
            'tank_calibration_received'=>'Tank Calibration-Received',
            'tank_calibration_approved'=>'Tank Calibration-Approved',
            'calibration_proving_received'=>'Meter Calibration-Received',
            'calibration_proving_approved'=>'Meter Calibration-Approved',
            'instrument_calibration_received'=>'Instrument Calibration-Received',
            'instrument_calibration_approved'=>'Instrument Calibration-Approved',
        ];

        return $this->getMonthlyData($request, $data, \App\WARDownstreamTerminalOperationApplication::class);
    }
}
