<?php

namespace App\Http\Controllers;

use App\Traits\ExcelExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AjaxController extends Controller
{
    use ExcelExport;


    public function index()
    {
        //
    }


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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);
        // OR  return Schema::getColumnListing($table);

        // Table::select('name','surname')->where('id', 1)->get();
    }

    public function show($id, Request $request)
    {
        //
        switch ($id) {
            //ADMIN
            case 'permission_category':
                // code...
                return $this->permission_category();
                break;

            case 'permission':
                // code...
                return $this->permission();
                break;

            case 'assign_perm':
                // code...
                return $this->assign_perm();
                break;

            case 'allUsers':
                // code...
                return $this->allUsers($request);
                break;

            case 'allRoles':
                // code...
                return $this->allRoles($request);
                break;

            case 'allSubRoles':
                // code...
                return $this->allSubRoles($request);
                break;

            case 'users':
                // code...
                return $this->users($request);
                break;

            case 'users_last_log':
                // code...
                return $this->users_last_log($request);
                break;

            case 'delegate_role':
                // code...
                return $this->delegate_role($request);
                break;

            //HSE

            case 'she_upstream':
                // code...
                return $this->she_upstream($request);
                break;

            case 'she_downstream':
                // code...
                return $this->she_downstream($request);
                break;

            case 'spill':
                // code...
                return $this->spill($request);
                break;

            case 'water_vol':
                // code...
                return $this->water_vol($request);
                break;

            case 'waste_vol':
                // code...
                return $this->waste_vol($request);
                break;

            case 'effluent_waste_discharged':
                // code...
                return $this->effluent_waste_discharged($request);
                break;

            case 'waste_manager':
                // code...
                return $this->waste_manager($request);
                break;

            case 'waste_mgt_facilities':
                // code...
                return $this->waste_mgt_facilities($request);
                break;

            case 'pettitions_receieved':
                // code...
                return $this->pettitions_receieved($request);
                break;

            case 'chemical_certification':
                // code...
                return $this->chemical_certification($request);
                break;

            case 'accredited_laboratories':
                // code...
                return $this->accredited_laboratories($request);
                break;

            case 'drilling_chemical':
                // code...
                return $this->drilling_chemical($request);
                break;

            case 'environmental_restoration':
                // code...
                return $this->environmental_restoration($request);
                break;

            case 'environmental_studies':
                // code...
                return $this->environmental_studies($request);
                break;

            case 'environmental_compliance':
                // code...
                return $this->environmental_compliance($request);
                break;

            case 'medical_training_center':
                // code...
                return $this->medical_training_center($request);
                break;

            case 'safety_permit':
                // code...
                return $this->safety_permit($request);
                break;

            case 'oil_spill_contingency':
                // code...
                return $this->oil_spill_contingency($request);
                break;

            case 'radiation_safety_permit':
                // code...
                return $this->radiation_safety_permit($request);
                break;

            //GAS
            case 'obligation':
                // code...
                return $this->obligation($request);
                break;

            case 'supply':
                // code...
                return $this->supply($request);
                break;

            case 'gas_supply_textile_industry':
                // code...
                return $this->gas_supply_textile_industry($request);
                break;

            case 'summary':
                // code...
                return $this->summary($request);
                break;

            case 'utilization':
                // code...
                return $this->utilization($request);
                break;

            case 'gas_balance':
                // code...
                return $this->gas_balance($request);
                break;

            case 'facility':
                // code...
                return $this->facility($request);
                break;

            case 'plant':
                // code...
                return $this->plant($request);
                break;

            case 'oil_facility':
                // code...
                return $this->oil_facility($request);
                break;

            case 'oil_plant':
                // code...
                return $this->oil_plant($request);
                break;

            case 'gas_product_lpg':
                // code...
                return $this->gas_product_lpg($request);
                break;

            case 'gas_product_cng':
                // code...
                return $this->gas_product_cng($request);
                break;

            case 'gas_product_lng':
                // code...
                return $this->gas_product_lng($request);
                break;

            case 'gas_product_propane':
                // code...
                return $this->gas_product_propane($request);
                break;

            case 'gas_distribution':
                // code...
                return $this->gas_distribution($request);
                break;

            case 'gas_prod_vol_permit':
                // code...
                return $this->gas_prod_vol_permit($request);
                break;

            case 'gas_ref_production':
                // code...
                return $this->gas_ref_production($request);
                break;

            case 'gas_actual_production':
                // code...
                return $this->gas_actual_production($request);
                break;

            case 'gas_export':
                // code...
                return $this->gas_export($request);
                break;

            //DOWNSTREAM
            case 'terminal':
                // code...
                return $this->terminal($request);
                break;

            case 'export':
                // code...
                return $this->export($request);
                break;

            case 'destination':
                // code...
                return $this->destination($request);
                break;

            case 'dest_company':
                // code...
                return $this->dest_company($request);
                break;

            case 'pet_plant':
                // code...
                return $this->pet_plant($request);
                break;

            case 'ref_capacity':
                // code...
                return $this->ref_capacity($request);
                break;

            case 'ref_performance':
                // code...
                return $this->ref_performance($request);
                break;

            case 'plant_depot':
                // code...
                return $this->plant_depot($request);
                break;

            case 'plant_jetty':
                // code...
                return $this->plant_jetty($request);
                break;

            case 'plant_terminal':
                // code...
                return $this->plant_terminal($request);
                break;

            case 'import_prod':
                // code...
                return $this->import_prod($request);
                break;

            case 'prod_vol_permit':
                // code...
                return $this->prod_vol_permit($request);
                break;

            case 'prod_vol_permit_vessel':
                // code...
                return $this->prod_vol_permit_vessel($request);
                break;

            case 'ref_production':
                // code...
                return $this->ref_production($request);
                break;

            case 'ref_volume':
                // code...
                return $this->ref_volume($request);
                break;

            case 'retail_price':
                // code...
                return $this->retail_price($request);
                break;

            case 'retail_outlet':
                // code...
                return $this->retail_outlet($request);
                break;

            case 'outlet_capacity':
                // code...
                return $this->outlet_capacity($request);
                break;

            case 'l_marketer':
                // code...
                return $this->l_marketer($request);
                break;

            //UPSTREAM
            case 'reserve_condensate':
                // code...
                return $this->reserve_condensate($request);
                break;

            case 'reserve_oil':
                // code...
                return $this->reserve_oil($request);
                break;

            case 'reserve_replacement_rate':
                // code...
                return $this->reserve_replacement_rate($request);
                break;

            case 'reserve_depletion_rate':
                // code...
                return $this->reserve_depletion_rate($request);
                break;

            case 'reserve_gas':
                // code...
                return $this->reserve_gas($request);
                break;

            case 'gas_reserve_depletion_rate':
                // code...
                return $this->gas_reserve_depletion_rate($request);
                break;

            case 'crude_prods':
                // code...
                return $this->crude_prods($request);
                break;

            case 'crude_production_deferment':
                // code...
                return $this->crude_production_deferment($request);
                break;

            case 'seismic_data':
                // code...
                return $this->seismic_data($request);
                break;

            case 'rig_disp':
                // code...
                return $this->rig_disp($request);
                break;

            case 'well_activities':
                // code...
                return $this->well_activities($request);
                break;

            case 'drilling_gas':
                // code...
                return $this->drilling_gas($request);
                break;

            case 'gas_initial_completion':
                // code...
                return $this->gas_initial_completion($request);
                break;

            case 'completion':
                // code...
                return $this->completion($request);
                break;

            case 'workover':
                // code...
                return $this->workover($request);
                break;

            case 'plugback_abandonment':
                // code...
                return $this->plugback_abandonment($request);
                break;

            case 'field_development_plan':
                // code...
                return $this->field_development_plan($request);
                break;

            case 'field_development_plan_gas':
                // code...
                return $this->field_development_plan_gas($request);
                break;

            case 'approved_gas_development_plan':
                // code...
                return $this->approved_gas_development_plan($request);
                break;

            case 'field_summary':
                // code...
                return $this->field_summary($request);
                break;

            //BALA
            case 'bala_opls':
                // code...
                return $this->bala_opls($request);
                break;

            case 'bala_omls':
                // code...
                return $this->bala_omls($request);
                break;

            case 'bala_block':
                // code...
                return $this->bala_block($request);
                break;

            case 'bala_field':
                // code...
                return $this->bala_field($request);
                break;

            case 'open_acreage':
                // code...
                return $this->open_acreage($request);
                break;

            case 'bala_data_ps':
                // code...
                return $this->bala_data_ps($request);
                break;

            case 'bala_area':
                // code...
                return $this->bala_area($request);
                break;

            case 'bala_type':
                // code...
                return $this->bala_type($request);
                break;

            //MPM
            case 'MPM_':
                // code...
                return $this->MPM_($request);
                break;

            case 'net_cash_flow':
                // code...
                return $this->net_cash_flow($request);
                break;

            case 'MPM_r_':
                // code...
                return $this->MPM_r_($request);
                break;

            case 'Mpm_expenditure':
                 return $this->Mpm_expenditure($request);

            //WAR
            case 'war_mpm':
                // code...
                return $this->war_mpm($request);
                break;

            case 'war_r':
                // code...
                return $this->war_r($request);
                break;

            case 'Themic':
                // code...
                return $this->Themic($request);
                break;

            case 'Result':
                // code...
                return $this->Result($request);
                break;

            case 'mpm_kpi':
                // code...
                return $this->mpm_kpi($request);
                break;

            case 'Source':
                // code...
                return $this->Source($request);
                break;

            case 'Metric':
                // code...
                return $this->Metric($request);
                break;

            case 'frequency_measurement':
                // code...
                return $this->frequency_measurement();
                break;

            //SETUP
            case 'Department':
                // code...
                return $this->Department($request);
                break;

            case 'Company':
                // code...
                return $this->Company($request);
                break;

            case 'ParentCompany':
                // code...
                return $this->ParentCompany($request);
                break;

            case 'Field':
                // code...
                return $this->Field($request);
                break;

            case 'Contract':
                // code...
                return $this->Contract($request);
                break;

            case 'Concession':
                // code...
                return $this->Concession($request);
                break;

            case 'Unlisted_open':
                // code...
                return $this->Unlisted_open($request);
                break;

            case 'Terrain':
                // code...
                return $this->Terrain($request);
                break;

            case 'Stream':
                // code...
                return $this->Stream($request);
                break;

            case 'Facilities':
                // code...
                return $this->Facilities($request);
                break;

            case 'Facility_Type':
                // code...
                return $this->Facility_Type($request);
                break;

            case 'Location':
                // code...
                return $this->Location($request);
                break;

            case 'storage_loc':
                // code...
                return $this->storage_loc($request);
                break;

           //DWP PROJECTS
            case 'ind_project':
                // code...
                return $this->ind_project($request);
                break;

            case 'c_matrix':
                // code...
                return $this->c_matrix();
                break;

            case 'ind_alignment':
                // code...
                return $this->ind_alignment($request);
                break;

            case 'program_priority':
                // code...
                return $this->program_priority($request);
                break;

            case 'task_target':
                // code...
                return $this->task_target($request);
                break;

            case 'kpi_targets':
                // code...
                return $this->kpi_targets($request);
                break;

            case 'tt_crit_milestone':
                // code...
                return $this->tt_crit_milestone($request);
                break;

            case 'timeline':
                // code...
                return $this->timeline($request);
                break;

            case 'achieve_status':
                // code...
                return $this->achieve_status($request);
                break;

            case 'restrict_factor':
                // code...
                return $this->restrict_factor($request);
                break;

            case 'ind_division':
                // code...
                return $this->ind_division($request);
                break;

            case 'recovery_plan':
                // code...
                return $this->recovery_plan($request);
                break;

            case 'ind_status_cat':
                // code...
                return $this->ind_status_cat($request);
                break;

            case 'update_project':
                // code...
                return $this->update_project($request);
                break;

            case 'manage_project':
                // code...
                return $this->manage_project();
                break;

            case 'mtss_dpr_pp':
                // code...
                return $this->mtss_dpr_pp($request);
                break;

            case 'task_target_count':
                // code...
                return $this->task_target_count();
                break;

            case 'key_result_area':
                // code...
                return $this->key_result_area();
                break;

            case 'achieved':
                // code...
                return $this->achieved();
                break;

            case 'filter_project_year':
                // code...
                return $this->filter_project_year($request->year);
                break;

            //Economics
            case 'ave_price':
                // code...
                return $this->ave_price($request);
                break;

            case 'revenue_projected':
                // code...
                return $this->revenue_projected($request);
                break;

            case 'revenue_actual':
                // code...
                return $this->revenue_actual($request);
                break;

            //DISTRIBUTION
            case 'license_ref_project':
                // code...
                return $this->license_ref_project($request);
                break;

            case 'down_project':
                // code...
                return $this->down_project($request);
                break;

            case 'pipeline':
                // code...
                return $this->pipeline($request);
                break;

            case 'metering':
                // code...
                return $this->metering($request);
                break;

            case 'technology':
                // code...
                return $this->technology($request);
                break;

            default:
                // code...
                break;

            //WEEKLY Activities
            case 'acquisituion':
                // code...
                return $this->acquisituion($request);
            break;
        }
    }

    //ADMIN
    private function permission_category()
    {
        $permission_category = \App\PermissionCategory::orderBy('id', 'desc')->paginate(15);

        return view('ajax.permission_category', compact('permission_category'));
    }

    private function permission()
    {
        $permission = \App\Permission::orderBy('id', 'desc')->paginate(15);

        return view('ajax.permission', compact('permission'));
    }

    private function assign_perm()
    {
        $Role = \App\roles::orderBy('role_name', 'asc')->get();
        $categories = \App\PermissionCategory::orderBy('category_name', 'asc')->get();
        $permissions = \App\Permission::orderBy('permission_name', 'asc')->get();

        return view('ajax.assign_permission', compact('categories', 'permissions', 'Role'));
    }

    private function allUsers(Request $request)
    {
        $all_user = \App\User::orderBy('id', 'desc');
        // $pending = \App\User::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $all_user = $all_user->where('name', 'like', "%{$request->q}%")->orwhere('email', 'like', "%{$request->q}%")
                ->orwhereHas('role_obj', function ($query) use ($request) {
                    $query->where('role_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $all_user = $all_user->where('id', 1)->select('name', 'email', 'role')->get()->toArray();

            $role = \App\roles::select('id', 'role_name')->get();
            $sub_role = \App\role_sub::select('id', 'sub_role_name')->get();

            return $this->exportToExcelDropDown('User', ['Users'=>[$all_user, ''], 'role'=>[$role, 'A'], 'sub_role'=>[$sub_role, 'B',
                'sub_role', ]]);
        } else {
            $all_user = $all_user->paginate(15);
        }

        return view('ajax.admin_users', compact('all_user'));
    }

    private function allRoles(Request $request)
    {
        $allRoles = \App\roles::orderBy('id', 'desc');
        // $pending = \App\roles::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $allRoles = $allRoles->where('role_name', 'like', "%{$request->q}%")->orwhere('description', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $allRoles = $allRoles->where('id', 1)->select('role_name', 'description')->get()->toArray();

            return $this->exportexcel('PRIS Roles', ['Roles'=>[$allRoles, 'Roles']]);
        } else {
            $allRoles = $allRoles->paginate(15);
        }

        return view('ajax.admin_roles', compact('allRoles'));
    }

    private function allSubRoles(Request $request)
    {
        $allSubRoles = \App\role_sub::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $allSubRoles = $allSubRoles->where('sub_role_name', 'like', "%{$request->q}%")->orwhere('description', 'like', "%{$request->q}%")
                ->orwhereHas('role', function ($query) use ($request) {
                    $query->where('role_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $role = \App\roles::select('id', 'role_name')->get();
            $allSubRoles = $allSubRoles->where('id', 1)->select('role_id', 'sub_role_name', 'description')->get()->toArray();

            return $this->exportexcel('PRIS Sub Roles', ['Sub Roles'=>[$allSubRoles, 'Sub Roles']]);
        } else {
            $allSubRoles = $allSubRoles->paginate(15);
        }

        return view('ajax.admin_sub_roles', compact('allSubRoles'));
    }

    private function users(Request $request)
    {
        $audit_users = \App\User::orderBy('name', 'asc');
        $users_last_log = \App\user_login_history::orderBy('id', 'desc')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $audit_users = $audit_users->orwhereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('email', function ($query) use ($request) {
                $query->where('email', 'like', "%{$request->q}%");
            });
            $audit_users = $audit_users->paginate(30);
        } else {
            $audit_users = $audit_users->paginate(15);
        }

        return view('ajax.audit_users', compact('audit_users', 'users_last_log'));
    }

    private function users_last_log(Request $request)
    {
        $users_last_log = \App\user_login_history::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $users_last_log = $users_last_log
            ->orwhereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('user', function ($query) use ($request) {
                $query->where('email', 'like', "%{$request->q}%");
            });
            $users_last_log = $users_last_log->paginate(15);
        } else {
            $users_last_log = $users_last_log->paginate(15);
        }

        return view('ajax.user_last_login', compact('users_last_log'));
    }

    private function delegate_role(Request $request)
    {
        $categories = \App\PermissionCategory::orderBy('category_name', 'asc')->get();
        $delegate_users = $users = \App\User::all();

        return view('ajax.admin_delegate_role', compact('delegate_users', 'categories'));
    }

    //SHE
    private function she_upstream(Request $request)
    {
        $she_upstream = \App\she_accident_report_upstream::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_accident_report_upstream::where('year', 2020)->where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $she_upstream = $she_upstream->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $she_upstream = $she_upstream->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $she_upstream = collect($this->getTableColumns('she_accident_report_upstream'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('she_upstream', ['she_upstream'=>$she_upstream]);
        } else {
            $she_upstream = $she_upstream->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_upstream', compact('she_upstream', 'pending'));
    }

    private function she_downstream(Request $request)
    {
        $she_downstream = \App\she_accident_report_downstream::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_accident_report_downstream::where('year', 2020)->where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $she_downstream = $she_downstream->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $she_downstream = $she_downstream->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $she_downstream = collect($this->getTableColumns('she_accident_report_downstream'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('she_downstream', ['she_downstream'=>$she_downstream]);
        } else {
            $she_downstream = $she_downstream->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_downstream', compact('she_downstream', 'pending'));
    }

    private function spill(Request $request)
    {
        $she_spill = \App\she_spill_incidence_report::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_spill_incidence_report::where('stage_id', '0')->where('year', 2020)->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $she_spill = $she_spill->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $she_spill = $she_spill->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $she_spill = collect($this->getTableColumns('she_spill_incidence_report'))->filter(function ($value) {
                if (in_array($value, ['id', 'total_no_of_spills', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });


            return $this->exportexcel('HSE Spill', ['HSE Spill'=>$she_spill]);
        } else {
            $she_spill = $she_spill->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_spill', compact('she_spill', 'pending'));
    }

    private function water_vol(Request $request)
    {
        $water_vols = \App\she_water_volumes_generated::orderBy('id', 'desc');
        $pending = \App\she_water_volumes_generated::where('stage_id', '0')->get();
        $unresolvedCount = \App\she_water_volumes_generated::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $water_vols = $water_vols->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $water_vols = $water_vols->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $water_vols = $water_vols->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->orwhere('concession_id', 'like', "%{$request->q}%")->orwhere('terrain', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('facility', function ($query) use ($request) {
                    $query->where('facility_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $water_vols = collect($this->getTableColumns('she_water_volumes_generated'))->filter(function ($value) {
                if (in_array($value, ['id', 'others', 'water_depth', 'distance_from_shore', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();

            return   $this->exportexcel('HSE Water Volume', ['Water Volume Generated'=>$water_vols, 'company'=>$company]);
        } else {
            $water_vols = $water_vols->paginate(15);
        }

        return view('ajax.she_water_volume', compact('water_vols', 'pending', 'unresolvedCount'));
    }

    private function waste_vol(Request $request)
    {
        $waste_vols = \App\she_drilling_waste_volumes::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_drilling_waste_volumes::where('year', 2020)->where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $waste_vols = $waste_vols->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $waste_vols = $waste_vols->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $waste_vols = collect($this->getTableColumns('she_drilling_waste_volumes'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('waste_vols', ['waste_vols'=>$waste_vols]);
        } else
        {
            $waste_vols = $waste_vols->where('year', 2020)->paginate(15);
        }
        return view('ajax.she_waste_volume', compact('waste_vols', 'pending'));
    }

    private function effluent_waste_discharged(Request $request)
    {
        $effluent_waste_discharged = \App\she_effluent_waste_discharged::where('year',2020)->orderBy('id', 'desc');
        $pending = \App\she_effluent_waste_discharged::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\she_effluent_waste_discharged::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $effluent_waste_discharged = $effluent_waste_discharged->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $effluent_waste_discharged = $effluent_waste_discharged->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $effluent_waste_discharged = $effluent_waste_discharged->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->orwhere('well_name', 'like', "%{$request->q}%")->orwhere('spent_wbm', 'like', "%{$request->q}%")
                ->orwhere('spent_obm', 'like', "%{$request->q}%")->orwhere('wbm_generated', 'like', "%{$request->q}%")
                ->orwhere('obm_generated', 'like', "%{$request->q}%")->orwhere('waste_manager', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $effluent_waste_discharged = collect($this->getTableColumns('she_effluent_waste_discharged'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();

            return $this->exportexcel('effluent_waste_discharged', ['effluent_waste_discharged'=>$effluent_waste_discharged, 'company'=>$company]);
        } else {
            $effluent_waste_discharged = $effluent_waste_discharged->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_effluent_waste_discharged', compact('effluent_waste_discharged', 'pending', 'unresolvedCount'));
    }

    private function waste_manager(Request $request)
    {
        $waste_manager = \App\she_accredited_waste_manager::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_accredited_waste_manager::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\she_accredited_waste_manager::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $waste_manager = $waste_manager->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $waste_manager = $waste_manager->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $waste_manager = $waste_manager->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('facility_description', 'like', "%{$request->q}%")->orwhere('state_id', 'like', "%{$request->q}%")->orwhere('operational_status_id', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('type_of_facility', function ($query) use ($request) {
                    $query->where('facility_type_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $waste_manager = collect($this->getTableColumns('she_accredited_waste_managers'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'others', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $type_of_facility = \App\facility_type::select('id', 'facility_type_name')->where('type_id', '=', '4')->get();
            $location_area = \App\down_outlet_states::select('id', 'state_name')->get();
            $operational_status = \App\gas_status::select('id', 'status_name')->where('id', '<=', '4')->get();

            return $this->exportexcel('HSE Accreadited Waste Managers', ['Waste Managers'=>$waste_manager, 'company'=>$company, 'type_of_facility'=>$type_of_facility, 'location_area'=>$location_area, 'operational_status'=>$operational_status]);
        } else {
            $waste_manager = $waste_manager->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_waste_manager', compact('waste_manager', 'pending', 'unresolvedCount'));
    }

    private function waste_mgt_facilities(Request $request)
    {
        $waste_mgt_facilities = \App\she_accredited_waste_management_facility::orderBy('id', 'desc');
        $pending = \App\she_accredited_waste_management_facility::where('stage_id', '0')->get();
        $unresolvedCount = \App\she_accredited_waste_management_facility::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $waste_mgt_facilities = $waste_mgt_facilities->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $waste_mgt_facilities = $waste_mgt_facilities->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $waste_mgt_facilities = $waste_mgt_facilities->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('operational_permit', 'like', "%{$request->q}%")->orwhere('status', 'like', "%{$request->q}%")
                ->orwhereHas('facility_type', function ($query) use ($request) {
                    $query->where('facility_type_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $waste_mgt_facilities = collect($this->getTableColumns('she_waste_management_facilities'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $type_of_facility = \App\facility_type::select('id', 'facility_type_name')->where('type_id', '=', '4')->get();

            return   $this->exportexcel('HSE Waste Management Facility', ['Waste Mgt Facilities'=>$waste_mgt_facilities, 'type_of_facility'=>$type_of_facility]);
        } else {
            $waste_mgt_facilities = $waste_mgt_facilities->paginate(15);
        }

        return view('ajax.she_waste_management_facilities', compact('waste_mgt_facilities', 'pending', 'unresolvedCount'));
    }

    private function pettitions_receieved(Request $request)
    {
        $pettitions_receieved = \App\she_pettitions_received::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_pettitions_received::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\she_pettitions_received::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $pettitions_receieved = $pettitions_receieved->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $pettitions_receieved = $pettitions_receieved->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $pettitions_receieved = $pettitions_receieved->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%")->orWhere('petitioner', 'like', "%{$request->q}%")->orWhere('petitionee', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $pettitions_receieved = collect($this->getTableColumns('she_petitions_received'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $category = \App\she_pet_category::select('id', 'category_name')->where('type', 'Pet')->get();
            $action = \App\she_pet_action::select('id', 'action_name')->get();
            $status = \App\she_pet_status::select('id', 'status_name')->where('type', 'Pet')->get();

            return $this->exportexcel('pettitions_receieved', ['pettitions_receieved'=>$pettitions_receieved, 'category'=>$category, 'action'=>$action, 'status'=>$status]);
        } else {
            $pettitions_receieved = $pettitions_receieved->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_pettition_received', compact('pettitions_receieved', 'pending', 'unresolvedCount'));
    }

    private function chemical_certification(Request $request)
    {
        $chemical_certification = \App\she_chemical_certification::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_chemical_certification::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\she_chemical_certification::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $chemical_certification = $chemical_certification->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $chemical_certification = $chemical_certification->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $chemical_certification = $chemical_certification->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%")->orWhere('state_id', 'like', "%{$request->q}%")->orWhere('chemical_name', 'like', "%{$request->q}%")->orWhere('remark', 'like', "%{$request->q}%")
                ->orWhere('chemical_type', 'like', "%{$request->q}%")->orWhere('certification_date', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('she_pet_category', function ($query) use ($request) {
                    $query->where('category_name', 'like', "%{$request->q}%");
                });
            // ->orwhereHas('she_pet_status', function($query) use ($request){   $query->where('status_name','like',"%{$request->q}%");     });
        }

        if ($request->has('excel')) {
            $chemical_certification = collect($this->getTableColumns('she_chemical_certifications'))->filter(function ($value) {
                if (in_array($value, ['id', 'others', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) 
                {
                    return false;
                }
                  return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $category = \App\she_pet_category::select('id', 'category_name')->where('type', 'Lab')->get();
            $status = \App\she_pet_status::select('id', 'status_name')->where('type', 'Lab')->get();

            return   $this->exportexcel('HSE Chemical Certification', ['Chemical Certification'=>$chemical_certification, 'company'=>$company, 'category'=>$category, 'status'=>$status]);
        } else {
            $chemical_certification = $chemical_certification->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_chemical_certification', compact('chemical_certification', 'pending', 'unresolvedCount'));
    }

    private function accredited_laboratories(Request $request)
    {
        $accredited_laboratories = \App\she_accredited_laboratory::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_accredited_laboratory::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\she_accredited_laboratory::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $accredited_laboratories = $accredited_laboratories->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $accredited_laboratories = $accredited_laboratories->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $accredited_laboratories = $accredited_laboratories->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%")->orWhere('laboratory_name', 'like', "%{$request->q}%")->orWhere('request_type', 'like', "%{$request->q}%")
                ->orwhereHas('field_office', function ($query) use ($request) {
                    $query->where('field_office_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $accredited_laboratories = collect($this->getTableColumns('she_accredited_laboratories'))->filter(function ($value) {
                if (in_array($value, ['id', 'no_of_accredited_lab', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $field_office = \App\down_field_office::select('id', 'field_office_name')->get();

            return $this->exportexcel('accredited_laboratories', ['accredited_laboratories'=>$accredited_laboratories, 'field_office'=>$field_office]);
        } else {
            $accredited_laboratories = $accredited_laboratories->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_accredited_laboratories', compact('accredited_laboratories', 'pending', 'unresolvedCount'));
    }

    private function drilling_chemical(Request $request)
    {
        $drilling_chemical = \App\she_drilling_chemical::orderBy('id', 'desc');
        $pending = \App\she_drilling_chemical::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $drilling_chemical = $drilling_chemical->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $drilling_chemical = $drilling_chemical->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $drilling_chemical = collect($this->getTableColumns('she_drilling_chemicals'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('drilling_chemical', ['drilling_chemical'=>$drilling_chemical]);
        } else {
            $drilling_chemical = $drilling_chemical->paginate(15);
        }

        return view('ajax.she_drilling_chemical', compact('drilling_chemical', 'pending'));
    }

    private function environmental_restoration(Request $request)
    {
        $environmental_restoration = \App\she_environmental_restoration::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_environmental_restoration::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\she_environmental_restoration::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $environmental_restoration = $environmental_restoration->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $environmental_restoration = $environmental_restoration->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $environmental_restoration = $environmental_restoration->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%")->orwhereHas('status', function ($query) use ($request) {
                $query->where('status_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $environmental_restoration = collect($this->getTableColumns('she_environmental_restorations'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $status = \App\she_status::where('status_name', '<>', 'Under Processing')->select('id', 'status_name')->get();

            return   $this->exportexcel('environmental_restoration', ['environmental_restoration'=>$environmental_restoration, 'status'=>$status]);
        } else {
            $environmental_restoration = $environmental_restoration->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_environmental_restoration', compact('environmental_restoration', 'pending', 'unresolvedCount'));
    }

    private function environmental_studies(Request $request)
    {
        $environmental_studies = \App\she_environmental_studies::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_environmental_studies::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\she_environmental_studies::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $environmental_studies = $environmental_studies->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $environmental_studies = $environmental_studies->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $environmental_studies = $environmental_studies->where('year', 'like', "%{$request->q}%")
                ->orWhere('month', 'like', "%{$request->q}%")->orWhere('study_title', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('type', function ($query) use ($request) {
                    $query->where('type_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('status', function ($query) use ($request) {
                    $query->where('type_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $environmental_studies = collect($this->getTableColumns('she_environmental_studies'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $company = \App\company::select('id', 'company_name')->get();
            $type = \App\she_study_type::select('id', 'type_name')->where('type', 'study')->get();
            $status = \App\she_study_type::select('id', 'type_name')->where('type', 'status')->get();

            return $this->exportexcel('Environmental Studies', ['Environmental Studies'=>$environmental_studies, 'company'=>$company, 'type'=>$type, 'status'=>$status]);
        } else {
            $environmental_studies = $environmental_studies->paginate(15);
        }

        return view('ajax.she_environmental_studies', compact('environmental_studies', 'pending', 'unresolvedCount'));
    }

    private function environmental_compliance(Request $request)
    {
        $environmental_compliance = \App\she_environmental_compliance_monitoring::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_environmental_compliance_monitoring::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\she_environmental_compliance_monitoring::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $environmental_compliance = $environmental_compliance->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $environmental_compliance = $environmental_compliance->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $environmental_compliance = $environmental_compliance->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%")->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $environmental_compliance = collect($this->getTableColumns('she_environmental_compliance_monitoring'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $company = \App\company::select('id', 'company_name')->get();
            $compliance = ['Yes' => 'Yes', 'No' => 'No'];

            return $this->exportexcel('Environmental Compliance', ['Environmental Compliance'=>$environmental_compliance, 'company'=>$company, 'compliance'=>$compliance]);
        } else {
            $environmental_compliance = $environmental_compliance->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_environmental_compliance', compact('environmental_compliance', 'pending', 'unresolvedCount'));
    }

    private function medical_training_center(Request $request)
    {
        $medical_training_center = \App\she_medical_training_center::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_medical_training_center::where('stage_id', '0')->where('year', 2020)->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $medical_training_center = $medical_training_center->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orWhere('companies', 'like', "%{$request->q}%")->orWhere('facility_address', 'like', "%{$request->q}%")->orWhere('approved_courses', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $medical_training_center = $medical_training_center->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $medical_training_center = collect($this->getTableColumns('she_medical_training_centers'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('medical_training_center', ['medical_training_center'=>$medical_training_center]);
        } else {
            $medical_training_center = $medical_training_center->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_medical_training_center', compact('medical_training_center', 'pending'));
    }

    private function safety_permit(Request $request)
    {
        $safety_permit = \App\she_offshore_safety_permit::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_offshore_safety_permit::where('year', 2020)->where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $safety_permit = $safety_permit->where('year', 2020)->where('year', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $safety_permit = $safety_permit->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $safety_permit = collect($this->getTableColumns('she_offshore_safety_permit'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('safety_permit', ['safety_permit'=>$safety_permit]);
        } else {
            $safety_permit = $safety_permit->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_safety_permit', compact('safety_permit', 'pending'));
    }

    private function oil_spill_contingency(Request $request)
    {
        $oil_spill_contingency = \App\SheOilSpillContingency::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\SheOilSpillContingency::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\SheOilSpillContingency::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $oil_spill_contingency = $oil_spill_contingency->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $oil_spill_contingency = $oil_spill_contingency->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $oil_spill_contingency = $oil_spill_contingency->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('no_of_company', 'like', "%{$request->q}%")->orwhere('actual_no_of_company', 'like', "%{$request->q}%")
            ->orwhereHas('zone', function ($query) use ($request) {
                $query->where('zone_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('types', function ($query) use ($request) {
                $query->where('type_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('terrain', function ($query) use ($request) {
                $query->where('terrain_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $oil_spill_contingency = collect($this->getTableColumns('she_oil_spill_contingency'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $zone = \App\she_zone::select('id', 'zone_name')->get();
            $facility_type = \App\she_spill_facility::select('id', 'type_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();

            return   $this->exportexcel('HSE Oil Spill Contingency', ['Spill Contingency'=>$oil_spill_contingency, 'zone'=>$zone, 'facility_type'=>$facility_type, 'terrain'=>$terrain]);
        } else {
            $oil_spill_contingency = $oil_spill_contingency->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_oil_spill_contingency', compact('oil_spill_contingency', 'pending', 'unresolvedCount'));
    }

    private function radiation_safety_permit(Request $request)
    {
        $radiation_safety_permit = \App\she_radiation_safety_permit::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\she_radiation_safety_permit::where('stage_id', '0')->where('year', 2020)->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $radiation_safety_permit = $radiation_safety_permit->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('well_type', 'like', "%{$request->q}%")->orwhere('count', 'like', "%{$request->q}%")
                ->orwhere('well_name', 'like', "%{$request->q}%")->orwhere('concession', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }
        if ($request->has('a')) {
            $radiation_safety_permit = $radiation_safety_permit->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $radiation_safety_permit = collect($this->getTableColumns('she_radiation_safety_permits'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'pending_id', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $well_type = [['Exploratory'], ['Appraisal'], ['Development'], ['Others']];

            return $this->exportexcel('Radiation Safety Permit', ['Radiation Safety Permit'=>$radiation_safety_permit, 'company'=>$company, 'well_type'=>$well_type]);
        } else {
            $radiation_safety_permit = $radiation_safety_permit->where('year', 2020)->paginate(15);
        }

        return view('ajax.she_radiation_safety_permit', compact('radiation_safety_permit', 'pending'));
    }

    //GAS
    private function obligation(Request $request)
    {
        $gas_obligation = \App\gas_domestic_gas_obligation::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\gas_domestic_gas_obligation::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_domestic_gas_obligation::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_obligation = $gas_obligation->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_obligation = $gas_obligation->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) 
        {
            $gas_obligation = $gas_obligation->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) 
        {
            $gas_obligation = collect($this->getTableColumns('gas_domestic_gas_obligation'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();

            return   $this->exportexcel('Gas Gas Obligation', ['Gas Obligation'=>$gas_obligation, 'company'=>$company]);
        } else {
            $gas_obligation = $gas_obligation->where('year', 2020)->paginate(15);
        }

        return view('ajax.gas_obligation', compact('gas_obligation', 'pending', 'unresolvedCount'));
    }

    private function supply(Request $request)
    {
        $gas_supply = \App\gas_domestic_gas_supply::orderBy('id', 'desc');
        $pending = \App\gas_domestic_gas_supply::where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_domestic_gas_supply::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_supply = $gas_supply->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_supply = $gas_supply->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_supply = $gas_supply->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $gas_supply = collect($this->getTableColumns('gas_domestic_gas_supply'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'power', 'commercial', 'industry', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }
                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();

            return   $this->exportexcel('Gas Gas supply', ['Gas supply'=>$gas_supply, 'company'=>$company]);
        } else {
            $gas_supply = $gas_supply->where('year', 2020)->paginate(15);
        }

        return view('ajax.gas_supply', compact('gas_supply', 'pending', 'unresolvedCount'));
    }

    private function gas_supply_textile_industry(Request $request)
    {
        $gas_supply_textile_industry = \App\gas_supply_textile_industry::orderBy('id', 'desc');
        $pending = \App\gas_supply_textile_industry::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_supply_textile_industry = $gas_supply_textile_industry->where('year', 'like', "%{$request->q}%")->orwhereHas('sector', 'like', "%{$request->q}%")->orwhereHas('value', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $gas_supply_textile_industry = $gas_supply_textile_industry->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $gas_supply_textile_industry = collect($this->getTableColumns('gas_supply_textile_industries'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Gas Textile Industry', ['Gas Textile Industry'=>$gas_supply_textile_industry]);
        } else {
            $gas_supply_textile_industry = $gas_supply_textile_industry->paginate(15);
        }

        return view('ajax.gas_supply_textile_industry', compact('gas_supply_textile_industry', 'pending'));
    }

    private function summary(Request $request)
    {
        $gas_summary = \App\gas_summary_of_gas_production::orderBy('id', 'desc');
        $pending = \App\gas_summary_of_gas_production::where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_summary_of_gas_production::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_summary = $gas_summary->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_summary = $gas_summary->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_summary = $gas_summary->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%")
                ->orwhereHas('field', function ($query) use ($request) {
                    $query->where('field_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_summary = collect($this->getTableColumns('gas_summary_of_gas_production'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'total', 'contract_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field = \App\field::select('id', 'field_name')->get();
            $company = \App\company::select('id', 'company_name')->get();

            return   $this->exportexcel('Gas Gas Production', ['Gas Production Summary'=>$gas_summary, 'field'=>$field, 'company'=>$company]);
        } else {
            $gas_summary = $gas_summary->paginate(15);
        }

        return view('ajax.gas_summary', compact('gas_summary', 'pending', 'unresolvedCount'));
    }

    private function utilization(Request $request)
    {
        $gas_utilization = \App\gas_summary_of_gas_utilization::orderBy('id', 'desc');
        $pending = \App\gas_summary_of_gas_utilization::where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_summary_of_gas_utilization::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_utilization = $gas_utilization->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_utilization = $gas_utilization->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_utilization = $gas_utilization->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->orwhereHas('field', function ($query) use ($request) {
                    $query->where('field_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_utilization = collect($this->getTableColumns('gas_summary_of_gas_utilization'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field = \App\field::select('id', 'field_name')->get();
            $company = \App\company::select('id', 'company_name')->get();

            return $this->exportexcel('Gas Gas Utilization', ['Gas Utilization Performance'=>$gas_utilization, 'company'=>$company, 'field'=>$field]);
        } else {
            $gas_utilization = $gas_utilization->paginate(15);
        }

        return view('ajax.gas_utilization', compact('gas_utilization', 'pending', 'unresolvedCount'));
    }

    private function gas_balance(Request $request)
    {
        $gas_balance = \App\gas_summary_of_gas_utilization::orderBy('id', 'desc');
        $pending = \App\gas_summary_of_gas_utilization::where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_summary_of_gas_utilization::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_balance = $gas_balance->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_balance = $gas_balance->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_balance = $gas_balance->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
            ->orwhereHas('field', function ($query) use ($request) {
                $query->where('field_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $gas_balance = collect($this->getTableColumns('gas_summary_of_gas_utilization'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field = \App\field::select('id', 'field_name')->get();
            $company = \App\company::select('id', 'company_name')->get();

            return $this->exportexcel('Gas Gas Balance', ['Gas Balance'=>$gas_balance, 'company'=>$company, 'field'=>$field]);
        } else {
            $gas_balance = $gas_balance->paginate(15);
        }

        return view('ajax.gas_balance', compact('gas_balance', 'pending', 'unresolvedCount'));

        //
    }

    private function Facility(Request $request)
    {
        $gas_facility = \App\gas_major_gas_facilities::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\gas_major_gas_facilities::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\gas_major_gas_facilities::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_facility = $gas_facility->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_facility = $gas_facility->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_facility = $gas_facility->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orWhere('month', 'like', "%{$request->q}%")->orWhere('license_status', 'like', "%{$request->q}%")->orWhere('location_id', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('facility', function ($query) use ($request) {
                $query->where('facility_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('facility_type', function ($query) use ($request) {
                $query->where('facility_type_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('terrain', function ($query) use ($request) {
                $query->where('terrain_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('gas_status', function ($query) use ($request) {
                $query->where('status_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            // $gas_facility = $gas_facility->select('year', 'month', 'company_id', 'facility_id', 'facility_type_id', 'location_id', 'terrain_id', 'design_capacity', 'operating_capacity', 'facility_design_life', 'date_of_commissioning', 'status_id', 'license_status')->get()->toArray();

            $gas_facility = collect($this->getTableColumns('gas_major_gas_facilities'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $facility = \App\facility::select('id', 'facility_name')->get();
            $facility_type = \App\facility_type::select('id', 'facility_type_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();
            $gas_status = \App\gas_status::select('id', 'status_name')->get();

            return   $this->exportexcel('Gas Project', ['Major Gas Facilities'=>$gas_facility, 'company'=>$company, 'facility'=>$facility, 'facility_type'=>$facility_type, 'terrain'=>$terrain, 'gas_status'=>$gas_status]);
        } else {
            $gas_facility = $gas_facility->where('year', 2020)->paginate(15);
        }

        return view('ajax.gas_facility', compact('gas_facility', 'pending', 'unresolvedCount'));
    }

    private function plant(Request $request)
    {
        $gas_plant = \App\gas_processing_plant_project::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\gas_processing_plant_project::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_processing_plant_project::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_plant = $gas_plant->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_plant = $gas_plant->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_plant = $gas_plant->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('project_title', 'like', "%{$request->q}%")
            ->orWhere('start_date', 'like', "%{$request->q}%")
            ->orWhere('end_date', 'like', "%{$request->q}%")->orWhere('project_objective', 'like', "%{$request->q}%")
            ->orWhere('location_id', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('status', function ($query) use ($request) {
                $query->where('status', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $gas_plant = collect($this->getTableColumns('gas_processing_plant_project'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            // $location = \App\location::select('id', 'location_name')->get();
            $status = \App\status_category::select('id', 'status')->get();

            return   $this->exportexcel('Gas Project', ['Gas Processing Plant Project'=>$gas_plant, 'company'=>$company, 'status'=>$status]);
        } else {
            $gas_plant = $gas_plant->where('year', 2020)->paginate(15);
        }

        return view('ajax.gas_plant', compact('gas_plant', 'pending', 'unresolvedCount'));
    }

    private function gas_distribution(Request $request)
    {
        $gas_distribution = \App\gas_processing_plant_project::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\gas_processing_plant_project::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\gas_processing_plant_project::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_distribution = $gas_distribution->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_distribution = $gas_distribution->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_distribution = $gas_distribution->where('year', 2020)->where('project_title', 'like', "%{$request->q}%")
                ->orWhere('project_objective', 'like', "%{$request->q}%")->orWhere('location_id', 'like', "%{$request->q}%")
                ->orWhere('lng', 'like', "%{$request->q}%")->orWhere('ng', 'like', "%{$request->q}%")
                ->orWhere('cng', 'like', "%{$request->q}%")->orWhere('lpg', 'like', "%{$request->q}%")
                ->orWhere('ngr', 'like', "%{$request->q}%")->orWhere('condensate', 'like', "%{$request->q}%")
                ->orWhere('fertilizer', 'like', "%{$request->q}%")->orWhere('petrochemical', 'like', "%{$request->q}%")
                ->orWhere('start_date', 'like', "%{$request->q}%")->orWhere('end_date', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('status', function ($query) use ($request) {
                    $query->where('status_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_distribution = collect($this->getTableColumns('gas_processing_plant_project'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $status = \App\status_category::select('id', 'status')->get();

            return   $this->exportexcel('Gas Distribution', ['Gas Distribution'=>$gas_distribution, 'company'=>$company, 'status'=>$status]);
        } else {
            $gas_distribution = $gas_distribution->where('year', 2020)->paginate(15);
        }
        return view('ajax.gas_distribution', compact('gas_distribution', 'pending', 'unresolvedCount'));
    }

    private function gas_prod_vol_permit(Request $request)
    {
        $gas_prod_vol_permit = \App\gas_product_vol_import_permit::orderBy('id', 'desc');
        $pending = \App\gas_product_vol_import_permit::where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_product_vol_import_permit::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_prod_vol_permit = $gas_prod_vol_permit->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_prod_vol_permit = $gas_prod_vol_permit->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_prod_vol_permit = $gas_prod_vol_permit
                ->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->where('import_permit_no', 'like', "%{$request->q}%")->orwhere('issued_date', 'like', "%{$request->q}%")
                ->where('volume', 'like', "%{$request->q}%")->orwhere('validity_period', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('country', function ($query) use ($request) {
                    $query->where('country_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_prod_vol_permit = collect($this->getTableColumns('gas_product_vol_import_permit'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();
            $country = \App\Country::select('id', 'country_name')->get();

            return   $this->exportexcel('GAS Import Permits', ['Gas Import Permits'=>$gas_prod_vol_permit, 'company'=>$company, 'product'=>$product, 'country'=>$country]);
        } else {
            $gas_prod_vol_permit = $gas_prod_vol_permit->paginate(15);
        }

        return view('ajax.gas_product_volume_permit', compact('gas_prod_vol_permit', 'pending', 'unresolvedCount'));
    }

    private function gas_ref_production(Request $request)
    {
        $gas_ref_production = \App\gas_refinery_production_volumes::orderBy('id', 'desc');
        $pending = \App\gas_refinery_production_volumes::where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_refinery_production_volumes::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_ref_production = $gas_ref_production->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_ref_production = $gas_ref_production->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_ref_production = $gas_ref_production
                ->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->where('import_permit_no', 'like', "%{$request->q}%")->orwhere('vessel_name', 'like', "%{$request->q}%")
                ->where('volume', 'like', "%{$request->q}%")->orwhere('date_discharged', 'like', "%{$request->q}%")
                ->orwhere('zone', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_ref_production = collect($this->getTableColumns('gas_refinery_production'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();

            return   $this->exportexcel('GAS Actual Import', ['Actual Import'=>$gas_ref_production, 'company'=>$company, 'state'=>$state, 'product'=>$product]);
        } else {
            $gas_ref_production = $gas_ref_production->paginate(15);
        }

        return view('ajax.gas_refinery_production', compact('gas_ref_production', 'pending', 'unresolvedCount'));
    }

    private function gas_actual_production(Request $request)
    {
        $gas_actual_production = \App\gas_actual_production::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\gas_actual_production::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\gas_actual_production::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_actual_production = $gas_actual_production->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_actual_production = $gas_actual_production->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_actual_production = $gas_actual_production
                ->where('year', 2020)
                ->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->where('import_permit_no', 'like', "%{$request->q}%")->orwhere('vessel_name', 'like', "%{$request->q}%")
                ->where('volume', 'like', "%{$request->q}%")->orwhere('date_discharged', 'like', "%{$request->q}%")
                ->orwhere('zone', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_actual_production = collect($this->getTableColumns('gas_actual_productions'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();

            return   $this->exportexcel('GAS Actual Import Temp', ['Actual Import Temp'=>$gas_actual_production, 'company'=>$company, 'state'=>$state, 'product'=>$product]);
        } else {
            $gas_actual_production = $gas_actual_production->where('year', 2020)->paginate(15);
        }

        return view('ajax.gas_actual_production', compact('gas_actual_production', 'pending', 'unresolvedCount'));
    }

    private function gas_export(Request $request)
    {
        $gas_export = \App\gas_export_volume_vessel::orderBy('id', 'desc');
        $pending = \App\gas_export_volume_vessel::where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_export_volume_vessel::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_export = $gas_export->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_export = $gas_export->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_export = $gas_export->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->orwhere('no_of_vessel', 'like', "%{$request->q}%")->orwhere('volume', 'like', "%{$request->q}%")
                ->orwhereHas('equity', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('stream', function ($query) use ($request) {
                    $query->where('stream_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_export = collect($this->getTableColumns('gas_export_by_volume_vessels'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $equity = \App\company::select('id', 'company_name')->where('id', '14')->orwhere('id', '89')->orwhere('id', '91')->get();
            $stream = \App\Stream::select('id', 'stream_name')->where('id', '34')->orwhere('id', '7')->orwhere('id', '39')->orwhere('id', '44')->get();
            $product = \App\down_product::select('id', 'product_name')->where('id', '>=', '16')->where('id', '<=', '22')->get();

            return   $this->exportexcel('GAS Export Vessels', ['Gas Export'=>$gas_export, 'equity'=>$equity, 'stream'=>$stream, 'product'=>$product]);
        } else {
            $gas_export = $gas_export->paginate(15);
        }

        return view('ajax.gas_export_volume_vessel', compact('gas_export', 'pending', 'unresolvedCount'));
    }

    private function gas_product_lpg(Request $request)
    {
        $gas_product_lpg = \App\gas_product_monitoring::where('product_type', 'LPG')->orderBy('id', 'desc');
        $pending = \App\gas_product_monitoring::where('product_type', 'LPG')->where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_product_monitoring::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_product_lpg = $gas_product_lpg->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_product_lpg = $gas_product_lpg->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_product_lpg = $gas_product_lpg
                ->where('year', 'like', "%{$request->q}%")->where('lga', 'like', "%{$request->q}%")->orwhere('zone', 'like', "%{$request->q}%")
                ->orwhere('capacity', 'like', "%{$request->q}%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%{$request->q}%");})
                ->orwhereHas('category', function ($query) use ($request) {
                    $query->where('category_name', 'like', "%{$request->q}%");
                });
            // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%{$request->q}%"); });
        }

        if ($request->has('excel')) {
            $gas_product_lpg = collect($this->getTableColumns('gas_product_monitoring'))->filter(function ($value) {
                if (in_array($value, ['id', 'company_id', 'state_id', 'lga', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->orderBy('company_name', 'asc')->get();
            $category = \App\gas_category::select('id', 'category_name')->where('type', 'LPG')->orderBy('category_name', 'asc')->get();
            $state = \App\down_outlet_states::select('id', 'state_name')->get();

            return $this->exportexcel('Gas Product LPG', ['Product LPG'=>$gas_product_lpg, 'company'=>$company, 'category'=>$category, 'state'=>$state]);
        } else {
            $gas_product_lpg = $gas_product_lpg->paginate(15);
        }

        return view('ajax.gas_product_lpg', compact('gas_product_lpg', 'pending', 'unresolvedCount'));
    }

    private function gas_product_cng(Request $request)
    {
        $gas_product_cng = \App\gas_product_monitoring::where('product_type', 'CNG')->where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\gas_product_monitoring::where('product_type', 'CNG')->where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\gas_product_monitoring::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_product_cng = $gas_product_cng->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_product_cng = $gas_product_cng->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_product_cng = $gas_product_cng
                ->where('year', 2020)
                ->where('year', 'like', "%{$request->q}%")->orwhere('lga', 'like', "%{$request->q}%")
                ->orwhere('zone', 'like', "%{$request->q}%")->orwhere('capacity', 'like', "%{$request->q}%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%{$request->q}%"); })
                ->orwhereHas('category', function ($query) use ($request) {
                    $query->where('category_name', 'like', "%{$request->q}%");
                });
            // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%{$request->q}%");  });
        }

        if ($request->has('excel')) {
            $gas_product_cng = collect($this->getTableColumns('gas_product_monitoring'))->filter(function ($value) {
                if (in_array($value, ['id', 'company_id', 'state_id', 'lga', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->orderBy('company_name', 'asc')->get();
            $category = \App\gas_category::select('id', 'category_name')->where('type', 'CNG')->orderBy('category_name', 'asc')->get();
            $state = \App\down_outlet_states::select('id', 'state_name')->get();

            return $this->exportexcel('Gas Product CNG', ['Product CNG'=>$gas_product_cng, 'company'=>$company, 'category'=>$category, 'state'=>$state]);
        } else {
            $gas_product_cng = $gas_product_cng->where('year', 2020)->paginate(15);
        }

        return view('ajax.gas_product_cng', compact('gas_product_cng', 'pending', 'unresolvedCount'));
    }

    private function gas_product_lng(Request $request)
    {
        $gas_product_lng = \App\gas_product_monitoring::where('product_type', 'LNG')->where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\gas_product_monitoring::where('product_type', 'LNG')->where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\gas_product_monitoring::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_product_lng = $gas_product_lng->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_product_lng = $gas_product_lng->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_product_lng = $gas_product_lng
                ->where('year', 2020)
                ->where('year', 'like', "%{$request->q}%")->orwhere('lga', 'like', "%{$request->q}%")
                ->orwhere('zone', 'like', "%{$request->q}%")->orwhere('capacity', 'like', "%{$request->q}%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%{$request->q}%"); })
                ->orwhereHas('category', function ($query) use ($request) {
                    $query->where('category_name', 'like', "%{$request->q}%");
                });
            // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%{$request->q}%"); });
        }

        if ($request->has('excel')) {
            $gas_product_lng = collect($this->getTableColumns('gas_product_monitoring'))->filter(function ($value) {
                if (in_array($value, ['id', 'company_id', 'state_id', 'lga', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->orderBy('company_name', 'asc')->get();
            $category = \App\gas_category::select('id', 'category_name')->where('type', 'LNG')->orderBy('category_name', 'asc')->get();
            $state = \App\down_outlet_states::select('id', 'state_name')->get();

            return $this->exportexcel('Gas Product LNG', ['Product LNG'=>$gas_product_lng, 'company'=>$company, 'category'=>$category, 'state'=>$state]);
        } else {
            $gas_product_lng = $gas_product_lng->where('year', 2020)->paginate(15);
        }

        return view('ajax.gas_product_lng', compact('gas_product_lng', 'pending', 'unresolvedCount'));
    }

    private function gas_product_propane(Request $request)
    {
        $gas_product_propane = \App\gas_product_monitoring::where('product_type', 'PROPANE')->orderBy('id', 'desc');
        $pending = \App\gas_product_monitoring::where('product_type', 'PROPANE')->where('stage_id', '0')->get();
        $unresolvedCount = \App\gas_product_monitoring::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_product_propane = $gas_product_propane->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_product_propane = $gas_product_propane->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_product_propane = $gas_product_propane
                ->where('year', 'like', "%{$request->q}%")->orwhere('lga', 'like', "%{$request->q}%")
                ->orwhere('zone', 'like', "%{$request->q}%")->orwhere('capacity', 'like', "%{$request->q}%")
                // ->orwhereHas('company', function($query) use ($request){ $query->where('company_name','like',"%{$request->q}%"); })
                ->orwhereHas('category', function ($query) use ($request) {
                    $query->where('category_name', 'like', "%{$request->q}%");
                });
            // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%{$request->q}%");  });
        }

        if ($request->has('excel')) {
            $gas_product_propane = collect($this->getTableColumns('gas_product_monitoring'))->filter(function ($value) {
                if (in_array($value, ['id', 'company_id', 'state_id', 'lga', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->orderBy('company_name', 'asc')->get();
            $category = \App\gas_category::select('id', 'category_name')->where('type', 'PROPANE')->orderBy('category_name', 'asc')->get();
            $state = \App\down_outlet_states::select('id', 'state_name')->get();

            return $this->exportexcel('Gas Product PROPANE', ['Product PROPANE'=>$gas_product_propane, 'company'=>$company, 'category'=>$category, 'state'=>$state]);
        } else {
            $gas_product_propane = $gas_product_propane->paginate(15);
        }

        return view('ajax.gas_product_propane', compact('gas_product_propane', 'pending', 'unresolvedCount'));
    }

    //DOWNSTREAM
    private function terminal(Request $request)
    {
        $t_stream_prod = \App\down_terminal_stream_prod::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_terminal_stream_prod::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_terminal_stream_prod::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $t_stream_prod = $t_stream_prod->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $t_stream_prod = $t_stream_prod->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $t_stream_prod = $t_stream_prod->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('stream', function ($query) use ($request) {
                    $query->where('stream_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('prod_type', function ($query) use ($request) {
                    $query->where('production_type_name', 'like', "%{$request->q}%");
                });

            //Session::put('crude_terminal', $t_stream_prod);
        }

        if ($request->has('excel')) {
            $t_stream_prod = collect($this->getTableColumns('down_terminal_stream_prod'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'stream_total', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $stream = \App\Stream::select('id', 'stream_name')->get();
            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();
            $prod_type = \App\down_production_type::select('id', 'production_type_name')->get();

            return   $this->exportexcel('Downstream Reconciled Crude Production', ['Reconciled Crude Production'=>$t_stream_prod, 'stream'=>$stream, 'company'=>$company, 'contract'=>$contract, 'production_type'=>$prod_type]);
        } else {
            $t_stream_prod = $t_stream_prod->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_terminal', compact('t_stream_prod', 'pending', 'unresolvedCount'));
    }

    private function export(Request $request)
    {
        $crude_export = \App\down_monthly_summary_crude_export::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_monthly_summary_crude_export::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_monthly_summary_crude_export::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $crude_export = $crude_export->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $crude_export = $crude_export->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $crude_export = $crude_export->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('stream', function ($query) use ($request) {
                    $query->where('stream_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('prod_type', function ($query) use ($request) {
                    $query->where('production_type_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) 
        {
            $crude_export = collect($this->getTableColumns('down_monthly_summary_crude_export'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'stream_total', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $stream = \App\Stream::select('id', 'stream_name')->get();
            $prod_type = \App\down_production_type::select('id', 'production_type_name')->get();

            return   $this->exportexcel('Downstream Crude Export', ['Crude Export'=>$crude_export, 'stream'=>$stream, 'production_type'=>$prod_type]);
        } else {
            $crude_export = $crude_export->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_export', compact('crude_export', 'pending', 'unresolvedCount'));
    }

    private function destination(Request $request)
    {
        $export_dest = \App\down_crude_export_by_destination::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_crude_export_by_destination::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_crude_export_by_destination::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $export_dest = $export_dest->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $export_dest = $export_dest->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $export_dest = $export_dest->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('stream', function ($query) use ($request) {
                    $query->where('stream_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('country', function ($query) use ($request) {
                    $query->where('country_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('region', function ($query) use ($request) {
                    $query->where('name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $export_dest = collect($this->getTableColumns('down_crude_export_by_destination'))->filter(function ($value) {
                if (in_array($value, ['id', 'destination', 'pending_id', 'stream_total', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $stream = \App\Stream::select('id', 'stream_name')->get();
            $region = \App\Region::select('id', 'name')->get();
            $country = \App\Country::select('id', 'country_name')->get();
            $company = \App\company::select('id', 'company_name')->get();

            return $this->exportexcel('Downstream Crude Export Destination', ['Crude Export Destination'=>$export_dest, 'stream'=>$stream, 'region'=>$region, 'country'=>$country, 'company'=>$company]);
        } else {
            $export_dest = $export_dest->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_destination', compact('export_dest', 'pending', 'unresolvedCount'));
    }

    private function dest_company(Request $request)
    {
        $dest_company = \App\down_crude_export_by_company::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_crude_export_by_company::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_crude_export_by_company::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $dest_company = $dest_company->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $dest_company = $dest_company->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $dest_company = $dest_company->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('country', function ($query) use ($request) {
                    $query->where('country_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('region', function ($query) use ($request) {
                    $query->where('name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $dest_company = collect($this->getTableColumns('down_crude_export_by_company'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $country = \App\Country::select('id', 'country_name')->get();
            $region = \App\Region::select('id', 'name')->get();
            $company = \App\company::select('id', 'company_name')->get();

            return   $this->exportexcel('Downstream Crude Export Company', ['Crude Export Company'=>$dest_company, 'region'=>$region, 'country'=>$country, 'company'=>$company]);
        } else {
            $dest_company = $dest_company->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_dest_company', compact('dest_company', 'pending', 'unresolvedCount'));
    }

    private function ave_price(Request $request)
    {
        $ave_price = \App\up_ave_price_crude_stream::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_ave_price_crude_stream::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\up_ave_price_crude_stream::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $ave_price = $ave_price->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $ave_price = $ave_price->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $ave_price = $ave_price->where('year', 2020)->where('year', 'like', "%{$request->q}%")
            ->orwhereHas('stream', function ($query) use ($request) {
                $query->where('stream_name', 'like', "%{$request->q}%");
            });
        }
        if ($request->has('excel')) {
            $ave_price = collect($this->getTableColumns('up_ave_price_crude_stream'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'stream_total', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $stream = \App\Stream::select('id', 'stream_name')->get();

            return   $this->exportexcel('Downstream Average Price', ['Crude Average Price'=>$ave_price, 'stream'=>$stream]);
        } else {
            $ave_price = $ave_price->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_ave_price', compact('ave_price', 'pending', 'unresolvedCount'));
    }

    private function pet_plant(Request $request)
    {
        $p_plant = \App\down_petrochemical_plant::orderBy('id', 'desc');
        $pending = \App\down_petrochemical_plant::where('stage_id', '0')->get();
        $unresolvedCount = \App\down_petrochemical_plant::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $p_plant = $p_plant->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $p_plant = $p_plant->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $p_plant = $p_plant->where('location', 'like', "%{$request->q}%")
                ->orwhereHas('locations', function ($query) use ($request) {
                    $query->where('plant_location_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('ownerships', function ($query) use ($request) {
                    $query->where('ownership_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('plant_types', function ($query) use ($request) {
                    $query->where('plant_type_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('feedstocks', function ($query) use ($request) {
                    $query->where('feedstock_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $p_plant = collect($this->getTableColumns('down_petrochemical_plant'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $locations = \App\down_plant_location::select('id', 'plant_location_name')->get();
            $ownerships = \App\down_ownership::select('id', 'ownership_name')->get();
            $plant_types = \App\down_plant_type::select('id', 'plant_type_name')->get();
            $feedstocks = \App\down_feedstock::select('id', 'feedstock_name')->get();
            $product = \App\down_product::select('id', 'product_name')->get();

            return   $this->exportexcel('Downstream Pet Plant Projects', ['Petrochemical Plant Projects'=>$p_plant, 'state'=>$state, 'ownerships'=>$ownerships, 'plant_types'=>$plant_types, 'feedstocks'=>$feedstocks, 'product'=>$product, 'locations'=>$locations]);
        } else {
            $p_plant = $p_plant->paginate(15);
        }

        return view('ajax.down_pet_plant', compact('p_plant', 'pending', 'unresolvedCount'));
    }

    private function ref_capacity(Request $request)
    {
        $ref_capacities = \App\down_refinary_capacity_utilization::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_refinary_capacity_utilization::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_refinary_capacity_utilization::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $ref_capacities = $ref_capacities->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $ref_capacities = $ref_capacities->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $ref_capacities = $ref_capacities->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('location', 'like', "%{$request->q}%")
                // ->orwhereHas('state', function($query) use ($request){ $query->where('state_name','like',"%{$request->q}%");   })
                // ->orwhereHas('product', function($query) use ($request){ $query->where('product_name','like',"%{$request->q}%"); })
                ->orwhereHas('refinery', function ($query) use ($request) {
                    $query->where('plant_location_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $ref_capacities = collect($this->getTableColumns('down_refinary_capacity_utilization'))->filter(function ($value) {
                if (in_array($value, ['id', 'product_id', 'state_id', 'location', 'pending_id', 'total', 'total_utilization', 'capacity_utilization', 'q1', 'q2', 'q3', 'q4', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $refinery = \App\down_plant_location::select('id', 'plant_location_name')->get();
            // $product = \App\down_import_product::select('id', 'product_name')->get();
            // $state = \App\down_outlet_states::select('id', 'state_name')->get();

            return  $this->exportexcel('Downstream Refinery Capacity', ['Refinery Capacity Utilization'=>$ref_capacities, 'refinery'=>$refinery]);
        } else {
            $ref_capacities = $ref_capacities->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_refinary_capacity', compact('ref_capacities', 'pending', 'unresolvedCount'));
    }

    private function ref_performance(Request $request)
    {
        $ref_performances = \App\down_refinery_performance::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_refinery_performance::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_refinery_performance::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $ref_performances = $ref_performances->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $ref_performances = $ref_performances->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $ref_performances = $ref_performances->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('processing_unit', 'like', "%{$request->q}%")->orwhere('location', 'like', "%{$request->q}%")->orwhere('value', 'like', "%{$request->q}%")
                ->orwhereHas('refinery', function ($query) use ($request) {
                    $query->where('plant_location_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $ref_performances = collect($this->getTableColumns('down_refinery_performance'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $refinery = \App\down_plant_location::select('id', 'plant_location_name')->get();

            return   $this->exportexcel('Downstream Refinery Performance', ['Refinery Performance'=>$ref_performances, 'refinery'=>$refinery]);
        } else {
            $ref_performances = $ref_performances->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_refinary_performance', compact('ref_performances', 'pending', 'unresolvedCount'));
    }

    private function plant_depot(Request $request)
    {
        $plant_depot = \App\down_depot::orderBy('id', 'desc');
        $pending = \App\down_depot::where('stage_id', '0')->get();
        $unresolvedCount = \App\down_depot::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $plant_depot = $plant_depot->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $plant_depot = $plant_depot->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $plant_depot = $plant_depot->where('year', 'like', "%{$request->q}%")->orwhere('depot_name', 'like', "%{$request->q}%")->orwhere('location', 'like', "%{$request->q}%")->orwhere('truckout', 'like', "%{$request->q}%")
                ->orwhereHas('ownership', function ($query) use ($request) {
                    $query->where('ownership_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $plant_depot = collect($this->getTableColumns('down_depot'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $ownership = \App\down_ownership::select('id', 'ownership_name')->get();
            $product = \App\down_product::select('id', 'product_name')->get();

            return   $this->exportexcel('Downstream Plant Depot', ['Plant Depot'=>$plant_depot, 'state'=>$state, 'ownership'=>$ownership, 'product'=>$product]);
        } else {
            $plant_depot = $plant_depot->paginate(15);
        }

        return view('ajax.down_depot', compact('plant_depot', 'pending', 'unresolvedCount'));
    }

    private function plant_jetty(Request $request)
    {
        $plant_jetty = \App\down_jetty::orderBy('id', 'desc');
        $pending = \App\down_jetty::where('stage_id', '0')->get();
        $unresolvedCount = \App\down_jetty::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $plant_jetty = $plant_jetty->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $plant_jetty = $plant_jetty->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $plant_jetty = $plant_jetty->where('year', 'like', "%{$request->q}%")->orwhere('jetty_name', 'like', "%{$request->q}%")->orwhere('location', 'like', "%{$request->q}%")
                ->orwhereHas('ownership', function ($query) use ($request) {
                    $query->where('ownership_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $plant_jetty = collect($this->getTableColumns('down_jetty'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $ownership = \App\down_ownership::select('id', 'ownership_name')->get();
            $product = \App\down_product::select('id', 'product_name')->get();

            return   $this->exportexcel('Downstream Plant Jetty', ['Plant Jetty'=>$plant_jetty, 'state'=>$state, 'ownership'=>$ownership, 'product'=>$product]);
        } else {
            $plant_jetty = $plant_jetty->paginate(15);
        }

        return view('ajax.down_jetty', compact('plant_jetty', 'pending', 'unresolvedCount'));
    }

    private function plant_terminal(Request $request)
    {
        $plant_terminal = \App\down_terminal::orderBy('id', 'desc');
        $pending = \App\down_terminal::where('stage_id', '0')->get();
        $unresolvedCount = \App\down_terminal::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $plant_terminal = $plant_terminal->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $plant_terminal = $plant_terminal->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $plant_terminal = $plant_terminal->where('year', 'like', "%{$request->q}%")->orwhere('terminal_name', 'like', "%{$request->q}%")->orwhere('location', 'like', "%{$request->q}%")
                ->orwhereHas('facility_type', function ($query) use ($request) {
                    $query->where('facility_type_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('ownership', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $plant_terminal = collect($this->getTableColumns('down_terminal'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $facility_type = \App\facility_type::select('id', 'facility_type_name')->get();
            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $ownership = \App\company::select('id', 'company_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();

            return   $this->exportexcel('Downstream Plant Terminal', ['Plant Terminal'=>$plant_terminal, 'facility_type'=>$facility_type, 'state'=>$state, 'ownership'=>$ownership, 'product'=>$product]);
        } else {
            $plant_terminal = $plant_terminal->paginate(15);
        }

        return view('ajax.down_terminal_facility', compact('plant_terminal', 'pending', 'unresolvedCount'));
    }

    private function import_prod(Request $request)
    {
        $imp_products = \App\down_import_product::orderBy('id', 'desc');
        $pending = \App\down_import_product::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $imp_products = $imp_products->where('product_name', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $imp_products = $imp_products->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $imp_products = $imp_products->where('id', 1)->select('product_name')->get()->toArray();
        } else {
            $imp_products = $imp_products->paginate(15);
        }

        return view('ajax.down_import_product', compact('imp_products', 'pending'));
    }

    private function prod_vol_permit(Request $request)
    {
        $prod_vol_permit = \App\down_product_vol_import_permit::orderBy('id', 'desc');
        $pending = \App\down_product_vol_import_permit::where('stage_id', '0')->get();
        $unresolvedCount = \App\down_product_vol_import_permit::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $prod_vol_permit = $prod_vol_permit->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $prod_vol_permit = $prod_vol_permit->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $prod_vol_permit = $prod_vol_permit->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('market_segment', function ($query) use ($request) {
                    $query->where('market_segment_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $prod_vol_permit = collect($this->getTableColumns('down_product_vol_import_permit'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'total', 'total_litres', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $market_segment = \App\down_market_segment::select('id', 'market_segment_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();

            return  $this->exportexcel('Downstream Import Permits', ['Product Import Permits'=>$prod_vol_permit, 'market_segment'=>$market_segment, 'product'=>$product]);
        } else {
            $prod_vol_permit = $prod_vol_permit->paginate(15);
        }

        return view('ajax.down_product_volume_permit', compact('prod_vol_permit', 'pending', 'unresolvedCount'));
    }

    private function prod_vol_permit_vessel(Request $request)
    {
        $prod_vol_permit_vessel = \App\down_product_vol_import_permit_vessel::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_product_vol_import_permit_vessel::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_product_vol_import_permit_vessel::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $prod_vol_permit_vessel = $prod_vol_permit_vessel->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $prod_vol_permit_vessel = $prod_vol_permit_vessel->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $prod_vol_permit_vessel = $prod_vol_permit_vessel->where('year', 2020)->where('depot_name', 'like', "%{$request->q}%")->orwhere('year', 'like', "%{$request->q}%")
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('field_office', function ($query) use ($request) {
                    $query->where('field_office_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $prod_vol_permit_vessel = collect($this->getTableColumns('down_product_vol_import_permit_vessels'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field_office = \App\down_field_office::select('id', 'field_office_name')->get();
            $product = \App\down_product::select('id', 'product_name')->get();

            return   $this->exportexcel('Downstream No of Product Vessels', ['No of Product Vessels'=>$prod_vol_permit_vessel, 'field_office'=>$field_office, 'product'=>$product]);
        } else {
            $prod_vol_permit_vessel = $prod_vol_permit_vessel->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_product_volume_permit_vessel', compact('prod_vol_permit_vessel', 'pending', 'unresolvedCount'));
    }

    private function ref_production(Request $request)
    {
        $ref_production = \App\down_refinary_production::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_refinary_production::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_refinary_production::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $ref_production = $ref_production->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $ref_production = $ref_production->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $ref_production = $ref_production->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('market_segment', function ($query) use ($request) {
                    $query->where('market_segment_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $ref_production = collect($this->getTableColumns('down_refinary_production'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'total', 'total_litres', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $market_segment = \App\down_market_segment::select('id', 'market_segment_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();
            $company = \App\company::select('id', 'company_name')->get();

            return $this->exportexcel('Downstream Refinery Production', ['Refinery Production'=>$ref_production, 'market_segment'=>$market_segment, 'product'=>$product, 'company'=>$company]);
        } else {
            $ref_production = $ref_production->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_refinery_production', compact('ref_production', 'pending', 'unresolvedCount'));
    }

    private function ref_volume(Request $request)
    {
        $ref_volume = \App\down_refinery_production_volumes::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_refinery_production_volumes::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_refinery_production_volumes::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $ref_volume = $ref_volume->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $ref_volume = $ref_volume->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $ref_volume = $ref_volume->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('refinery', function ($query) use ($request) {
                    $query->where('plant_location_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('stream', function ($query) use ($request) {
                    $query->where('stream_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $ref_volume = collect($this->getTableColumns('down_refinery_production_volumes'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'total', 'total_litres', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $refinery = \App\down_plant_location::select('id', 'plant_location_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();
            $stream = \App\Stream::select('id', 'stream_name')->get();

            return   $this->exportexcel('Downstream Refinery Production Vol', ['Refinery Production Volume'=>$ref_volume, 'refinery'=>$refinery, 'product'=>$product, 'stream'=>$stream]);
        } else {
            $ref_volume = $ref_volume->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_refinery_volume', compact('ref_volume', 'pending', 'unresolvedCount'));
    }

    private function retail_price(Request $request)
    {
        $ave_price_range = \App\down_ave_consumer_price_range::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_ave_consumer_price_range::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_ave_consumer_price_range::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $ave_price_range = $ave_price_range->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $ave_price_range = $ave_price_range->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $ave_price_range = $ave_price_range->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->orwhere('pms', 'like', "%{$request->q}%")->orwhere('pms_to', 'like', "%{$request->q}%")
                ->orwhere('ago', 'like', "%{$request->q}%")->orwhere('ago_to', 'like', "%{$request->q}%")->orwhere('dpk', 'like', "%{$request->q}%")->orwhere('dpk_to', 'like', "%{$request->q}%")
                ->orwhereHas('production_type', function ($query) use ($request) {
                    $query->where('market_segment_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $ave_price_range = collect($this->getTableColumns('down_ave_consumer_price_range'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $production_types = \App\down_market_segment::select('id', 'market_segment_name')->where('id', '>', 1)->where('id', '<', 6)->orderBy('market_segment_name', 'asc')->get();

            return   $this->exportexcel('Downstream Ave Price Range', ['Average Price Range'=>$ave_price_range, 'production_types'=>$production_types]);
        } else {
            $ave_price_range = $ave_price_range->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_price', compact('ave_price_range', 'pending', 'unresolvedCount'));
    }

    private function retail_outlet(Request $request)
    {
        $retail_outlet = \App\down_retail_outlet_summary::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_retail_outlet_summary::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_retail_outlet_summary::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $retail_outlet = $retail_outlet->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $retail_outlet = $retail_outlet->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $retail_outlet = $retail_outlet->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('market_segment', function ($query) use ($request) {
                    $query->where('market_segment_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $retail_outlet = collect($this->getTableColumns('down_retail_outlet_summary'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'total', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $market_segment = \App\down_market_segment::select('id', 'market_segment_name')->get();

            return   $this->exportexcel('Downstream Retails Outlets', ['Retails Outlets'=>$retail_outlet, 'state'=>$state, 'market_segment'=>$market_segment]);
        } else {
            $retail_outlet = $retail_outlet->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_retail_outlet', compact('retail_outlet', 'pending', 'unresolvedCount'));
    }

    private function outlet_capacity(Request $request)
    {
        $out_capacities = \App\down_outlet_storage_capacity::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_outlet_storage_capacity::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_outlet_storage_capacity::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $out_capacities = $out_capacities->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $out_capacities = $out_capacities->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $out_capacities = $out_capacities->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('state', function ($query) use ($request) {
                    $query->where('state_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('market_segment', function ($query) use ($request) {
                    $query->where('market_segment_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('product', function ($query) use ($request) {
                    $query->where('product_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $out_capacities = collect($this->getTableColumns('down_outlet_storage_capacity'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'total', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $state = \App\down_outlet_states::select('id', 'state_name')->get();
            $segment = \App\down_market_segment::where('id', '>', 1)->where('id', '<', 6)->select('id', 'market_segment_name')->get();
            $product = \App\down_import_product::select('id', 'product_name')->get();

            return   $this->exportexcel('Downstream Outlets Capacity', ['Outlets Capacity'=>$out_capacities, 'state'=>$state, 'segment'=>$segment, 'product'=>$product]);
        } else {
            $out_capacities = $out_capacities->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_outlet_capacity', compact('out_capacities', 'pending', 'unresolvedCount'));
    }

    private function l_marketer(Request $request)
    {
        $l_marketer = \App\down_licensed_oil_makerters::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_licensed_oil_makerters::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\down_licensed_oil_makerters::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $l_marketer = $l_marketer->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $l_marketer = $l_marketer->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $l_marketer = $l_marketer->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('market_category', function ($query) use ($request) {
                    $query->where('market_segment_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('location', function ($query) use ($request) {
                    $query->where('location_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $l_marketer = collect($this->getTableColumns('down_licensed_oil_makerters'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $market_category = \App\down_market_segment::select('id', 'market_segment_name')->get();
            $location = \App\down_storage_location::select('id', 'location_name')->get();

            return   $this->exportexcel('Downstream Lubricant Blending Plant', ['Lubricant Blending Plant'=>$l_marketer, 'market_category'=>$market_category, 'company'=>$company, 'location'=>$location]);
        } else {
            $l_marketer = $l_marketer->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_license_marketer', compact('l_marketer', 'pending', 'unresolvedCount'));
    }

    //UPSTREAM
    private function reserve_condensate(Request $request)
    {
        $reserves = \App\up_reserves_report::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_reserves_report::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\up_reserves_report::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $reserves = $reserves->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $reserves = $reserves->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $reserves = $reserves->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('condensate_reserves', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $reserves = collect($this->getTableColumns('up_reserves_report'))->filter(function ($value) {
                if (in_array($value, ['id', 'type_id', 'pending_id', 'terrain_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();

            return  $this->exportexcel('Upstream Condensate', ['Condensate Reserves'=>$reserves, 'company'=>$company, 'contract'=>$contract]);
        } else {
            $reserves = $reserves->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_reserve_report', compact('reserves', 'pending', 'unresolvedCount'));
    }

    private function reserve_oil(Request $request)
    {

        //returning only records for 2020 based on the clients request, but that wasnt the initial system design
        $reserve_oil = \App\up_reserves_oil::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_reserves_oil::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\up_reserves_oil::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $reserve_oil = $reserve_oil->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $reserve_oil = $reserve_oil->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $reserve_oil = $reserve_oil->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('oil_reserves', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $reserve_oil = collect($this->getTableColumns('up_reserves_oil'))->filter(function ($value) {
                if (in_array($value, ['id', 'type_id', 'pending_id', 'terrain_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();

            return   $this->exportexcel('Upstream Oil', ['Oil Reserves'=>$reserve_oil, 'company'=>$company, 'contract'=>$contract]);
        } else {
            $reserve_oil = $reserve_oil->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_reserve_oil', compact('reserve_oil', 'pending', 'unresolvedCount'));
    }

    private function reserve_replacement_rate(Request $request)
    {
        $reserve_replacement_rate = \App\up_reserve_replacement_rate::orderBy('id', 'desc');
        $pending = \App\up_reserve_replacement_rate::where('stage_id', '0')->get();
        $unresolvedCount = \App\up_reserve_replacement_rate::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $reserve_replacement_rate = $reserve_replacement_rate->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $reserve_replacement_rate = $reserve_replacement_rate->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $reserve_replacement_rate = $reserve_replacement_rate->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('oil_condensate_reserve', 'like', "%{$request->q}%")->orwhere('oil_condensate_production', 'like', "%{$request->q}%")
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $reserve_replacement_rate = collect($this->getTableColumns('up_reserve_replacement_rate'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $contract = \App\contract::select('id', 'contract_name')->get();

            return $this->exportexcel('Reserve Replacement Rate', ['Replacement Rate'=>$reserve_replacement_rate, 'contract'=>$contract]);
        } else {
            $reserve_replacement_rate = $reserve_replacement_rate->paginate(15);
        }

        return view('ajax.up_reserve_replacement_rate', compact('reserve_replacement_rate', 'pending', 'unresolvedCount'));
    }

    private function reserve_depletion_rate(Request $request)
    {
        $reserve_depletion_rate = \App\up_reserve_addition_depletion_rate::where('year',2020)->orderBy('id', 'desc');
        $pending = \App\up_reserve_addition_depletion_rate::where('year',2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\up_reserve_addition_depletion_rate::where('year',2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $reserve_depletion_rate = $reserve_depletion_rate->where('year',2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $reserve_depletion_rate = $reserve_depletion_rate->where('year',2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $reserve_depletion_rate = $reserve_depletion_rate->where('year',2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('production', 'like', "%{$request->q}%")->orwhere('net_addition', 'like', "%{$request->q}%")->orwhere('percent_net_addition', 'like', "%{$request->q}%")->orwhere('depletion_rate', 'like', "%{$request->q}%")->orwhere('oil_condensate', 'like', "%{$request->q}%")->orwhere('life_index', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $reserve_depletion_rate = collect($this->getTableColumns('up_reserve_addition_depletion_rate'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();

            return $this->exportexcel('Reserve Depletion Rate', ['Depletion Rate'=>$reserve_depletion_rate, 'company'=>$company, 'contract'=>$contract]);
        } else {
            $reserve_depletion_rate = $reserve_depletion_rate->where('year',2020)->paginate(15);
        }

        return view('ajax.up_reserve_depletion_rate', compact('reserve_depletion_rate', 'pending', 'unresolvedCount'));
    }

    private function reserve_gas(Request $request)
    {
        $reserve_gas = \App\up_reserves_gas::orderBy('id', 'desc');
        $pending = \App\up_reserves_gas::where('stage_id', '0')->get();
        $unresolvedCount = \App\up_reserves_gas::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $reserve_gas = $reserve_gas->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $reserve_gas = $reserve_gas->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $reserve_gas = $reserve_gas->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $reserve_gas = collect($this->getTableColumns('up_reserves_gas'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'total_gas', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at', 'contract_id'])) {
                    return false;
                }

                return $value;
            });
            $company = \App\company::select('id', 'company_name')->get();

            return   $this->exportexcel('Upstream Gas Reserves', ['Gas Reserves'=>$reserve_gas, 'company'=>$company]);
        } else {
            $reserve_gas = $reserve_gas->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_reserve_gas', compact('reserve_gas', 'pending', 'unresolvedCount'));
    }

    private function gas_reserve_depletion_rate(Request $request)
    {
        $gas_reserve_depletion_rate = \App\up_gas_reserve_addition_depletion_rate::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_gas_reserve_addition_depletion_rate::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\up_gas_reserve_addition_depletion_rate::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_reserve_depletion_rate = $gas_reserve_depletion_rate->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_reserve_depletion_rate = $gas_reserve_depletion_rate->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_reserve_depletion_rate = $gas_reserve_depletion_rate->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('production', 'like', "%{$request->q}%")->orwhere('net_addition', 'like', "%{$request->q}%")->orwhere('percent_net_addition', 'like', "%{$request->q}%")->orwhere('depletion_rate', 'like', "%{$request->q}%")->orwhere('oil_condensate', 'like', "%{$request->q}%")->orwhere('life_index', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $gas_reserve_depletion_rate = collect($this->getTableColumns('up_reserve_addition_depletion_rate'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();

            return $this->exportexcel('Gas Reserve Depletion Rate', ['Gas Depletion Rate'=>$gas_reserve_depletion_rate, 'company'=>$company, 'contract'=>$contract]);
        } else {
            $gas_reserve_depletion_rate = $gas_reserve_depletion_rate->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_gas_reserve_depletion_rate', compact('gas_reserve_depletion_rate', 'pending', 'unresolvedCount'));
    }

    private function crude_prods(Request $request)
    {
        $crude_prods = \App\up_provisional_crude_production::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_provisional_crude_production::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\up_provisional_crude_production::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $crude_prods = $crude_prods->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $crude_prods = $crude_prods->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        // if($request->has('q') && strlen($request->q)>=3)
        // {
        //     $crude_prods = $crude_prods->getQuery($request->q);
        // }
        if ($request->has('q') && strlen($request->q) >= 3) {
            $crude_prods = $crude_prods->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('field', function ($query) use ($request) {
                    $query->where('field_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('terrain', function ($query) use ($request) {
                    $query->where('terrain_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $crude_prods = collect($this->getTableColumns('up_provisional_crude_production'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'company_total', 'average_production', 'percentage_production', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $field = \App\field::select('id', 'field_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();

            return $this->exportexcel('Upstream Provisional Crude Production', ['Provisional Crude Production'=>$crude_prods, 'company'=>$company, 'field'=>$field, 'contract'=>$contract, 'terrain'=>$terrain]);
        } else {
            $crude_prods = $crude_prods->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_crude_prods', compact('crude_prods', 'pending', 'unresolvedCount'));
    }

    private function crude_production_deferment(Request $request)
    {
        $crude_production_deferment = \App\up_crude_production_deferment::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_crude_production_deferment::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\up_crude_production_deferment::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $crude_production_deferment = $crude_production_deferment->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $crude_production_deferment = $crude_production_deferment->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $crude_production_deferment = $crude_production_deferment->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('value', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $crude_production_deferment = collect($this->getTableColumns('up_provisional_production_deferments'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'average_daily_production', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->where('year', 2020)->get();
            $contract = \App\contract::select('id', 'contract_name')->where('year', 2020)->get();

            return $this->exportexcel('Crude Production Deferment', ['Crude Production Deferment'=>$crude_production_deferment, 'company'=>$company, 'contract'=>$contract]);
        } else {
            $crude_production_deferment = $crude_production_deferment->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_production_deferment', compact('crude_production_deferment', 'pending', 'unresolvedCount'));
    }

    private function seismic_data(Request $request)
    {
        $seismic_data = \App\up_seismic_data::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_seismic_data::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\up_seismic_data::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $seismic_data = $seismic_data->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $seismic_data = $seismic_data->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $seismic_data = $seismic_data->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
                ->orwhere('field_id', 'like', "%{$request->q}%")
                ->orwhereHas('geophysical', function ($query) use ($request) {
                    $query->where('geophysical_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('geotechnical', function ($query) use ($request) {
                    $query->where('geotechnical_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('seismic_types', function ($query) use ($request) {
                    $query->where('seismic_type_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('status_category', function ($query) use ($request) {
                    $query->where('status', 'like', "%{$request->q}%");
                })
                ->orwhereHas('terrain', function ($query) use ($request) {
                    $query->where('terrain_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $seismic_data = collect($this->getTableColumns('up_seismic_data'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $terrain = \App\terrain::select('id', 'terrain_name')->get();
            $geophysical = \App\up_geophysical::select('id', 'geophysical_name')->get();
            $geotechnical = \App\up_geotechnical::select('id', 'geotechnical_name')->get();
            $seismic_types = \App\SeismicType::select('id', 'seismic_type_name')->get();
            $status_category = \App\status_category::select('id', 'status')->get();

            return $this->exportexcel('Upstream Seismic Data', ['Seismic Data'=>$seismic_data, 'terrain'=>$terrain, 'geophysical'=>$geophysical, 'geotechnical'=>$geotechnical, 'status_category'=>$status_category, 'seismic_types'=>$seismic_types]);
        } else {
            $seismic_data = $seismic_data->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_seismic_data', compact('seismic_data', 'pending', 'unresolvedCount'));
    }

    private function rig_disp(Request $request)
    {
        $rig_disp = \App\up_rig_disposition::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_rig_disposition::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\up_rig_disposition::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $rig_disp = $rig_disp->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $rig_disp = $rig_disp->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $rig_disp = $rig_disp->where('year', 2020)->where('year', 'like', "%{$request->q}%")
                ->orwhereHas('rig_type', function ($query) use ($request) {
                    $query->where('rig_type_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('terrain', function ($query) use ($request) {
                    $query->where('terrain_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $rig_disp = collect($this->getTableColumns('up_rig_disposition'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $rig_type = \App\RigType::select('id', 'rig_type_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();

            return $this->exportexcel('Upstream Rig Disposition', ['Rig Disposition'=>$rig_disp, 'rig_type'=>$rig_type, 'terrain'=>$terrain]);
        } else {
            $rig_disp = $rig_disp->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_rig_disp', compact('rig_disp', 'pending', 'unresolvedCount'));
    }

    private function well_activities(Request $request)
    {
        //checking if for upstream or gas
        $role = \Auth::user()->role_obj->id;
        if ($role == 11 || $role == 14 || $role == 15 || $role == 18) { $section = 'UPSTREAM'; $section = 'GAS'; } 
        else {  $section = 'OTHERS'; }

        if ($section != 'OTHERS') {
            $well_activities = \App\up_well_activities::where('year', 2020)->where('section', $section)->orderBy('id', 'desc');
            $pending = \App\up_well_activities::where('year', 2020)->where('section', $section)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_well_activities::where('year', 2020)->where('pending_id', '<>', '')->count();
        } else {
            $well_activities = \App\up_well_activities::where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_well_activities::where('year', 2020)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_well_activities::where('year', 2020)->where('pending_id', '<>', '')->count();
        }

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $well_activities = $well_activities->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $well_activities = $well_activities->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $well_activities = $well_activities->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
            ->orwhereHas('class', function ($query) use ($request) {
                $query->where('class_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('type', function ($query) use ($request) {
                $query->where('type_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('terrain', function ($query) use ($request) {
                $query->where('terrain_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('contract', function ($query) use ($request) {
                $query->where('contract_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $well_activities = collect($this->getTableColumns('up_well_activities'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'section', 'total', 'section', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $terrain = \App\terrain::select('id', 'terrain_name')->get();
            $class = \App\well_class::select('id', 'class_name')->get();
            $type = \App\well_type::select('id', 'type_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();

            return $this->exportexcel('Upstream Well Activities', ['Well Activities'=>$well_activities, 'terrain'=>$terrain, 'class'=>$class, 'type'=>$type, 'contract'=>$contract]);
        } else {
            $well_activities = $well_activities->where('year', 2020)->paginate(15);
        }
        
        
        return view('ajax.up_well_activities', compact('well_activities', 'pending', 'unresolvedCount'));
    }

    private function drilling_gas(Request $request)
    {
        $drilling_gas = \App\up_drilling_gas::orderBy('id', 'desc')->where('year', 2020)->where('type_id', 1);
        $pending = \App\up_drilling_gas::where('stage_id', '0')->where('year', 2020)->where('type_id', 1)->get();
        $unresolvedCount = \App\up_drilling_gas::where('pending_id', '<>', '')->where('type_id', 1)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $drilling_gas = $drilling_gas->where('pending_id', '>', 0)->where('type_id', 1)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $drilling_gas = $drilling_gas->where('stage_id', 0)->where('type_id', 1)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $drilling_gas = $drilling_gas->where('year', 'like', "%{$request->q}%")->where('month', 'like', "%{$request->q}%")
                ->orwhere('well', 'like', "%{$request->q}%")->orwhere('reserves', 'like', "%{$request->q}%")
                ->orwhere('off_take', 'like', "%{$request->q}%")
                ->orwhereHas('field', function ($query) use ($request) {
                    $query->where('field_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('concession', function ($query) use ($request) {
                    $query->where('concession_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('terrain', function ($query) use ($request) {
                    $query->where('terrain_name', 'like', "%{$request->q}%");
                })
                ->where('type_id', 1);
        }

        if ($request->has('excel')) {
            $drilling_gas = collect($this->getTableColumns('up_drilling_gas_well'))->filter(function ($value) {
                if (in_array($value, ['id', 'facility_id', 'type_id', 'pending_id', 'company_id', 'concession_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field = \App\field::select('id', 'field_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();
            // $facility = \App\facility::select('id', 'facility_name')->get();

            return $this->exportexcel('Upstream Drilling Gas', ['Drilling Gas'=>$drilling_gas, 'field'=>$field, 'terrain'=>$terrain]);
        } else {
            $drilling_gas = $drilling_gas->paginate(15);
        }

        return view('ajax.up_drilling_gas', compact('drilling_gas', 'pending', 'unresolvedCount'));
    }

    private function gas_initial_completion(Request $request)
    {
        $gas_initial_completion = \App\up_drilling_gas::orderBy('id', 'desc')->where('year', 2020)->where('type_id', 2);
        $pending = \App\up_drilling_gas::where('stage_id', '0')->where('type_id', 2)->where('year', 2020)->get();
        $unresolvedCount = \App\up_drilling_gas::where('pending_id', '<>', '')->where('year', 2020)->where('type_id', 2)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $gas_initial_completion = $gas_initial_completion->where('year', 2020)->where('pending_id', '>', 0)->where('type_id', 2)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $gas_initial_completion = $gas_initial_completion->where('year', 2020)->where('stage_id', 0)->where('type_id', 2)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $gas_initial_completion = $gas_initial_completion->where('year', 'like', "%{$request->q}%")->where('month', 'like', "%{$request->q}%")
                ->orwhere('well', 'like', "%{$request->q}%")->orwhere('reserves', 'like', "%{$request->q}%")
                ->orwhere('off_take', 'like', "%{$request->q}%")
                ->orwhereHas('field', function ($query) use ($request) {
                    $query->where('field_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('concession', function ($query) use ($request) {
                    $query->where('concession_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('facility', function ($query) use ($request) {
                    $query->where('facility_name', 'like', "%{$request->q}%");
                })
                ->where('type_id', 2);
        }

        if ($request->has('excel')) {
            $gas_initial_completion = collect($this->getTableColumns('up_drilling_gas_well'))->filter(function ($value) {
                if (in_array($value, ['id', 'type_id', 'terrain_id', 'pending_id', 'company_id', 'concession_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field = \App\field::select('id', 'field_name')->get();
            // $terrain = \App\terrain::select('id', 'terrain_name')->get();
            $facility = \App\facility::select('id', 'facility_name')->get();

            return $this->exportexcel('Upstream Gas Initial Completion', ['Gas Initial Completion'=>$gas_initial_completion, 'field'=>$field, 'facility'=>$facility]);
        } else {
            $gas_initial_completion = $gas_initial_completion->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_gas_initial_completion', compact('gas_initial_completion', 'pending', 'unresolvedCount'));
    }

    private function completion(Request $request)
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

        if ($section != 'OTHERS') {
            $completion = \App\up_well_completion::where('year', 2020)->where('section', $section)->orderBy('id', 'desc');
            $pending = \App\up_well_completion::where('year', 2020)->where('section', $section)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_well_completion::where('year', 2020)->where('pending_id', '<>', '')->count();
        } else {
            $completion = \App\up_well_completion::where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_well_completion::where('year', 2020)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_well_completion::where('year', 2020)->where('pending_id', '<>', '')->count();
        }

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $completion = $completion->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $completion = $completion->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $completion = $completion->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
            ->orwhereHas('field', function ($query) use ($request) {
                $query->where('field_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('welltype', function ($query) use ($request) {
                $query->where('type_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('type', function ($query) use ($request) {
                $query->where('type_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $completion = collect($this->getTableColumns('up_well_completion'))->filter(function ($value) {
                if (in_array($value, ['id', 'section', 'pending_id', 'contract_id', 'terrain_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $field = \App\field::select('id', 'field_name')->get();
            $welltype = \App\completion_type::select('id', 'type_name')->where('id', '<=', 4)->get();
            $type = \App\completion_type::select('id', 'type_name')->where('id', '>=', 5)->get();

            return $this->exportexcel('Upstream Drilling Well Completion', ['Well completion'=>$completion, 'field'=>$field, 'welltype'=>$welltype, 'type'=>$type]);
        } else {
            $completion = $completion->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_completion', compact('completion', 'pending', 'unresolvedCount'));
    }

    private function workover(Request $request)
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

        if ($section != 'OTHERS') {
            $workover = \App\up_well_workover::where('year', 2020)->where('section', $section)->orderBy('id', 'desc');
            $pending = \App\up_well_workover::where('year', 2020)->where('section', $section)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_well_workover::where('year', 2020)->where('pending_id', '<>', '')->count();
        } else {
            $workover = \App\up_well_workover::where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_well_workover::where('year', 2020)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_well_workover::where('year', 2020)->where('pending_id', '<>', '')->count();
        }

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $workover = $workover->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $workover = $workover->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $workover = $workover->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('well', 'like', "%{$request->q}%")
            ->orwhereHas('field', function ($query) use ($request) {
                $query->where('field_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('type', function ($query) use ($request) {
                $query->where('type_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('concession', function ($query) use ($request) {
                $query->where('concession_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('facility', function ($query) use ($request) {
                $query->where('facility_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $workover = collect($this->getTableColumns('up_well_workover'))->filter(function ($value) {
                if (in_array($value, ['id', 'company_id', 'concession_id', 'section', 'pending_id', 'contract_id', 'terrain_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field = \App\field::select('id', 'field_name')->get();
            $company = \App\company::select('id', 'company_name')->get();
            $concession = \App\concession::select('id', 'concession_name')->get();
            $facility = \App\facility::select('id', 'facility_name')->get();
            $workover_type = \App\workover_type::select('id', 'type_name')->get();
            // [['id', 'Workover Type'], [1, 'Repairs'], [2, 'Zone Change/Zone Isolation'], [3, 'Re-Completion'], [4, 'Logging/PLT'], [5, 'Cement Squeeze']];

            return $this->exportexcel('Upstream Drilling Well Workover', ['Well Workover'=>$workover, 'field'=>$field, 'facility'=>$facility, 'workover_type'=>$workover_type]);
        } else {
            $workover = $workover->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_workover', compact('workover', 'pending', 'unresolvedCount'));
    }

    private function plugback_abandonment(Request $request)
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

        if ($section != 'OTHERS') {
            $plugback_abandonment = \App\up_well_plugback_abandonment::where('year', 2020)->where('section', $section)->orderBy('id', 'desc');
            $pending = \App\up_well_plugback_abandonment::where('section', $section)->where('year', 2020)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_well_plugback_abandonment::where('pending_id', '<>', '')->where('year', 2020)->count();
        } else {
            $plugback_abandonment = \App\up_well_plugback_abandonment::where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_well_plugback_abandonment::where('stage_id', '0')->where('year', 2020)->get();
            $unresolvedCount = \App\up_well_plugback_abandonment::where('pending_id', '<>', '')->where('year', 2020)->count();
        }

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $plugback_abandonment = $plugback_abandonment->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $plugback_abandonment = $plugback_abandonment->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $plugback_abandonment = $plugback_abandonment->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
            ->orwhereHas('field', function ($query) use ($request) {
                $query->where('field_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('type', function ($query) use ($request) {
                $query->where('type_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $plugback_abandonment = collect($this->getTableColumns('up_well_plugback_abandonment'))->filter(function ($value) {
                if (in_array($value, ['id', 'section', 'pending_id', 'section', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $field = \App\field::select('id', 'field_name')->get();
            $type = \App\plugback_type::select('id', 'type_name')->get();

            return $this->exportexcel('Upstream Drilling PlugbackAbandonment', ['Well Plugback Abandonment'=>$plugback_abandonment, 'field'=>$field, 'type'=>$type]);
        } else {
            $plugback_abandonment = $plugback_abandonment->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_plugback_abandonment', compact('plugback_abandonment', 'pending', 'unresolvedCount'));
    }

    private function oil_facility(Request $request)
    {
        $oil_facility = \App\up_major_oil_facilities::orderBy('id', 'desc');
        $pending = \App\up_major_oil_facilities::where('stage_id', '0')->get();
        $unresolvedCount = \App\up_major_oil_facilities::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $oil_facility = $oil_facility->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $oil_facility = $oil_facility->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $oil_facility = $oil_facility->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('facility', function ($query) use ($request) {
                $query->where('facility_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('facility_type', function ($query) use ($request) {
                $query->where('facility_type_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('location', function ($query) use ($request) {
                $query->where('location_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('terrain', function ($query) use ($request) {
                $query->where('terrain_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('gas_status', function ($query) use ($request) {
                $query->where('status_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('up_license_status', function ($query) use ($request) {
                $query->where('license_status_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $oil_facility = collect($this->getTableColumns('up_major_oil_facilities'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $facility = \App\facility::select('id', 'facility_name')->get();
            $facility_type = \App\facility_type::select('id', 'facility_type_name')->get();
            $location = \App\location::select('id', 'location_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();
            $gas_status = \App\gas_status::select('id', 'status_name')->get();
            $license_status = \App\up_license_status::select('id', 'license_status_name')->get();

            return $this->exportexcel('Upstream Oil Facility', ['Oil Facility'=>$oil_facility, 'company'=>$company, 'facility'=>$facility, 'facility_type'=>$facility_type, 'location'=>$location, 'terrain'=>$terrain, 'gas_status'=>$gas_status, 'license_status'=>$license_status]);
        } else {
            $oil_facility = $oil_facility->paginate(15);
        }

        return view('ajax.oil_facility', compact('oil_facility', 'pending', 'unresolvedCount'));
    }

    private function field_development_plan(Request $request)
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

        if ($section != 'OTHERS') {
            $field_development_plan = \App\up_field_development_plan::where('section', $section)->where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_field_development_plan::where('section', $section)->where('stage_id', '0')->where('year', 2020)->get();
            $unresolvedCount = \App\up_field_development_plan::where('pending_id', '<>', '')->where('year', 2020)->count();
        } else {
            $field_development_plan = \App\up_field_development_plan::where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_field_development_plan::where('stage_id', '0')->where('year', 2020)->get();
            $unresolvedCount = \App\up_field_development_plan::where('pending_id', '<>', '')->count();
        }

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $field_development_plan = $field_development_plan->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $field_development_plan = $field_development_plan->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $field_development_plan = $field_development_plan->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('production_rate', 'like', "%{$request->q}%")->orwhere('expected_reserves', 'like', "%{$request->q}%")->orwhere('commencement_date', 'like', "%{$request->q}%")->orwhere('remark', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('field', function ($query) use ($request) {
                $query->where('field_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $field_development_plan = collect($this->getTableColumns('up_field_development_plans'))->filter(function ($value) {
                if (in_array($value, ['id', 'section', 'pending_id', 'section', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $field = \App\field::select('id', 'field_name')->get();

            return $this->exportexcel('Upstream FDP', ['FDP'=>$field_development_plan, 'company'=>$company, 'field'=>$field]);
        } else {
            $field_development_plan = $field_development_plan->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_field_development_plan', compact('field_development_plan', 'pending', 'unresolvedCount'));
    }

    private function field_development_plan_gas(Request $request)
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

        if ($section != 'OTHERS') {
            $field_development_plan = \App\up_field_development_plan::where('year', 2020)->where('section', $section)->orderBy('id', 'desc');
            $pending = \App\up_field_development_plan::where('section', $section)->where('year', 2020)->where('stage_id', '0')->get();
            $unresolvedCount = \App\up_field_development_plan::where('pending_id', '<>', '')->where('year', 2020)->count();
        } else {
            $field_development_plan = \App\up_field_development_plan::where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_field_development_plan::where('stage_id', '0')->where('year', 2020)->get();
            $unresolvedCount = \App\up_field_development_plan::where('pending_id', '<>', '')->where('year', 2020)->count();
        }

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $field_development_plan = $field_development_plan->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $field_development_plan = $field_development_plan->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $field_development_plan = $field_development_plan->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('production_rate', 'like', "%{$request->q}%")->orwhere('expected_reserves', 'like', "%{$request->q}%")->orwhere('commencement_date', 'like', "%{$request->q}%")->orwhere('remark', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('field', function ($query) use ($request) {
                $query->where('field_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $field_development_plan = collect($this->getTableColumns('up_field_development_plans'))->filter(function ($value) {
                if (in_array($value, ['id', 'section', 'pending_id', 'section', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $field = \App\field::select('id', 'field_name')->get();

            return $this->exportexcel('Upstream FDP', ['FDP'=>$field_development_plan, 'company'=>$company, 'field'=>$field]);
        } else {
            $field_development_plan = $field_development_plan->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_field_development_plan_gas', compact('field_development_plan', 'pending', 'unresolvedCount'));
    }

    private function approved_gas_development_plan(Request $request)
    {
        $approved_gas_development_plan = \App\up_approved_gas_development_plan::orderBy('id', 'desc');
        $pending = \App\up_approved_gas_development_plan::where('stage_id', '0')->get();
        $unresolvedCount = \App\up_approved_gas_development_plan::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $approved_gas_development_plan = $approved_gas_development_plan->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $approved_gas_development_plan = $approved_gas_development_plan->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $approved_gas_development_plan = $approved_gas_development_plan->where('year', 'like', "%{$request->q}%")->orwhere('gas_reserve', 'like', "%{$request->q}%")->orwhere('condensate', 'like', "%{$request->q}%")->orwhere('ag_reserve', 'like', "%{$request->q}%")->orwhere('off_take_rate', 'like', "%{$request->q}%")
                ->orwhereHas('field', function ($query) use ($request) {
                    $query->where('field_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('concession', function ($query) use ($request) {
                    $query->where('concession_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $approved_gas_development_plan = collect($this->getTableColumns('up_approved_gas_development_plans'))->filter(function ($value) {
                if (in_array($value, ['id', 'type_id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $field = \App\field::select('id', 'field_name')->get();
            $concession = \App\concession::select('id', 'concession_name')->get();
            $company = \App\company::select('id', 'company_name')->get();

            return $this->exportexcel('Upstream Approved Gas Dev Plan', ['Approved Gas Dev Plan'=>$approved_gas_development_plan, 'field'=>$field]);
        } else {
            $approved_gas_development_plan = $approved_gas_development_plan->paginate(15);
        }

        return view('ajax.up_approved_gas_development_plan', compact('approved_gas_development_plan', 'pending', 'unresolvedCount'));
    }

    private function field_summary(Request $request)
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

        if ($section != 'OTHERS') {
            $field_summary = \App\up_field_summary::where('section', $section)->where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_field_summary::where('section', $section)->where('stage_id', '0')->where('year', 2020)->get();
            $unresolvedCount = \App\up_field_summary::where('pending_id', '<>', '')->where('year', 2020)->count();
        } else {
            $field_summary = \App\up_field_summary::where('year', 2020)->orderBy('id', 'desc');
            $pending = \App\up_field_summary::where('stage_id', '0')->where('year', 2020)->get();
            $unresolvedCount = \App\up_field_summary::where('pending_id', '<>', '')->where('year', 2020)->count();
        }

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $field_summary = $field_summary->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $field_summary = $field_summary->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $field_summary = $field_summary->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")->orwhere('producing_field', 'like', "%{$request->q}%")->orwhere('well', 'like', "%{$request->q}%")->orwhere('string', 'like', "%{$request->q}%")
            ->orwhereHas('contract', function ($query) use ($request) {
                $query->where('contract_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $field_summary = collect($this->getTableColumns('up_field_summaries'))->filter(function ($value) {
                if (in_array($value, ['id', 'section', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();

            return $this->exportexcel('UpstreamField Summary', ['Field Summary'=>$field_summary, 'company'=>$company, 'contract'=>$contract]);
        } else {
            $field_summary = $field_summary->where('year', 2020)->paginate(15);
        }

        return view('ajax.up_field_summary', compact('field_summary', 'pending', 'unresolvedCount'));
    }

    private function oil_plant(Request $request)
    {
        $oil_plant = \App\up_processing_plant_project::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\up_processing_plant_project::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\up_processing_plant_project::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $oil_plant = $oil_plant->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $oil_plant = $oil_plant->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) 
        {
            $oil_plant = $oil_plant->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('project', 'like', "%{$request->q}%")->orwhere('terrain_id', 'like', "%{$request->q}%")->orwhere('development_type', 'like', "%{$request->q}%")->orwhere('location', 'like', "%{$request->q}%")->orwhere('development_type', 'like', "%{$request->q}%")->orwhere('facility_type', 'like', "%{$request->q}%")
            ->orwhere('start_date', 'like', "%{$request->q}%")->orwhere('completion_date', 'like', "%{$request->q}%")

            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('status', function ($query) use ($request) {
                $query->where('status_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $oil_plant = collect($this->getTableColumns('up_processing_plant_project'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $status = \App\es_project_status::select('id', 'status_name')->get();

            return $this->exportexcel('Upstream Oil Project', ['Major Upstream Project'=>$oil_plant, 'company'=>$company, 'status'=>$status]);
        } else {
            $oil_plant = $oil_plant->where('year', 2020)->paginate(15);
        }

        return view('ajax.oil_plant', compact('oil_plant', 'pending', 'unresolvedCount'));
    }

    //BALA
    private function bala_opls(Request $request)
    {

        /// all the records include only 2020, based on the client request, but it wasnt like that previously
        $bala_opls = \App\Bala_opl::orderBy('id', 'desc')->groupBy('concession_held_id')->whereNotNull('year')->where('year', 2020);
        $pending = \App\Bala_opl::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\Bala_opl::where('pending_id', '<>', '')->where('year', 2020)->count();
        if ($request->has('p')) {
            $bala_opls = $bala_opls->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $bala_opls = $bala_opls->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $bala_opls = $bala_opls->where('year', 2020)->where('year_of_award', 'like', "%{$request->q}%")->orwhere('license_expire_date', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('concession', function ($query) use ($request) {
                $query->where('concession_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('terrain', function ($query) use ($request) {
                $query->where('terrain_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('contract', function ($query) use ($request) {
                $query->where('contract_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $bala_opls = collect($this->getTableColumns('Bala_opl'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approved_by', 'approved_at'])) {
                    return false;
                }
                return $value;
            });
            $company = \App\company::select('id', 'company_name')->get();
            $concession = \App\concession::select('id', 'concession_name')->get();
            $terrain = \App\up_concession_terrain::select('id', 'terrain_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();
            return $this->exportexcel('Upstream Concession OPL', ['Concession OPL'=>$bala_opls, 'company'=>$company, 'concession'=>$concession, 'terrain'=>$terrain, 'contract'=>$contract]);
        } else {
            $bala_opls = $bala_opls->where('year', 2020)->whereNotNull('year')->orderBy('id', 'desc')->where('year', 2020)->groupBy('concession_held_id')->get();
        }

        return view('ajax.bala_opls', compact('bala_opls', 'pending', 'unresolvedCount'));
    }

    public function approveOpl(Request $request)
    {
        if(!$request->id)
        {
            return redirect()->back()->with('info','Please Select An Item For Approval');
        }

        foreach($request->id as $id)
        {
            $bala_opls =  \App\Bala_opl::find($id);
            $bala_opls->pending_id = 0;
            $bala_opls->stage_id = 1;
            $bala_opls->approved_by = \Auth::user()->id;
            $bala_opls->approved_at = date('Y-m-d h:i:s');
            $bala_opls->save();
        }
        return redirect()->back()->with('info','Pending OPL Data Has Been Approved Successfully');
    }

    public function approveOml(Request $request)
    {
          if(!$request->id)
          {
              return redirect()->back()->with('info','Please Select An Item For Approval');
          }

           foreach($request->id as $id)
           {
               $bala_omls =  \App\Bala_oml::find($id);
               $bala_omls->pending_id = 0;
               $bala_omls->stage_id = 1;
               $bala_omls->approved_by = \Auth::user()->id;
               $bala_omls->approved_at = date('Y-m-d h:i:s');
               $bala_omls->save();
           }
        return redirect()->back()->with('info','Pending OML Data Has Been Approved Successfully');
    }

    public function approveOpenAcreage(Request $request)
    {
        if(!$request->id)
        {
            return redirect()->back()->with('info','Please Select An Item For Approval');
        }
        foreach($request->id as $id)
        {
            $bala_block =  \App\Bala_block::find($id);
            $bala_block->pending_id = 0;
            $bala_block->stage_id = 1;
            $bala_block->approve_by = \Auth::user()->id;
            $bala_block->approve_at = date('Y-m-d h:i:s');
            $bala_block->save();
        }
        return redirect()->back()->with('info','Pending Open Acreage Data Has Been Approved Successfully');
    }
    
    
    
    public function approveWellCompletionActivities(Request $request)
    {
        
        if(!$request->id)
        {
            return redirect()->back()->with('info','Please Select An Item For Approval');
        }
        
        foreach($request->id as $id)
        {
            $well_completion_activities = \App\up_well_completion::find($id);
            
            $data = [
                 'pending_id' => 0,
                 'stage_id' => 1,
                 'approve_by' => \Auth::user()->id,
                 'approve_at' => date('Y-m-d h:i:s'),
            ];
            
            $well_completion_activities->create($data);
        }
        return redirect()->back()->with('info','Pending Data Has Been Approved Successfully');
        
    }

    private function bala_omls(Request $request)
    {
        /// only records for year 2020 is been selected, based on clients request, but it wasnt so before
        $bala_omls = \App\Bala_oml::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\Bala_oml::where('year', 2020)->where('stage_id', '0')->orderBy('id', 'asc')->get();
        $unresolvedCount = \App\Bala_oml::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $bala_omls = $bala_omls->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $bala_omls = $bala_omls->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
//            $bala_omls = $bala_omls->orderBy('id', 'desc');

        }

        if ($request->has('q') && strlen($request->q) >= 3)
        {
            $bala_omls = $bala_omls->where('year', 2020)->where('date_of_grant', 'like', "%{$request->q}%")->orwhere('license_expire_date', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('concession', function ($query) use ($request) {
                $query->where('concession_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('terrain', function ($query) use ($request) {
                $query->where('terrain_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('contract', function ($query) use ($request) {
                $query->where('contract_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $bala_omls = collect($this->getTableColumns('Bala_oml'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approved_by', 'approved_at'])) {
                    return false;
                }
                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $concession = \App\concession::select('id', 'concession_name')->get();
            $terrain = \App\up_concession_terrain::select('id', 'terrain_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();
            return $this->exportexcel('Upstream Concession OML', ['Concession OML'=>$bala_omls, 'company'=>$company, 'concession'=>$concession, 'terrain'=>$terrain, 'contract'=>$contract]);
        } else {
            $bala_omls = $bala_omls->where('year', 2020)->orderBy('id', 'desc')->get();
        }
        return view('ajax.bala_omls', compact('bala_omls', 'pending', 'unresolvedCount'));
    }

    private function bala_block(Request $request)
    {
        $bala_block = \App\Bala_block::orderBy('id', 'desc');
        $pending = \App\Bala_block::where('stage_id', '0')->get();
        $unresolvedCount = \App\Bala_block::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $bala_block = $bala_block->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $bala_block = $bala_block->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $bala_block = $bala_block->where('year', 'like', "%{$request->q}%")
            ->orwhereHas('basin', function ($query) use ($request) {
                $query->where('basin_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $bala_block = collect($this->getTableColumns('Bala_blocks'))->filter(function ($value) {
                if (in_array($value, ['id', 'total_block', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $basin = \App\Basin::select('id', 'basin_name')->get();

            return $this->exportexcel('Upstream Open Acreage', ['Concession Blocks'=>$bala_block, 'basin'=>$basin]);
        } else {
            $bala_block = $bala_block->paginate(15);
        }

        return view('ajax.bala_block', compact('bala_block', 'pending', 'unresolvedCount'));
    }

    private function open_acreage(Request $request)
    {
        $open_acreage = \App\concession_unlisted_open::where('company_id', '108')->orderBy('id', 'desc');
        $pending = \App\concession_unlisted_open::where('stage_id', '0')->get();
        $unresolvedCount = \App\concession_unlisted_open::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $open_acreage = $open_acreage->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $open_acreage = $open_acreage->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $open_acreage = $open_acreage->where('concession_name', 'like', "%{$request->q}%")->orwhere('award_date', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('terrain', function ($query) use ($request) {
                    $query->where('terrain_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $open_acreage = collect($this->getTableColumns('concession_unlisted_open'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();

            return $this->exportexcel('Concession Open Acreage', ['Open Acreage-Unlisted Blocks'=>$open_acreage, 'company'=>$company, 'terrain'=>$terrain]);
        } else {
            $open_acreage = $open_acreage->paginate(15);
        }

        return view('ajax.setup_unlisted_block', compact('open_acreage', 'pending', 'unresolvedCount'));
    }

    private function bala_data_ps(Request $request)
    {
        $bala_data_ps = \App\bala_multiclient_project_status::where('year', 2020 )->orderBy('id', 'desc');
        $pending = \App\bala_multiclient_project_status::where('stage_id', '0')->where('year', 2020 )->get();
        $unresolvedCount = \App\bala_multiclient_project_status::where('pending_id', '<>', '')->where('year', 2020 )->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $bala_data_ps = $bala_data_ps->where('pending_id', '>', 0)->where('year', 2020 )->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $bala_data_ps = $bala_data_ps->where('stage_id', 0)->where('year', 2020 )->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $bala_data_ps = $bala_data_ps->where('year', 2020 )->where('year', 'like', "%{$request->q}%")->orwhere('survey_name', 'like', "%{$request->q}%")->orwhere('agreement_date', 'like', "%{$request->q}%")->orwhere('remark', 'like', "%{$request->q}%")->orwhere('year_of_survey', 'like', "%{$request->q}%")
                ->whereHas('company', function ($query) use ($request) {
                    $query->orwhere('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('area_of_survey', function ($query) use ($request) {
                    $query->where('area_of_survey_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('type_of_survey', function ($query) use ($request) {
                    $query->where('type_of_survey_name', 'like', "%{$request->q}%");
                });
        }

        if ($request->has('excel')) {
            $bala_data_ps = collect($this->getTableColumns('bala_multiclient_project_status'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $area_of_survey = \App\area_of_survey::select('id', 'area_of_survey_name')->get();
            $type_of_survey = \App\type_of_survey::select('id', 'type_of_survey_name')->get();

            return $this->exportexcel('Upstream Multiclient Project', ['Client Project Status'=>$bala_data_ps, 'company'=>$company, 'area_of_survey'=>$area_of_survey, 'type_of_survey'=>$type_of_survey]);
        } else {
            $bala_data_ps = $bala_data_ps->where('year', 2020 )->paginate(15);
        }

        return view('ajax.bala_status', compact('bala_data_ps', 'pending', 'unresolvedCount'));
    }

    private function bala_area(Request $request)
    {
        $bala_aoss = \App\area_of_survey::orderBy('id', 'desc');
        // $pending = \App\area_of_survey::where('stage_id', '0')->get();

        if ($request->has('excel')) {
            $bala_aoss = collect($this->getTableColumns('area_of_survey'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
        } else {
            $bala_aoss = $bala_aoss->paginate(15);
        }

        return view('ajax.bala_area', compact('bala_aoss'));
    }

    private function bala_type(Request $request)
    {
        $bala_toss = \App\type_of_survey::orderBy('id', 'desc');
        // $pending = \App\type_of_survey::where('stage_id', '0')->get();

        if ($request->has('excel')) {
            $bala_toss = collect($this->getTableColumns('type_of_survey'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });
        } else {
            $bala_toss = $bala_toss->paginate(15);
        }

        return view('ajax.bala_type', compact('bala_toss'));
    }

    private function revenue_projected(Request $request)
    {
        $rate = \App\ExchangeRate::where('currency', $request->curr)->orderBy('id', 'desc')->first();
        $revenue_projected = \App\eco_revenue_projected::orderBy('id', 'desc');
        $pending = \App\eco_revenue_projected::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $revenue_projected = $revenue_projected->where('year', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $revenue_projected = $revenue_projected->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $revenue_projected = collect($this->getTableColumns('eco_revenue_projected'))->filter(function ($value) {
                if (in_array($value, ['id', 'total_projected', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('revenue_projected', ['revenue_projected'=>$revenue_projected]);
        } else {
            $revenue_projected = $revenue_projected->paginate(15);
        }

        return view('ajax.eco_revenue_projected', compact('revenue_projected', 'pending', 'rate'));
    }

    private function revenue_actual(Request $request)
    {
        $revenue_actual = \App\eco_revenue_actual::orderBy('id', 'desc');
        $pending = \App\eco_revenue_actual::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $revenue_actual = $revenue_actual->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $revenue_actual = $revenue_actual->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $revenue_actual = collect($this->getTableColumns('eco_revenue_actual'))->filter(function ($value) {
                if (in_array($value, ['id', 'total_actual', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return $this->exportexcel('revenue_actual', ['revenue_actual'=>$revenue_actual]);
        } else {
            $revenue_actual = $revenue_actual->paginate(15);
        }

        return view('ajax.eco_revenue_actual', compact('revenue_actual', 'pending'));
    }

    private function down_project(Request $request)
    {
        $down_project = \App\down_petrochemical_plant_project::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\down_petrochemical_plant_project::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\down_petrochemical_plant_project::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $down_project = $down_project->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $down_project = $down_project->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $down_project = $down_project->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('company', 'like', "%{$request->q}%")
            ->orwhere('location', 'like', "%{$request->q}%")->orwhere('plant_name', 'like', "%{$request->q}%")
            ->orwhere('plant_type', 'like', "%{$request->q}%")
            ->orwhere('start_year', 'like', "%{$request->q}%")->orwhere('estimated_completion', 'like', "%{$request->q}%")
            ->orwhereHas('statuses', function ($query) use ($request) {
                $query->where('status_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $down_project = collect($this->getTableColumns('down_petrochemical_plant_project'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $status = \App\es_project_status::select('id', 'status_name')->get();

            return $this->exportexcel('E&S Downstream Project', ['Downstream Pet Plant Project'=>$down_project, 'status'=>$status]);
        } else {
            $down_project = $down_project->where('year', 2020)->paginate(15);
        }

        return view('ajax.down_major_plant_project', compact('down_project', 'pending', 'unresolvedCount'));
    }

    private function license_ref_project(Request $request)
    {
        $license_ref_project = \App\es_licensed_refinery_project::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\es_licensed_refinery_project::where('stage_id', '0')->where('year', 2020)->get();
        $unresolvedCount = \App\es_licensed_refinery_project::where('pending_id', '<>', '')->where('year', 2020)->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $license_ref_project = $license_ref_project->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $license_ref_project = $license_ref_project->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $license_ref_project = $license_ref_project->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('project_name', 'like', "%{$request->q}%")->orwhere('capacity', 'like', "%{$request->q}%")->orwhere('refinery_type', 'like', "%{$request->q}%")
            ->orwhere('license_granted', 'like', "%{$request->q}%")->orwhere('estimated_completion', 'like', "%{$request->q}%")
            ->orwhere('license_expiration_date', 'like', "%{$request->q}%")->orwhere('status_remark', 'like', "%{$request->q}%")
            ->orwhere('field_id', 'like', "%{$request->q}%")
            ->orwhereHas('validity', function ($query) use ($request) {
                $query->where('status_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $license_ref_project = collect($this->getTableColumns('es_licensed_refinery_project'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $validity = \App\es_project_status::select('id', 'status_name')->get();

            return $this->exportexcel('Downstream Project', ['Downstream Pet Plant Project'=>$license_ref_project, 'validity'=>$validity]);
        } else {
            $license_ref_project = $license_ref_project->where('year', 2020)->paginate(15);
        }
        return view('ajax.es_refinery_project', compact('license_ref_project', 'pending', 'unresolvedCount'));
    }

    private function pipeline(Request $request)
    {
        $pipeline = \App\es_pipeline_project::orderBy('id', 'desc');
        $pending = \App\es_pipeline_project::where('stage_id', '0')->get();
        $unresolvedCount = \App\es_pipeline_project::where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $pipeline = $pipeline->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $pipeline = $pipeline->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $pipeline = $pipeline->where('year', 'like', "%{$request->q}%")->orwhere('pipeline_name', 'like', "%{$request->q}%")
            ->orwhere('owner_details', 'like', "%{$request->q}%")->orwhere('origin', 'like', "%{$request->q}%")->orwhere('destination', 'like', "%{$request->q}%")
            ->orwhere('process_fluid', 'like', "%{$request->q}%")->orwhere('start_date', 'like', "%{$request->q}%")->orwhere('commissioning_date', 'like', "%{$request->q}%")
            ->orwhereHas('owner', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('status', function ($query) use ($request) {
                $query->where('status_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $pipeline = collect($this->getTableColumns('es_pipeline_project'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $owner = \App\company::select('id', 'company_name')->get();
            $status = \App\es_project_status::select('id', 'status_name')->get();

            return $this->exportexcel('Pipeline Project', ['Pipeline'=>$pipeline, 'owner'=>$owner, 'status'=>$status]);
        } else {
            $pipeline = $pipeline->paginate(15);
        }

        return view('ajax.es_pipeline', compact('pipeline', 'pending', 'unresolvedCount'));
    }

    private function metering(Request $request)
    {
        $metering = \App\es_metering::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\es_metering::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\es_metering::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $metering = $metering->where('pending_id', '>', 0)->where('year', 2020)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $metering = $metering->where('stage_id', 0)->where('year', 2020)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $metering = $metering->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('objective', 'like', "%{$request->q}%")
            ->orwhere('start_date', 'like', "%{$request->q}%")->orwhere('commissioning_date', 'like', "%{$request->q}%")
            ->orwhere('OTHERS', 'like', "%{$request->q}%")->orwhere('facility_id', 'like', "%{$request->q}%")
            ->orwhere('phase_id', 'like', "%{$request->q}%")
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('service', function ($query) use ($request) {
                $query->where('service_name', 'like', "%{$request->q}%");
            });
        }

        if ($request->has('excel')) {
            $metering = collect($this->getTableColumns('es_metering'))->filter(function ($value) {
                if (in_array($value, ['id', 'others', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $facility = \App\facility::select('id', 'facility_name')->get();
            $company = \App\company::select('id', 'company_name')->get();
            $service = \App\es_service::select('id', 'service_name')->get();
            $phase = \App\es_project_status::select('id', 'status_name')->get();

            return $this->exportexcel('metering Project', ['metering'=>$metering, 'facility'=>$facility, 'company'=>$company, 'service'=>$service, 'phase'=>$phase]);
        } else {
            $metering = $metering->where('year', 2020)->paginate(15);
        }

        return view('ajax.es_metering', compact('metering', 'pending', 'unresolvedCount'));
    }

    private function technology(Request $request)
    {
        $technology = \App\es_technology::where('year', 2020)->orderBy('id', 'desc');
        $pending = \App\es_technology::where('year', 2020)->where('stage_id', '0')->get();
        $unresolvedCount = \App\es_technology::where('year', 2020)->where('pending_id', '<>', '')->count();

        //SORT UNRESOLVED
        if ($request->has('p')) {
            $technology = $technology->where('year', 2020)->where('pending_id', '>', 0)->orderBy('id', 'desc');
        }
        if ($request->has('a')) {
            $technology = $technology->where('year', 2020)->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('q') && strlen($request->q) >= 3) {
            $technology = $technology->where('year', 2020)->where('year', 'like', "%{$request->q}%")->orwhere('technology', 'like', "%{$request->q}%")
            ->orwhere('application', 'like', "%{$request->q}%")->orwhere('company_id', 'like', "%{$request->q}%")
            ->orwhere('location_id', 'like', "%{$request->q}%")->orwhere('status', 'like', "%{$request->q}%")
            ->orwhere('adoptation_date', 'like', "%{$request->q}%")->orwhere('status', 'like', "%{$request->q}%");
            // ->orwhere('others', 'like', "%{$request->q}%")
            // ->orwhereHas('company', function($query) use ($request){      $query->where('company_name','like',"%{$request->q}%");     })
            // ->orwhereHas('statuses', function($query) use ($request){      $query->where('status_name','like',"%{$request->q}%");     })->orwhereHas('location', function($query) use ($request){   $query->where('field_name','like',"%{$request->q}%");     });
        }

        if ($request->has('excel')) {
            $technology = collect($this->getTableColumns('es_technology'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at', 'others', 'others_location'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $location = \App\field::select('id', 'field_name')->get();
            $statuses = \App\es_project_status::select('id', 'status_name')->get();

            return $this->exportexcel('technology Adoptation', ['technology'=>$technology, 'location'=>$location, 'company'=>$company, 'statuses'=>$statuses]);
        } else {
            $technology = $technology->where('year', 2020)->paginate(15);
        }
        return view('ajax.es_technology', compact('technology', 'pending', 'unresolvedCount'));
    }

    //WAR
    private function war_mpm()
    {
        $wars = \App\war::orderBy('id', 'desc')->paginate(15);
        return view('ajax.war_report', compact('wars'));
    }

    private function war_r()
    {
        $war_reps = \App\war_report::orderBy('id', 'desc')->paginate(15);
        return view('ajax.war_reports', compact('war_reps'));
    }

    //WAR
    private function MPM_(Request $request)
    {
        $mpms = \App\mpm::orderBy('id', 'desc')->where('month', 'january');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $mpms = $mpms->where(function ($query) use ($request) {
                $query->orwhereHas('themic_area', function ($query) use ($request) {
                    $query->where('themic_area_name', 'like', "%{$request->q}%");
                })->orwhereHas('key_result_area', function ($query) use ($request) {
                    $query->where('result_area_name', 'like', "%{$request->q}%");
                })->orwhereHas('kpis', function ($query) use ($request) {
                    $query->where('kpi_name', 'like', "%{$request->q}%");
                })->orwhereHas('metric', function ($query) use ($request) {
                    $query->where('metric_name', 'like', "%{$request->q}%");
                })->orwhereHas('frequency_of_measurement', function ($query) use ($request) {
                    $query->where('frequency_name', 'like', "%{$request->q}%");
                })->orwhereRaw("CONCAT(year,'-',month) like '%{$request->q}%'");
            });
        }

        $mpms = $mpms->paginate(15);

        return view('ajax.mpm_MPM', compact('mpms'));
    }

    //NET CASH FLOW
    private function net_cash_flow(Request $request)
    {
        $yr = date('Y');
        $yr_1 = $yr - 1;
        $yr_2 = $yr - 2;
        $yr_3 = $yr - 3;
        $yr_4 = $yr - 4;
        $yr_6 = $yr - 6;
        $year_array = ['$yr - 6' => $yr - '6', '$yr - 5' => $yr - '5', '$yr - 4' => $yr - '4', '$yr - 3' => $yr - '3', '$yr - 2' => $yr - '2', '$yr - 1' => $yr - '1', '$yr - 0' => $yr - '0'];
        $net_cash_flows_1 = \App\MPM::where('key_result_area_id', 1)->where('kpi', 19)->where('year', $yr_1)->limit(12)->get();
        $net_cash_flows_2 = \App\MPM::where('key_result_area_id', 1)->where('kpi', 20)->where('year', $yr_1)->limit(12)->get();
        $net_cash_flows_3 = \App\MPM::where('key_result_area_id', 1)->where('kpi', 21)->where('year', $yr_1)->limit(12)->get();
        $net_cash_flows_4 = \App\MPM::where('key_result_area_id', 1)->where('kpi', 22)->where('year', $yr_1)->limit(12)->get();

        return view('ajax.mpm_net_cash_flow', compact('net_cash_flows_1', 'net_cash_flows_2', 'net_cash_flows_3', 'net_cash_flows_4', 'yr', 'yr_1', 'yr_2', 'yr_3', 'yr_4', 'yr_5', 'yr_6', 'year_array'));
    }

    private function MPM_r_()
    {
        $mpm_reps = \App\mpm_report::orderBy('id', 'desc')->paginate(15);

        return view('ajax.mpm_MPM_report', compact('mpm_reps'));
    }

    private function Themic(Request $request)
    {
        $themic_areas = \App\themic_area::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $themic_areas = $themic_areas->where('themic_area_name', 'like', "%{$request->q}%");
        }
        $themic_areas = $themic_areas->paginate(15);

        return view('ajax.mpm_themic_area', compact('themic_areas'));
    }

    private function Result(Request $request)
    {
        $result_areas = \App\key_result_area::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $result_areas = $result_areas->where('result_area_name', 'like', "%{$request->q}%");
        }
        $result_areas = $result_areas->paginate(15);

        return view('ajax.mpm_key_result_area', compact('result_areas'));
    }

    private function mpm_kpi(Request $request)
    {
        $mpm_kpi = \App\mpm_kpi::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $mpm_kpi = $mpm_kpi->where('kpi_name', 'like', "%{$request->q}%");
        }
        $mpm_kpi = $mpm_kpi->paginate(15);

        return view('ajax.mpm_kpi', compact('mpm_kpi'));
    }

    private function Source()
    {
        $sources = \App\source::orderBy('id', 'desc')->paginate(15);

        return view('ajax.mpm_source', compact('sources'));
    }

    private function Metric()
    {
        $metrics = \App\metric::orderBy('id', 'desc')->paginate(15);

        return view('ajax.mpm_metric', compact('metrics'));
    }

    private function frequency_measurement()
    {
        $frequency_measurement = \App\mpm_frequency_of_measurement::orderBy('id', 'desc')->paginate(15);

        return view('ajax.mpm_frequency_of_measurement', compact('frequency_measurement'));
    }

    private function Mpm_expenditure(Request $request)
    {
        $mpm_expenditures = \App\MpmExpenditure::where('id', '<>', 0);

        if ($request->has('q') && strlen($request->q) >= 3) {
            $mpm_expenditures = $mpm_expenditures->whereRaw("CONCAT(year,'-',month) like '%{$request->q}%'");
        }
        if ($request->has('excel')) {
            $mpm_expenditures = $mpm_expenditures->select('month', 'year', 'expenditure')->skip(0)->take(1)->get();

            return $this->exportexcel('MPM Expenditure', ['MPM Expenditure'=>$mpm_expenditures]);
        }
        $mpm_expenditures = $mpm_expenditures->paginate(12);

        return view('ajax.mpm_expenditure', compact('mpm_expenditures'));
    }

    //MASTER DATA

    private function Department(Request $request)
    {
        $depts = \App\department::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $depts = $depts->where('department_name', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $depts = $depts->where('id', 1)->select('department_name')->get()->toArray();

            return   $this->exportexcel('PRIS Departments', ['Departments'=>$depts]);
        } else {
            $depts = $depts->paginate(15);
        }

        return view('ajax.setup_department', compact('depts'));
    }

    private function Company(Request $request)
    {
        $companys = \App\company::orderBy('id', 'desc');
        $pending = \App\company::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $companys = $companys->where('company_code', 'like', "%{$request->q}%")->orwhere('company_name', 'like', "%{$request->q}%")->orwhere('contact_name', 'like', "%{$request->q}%")->orwhere('email', 'like', "%{$request->q}%")->orwhere('phone', 'like', "%{$request->q}%")->orwhere('address', 'like', "%{$request->q}%")->orwhere('rc_number', 'like', "%{$request->q}%")->orwhere('license_expire_date', 'like', "%{$request->q}%")->orwhere('operation_type', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $companys = $companys->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $companys = collect($this->getTableColumns('company'))->filter(function ($value) {
                if (in_array($value, ['id', 'company_code', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Company', ['companies'=>$companys]);
        } else {
            $companys = $companys->paginate(15);
        }

        return view('ajax.setup_company', compact('companys', 'pending'));
    }

    private function ParentCompany(Request $request)
    {
        $parent_company = \App\company_parent::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $parent_company = $parent_company->where('company_name', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $parent_company = collect($this->getTableColumns('company_parent'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Parent Company', ['Parent companies'=>$parent_company]);
        } else {
            $parent_company = $parent_company->paginate(15);
        }

        return view('ajax.setup_parent_company', compact('parent_company'));
    }

    private function Field(Request $request)
    {
        $fields = \App\field::orderBy('id', 'desc');
        $pending = \App\field::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $fields = $fields->where('field_name', 'like', "%{$request->q}%")->orwhere('field_code', 'like', "%{$request->q}%")
            ->orwhereHas('concession', function ($query) use ($request) {
                $query->where('concession_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('company', function ($query) use ($request) {
                $query->where('company_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('contract', function ($query) use ($request) {
                $query->where('contract_name', 'like', "%{$request->q}%");
            })
            ->orwhereHas('terrain', function ($query) use ($request) {
                $query->where('terrain_name', 'like', "%{$request->q}%");
            });
        }
        if ($request->has('a')) {
            $fields = $fields->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $fields = collect($this->getTableColumns('field'))->filter(function ($value) {
                if (in_array($value, ['id', 'field_code', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $concession = \App\concession::select('id', 'concession_name')->get();
            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();
            $terrain = \App\terrain::select('id', 'terrain_name')->get();

            return $this->exportToExcelDropDown('Fields', ['field_name'=>[$fields, ''], 'concession'=>[$concession, 'B'], 'company'=>[$company, 'C'], 'contract'=>[$contract, 'D'], 'terrain'=>[$terrain, 'E', 'terrain']]);
        } else {
            $fields = $fields->paginate(15);
        }

        return view('ajax.setup_field', compact('fields', 'pending'));
    }

    private function Contract(Request $request)
    {
        $contracts = \App\contract::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $contracts = $contracts->where('company_name', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $fields = collect($this->getTableColumns('contract'))->filter(function ($value) {
                if (in_array($value, ['id', 'contract_code', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Contract - Business Type', ['Contract'=>$contracts]);
        } else {
            $contracts = $contracts->paginate(15);
        }

        return view('ajax.setup_contract', compact('contracts'));
    }
    

    private function Concession(Request $request)
    {
        $opl = "OPL";
        $concessions = \App\concession::orderBy('id', 'desc')->whereColumn('concession_name',  'like', '%{$opl}%');
        $pending = \App\concession::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $concessions = $concessions->where('concession_name', 'like', "%{$request->q}%")->orwhere('area', 'like', "%{$request->q}%")->orwhere('award_date', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('contract', function ($query) use ($request) {
                    $query->where('contract_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('terrain', function ($query) use ($request) {
                    $query->where('terrain_name', 'like', "%{$request->q}%");
                });
        }
        if ($request->has('a')) {
            $concessions = $concessions->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $concessions = collect($this->getTableColumns('concession'))->filter(function ($value) {
                if (in_array($value, ['id', 'concession_code', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            // $concessions = $concessions->where('id',1)->select('company_id', 'concession_name', 'equity_1', 'percentage_1', 'equity_2', 'percentage_2', 'equity_3', 'percentage_3', 'equity_4', 'percentage_4', 'equity_5', 'percentage_5', 'equity_6', 'percentage_6', 'equity_7', 'percentage_7', 'equity_8', 'percentage_8', 'contract_id', 'award_date', 'license_expire_date', 'area', 'geological_terrain_id', 'comment')->get()->toArray();

            $company = \App\company::select('id', 'company_name')->get();
            $contract = \App\contract::select('id', 'contract_name')->get();
            $terrain = \App\up_concession_terrain::select('id', 'terrain_name')->get();

            return $this->exportToExcelDropDown('Concession - Block', ['Concession_name'=>[$concessions, ''], 'company'=>[$company, 'A'], 'contract'=>[$contract, 'S'], 'terrain'=>[$terrain, 'W', 'type']]);
        } else {
            $concessions = $concessions->paginate(15);
        }

        return view('ajax.setup_concession', compact('concessions', 'pending'));
    }

    private function Unlisted_open(Request $request)
    {
        $Unlisted_open = \App\concession_unlisted_open::orderBy('id', 'desc');
        $pending = \App\concession::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $Unlisted_open = $Unlisted_open->where('concession_name', 'like', "%{$request->q}%")->orwhere('area', 'like', "%{$request->q}%")->orwhere('remark', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('terrain', function ($query) use ($request) {
                    $query->where('terrain_name', 'like', "%{$request->q}%");
                });
        }
        if ($request->has('a')) {
            $Unlisted_open = $Unlisted_open->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $Unlisted_open = collect($this->getTableColumns('concession_unlisted_open'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $terrain = \App\up_concession_terrain::select('id', 'terrain_name')->get();

            return $this->exportToExcelDropDown('Unlisted Open Block', ['Concession_name'=>[$Unlisted_open, ''], 'company'=>[$company, 'B'], 'terrain'=>[$terrain, 'D', 'terrain']]);
        } else {
            $Unlisted_open = $Unlisted_open->paginate(15);
        }

        return view('ajax.setup_unlisted_open_block', compact('Unlisted_open', 'pending'));
    }

    private function bala_field(Request $request)
    {
        $bala_marg_fields = \App\Bala_marginal_field::orderBy('id', 'desc');
        $pending = \App\Bala_marginal_field::where('stage_id', '0')->get();
        $unresolvedCount = \App\Bala_marginal_field::where('pending_id', '<>', '')->count();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $bala_marg_fields = $bala_marg_fields->where('year', 'like', "%{$request->q}%")->orwhere('blocks', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('field', function ($query) use ($request) {
                    $query->where('field_name', 'like', "%{$request->q}%");
                });
        }
        if ($request->has('a')) {
            $bala_marg_fields = $bala_marg_fields->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $bala_marg_fields = collect($this->getTableColumns('Bala_marginal_field'))->filter(function ($value) {
                if (in_array($value, ['id', 'pending_id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $field = \App\field::select('id', 'field_name')->get();

            return $this->exportToExcelDropDown('Concession Marginal Fields', ['Marginal Fields'=>[$bala_marg_fields, ''], 'company'=>[$company, 'B'], 'field'=>[$field, 'C', '', 'field']]);
        } else {
            $bala_marg_fields = $bala_marg_fields->paginate(15);
        }

        return view('ajax.bala_field', compact('bala_marg_fields', 'pending', 'unresolvedCount'));
    }

    private function Terrain(Request $request)
    {
        $terrains = \App\terrain::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $terrains = $terrains->where('terrain_name', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $terrains = collect($this->getTableColumns('terrain'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Terrain', ['Terrains'=>$terrains]);
        } else {
            $terrains = $terrains->paginate(15);
        }

        return view('ajax.setup_terrain', compact('terrains'));
    }

    private function Stream(Request $request)
    {
        $streams = \App\Stream::orderBy('id', 'desc');
        $pending = \App\Stream::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $streams = $streams->where('stream_name', 'like', "%{$request->q}%")->orwhere('stream_code', 'like', "%{$request->q}%")
                ->orwhereHas('company', function ($query) use ($request) {
                    $query->where('company_name', 'like', "%{$request->q}%");
                })
                ->orwhereHas('production_types', function ($query) use ($request) {
                    $query->where('production_type_name', 'like', "%{$request->q}%");
                });
        }
        if ($request->has('a')) {
            $streams = $streams->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $streams = collect($this->getTableColumns('stream'))->filter(function ($value) {
                if (in_array($value, ['id', 'stream_code', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            $company = \App\company::select('id', 'company_name')->get();
            $production_type = \App\down_production_type::select('id', 'production_type_name')->get();

            return $this->exportToExcelDropDown('Stream', ['Streams'=>[$streams, ''], 'company'=>[$company, 'B'], 'production_type'=>[$production_type, 'C', 'production_type']]);
        } else {
            $streams = $streams->paginate(15);
        }

        return view('ajax.setup_stream', compact('streams', 'pending'));
    }

    private function Facilities(Request $request)
    {
        $facilities = \App\facility::orderBy('id', 'desc');
        $pending = \App\facility::where('stage_id', '0')->get();

        if ($request->has('q') && strlen($request->q) >= 3) {
            $facilities = $facilities->where('facility_name', 'like', "%{$request->q}%")->orwhere('facility_code', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $facilities = $facilities->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $facilities = collect($this->getTableColumns('facility'))->filter(function ($value) {
                if (in_array($value, ['id', 'facility_code', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Facility', ['Facilities'=>$facilities]);
        } else {
            $facilities = $facilities->paginate(15);
        }

        return view('ajax.setup_facility', compact('facilities', 'pending'));
    }

    private function Facility_Type(Request $request)
    {
        $facility_types = \App\facility_type::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $facility_types = $facility_types->where('facility_type_name', 'like', "%{$request->q}%");
        }
        if ($request->has('a')) {
            $facility_types = $facility_types->where('stage_id', 0)->orderBy('id', 'desc');
        }

        if ($request->has('excel')) {
            $facility_types = collect($this->getTableColumns('facility_type'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Facility Type', ['facility_type'=>$facility_types]);
        } else {
            $facility_types = $facility_types->paginate(15);
        }

        return view('ajax.setup_facility_type', compact('facility_types'));
    }

    private function Location(Request $request)
    {
        $locations = \App\location::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $locations = $locations->where('location_name', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $locations = collect($this->getTableColumns('location'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Location', ['Location'=>$locations]);
        } else {
            $locations = $locations->paginate(15);
        }

        return view('ajax.setup_location', compact('locations'));
    }

    private function storage_loc(Request $request)
    {
        $storage_loc = \App\down_storage_location::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $storage_loc = $storage_loc->where('location_name', 'like', "%{$request->q}%");
        }

        if ($request->has('excel')) {
            $storage_loc = collect($this->getTableColumns('down_storage_location'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at', 'stage_id', 'batch_number', 'approve_by', 'approve_at'])) {
                    return false;
                }

                return $value;
            });

            return   $this->exportexcel('Storage Location', ['Storage location'=>$storage_loc]);
        } else {
            $storage_loc = $storage_loc->paginate(15);
        }

        return view('ajax.setup_storage_location', compact('storage_loc'));
    }

    public function getCapacityDetails(Request $request)
    {
        $year_data = \App\down_refinary_capacity_utilization::where('year', $request->year)->get();

        return response()->json($year_data);
    }

    public function getRolePermissions(Request $request)
    {
        $perms = \App\permissions::where('role', $request->role)->get();

        return response()->json($perms);
    }

    public function getRefineryCapacityDetails(Request $request)
    {
        $refinery_data = \App\down_refinery_performance::where('refinery_id', $request->refinery_id)->get();

        return response()->json($refinery_data);
    }

    private function c_matrix()
    {
        $milestone_matrix = \App\dwp_critical_milestone_matrix::orderBy('id', 'desc')->paginate(15);

        return view('ajax.dwp_milestone_matrix', compact('milestone_matrix'));
    }

    private function ind_alignment(Request $request)
    {
        $alignments = \App\alignment::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $alignments = $alignments->where('alignment_name', 'like', "%$request->q%");
        }
        $alignments = $alignments->paginate(15);

        return view('ajax.dwp_alignments', compact('alignments'));
    }

    private function program_priority(Request $request)
    {
        $program_priority = \App\dwp_program_priority::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $program_priority = $program_priority->where('program_priority_name', 'like', "%$request->q%");
        }
        $program_priority = $program_priority->paginate(15);

        return view('ajax.dwp_program_priority', compact('program_priority'));
    }

    private function task_target(Request $request)
    {
        $task_target = \App\dwp_task_target::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $task_target = $task_target->where('task_target_name', 'like', "%$request->q%");
        }
        $task_target = $task_target->paginate(15);

        return view('ajax.dwp_task_target', compact('task_target'));
    }

    private function kpi_targets(Request $request)
    {
        $kpi_targets = \App\dwp_kpi_target::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $kpi_targets = $kpi_targets->where('kpi_name', 'like', "%$request->q%")
                                       ->orwhere('kpi_target', 'like', "%$request->q%");
        }
        $kpi_targets = $kpi_targets->paginate(15);

        return view('ajax.dwp_kpi_target', compact('kpi_targets'));
    }

    private function tt_crit_milestone(Request $request)
    {
        $tt_crit_milestone = \App\dwp_critical_milestone::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $tt_crit_milestone = $tt_crit_milestone->where('critical_milestone_name', 'like', "%$request->q%");
        }
        $tt_crit_milestone = $tt_crit_milestone->paginate(15);

        return view('ajax.dwp_critical_milestone', compact('tt_crit_milestone'));
    }

    private function timeline(Request $request)
    {
        $timeline = \App\dwp_timeline::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $timeline = $timeline->where('timeline_name', 'like', "%$request->q%");
        }
        $timeline = $timeline->paginate(15);

        return view('ajax.dwp_timeline', compact('timeline'));
    }

    private function achieve_status(Request $request)
    {
        $achieve_status = \App\dwp_achievement_status::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $achieve_status = $achieve_status->where('achievement_status_name', 'like', "%$request->q%");
        }
        $achieve_status = $achieve_status->paginate(15);

        return view('ajax.dwp_achievement_status', compact('achieve_status'));
    }

    private function restrict_factor(Request $request)
    {
        $restrict_factor = \App\dwp_restricting_factor::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $restrict_factor = $restrict_factor->where('restricting_factor_name', 'like', "%$request->q%");
        }
        $restrict_factor = $restrict_factor->paginate(15);

        return view('ajax.dwp_restricting_factor', compact('restrict_factor'));
    }

    private function ind_division(Request $request)
    {
        $divisions = \App\division::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $divisions = $divisions->where('division_name', 'like', "%$request->q%");
        }
        $divisions = $divisions->paginate(15);

        return view('ajax.dwp_divisions', compact('divisions'));
    }

    private function recovery_plan(Request $request)
    {
        $recovery_plan = \App\dwp_key_recovery_plan::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $recovery_plan = $recovery_plan->where('key_recovery_plan_name', 'like', "%$request->q%");
        }
        $recovery_plan = $recovery_plan->paginate(15);

        return view('ajax.dwp_key_recovery_plan', compact('recovery_plan'));
    }

    private function ind_status_cat(Request $request)
    {
        $statuses = \App\status_category::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $statuses = $statuses->where('status', 'like', "%$request->q%")
                                ->orwhere('score', 'like', "%$request->q%");
        }
        $statuses = $statuses->paginate(15);

        return view('ajax.dwp_status_category', compact('statuses'));
    }

    private function update_project(Request $request)
    {
        $project_upd = \App\dwpProgressReport::orderBy('id', 'desc');
        // search
        if ($request->has('q') && strlen($request->q) >= 3) {
            $project_upd = $project_upd->whereHas('dwp', function ($query) use ($request) {
                $query->whereHas('alignment', function ($query) use ($request) {
                    $query->where('alignment_name', 'like', "%{$request->q}%");
                })->orwhereHas('division', function ($query) use ($request) {
                    $query->where('division_name', 'like', "%{$request->q}%");
                })->orwhereHas('program_priority', function ($query) use ($request) {
                    $query->where('program_priority_name', 'like', "%{$request->q}%");
                });
            })->orwhereHas('achievement_status', function ($query) use ($request) {
                $query->where('achievement_status_name', 'like', "%{$request->q}%");
            })->orwhereDate('submitted_date', date('Y-m-d', strtotime($request->q.'-01')));
        }
        $project_upd = $project_upd->paginate(15);

        return view('ajax.dwp_project_update', compact('project_upd'));
    }

    private function manage_project()
    {
        $projected = \App\dwp::orderBy('id', 'desc')->paginate(15);

        return view('ajax.dwp_manage_project', compact('projected'));
    }

    private function mtss_dpr_pp(Request $request)
    {
        $mtss_dpr_pp = \App\dwp_mtss_dpr_pp::orderBy('id', 'desc');
        if ($request->has('q') && strlen($request->q) >= 3) {
            $mtss_dpr_pp = $mtss_dpr_pp->where('policy_objective', 'like', "%{$request->q}%")
                                 ->orwhere('kpi', 'like', "%{$request->q}%")
                                 ->orwhere('kpi_performance', 'like', "%{$request->q}%")
                                 ->orwhere('responsible_division', 'like', "%{$request->q}%");
        }
        $mtss_dpr_pp = $mtss_dpr_pp->paginate(15);

        return view('ajax.dwp_mtss_dpr_pp', compact('mtss_dpr_pp'));
    }

    private function task_target_count()
    {
        $task_target_count = \App\dwp::paginate(15);

        return view('ajax.dwp_task_target_count', compact('task_target_count'));
    }

    private function key_result_area()
    {
        $key_result_area = \App\dwp::orderBy('program_priority_id', 'desc')->distinct('program_priority_id')->select('program_priority_id')->paginate(15);

        return view('ajax.dwp_key_result_area', compact('key_result_area'));
    }

    private function achieved()
    {
        $dwp_achieved = \App\dwp::where('achievement_status_id', 5)->get();
        $achieved = \App\dwp::where('achievement_status_id', 5)->orderBy('program_priority_id', 'desc')->distinct('program_priority_id')->select('program_priority_id')->paginate(15);

        return view('ajax.dwp_achieved', compact('dwp_achieved', 'achieved'));
    }

    //WEEKLY Activities
    private function acquisituion(Request $request)
    {
        $acquisituion = \App\WARUpstreamAcquisition::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $acquisituion = $acquisituion->where('year', 'like', "%{$request->q}%")->orwhere('month', 'like', "%{$request->q}%")
            ->orwhere('week', 'like', "%{$request->q}%");
        }

        $acquisituion = $acquisituion->paginate(15);

        return view('ajax.war-upstream-acquisituion', compact('acquisituion'));
    }

    //DWP PROJECT
    private function ind_project(Request $request)
    {
        $projects = \App\dwp::orderBy('id', 'desc');

        if ($request->has('q') && strlen($request->q) >= 3) {
            $projects = $projects->whereRaw("CONCAT(year,'-',month) like '%{$request->q}%'")
              ->orwhereHas('alignment', function ($query) use ($request) {
                  $query->where('alignment_name', 'like', "%{$request->q}%");
              })->orwhereHas('division', function ($query) use ($request) {
                  $query->where('division_name', 'like', "%{$request->q}%");
              })->orwhereHas('program_priority', function ($query) use ($request) {
                  $query->where('program_priority_name', 'like', "%{$request->q}%");
              })->orwhereHas('achievement_status', function ($query) use ($request) {
                  $query->where('achievement_status_name', 'like', "%{$request->q}%");
              });
        }

        if ($request->has('excel')) {
            $projects = collect($this->getTableColumns('dwp'))->filter(function ($value) {
                if (in_array($value, ['id', 'created_by', 'created_at', 'updated_at'])) {
                    return false;
                }

                return $value;
            });

            $alignment = \App\alignment::select('id', 'alignment_name')->get();
            $division = \App\division::select('id', 'division_name')->get();
            $dwp_program_priority = \App\dwp_program_priority::select('id', 'program_priority_name')->get();
            $dwp_task_target = \App\dwp_task_target::select('id', 'task_target_name')->get();
            $dwp_critical_milestone = \App\dwp_critical_milestone::select('id', 'critical_milestone_name')->get();
            $dwp_timeline = \App\dwp_timeline::select('id', 'timeline_name')->get();
            $dwp_achievement_status = \App\dwp_achievement_status::select('id', 'achievement_status_name')->get();
            $dwp_restricting_factor = \App\dwp_restricting_factor::select('id', 'restricting_factor_name')->get();
            $dwp_kpi_target = \App\dwp_kpi_target::select('id', 'kpi_name', 'kpi_target')->get();
            $dwp_key_recovery_plan = \App\dwp_key_recovery_plan::select('id', 'key_recovery_plan_name')->get();
            $status_category = \App\status_category::select('id', 'status', 'score')->get();

            return   $this->exportexcel('DPR Work Plan', ['dwp'=>$projects, 'alignment'=>$alignment, 'division'=>$division, 'dwp_program_priority'=>$dwp_program_priority, 'dwp_task_target'=>$dwp_task_target, 'dwp_critical_milestone'=>$dwp_critical_milestone, 'dwp_timeline'=>$dwp_timeline, 'dwp_achievement_status'=>$dwp_achievement_status, 'dwp_restricting_factor'=>$dwp_restricting_factor, 'dwp_kpi_target'=>$dwp_kpi_target, 'dwp_key_recovery_plan'=>$dwp_key_recovery_plan, 'status_category'=>$status_category]);
        } else {
            $projects = $projects->paginate(15);

            $Roles = \App\roles::orderBy('role_name', 'asc')->get();

            return view('ajax.dwp_projects', compact('projects', 'Roles'));
        }
    }

    private function exportexcel($worksheetname, $data)
    {
        //dd($data);
        // return \Excel::download(new \App\Exports\gas\gasSupply($data), $worksheetname);
        return \Excel::download(new \App\Exports\gas\GasObligationTemplate($data), 'Gas Obligation.xlsx');


        return \Excel::download($worksheetname, function ($excel) use ($data) 
        {
            foreach ($data as $sheetname=>$realdata) 
            {
                $excel->sheet($sheetname, function ($sheet) use ($realdata) 
                {
                    $sheet->fromArray($realdata);
                });
            }
        }); 
    }




    //Filter for Project
    private function filter_project_year($year)
    {
        $projected = \App\dwp::whereYear('year', $year)->orderBy('id', 'desc')->paginate(15);

        return view('ajax.dwp_manage_project', compact('projected'));
    }

    public function getNotificationDetails(Request $request)
    {
        $notify = \App\pris_notification::where('report_name', $request->report_name)->first();

        return response()->json($notify);
    }

    //Facility
    public function getFields(Request $request)
    {
        $field_data = \App\field::where('id', $request->id)->get();

        return response()->json($field_data);
    }

    public function getFieldDetails(Request $request)
    {
        $field_data = \App\field::where('id', $request->id)->get();

        return response()->json($field_data);
    }

    public function getFieldCompanyDetails(Request $request)
    {
        $company_data = \App\concession::where('id', $request->id)->get();

        return response()->json($company_data);
    }

    public function getConcessionDetails(Request $request)
    {
        $company_data = \App\concession::where('id', $request->id)->get();

        return response()->json($company_data);
    }

    public function getConstants(Request $request)
    {
        $constant_data = \App\permission::where('permission_category_id', $request->permission_category_id)->get();

        return response()->json($constant_data);
    }

    public function getCategoryRoles(Request $request)
    {
        $constant_data = \App\permission::where('permission_category_id', $request->permission_category_id)->get();

        return response()->json($constant_data);
    }

    public function checkPermissions(Request $request)
    {
        $perm_data = \App\PermissionRole::where('role_id', $request->role_id)->get();

        return response()->json($perm_data);
    }

    //Company Obligation
    public function getCompanyObligation(Request $request)
    {
        $comp_obligation = \App\gas_domestic_gas_obligation::where('year', 2020)->where('company_id', $request->company_id)->where('year', $request->year)->get();

        return response()->json($comp_obligation);
    }

    //Company Obligation
    public function getTotalAg_Nag(Request $request)
    {
        $total_ag_nag = \App\gas_summary_of_gas_production::where('month', $request->month)->where('year', $request->year)->get();

        return response()->json($total_ag_nag);
    }

    //Display NOGIAR Publication
    public function loadNogiarPublication(Request $request)
    {
        $nogiar_pub = \App\nogiar_publication_content::where('year', $request->year)->first();

        return response()->json($nogiar_pub);
    }

    public function getReportCustodianEmail(Request $request)
    {
        $email = \App\User::where('id', $request->report_custodian)->get();

        return response()->json($email);
    }

    public function getReportManagerEmail(Request $request)
    {
        $email = \App\User::where('id', $request->report_manager)->get();

        return response()->json($email);
    }

    public function getFieldCompany(Request $request)
    {
        $field_company = \App\field::where('id', $request->id)->get();

        return response()->json($field_company);
    }

    public function getExchangeRateDetails(Request $request)
    {
        $exchange_rates = \App\ExchangeRate::where('id', $request->id)->first();

        return response()->json($exchange_rates);
    }

    //YEAR THEMIC
    public function getMPMThematicAreaByYear(Request $request)
    {
        $mpm_themic_area = \App\themic_area::where('year', $request->year)->get();

        return response()->json($mpm_themic_area);
    }

    //YEAR KEY RESULT
    public function getMPMKeyResultByYear(Request $request)
    {
        $key_result = \App\key_result_area::where('year', $request->year)->get();

        return response()->json($key_result);
    }

    //YEAR KPI
    public function getMPMKPIByYear(Request $request)
    {
        $kpi = \App\mpm_kpi::where('year', $request->year)->get();

        return response()->json($kpi);
    }

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
}
