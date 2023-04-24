<?php

namespace App\Http\Controllers;

use App\Notifications\emailNOGIARManager;
use App\Notifications\emailVerification;
use App\Traits\ExcelExport;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
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
        $users = \App\EmailList::where('division', 'MASTER DATA')->get();
        //sending email to every DWP MANAGER
        $sender = \Auth::user()->email;
        $sender_name = \Auth::user()->name;
        $message = ', Data for '.$upload_name.' has been uploaded/Modified by '.$sender_name.' into PRIS, please review and take necessary action.';
        // foreach ($users as $_user)
        // {
        //     $user = \App\User::where('id', $_user->user_id)->first();     $name = $user->name;

        //     $user->notify(new emailNOGIARManager($message, $sender, $name));
        // }
        $admin = \App\User::where('id', 9)->first();
        $admin->notify(new emailNOGIARManager($message, $sender, 'Admin'));
    }

    //function for sending email
    public function send_all_mail_fac_type($upload_name, $type_id)
    {
        if ($type_id == 1) {
            $division = 'UPSTREAM';
        } elseif ($type_id == 2) {
            $division = 'DOWNSTREAM';
        } elseif ($type_id == 3) {
            $division = 'MIDSTREAM';
        } elseif ($type_id == 4) {
            $division = 'HSE';
        }

        $sender = \Auth::user()->email;
        $sender_name = \Auth::user()->name;
        $message = ', Data for '.$upload_name.' has been uploaded/Modified by '.$sender_name.' into PRIS, please review and take necessary action.';
        if ($type_id > 0 && $type_id < 5) {
            //getting the number of DWP USERS
            $users = \App\EmailList::where('division', $division)->get();
            //sending email to every DWP MANAGER
            foreach ($users as $_user) {
                $user = \App\User::where('id', $_user->user_id)->first();
                $name = $user->name;

                $user->notify(new emailNOGIARManager($message, $sender, $name));
            }
            $admin = \App\User::where('id', 9)->first();
            $admin->notify(new emailNOGIARManager($message, $sender, 'Admin'));
        } else {
            $admin = \App\User::where('id', 9)->first();
            $admin->notify(new emailNOGIARManager($message, $sender, 'Admin'));
        }
    }

    //function for sending email
    public function send_varification_mail($request, $token)
    {
        $sender = 'PRIS';
        $name = $request->name;

        return $email = \App\ExternalUser::where('email', $request->email)->first();
        $urlToView = 'http://localhost:8000/admin/email-comfirmation/'.$token;
        $message = ' Welcome and thanks for signing up for PRIS, to complete your account setup please click the link below.';
        $email->email->notify(new emailVerification($message, $sender, $name, $urlToView));
    }

    //function for sending approved email    notifyCustodianByEmail("UPSTREAM - ".$name." ", 13);
    public function notifyCustodianByEmail($section, $model_name)
    {
        //getting the number of DWP USERS
        $custodians = $model_name::distinct()->get(['created_by']);
        foreach ($custodians as $custodian) {
            $user = \App\User::where('name', $custodian->created_by)->first();
            $sender = $user->email;
            $name = $user->name;
            $message = ', A Batch of Pending '.$section.' Data has been Approve by '.\Auth::user()->name.'. 
            Please check for other pending data.';

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => \Auth::user()->id,
            'section' => 'Master Data',
            'record' => $record,
            'action' => $action,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            // self::send_approve_mail("MASTER DATA - ".$name." ", 13);
            //Audit Logging
            // self::log_audit_trail($name, 'Approved Data');

            if ($request->ajax()) {
                return response()->json(['status'=>'ok']);
            } else {
                return redirect()->route('admin.setup')->with('info', $name.' Pending Data Has Been Approved Successfully');
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
                return redirect()->route('admin.setup')->with('info', $name.' Pending Data Has Been Approved Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
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
        switch ($request->type) {
            case 'add_users':
                // code...
                return $this->addUser($request);
            break;

            case 'add_external_users':
                // code...
                return $this->addExternalUsers($request);
            break;

            case 'updateuser':
                // code...
                return $this->updateuser($request);
            break;

            case 'deactivateUser':
                // code...
                return $this->deactivateUser($request);
            break;

            case 'reactivateUser':
                // code...
                return $this->reactivateUser($request);
            break;

            case 'update_password':
                // code...
                return $this->update_password($request);
            break;

            case 'add_notification':
                // code...
                return $this->add_notification($request);
            break;

            case 'add_permission_category':
                return $this->add_permission_category($request);
            break;

            case 'add_permission':
                return $this->add_permission($request);
            break;

            case 'save_role':
                return $this->save_role($request);
            break;

            case 'delegate_role':
                return $this->delegate_role($request);
            break;

            case 'adddepartment':
                return $this->adddepartment($request);
            break;

            case 'upload_department':
                return $this->upload_department($request);
            break;

            case 'add_parent_company':
                return $this->add_parent_company($request);
            break;

            case 'upload_parent_company':
                return $this->upload_parent_company($request);
            break;

            case 'add_company':
                return $this->add_company($request);
            break;

            case 'upload_company':
                return $this->upload_company($request);
            break;

            case 'approve_pending_company':
                return $this->approve_pending_company($request);
            break;

            case 'add_field':
                return $this->add_field($request);
            break;

            case 'upload_field':
                return $this->upload_field($request);
            break;

            case 'add_contract':
                return $this->add_contract($request);
            break;

            case 'upload_contract':
                return $this->upload_contract($request);
            break;

            case 'add_concession':
                return $this->add_concession($request);
            break;

            case 'update_concession':
                return $this->update_concession($request);
            break;

            case 'upload_department':
                return $this->upload_department($request);
            break;

            case 'add_unlisted_open_block':
                return $this->add_unlisted_open_block($request);
            break;

            case 'upload_unlisted_open_block':
                return $this->upload_unlisted_open_block($request);
            break;

            case 'add_terrain':
                return $this->add_terrain($request);
            break;

            case 'upload_concession':
                return $this->upload_concession($request);
            break;

            case 'add_streams':
                return $this->add_streams($request);
            break;

            case 'upload_streams':
                return $this->upload_streams($request);
            break;

            case 'addfacility':
                return $this->addfacility($request);
            break;

            case 'upload_facility':
                return $this->upload_facility($request);
            break;

            case 'addfacilitytype':
                return $this->addfacilitytype($request);
            break;

            case 'upload_facilitytype':
                return $this->upload_facilitytype($request);
            break;

            case 'addlocation':
                return $this->addlocation($request);
            break;

            case 'upload_location':
                return $this->upload_location($request);
            break;

            case 'add_storage_location':
                return $this->add_storage_location($request);
            break;

            case 'upload_storage_location':
                return $this->upload_storage_location($request);
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
            case 'modals_editUsers':
                // code...
                return $this->editUsers($request);
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

            case 'approve_approveRefPerf':
                // code...
                return $this->approveRefPerf($request);
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
                return $this->approveRefVolume($request);
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

    public function users()
    {
        $users = \App\User::get();
        $roles = \App\roles::orderBy('role_name', 'asc')->get();

        return view('admin.users', compact('users', 'roles'));
    }

    public function addExternalUsers(Request $request)
    {
        try {
            $pass = $request->password;
            $password = bcrypt($pass);
            $token = Str::random(25);

            //INSERTING NEW EXTERNAL USER
            $add_user = \App\ExternalUser::updateOrCreate(['id'=> $request->id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'token' => $token,
            ]);
            //send validation mail
            // self::send_varification_mail($request, $token);
            $sender = 'support@snapnet.com.ng';
            $name = $request->name;
            $user = \App\ExternalUser::where('email', $request->email)->first();
            $external_user = $user->email;
            $urlToView = 'http://localhost:8000/admin/email-comfirmation/'.$token;
            $message = ' Welcome and thanks for signing up for PRIS, to complete your account setup please click the link below.';
            $user->notify(new emailVerification($message, $sender, $name, $urlToView));

            if ($request->ajax()) {
                $user_details = ['name'=>$add_user->name, 'email'=>$add_user->email, 'id'=>$add_user->id];

                return response()->json(['status'=>'ok', 'message'=>$user_details, 'info'=>'Your Account Was Saved Successfully, Please Check Your Email To Complete Your Registration.']);
            } else {
                return redirect()->back()->with('info', 'Your Account Was Saved Successfully, Please Check Your Email To Complete Your Registration.');
            }
        } catch (\Exception $e) {
            return  redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function emailConfirmation($token)
    {
        try {
            $user = \App\ExternalUser::where('token', $token)->first();
            if (! is_null($user)) {
                $user->email_confirmed = 1;
                $user->token = '';
                $user->save();

                return redirect()->back()->with('info', 'Your Account Activation Is Completed.');
            }
        } catch (\Exception $e) {
            return  redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function addUser(Request $request)
    {
        try {
            $this->validate($request,
          [
              'name' => 'required',
              'email' => 'required|unique:users',
              'password' => 'required',
              'role' => 'required',
          ]);

            $pass = $request->password;
            $password = bcrypt($pass);

            //INSERTING NEW USER
            $add_user = \App\User::updateOrCreate(['id'=> $request->id],
          [
              'name' => $request->name,
              'email' => $request->email,
              'password' => $password,
              'role' => $request->role,
              'created_by' => \Auth::user()->name,
          ]);
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Users Record', 'Update Record');
            } else {
                self::log_audit_trail('Users Record', 'Add Record');
            }

            if ($request->ajax()) {
                $user_details = ['name'=>$add_user->name, 'email'=>$add_user->email, 'role'=>$add_user->role_obj->role_name, 'id'=>$add_user->id];

                return response()->json(['status'=>'ok', 'message'=>$user_details, 'info'=>'New User Added Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('error', 'Sorry, An User Cannot Be Created. ');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editUsers(Request $request)
    {
        $USER = \App\User::where('id', $request->id)->first();

        return view('admin.modals.editUsers', compact('USER'));
    }

    public function deactivateUser(Request $request)
    {
        try {
            $data = [
                'active' => '0',
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            $id = $request->did;
            \App\User::where('id', $id)->update($data);

            //Audit Logging
            self::log_audit_trail('Users Record', 'Deactivate User');

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'message'=> '', 'info'=>'User Was Deactivated Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('info', 'User Was Deactivated Successfully');
            }
        } catch (\Exception $e) {
            return  response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occured Please Try Again. '.$e->getMessage()]);
        }
    }

    public function reactivateUser(Request $request)
    {
        try {
            $data = [
                'active' => '1',
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            $id = $request->rid;
            \App\User::where('id', $id)->update($data);

            //Audit Logging
            self::log_audit_trail('Users Record', 'Activate User');

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'message'=> '', 'info'=>'User Was Reactivated Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('info', 'User Has Been Reactivated');
            }
        } catch (\Exception $e) {
            return  response()->json(['status'=>'error', 'info'=>'Sorry, An Error Occured Please Try Again. '.$e->getMessage()]);
        }
    }

    public function add_roles(Request $request)
    {
        try {
            //INSERTING NEW Role
            $add_r = \App\roles::updateOrCreate(['id'=> $request->id],
            [
                'role_name' => $request->role_name,
                'description' => $request->description,
                'created_by' => \Auth::user()->name,
            ]);

            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Role Record', 'Update Record');
            } else {
                self::log_audit_trail('Role Record', 'Add Record');
            }

            if ($request->ajax()) {
                $role_details = ['role_name'=>$add_r->role_name, 'description'=>$add_r->description, 'id'=>$add_r->id];

                return response()->json(['status'=>'ok', 'message'=>$role_details, 'info'=>'New Role Added Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('info', 'Role Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editRoles(Request $request)
    {
        $ROLE_ = \App\roles::where('id', $request->id)->first();

        return view('admin.modals.editRoles', compact('ROLE_'));
    }

    public function upload_roles(Request $request)
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
                    $add_ = \App\roles::updateOrCreate(['id'=> $request->id],
                        [
                            'role_name' => $row['A'],
                            'description' => $row['B'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            //Audit Logging
            self::log_audit_trail('Role Record', 'Data Bulk Upload');

            return redirect()->route('admin.settings')->with('info', 'Role Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_roles($type)
    {
        //Audit Logging
        self::log_audit_trail('Roles', 'Downloaded Data');
        $data = \App\roles::get()->toArray();

        return Excel::create('PRIS Roles', function ($excel) use ($data) {
            $excel->sheet('Roles', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function save_role(Request $request)
    {
        try {
            $no_of_permissions = count($request->input('permission_list'));
            $role = \App\roles::find($request->perm_role_id);
            $perms = \App\permission::where('permission_category_id', $request->input('cate_id'))->pluck('id');
            $role->permission()->detach($perms);

            if ($no_of_permissions > 0) {
                for ($i = 0; $i < $no_of_permissions; $i++) {
                    $role->permission()->attach($request->permission_list[$i], ['created_at' => date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]);
                }
            }

            return redirect()->route('admin.settings')->with('info', 'Permissions and Privileges Assign To Role Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function add_sub_roles(Request $request)
    {
        try {
            //INSERTING NEW Sub Role
            $add_r = \App\role_sub::updateOrCreate(['id'=> $request->id],
            [
                'role_id' => $request->role_id,
                'sub_role_name' => $request->sub_role_name,
                'description' => $request->description,
                'created_by' => \Auth::user()->name,
            ]);

            if ($request->ajax()) {
                $role_details = ['role'=>$add_r->role->role_name, 'sub_role_name'=>$add_r->sub_role_name, 'description'=>$add_r->description, 'id'=>$add_r->id];

                return response()->json(['status'=>'ok', 'message'=>$role_details, 'info'=>'New Sub Role Added Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('info', 'Sub Role Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSubRoles(Request $request)
    {
        $ROLE_ = \App\role_sub::where('id', $request->id)->first();

        return view('admin.modals.editSubRoles', compact('ROLE_'));
    }

    public function upload_sub_roles(Request $request)
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
                    $add_ = \App\role_sub::updateOrCreate(['id'=> $request->id],
                        [
                            'role_id' => $row['A'],
                            'sub_role_name' => $row['B'],
                            'description' => $row['C'],
                            'created_by' => $created_by,
                        ]);
                }
            }

            return redirect()->route('admin.settings')->with('info', 'Sub Role Excel Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_sub_roles($type)
    {
        $data = \App\role_sub::get()->toArray();

        return Excel::create('PRIS Sub Roles', function ($excel) use ($data) {
            $excel->sheet('Sub Roles', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function updateuser(Request $request)
    {
        try {
            $data = ['name' => $request->input('name'), 'email' => $request->input('email'), 'role' => $request->input('role'), 'updated_at' => date('Y-m-d h:i:s')];

            $id = $request->id;
            \App\User::where('id', $id)->update($data);
            //Audit Logging
            self::log_audit_trail('User Record', 'Update User');

            return redirect()->route('admin.settings')->with('info', 'User Details Updated Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function delegate_role(Request $request)
    {
        try {
            $data = [
                'delegate_role' => $request->delegated_role,
                'end_date' => date('Y-m-d', strtotime($request->end_date)),
                'delegate_by' => \Auth::user()->id,
                'delegate_at' => date('Y-m-d h:i:s'),
            ];

            $id = $request->dele_user_id;
            \App\User::where('id', $id)->update($data);

            //Audit Logging
            self::log_audit_trail('Role Permission', 'Delegated Role');

            return redirect()->route('admin.settings')->with(['info'=>'User Has Been Delegated '.$request->delegated_role.' Data Approval Role', 'tab'=>'del']);
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with(['error'=>'Sorry, An Error Occurred Please Try Again. '.$e->getMessage(), 'tab'=>'del']);
        }
    }

    public function change_password(Request $request)
    {
        $id = \Auth::user()->id;

        return view('admin.change-password', compact('id'));
    }

    public function update_password(Request $request)
    {
        try {
            $email = $request->email;
            //COMPARING NEW PASSWORD
            if ($email == \Auth::user()->email) {
                $newpass = $request->newpass;
                $passconf = $request->passconf;

                //COMPARING PASSWORD
                if ($newpass == $passconf) {
                    $newpass = $request->newpass;
                    $newpass = bcrypt($newpass);
                    //INSERTING NEW USER
                    $upd_pass = \App\User::updateOrCreate(['id'=> $request->id],
                [
                    'password' => $newpass,
                    'created_by' => \Auth::user()->name,
                ]);

                    //Audit Logging
                    self::log_audit_trail('Password Management', 'Change Password');

                    return redirect()->route('admin.change-password')->with('info', 'Password Changed Successfully');
                } else {
                    return redirect()->route('admin.change-password')->with('errors', 'Sorry, New Password Do Not Match');
                }
            } else {
                return redirect()->route('admin.change-password')->with('errors', 'Sorry, Email  Does Not Exist');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.change-password')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function settings()
    {
        $roles = $wfroles = \App\roles::orderBy('role_name', 'asc')->get();
        $Roles = \App\roles::orderBy('id', 'desc')->paginate(10);
        $pris_reports = \App\pris_priority_report::orderBy('report_name', 'asc')->get();
        $pris_notify = \App\pris_notification::where('id', 1)->first();
        $custodian = $managers = $delegate_users = $users = $email_users = \App\User::orderBy('name', 'asc')->get();
        $categories = $perm_category = \App\PermissionCategory::orderBy('category_name', 'asc')->get();
        $sub_role = \App\role_sub::orderBy('sub_role_name', 'asc')->get();

        $workflows = \App\Workflow::paginate(10);
        $wf_settings = \App\WorkflowSetting::all();

        return view('admin.settings', compact('Roles', 'roles', 'pris_reports', 'pris_notify', 'custodian', 'managers', 'perm_category', 'categories', 'sub_role', 'workflows', 'users', 'delegate_users', 'wfroles', 'wf_settings', 'email_users'));
    }

    public function updatesettings(Request $request)
    {
        try {
            $data = [
                //'role' => $request->input('role'),
                'upstream' => $request->input('upstream'),
                'downstream' => $request->input('downstream'),
                'midstream' => $request->input('midstream'),
                'concession' => $request->input('concession'),
                'performance_management' => $request->input('performance_management'),
                'dwp' => $request->input('dwp'),
                'she' => $request->input('she'),
                'economics' => $request->input('economics'),
                'upstream_report' => $request->input('upstream_rep'),
                'downstream_report' => $request->input('downstream_rep'),
                'midstream_report' => $request->input('midstream_rep'),
                'concession_report' => $request->input('concession_rep'),
                'performance_management_report' => $request->input('performance_management_rep'),
                'dwp_report' => $request->input('dwp_rep'),
                'she_report' => $request->input('she_rep'),
                'economics_report' => $request->input('economics_rep'),
                'report' => $request->input('report'),
                'forecasting' => $request->input('forecasting'),
                'benchmark' => $request->input('benchmark'),
                'publications' => $request->input('publications'),
                'settings' => $request->input('settings'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            $id = $request->role_id;
            $upd_permissions = \App\permissions::where('id', $id)->update($data);
            if ($upd_permissions) {
                return redirect()->route('admin.settings')->with('info', 'Role Permission(s) \ Priviledge(s) Updated Successfully');
            } else {
                return redirect()->route('admin.settings')->with(['status'=>'error', 'info'=>'Could Not Update. ']);
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function addEmailList(Request $request)
    {
        try { //return $request->all();
            $add = \App\EmailList::updateOrCreate(['id'=> $request->elist_id],
        [
            'division' => $request->division,
            'user_id' => $request->user_id,
            'role' => $request->role,
        ]);

            //Audit Logging
            self::log_audit_trail('Email List ', 'Added Record');
            if ($request->ajax()) {
                $add_details = ['division'=>$add->division, 'user'=>$add->user->name, 'role'=>$add->role, 'id'=>$add->id];

                return response()->json(['status'=>'success', 'info'=>$add_details, 'message'=>'New User Added To Emailing List Successfully.']);
            } else {
                return view('admin.settings');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function getEmailListing(Request $request)
    {
        $users = \App\EmailList::where('division', $request->division)->orderBy('id', 'desc')->with(['user'])->get();

        return response()->json($users);
    }

    public function removeUser(Request $request)
    {
        try {
            // return $request->all();
            $delete_record = \App\EmailList::where('id', $request->id)->delete();

            //Audit Logging
            self::log_audit_trail('Email List ', 'delete User');
            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'User Removed From Emailing List Successfully ']);
            } else {
                return view('admin.settings');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function getEmailUsersById(Request $request)
    {
        $users = \App\EmailList::where('id', $request->id)->with(['user'])->first();

        return response()->json($users);
    }

    public function setup()
    {
        $comp_ddl = $stream_company = $block_comp = $open_comp = $field_company = $equity_1 = $equity_2 = $equity_3 = $equity_4 = $equity_5 = $equity_6 = $equity_7 = $equity_8 = $company_mf = \App\company::orderBy('company_name', 'asc')->get();
        $conc_ddl = \App\concession::orderBy('concession_name', 'asc')->get();
        $terr_ddl = $field_terrain = \App\terrain::orderBy('terrain_name', 'asc')->get();
        $block_cont = $open_cont = $field_contract = \App\contract::orderBy('contract_name', 'asc')->get();
        $parent_comp = \App\company_parent::orderBy('company_name', 'asc')->get();
        $production_types = \App\down_production_type::orderBy('production_type_name', 'asc')->get();
        $open_terrain = $block_terrain = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();

        $field_mf = \App\field::orderBy('field_name', 'asc')->get();

        return view('admin.setup', compact('comp_ddl', 'conc_ddl', 'terr_ddl', 'stream_company', 'block_comp', 'block_cont', 'open_comp', 'open_cont', 'parent_comp', 'production_types', 'field_company', 'open_terrain', 'block_terrain', 'equity_1', 'equity_2', 'equity_3', 'equity_4', 'equity_5', 'equity_6', 'equity_7', 'equity_8', 'company_mf', 'field_mf', 'field_terrain', 'field_contract'));
    }

    public function adddepartment(Request $request)
    {
        try {
            //INSERTING Department
            $add_department = \App\department::updateOrCreate(['id'=> $request->id],
        [
            'department_name' => $request->department_name,
            'created_by' => \Auth::user()->name,
        ]);

            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Department', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Department', 'Add Record');
            }

            if ($request->ajax()) {
                $dept_details = ['department'=>$add_department->department_name, 'id'=>$add_department->id];

                return response()->json(['status'=>'ok', 'message'=>$dept_details, 'info'=>'New Department Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Department Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editDepartment(Request $request)
    {
        $department = \App\department::where('id', $request->id)->first();

        return view('admin.modals.editDepartment', compact('department'));
    }

    public function upload_department(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\department::updateOrCreate(['id'=> $request->id], ['department_name' => $row['A'], 'created_by' => \Auth::user()->name]);
                }
            }

            //send mail
            $admin_mail = \App\User::where('role', '1')->first();
            $message = $admin_mail->name.'<br> , New Department (Master Data) has been created by '.\Auth::user()->name.' for PRIS.';

            \Auth::user()->notify(new emailNOGIARManager($message));
            $nogiar_manager->notify(new emailNOGIARManager($message));

            //Audit Logging
            self::log_audit_trail('Master Data Department', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Departments Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_department($type)
    {
        //Audit Logging
        self::log_audit_trail('Departments', 'Downloaded Data');
        $data = \App\department::get()->toArray();

        return Excel::create('PRIS Departments', function ($excel) use ($data) {
            $excel->sheet('Departments', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_company(Request $request)
    {
        try {
            $id = $request->id;
            if ($id == '') {
                $comp = $request->company_name;
                $str = substr($comp, 0, 3);
                $tot_comp = \App\company::count();
                $tot_comp = $tot_comp + 1;
                $company_code = 'CO-'.$str.'-'.$tot_comp;
            } else {
                $company_code = $request->company_code;
            }

            //INSERTING NEW Company / Operator
            $add_company = \App\company::updateOrCreate(['id'=> $request->id],
        [
            'parent_company_id' => $request->parent_company_id,
            'company_code' => $company_code,
            'company_name' => $request->company_name,
            'contact_name' => $request->contact_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'rc_number' => $request->rc_number,
            'license_expire_date' => $request->license_expire_date,
            'operation_type' => $request->operation_type,
            'operation_type' => '0',
            'batch_number' => date('d-M'),
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Companies ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Companies', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Companies', 'Add Record');
            }

            if ($add_company->parent_company) {
                $parent_company = $add_company->parent_company->company_name;
            } else {
                $parent_company = 'N/A';
            }
            if ($request->ajax()) {
                $comp_details = ['parent_company' => $parent_company, 'company_code'=>$add_company->company_code, 'company'=>$add_company->company_name, 'contact_name'=>$add_company->contact_name, 'email'=>$add_company->email, 'phone'=>$add_company->phone, 'address'=>$add_company->address, 'rc_number'=>$add_company->rc_number, 'license_expire_date'=>$add_company->license_expire_date, 'operation_type'=>$add_company->operation_type, 'P', 'id'=>$add_company->id];

                return response()->json(['status'=>'ok', 'message'=>$comp_details, 'info'=>'New Company / Operator Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Company / Operator Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editCompany(Request $request)
    {
        $COMP_ = \App\company::where('id', $request->id)->first();

        return view('admin.modals.editCompany', compact('COMP_'));
    }

    public function upload_company(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $comp = $row['B'];
                    $str = substr($comp, 0, 3);
                    $tot_comp = \App\company::orderByDesc('id')->first();
                    if ($tot_comp) {
                        $tot_comp = $tot_comp->id + 1;
                    } else {
                        $tot_comp = 1;
                        $company_code = 'CO-'.$str.'-'.$tot_comp;
                    }

                    $company_code = 'CO-'.$str.'-'.$tot_comp;
                    $add_ = \App\company::updateOrCreate(['id'=> $request->id],
                        ['parent_company_id' => $row['A'],
                            'company_code' => $company_code,
                            'company_name' => $row['B'],
                            'contact_name' => $row['C'],
                            'email' => $row['D'],
                            'phone' => $row['E'],
                            'address' => $row['F'],
                            'rc_number' => $row['G'],
                            'license_expire_date' => $row['H'],
                            'operation_type' => $row['I'],
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);
                }
            }
            //send mail
            self::send_all_mail('Master Data - Companies ');
            //Audit Logging
            self::log_audit_trail('Master Data Companies', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Companies Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_company($type)
    {
        //Audit Logging
        self::log_audit_trail('Companies', 'Downloaded Data');
        $data = \App\company::get();
        $view = 'admin.excel.company_excel';

        return     \Excel::create('PRIS Companies', function ($excel) use ($view, $data) {
            $excel->sheet('Company', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function viewcompanyfields(Request $request)
    {
        $com_fields = \App\field::where('company_id', $request->id)->paginate(15);
        $com_fields_count = \App\field::where('company_id', $request->id)->count();
        $company = \App\company::where('id', $request->id)->first();
        $id = $request->id;

        return view('admin.view.viewCompanyFields', compact('com_fields', 'company', 'com_fields_count', 'id'));
    }

    public function approveCompany(Request $request)
    {
        $company = \App\company::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('admin.view.approveCompany', compact('company'));
    }

    public function add_parent_company(Request $request)
    {
        try {
            $id = $request->id;
            if ($id == '') {
                $comp = $request->company_name;
                $str = substr($comp, 0, 3);
                $tot_comp = \App\company_parent::count();
                $tot_comp = $tot_comp + 1;
                $company_code = 'PC-'.$str.'-'.$tot_comp;
            } else {
                $company_code = $request->company_code;
            }

            //INSERTING NEW Company / Operator
            $add_company = \App\company_parent::updateOrCreate(['id'=> $request->id],
        [
            'company_code' => $company_code,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'created_by' => \Auth::user()->name,
        ]);

            if ($request->ajax()) {
                $comp_details = ['company_code'=>$add_company->company_code, 'company'=>$add_company->company_name, 'address'=>$add_company->address, 'id'=>$add_company->id];

                return response()->json(['status'=>'ok', 'message'=>$comp_details, 'info'=>'New Parent Company Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Parent Company Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editParentCompany(Request $request)
    {
        $COMP_ = \App\company_parent::where('id', $request->id)->first();

        return view('admin.modals.editParentCompany', compact('COMP_'));
    }

    public function upload_parent_company(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $comp = $row['B'];
                    $str = substr($comp, 0, 3);
                    $tot_comp = \App\company_parent::orderByDesc('id')->first();
                    if ($tot_comp) {
                        $tot_comp = $tot_comp->id + 1;
                        $company_code = 'CO-'.$str.'-'.$tot_comp;

                        $add_ = \App\company::updateOrCreate(['id'=> $request->id], ['company_code' => $company_code, 'company_name' => $row['A'], 'address' => $row['B'], 'created_by' => \Auth::user()->name]);
                    } else {
                        $tot_comp = 1;
                        $company_code = 'CO-'.$str.'-'.$tot_comp;

                        $add_ = \App\company::updateOrCreate(['id'=> $request->id], ['company_code' => $company_code, 'company_name' => $row['A'], 'address' => $row['B'], 'created_by' => \Auth::user()->name]);
                    }
                }
            }

            return redirect()->route('admin.setup')->with('info', 'Parent Companies Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_parent_company($type)
    {
        //Audit Logging
        self::log_audit_trail('Parent Companies', 'Downloaded Data');
        $data = \App\company_parent::get();
        $view = 'admin.excel.company_excel';

        return     \Excel::create('PRIS Equity Companies', function ($excel) use ($view, $data) {
            $excel->sheet('Equity Company', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function add_field(Request $request)
    {
        try {
            $id = $request->id;
            if ($id == '') {
                $field = $request->field_name;
                $str = substr($field, 0, 3);
                $tot = \App\field::count();
                if ($tot) {
                    $tot = $tot + 1;
                    $field_code = 'FIE-'.$str.'-'.$tot;
                } else {
                    $tot = 1;
                    $field_code = 'FIE-'.$str.'-'.$tot;
                }
            } else {
                $field_code = $request->field_code;
            }
            //INSERTING NEW FIELD
            $add_field = \App\field::updateOrCreate(['id'=> $request->id],
        [
            'field_code' => $field_code,
            'field_name' => $request->field_name,
            'concession_id' => $request->concession_id,
            'company_id' => $request->company_id,
            'contract_id' => $request->contract_id,
            'terrain_id' => $request->terrain_id,
            // 'stage_id' => $request->stage_id,
            'batch_number' => $request->batch_number,
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Fields ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Fields', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Fields', 'Add Record');
            }

            if ($request->ajax()) {
                $field_details = ['field_code'=>$add_field->field_code, 'field'=>$add_field->field_name, 'concession'=>$add_field->concession->concession_name, 'company'=>$add_field->company->company_name, 'contract'=>$add_field->contract->contract_name, 'terrain'=>$add_field->terrain->terrain_name, 'P', 'id'=>$add_field->id];

                return response()->json(['status'=>'ok', 'message'=>$field_details, 'info'=>'New Field Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Field Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editField(Request $request)
    {
        $FIELD_ = \App\field::where('id', $request->id)->first();
        $one_con = \App\concession::where('id', $FIELD_->concession_id)->first();
        $all_con = \App\concession::orderBy('concession_name', 'asc')->get();
        $one_com = \App\company::where('id', $FIELD_->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_ctr = \App\contract::where('id', $FIELD_->contract_id)->first();
        $all_ctr = \App\contract::orderBy('contract_name', 'asc')->get();
        $one_ter = \App\terrain::where('id', $FIELD_->terrain_id)->first();
        $all_ter = \App\terrain::orderBy('terrain_name', 'asc')->get();

        return view('admin.modals.editField', compact('FIELD_', 'one_con', 'all_con', 'one_com', 'all_com', 'one_ctr', 'all_ctr', 'one_ter', 'all_ter'));
    }

    public function upload_field(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $field = $row['A'];
                    $str = substr($field, 0, 3);
                    $tot = \App\field::count();
                    if ($tot) {
                        $tot = $tot + 1;
                        $field_code = 'FIE-'.$str.'-'.$tot;
                    } else {
                        $tot = 1;
                        $field_code = 'FIE-'.$str.'-'.$tot;
                    }

                    $add_ = \App\field::updateOrCreate(['id'=> $request->id],
                    [
                        'field_code' => $field_code,
                        'field_name' => $row['A'],
                        'concession_id' => $this->resolveModelId(\App\concession::class, 'concession_name', $row['B']),
                        'company_id' => $this->resolveModelId(\App\company::class, 'company_name', $row['C']),
                        'contract_id' => $this->resolveModelId(\App\contract::class, 'contract_name', $row['D']),
                        'terrain_id' => $this->resolveModelId(\App\terrain::class, 'terrain_name', $row['E']),
                        'batch_number' => date('d-M'),
                        'created_by' => \Auth::user()->name,
                    ]);
                }
            }

            //send mail
            self::send_all_mail('Master Data - Fields ');
            //Audit Logging
            self::log_audit_trail('Master Data Fields', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Fields Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_field($type)
    {
        //Audit Logging
        self::log_audit_trail('Fields', 'Downloaded Data');
        $data = \App\field::get();
        $view = 'admin.excel.field_excel';

        return     \Excel::create('PRIS Fields', function ($excel) use ($view, $data) {
            $excel->sheet('Fields', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function approveField(Request $request)
    {
        $field = \App\field::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('admin.view.approveField', compact('field'));
    }

    public function add_contract(Request $request)
    {
        try {
            //INSERTING NEW contract
            $add_contract = \App\contract::updateOrCreate(['id'=> $request->id],
        [
            'contract_name' => $request->contract_name,
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Contracts ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Contracts', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Contracts', 'Add Record');
            }

            if ($request->ajax()) {
                $cont_details = ['contract'=>$add_contract->contract_name, 'id'=>$add_contract->id];

                return response()->json(['status'=>'ok', 'message'=>$cont_details, 'info'=>'New Contract Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Contract Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editContract(Request $request)
    {
        $CONT_ = \App\contract::where('id', $request->id)->first();

        return view('admin.modals.editContract', compact('CONT_'));
    }

    public function upload_contract(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\contract::updateOrCreate(['id'=> $request->id], ['contract_name' => $row['A'], 'created_by' => \Auth::user()->name]);
                }
            }

            //send mail
            self::send_all_mail('Master Data - Contracts ');
            //Audit Logging
            self::log_audit_trail('Master Data Contracts', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Contracts Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_contract($type)
    {
        //Audit Logging
        self::log_audit_trail('Contracts', 'Downloaded Data');

        $data = \App\contract::get()->toArray();

        return Excel::create('PRIS Contracts', function ($excel) use ($data) {
            $excel->sheet('Contracts', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_concession(Request $request)
    {
        try {
            $number = $request->concession_name;
            $name = $request->conc;
            $concession_name = $name.$number;

            //INSERTING NEW CONCESSION
            $add_conc = \App\concession::updateOrCreate(['id'=> $request->id],
        [
            'company_id' => $request->company_id,
            'concession_name' => $concession_name,
            'equity_1' => $request->equity_1,
            'percentage_1' => $request->percentage_1,
            'equity_2' => $request->equity_2,
            'percentage_2' => $request->percentage_2,
            'equity_3' => $request->equity_3,
            'percentage_3' => $request->percentage_3,
            'equity_4' => $request->equity_4,
            'percentage_4' => $request->percentage_4,
            'equity_5' => $request->equity_5,
            'percentage_5' => $request->percentage_5,
            'equity_6' => $request->equity_6,
            'percentage_6' => $request->percentage_6,
            'equity_7' => $request->equity_7,
            'percentage_7' => $request->percentage_7,
            'equity_8' => $request->equity_8,
            'percentage_8' => $request->percentage_8,
            'contract_id' => $request->contract_id,
            'award_date' => $request->award_date,
            'license_expire_date' => $request->license_expire_date,
            'area' => $request->area,
            'geological_terrain_id' => $request->geological_terrain_id,
            'comment' => $request->comment,
            'stage_id' => '0',
            'batch_number' => date('d-M'),
            'created_by' => \Auth::user()->name,
        ]);

            //INSERTING NEW CONCESSION TO CONCESSION HISTORY
            $add_concession_history = \App\concession_history::updateOrCreate(['id'=> $request->id],
        [
            'history_id' => $add_conc->id,
            'concession_name' => $concession_name,
            'equity_1' => $request->equity_1,
            'percentage_1' => $request->percentage_1,
            'equity_2' => $request->equity_2,
            'percentage_2' => $request->percentage_2,
            'equity_3' => $request->equity_3,
            'percentage_3' => $request->percentage_3,
            'equity_4' => $request->equity_4,
            'percentage_4' => $request->percentage_4,
            'equity_5' => $request->equity_5,
            'percentage_5' => $request->percentage_5,
            'equity_6' => $request->equity_6,
            'percentage_6' => $request->percentage_6,
            'equity_7' => $request->equity_7,
            'percentage_7' => $request->percentage_7,
            'equity_8' => $request->equity_8,
            'percentage_8' => $request->percentage_8,
            'company_id' => $request->company_id,
            'area' => $request->area,
            'contract_id' => $request->contract_id,
            'award_date' => $request->award_date,
            'license_expire_date' => $request->license_expire_date,
            'area' => $request->area,
            'geological_terrain_id' => $request->geological_terrain_id,
            'comment' => $request->comment,
            'status' => '0',
            'created_by' => \Auth::user()->name,
            'updated_by' => ' ',
            'updated_by' => ' ',
        ]);

            //send mail
            self::send_all_mail('Master Data - Concession ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Concession', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Concession', 'Add Record');
            }

            if ($request->ajax()) {
                $cont_details = ['company'=>$add_conc->company->company_name, 'concession'=>$add_conc->concession_name,
                    'equity'=>$add_conc->equity_one->company_name.' - '.$add_conc->percentage_1.'%, '.
                              $add_conc->equity_two->company_name.' - '.$add_conc->percentage_2.'%, '.
                              $add_conc->equity_three->company_name.' - '.$add_conc->percentage_3.'%, '.
                              $add_conc->equity_four->company_name.' - '.$add_conc->percentage_4.'%, '.
                              $add_conc->equity_five->company_name.' - '.$add_conc->percentage_5.'%',
                    $add_conc->equity_six->company_name.' - '.$add_conc->percentage_5.'%',
                    $add_conc->equity_seven->company_name.' - '.$add_conc->percentage_6.'%',
                    $add_conc->equity_eight->company_name.' - '.$add_conc->percentage_7.'%',
                    'area'=>$add_conc->area, 'contract'=>$add_conc->contract->contract_name, 'award_date'=>$add_conc->award_date, 'terrain'=>$add_conc->terrain->terrain_name, 'id'=>$add_conc->id, ];

                return response()->json(['status'=>'ok', 'message'=>$cont_details, 'info'=>'New Concession Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Concession Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editConcession(Request $request)
    {
        $concession = \App\concession::where('id', $request->id)->first();

        $one_coc = \App\contract::where('id', $concession->contract_id)->first();
        $all_coc = \App\contract::orderBy('contract_name', 'asc')->get();
        $one_comp = \App\company::where('id', $concession->company_id)->first();
        $comp_ddl = \App\company::orderBy('company_name', 'asc')->get();
        $one_ter = \App\up_concession_terrain::where('id', $concession->geological_terrain_id)->first();
        $all_ter = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();
        $one_equ_1 = \App\company::where('id', $concession->equity_1)->first();
        $all_equ_1 = \App\company::orderBy('company_name', 'asc')->get();
        $one_equ_2 = \App\company::where('id', $concession->equity_2)->first();
        $all_equ_2 = \App\company::orderBy('company_name', 'asc')->get();
        $one_equ_3 = \App\company::where('id', $concession->equity_3)->first();
        $all_equ_3 = \App\company::orderBy('company_name', 'asc')->get();
        $one_equ_4 = \App\company::where('id', $concession->equity_4)->first();
        $all_equ_4 = \App\company::orderBy('company_name', 'asc')->get();
        $one_equ_5 = \App\company::where('id', $concession->equity_5)->first();
        $all_equ_5 = \App\company::orderBy('company_name', 'asc')->get();
        $one_equ_6 = \App\company::where('id', $concession->equity_6)->first();
        $all_equ_6 = \App\company::orderBy('company_name', 'asc')->get();
        $one_equ_7 = \App\company::where('id', $concession->equity_7)->first();
        $all_equ_7 = \App\company::orderBy('company_name', 'asc')->get();
        $one_equ_8 = \App\company::where('id', $concession->equity_8)->first();
        $all_equ_8 = \App\company::orderBy('company_name', 'asc')->get();

        return view('admin.modals.editConcession', compact('concession', 'one_coc', 'all_coc', 'one_comp', 'comp_ddl', 'one_ter', 'all_ter', 'one_equ_1', 'all_equ_1', 'one_equ_2', 'all_equ_2', 'one_equ_3', 'all_equ_3', 'one_equ_4', 'all_equ_4', 'one_equ_5', 'all_equ_5', 'one_equ_6', 'all_equ_6', 'one_equ_7', 'all_equ_7', 'one_equ_8', 'all_equ_8'));
    }

    public function update_concession(Request $request)
    {
        try {
            //return $request->all();
            //INSERTING NEW CONCESSION
            $data = [
                'company_id' => $request->company_id,
                'concession_name' => $request->concession_name,
                'equity_1' => $request->equity_1,
                'percentage_1' => $request->percentage_1,
                'equity_2' => $request->equity_2,
                'percentage_2' => $request->percentage_2,
                'equity_3' => $request->equity_3,
                'percentage_3' => $request->percentage_3,
                'equity_4' => $request->equity_4,
                'percentage_4' => $request->percentage_4,
                'equity_5' => $request->equity_5,
                'percentage_5' => $request->percentage_5,
                'equity_6' => $request->equity_6,
                'percentage_6' => $request->percentage_6,
                'equity_7' => $request->equity_7,
                'percentage_7' => $request->percentage_7,
                'equity_8' => $request->equity_8,
                'percentage_8' => $request->percentage_8,
                'contract_id' => $request->contract_id,
                'award_date' => $request->award_date,
                'license_expire_date' => $request->license_expire_date,
                'area' => $request->area,
                'geological_terrain_id' => $request->geological_terrain_id,
                'comment' => $request->comment,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            \App\concession::where('id', $request->id)->update($data);

            //INSERT INTO HISTORY TABLE
            $concession = \App\concession::find($request->id);
            $add_concession = \App\concession_history::create([
                'history_id' => $request->id,
                'concession_name' => $request->concession_name,
                'equity_1' => $request->equity_1,
                'percentage_1' => $request->percentage_1,
                'equity_2' => $request->equity_2,
                'percentage_2' => $request->percentage_2,
                'equity_3' => $request->equity_3,
                'percentage_3' => $request->percentage_3,
                'equity_4' => $request->equity_4,
                'percentage_4' => $request->percentage_4,
                'equity_5' => $request->equity_5,
                'percentage_5' => $request->percentage_5,
                'equity_6' => $request->equity_6,
                'percentage_6' => $request->percentage_6,
                'equity_7' => $request->equity_7,
                'percentage_7' => $request->percentage_7,
                'equity_8' => $request->equity_8,
                'percentage_8' => $request->percentage_8,
                'company_id' => $request->company_id,
                'area' => $request->area,
                'contract_id' => $request->contract_id,
                'award_date' => $request->award_date,
                'status' => '0',
                'created_by' => $concession->created_by,
                'updated_by' => \Auth::user()->name,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            //send mail
            self::send_all_mail('Master Data - Concession ');
            //Audit Logging
            self::log_audit_trail('Master Data Concession', 'Update Data');

            return redirect()->route('admin.setup')->with('info', 'Concession Updated Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function upload_concession(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\concession::updateOrCreate(['id'=> $request->id],
                        [
                            'company_id' => $this->resolveModelId(\App\company::class, 'company_name', $row['A']),
                            'concession_held_id' => $row['B'],
                            'equity_1' => $row['C'],
                            'percentage_1' => $row['D'],
                            'equity_2' => $row['E'],
                            'percentage_2' => $row['F'],
                            'equity_3' => $row['G'],
                            'percentage_3' => $row['H'],
                            'equity_4' => $row['I'],
                            'percentage_4' => $row['J'],
                            'equity_5' => $row['K'],
                            'percentage_5' => $row['L'],
                            'equity_6' => $row['M'],
                            'percentage_6' => $row['N'],
                            'equity_7' => $row['O'],
                            'percentage_7' => $row['P'],
                            'equity_8' => $row['Q'],
                            'percentage_8' => $row['R'],
                            'contract_id' => $this->resolveModelId(\App\contract::class, 'contract_name', $row['S']),
                            'award_date' => $row['T'],
                            'license_expire_date' => $row['U'],
                            'area' => $row['V'],
                            'geological_terrain_id' => $this->resolveModelId(\App\up_concession_terrain::class, 'terrain_name', $row['W']),
                            'comment' => $row['X'],
                            'stage_id' => '0',
                            'batch_number' => date('d-M'),
                            'created_by' => \Auth::user()->name,
                        ]);

                    //INSERT INTO HISTORY TABLE
                    $concession = \App\concession::find($request->id);
                    $add_concession = \App\concession_history::create([
                        'history_id' => $request->id,
                        'company_id' => $this->resolveModelId(\App\company::class, 'company_name', $row['A']),
                        'concession_held_id' => $row['B'],
                        'equity_1' => $row['C'],
                        'percentage_1' => $row['D'],
                        'equity_2' => $row['E'],
                        'percentage_2' => $row['F'],
                        'equity_3' => $row['G'],
                        'percentage_3' => $row['H'],
                        'equity_4' => $row['I'],
                        'percentage_4' => $row['J'],
                        'equity_5' => $row['K'],
                        'percentage_5' => $row['L'],
                        'equity_6' => $row['M'],
                        'percentage_6' => $row['N'],
                        'equity_7' => $row['O'],
                        'percentage_7' => $row['P'],
                        'equity_8' => $row['Q'],
                        'percentage_8' => $row['R'],
                        'contract_id' => $this->resolveModelId(\App\contract::class, 'contract_name', $row['S']),
                        'award_date' => $row['T'],
                        'license_expire_date' => $row['U'],
                        'area' => $row['V'],
                        'geological_terrain_id' => $this->resolveModelId(\App\up_concession_terrain::class, 'terrain_name', $row['W']),
                        'comment' => $row['X'],
                        'status' => '0',
                        'created_by' => $concession->created_by,
                        'updated_by' => \Auth::user()->name,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }
                //send mail
                self::send_all_mail('Master Data - Concession ');
                //Audit Logging
                self::log_audit_trail('Master Data Concession', 'Data Bulk Upload');
            }

            return redirect()->route('admin.setup')->with('info', 'Cconcessions Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_concession($type)
    {
        //Audit Logging
        self::log_audit_trail('Concession', 'Downloaded Data');
        $data = \App\concession::get();
        $view = 'admin.excel.concession_excel';

        return     \Excel::create('PRIS Concession/Blocks', function ($excel) use ($view, $data) {
            $excel->sheet('Concession', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function viewconcessionhistory(Request $request)
    {
        $histories = \App\concession_history::where('history_id', $request->id)->paginate(15);
        $id = $request->id;

        return view('admin.view.viewConcessionHistory', compact('histories', 'id'));
    }

    public function viewconcessionfields(Request $request)
    {
        $conc_fields = \App\field::where('concession_id', $request->id)->paginate(15);
        $conc_fields_count = \App\field::where('concession_id', $request->id)->count();
        $concession = \App\concession::where('id', $request->id)->first();
        $id = $request->id;

        return view('admin.view.viewConcessionFields', compact('conc_fields', 'concession', 'conc_fields_count', 'id'));
    }

    public function download_concession_history($type)
    {
        //Audit Logging
        self::log_audit_trail('Concession histories', 'Downloaded Data');
        $data = \App\concession_history::get();
        $view = 'admin.excel.concession_history_excel';

        return     \Excel::create('PRIS Concession History', function ($excel) use ($view, $data) {
            $excel->sheet('Concession History', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function approveConcession(Request $request)
    {
        $concession = \App\concession::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('admin.view.approveConcession', compact('concession'));
    }

    public function add_unlisted_open_block(Request $request)
    {
        try {
            $number = $request->concession_name;
            $name = $request->conc;
            $concession_name = $name.$number;

            //INSERTING NEW CONCESSION
            $add_concession = \App\concession_unlisted_open::updateOrCreate(['id'=> $request->id],
        [
            'concession_name' => $concession_name,
            'company_id' => $request->company_id,
            'area' => $request->area,
            'terrain_id' => $request->terrain_id,
            'remark' => $request->remark,
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Unlisted Open Blocks ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Open Blocks', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Open Blocks', 'Add Record');
            }

            if ($request->ajax()) {
                $cont_details = ['concession'=>$add_concession->concession_name, 'company'=>$add_concession->company->company_name, 'area'=>$add_concession->area, 'terrain'=>$add_concession->terrain->terrain_name, 'remark'=>$add_concession->remark, 'id'=>$add_concession->id];

                return response()->json(['status'=>'ok', 'message'=>$cont_details, 'info'=>'New Open Block Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Unlisted / OpenConcession Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editUnlistedOpenBlock(Request $request)
    {
        $concession = \App\concession_unlisted_open::where('id', $request->id)->first();

        $one_ter = \App\up_concession_terrain::where('id', $concession->terrain_id)->first();
        $all_ter = \App\up_concession_terrain::orderBy('terrain_name', 'asc')->get();
        $one_comp = \App\company::where('id', $concession->company_id)->first();
        $comp_ddl = \App\company::orderBy('company_name', 'asc')->get();

        return view('admin.modals.editUnlistedOpenBlock', compact('concession', 'one_ter', 'all_ter', 'one_comp', 'comp_ddl'));
    }

    public function upload_unlisted_open_block(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\concession_unlisted_open::updateOrCreate(['id'=> $request->id],
                    [
                        'concession_name' => $row['A'],
                        // 'company_id' => $this->resolveModelId('\App\company', 'company_name', $row['B']),
                        'area' => $row['C'],
                        'terrain_id' => $this->resolveModelId(\App\up_concession_terrain::class, 'terrain_name', $row['D']),
                        'remark' => $row['E'],
                        'created_by' => \Auth::user()->name,
                    ]);
                }
            }
            //send mail
            self::send_all_mail('Master Data - Unlisted Open Blocks ');
            //Audit Logging
            self::log_audit_trail('Master Data Open Blocks', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Concessions Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_unlisted_open_block($type)
    {
        //Audit Logging
        self::log_audit_trail('Open Blocks', 'Downloaded Data');
        $data = \App\concession_unlisted_open::get();
        $view = 'admin.excel.unlisted_open_excel';

        return     \Excel::create('PRIS Unlisted Open Blocks', function ($excel) use ($view, $data) {
            $excel->sheet('Unlisted Open Blocks', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function approveConcessionUnlisted(Request $request)
    {
        $concession = \App\concession_unlisted_open::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('admin.view.approveConcessionUnlisted', compact('concession'));
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
            self::send_all_mail('Master Data - Marginal Fields ');
            //Audit Logging
            self::log_audit_trail('Marginal Fields', 'Added Data');

            if ($request->ajax()) {
                $field_details = ['year'=>$add_bala_mf->year, 'company'=>$add_bala_mf->company->company_name, 'field'=>$add_bala_mf->field->field_name, 'blocks'=>$add_bala_mf->blocks, 'id'=>$add_bala_mf->id];

                return response()->json(['status'=>'ok', 'message'=>$field_details, 'info'=>'New list Of Marginal Fields Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'list Of Marginal Fields Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editMarginalField(Request $request)
    {
        $M_FIELD_ = \App\Bala_marginal_field::where('id', $request->id)->first();

        return view('admin.modals.editMarginalField', compact('M_FIELD_'));
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
            self::send_all_mail('Master Data - Marginal Fields ');
            //Audit Logging
            self::log_audit_trail('Marginal Fields', 'Bulk Data Upload');

            return redirect()->route('admin.setup')->with('info', 'List Of Marginal Fields Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewBalaMarginalField(Request $request)
    {
        //Audit Logging
        self::log_audit_trail('Marginal Fields', 'Viewed Data');
        $M_FIELD = \App\Bala_marginal_field::where('id', $request->id)->first();

        return view('bala.view.viewBalaMarginalField', compact('M_FIELD'));
    }

    public function download_marginal_field($type)
    {
        //Audit Logging
        self::log_audit_trail('Marginal Fields', 'Downloaded Data');
        $data = \App\Bala_marginal_field::get();
        $view = 'admin.excel.marginal_field_excel';

        return     \Excel::create('Marginal Fields', function ($excel) use ($view, $data) {
            $excel->sheet('Marginal Fields', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function approveBalaMarginalField(Request $request)
    {
        $mfield = \App\Bala_marginal_field::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('admin.view.approveBalaMarginalField', compact('mfield'));
    }

    public function add_terrain(Request $request)
    {
        try {
            // return $request->all();
            //INSERTING NEW Terrain
            $add_terrain = \App\terrain::updateOrCreate(['id'=> $request->id],
        [
            'terrain_name' => $request->terrain_name,
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Terrains ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Terrain', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Terrain', 'Add Record');
            }

            if ($request->ajax()) {
                $terr_details = ['terrain'=>$add_terrain->terrain_name, 'id'=>$add_terrain->id];

                return response()->json(['status'=>'ok', 'message'=>$terr_details, 'info'=>'New Terrain Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Terrain Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editTerrain(Request $request)
    {
        $terrain = \App\terrain::where('id', $request->id)->first();

        return view('admin.modals.editTerrain', compact('terrain'));
    }

    public function upload_terrain(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\terrain::updateOrCreate(['id'=> $request->id], ['terrain_name' => $row['A'], 'created_by' => \Auth::user()->name]);
                }
            }

            //send mail
            self::send_all_mail('Master Data - Terrains ');
            //Audit Logging
            self::log_audit_trail('Master Data Terrains', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Terrains Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_terrain($type)
    {
        //Audit Logging
        self::log_audit_trail('Terrains', 'Downloaded Data');
        $data = \App\terrain::get()->toArray();

        return Excel::create('PRIS Terrains', function ($excel) use ($data) {
            $excel->sheet('Terrains', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_streams(Request $request)
    {
        try {
            $id = $request->id;
            if ($id == '') {
                $stream = $request->stream_name;
                $str = substr($stream, 0, 3);
                $tot = \App\Stream::count();
                if ($tot) {
                    $tot = $tot + 1;
                    $stream_code = 'STR-'.$str.'-'.$tot;
                } else {
                    $tot = 1;
                    $stream_code = 'STR-'.$str.'-'.$tot;
                }
            } else {
                $stream_code = $request->stream_code;
            }

            //INSERTING NEW Stream
            $add_stream = \App\Stream::updateOrCreate(['id'=> $request->id],
        [
            'stream_code' => $stream_code,
            'stream_name' => $request->stream_name,
            'company_id' => $request->company_id,
            'production_type' => $request->production_type,
            'batch_number' => date('d-M'),
            'stage_id' => '0',
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Streams/Terminals ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Streams', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Streams', 'Add Record');
            }

            if ($request->ajax()) {
                $stre_details = ['stream_code'=>$add_stream->stream_code, 'stream'=>$add_stream->stream_name, 'company'=>$add_stream->company->company_name, 'production_type'=>$add_stream->production_types->production_type_name, 'id'=>$add_stream->id];

                return response()->json(['status'=>'ok', 'message'=>$stre_details, 'info'=>'New Stream Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Stream Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editStream(Request $request)
    {
        $STR = \App\Stream::where('id', $request->id)->first();
        $one_com = \App\company::where('id', $STR->company_id)->first();
        $all_com = \App\company::orderBy('company_name', 'asc')->get();
        $one_typ = \App\down_production_type::where('id', $STR->production_type)->first();
        $all_typ = \App\down_production_type::orderBy('production_type_name', 'asc')->get();

        return view('admin.modals.editStream', compact('STR', 'one_com', 'all_com', 'one_typ', 'all_typ'));
    }

    public function upload_streams(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $stream = $row['A'];
                    $str = substr($stream, 0, 3);
                    $tot = \App\Stream::count();
                    if ($tot) {
                        $tot = $tot + 1;
                        $stream_code = 'STR-'.$str.'-'.$tot;
                    } else {
                        $tot = 1;
                        $stream_code = 'STR-'.$str.'-'.$tot;
                    }

                    $add_ = \App\Stream::updateOrCreate(['id'=> $request->id],
                    [
                        'stream_code' => $stream_code,
                        'stream_name' => $row['A'],
                        'company' => $this->resolveModelId(\App\company::class, 'company_name', $row['B']),
                        'production_type' => $this->resolveModelId(\App\down_production_type::class, 'production_type_name', $row['C']),
                        'stage_id' => '0',
                        'batch_number' => date('d-M'),
                        'created_by' => \Auth::user()->name,
                    ]);
                }
            }

            //send mail
            self::send_all_mail('Master Data - Streams/Terminals ');
            //Audit Logging
            self::log_audit_trail('Master Data Streams', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Streams Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_streams($type)
    {
        //Audit Logging
        self::log_audit_trail('Streams', 'Downloaded Data');
        $data = \App\Stream::get();
        $view = 'admin.excel.stream_excel';

        return     \Excel::create('PRIS Stream', function ($excel) use ($view, $data) {
            $excel->sheet('Stream', function ($sheet) use ($view, $data) {
                $sheet->loadView("$view", compact('data'))->setOrientation('landscape');
            });
        })->export('xlsx');
    }

    public function approveStream(Request $request)
    {
        $stream = \App\Stream::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('admin.view.approveStream', compact('stream'));
    }

    public function addfacility(Request $request)
    {
        try {
            $id = $request->id;
            if ($id == '') {
                $facility = $request->facility_name;
                $str = substr($facility, 0, 3);
                $tot = \App\facility::count();
                if ($tot) {
                    $tot = $tot + 1;
                    $facility_code = 'FAC-'.$str.'-'.$tot;
                } else {
                    $tot = 1;
                    $facility_code = 'FAC-'.$str.'-'.$tot;
                }
            } else {
                $facility_code = $request->facility_code;
            }

            //INSERTING facility
            $add_fac = \App\facility::updateOrCreate(['id'=> $request->id],
        [
            'facility_code' => $facility_code,
            'facility_name' => $request->facility_name,
            'stage_id' => '0',
            'batch_number' => date('d-M'),
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Facilities ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Facilities', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Facilities', 'Add Record');
            }

            if ($request->ajax()) {
                $fac_details = ['facility_code'=>$add_fac->facility_code, 'facility'=>$add_fac->facility_name, 'id'=>$add_fac->id];

                return response()->json(['status'=>'ok', 'message'=>$fac_details, 'info'=>'New Gas Facility Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Gas Facility Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editFacilities(Request $request)
    {
        $FAC = \App\facility::where('id', $request->id)->first();

        return view('admin.modals.editFacilities', compact('FAC'));
    }

    public function upload_facility(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $facility = $row['A'];
                    $str = substr($facility, 0, 3);
                    $tot = \App\facility::count();
                    if ($tot) {
                        $tot = $tot + 1;
                        $facility_code = 'FAC-'.$str.'-'.$tot;
                    } else {
                        $tot = 1;
                        $facility_code = 'FAC-'.$str.'-'.$tot;
                    }

                    $add_ = \App\facility::updateOrCreate(['id'=> $request->id], ['facility_code' => $facility_code, 'facility_name' => $row['A'], 'batch_number' => date('d-M'), 'created_by' => \Auth::user()->name]);
                }
            }

            //send mail
            self::send_all_mail('Master Data - Facilities ');
            //Audit Logging
            self::log_audit_trail('Master Data Facilities', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Facilities Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_facility($type)
    {
        //Audit Logging
        self::log_audit_trail('Facilities', 'Downloaded Data');

        $data = \App\facility::get()->toArray();

        return Excel::create('PRIS Facilities', function ($excel) use ($data) {
            $excel->sheet('Facilities', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function approveFacility(Request $request)
    {
        $facility = \App\facility::where('stage_id', '0')->orderByDesc('id')->limit(50)->get();

        return view('admin.view.approveFacility', compact('facility'));
    }

    public function addfacilitytype(Request $request)
    {
        try {
            //return $request->all();
            //DETERMINING THE LOGIN TYPE FOR TYPE FACILITY
            if (\Auth::user()->role_obj->role_name != 'Admin') {
                if (\Auth::user()->role_obj->permission->contains('constant', 'manage_concession') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_seismic_data') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_well_activities') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_prov_crude_prod') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_oil_facilities')) {
                    $type_id = 1;
                } elseif (\Auth::user()->role_obj->permission->contains('constant', 'manage_recon_crude_production') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_crude_export') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_pet_product_reporting') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_product_retail') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_product_listing')) {
                    $type_id = 2;
                } elseif (\Auth::user()->role_obj->permission->contains('constant', 'manage_dom_gas_obligation') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_supply') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_balance_prod') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_balance_Util') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_facilities') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_product_reporting') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_lpg/cng') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_reserve')) {
                    $type_id = 3;
                } elseif (\Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_incidence') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_downstream_incidence') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_spill_incidence') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_produced_water') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_drilled_waste') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_waste_mgt_facilities') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_accredited_waste_mgr') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_safety_permit')) {
                    $type_id = 4;
                }
            } elseif (\Auth::user()->role_obj->role_name == 'Admin') {
                $type_id = 5;
            }

            // return $request->type_id;
            //INSERTING Facility Type
            $add_fac_type = \App\facility_type::updateOrCreate(['id'=> $request->id],
            [
                'type_id' => $type_id,
                'facility_type_name' => $request->facility_type_name,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            self::send_all_mail_fac_type('Master Data - Facility Types ', $type_id);
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Facility Types', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Facility Types', 'Add Record');
            }

            if ($request->ajax()) {
                $fac_type_details = ['type'=>$add_fac_type->type->type_name, 'facility_type'=>$add_fac_type->facility_type_name, 'id'=>$add_fac_type->id];

                return response()->json(['status'=>'ok', 'message'=>$fac_type_details, 'info'=>'New Gas Facility Type Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Gas Facility Type Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editFacilityTypes(Request $request)
    {
        $FAC_TYPE = \App\facility_type::where('id', $request->id)->first();

        return view('admin.modals.editFacilityTypes', compact('FAC_TYPE'));
    }

    public function upload_facilitytype(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        //DETERMINING THE LOGIN TYPE FOR TYPE FACILITY
        if (\Auth::user()->role_obj->role_name != 'Admin') {
            if (\Auth::user()->role_obj->permission->contains('constant', 'manage_concession') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_seismic_data') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_well_activities') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_prov_crude_prod') ||
                  \Auth::user()->role_obj->permission->contains('constant', 'manage_oil_facilities')) {
                $type_id = 1;
            } elseif (\Auth::user()->role_obj->permission->contains('constant', 'manage_recon_crude_production') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_crude_export') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_pet_product_reporting') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_product_retail') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_product_listing')) {
                $type_id = 2;
            } elseif (\Auth::user()->role_obj->permission->contains('constant', 'manage_dom_gas_obligation') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_supply') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_balance_prod') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_balance_Util') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_facilities') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_product_reporting') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_lpg/cng') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_gas_reserve')) {
                $type_id = 3;
            } elseif (\Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_incidence') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_downstream_incidence') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_spill_incidence') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_produced_water') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_drilled_waste') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_waste_mgt_facilities') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_accredited_waste_mgr') ||
                    \Auth::user()->role_obj->permission->contains('constant', 'manage_safety_permit')) {
                $type_id = 4;
            }
        } elseif (\Auth::user()->role_obj->role_name == 'Admin') {
            $type_id = 5;
        }

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\facility_type::updateOrCreate(['id'=> $request->id], ['type_id' => $type_id, 'facility_type_name' => $row['A'], 'created_by' => \Auth::user()->name]);
                }
            }

            //send mail
            self::send_all_mail_fac_type('Master Data - Facility Types ', $type_id);
            //Audit Logging
            self::log_audit_trail('Master Data Facility Types', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Facility Types Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_facilitytype($type)
    {
        //Audit Logging
        self::log_audit_trail('Facility Types', 'Downloaded Data');
        $data = \App\facility_type::get()->toArray();

        return Excel::create('PRIS Facility Type', function ($excel) use ($data) {
            $excel->sheet('Facility Type', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function addlocation(Request $request)
    {
        try {
            //INSERTING Location
            $add_loc = \App\location::updateOrCreate(['id'=> $request->id],
        [
            'location_name' => $request->location_name,
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Locations ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Locations', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Locations', 'Add Record');
            }

            if ($request->ajax()) {
                $loc_details = ['location'=>$add_loc->location_name, 'id'=>$add_loc->id];

                return response()->json(['status'=>'ok', 'message'=>$loc_details, 'info'=>'New Location Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Location Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editLocations(Request $request)
    {
        $LOC = \App\location::where('id', $request->id)->first();

        return view('admin.modals.editLocations', compact('LOC'));
    }

    public function upload_location(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\location::updateOrCreate(['id'=> $request->id], ['location_name' => $row['A'], 'created_by' => \Auth::user()->name]);
                }
            }

            //send mail
            self::send_all_mail('Master Data - Locations ');
            //Audit Logging
            self::log_audit_trail('Master Data Locations', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Locations Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_location($type)
    {
        //Audit Logging
        self::log_audit_trail('Locations', 'Downloaded Data');
        $data = \App\location::get()->toArray();

        return Excel::create('PRIS Locations', function ($excel) use ($data) {
            $excel->sheet('Locations', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_storage_location(Request $request)
    {
        try {
            //INSERTING Staorage Location
            $add_loc = \App\down_storage_location::updateOrCreate(['id'=> $request->id],
        [
            'location_name' => $request->location_name,
            'created_by' => \Auth::user()->name,
        ]);

            //send mail
            self::send_all_mail('Master Data - Storage Locations ');
            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data Storage Locations', 'Update Record');
            } else {
                self::log_audit_trail('Master Data Storage Locations', 'Add Record');
            }

            if ($request->ajax()) {
                $loc_details = ['location'=>$add_loc->location_name, 'id'=>$add_loc->id];

                return response()->json(['status'=>'ok', 'message'=>$loc_details, 'info'=>'New Storage Location Added Successfully.']);
            } else {
                return redirect()->route('admin.setup')->with('info', 'Storage Location Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editStorageLocations(Request $request)
    {
        $STO_LOC = \App\down_storage_location::where('id', $request->id)->first();

        return view('admin.modals.editStorageLocations', compact('STO_LOC'));
    }

    public function upload_storage_location(Request $request)
    {
        $this->validate($request, ['file' => 'required|mimes:csv,xlsx,txt']);

        try {
            $getFile = $request->file('file')->getRealPath();
            $ob = \PhpOffice\PhpSpreadsheet\IOFactory::load($getFile);
            $ob = $ob->getActiveSheet()->toArray(null, true, true, true);

            foreach ($ob as $key => $row) {
                if ($key >= 2) {
                    $add_ = \App\storage_location::updateOrCreate(['id'=> $request->id], ['storage_location_name' => $row['A'], 'created_by' => \Auth::user()->name]);
                }
            }

            //send mail
            self::send_all_mail('Master Data - Storage Locations ');
            //Audit Logging
            self::log_audit_trail('Master Data Storage Locations', 'Data Bulk Upload');

            return redirect()->route('admin.setup')->with('info', 'Storage Locations Uploaded Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('admin.setup')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function download_storage_location($type)
    {
        //Audit Logging
        self::log_audit_trail('Storage Locations', 'Downloaded Data');
        $data = \App\down_storage_location::get()->toArray();

        return Excel::create('PRIS Storage Location', function ($excel) use ($data) {
            $excel->sheet('Storage Location', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function add_notification(Request $request)
    {
        try {
            //INSERTING Notification
            $add_notify = \App\pris_notification::updateOrCreate(['id'=> $request->id],
        [
            'report_name' => $request->report_name,
            'uploaded_every' => $request->uploaded_every,
            'month' => $request->month,
            'date' => $request->date,
            'notification_reminder' => $request->notification_reminder,
            'report_custodian' => $request->report_custodian,
            'report_custodian_email' => $request->report_custodian_email,
            'report_manager' => $request->report_manager,
            'report_manager_email' => $request->report_manager_email,
            'message' => $request->message,
            'created_by' => \Auth::user()->name,
        ]);

            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Notifications', 'Update Record');
            } else {
                self::log_audit_trail('Notifications', 'Add Record');
            }

            if ($request->ajax()) {
                $notify_details = ['report_name'=>$add_notify->report_name, 'uploaded_every'=>$add_notify->uploaded_every, 'month'=>$add_notify->month, 'date'=>$add_notify->date, 'notification_reminder'=>$add_notify->notification_reminder, 'report_custodian'=>$add_notify->report_custodian, 'report_manager'=>$add_notify->report_manager, 'message'=>$add_notify->message, 'id'=>$add_notify->id];

                return response()->json(['status'=>'ok', 'message'=>$notify_details, 'info'=>'New Notification Added Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('info', 'Notification Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    //
    public function add_permission_category(Request $request)
    {
        try {
            //INSERTING Permission
            $add_perm = \App\PermissionCategory::updateOrCreate(['id'=> $request->id],
        [
            'category_name' => $request->category_name,
            'description' => $request->description,
            'created_by' => \Auth::user()->name,
        ]);

            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Permissions', 'Assigned Permissions');
            } else {
                self::log_audit_trail('Permissions', 'Assigned Permissions');
            }

            if ($request->ajax()) {
                $permission_details = ['category_name'=>$add_perm->category_name, 'description'=>$add_perm->description, 'id'=>$add_perm->id];

                return response()->json(['status'=>'ok', 'message'=>$permission_details, 'info'=>'New Permission Category Added Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('info', 'Permission Category Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editPermissionCategory(Request $request)
    {
        $PERM = \App\PermissionCategory::where('id', $request->id)->first();

        return view('admin.modals.editPermissionCategory', compact('PERM'));
    }

    //
    public function add_permission(Request $request)
    {
        try {
            //INSERTING Permission
            $add_perm = \App\Permission::updateOrCreate(['id'=> $request->id],
        [
            'permission_category_id' => $request->permission_category_id,
            'permission_name' => $request->permission_name,
            'constant' => $request->constant,
            'created_by' => \Auth::user()->name,
        ]);

            //Audit Logging
            $id = $request->id;
            if ($id) {
                self::log_audit_trail('Master Data', 'Update Permissions');
            } else {
                self::log_audit_trail('Master Data', 'Add Permissions');
            }

            if ($request->ajax()) {
                $permission_details = ['category'=>$add_perm->permission_category->category_name, 'permission_name'=>$add_perm->permission_name, 'constant'=>$add_perm->constant, 'id'=>$add_perm->id];

                return response()->json(['status'=>'ok', 'message'=>$permission_details, 'info'=>'New Permission Added Successfully.']);
            } else {
                return redirect()->route('admin.settings')->with('info', 'Permission Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editPermission(Request $request)
    {
        $PERM = \App\Permission::where('id', $request->id)->first();

        return view('admin.modals.editPermission', compact('PERM'));
    }

    //AUDITING
    public function view_audit()
    {
        $users = \App\User::orderBy('name', 'asc')->get();

        return view('admin.audit', compact('users'));
    }

    public function viewLoginLogs(Request $request)
    {
        $LOGIN = \App\user_login_history::where('user_id', $request->id)->orderByDesc('id')->paginate(30);

        return view('admin.modals.viewLoginLogs', compact('LOGIN'));
    }

    public function getAuditLoginByUser(Request $request)
    {
        $users_last_log = \App\user_login_history::where('user_id', $request->user_id)->orderBy('id', 'desc')->limit(50)->get();

        return view('admin.audit_login_log', compact('users_last_log'));
    }

    public function getActionPerformedByUser(Request $request)
    {
        $users_actions = \App\AuditLogs::where('user_id', $request->user_id)->orderBy('id', 'desc')->limit(50)->get();

        return view('admin.audit_action_performed', compact('users_actions'));
    }

    public function guestlogin(Request $request)
    {
        return view('auth.guest-login');
    }

    public function guest_login(Request $request)
    {
        try {
            $this->validate($request, ['email' => 'required|email', 'password' => 'required']);

            $guest = \App\ExternalUser::where('email', $request->email)->first();
            if ($guest) {
                return redirect('/publication/nogiar/library');
            }

            return redirect('/login-guest')->with('error', 'Invalid Email address or Password');
        } catch (\Exception $e) {
            return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function purge(Request $request)
    {
        try {
            $purge_count = \App\gas_summary_of_gas_utilization::where('year', '2020')->count();
            $purge = \App\gas_summary_of_gas_utilization::where('year', '2020')->delete();

            dd($purge_count.' Data was Purge Successfully');
        } catch (\Exception $e) {
            dd('error', 'Sorry,'.$e->getMessage());
        }
    }
}
