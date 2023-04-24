<?php

namespace App\Traits;

use App\Traits\Micellenous;
use Illuminate\Http\Request;

trait DWP
{
    use Micellenous;

    public function processGet($route, Request $request)
    {
        switch ($route) {
            case 'loadPub':
            return $this->loadPub($request);

            break;

            default:
                // code...
            break;
        }
    }

    public function processPost(Request $request)
    {
        try {
            switch ($request->type) {
                case 'addDwp':
                    // code...
                return $this->addDwp($request);
                break;
                case 'decideEdit':
                    // code...
                return $this->decideEdit($request);
                    break;
                case 'getAlignmentByDivision':
                    // code...
                        return $this->getAlignmentByDivision($request);
                    break;
                case 'addDWPProgress':
                    // code...
                        return $this->addDWPProgress($request);
                    break;
                case 'expenditure':
                    // code...
                        return $this->expenditure($request);
                    break;
                case 'uploadExpenditure':
                        return $this->uploadExpenditure($request);
                    // code...
                    break;
                default:
                    // code...
                break;
            }
        } catch (\Exception $ex) {
            if (in_array($request->type, ['expenditure', 'addDWPProgress', 'uploadExpenditure'])) {
                $message = 'info';
            } else {
                $message = 'message';
            }

            return response()->json(['status'=>'error', $message=>$ex->getMessage()]);
        }
    }

    private function getAlignmentByDivision(Request $request)
    {
        $alignment = \App\dwp::where('division_id', $request->divisionid);
        if ($request->has('year')) {
            $alignment = $alignment->whereYear('year');
        }
        if ($request->has('year')) {
            $alignment = $alignment->whereYear('year');
        }
        $alignment = $alignment->with('alignment')->get();

        return $alignment;
    }

    private function addDWPProgress(Request $request)
    {
        $submitted_date = in_array($request->user()->role_obj->role_name, ['DWP Report Manager', 'Admin']) ? date('Y-m-d', strtotime($request->progress_month.'-01')) : date('Y-m-d', strtotime(date('Y').'-'.$request->progress_month.'-01'));

        $updateDWP = \App\dwp::where('id', $request->alignment_id)->update(['achievement_status_id'=>$request->achievement_status_id]);
        if (date('Y-m') == date('Y-m', strtotime($submitted_date))) {
            $checkProgress = \App\dwpProgressReport::where(['dwp_id'=>$request->alignment_id, 'submitted_date'=>$submitted_date])->exists();

            if (in_array($request->user()->role_obj->role_name, ['DWP Report Manager'])) {
                if ($checkProgress) {
                    throw new \Exception("Report Has Already been submitted for $submitted_date");
                }
            }
        }

        $addProgress = \App\dwpProgressReport::updateOrCreate(['dwp_id'=>$request->alignment_id, 'submitted_date'=>$submitted_date], ['dwp_id'=>$request->alignment_id, 'achievement_status_id'=>$request->achievement_status_id, 'submitted_date'=>$submitted_date, 'added_by'=>$request->user()->name]);

        return response()->json(['status'=>'ok', 'info'=>'Progress Report addedd Successfully']);
    }

    private function addDwp(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = $request->user()->name;
        $getStatus = \App\dwp_publication_content::where('year', $request->year)->value('status');
        if ($getStatus == 1) {
            throw new \Exception('Dwp Report have been locked for editing , Please contact the administrator');
        }
        $this->saveAudit($request->user()->name.' Updated the Dwp Report for '.$request->year.'. URL: '.$request->url());
        $addDWPPub = \App\dwp_publication_content::updateOrCreate(['year'=>$request->year], $data);

        //send mail
        $message = 'DWP Publication has been created / modified for the year '.$request->year.' by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';
        $target_role = 7;

        $this->send_all_mail($message, $target_role);

        return response()->json(['status'=>'success', 'message'=>'Dwp Report Successfully Updated for '.$request->year]);
    }

    private function saveAudit($actionPerformed)
    {
        \App\Audit::create(['action_performed'=>$actionPerformed, 'user_id'=>\Auth::user()->id]);
    }

    public function loadPub(Request $request)
    {
        $dwp = \App\dwp_publication_content::where('year', $request->year)->first();
        if ($request->has('ajax')) {
            return isset($dwp->content) ? $dwp->content : '';
        } else {
            return view('publication.dwp.loadDWPPublication', compact('dwp'));
        }
    }

    //function to lock and unlock
    private function decideEdit(Request $request)
    {
        $status = $request->status == 1 ? 'Locked' : 'Un-Locked';

        $updateStatus = \App\dwp_publication_content::where('year', $request->year)->update(['status'=>$request->status]);

        $this->saveAudit($request->user()->name." $status DWP report for ".$request->year.' because '.$request->reason.' URL Accessed: '.$request->url());

        return response()->json(['status'=>'success', 'message'=>'Operation Successful']);
    }

    // MPM

    private function expenditure(Request $request)
    {
        $addExpenditure = \App\MpmExpenditure::updateOrCreate(['month'=>$request->month_exp, 'year'=>$request->year_exp], ['month'=>$request->month_exp, 'year'=>$request->year_exp, 'expenditure'=>$request->expenditureField, 'addedBy'=>$request->user()->name]);

        return response()->json(['status'=>'ok', 'info'=>'Operation Successful']);
    }

    private function uploadExpenditure(Request $request)
    {
        $fileuploadedpath = $request->file;
        if (! in_array($fileuploadedpath->getClientOriginalExtension(), ['csv', 'xlsx', 'txt'])) {
            throw new \Exception('Invalid File Type, Please upload an excel file');
        }
        $datas = \Excel::load($fileuploadedpath->getrealPath(), function ($reader) {
            $reader->noHeading()->skipRows(1);
        })->get();
        foreach ($datas as $data) {
            $addExpenditure = \App\MpmExpenditure::updateOrCreate(['month'=>$data[0], 'year'=>$data[1]], ['month'=>$data[0], 'year'=>$data[1], 'expenditure'=>$data[2], 'addedBy'=>$request->user()->name]);
        }

        return response()->json(['status'=>'ok', 'info'=>'Operation Successful']);
    }

    private function resolveDate($type, Request $request)
    {
        return date($type, strtotime($date));
    }
}
