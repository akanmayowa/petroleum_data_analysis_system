<?php

namespace App\Traits;

use App\Stage;
use App\Workflow;
use Illuminate\Http\Request;

trait WorkflowTrait
{
    public function processGet($route, Request $request)
    {
        switch ($route) {
            case 'editWorkflows':
                return $this->editWorkFlow($request);
            break;

            case 'editWfSettings':
                return $this->editWfSettings($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function processPost(Request $request)
    {
        switch ($request->type) {
            case 'workflow':
                return $this->saveWorkflow($request);
            break;

            case 'update_workflow':
                return $this->updateWorkflow($request);
            break;

            case 'update_workflow_setting':
                return $this->updateWorkflowSetting($request);
            break;

            default:
                // code...
            break;
        }
    }

    public function editWorkflow(Request $request)
    {
        $wfroles = \App\roles::orderBy('role_name', 'asc')->get();
        $users = \App\User::orderBy('name', 'asc')->get();
        $workflow = Workflow::find($request->id);

        return view('admin.modals.editWorkflows', compact('wfroles', 'users', 'workflow'));
    }

    public function editWfSettings(Request $request)
    {
        $wfsetting = \App\WorkflowSetting::find($request->id);
        $workflows = Workflow::all();

        return view('admin.modals.editWorkflowSetting', compact('wfsetting', 'workflows'));
    }

    public function saveWorkflow(Request $request)
    {
        try {
            $this->validate($request, ['wfname'=>'required']);
            $no_of_stages = count($request->input('stagename'));
            if ($request->filled('user_id')) {
                $no_of_roles = count($request->input('user_id'));
            } else {
                $no_of_users = 0;
            }
            if ($request->filled('role')) {
                $no_of_roles = count($request->input('role'));
            } else {
                $no_of_roles = 0;
            }

            $no_of_users_used = 0;
            $no_of_roles_used = 0;
            $wf = Workflow::create(['name'=>$request->wfname]);

            if ($no_of_stages > 0) {
                for ($i = 0; $i < $no_of_stages; $i++) {
                    if ($request->wftype[$i] == 1) {
                        $stage = $wf->stages()->create(['name'=>$request->stagename[$i], 'position'=>$i, 'user_id'=>$request->user_id[$no_of_users_used], 'type'=>$request->wftype[$i]]);
                        $no_of_users_used++;
                    } elseif ($request->wftype[$i] == 2) {
                        $stage = $wf->stages()->create(['name'=>$request->stagename[$i], 'position'=>$i, 'type'=>$request->wftype[$i], 'role_id'=>$request->role[$no_of_roles_used]]);
                        $no_of_roles_used++;
                    }
                }
            }

            if ($request->ajax()) {
                $wf_details = Workflow::where('id', $wf->id)->with('stages')->get();
                $wf_details = ['name'=>$wf->name, 'id'=>$wf->id, 'date'=>\Carbon\Carbon::parse($wf->created_at)->diffForHumans(), 'stages_count'=>$wf->stages->count()];

                return response()->json(['status'=>'ok', 'message'=>$wf_details, 'info'=>'New Workflow Added Successfully.']);
            } else {
                // return redirect()->route('admin.settings')->with('info', 'Workflow Added Successfully');
            }
        } catch (\Exception $e) {
            return $e;
            // return  redirect()->route('admin.settings')->with('error', 'Sorry, An Error Occurred Please Try Again. ' .$e->getMessage());
        }
    }

    public function updateWorkflow(Request $request)
    {
        $wf = Workflow::find($request->workflow_id);
        $no_of_stages = count($request->input('stagename'));
        $no_of_users = count($request->input('user_id'));
        $no_of_roles = count($request->input('role'));
        $no_of_users_used = 0;
        $no_of_roles_used = 0;
        $this->validate($request, ['wfname'=>'required']);

        $wf->name = $request->wfname;
        $wf->save();

        for ($i = 0; $i < $no_of_stages; $i++) {
            if ($request->wftype[$i] == 1) {
                $stg = Stage::find($request->stage_id[$i]);
                if ($stg) {
                    $stg->name = $request->stagename[$i];
                    $stg->position = $i;
                    $stg->type = $request->wftype[$i];
                    $stg->user_id = $request->user_id[$no_of_users_used];
                    $stg->role_id = 0;
                    $stg->save();
                } else {
                    $stg = new Stage();
                    $stg->name = $request->stagename[$i];
                    $stg->position = $i;
                    $stg->type = $request->wftype[$i];
                    $stg->user_id = $request->user_id[$no_of_users_used];
                    $stg->workflow_id = $wf->id;
                    $stg->save();
                }
                $no_of_users_used++;
            } elseif ($request->wftype[$i] == 2) {
                $stg = Stage::find($request->stage_id[$i]);
                if ($stg) {
                    $stg->name = $request->stagename[$i];
                    $stg->position = $i;
                    $stg->type = $request->wftype[$i];
                    $stg->role_id = $request->role[$no_of_roles_used];
                    $stg->user_id = 0;
                    $stg->save();
                } else {
                    $stg = new Stage();
                    $stg->name = $request->stagename[$i];
                    $stg->position = $i;
                    $stg->type = $request->wftype[$i];
                    $stg->role_id = $request->role[$no_of_roles_used];
                    $stg->workflow_id = $wf->id;
                    $stg->save();
                }
                $no_of_roles_used++;
            }
        }

        return redirect()->route('admin.settings')->with('info', 'Workflow Updated Successfully');
    }

    public function updateWorkflowSetting(Request $request)
    {
        $wf_setting = \App\WorkflowSetting::find($request->setting_id);
        $wf_setting->update(['workflow_id'=>$request->workflow_id]);

        return redirect()->route('admin.settings')->with('info', $wf_setting->module.' Workflow changed Successfully');
    }
}
