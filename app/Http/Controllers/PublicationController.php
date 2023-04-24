<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', '-1');
use App\Notifications\emailContributors;
use App\Notifications\emailNOGIARManager;
use App\Notifications\emailPublication;
use App\Traits\Micellenous;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as Input;
use PDF;

// use Gloudemans\Shoppingcart\Facades\Cart;

class PublicationController extends Controller
{
    //
    use Micellenous;

    public function __construct()
    {
        $this->middleware('microsoft');
        $this->middleware('auth')->except(['publicationLibrary', 'searchContent', 'addToCartView', 'addItemToCart', 'cart', 'removeItemFromCart', 'getPublicationContent', 'searchPublicationByYear', 'makePayment']);
        // $this->middleware('external')->except('publicationLibrary');
        // $this->middleware(['auth'],
        //                   ['except' => ['publicationLibrary', 'searchContent', 'addToCartView', 'addItemToCart', 'cart', 'removeItemFromCart', 'getPublicationContent', 'searchPublicationByYear']]);
    }

    //function for sending email
    public function send_remark_mail($year, $message, $section)
    {
        //getting the number of USERS
        $approvers = \App\publicationReviewApprove::where('year', $year)->where('workflow_id', 1)->where('division', $section)->get();
        //sending email to every MANAGE
        foreach ($approvers as $approver) {
            $user = \App\User::where('id', $approver->approver_id)->first();

            $sender = \Auth::user()->email;
            $name = $user->name;

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }

        //notify  initaitor
        $init_user = \App\Stage::where('workflow_id', 1)->where('position', 0)->first();
        //sending email to every MANAGE
        $inituser = \App\User::where('id', $init_user->user_id)->first();

        $initsender = \Auth::user()->email;
        $initname = $inituser->name;

        $inituser->notify(new emailNOGIARManager($message, $initsender, $initname));
    }

    //function for sending email
    public function send_mail($year, $division, $status, $comment)
    {
        //getting the number of USERS
        $contributors = \App\publicationReviewApprove::where('year', $year)->where('workflow_id', 1)->where('division', $division)->get();
        //sending email to every MANAGE
        foreach ($contributors as $contributor) {
            $user = \App\User::where('id', $contributor->user_id)->first();

            $sender = \Auth::user()->email;
            $name = $user->name;
            if ($status == 1) {
                $message = ', All '.$division.' Articles for '.$year.' NOGIAR Publication has been approved by '.\Auth::user()->name;
            } elseif ($status == 0) {
                $message = ', '.$division.' Articles for '.$year.' NOGIAR Publication was reviewed but rejected by '.\Auth::user()->name.'  reasons are : '.$comment;
            }

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }

        //notify  initaitor
        $init_user = \App\Stage::where('workflow_id', 1)->where('position', 0)->first();
        //sending email to every MANAGE
        $inituser = \App\User::where('id', $init_user->user_id)->first();

        $initsender = \Auth::user()->email;
        $initname = $inituser->name;
        if ($status == 1) {
            $message = ', All '.$division.' Articles for '.$year.' NOGIAR Publication has been approved by '.\Auth::user()->name;
        } elseif ($status == 0) {
            $message = ', '.$division.' Articles for '.$year.' NOGIAR Publication was reviewed but rejected by '.\Auth::user()->name.'  reasons are : '.$comment;
        }

        $inituser->notify(new emailNOGIARManager($message, $initsender, $initname));
    }

    //function for sending email
    public function send_publication_mail($year, $workflow_id, $section)
    {
        //Determine who to notifiy for next stage
        // $prev = \App\Stage::where('workflow_id', $workflow_id)->where('position', $stage_id)->first();
        // $stage_id = $stage_id + 1;
        // $next = \App\Stage::where('workflow_id', $workflow_id)->where('position', $stage_id)->first();

        // //getting the Next USERS Details
        // $user = \App\User::where('id', $next->user_id)->first();

        // //sending email to User
        // $sender = $user->email;  $name = $user->name;
        // $message = ", The Remark/Notes for ".$prev->name." Section of NOGIAR Publication has been added and reviewed by ". \Auth::user()->name.". You are to add the write-up for the next section which is ".$next->name.", Please treat as urgent.";
        $sender_name = \Auth::user()->name;

        $init_users = \App\Stage::where('workflow_id', $workflow_id)->where('position', 0)->orwhere('position', 2)->get();
        foreach ($init_users as $key => $init_user) {
            $user = \App\User::where('id', $init_user->user_id)->first();

            //sending email to User
            $name = $user->name;
            $sender = $user->email;
            $message = ', The article for '.$section.' for '.$year.' NOGIAR Publication was added by '.$sender_name.'. This Article will be reviewed and approved by the respective manager.';

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }

        //NOTIFY THE APPROVER
        $approver_users = \App\publicationReviewApprove::where('year', $year)->where('division', $section)->get();
        foreach ($approver_users as $key => $approver_user) {
            $appr_user = \App\User::where('id', $approver_user->approver_id)->first();

            //sending email to User
            $appr_name = $appr_user->name;
            $appr_sender = $appr_user->email;
            $appr_message = $section.' article for '.$year.' NOGIAR Publication was added by '.$appr_name.'. You are required to review this article and approved if ok by you. Please treat as urgent';  //$appr_sender_name

            $appr_user->notify(new emailNOGIARManager($appr_message, $sender_name, $appr_name));
        }
        //copy Admin
        $msg = ', The article for '.$section.' for '.$year.' NOGIAR Publication was added by '.$sender_name.'. This Article will be reviewed and approved by the respective manager.';
        $admin = \App\User::where('id', 9)->first();
        $admin->notify(new emailNOGIARManager($msg, $sender_name, 'Admin'));
    }

    public function send_publication_approval_mail($year, $wflow_id, $division, $type)
    {
        $sender_name = \Auth::user()->name;
        if ($type == 'Approve') {
            $message = ', The '.$division.' Article for '.$year.' NOGIAR Publication has been reviewed and approved by '.$sender_name;
        } elseif ($type == 'Decline') {
            $message = ', The '.$division.' Article for '.$year.' NOGIAR Publication was reviewed and declined by '.$sender_name.'. Please review the highlighted item, make the necessary changes and resend for approval.';
        }

        //FOR INITATOR
        $init_user = \App\Stage::where('workflow_id', $wflow_id)->where('position', 0)->first();
        $user = \App\User::where('id', $init_user->user_id)->first();
        $name = $user->name;
        $sender = $user->email;

        $user->notify(new emailNOGIARManager($message, $sender, $name));

        //FOR ARTICLE CONTRIBUTOR
        $contributor_users = \App\publicationReviewApprove::where('year', $year)
                            ->where('workflow_id', $wflow_id)->where('division', $division)->get();
        foreach ($contributor_users as $key => $contributor_user) {
            $contri_user = \App\User::where('id', $contributor_user->user_id)->first();

            $name = $contri_user->name;
            $sender = $contri_user->email;

            $contri_user->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function for sending email
    public function send_article_reenabled_mail($year, $workflow_id, $division)
    {
        //Determine who to notifiy for next stage
        $contributors = \App\publicationReviewApprove::where('year', $year)->where('workflow_id', $workflow_id)->where('division', $division)->get();

        foreach ($contributors as $contributor) {
            $user = \App\User::where('id', $contributor->user_id)->first();

            //sending email to User
            $sender = $user->email;
            $name = $user->name;
            $message = ', Your article for '.$division.' Section of NOGIAR Publication has been re-enabled by '.\Auth::user()->name.'. You can now make your changes. ';

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    public function send_init_mail($year, $workflow_id)
    {
        //getting the number of USERS
        $stage_users = \App\Stage::where('workflow_id', $workflow_id)->where('name', 'Director Remark')->get();
        //sending email to every MANAGE
        foreach ($stage_users as $stage_user) {
            $user = \App\User::where('id', $stage_user->user_id)->first();

            $sender = $user->email;
            $name = $user->name;
            $message = ', A request to create a new NOGIAR Publication for  '.$year.' was sent by '.\Auth::user()->name.', You are required to initiate the creation of this Publication by adding write-up notes for '.$stage_user->name.', Please treat as urgent. ';

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    public function email_contributors($year, $workflow_id)
    {
        //getting the number of USERS
        $contributors = \App\publicationReviewApprove::where('year', $year)->where('workflow_id', $workflow_id)->get();
        //sending email to every MANAGE
        foreach ($contributors as $contributor) {
            $user = \App\User::where('id', $contributor->user_id)->first();

            $sender = \Auth::user()->email;
            $name = $user->name;
            $message = ', The process to create a new NOGIAR Publication for  '.$year.' was initiated by '.\Auth::user()->name.', You are required to get your Publication Articles and write-up as soon as possible. ';

            $user->notify(new emailNOGIARManager($message, $sender, $name));
        }

        //getting the number of USERS
        $approvers = \App\publicationReviewApprove::where('year', $year)->where('workflow_id', $workflow_id)->get();
        //sending email to every MANAGE
        foreach ($approvers as $approver) {
            $appr_user = \App\User::where('id', $approver->approver_id)->first();

            $appr_sender = \Auth::user()->email;
            $appr_name = $appr_user->name;
            $message = ', The process to create a new NOGIAR Publication for  '.$year.' was initiated by '.\Auth::user()->name.', You are required to approve any article written related to your division for this Publication. ';

            $appr_user->notify(new emailNOGIARManager($message, $appr_sender, $appr_name));
        }
    }

    public function email_remark_contributors($year, $workflow_id, $message)
    {
        //getting Remarks USERS
        $remark_user = \App\publicationReviewApprove::where('workflow_id', $workflow_id)->where('year', $year)->get();
        foreach ($remark_user as $remark_user) {
            $rem_user = \App\User::where('id', $remark_user->user_id)->first();
            $app_user = \App\User::where('id', $remark_user->approver_id)->first();
            $division = $remark_user->division;

            $sender = \Auth::user()->email;
            $name = $rem_user->name;
            $app_name = $app_user->name;
            $message = ', '.$message;
            $app_message = ', We request your approval for '.$year.' NOGIAR Publication submission by '.$division.'section. You will receive a mail notification when you are required for this approval.';

            $rem_user->notify(new emailContributors($message, $sender, $name, $year));
            $app_user->notify(new emailContributors($app_message, $sender, $app_name, $year));
        }

        //NOTIFY PUBLICATION MANAGER
        $pub_managers = \App\Stage::where('name', 'Publication Manager')->where('workflow_id', $workflow_id)->where('position', 2)->get();
        foreach ($pub_managers as $pub_manager) {
            $pub_mgr = \App\User::where('id', $pub_manager->user_id)->first();
            $division = $pub_manager->division;

            $sender = \Auth::user()->email;
            $mgr_name = $pub_mgr->name;
            $pub_mgr_msg = ', NOGIAR publication for '.$year.' was initiated by '.\Auth::user()->name.'. A notification email has been sent to all article contrubutors and their managers who will be in charge to approve the articles.';

            $pub_mgr->notify(new emailContributors($pub_mgr_msg, $sender, $mgr_name, $year));
        }
        $sender = \Auth::user()->email;
        $admin = \App\User::where('id', 9)->first();
        $admin->notify(new emailContributors($message, $sender, 'Admin', $year));
    }

    public function email_by_role($year, $workflow_id)
    {
        //GETTING ALL USERS WITH THIS ROLE
        $role_contributors = \App\Stage::where('workflow_id', $workflow_id)->where('type', 2)->get();
        foreach ($role_contributors as $role_contributor) {
            $user_roles = \App\User::where('role', $role_contributor->role_id)->get();
            foreach ($user_roles as $user_role) {
                $sender = \Auth::user()->email;
                $name = $user_role->name;
                $message = ', The process to create a new NOGIAR Publication for  '.$year.' was initiated by '.\Auth::user()->name.', You are required to get your Publication Articles and write-up for this Publication, Please treat as urgent. ';

                $user_role->notify(new emailNOGIARManager($message, $sender, $name));
            }
        }
    }

    //function for sending review email
    public function send_review_mail($year)
    {
        //getting the number of USERS
        $count = \App\Stage::where('workflow_id', '1')->get();
        //sending email to every MANAGER
        foreach ($count as $publication_user) {
            $sender = $publication_user->user->email;
            $name = $publication_user->user->name;
            $message = ', NOGIAR Publication for '.$year.' was reviewed by '.\Auth::user()->name.', This Publication is now in the Approval stage. Please take necessary actions. ';

            // \Auth::user()->notify(new emailNOGIARManager( $message, $sender, $name));
            $publication_user->user->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    //function for sending approved email
    public function send_approved_mail($year)
    {
        //getting the number of USERS
        $count = \App\Stage::where('workflow_id', '1')->get();
        //sending email to every MANAGER
        foreach ($count as $publication_user) {
            $sender = $publication_user->user->email;
            $name = $publication_user->user->name;
            $message = ', NOGIAR Publication for '.$year.' has been approved by '.\Auth::user()->name.', This Publication is now ready for public viewing and printing. ';

            // \Auth::user()->notify(new emailNOGIARManager( $message, $sender, $name));
            $publication_user->user->notify(new emailNOGIARManager($message, $sender, $name));
        }
    }

    public function notify_for_approval($year, $user_id, $message)
    {
        $user = \App\User::where('id', $user_id)->first();

        $sender = \Auth::user()->email;
        $name = $user->name;
        $m = '<br />';
        $message = ', '.$message;

        $user->notify(new emailContributors($message, $sender, $name, $year));
    }

    public function notify_all_approval($year, $message)
    {
        //getting the number of USERS
        $contributors = \App\publicationReviewApprove::where('year', $year)->where('workflow_id', 1)->get();
        //sending email to every MANAGE
        foreach ($contributors as $contributor) {
            $user = \App\User::where('id', $contributor->user_id)->first();
            $sender = \Auth::user()->email;
            $name = $user->name;

            $user->notify(new emailContributors($message, $sender, $name, $year));
        }

        //get who to notify in email
        $init_user = \App\Stage::where('position', 0)->first();
        $i_user = \App\User::where('id', $init_user->user_id)->first();
        $sender = \Auth::user()->email;
        $name = $i_user->name;

        $i_user->notify(new emailContributors($message, $sender, $name, $year));

        $mgr_user = \App\Stage::where('name', 'Publication Manager')->first();
        $m_user = \App\User::where('id', $mgr_user->user_id)->first();
        $sender = \Auth::user()->email;
        $name = $m_user->name;

        $m_user->notify(new emailContributors($message, $sender, $name, $year));
    }

    public function notify_for_final_copy($year)
    {
        //individual users
        $user_contributors = \App\Stage::where('workflow_id', 1)->where('type', 1)->get();
        foreach ($user_contributors as $user_contributor) {
            $user_ = \App\User::where('id', $user_contributor->user_id)->first();
            $sender = \Auth::user()->email;
            $name = $user_->name;
            $message = ', The final copy of NOGIAR Publication for  '.$year.' has been published in PRIS by '.\Auth::user()->name.', This publication is now ready for viewing. ';

            $user_->notify(new emailNOGIARManager($message, $sender, $name));
        }

        //rolebased users.
        $role_contributors = \App\Stage::where('workflow_id', 1)->where('type', 2)->get();
        foreach ($role_contributors as $role_contributor) {
            $user_roles = \App\User::where('role', $role_contributor->role_id)->get();
            foreach ($user_roles as $user_role) {
                $sender = \Auth::user()->email;
                $name = $user_role->name;
                $message = ', The final copy of NOGIAR Publication for  '.$year.' has been published in PRIS by '.\Auth::user()->name.', This publication is now ready for viewing. ';

                $user_role->notify(new emailNOGIARManager($message, $sender, $name));
            }
        }
    }

    public function send_reminder_email($message, $type, $division, $user_id)
    {
        //getting the number of USERS
        if ($type == 'all') {
            $pub_year = \App\PublicationStage::orderBy('year', 'desc')->first();
            $year = $pub_year->year;
            $contributors = \App\publicationReviewApprove::where('year', $year)->where('division', $division)->get();
            //sending email to every MANAGE
            foreach ($contributors as $contributor) {
                $user = \App\User::where('id', $contributor->user_id)->first();
                $sender = \Auth::user()->email;
                $name = $user->name;

                $user->notify(new emailContributors($message, $sender, $name, $year));

                $appr = \App\User::where('id', $contributor->approver_id)->first();
                $sender = \Auth::user()->email;
                $name = $appr->name;

                $appr->notify(new emailContributors($message, $sender, $name, $year));
            }

            $managers = \App\Stage::all();
            //sending email to every MANAGE
            foreach ($managers as $manager) {
                $man = \App\User::where('id', $manager->user_id)->first();
                $sender = \Auth::user()->email;
                $name = $man->name;

                $man->notify(new emailContributors($message, $sender, $name, $year));
            }
        }
        if ($type == 'section') {
            $pub_year = \App\PublicationStage::orderBy('year', 'desc')->first();
            $year = $pub_year->year;
            $contributors = \App\publicationReviewApprove::where('year', $year)->where('division', $division)->get();
            //sending email to every MANAGE
            foreach ($contributors as $contributor) {
                $user = \App\User::where('id', $contributor->user_id)->first();
                $sender = \Auth::user()->email;
                $name = $user->name;

                $user->notify(new emailContributors($message, $sender, $name, $year));

                $appr = \App\User::where('id', $contributor->approver_id)->first();
                $sender = \Auth::user()->email;
                $name = $appr->name;

                $appr->notify(new emailContributors($message, $sender, $name, $year));
            }
        } else {
            $pub_year = \App\PublicationStage::orderBy('year', 'desc')->first();
            $year = $pub_year->year;
            //sending email to every MANAGE
            $one_user = \App\User::where('id', $user_id)->first();
            $sender = \Auth::user()->email;
            $name = $one_user->name;

            $one_user->notify(new emailContributors($message, $sender, $name, $year));
        }
    }

    //function to log action for audit trail
    public function log_audit_trail($record, $action)
    {
        $log = \App\AuditLogs::create([
            'user_id' => \Auth::user()->id,
            'section' => 'PUBLICATION',
            'record' => $record,
            'action' => $action,
        ]);
    }

    // public function addToCart(Request $request)
    // {
    //   $product=nogiar_publication_content::where('id', $request->id)->first();
    //   Cart::add($product->id, $product->nogiar_id, $request->quantity, 9.99);

    //   Cart::add('34', 'Product 1', 1, 9.99, ['size' => 'large','cover' => 'hard']);
    //   Cart::add('34', 'Product 1', 1, 9.99);
    // }

    // public function cartContent()
    // {
    //   return Cart::content();
    // }

    // public function saveCart()
    // {
    //   Cart::store('username');

    //   //Cart::instance('wishlist')->store('username');
    // }

    // public function restoreCart(){  //restore cart from database where
    //   Cart::restore('username');
    // }

    // public function destroyCart(){
    //   Cart::destroy();
    // }

    // public function index(Request $request)
    // {
//        if($request->name=='nogiar')
//        {
//            // $nogiar = \App\nogiar_publication::where('status', 1)->where('id','<>', 0);
//            // if($request->has('year')) {     $nogiar = $nogiar->where('year', $request->year);    $yrs = $request->year;    }

//            $nogiar = $nogiar->get();
//            $year = \App\nogiar_publication::where('status', 1)->orderBy('year', 'asc')->distinct()->get(['year']);
//            $yrs = '2016';

//            return view('publication.nogiar.index', compact('nogiar', 'year', 'yrs'));
//        }
//        //DWP
//        if($request->name=='dwp')
//        {
//            $dwp = \App\dwp_publication::where('status', 1)->where('id','<>', 0);
//            if($request->has('year')) {     $dwp = $dwp->where('year', $request->year);    }

//            $dwp = $dwp->get();
//            $year = \App\dwp_publication::where('status', 1)->orderBy('year', 'asc')->distinct()->get(['year']);

//            return view('publication.dwp.index', compact('dwp', 'year'));
//        }

    //}

    public function admin(Request $request)
    {
        $nogiar = \App\nogiar_publication::where('id', '<>', 0);
        if ($request->has('year')) {
            $nogiar = $nogiar->where('year', $request->year);
        }

        $nogiar = $nogiar->get();
        $year = \App\nogiar_publication_content::orderBy('year', 'asc')->distinct()->get(['year']);

        $yrs = $request->year;
        $pulication_stages = \App\PublicationStage::where('year', $request->year)->first();

        return view('publication.nogiar.admin', compact('nogiar', 'year', 'yrs', 'pulication_stages'));
    }

    public function review_approve(Request $request)
    {
        $nogiar = \App\nogiar_publication::where('id', '<>', 0);
        if ($request->has('year')) {
            $nogiar = $nogiar->where('year', $request->year);
        }

        $nogiar = $nogiar->get();
        $year = \App\nogiar_publication_content::orderBy('year', 'asc')->distinct()->get(['year']);

        $yrs = $request->year;
        $pulication_stages = \App\PublicationStage::where('year', $request->year)->first();

        return view('publication.nogiar.approve', compact('nogiar', 'year', 'yrs', 'pulication_stages'));
    }

    public function add(Request $request)
    {
        $workflows = \App\Workflow::orderBy('name', 'asc')->get();
        $users = \App\User::orderBy('name', 'asc')->get();
        $contributors = \App\publicationReviewApprove::get();

        $pub_year = \App\NOGIARPublicationRemark::orderBy('year', 'desc')->first();
        $tables = \App\NOGIARPublicationRemark::where('year', $pub_year->year)->orderBy('table_id', 'asc')->get();
        // //checking if Publication is currently locked
        // $check_in_out = \App\CheckInOut::where('id', 1)->first();
        // if($check_in_out->status == 0)
        // {
        //    $data = array
        //    (
        //        'status'=> '1',  'user_id'=> \Auth::user()->id
        //    );
        //    $updated = \App\CheckInOut::where('id', 1)->where('section', 'NOGIAR Publication')->update($data);

        //    return view('publication.nogiar.add', compact('workflow_id'));
        //  }
        //  elseif($check_in_out->status == 1)
        //  {
        //     //checking if its the current user
        //     $curr_user = \App\CheckInOut::where('user_id', \Auth::user()->id)->first();
        //     if($curr_user)
        //     {
        //        return view('publication.nogiar.add', compact('workflow_id'));
        //     }
        //     else
        //     {
        //        return redirect()->route('nogiar.publication-section')->with('error', 'Sorry, A user is currently working on this publication, please try later');
        //     }
        //  }

        return view('publication.nogiar.add', compact('workflows', 'users', 'contributors', 'tables'));
    }

    public function addInitUser(Request $request)
    {
        try { //return $request->all();
            $add = \App\publicationReviewApprove::updateOrCreate(['id'=> $request->edit_id],
        [
            'year' => $request->year,
            'workflow_id' => $request->workflow_id,
            'division' => $request->division,
            'user_id' => $request->user_id,
            'approver_id' => $request->approver_id,
        ]);

            //Audit Logging
            self::log_audit_trail('NOGIAR Users ', 'Add Record');
            if ($request->ajax()) {
                $add_details = ['year'=>$add->year, 'workflow_id'=>$add->workflow_id, 'division'=>$add->division, 'user'=>$add->user->name, 'approver'=>$add->approver->name, 'id'=>$add->id];

                return response()->json(['status'=>'success', 'info'=>$add_details, 'message'=>'New Article Contributor Added Successfully.']);
            } else {
                return view('publication.nogiar.add');
            }
        } catch (\Exception $e) {
            return redirect()->route('nogiar.add')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function removeContributor(Request $request)
    {
        try {
            // return $request->all();
            $delete_record = \App\publicationReviewApprove::where('id', $request->id)->delete();

            //Audit Logging
            self::log_audit_trail('NOGIAR Users ', 'delete Contributor');
            if ($request->ajax()) {
                // $contributors = \App\publicationReviewApprove::where('year', $delete_record->year)->orderBy('id', 'desc')->with(['user'])->get();
                // return response()->json($contributors);
                return response()->json(['status'=>'success', 'message'=>'Contributor Removed From NOGIAR List Successfully ']);
            } else {
                return view('publication.nogiar.add');
            }
        } catch (\Exception $e) {
            return redirect()->route('nogiar.add')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function check_init_status(Request $request)
    {
        $data = \App\PublicationStage::where('year', $request->year)->first();
        $status = 'success';
        if (! $data) {
            $data = 'empty';
            $status = 'fail';
        }

        $data = ['status'=>$status, 'details'=>$data];

        return response()->json($data);
    }

    public function view(Request $request)
    {
        $publications = \App\PublicationStage::where('year', $request->year)->where('stage_id', 8)->where('save_upload', 4)->get();

        return view('publication.nogiar.view', compact('publications'));
    }

    public function viewByYear(Request $request)
    {
        // $publications = \App\PublicationStage::where('year', $request->year)->get();
        $publications = \App\PublicationStage::where('year', $request->year)->where('stage_id', 8)->where('save_upload', 4)->get();

        return view('publication.nogiar.view', compact('publications'));
    }

    public function initPublication(Request $request)
    {
        try {
            // return $request->all();
            $pub_year = \App\PublicationStage::where('year', $request->year)->first();
            if ($pub_year) {
                return response()->json(['status'=>'error', 'message'=> 'Sorry, Publication for '.$request->year.' has already been initiated']);
            } else {
                $add = \App\PublicationStage::updateOrCreate(['id'=> $request->id],
              [
                  'year' => $request->year,
                  'workflow_id' => $request->workflow_id,
                  'stage_id' => 0,
                  'status_id' => 0,
                  'initiated_by' => \Auth::user()->id,
                  'initiated_at' => date('Y-m-d h:i:s'),
              ]);

                // self::email_by_role($request->year, $request->workflow_id);
                // self::email_contributors($request->year, $request->workflow_id);

                if ($request->ajax()) {
                    return response()->json(['status'=>'success', 'message'=>'New Publication Initiated Successfully for '.$request->year]);
                } else {
                    return redirect()->back()->with(['status'=>'success', 'info'=>'New Publication Initiated Successfully.']);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function addNOGIARSection(Request $request)
    {
        try {
            // return $request->all();
            //get publication workflow
            $wflow_id = \App\Workflow::where('name', 'NOGIAR Publication Workflow')->value('id');

            $add = \App\NOGIARPublicationSection::updateOrCreate(['id'=> $request->id],
            [
                'year' => $request->year,
                'section_type' => $request->section_type,
                'title' => $request->title,
                'content' => $request->content,
                'status' => 0,
                'copy' => $request->copy,
                'workflow_id' => $wflow_id,
                'created_by' => \Auth::user()->id,
            ]);

            //$wflow = \App\Stage::where('year', $request->year)->value('name');
            //Audit Logging
            $id = $request->id;
            $year = $request->year;
            $copy = $request->copy;
            if ($id) {
                self::log_audit_trail('NOGIAR - '.$copy, 'Updated Article ');
            } else {
                self::log_audit_trail('NOGIAR - '.$copy, 'Added Article ');
            }

            if ($copy == 'save_director_remark' || $copy == 'save_reg_sign' || $copy == 'save_mod_ref' || $copy == 'save_glossary') {
                // $wflow_stage = \App\PublicationStage::where('year', $year)->where('workflow_id', $wflow_id)->first();

                if ($copy == 'save_director_remark') {
                    $section = 'DIRECTOR REMARK';
                    $section_type = 1;
                } elseif ($copy == 'save_reg_sign') {
                    $section = 'DPR STRUCTURE';
                    $section_type = 2;
                } elseif ($copy == 'save_mod_ref') {
                    $section = 'MAIN ARTICLE';
                    $section_type = 3;
                } elseif ($copy == 'save_glossary') {
                    $section = 'GLOSSARY';
                    $section_type = 5;
                }

                self::send_publication_mail($year, $wflow_id, $section);
                // $next_stage = $wflow_stage->stage_id + 1;
                $data = [
                    'stage_id' => 0,    //'stage_id' => $next_stage,
                ];
                \App\PublicationStage::where('year', $year)->where('workflow_id', $wflow_id)->update($data);
            }

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'New Publication Section Added Successfully for '.$year]);
            } else {
                return redirect()->back()->with(['status'=>'success', 'info'=>'New Publication Section Added Successfully.'.$year]);
            }
        } catch (\Exception $e) {
            return response()->json(['error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function approveNOGIARSection(Request $request)
    {
        try {
            // return $request->all();
            //get publication workflow
            $wflow_id = \App\Workflow::where('name', 'NOGIAR Publication Workflow')->value('id');
            $year = $request->year;
            $copy = $request->copy;
            $status = $request->status;

            if ($copy == 'DIRECTOR REMARK') {
                $section_type = 1;
            } elseif ($copy == 'DPR STRUCTURE') {
                $section_type = 2;
            } elseif ($copy == 'MAIN ARTICLE') {
                $section_type = 3;
            } elseif ($copy == 'GLOSSARY') {
                $section_type = 5;
            }

            $data = [
                'status' => $status,
                'approved_by' => \Auth::user()->id,
                'approved_at' => date('Y-m-d h:i:s'),
            ];
            \App\NOGIARPublicationSection::where('year', $year)->where('workflow_id', $wflow_id)->where('section_type', $section_type)->update($data);

            //Audit Logging
            self::log_audit_trail('NOGIAR - '.$copy, 'Approve Article');

            $this->send_publication_approval_mail($year, $wflow_id, $copy, 'Approve');

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'Publication Section Reviewed and Approved Successfully for '.$year]);
            } else {
                return redirect()->back()->with(['status'=>'success', 'info'=>'Publication Section Reviewed and Approved Successfully.'.$year]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function declineNOGIARSection(Request $request)
    {
        try {
            // return $request->all();
            //get publication workflow
            $wflow_id = \App\Workflow::where('name', 'NOGIAR Publication Workflow')->value('id');
            $year = $request->year;
            $copy = $request->copy;
            $status = $request->status;

            if ($copy == 'DIRECTOR REMARK') {
                $section_type = 1;
            } elseif ($copy == 'DPR STRUCTURE') {
                $section_type = 2;
            } elseif ($copy == 'MAIN ARTICLE') {
                $section_type = 3;
            } elseif ($copy == 'GLOSSARY') {
                $section_type = 5;
            }

            $data = [
                'content' => $request->content,
                'status' => $status,
                'reviewed_by' => \Auth::user()->id,
                'reviewed_at' => date('Y-m-d h:i:s'),
            ];
            \App\NOGIARPublicationSection::where('year', $year)->where('workflow_id', $wflow_id)->where('section_type', $section_type)->update($data);

            //Audit Logging
            self::log_audit_trail('NOGIAR - '.$copy, 'Decline Article');

            $this->send_publication_approval_mail($year, $wflow_id, $copy, 'Decline');

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'Publication Section Declined for '.$year]);
            } else {
                return redirect()->back()->with(['status'=>'success', 'info'=>'Publication Section Declined for.'.$year]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function enableNOGIARSection(Request $request)
    {
        try {
            // return $request->all();
            //get publication workflow
            $wflow_id = \App\Workflow::where('name', 'NOGIAR Publication Workflow')->value('id');
            $year = $request->year;
            $copy = $request->copy;

            if ($copy == 'draft_director_remark') {
                $division = 'DIRECTOR REMARK';
                $section_type = 1;
            } elseif ($copy == 'draft_reg_sign') {
                $division = 'DPR STRUCTURE';
                $section_type = 2;
            } elseif ($copy == 'draft_mod_ref') {
                $division = 'MAIN ARTICLE';
                $section_type = 3;
            } elseif ($copy == 'draft_glossary') {
                $division = 'GLOSSARY';
                $section_type = 5;
            }

            $data = [
                'copy' => $copy,    //'stage_id' => $next_stage,
            ];
            \App\NOGIARPublicationSection::where('year', $year)->where('workflow_id', $wflow_id)->where('section_type', $section_type)->update($data);

            //Audit Logging
            self::log_audit_trail('NOGIAR - '.$copy, 'Re-enabled Article');

            $this->send_article_reenabled_mail($year, $wflow_id, $division);

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'Publication Section Re-enabled Successfully for '.$year]);
            } else {
                return redirect()->back()->with(['status'=>'success', 'info'=>'Publication Section Re-enabled Successfully.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function getNotificationMessage(Request $request)
    {
        $messages = \App\PublicationMessage::where('year', $request->year)->where('section', $request->section)->first();

        return response()->json($messages);
    }

    public function notifyRemarkContributor(Request $request)
    {
        try {
            // return $request->all();
            $year = $request->year;
            $message = $request->message;
            $contributor_details = \App\PublicationStage::where('year', $year)->first();
            self::email_remark_contributors($year, 1, $message);

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'Notifications Sent To Contributors Successfully for ']);
            } else {
                return redirect()->back()->with(['status'=>'success', 'info'=>'Notifications Sent To Contributors Successfully.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status'=>'error', 'message'=> 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function updateSaveUpload(Request $request)
    {
        try {
            //return $request->all();
            //update Publication Stage Save Update Column to uploaded
            $data = [
                'save_upload' => 1, 'stage_id' => 1,
            ];
            \App\PublicationStage::where('year', $request->year)->update($data);

            return response()->json(['status'=>'success', 'message'=>'NOGIAR Page Converted to a Draft PDF Successfully']);
        } catch (\Exception $e) {
            return response()->json()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function uploadPublication(Request $request)
    {
        try {
            // return $request->all();
            $file = $request->pdf_file;
            // $file_name = substr($file, 12);
            $file_name = $request->pdf_file->getClientOriginalName();
            $destinationPath = 'assets/images/publications/'.Input::file('pdf_file')->getClientOriginalName();
            $file->move($destinationPath, Input::file('pdf_file')->getClientOriginalName());

            $nogiar = \App\nogiar_publication::where('id', '<>', 0);
            if ($request->has('year')) {
                $nogiar = $nogiar->where('year', $request->year);
            }

            $nogiar = $nogiar->get();
            $year = \App\nogiar_publication_content::orderBy('year', 'asc')->distinct()->get(['year']);

            $yrs = $request->year;

            //update Publication Stage Save Update Column to uploaded
            $data = [
                'save_upload' => 2, 'stage_id' => 2,
            ];
            \App\PublicationStage::where('year', $request->year)->update($data);
            self::log_audit_trail('NOGIAR - ', 'Draft Publication Uploaded');

            return response()->json(['status'=>'ok', 'message'=>'NOGIAR Page Was Converted to PDF Successfully']);

            // return view('publication.nogiar.admin', compact('nogiar', 'year', 'yrs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function uploadFinalPublication(Request $request)
    {
        try {
            // return $request->all();
            $file = $request->pdf_file_final;
            $file_name = $request->pdf_file_final->getClientOriginalName();
            $destinationPath = 'assets/images/publications/FINAL COPY/'.Input::file('pdf_file_final')->getClientOriginalName();
            $file->move($destinationPath, Input::file('pdf_file_final')->getClientOriginalName());

            $year = $request->year;
            //update Publication Stage Save Update Column to uploaded
            $data = [
                'stage_id' => 8,  'save_upload' => 4,
            ];
            \App\PublicationStage::where('year', $year)->update($data);

            self::log_audit_trail('NOGIAR - ', 'Final Copy Uploaded');
            self::notify_for_final_copy($year);

            return response()->json(['status'=>'ok', 'message'=>'Final Copy of NOGIAR Publication Was Converted to PDF Successfully']);

            // return view('publication.nogiar.admin', compact('nogiar', 'year', 'yrs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function add_page_number(Request $request)
    {
        try {
            // return $request->all();
            // return $request->page;
            $data = $request->data;
            //setting Section id based on Table Id
            $table_id = $data['table_id'];
            $year = $request->year;

            //RESOLVING PAGE NUMBERS
            $page_number = $request->page;
            if ($page_number == 0) {
                $page_no = $data['page_no'];
            } else {
                $page_no = $page_number;
            }

            //INSERTING NEW NOGIAR PUBLICATION
            $add_remark = \App\NOGIARPublicationRemark::updateOrCreate(['id'=> $data['id'], 'year'=> $request->year],
            [
                'table_no' => $data['table_no'],
                'table_id' => $data['table_id'],
                'section_id' => $data['section_id'],
                'numbering' => $data['numbering'],
                'page_no' => $page_no,  // $data['page_no']
                'year' => $year,
                'position' => $data['position'],
                'header' => $data['header'],
                'sub_head' => $data['sub_head'],
                'sub_sub_head' => $data['sub_sub_head'],
                'table_title' => $data['table_title'],
                'figure_no_1' => $data['figure_no_1'],
                'figure_no_2' => $data['figure_no_2'],
                'figure_title_1' => $data['figure_title_1'],
                'figure_title_2' => $data['figure_title_2'],
                'remark' => $request->remark,
                'created_by' => \Auth::user()->name,
            ]);

            //UPDATING SAVE UPLOAD STATUS
            $updateData = [
                'stage_id' => 3,
            ];
            \App\PublicationStage::where('year', $year)->update($updateData);

            //UPDATING REMARKS FROM TEMP TABLE
            $all_temps = \App\NOGIARPublicationRemarkTemp::where('year', $year)->get();
            foreach ($all_temps as $key => $all_temp) {
                $Data = [
                    'position' => $all_temp->position,   'remark' => $all_temp->remark,   'approved_by' => $all_temp->approved_by,
                ];
                \App\NOGIARPublicationRemark::where('year', $all_temp->year)->where('table_id', $all_temp->table_id)->update($Data);
            }

            //DELETE ALL TEMP REMARK FOR THAT YEAR
            // \App\NOGIARPublicationRemarkTemp::where('year', $year)->delete();

            //send mail
            $message = 'New remark for NOGIAR Publication was added for the year '.$data['year'].' by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';
            $target_role = 2;

            //$this->send_all_mail($message, $target_role);

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'New Publication Remark Added Successfully.']);
            } else {
                return redirect()->route('nogiar.admin')->with('info', 'Publication Remark Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('nogiar.admin')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function testPDF($file, $file_1)
    {
        $r = [];

        // Parse pdf file and build necessary objects.
        $parser = new \Smalot\PdfParser\Parser();

        // dd(($file_1));

        if (file_exists($file)) {
            $pdf = $parser->parseFile($file);
        } else {
            $pdf = $parser->parseFile($file_1);
        }

        // Retrieve all pages from the pdf file.
        $pages = $pdf->getPages();

        // Loop over each page to extract text.
        foreach ($pages as $k=>$page) {
            // echo $page->getText() . '<hr /><br />';
            $r[] = ['data'=>$page->getText(), 'page'=>($k + 1)];

            // echo '<br>';
            //dd($r);
            // echo '<hr>';
        }

        return $r;
    }

    public function enableSaveUpload(Request $request)
    {
        try {
            //SCRIPT TO DELETE FILE EXISTING YEAR FOLDER
            $year = $request->year;
            //get noagiar file path
            $pdf_folder = 'NOGIAR '.$year.'.pdf';
            $dir = scandir('assets/images/publications/');
            $dir = array_diff($dir, ['.', '..']);

            $file_dir = 'assets/images/publications/'.$pdf_folder;
            $folder_path = public_path($file_dir);

            // deleting pdf_folder
            array_map('unlink', glob("$folder_path/*.*"));
            rmdir($folder_path);

            //SCRIPT TO REMOVE PUBLICATION REMARKS AND TABLE HEADERS
            \App\NOGIARPublicationRemark::where('year', $year)->delete();

            //UPDATING SAVE UPLOAD STATUS
            $data = [
                'save_upload' => 0, 'stage_id' => 0,
            ];
            \App\PublicationStage::where('year', $year)->update($data);

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication ', 'Reset Save & Upload');

            return response()->json(['status'=>'success', 'message'=>'Publication Save and Upload Button Has Been Enabled Successfully']);
        } catch (\Exception $e) {
            return redirect()->route('nogiar.admin')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            // return response()->json()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function approveNogiarPublication(Request $request)
    {
        try {
            // return $request->all();
            $year = $request->year;
            $reason = $request->reason;
            $app_dec = $request->app_dec;
            $publication = \App\PublicationStage::where('year', $year)->first();
            //
            if ($publication->stage_id == 4) {
                if ($app_dec == 1) {
                    $message = 'NOGIAR Publication for '.$year.' has been Approved by '.\Auth::user()->name.', You Can Continue to the next stage.';
                    $stage_id = 5;
                    $status_id = 2;
                    $approved_by = \Auth::user()->id;
                    $approved_at = date('Y-m-d h:i:s');
                } else {
                    $message = $reason;
                    $stage_id = 4;
                    $status_id = 1;
                    $approved_by = null;
                    $approved_at = null;
                }

                $published_by = null;
                $published_at = null;
            } elseif ($publication->stage_id == 5) {
                if ($app_dec == 1) {
                    $message = 'NOGIAR Publication for '.$year.' has been Approved by '.\Auth::user()->name.', You Can Now Publish and send to Printer.';
                    $stage_id = 6;
                    $status_id = 4;
                    $published_by = \Auth::user()->id;
                    $published_at = date('Y-m-d h:i:s');
                } else {
                    $message = $reason;
                    $stage_id = 5;
                    $status_id = 3;
                    $published_by = null;
                    $published_at = null;
                }

                $approved_by = null;
                $approved_at = null;
            }

            //UPDATING SAVE UPLOAD STATUS
            $data = [
                'stage_id' => $stage_id,
                'status_id' => $status_id,
                'approved_by' => $approved_by,
                'approved_at' => $approved_at,
                'published_by' => $published_by,
                'published_at' => $published_at,
            ];
            \App\PublicationStage::where('year', $year)->update($data);

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication ', 'Approved Publication');
            $this->notify_for_approval($year, $publication->initiated_by, $message);

            if ($app_dec == 1) {
                return response()->json(['status'=>'success', 'message'=> $year.' Publication Was Approved, Notification Sent Successfully']);
            } elseif ($app_dec == 0) {
                return response()->json(['status'=>'success', 'message'=> $year.' Publication Was Declined, Notification Sent Successfully']);
            }
        } catch (\Exception $e) {
            return redirect()->route('nogiar.admin')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function updatePublicationStatus(Request $request)
    {
        // return $request->all();
        $data = [
            'status'=> '0',
        ];
        $updated = \App\CheckInOut::where('id', 1)->where('user_id', \Auth::user()->id)->update($data);

        return response()->json(['status'=>'success', 'message'=>' Success']);
    }

    public function enableArchivePublication(Request $request)
    {
        if ($request->copy == 'save_director_remark') {
            $copy = 'draft_director_remark';
        } elseif ($request->copy == 'draft_director_remark') {
            $copy = 'save_director_remark';
        } elseif ($request->copy == 'save_reg_sign') {
            $copy = 'draft_reg_sign';
        } elseif ($request->copy == 'save_reg_sign') {
            $copy = 'draft_reg_sign';
        } elseif ($request->copy == 'save_mod_ref') {
            $copy = 'draft_mod_ref';
        } elseif ($request->copy == 'save_mod_ref') {
            $copy = 'draft_mod_ref';
        } elseif ($request->copy == 'save_glossary') {
            $copy = 'draft_glossary';
        } elseif ($request->copy == 'save_glossary') {
            $copy = 'draft_glossary';
        }

        try {
            $data = [
                'copy' => $copy,
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            \App\NOGIARPublicationSection::where('id', $request->idd)->update($data);

            //send mail
            $this->send_review_mail($request->year);
            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$request->year, 'Archived / Enabled Record');

            return redirect()->route('nogiar.add')->with('info', 'NOGIAR Publication for '.$request->year.' Archived/Enabled Successfully');
        } catch (\Exception $e) {
            return  redirect()->route('nogiar.add')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    // PUBLICATION MESSAGES
    public function addPublicationMessages(Request $request)
    {
        try {
            $add = \App\PublicationMessage::updateOrCreate(['id'=> $request->id],
          [
              'year' => $request->year,
              'section' => $request->section,
              'message' => $request->message,
              'created_by' => \Auth::user()->id,
          ]);

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication ', 'Added Message');

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'info'=>'NOGIAR Publication Message Added Successfully']);
            } else {
                return redirect()->route('nogiar.add')->with('info', 'NOGIAR Publication Message Added Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'info' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    // PUBLICATION REMINDERS
    public function sendReminder(Request $request)
    {
        try {
            $user_id = $request->user_id;
            $division = $request->division;
            $message = $request->message;
            $all = $request->all;
            if ($division != '') {
                $type = 'section';
            } elseif ($all == 1) {
                $type = 'all';
            } else {
                $type = 'one';
            }
            //Audit Logging
            self::log_audit_trail('NOGIAR Publication ', 'Sent Reminder Email');

            //sending email
            $this->send_reminder_email($message, $type, $division, $user_id);

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'Publication Reminder email Sent Successfully']);
            } else {
                return redirect()->route('nogiar.add')->with('info', 'Publication Reminder email Sent Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    // SHOW AND HIDE PUBLICATION TABLES
    public function showHidePubTables(Request $request)
    {
        try {
            // return $request->all();
            $all_tables = \App\NOGIARPublicationRemark::where('year', $request->year)->orderBy('table_id', 'asc')->get();

            foreach ($all_tables as $k => $table) {
                $year = $request->year;
                $tab = $request->input('tab_'.number_format($table->table_id, 0).'');
                $upd_id = $request->input('sett_'.number_format($table->table_id, 0).'');
                if ($tab != 1) {
                    $tab = 0;
                }

                $data = [
                    'show_table' => $tab,
                ];
                \App\NOGIARPublicationRemark::where('year', $year)->where('id', $upd_id)->update($data);
            }

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication ', 'Table Settings');

            //sending email

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=>'Tables to be displayed for '.$year.' NOGIAR Publication was setup Successfully']);
            } else {
                return redirect()->route('nogiar.add')->with('info', 'Tables to be displayed for '.$year.' NOGIAR Publication was setup Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function publication_section(Request $request)
    {
        return view('publication.nogiar.publication-section');
    }

    public function addNogiar(Request $request)
    {
        // $data = $request->all();

        $data['created_by'] = $request->user()->name;
        $getStatus = \App\nogiar_publication_content::where('year', $request->year)->value('status');

        if ($getStatus == 1) {
            throw new \Exception('NOGIAR Publication have been locked for editing, Please contact the administrator');
        }

        $this->saveAudit($request->user()->name.' Updated the NOGIAR Publication for '.$request->year.'. URL: '.$request->url());

        // UPDATING NOGIAR_ID AND IS_FREE COLUMNS
        $addNogiarPub = \App\nogiar_publication_content::updateOrCreate(['year'=>$request->year], $data);
        if ($addNogiarPub->price > 0) {
            $is_free = 1;
        } else {
            $is_free = 0;
        }
        $data = [
            'nogiar_id'=> 'NOGIAR-'.$addNogiarPub->year.'-000'.$addNogiarPub->id, 'is_free' => $is_free,
        ];
        \App\nogiar_publication_content::where('id', $addNogiarPub->id)->update($data);

        //SETTING Publication Review
        $stage = \App\Stage::where('workflow_id', $addNogiarPub->workflow_id)->where('position', 1)->first();
        $stage_exist = \App\PublicationReview::where('stage_id', $stage->id)->first();
        if ($stage_exist) {
            $stage_id = $stage_exist->id;
        } else {
            $stage_id = '';
        }

        $rev = \App\PublicationReview::updateOrCreate(['id'=> $stage_id],
      [
          'stage_id' => $stage->id,
          'publication_id' => $addNogiarPub->id,
          'status' => 0,
          'approved_by' => 0,
      ]);

        //send mail
        if ($addNogiarPub) {
            $this->send_mail($request->year, 'DIVISION', 'STATUS', 'COMMENT');
            // Log::info('ERROR: '.$ver);
            //LOG PUBLICATION VERSION
            $this->updatePublicationVersion($addNogiarPub->year, $addNogiarPub->id, $addNogiarPub->content, $addNogiarPub->status, $addNogiarPub->created_by);

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$addNogiarPub->year, 'Updated Record');

            \App\CheckInOut::where('status', 1)->delete();
        }

        return response()->json(['status'=>'success', 'message'=>'NOGIAR Publication Successfully Updated for '.$request->year]);
    }

    public function saveAudit($actionPerformed)
    {
        \App\Audit::create(['action_performed'=>$actionPerformed, 'user_id'=>\Auth::user()->id]);
    }

    //LIST PUBLICATIONS FOR APPROVAL
    public function publicationList(Request $request)
    {
        try {
            //SETTING VERSION NUMBER OF Publication
            // $reviews = \App\PublicationReview::whereHas('stage', function($query)
            // {
            //     $query->where('stages.user_id', \Auth::user()->id);
            // })->where('status', 0)->orderBy('created_at', 'desc')->paginate(15);

            $pending_approvals = \App\PublicationStage::where('status_id', 1)->orwhere('status_id', 3)->orwhere('stage_id', 4)->paginate(15);

            return view('publication.nogiar.publication-list', compact('pending_approvals'));
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function nogiarApproval(Request $request)
    {
        $year = $request->year;
        $review = \App\PublicationReview::find($request->review);
        if ($review) {
            if ($review->stage->user_id == \Auth::user()->id) {
                return view('publication.nogiar.approval', compact('year', 'review'));
            } else {
                redirect()->back();
            }
        } else {
            redirect()->back();
        }
    }

    public function approveNogiar(Request $request)
    {
        $datas = $request->all();

        $data = [
            'status'=> '1', 'approved_by' => \Auth::user()->id,
        ];
        $approved = \App\PublicationReview::where('publication_id', $request->publication_id)->update($data);
        $year = \App\nogiar_publication_content::where('id', $request->publication_id)->first();

        //send mail
        if ($approved) {
            $this->send_mail($year->year, 'DIVISION', 'STATUS', 'COMMENT');
            // Log::info('ERROR: '.$ver);
            //LOG PUBLICATION VERSION
            // $this->updatePublicationVersion($approved->nogiar_year, $approved->id, $approved->content, $approved->status, $approved->created_by);

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$year->year, 'Approved Record');
        }

        return response()->json(['status'=>'success', 'message'=>'NOGIAR Publication Successfully Approved for '.$year->year]);
    }

    //COMMENT PUBLICATION
    public function addPublicationComment(Request $request)
    {
        try {
            $year = $request->year;
            $status_id = $request->status_id;
            $division = $request->division;
            $comment = $request->comment;
            if ($division = 'UPSTREAM') {
                $t_id_start = 1;
                $t_id_end = 42;
            } elseif ($division = 'MIDSTREAM') {
                $t_id_start = 43;
                $t_id_end = 62;
            } elseif ($division = 'DOWNSTREAM') {
                $t_id_start = 63;
                $t_id_end = 76;
            } elseif ($division = 'HSE') {
                $t_id_start = 77;
                $t_id_end = 98;
            } elseif ($division = 'REVENUE') {
                $t_id_start = 99;
                $t_id_end = 100;
            }

            $add = \App\PublicationComment::create([
                'year' => $year,
                'division' => $division,
                'comment' => $comment,
                'status_id' => $status_id,
                'created_by' => \Auth::user()->id,
            ]);

            if ($status_id == 1) {
                $data = [
                    'approved_by' => \Auth::user()->id,    'approved_at' => date('Y-m-d h:i:s'),
                ];
                \App\NOGIARPublicationRemark::where('year', $year)->where('table_id', '>=', $t_id_start)->where('table_id', '<=', $t_id_end)
                                        ->update($data);
                \App\NOGIARPublicationRemarkTemp::where('year', $year)->where('table_id', '>=', $t_id_start)->where('table_id', '<=', $t_id_end)
                                        ->update($data);

                $this->send_mail($year, $division, $status_id, $comment);
                //Audit Logging
                self::log_audit_trail('NOGIAR Publication '.$add->year, 'Article Remark Approved');
                $msg = 'All '.$division.' Articles for '.$year.' Publication Approved Successfully.';
            } else {
                $this->send_mail($year, $division, $status_id, $comment);
                //Audit Logging
                self::log_audit_trail('NOGIAR Publication '.$add->year, 'Article Remark Declined');
                $msg = $division.' Article for '.$year.' Publication Declined, Please Check Your email for Further Instructions.';
            }

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'message'=> $msg]);
            } else {
                return redirect()->route('nogiar.admin')->with('info', $msg);
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    //SEND PUBLICATION FOR APPROVAL
    public function notifyHeadForApproval(Request $request)
    {
        try {
            //return $request->all();
            $year = $request->year;
            $notify_type = $request->notify_type;
            //getting the publication stages
            if ($notify_type == 'Initiator') {
                $stage_id = 4;
                $init_next = 'Publication Manager';
                $next = 'B&SP - Budget & Strategic Planning';
            } elseif ($notify_type == 'Publication Manager') {
                $stage_id = 5;
                $init_next = 'B&SP - Budget & Strategic Planning';
                $next = 'HP - Head of Planning';
            } elseif ($notify_type == 'B&SP - Budget & Strategic Planning') {
                $stage_id = 6;
                $init_next = 'HP - Head of Planning';
                $next = "Directors' Office";
            } elseif ($notify_type == 'HP - Head of Planning') {
                $stage_id = 7;
                $init_next = 'Director';
                $next = 'Printer & Publisher';
            } elseif ($notify_type == 'Director') {
                $stage_id = 8;
                $init_next = '';
                $next = 'Publishing';
            } elseif ($notify_type == 'Publishing') {
                $stage_id = 9;
                $init_next = '';
                $next = 'Uploading Final Copy';
            }

            $message_init = 'All articles for '.$year.' NOGIAR Publication has been contributed and gone through the process of review and approval by '.$notify_type.'. A request email has now been sent to '.$init_next;

            $message = 'All articles for '.$year.' NOGIAR Publication has been contributed and gone through the process of review and approval by '.$notify_type.'. You are required to do a review, and if satisfied, approve and send to '.$next.', else decline approving the publication with a clearly stated reason(s). Please treat as urgent.';
            //UPDATING SAVE UPLOAD STATUS
            $data = [
                'stage_id' => $stage_id,
            ];
            \App\PublicationStage::where('year', $year)->update($data);

            //get who to notify in email
            $init_user = \App\Stage::where('position', 0)->first();
            $pub_mgr = \App\Stage::where('position', 2)->first();
            $this->notify_for_approval($year, $init_user->user_id, $message_init);
            $this->notify_for_approval($year, $pub_mgr->user_id, $message_init);

            if ($init_next != '') {
                $notif_user = \App\Stage::where('name', $init_next)->first();
                $this->notify_for_approval($year, $notif_user->user_id, $message);
            }

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$year, 'Approval Email Notifications');

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=> 'Notification Email For Approval Sent Successfully.']);
            } else {
                return redirect()->route('nogiar.admin')->with('info', 'Notification Email For Approval Sent Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    //SEND PUBLICATION FOR APPROVAL
    public function declineApprovalNotification(Request $request)
    {
        try {
            // return $request->all();
            $year = $request->year;
            $reason = $request->reason;
            $msg_decline = ', Article(s) for '.$year.' NOGIAR Publication has gone through the process of review but was rejected by '.\Auth::user()->name.'. Please see reason : '.$reason;

            // return $msg_decline;

            $this->notify_all_approval($year, $msg_decline);

            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$year, 'Declined Email Notifications');

            if ($request->ajax()) {
                return response()->json(['status'=>'success', 'message'=> 'Declined Notification Email Sent Successfully.']);
            } else {
                return redirect()->route('nogiar.admin')->with('info', 'Declined Notification Email Sent Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    //SEND PUBLICATION FOR APPROVAL
    public function sendForApproval(Request $request)
    {
        try {
            //UPDATING SAVE UPLOAD STATUS
            $data = [
                'stage_id' => 4,
            ];
            \App\PublicationStage::where('year', $request->year)->update($data);

            $this->notify_for_approval($request->year, $request->user_id, $request->message);
            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$request->year, 'Email Notifications Sent');

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'message'=> 'Email Sent Successfully.']);
            } else {
                return redirect()->route('nogiar.admin')->with('info', 'Email Sent Successfully');
            }
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    //COMMENT View
    public function viewPublicationComment(Request $request)
    {
        $comments = \App\PublicationComment::orderBy('created_at', 'asc')->get();

        return view('publication.nogiar.view-comment', compact('comments'));
    }

    //REVIEW PUBLICATION
    public function updatePublicationVersion($year, $id, $content, $stage_id, $added_by)
    {
        try {
            //SETTING VERSION NUMBER OF Publication
            $ver = \App\PublicationVersion::where('publication_id', $id)->count();
            if ($ver) {
                $version = 'Version '.$ver;
                $version++;
            } else {
                $version = 'Version '.$ver;
            }

            $add = \App\PublicationVersion::create([
                'year' => $year,
                'publication_id' => $id,
                'version' => $version,
                'content' => $content,
                'stage_id' => $stage_id,
                'added_by' => $added_by,
                'review_by' => 0,
                'approved_by' => 0,
                'modified_by' => \Auth::user()->id,
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function reviewPublication(Request $request)
    {
        try {
            $data = [
                'status' => '1',
                'reviewed_by' => \Auth::user()->id,
                'reviewed_at' => date('Y-m-d h:i:s'),
            ];
            \App\NOGIARPublicationSection::where('year', $request->year)->update($data);

            // $data_note = array
            // (
            //     'publication_id' => $request->publication_id,
            //     'type_id' => 1,
            //     'note' => $request->note
            // );
            // \App\PublicationNote::create($data_note);

            //send mail
            $this->send_review_mail($request->year);
            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$request->year, 'Reviewed Record');

            return response()->json(['status'=>'success', 'message'=>'NOGIAR Publication for '.$request->year.' Reviewed Successfully ']);
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function approvePublication(Request $request)
    {
        try {
            $data = [
                'status' => '2',
                'approved_by' => \Auth::user()->id,
                'approved_at' => date('Y-m-d h:i:s'),
            ];
            \App\NOGIARPublicationSection::where('year', $request->year)->update($data);

            // $data_note = array
            // (
            //     'publication_id' => $request->publication_id,
            //     'type_id' => 2,
            //     'note' => $request->note
            // );
            // \App\PublicationNote::create($data_note);

            //send mail
            $this->send_approved_mail($request->year);
            //Audit Logging
            self::log_audit_trail('NOGIAR Publication '.$request->year, 'Approved Record');

            return response()->json(['status'=>'success', 'message'=>'NOGIAR Publication for '.$request->year.' Reviewed Successfully ']);
        } catch (\Exception $e) {
            return response()->json(['status' =>'error', 'message' => 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage()]);
        }
    }

    public function loadPub(Request $request)
    {
        $nogiar = \App\nogiar_publication_content::where('year', $request->year)->first();
        if ($request->has('ajax')) {
            return isset($nogiar->content) ? $nogiar->content : '';
        } else {
            return view('publication.nogiar.loadNOGIARAdminPublication', compact('nogiar'));
        }
    }

    public function insert(Request $request)
    {
        try {
            $year = $request->year;
            $header = $request->header;
            $title = $request->title;
            $picture_1 = $request->file('picture_1');
            $picture_2 = $request->file('picture_2');
            $footer = $request->footer;
            $sub_footer = $request->sub_footer;
            $created_by = \Auth::user()->name;

            if ($picture_1 != null) {
                $file_name_1 = $picture_1->getClientOriginalName();
                $destinationPath = 'assets/images/publications/'.Input::file('picture_1')->getClientOriginalName();
                $picture_1->move($destinationPath, Input::file('picture_1')->getClientOriginalName());
            } else {
                $file_name_1 = '';
            }

            if ($picture_2 != null) {
                $file_name_2 = $picture_1->getClientOriginalName();
                $destinationPath = 'assets/images/publications/'.Input::file('picture_2')->getClientOriginalName();
                $picture_2->move($destinationPath, Input::file('picture_2')->getClientOriginalName());
            } else {
                $file_name_2 = '';
            }

            //INSERTING NEW NOGIAR PUBLICATION
            $add_nogiar = \App\nogiar_publication::updateOrCreate(['id'=> $request->id],
            [
                'year' => $year,
                'header' => $header,
                'title' => $title,
                'picture_1' => $file_name_1,
                'picture_2' => $file_name_2,
                'footer' => $footer,
                'sub_footer' => $sub_footer,
                'created_by' => $created_by,
            ]);

            //for loop to insert nogiar publication content
            $count_content = $request->input('count_content');
            for ($i = 1; $i <= $count_content; $i++) {

                    //Inserting Content
                $add_nogiar_content = \App\nogiar_publication_content::updateOrCreate(['id'=> $request->id],
                    [
                        'nogiar_id' => $add_nogiar->id,
                        'year' => $year,
                        'content' => $request->input('content'.$i.''),
                        'created_by' => $created_by,
                    ]);
            }

            //for loop to insert nogiar publication list
            $count_list = $request->input('count_list');
            for ($j = 1; $j <= $count_list; $j++) {

                    //Inserting Content
                $add_nogiar_list = \App\nogiar_publication_list::updateOrCreate(['id'=> $request->id],
                    [
                        'nogiar_id' => $add_nogiar->id,
                        'year' => $year,
                        'list' => $request->input('list'.$j.''),
                        'created_by' => $created_by,
                    ]);
            }

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'message'=>$add_nogiar, 'info'=>'New NOGIAR Publication Content Uploaded Successfully.']);
            } else {
                return redirect()->route('index')->with('info', 'NOGIAR Publication Content Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function editSection(Request $request)
    {
        $SECTION = \App\nogiar_publication::where('id', $request->id)->first();

        return view('publication.nogiar.modals.editSection', compact('SECTION'));
    }

    public function update(Request $request)
    {
        try {
            $year = $request->year;
            $header = $request->header;
            $title = $request->title;
            $picture_1 = $request->file('picture_1');
            $picture_2 = $request->file('picture_2');
            $footer = $request->footer;
            $sub_footer = $request->sub_footer;
            $created_by = \Auth::user()->name;

            if ($picture_1 != null) {
                $file_name_1 = $picture_1->getClientOriginalName();
                $destinationPath = 'assets/images/publications/'.Input::file('picture_1')->getClientOriginalName();
                $picture_1->move($destinationPath, Input::file('picture_1')->getClientOriginalName());
            } else {
                $file_name_1 = '';
            }

            if ($picture_2 != null) {
                $file_name_2 = $picture_1->getClientOriginalName();
                $destinationPath = 'assets/images/publications/'.Input::file('picture_2')->getClientOriginalName();
                $picture_2->move($destinationPath, Input::file('picture_2')->getClientOriginalName());
            } else {
                $file_name_2 = '';
            }

            //Updating Publication
            $upd_nogiar = \App\nogiar_publication::updateOrCreate(['id'=> $request->id],
            [
                'header' => $request->input('header'),
                'title' => $request->input('title'),
                'footer' => $request->input('footer'),
                'sub_footer' => $request->input('sub_footer'),
            ]);

            //for loop to Updating nogiar publication content
            $count_content = $request->input('count_content');
            for ($i = 1; $i <= $count_content; $i++) {
                //Updating Content
                $data_content = ['content' => $request->input('content'.$i.'')];
                $id_content = $request->input('id_content'.$i.'');
                \App\nogiar_publication_content::where('id', $id_content)->update($data_content);
            }

            //for loop to Updating nogiar publication List
            $count_list = $request->input('count_list');
            for ($i = 1; $i <= $count_list; $i++) {
                //Updating List
                $data_list = ['list' => $request->input('list'.$i.'')];
                $id_list = $request->id_list.$i;
                \App\nogiar_publication_list::where('id', $id_list)->update($data_list);
            }

            //for loop to insert nogiar publication content
            $count_content = $request->input('count_content');
            $count_content++;
            $new_count_content = $request->input('new_count_content');
            for ($i = $count_content; $i <= $new_count_content; $i++) {
                //Inserting Content
                $add_nogiar_content = \App\nogiar_publication_content::insert([
                    'nogiar_id' => $request->id,
                    'year' => $year,
                    'content' => $request->input('content'.$i.''),
                    'created_by' => $created_by,
                ]);
            }

            //for loop to insert nogiar publication list
            $count_list = $request->input('count_list');
            $count_list++;
            $new_count_list = $request->input('new_count_list');
            for ($j = $count_list; $j <= $new_count_list; $j++) {
                //Inserting List
                $add_nogiar_list = \App\nogiar_publication_list::insert([
                    'nogiar_id' => $request->id,
                    'year' => $year,
                    'list' => $request->input('list'.$j.''),
                    'created_by' => $created_by,
                ]);
            }

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'NOGIAR Publication Content Updated Successfully.']);
            } else {
                return redirect()->route('index')->with('info', 'NOGIAR Publication Content Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('index')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function approve(Request $request)
    {
        try {
            //approving Publication
            $app_nogiar = \App\nogiar_publication::updateOrCreate(['id'=> $request->id],
            [
                'status' => '1',
                'approved_by' => \Auth::user()->name,
                'approved_at' => date('Y-m-d h:i:s'),
            ]);

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'NOGIAR Publication Content Approved Successfully.']);
            } else {
                return redirect()->route('nogiar.admin')->with('info', 'NOGIAR Publication Content Approved Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('nogiar.admin')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    //DWP
    public function add_dwp()
    {
        return view('publication.dwp.add');
    }

    public function insert_dwp(Request $request)
    {
    }

    public function editDWPSection(Request $request)
    {
        $SECTION = \App\dwp_publication::where('id', $request->id)->first();

        return view('publication.dwp.modals.editDWPSection', compact('SECTION'));
    }

    public function admin_dwp(Request $request)
    {
        $dwp = \App\dwp_publication::where('id', '<>', 0);
        if ($request->has('year')) {
            $dwp = $dwp->where('year', $request->year);
        }

        $dwp = $dwp->get();
        $year = \App\dwp_publication::orderBy('year', 'asc')->distinct()->get(['year']);

        return view('publication.dwp.admin', compact('dwp', 'year'));
    }

    public function update_dwp(Request $request)
    {
        try {
            $year = $request->year;
            $header = $request->header;
            $title = $request->title;
            $picture_1 = $request->file('picture_1');
            $picture_2 = $request->file('picture_2');
            $footer = $request->footer;
            $sub_footer = $request->sub_footer;
            $created_by = \Auth::user()->name;

            if ($picture_1 != null) {
                $file_name_1 = $picture_1->getClientOriginalName();
                $destinationPath = 'assets/images/publications/'.Input::file('picture_1')->getClientOriginalName();
                $picture_1->move($destinationPath, Input::file('picture_1')->getClientOriginalName());
            } else {
                $file_name_1 = '';
            }

            if ($picture_2 != null) {
                $file_name_2 = $picture_1->getClientOriginalName();
                $destinationPath = 'assets/images/publications/'.Input::file('picture_2')->getClientOriginalName();
                $picture_2->move($destinationPath, Input::file('picture_2')->getClientOriginalName());
            } else {
                $file_name_2 = '';
            }

            //Updating Publication
            $upd_dwp = \App\dwp_publication::updateOrCreate(['id'=> $request->id],
            [
                'header' => $request->input('header'),
                'title' => $request->input('title'),
                'footer' => $request->input('footer'),
                'sub_footer' => $request->input('sub_footer'),
            ]);

            //for loop to Updating dwp publication content
            $count_content = $request->input('count_content');
            for ($i = 1; $i <= $count_content; $i++) {
                //Updating Content
                $data_content = ['content' => $request->input('content'.$i.'')];
                $id_content = $request->input('id_content'.$i.'');
                \App\dwp_publication_content::where('id', $id_content)->update($data_content);
            }

            //for loop to Updating dwp publication List
            $count_list = $request->input('count_list');
            for ($i = 1; $i <= $count_list; $i++) {
                //Updating List
                $data_list = ['list' => $request->input('list'.$i.'')];
                $id_list = $request->id_list.$i;
                \App\dwp_publication_list::where('id', $id_list)->update($data_list);
            }

            //for loop to insert dwp publication content
            $count_content = $request->input('count_content');
            $count_content++;
            $new_count_content = $request->input('new_count_content');
            for ($i = $count_content; $i <= $new_count_content; $i++) {
                //Inserting Content
                $add_dwp_content = \App\dwp_publication_content::insert([
                    'dwp_id' => $request->id,
                    'year' => $year,
                    'content' => $request->input('content'.$i.''),
                    'created_by' => $created_by,
                ]);
            }

            //for loop to insert dwp publication list
            $count_list = $request->input('count_list');
            $count_list++;
            $new_count_list = $request->input('new_count_list');
            for ($j = $count_list; $j <= $new_count_list; $j++) {
                //Inserting List
                $add_dwp_list = \App\dwp_publication_list::insert([
                    'dwp_id' => $request->id,
                    'year' => $year,
                    'list' => $request->input('list'.$j.''),
                    'created_by' => $created_by,
                ]);
            }

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'DWP Publication Content Updated Successfully.']);
            } else {
                return redirect()->route('dwp')->with('info', 'DWP Publication Content Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('dwp')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function approve_dwp(Request $request)
    {
        try {
            //approving Publication
            $app_dwp = \App\dwp_publication::updateOrCreate(['id'=> $request->id],
            [
                'status' => '1',
                'approved_by' => \Auth::user()->name,
                'approved_at' => date('Y-m-d h:i:s'),
            ]);

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'DWP Publication Content Approved Successfully.']);
            } else {
                return redirect()->route('dwp')->with('info', 'DWP Publication Content Approved Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('dwp')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function index(Request $request)
    {
        $year = \App\nogiar_publication::where('status', 1)->orderBy('year', 'asc')->distinct()->get(['year']);

        return view('publication.nogiar.index', compact('year'));
    }

    public function loadNOGIARPublication(Request $request)
    {
        $nogiar = \App\nogiar_publication::where('status', 1)->where('id', '<>', 0)->where('year', $request->year)->get();

        $year = \App\nogiar_publication::where('status', 1)->orderBy('year', 'asc')->distinct()->get(['year']);
        $yrs = $request->year;

        return view('publication.nogiar.loadNOGIARPublication', compact('nogiar', 'year', 'yrs'));
    }

    //NOGIAR FUNCTION
    public function loadSectionOne(Request $request)
    {
        $yrs = $request->year;
        $headerToc = \App\NogiarPublicationTOC::where('year', $request->year)->get();
        $upstreams = \App\NogiarUpstreamToc::where('year', $request->year)->get();
        $midstreams = \App\NogiarMidstreamToc::where('year', $request->year)->get();
        $downstreams = \App\NogiarDownstreamToc::where('year', $request->year)->get();
        $hses = \App\NogiarHseToc::where('year', $request->year)->get();
        $toc_contents = \App\NOGIARpublicationRemark::where('year', $request->year)->orderBy('table_no', 'asc')->get();
        $figures = $toc_contents->where('figure_title_1', '<>', null);

        $multi_clients_year = \App\bala_multiclient_project_status::orderBy('year', 'desc')->first();
        $multi_clients = $bala_data_ps = \App\bala_multiclient_project_status::where('year', $multi_clients_year->year)->get();
        // return $nogiar = \App\NOGIARPublicationSection::where('year', $request->year)->first();
        // $review_approve = \App\NOGIARPublicationSection::where('year', $request->year)->first();

        $publication_section = \App\NOGIARPublicationSection::where('year', $request->year)->get();
        $nogiar = $review_approve = $publication_section->where('year', $request->year)->first();
        $director_remark = $publication_section->where('section_type', 1)->first();
        $regulatory_structure = $publication_section->where('section_type', 2)->first();
        $modular_refinery = $publication_section->where('section_type', 3)->first();

        $imp_products = \App\down_import_product::where('id', '1')->orwhere('id', '2')->orwhere('id', '3')->orwhere('id', '5')
                                                ->orwhere('id', '6')->orderBy('id', 'asc')->get();

        $total_terrains = $terrain = $rig_terrain = \App\terrain::with('Bala_oml')->get();

        $year = \App\NOGIARPublicationSection::orderBy('year', 'asc')->distinct()->get(['year']);

        $oml_opl_year = $request->year;
        $opl_year = \App\Bala_opl::orderBy('year', 'desc')->first();
        $opl = \App\Bala_opl::where('year', $opl_year->year)->orderBy('id', 'asc')->get();
        // if($oml_opl_year!= null){ $oml_opl_year = $oml_opl_year; }else{ $oml_opl_year = 2020; }

        $oplCount = count($opl);
        $oplContract = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($i != 3) {
                if ($i != 4) {
                    $oplValue = $opl->where('contract_type', $i)->count();
                    $oplContract[$i] = ceil((($oplValue * 100) / $oplCount));
                } else {
                    $oplValue = $opl->where('contract_type', $i)->count();
                    $oplContract[$i] = floor((($oplValue * 100) / $oplCount));
                }
            }
        }

        $oml_year = \App\Bala_oml::orderBy('year', 'desc')->first();
        $oml = \App\Bala_oml::where('year', $oml_year->year)->orderBy('id', 'asc')->get();
        $omlCount = count($oml);
        $omlContract = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($i != 3) {
                if ($i != 4) {
                    $omlValue = $oml->where('contract_type', $i)->count();
                    $omlContract[$i] = ceil((($omlValue * 100) / $omlCount));
                } else {
                    $omlValue = $oml->where('contract_type', $i)->count();
                    $omlContract[$i] = floor((($omlValue * 100) / $omlCount));
                }
            }
        }  //dd($omlContract);

        $b_year = \App\Bala_block::orderBy('year', 'desc')->first();
        $block = \App\Bala_block::where('year', $b_year->year)->orderBy('id', 'asc')->get();
        $mf_year = \App\Bala_marginal_field::orderBy('year', 'desc')->first();
        $m_field = \App\Bala_marginal_field::where('year', $oml_opl_year)->orderBy('id', 'asc')->get();

        $fdps = \App\up_field_development_plan::where('year', $yrs)->where('remark', 'Approved')->orderBy('id', 'asc')->get();
        $app_gas_fdps = \App\up_approved_gas_development_plan::where('year', $yrs)->orderBy('id', 'asc')->get();
        $drill_gas_wells = \App\up_drilling_gas::where('year', $yrs)->orderBy('id', 'asc')->get();
        $gas_well_workovers = \App\up_well_workover::where('year', $yrs)->orderBy('id', 'asc')->get();
        $field_summaries = \App\up_field_summary::where('year', $yrs)->orderBy('id', 'asc')->get();

        $production_deferments = \App\up_crude_production_deferment::where('year', $yrs)->orderBy('id', 'asc')->get();
        $crude_prods = \App\up_provisional_crude_production::where('year', $yrs)->orderBy('contract_id', 'asc')->get();

        $seismic_data = \App\up_seismic_data::orderBy('year', 'asc')->limit(10)->get();
        $rig_disposition_year = \App\up_rig_disposition::where('year', $yrs)->orderBy('terrain_id', 'asc')->get();

        $year_array = ['legends' => 'Total Wells in years'];
        $array_year = $this->getYearRange($yrs, 9);
        $array_year_20 = $this->getYearRange($yrs, 14);
        $array_year_10 = $price_legend = $this->getYearRange($yrs, 9);
        $array_year_9 = $this->getYearRange($yrs, 8);

        $array_year_5 = $this->getYearRange($yrs, 4);

        $month_arr = ['1' => 'January', '2' => 'Febuary', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];

        $contracts = $oml_contract = $test_contract = $contract_legend = \App\contract::all();
        $contract_2to5 = $contracts->where('id', '<>', 1);
        $rrr_contract_legend = $oml_contract->where('id', '<>', 1);
        $concession_contract_legend = $oml_contract->where('id', '<>', 3);
        $contractCount = count($contracts);
        $opl_terrains = $oml_terrains = $pro_crud_terrains = \App\up_concession_terrain::all();

        $opl_year = \App\Bala_opl::orderBy('year', 'desc')->first();
        $opl = \App\Bala_opl::where('year', $opl_year->year)->orderBy('id', 'asc')->get();

        //getting total concession
        $allConcession = (count($oml) + count($opl) + count($m_field));
        $count_m_field = $m_field->count();

        $omlCount = count($oml);
        $oml_opl = [];
        $oml_opl_concession = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($i != 3) {
                $omlValue = $oml->where('contract_type', $i)->count();
                $oplValue = $opl->where('contract_type', $i)->count();

                $oml_opl[$i] = ($omlValue + $oplValue);
                //substracting 1 from PSC
                if ($i == 5) {
                    $oml_opl[$i] = $oml_opl[$i] - 1;
                }
            }
        }
        array_splice($oml_opl, 2, 0, $count_m_field);      //\array_splice($oml_opl, 0, 1);
        //array_splice($oml_opl, 3, 0, 30);      \array_splice($oml_opl, 0, 1);
        //dd($oml_opl);

        // for ($i = 1; $i <= 5; $i++)
        // {
        //     if($i != 3)
        //     {
        //         $omlValue = $oml->where('contract_type', $i)->count();
        //         $oplValue = $opl->where('contract_type', $i)->count();

        //         $oml_opl[$i] = ($omlValue + $oplValue);
        //     }
        // }   array_splice($oml_opl, 3, 0, $count_m_field);      \array_splice($oml_opl, 0, 1);
        //array_splice($oml_opl, 3, 0, 30);      \array_splice($oml_opl, 0, 1);
        //dd($oml_opl);

        foreach ($oml_opl as $key => $value) {
            $oml_opl_concession[$key] = number_format((($value * 100) / $allConcession), 0);
        }  //dd($oml_opl_concession);

        $oplTerrContract[] = '';
        foreach ($opl_terrains as $k => $OPL) {
            $oplTerrValue = $opl->where('geological_terrain_id', $OPL->id)->count();
            $oplTerrContract[$k] = number_format($oplTerrValue, 0);
        }

        $omlTerrContract[] = '';
        foreach ($oml_terrains as $m => $OML) {
            $omlTerrValue = $oml->where('geological_terrain_id', $OML->id)->count();
            $omlTerrContract[$m] = number_format($omlTerrValue, 0);
        }

        // $terrain = $rig_terrain = \App\terrain::all()

        //FUNCTIONALITY TO GET THE TOTAL LAST 10 YEARS OF STREAM TOTAl PENDING

        $states = \App\down_outlet_states::orderBy('state_name', 'asc')->get();

        $state_array = [];
        $state_array = \App\down_outlet_states::all();

        $table_of_contents = \App\NOGIARPublicationRemark::where('year', $yrs)->where('show_table', 1)->orderBy('table_id', 'asc')->orderBy('table_id', 'asc')->get();
        $toc_year = \App\NOGIARPublicationRemark::orderBy('year', 'desc')->first();
        $t_of_contents = \App\NOGIARPublicationRemark::where('year', $toc_year->year)->where('show_table', 1)->orderBy('page_no', 'asc')->orderBy('table_id', 'asc')->get();

        if (count($table_of_contents) > 0) {
            $TOC = $table_of_contents;
            $temp = 1;
        } else {
            $TOC = $t_of_contents;
            $temp = 0;
        }
        // return $TOC;

        $depletion_rates = \App\up_reserve_addition_depletion_rate::where('year', $yrs)->orderBy('id', 'asc')->get();

        // $no_yr = $yrs - 2001;
        $no_yr = 20;
        $_yrs = $yrs - 20;

        for ($i = 0; $i <= $no_yr; $i++) {
            $ag_nag_legend_chart[$i] = $_yrs + $i;
        }

        $stage = \App\PublicationStage::where('year', $yrs)->first();
        $temp_stage = \App\Stage::all();
        $review_stage = $temp_stage->where('name', 'Review Publication')->first();
        $approve_stage = $temp_stage->where('name', 'Approve Publication')->first();
        $pub_stages = $temp_stage->where('workflow_id', 1);
        $contributors = \App\publicationReviewApprove::where('year', $yrs)->get();

        //script to determine if year is a leap year or not
        $yr = '0000';
        $ave_prod = 0;
        $isLeap = DateTime::createFromFormat('Y', $yrs)->format('L') === '1';
        if ($isLeap == true) {
            $yr = 366;
        } else {
            $yr = 365;
        }

        $m_arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $users = \App\User::orderBy('name', 'asc')->get();

        $res_OIL = \App\up_reserves_oil::where('year', $yrs)->get();
        $res_COND = \App\up_reserves_report::where('year', $yrs)->get();
        $res_oil_count = $res_OIL->sum('oil_reserves');
        $res_cond_count = $res_COND->sum('condensate_reserves');
        $oil_cond_count = ($res_oil_count + $res_cond_count);

        // $res_oil_count = $res_OIL->sum('oil_reserves');
        // $res_cond_count = $res_COND->sum('condensate_reserves');
        // $oil_cond_count = ($res_oil_count + $res_cond_count);

        // $res_oil_count = \App\up_reserves_oil::where('year', $yrs)->sum('oil_reserves');
        // $res_cond_count = \App\up_reserves_report::where('year', $yrs)->sum('condensate_reserves');
        // $oil_cond_count = ($res_oil_count + $res_cond_count);

        return view('publication.nogiar.section-one', compact('headerToc', 'upstreams', 'midstreams', 'downstreams', 'hses', 'toc_contents', 'figures', 'nogiar', 'review_approve', 'year', 'yrs', 'array_year_9', 'TOC', 'temp', 'multi_clients', 'total_terrains', 'opl_terrains', 'oml_terrains', 'oml_contract', 'rrr_contract_legend', 'concession_contract_legend', 'test_contract', 'pro_crud_terrains', 'terrain', 'opl', 'omlCount', 'oplContract', 'oplTerrContract', 'oml_opl_concession', 'omlContract', 'omlTerrContract', 'oml', 'block', 'm_field', 'crude_prods', 'seismic_data', 'rig_disposition_year', 'year_array', 'array_year', 'array_year_20', 'array_year_10', 'array_year_5', 'month_arr', 'contractCount', 'contracts', 'contract_2to5', 'imp_products', 'state_array', 'contract_legend', 'table_of_contents', 't_of_contents', 'director_remark', 'regulatory_structure', 'modular_refinery', 'fdps', 'app_gas_fdps', 'drill_gas_wells', 'gas_well_workovers', 'field_summaries', 'production_deferments', 'ag_nag_legend_chart', 'depletion_rates', 'states', 'stage', 'review_stage', 'approve_stage', 'pub_stages', 'contributors', 'price_legend', 'yr', 'm_arr', 'users', 'oil_cond_count'));
    }

    //section two
    public function loadSectionTwo(Request $request)
    {
        $yrs = $request->year;
        $year_array = ['legends' => 'Total Wells in years'];
        $array_year = $this->getYearRange($yrs, 9);

        $array_year_20 = $this->getYearRange($yrs, 14);

        $array_year_10 = $price_legend = $this->getYearRange($yrs, 9);

        $array_year_5 = $this->getYearRange($yrs, 4);

        $month_arr = ['1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];

        $m_arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


        $imp_prod_array = \App\down_import_product::where('id', '<>', 5)->where('id', '<>', 9)->where('id', '<>', 10)->get();

        // $no_yr = $yrs - 2001;
        $no_yr = 20;
        $_yrs = $yrs - 20;

        for ($i = 0; $i <= $no_yr; $i++) {
            $ag_nag_legend_chart[$i] = $_yrs + $i;
        }

        $contributors = \App\publicationReviewApprove::where('year', $yrs)->get();

        $fdps = \App\up_field_development_plan::where('year', $yrs)->where('remark', 'Approved')->orderBy('id', 'asc')->get();
        $app_gas_fdps = \App\up_approved_gas_development_plan::where('year', $yrs)->orderBy('id', 'asc')->get();
        $drill_gas_wells = \App\up_drilling_gas::where('year', $yrs)->orderBy('id', 'asc')->get();
        $gas_well_workovers = \App\up_well_workover::where('year', $yrs)->orderBy('id', 'asc')->get();
        $field_summaries = \App\up_field_summary::where('year', $yrs)->orderBy('id', 'asc')->get();

        $rig_disposition_year = \App\up_rig_disposition::where('year', $yrs)->orderBy('terrain_id', 'asc')->get();

        $crude_prods = \App\up_provisional_crude_production::where('year', $yrs)->orderBy('contract_id', 'asc')->get();

        $year = \App\NOGIARPublicationSection::orderBy('year', 'asc')->distinct()->get(['year']);
        $crude_EX_OIL = \App\down_terminal_stream_prod::where('year', $yrs)->where('production_type_id', 1)->distinct()->get(['stream_id']);
        $crude_EX_FCOND = \App\down_terminal_stream_prod::where('year', $yrs)->where('production_type_id', 2)->distinct()->get(['stream_id']);
        $crude_EX_PCOND = \App\down_terminal_stream_prod::where('year', $yrs)->where('production_type_id', 3)->distinct()->get(['stream_id']);
        $crude_EX_oil = $crude_EX_OIL->sortBy('stream_id');
        $crude_EX_fcond = $crude_EX_FCOND->sortBy('stream_id');
        $crude_EX_pcond = $crude_EX_PCOND->sortBy('stream_id');

        $down_terminal_stream_prod = \App\Stream::whereHas('down_terminal_stream_prod')->orderBy('stream_name', 'asc')->get();
        $down_monthly_summary_crude_export = \App\Stream::whereHas('down_monthly_summary_crude_export')->orderBy('stream_name', 'asc')->get();
        $down_crude_export_by_destination = \App\Stream::whereHas('down_crude_export_by_destination')->orderBy('stream_name', 'asc')->get();

        //script to determine if year is a leap year or not
        $yr = '0000';
        $ave_prod = 0;
        $isLeap = DateTime::createFromFormat('Y', $yrs)->format('L') === '1';
        if ($isLeap == true) {
            $yr = 366;
        } else {
            $yr = 365;
        }

        $es_yr = \App\up_processing_plant_project::orderBy('id', 'desc')->first();
        $oil_plants = \App\up_processing_plant_project::where('year', $es_yr->year)->orderBy('id', 'asc')->get();
        $es_yrs = \App\es_licensed_refinery_project::orderBy('id', 'desc')->first();

        $table_of_contents = \App\NOGIARPublicationRemark::where('year', $yrs)->where('show_table', 1)->orderBy('table_id', 'asc')->orderBy('table_id', 'asc')->get();

        return view('publication.nogiar.section-two', compact('yrs', 'app_gas_fdps', 'drill_gas_wells', 'gas_well_workovers', 'field_summaries', 'rig_disposition_year', 'year_array', 'array_year', 'array_year_20', 'array_year_10', 'price_legend', 'array_year_5', 'month_arr', 'm_arr', 'crude_prods', 'year', 'crude_EX_oil', 'crude_EX_fcond', 'crude_EX_pcond', 'down_terminal_stream_prod', 'down_monthly_summary_crude_export', 'down_crude_export_by_destination', 'yr', 'es_yr', 'oil_plants', 'es_yrs', 'ag_nag_legend_chart', 'table_of_contents', 'contributors'));
    }

    //section three
    public function loadSectionThree(Request $request)
    {
        $yrs = $request->year;
        $year_array = ['legends' => 'Total Wells in years'];
        $array_year = $this->getYearRange($yrs, 9);

        $array_year_20 = $this->getYearRange($yrs, 14);

        $array_year_10 = $price_legend = $this->getYearRange($yrs, 9);

        $array_year_5 = $this->getYearRange($yrs, 4);
        $array_year_4 = $this->getYearRange($yrs, 3);

        $month_arr = ['1' => 'January', '2' => 'Febuary', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];

        $m_arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // $no_yr = $yrs - 2001;
        $no_yr = 20;
        $_yrs = $yrs - 20;
        $year = \App\NOGIARPublicationSection::orderBy('year', 'asc')->distinct()->get(['year']);

        $contributors = \App\publicationReviewApprove::where('year', $yrs)->get();

        $refinery_products = \App\down_refinery_production_volumes::where('year', $yrs)->where('product_id', '<>', null)->orderBy('product_id', 'asc')->distinct()->get(['product_id']);
        $destinations = $dest_export_chart = \App\Region::orderBy('name', 'asc')->get();
        $total_dest = \App\down_crude_export_by_destination::sum('stream_total');

        $ave_price_stream = \App\up_ave_price_crude_stream::orderBy('stream_id', 'asc')->distinct()->get(['stream_id']);

        $ref_details = \App\down_refinery_performance::where('year', $request->year)->where('refinery_id', 1)->orderBy('id', 'asc')->get();

        $crude_export_collection = \App\down_monthly_summary_crude_export::orderBy('id', 'asc')->get();

        $crude_export_oil = $crude_export_collection->where('year', $request->year)->where('production_type_id', 1);
        $crude_export_fcond = $crude_export_collection->where('year', $request->year)->where('production_type_id', 2);
        $crude_export_pcond = $crude_export_collection->where('year', $request->year)->where('production_type_id', 3);

        $crude_export = $crude_export_collection->where('year', $request->year);
        $crude_prods = \App\up_provisional_crude_production::where('year', $yrs)->orderBy('contract_id', 'asc')->get();

        $down_y = \App\down_petrochemical_plant_project::orderBy('id', 'desc')->first();
        $down_pet_project = \App\down_petrochemical_plant_project::where('year', $down_y->year)->orderBy('id', 'asc')->get();
        $down_pet_plants = \App\down_petrochemical_plant::orderBy('id', 'asc')->get();

        $down_terminal_stream_prod = \App\Stream::whereHas('down_terminal_stream_prod')->orderBy('stream_name', 'asc')->get();
        $down_monthly_summary_crude_export = \App\Stream::whereHas('down_monthly_summary_crude_export')->orderBy('stream_name', 'asc')->get();
        $down_crude_export_by_destination = \App\Stream::whereHas('down_crude_export_by_destination')->orderBy('stream_name', 'asc')->get();

        $import_permit_tot = \App\down_product_vol_import_permit::where('year', $request->year)->orderBy('product_id', 'asc')->distinct()->get(['product_id']);
        $import_prod_seg = \App\down_import_product::where('id', '<=', '8')->get();
        $states = \App\down_outlet_states::orderBy('state_name', 'asc')->get();

        $es_yrs = \App\es_licensed_refinery_project::orderBy('id', 'desc')->first();
        $license_ref_projects = \App\es_licensed_refinery_project::where('year', $es_yrs->year)->orderBy('id', 'asc')->get();

//        $gas = \App\gas_actual_production::orderBy('id', 'asc')->get();
        $gas = \App\gas_domestic_gas_obligation::orderBy('id', 'asc')->get();
        $gas_obligations = $gas->where('year', $request->year + 1);
        $gas_obls = $gas->where('year', $request->year);

        $gas_facility = \App\gas_major_gas_facilities::where('year', $request->year)->orderBy('company_id', 'asc')->get();

        $gas_plant = \App\gas_processing_plant_project::orderBy('id', 'asc')->get();
        $gas_supply_company = \App\gas_domestic_gas_supply::where('year', $yrs)->get();

        $text_year = \App\gas_supply_textile_industry::orderBy('year', 'desc')->first();
        $textile_ind = \App\gas_supply_textile_industry::where('year', $text_year->year)->orderBy('id', 'asc')->get();

        $table_of_contents = \App\NOGIARPublicationRemark::where('year', $yrs)->where('show_table', 1)->orderBy('table_id', 'asc')->orderBy('table_id', 'asc')->get();

        //script to determine if year is a leap year or not
        $yr = '0000';
        $ave_prod = 0;
        $isLeap = DateTime::createFromFormat('Y', $yrs)->format('L') === '1';
        if ($isLeap == true) {
            $yr = 366;
        } else {
            $yr = 365;
        }

        return view('publication.nogiar.section-three', compact('yrs', 'yr', 'year_array', 'array_year', 'array_year_20', 'array_year_10', 'price_legend', 'array_year_5', 'array_year_4', 'month_arr', 'm_arr', 'destinations', 'refinery_products', 'total_dest', 'ave_price_stream', 'ref_details', 'crude_prods', 'down_pet_project', 'down_pet_plants', 'year', 'import_permit_tot', 'import_prod_seg', 'states', 'crude_export', 'down_terminal_stream_prod', 'down_monthly_summary_crude_export', 'down_crude_export_by_destination', 'license_ref_projects', 'gas_obligations', 'gas_obls', 'gas_facility', 'gas_plant', 'gas_supply_company', 'textile_ind', 'text_year', 'table_of_contents', 'crude_export_oil', 'crude_export_fcond', 'crude_export_pcond', 'contributors'));
    }

    //section four
    public function loadSectionFour(Request $request)
    {
        $yrs = $request->year;
        $year_array = ['legends' => 'Total Wells in years'];
        $array_year = $this->getYearRange($yrs, 9);
        $array_year_20 = $this->getYearRange($yrs, 14);
        $array_year_10 = $price_legend = $this->getYearRange($yrs, 9);
        $array_year_9 = $price_legend = $this->getYearRange($yrs, 8);
        $array_year_5 = $this->getYearRange($yrs, 4);

        $month_arr = ['1' => 'January', '2' => 'Febuary', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];

        $m_arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // $no_yr = $yrs - 2001;
        $no_yr = 20;
        $_yrs = $yrs - 20;
        $year = \App\NOGIARPublicationSection::orderBy('year', 'asc')->distinct()->get(['year']);

        //script to determine if year is a leap year or not
        $yr = '0000';
        $ave_prod = 0;
        $isLeap = DateTime::createFromFormat('Y', $yrs)->format('L') === '1';
        if ($isLeap == true) {
            $yr = 366;
        } else {
            $yr = 365;
        }

        $contributors = \App\publicationReviewApprove::where('year', $yrs)->get();

        $imp_products = \App\down_import_product::where('id', '1')->orwhere('id', '2')->orwhere('id', '3')->orwhere('id', '5')->orwhere('id', '6')->orderBy('id', 'asc')->get();

        $import_permit_tot = \App\down_product_vol_import_permit::where('year', $request->year)->orderBy('product_id', 'asc')->distinct()->get(['product_id']);
        $down_products = \App\down_import_product::orderBy('product_name', 'asc')->get();
        $imp_prod_array = $down_products->where('id', '<>', 5)->where('id', '<>', 9)->where('id', '<>', 10);
        $import_prod_seg = \App\down_import_product::where('id', '<=', '8')->get();
        $states = \App\down_outlet_states::orderBy('state_name', 'asc')->get();
        $f_offices = \App\down_field_office::orderBy('id', 'asc')->get();
        $state_array = \App\down_outlet_states::all();

        $m_segments = \App\down_market_segment::orderBy('market_segment_name', 'asc')->get();

        $ave_price_range = \App\down_ave_consumer_price_range::where('year', '>=', $request->year - 9)->where('year', '<=', $request->year)->where('month', 'December')->orderBy('year', 'asc')->get();

        $zones = \App\gas_refinery_production_volumes::where('year', $request->year)->where('product_id', 5)->orderBy('zone', 'asc')->distinct()->get(['zone']);

        $firstTable = \App\she_accident_report_upstream::get()->where('year', $request->year)->toArray();
        $secondTable = \App\she_accident_report_downstream::get()->where('year', $request->year)->toArray();
        $ind_wide = array_merge($firstTable, $secondTable);
        $accident = [];

        foreach ($ind_wide as $accident_iw) {
            $accident_iw = (object) $accident_iw;
            if (! isset($accident[$accident_iw->year.$accident_iw->month]['incidents'])) {
                $accident[$accident_iw->year.$accident_iw->month]['incidents'] = 0;
                $accident[$accident_iw->year.$accident_iw->month]['work_related'] = 0;
                $accident[$accident_iw->year.$accident_iw->month]['non_work_related'] = 0;
                $accident[$accident_iw->year.$accident_iw->month]['fatal_incident'] = 0;
                $accident[$accident_iw->year.$accident_iw->month]['non_fatal_incident'] = 0;
                $accident[$accident_iw->year.$accident_iw->month]['work_related_fatal_incident'] = 0;
                $accident[$accident_iw->year.$accident_iw->month]['non_work_related_fatal_incident'] = 0;
                $accident[$accident_iw->year.$accident_iw->month]['fatality'] = 0;
            }

            $accident[$accident_iw->year.$accident_iw->month]['incidents'] += $accident_iw->incidents;
            $accident[$accident_iw->year.$accident_iw->month]['work_related'] += $accident_iw->work_related;
            $accident[$accident_iw->year.$accident_iw->month]['non_work_related'] += $accident_iw->non_work_related;
            $accident[$accident_iw->year.$accident_iw->month]['fatal_incident'] += $accident_iw->fatal_incident;
            $accident[$accident_iw->year.$accident_iw->month]['non_fatal_incident'] += $accident_iw->non_fatal_incident;
            $accident[$accident_iw->year.$accident_iw->month]['work_related_fatal_incident'] += $accident_iw->work_related_fatal_incident;
            $accident[$accident_iw->year.$accident_iw->month]['non_work_related_fatal_incident'] += $accident_iw->non_work_related_fatal_incident;
            $accident[$accident_iw->year.$accident_iw->month]['fatality'] += $accident_iw->fatality;
            $accident[$accident_iw->year.$accident_iw->month]['year'] = $accident_iw->year;
            $accident[$accident_iw->year.$accident_iw->month]['month'] = $accident_iw->month;
        }
        $ind_wide = $accident;
        $ind_wide_chart = $ind_wide;

        $accident_up = $up = \App\she_accident_report_upstream::where('year', $request->year)->orderBy('id', 'asc')->get();

        for ($i = $yrs - 9; $i <= $yrs; $i++) {
            $accident_up_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'incidents');
            $accident_down_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'incidents');

            //INCIDENT SAFETY PERFORMANCE
            $incident_chart[$i] = ($this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'incidents') + $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'incidents'));
            $work_related_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'incidents') + $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'work_related');
            $fatality_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'incidents') + $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'fatality');
        }

        $accident_dw = $down = \App\she_accident_report_downstream::where('year', $request->year)->orderBy('id', 'asc')->get();

        $accident_up = $up = \App\she_accident_report_upstream::where('year', $request->year)->orderBy('id', 'asc')->get();
        $acc_up_chart = \App\she_accident_report_upstream::where('year', $request->year)->get();
        $accident_dw = $down = \App\she_accident_report_downstream::where('year', $request->year)->orderBy('id', 'asc')->get();
        $acc_dw_chart = \App\she_accident_report_downstream::where('year', $request->year)->get();

        // $lube_year = \App\down_licensed_oil_makerters::orderBy('year', 'desc')->first();
        // $lube_cap = \App\down_licensed_oil_makerters::where('year', 2017)->get(); //USING 2017 AS BASE YEAR BUT WILL HAVE TO CHANGE
        $lube_cap = \App\down_licensed_oil_makerters::all();
        $major_c = $lube_cap->where('market_category_id', '2');
        $major_comp = $major_c->count();
        $inde_c = $lube_cap->where('market_category_id', '3');
        $inde_comp = $inde_c->count();
        $base_capacity_major = $major_c;
        $base_capacity_inde = $inde_c;
        $k = $inde_c->first();              //dd($base_capacity_inde . '<br />');
        if ($k) {
            $indx = $k->id - 1;
        } else {
            $indx = '';
        } //return $indx;

        //LOOP TO POPULATE PMS, AGO DPK amd ATK CHARTS
        foreach ($array_year_10 as $i => $year) {
            $pms_nnpc_chart[$i] = $pms_nnpc = $this->importMarketSegTot($year, 1, 6);
            $pms_majo_chart[$i] = $pms_majo = $this->importMarketSegTot($year, 1, 2);
            $pms_inde_chart[$i] = $pms_inde = $this->importMarketSegTot($year, 1, 3);
        }
        // dd($pms_nnpc_chart);

        foreach ($array_year_10 as $i => $year) {
            $ago_nnpc_chart[$i] = $this->importMarketSegTot($year, 2, 6);
            $ago_majo_chart[$i] = $this->importMarketSegTot($year, 2, 2);
            $ago_inde_chart[$i] = $this->importMarketSegTot($year, 2, 3);
        }

        foreach ($array_year_10 as $i => $year) {
            $dpk_nnpc_chart[$i] = $this->importMarketSegTot($year, 3, 6);
            $dpk_majo_chart[$i] = $this->importMarketSegTot($year, 3, 2);
            $dpk_inde_chart[$i] = $this->importMarketSegTot($year, 3, 3);
        }

        foreach ($array_year_10 as $i => $year) {
            $atk_nnpc_chart[$i] = $this->importMarketSegTot($year, 4, 6);
            $atk_majo_chart[$i] = $this->importMarketSegTot($year, 4, 2);
            $atk_inde_chart[$i] = $this->importMarketSegTot($year, 4, 3);
        }

        //LOOP TO POPULATE DOMESTIC VS IMPORT PMS, AGO DPK amd ATK CHARTS
        foreach ($array_year_10 as $i => $year) {
            $pms_import_chart[$i] = $this->importSummaryTot($year, 1);
            $pms_local_chart[$i] = $this->localSummaryTot($year, 1);

            $ago_import_chart[$i] = $this->importSummaryTot($year, 2);
            $ago_local_chart[$i] = $this->localSummaryTot($year, 2);

            $dpk_import_chart[$i] = $this->importSummaryTot($year, 3);
            $dpk_local_chart[$i] = $this->localSummaryTot($year, 3);
        }

        //
        $metering_phases = \App\es_metering::where('year', $request->year)->distinct()->get(['phase_id']);
        $meter_count = $metering_phases->count();

        $table_of_contents = \App\NOGIARPublicationRemark::where('year', $yrs)->where('show_table', 1)->orderBy('table_id', 'asc')->orderBy('table_id', 'asc')->get();

        return view('publication.nogiar.section-four', compact('yr', 'yrs', 'year_array', 'array_year', 'array_year_20', 'array_year_10', 'array_year_9', 'price_legend', 'array_year_5', 'month_arr', 'm_arr', 'year', 'lube_cap', 'major_c', 'major_comp', 'inde_c', 'inde_comp', 'base_capacity_major', 'base_capacity_inde', 'indx', 'imp_products', 'import_permit_tot', 'down_products', 'imp_prod_array', 'import_prod_seg', 'states', 'f_offices', 'state_array', 'm_segments', 'ave_price_range', 'zones', 'ind_wide', 'accident', 'accident_iw', 'ind_wide_chart', 'accident_up_chart', 'accident_down_chart', 'incident_chart', 'work_related_chart', 'fatality_chart', 'accident_up', 'accident_dw', 'down', 'acc_dw_chart', 'pms_nnpc_chart', 'pms_majo_chart', 'pms_inde_chart', 'ago_nnpc_chart', 'ago_majo_chart', 'ago_inde_chart', 'dpk_nnpc_chart', 'dpk_majo_chart', 'dpk_inde_chart', 'atk_nnpc_chart', 'atk_majo_chart', 'atk_inde_chart', 'pms_import_chart', 'pms_local_chart', 'ago_import_chart', 'ago_local_chart', 'dpk_import_chart', 'dpk_local_chart', 'accident_up', 'acc_up_chart', 'accident_dw', 'metering_phases', 'meter_count', 'table_of_contents', 'contributors'));
    }

    //section five
    public function loadSectionFive(Request $request)
    {
        $yrs = $request->year;
        $year_array = ['legends' => 'Total Wells in years'];
        $array_year = $this->getYearRange($yrs, 9);

        $array_year_20 = $this->getYearRange($yrs, 14);

        $array_year_10 = $price_legend = $this->getYearRange($yrs, 9);

        $array_year_5 = $this->getYearRange($yrs, 4);

        $month_arr = ['1' => 'January', '2' => 'Febuary', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];

        $m_arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // $no_yr = $yrs - 2001;
        $no_yr = 20;
        $_yrs = $yrs - 20;
        $year = \App\NOGIARPublicationSection::orderBy('year', 'asc')->distinct()->get(['year']);

        for ($i = $yrs - 9; $i <= $yrs; $i++) {
            $accident_up_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'incidents');
            $accident_down_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'incidents');

            //INCIDENT SAFETY PERFORMANCE
            $incident_chart[$i] = ($this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'incidents') +
                $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'incidents'));

            $work_related_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'work_related') +
                $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'work_related');

            $fatality_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'fatality') +
                $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'fatality');

            $non_work_related_chart[$i] = $this->yearlyHSEAccident($i, \App\she_accident_report_upstream::class, 'non_work_related') +
                $this->yearlyHSEAccident($i, \App\she_accident_report_downstream::class, 'non_work_related');

        }

        $spill = $spill_chart = \App\she_spill_incidence_report::where('year', $request->year)->get();
        $water_volume = \App\she_water_volumes_generated::where('year', $request->year)->get();
        $waste_volume = \App\she_drilling_waste_volumes::where('year', $request->year)->get();
        $acc_waste_manager = $acc_mgt_chart = \App\she_accredited_waste_manager::where('year', $request->year)->orderBy('id', 'asc')->get();
        $safety_permit = \App\she_offshore_safety_permit::orderBy('year', 'asc')->limit(10)->get();

        $pettitions = \App\she_pettitions_received::where('year', $request->year)->orderBy('category_id', 'asc')->get();
        $effluents = \App\she_effluent_waste_discharged::where('year', $request->year)->orderBy('company_id', 'asc')->get();

        $contigencies = \App\SheOilSpillContingency::where('year', $yrs)->orderBy('id', 'asc')->get();
        $appr_chemicals = \App\she_chemical_certification::where('year', $yrs)->orderBy('id', 'asc')->get();
        $approved = $appr_chemicals->where('status_id', 'Approved');
        $disapproved = $appr_chemicals->where('status_id', 'Disapproved');
        $pending = $appr_chemicals->where('status_id', 'Pending');
        $accr_laboratories = \App\she_accredited_laboratory::where('year', $request->year)->orderBy('laboratory_services', 'asc')->distinct()->get(['laboratory_services']);
        $drill_chemicals = \App\she_chemical_certification::where('year', $yrs)->distinct()->get(['chemical_type']);
        $chem_status = \App\she_chemical_certification::where('year', $yrs)->distinct()->get(['status_id']);
        $rad_well_types = \App\she_radiation_safety_permit::where('year', $yrs)->distinct()->get(['well_type']);
        $env_restorations = \App\she_environmental_restoration::where('year', $yrs)->orderBy('id', 'asc')->get();
        $env_studies = \App\she_study_type::where('type', 'study')->orderBy('id', 'asc')->get();
        $med_centers = \App\she_medical_training_center::where('year', $yrs)->orderBy('id', 'asc')->get();

        $type_fac_types = \App\facility_type::orderBy('id', 'asc')->where('type_id', '=', '4')->get();

        $glossaries = \App\NOGIARPublicationSection::where('year', $request->year)->where('section_type', 5)->first();
        $stage = \App\PublicationStage::where('year', $yrs)->first();
        $temp_stage = \App\Stage::all();
        $pub_stages = $temp_stage->where('workflow_id', 1);

        $contributors = \App\publicationReviewApprove::where('year', $yrs)->get();

        $table_of_contents = \App\NOGIARPublicationRemark::where('year', $yrs)->where('show_table', 1)->orderBy('table_id', 'asc')->orderBy('table_id', 'asc')->get();

        return view('publication.nogiar.section-five', compact('yrs', 'year_array', 'array_year', 'array_year_20', 'array_year_10', 'price_legend', 'array_year_5', 'month_arr', 'm_arr', 'year', 'spill', 'spill_chart', 'water_volume', 'waste_volume', 'acc_waste_manager', 'acc_mgt_chart', 'safety_permit', 'pettitions', 'effluents', 'contigencies', 'appr_chemicals', 'approved', 'disapproved', 'pending', 'accr_laboratories', 'drill_chemicals', 'chem_status', 'rad_well_types', 'env_restorations', 'env_studies', 'med_centers', 'glossaries', 'type_fac_types', 'stage', 'pub_stages', 'accident_up_chart', 'accident_down_chart', 'incident_chart', 'work_related_chart', 'fatality_chart', 'table_of_contents', 'contributors'));
    }

    //REMARK FUNCTION
    public function tableTitles($table_id, $yrs)
    {
        return $premark = \App\NOGIARpublicationRemark::where('year', $yrs)->where('table_id', $table_id)->first();
    }

    public function topRemarks($table_id, $yrs)
    {
        return $premark = \App\NOGIARPublicationRemark::where('year', $_GET['year'])->
        where('table_id', $table_id)->where('position', 1)->first();
    }

    public function bottomRemarks($table_id)
    {
        return $premark = \App\NOGIARPublicationRemark::where('year', $_GET['year'])->
        where('table_id', $table_id)->where('position', 0)->first();
    }

    public function topRemarksTemp($table_id, $yrs)
    {
        return $premark = \App\NOGIARPublicationRemarkTemp::where('year', $_GET['year'])->
        where('table_id', $table_id)->where('position', 1)->first();
    }

    public function bottomRemarksTemp($table_id)
    {
        return $premark = \App\NOGIARPublicationRemarkTemp::where('year', $_GET['year'])->
        where('table_id', $table_id)->where('position', 0)->first();
    }

    public function getFigure($table_id, $yrs)
    {
        return $premark = \App\NOGIARPublicationRemark::where('year', $yrs)->where('table_id', $table_id)->first();
    }

    // function figureDivOne($table_id, $yrs)
    // {
    //     if($this->getFigure($table_id, $yrs))
    //     {
    //         echo 'Figure '. $this->getFigure($table_id, $yrs)->figure_no_1 . ' : ' . $this->getFigure($table_id, $yrs)->figure_title_1;
    //     }
    //     elseif($this->getFigure($table_id, 2018))
    //     {
    //         'Figure ' . $this->getFigure($table_id, 2018)->figure_no_1 . ' : ' . $this->getFigure($table_id, 2018)->figure_title_1;
    //     }
    // }

    // function figureDivTwo($table_id, $yrs)
    // {
    //     if($this->getFigure($table_id, $yrs))
    //     {
    //         echo 'Figure '. $this->getFigure($table_id, $yrs)->figure_no_2 . ' : ' . $this->getFigure($table_id, $yrs)->figure_title_2;
    //     }
    //     elseif($this->getFigure($table_id, 2018))
    //     {
    //         'Figure ' . $this->getFigure($table_id, 2018)->figure_no_2 . ' : ' . $this->getFigure($table_id, 2018)->figure_title_2;
    //     }
    // }

    //SCRIPT TO USE PREVIOUS YEAR TABLE TEMPLATE
    public function prevTemp($table_id)
    {
        $table_t = \App\NOGIARPublicationRemark::where('year', $_GET['year'])->where('table_id', $table_id)->first();
        if (isset($table_t)) {
        } else {
            $year = \App\NOGIARPublicationRemark::orderBy('year', 'desc')->first();

            return $table_temp = \App\NOGIARPublicationRemark::where('year', $year->year)->where('table_id', $table_id)->first();
        }
    }

    public function tableNO($year, $table_id)
    {
        $table_no = \App\NOGIARPublicationRemark::where('year', $year)->where('show_table', 1)->where('table_id', '>=', 1)->where('table_id', '<=', $table_id)->count();

        return $table_no;
    }

    public function showHideTable($year, $table_id)
    {
        $t_year = \App\NOGIARPublicationRemark::where('year', $year)->first();
        if ($t_year) {
            $showHide = \App\NOGIARPublicationRemark::where('year', $t_year->year)->where('table_id', $table_id)->first();
        } else {
            $showHide = \App\NOGIARPublicationRemark::where('year', $year - 1)->where('table_id', $table_id)->first();
        }

        if ($showHide) {
            return $showHide->show_table;
        }
    }

    //########## END OF NOGIAR PUBLICATION FUNCTIONS ####################//
    //########## END OF NOGIAR PUBLICATION FUNCTIONS ####################//
    //########## END OF NOGIAR PUBLICATION FUNCTIONS ####################//
    //########## END OF NOGIAR PUBLICATION FUNCTIONS ####################//

    //PUBLICATION FUNCTIONS

    // function blockCount($year, $column)
    // {
    //     $bCount = \App\Bala_block::where('year', $year)->sum($column);
    //     return $bCount;
    // }

    public function reserveYearly($model, $year, $column)
    {
        $res_oil = $model::where('year', $year)->sum($column);

        return $res_oil;
    }

    public function gasAGNAGChart($year, $column)
    {
        $ag_nag_charts = \App\gas_summary_of_gas_production::where('year', $year)->sum($column);

        return $ag_nag_charts;
    }

    public function gasFlaredChart($year, $column)
    {
        $flared_charts = \App\gas_summary_of_gas_utilization::where('year', $year)->sum($column);

        return $flared_charts;
    }

    //NOGIAR PUBLICATION FUNCTIONS

    //dd($ave_price_crude);
    // if(!isset($perc_prod)){ $perc_prod = 0.0; }

    // $price_legend = $y = ['$yrs - 9' => $yrs - '9', '$yrs - 8' => $yrs - '8', '$yrs - 7' => $yrs - '7', '$yrs - 6' => $yrs - '6', '$yrs - 5' => $yrs - '5', '$yrs - 4' => $yrs - '4', '$yrs - 3' => $yrs - '3', '$yrs - 2' => $yrs - '2', '$yrs - 1' => $yrs - '1', '$yrs - 0' => $yrs - '0'];

    // function to check if a year is leap year.
    public function getTheNumberOfDaysInAYear($yrs)
    {
        if (($yrs % 4 == 0) && ($yrs % 100 != 0)) {
            $yr = 366;
        } else {
            $yr = 366;
        }

        return $yr;
    }

    public function getAveDailyProduction($yrs, $total_pcp)
    {
        $yr = $this->getTheNumberOfDaysInAYear($yrs);

        $ave_prod = ($total_pcp / $yr);
        $ave_prods = round($ave_prod, 2);
        echo $ave_prods;
    }

    // $imp_prod_array = \App\down_import_product::where('id', '<>', 5)->where('id', '<>', 9)->where('id', '<>', 10)->get();

    public function getWellTotal($well_yrs, $terrain)
    {
        $all_well_terrain = \App\up_well_activities::where('year', $well_yrs)->where('terrain_id', $terrain)->sum('no_of_well');

        return $all_well_terrain;
    }

    public function getContract($y, $class, $contract_id)
    {
        $all_well_contract = \App\up_well_activities::where('year', $y)->where('class_id', $class)->where('contract_id', $contract_id)->sum('no_of_well');

        return $all_well_contract;
    }

    public function getYearTotal($y, $class)
    {
        $well_total_year = \App\up_well_activities::where('year', $y)->where('class_id', $class)->sum('no_of_well');

        return $well_total_year;
    }

    public function defermentMonthly($year, $month, $column)
    {
        return $production_deferments = \App\up_crude_production_deferment::where('year', $year)->where('month', $month)->sum($column);
    }

    public function provCrudeProdByCompany($year)
    {
        $companies = \App\up_provisional_crude_production::where('year', $year)->distinct()->get(['company_id']);

        return $companies;
    }

    public function crudeProdTotal($year, $company_id, $column_name)
    {
        $crude_summary = \App\up_provisional_crude_production::where('year', $year)->where('company_id', $company_id)->sum($column_name);

        return $crude_summary;
    }

    public function crudeProdContract($year, $company_id)
    {
        $contracts = \App\up_provisional_crude_production::where([['year', $year], ['company_id', $company_id]])->limit(1)->with('contract')->get();

        return $contracts;
    }

    public function crudeProdTerrain($year, $company_id)
    {
        $terrains = \App\up_provisional_crude_production::where([['year', $year], ['company_id', $company_id]])
                                                            ->select('terrain_id')->with('terrain')->distinct('terrain_id')
                                                            ->get()
                                                            ->map(function ($value) {
                                                                return $value->terrain->terrain_name;
                                                            })->implode(' / ');

        return $terrains;
    }

    public function crudeProdByContract($year, $contract_id, $column_name)
    {
        $crude_by_contract = \App\up_provisional_crude_production::where('year', $year)->where('contract_id', $contract_id)->sum($column_name);

        return $crude_by_contract;
    }

    public function provCrudeTerrainSummary($year, $contract, $column)
    {
        $companyByTerrain = \App\up_provisional_crude_production::where('year', $year)->where('contract_id', $contract_id)->sum($column);

        return $companyByTerrain;
    }

    public function provisionalCrudeProd($year, $column)
    {
        $crude_prods = \App\up_provisional_crude_production::where('year', $year)->orderBy('contract_id', 'asc')->get();
        $tot_provi_crude_prod = \App\up_provisional_crude_production::where('year', $year)->sum($column);

        return $tot_provi_crude_prod;
    }

    public function reconcileTotalByCompany($year, $column, $stream, $type_id)
    {
        $recon_total = \App\down_terminal_stream_prod::where('year', $year)->where('stream_id', $stream)->where('production_type_id', $type_id)->sum($column);

        return $recon_total;
    }

    public function yearlyCrudeExport($year, $stream_id, $type)
    {
        $total = \App\down_terminal_stream_prod::where('year', $year)->where('stream_id', $stream_id)->where('production_type_id', $type)->value('stream_total');

        return is_null($total) ? 0 : $total;
    }

    public function reconcileProd($year, $type_id)
    {
        $t_stream_prod = \App\down_terminal_stream_prod::where('year', $year)->where('production_type_id', $type_id)->orderBy('id', 'asc')->get();

        return $t_stream_prod;
    }

    public function crudeByStream($year, $type_id)
    {
        $crude_by_stream = \App\down_terminal_stream_prod::where('year', '<=', $request->year)->where('year', '>=', $yrs - '9')->orderBy('id', 'asc')->get();

        return $crude_by_stream;
    }

    public function crudeExportByDest($year, $stream_id, $region)
    {
        $destination = \App\down_crude_export_by_destination::where('year', $year)->where('stream_id', $stream_id)->where('region', $region)->sum('stream_total');

        return $destination;
    }

    public function crudeExportPercent($year, $destination)
    {
        $crude_export_history = \App\down_crude_export_by_destination::where('year', $year)->where('destination', $destination)->orderBy('id', 'asc')->sum('stream_total');

        return $crude_export_history;
    }

    public function yearlyTotCrudeExport($year)
    {
        $total_dest = \App\down_crude_export_by_destination::where('year', $year)->sum('stream_total');

        return $total_dest;
    }

    public function aveCrudePriceByStream($year, $stream_id)
    {
        $ave_price = \App\up_ave_price_crude_stream::where('year', $year)->where('stream_id', $stream_id)->first();
        if ($ave_price != null) {
            $result = $ave_price->stream_total;

            return $result / 12;
        }
        // $ave_price = \App\up_ave_price_crude_stream::where('year', $year)->where('stream_id', $stream_id)->first();
            // if($ave_price != null)
            // {
            //     $result = $ave_price->december;     return $result;
            // }
    }

    public function crudeExportMonthly($year, $month)
    {
        $crude_export_monthly = \App\down_monthly_summary_crude_export::where('year', $year)->sum($month);

        return $crude_export_monthly;
    }

    public function crudeExportYearly($year)
    {
        $crude_export_yearly = \App\down_monthly_summary_crude_export::where('year', $year)->sum('stream_total');

        return $crude_export_yearly;
    }

    public function crudeExportByProductionType($year, $production_type_id, $stream_id)
    {
        $crude_export_yearly = \App\down_monthly_summary_crude_export::where('year', $year)->where('stream_id', $stream_id)->where('production_type_id', $production_type_id)->sum('stream_total');

        return $crude_export_yearly;
    }

    // function refPerformance($year, $type_id)
    // {
    //     $ref_perf = \App\down_refinary_capacity_utilization::where('year', $year)->where('year', '>=', $yrs - '9')->orderBy('id', 'asc')->get();
    //     return $ref_perf;
    // }

    public function getRefineryStream($year, $refinery_id, $product_id, $column)
    {
        $ref_streams = \App\down_refinery_production_volumes::where('year', $year)->where('refinery_id', $refinery_id)->where('product_id', $product_id)->sum($column);

        return $ref_streams;
    }

    public function refPerfYearTotal($year, $refinery_id)
    {
        $isLeap = DateTime::createFromFormat('Y', $year)->format('L') === '1';
        if ($isLeap == true) {
            $yr = 366;
        } else {
            $yr = 365;
        }

        $ref_year_total = \App\down_refinary_capacity_utilization::where('year', $year)->where('refinery_id', $refinery_id)->sum('total');
        $ref_year_total = ($ref_year_total / $yr);

        return $ref_year_total;
    }

    public function refYearTotal($year)
    {
        $isLeap = DateTime::createFromFormat('Y', $year)->format('L') === '1';
        if ($isLeap == true) {
            $yr = 366;
        } else {
            $yr = 365;
        }

        $ref_year_total = \App\down_refinary_capacity_utilization::where('year', $year)->sum('total');
        $ref_year_total = ($ref_year_total / $yr);

        return $ref_year_total;
    }

    public function refineryIntake($year, $refinery_id, $column)
    {
        $quarter_intake = \App\down_refinary_capacity_utilization::where('year', $year)->
                                     where('refinery_id', $refinery_id)->sum($column);

        return $quarter_intake;
    }

    public function refProductYearTotal($year, $product_id, $refinery_id)
    {
        $ref_prod_year_total = \App\down_refinery_production_volumes::where('year', $year)->where('product_id', $product_id)->where('refinery_id', $refinery_id)->sum('total');

        return $ref_prod_year_total;
    }

    public function refProductTotal($year, $product_id, $refinery_id, $month)
    {
        $ref_prod_total = \App\down_refinery_production_volumes::where('year', $year)->where('product_id', $product_id)->where('refinery_id', $refinery_id)->sum($month);

        return $ref_prod_total;
    }

    public function productImportMonthly($year, $product_id, $month)
    {
        $prod_import_yearly = \App\down_product_vol_import_permit::where('year', $year)->where('product_id', $product_id)->sum($month);

        return $prod_import_yearly;
    }

    public function productImportYearly($year, $product_id)
    {
        $prod_import_yearly = \App\down_product_vol_import_permit::where('year', $year)->where('product_id', $product_id)->sum('total');

        return $prod_import_yearly;
    }

    public function productImportYrDiff($year, $product_id, $market_segment_id)
    {
        $prod_import_yr_diff = \App\down_product_vol_import_permit::where('year', $year)->where('product_id', $product_id)->where('market_segment_id', $market_segment_id)->sum('total');

        return $prod_import_yr_diff;
    }

    public function importMarketSeg($year, $product_id, $market_segment_id, $month)
    {
        $import_market = \App\down_refinary_production::where('year', $year)->where('product_id', $product_id)->where('market_segment_id', $market_segment_id)->sum($month);

        return $import_market;
    }

    public function importMarketSegTot($year, $product_id, $market_segment_id)
    {
        $import_market_tot = \App\down_refinary_production::where('year', $year)->where('product_id', $product_id)->where('market_segment_id', $market_segment_id)->sum('total');

        return $import_market_tot;
    }

    public function importMarketMonthTot($year, $product_id, $month)
    {
        $import_market_tot = \App\down_refinary_production::where('year', $year)->where('product_id', $product_id)->sum($month);

        return $import_market_tot;
    }

    public function importSummaryTot($year, $product_id)
    {
        $import_summary_tot = \App\down_refinary_production::where('year', $year)->where('product_id', $product_id)->sum('total');

        return $import_summary_tot;
    }

    public function localSummaryTot($year, $product_id)
    {
        $local_summary_tot = \App\down_refinery_production_volumes::where('year', $year)->where('product_id', $product_id)->sum('total');

        return $local_summary_tot;
    }

    public function retailCount($year, $state_id, $market_segment_id)
    {
        $retail_count = \App\down_retail_outlet_summary::where('year', $year)->where('state_id', $state_id)->where('market_segment_id', $market_segment_id)->sum('total');

        return $retail_count;
    }

    public function marketSegCapacity($year, $market_segment_id, $product_id)
    {
        $segment_capacity = \App\down_outlet_storage_capacity::where('year', $year)->where('market_segment_id', $market_segment_id)->where('product_id', $product_id)->sum('total');

        return $segment_capacity;
    }

    // Retail Count By State
    // function retailCapacity($year, $state_id, $product_id)
    // {
    //     $retail_capacity = \App\down_outlet_storage_capacity::where('year', $year)->where('state_id', $state_id)->where('product_id', $product_id)->sum('total');
    //     return $r0etail_capacity;
    // }

    public function retailCapacity($year, $state_id, $market_segment_id)
    {
        $retail_capacity = \App\down_outlet_storage_capacity::where('year', $year)->where('state_id', $state_id)->where('market_segment_id', $market_segment_id)->sum('total');

        return $retail_capacity;
    }

    public function domGasObligation($company_id)
    {
        $gas_obligation = \App\gas_domestic_gas_obligation::where('company_id', $company_id)->get();

        return $gas_obligation;
    }

    public function domGasObligationTotal($year)
    {
        $gas_obligation_total = \App\gas_domestic_gas_obligation::where('year', $year)->sum('performance_obligation');

        return $gas_obligation_total;
    }

    // function domGasSupplyTotal($year, $column)
    // {
    //     $gas_supply_total = \App\gas_domestic_gas_supply::where('year', $year)->sum($column);
    //     return $gas_supply_total;
    // }

    public function domGasSupplyTotal($year, $company)
    {
        $gas_supply_total = \App\gas_domestic_gas_supply::where('year', $year)->where('company_id', $company)->groupBy('company_id')->sum('total');
        return $gas_supply_total;
    }

    public function summaryTotal($year, $model_name, $obligation_supply)
    {
        $obli_total = $model_name::where('year', $year)->sum($obligation_supply);
        return $obli_total;
    }

    public function obligationSummary($year, $company_id)
    {
        $obli_summary = \App\gas_domestic_gas_obligation::where('year', $year)->where('company_id', $company_id)->sum('performance_obligation');

        return $obli_summary;
    }

    public function supplySummary($year, $company_id)
    {
        $obli_supply = \App\gas_domestic_gas_supply::where('year', $year)->where('company_id', $company_id)->sum('total');

        return $obli_supply;
    }

    public function performanceSummary($year, $company_id)
    {
        $obli_perf = \App\gas_domestic_gas_supply::where('year', $year)->where('company_id', $company_id)->sum('total');

        return $obli_perf;
    }

    public function gasProductionUtilization($year, $month, $model_name, $total)
    {
        $gas_prod_util = $model_name::where('year', $year)->where('month', $month)->sum($total);

        return $gas_prod_util;
    }

    public function gasYearlyProductionUtilization($year, $model_name, $total)
    {
        $gas_prod_util_year = $model_name::where('year', $year)->sum($total);

        return $gas_prod_util_year;
    }

    public function gasProductionUtilizationByCompany($year, $company_id, $model_name, $total)
    {
        $gas_prod_util_comp = $model_name::where('year', $year)->where('company_id', $company_id)->sum($total);

        return $gas_prod_util_comp;
    }

    public function gasCompany($year, $model_name)
    {
        $gas_comp = $model_name::where('year', $year)->distinct()->get(['company_id']);

        return $gas_comp;
    }

    public function yearlyHSEAccident($year, $model_name, $column_name)
    {
        $acc_ = $model_name::where('year', $year)->sum($column_name);

        return $acc_;
    }

    public function yearlySpills($year, $column_name)
    {
        $spill = \App\she_spill_incidence_report::where('year', $year)->sum($column_name);

        return $spill;
    }

    public function refProdVolYearTotal($year, $product_id, $refinery_id)
    {
        $ref_prod_year_total = \App\down_refinery_production_volumes::where('year', $year)->where('product_id', $product_id)->where('refinery_id', $refinery_id)->sum('total');

        return $ref_prod_year_total;
    }
    //

    // for($i = 1; $i <= 5; $i++)
    // {
    //     $dom_prod_pms_chart[$i] = refProdVolYearTotal($yrs, 1, $i);
    //     $dom_prod_ago_chart[$i] = refProdVolYearTotal($yrs, 2, $i);
    //     $dom_prod_dpk_chart[$i] = refProdVolYearTotal($yrs, 3, $i);
    // }
    //dd($product_8);

    public function countManagementFacility($id)
    {
        $fac_types = \App\she_accredited_waste_manager::where('type_of_facility_id', $id)->count();

        return $fac_types;
    }

    public function yearlySeismicData($year, $terrain_id)
    {
        $seismic_data = \App\up_seismic_data::where('year', $year)->where('terrain_id', $terrain_id)->sum('actual_coverage');
        return $seismic_data;
    }

    // function gasFDPChart($year, $type_id)
    // {
    //     $fdps_nag_chart = \App\up_approved_gas_development_plan::where('year', $year)->where('type_id', $type_id)->count();
    //     return $fdps_nag_chart;
    // }

    // $_yrs = $yrs-9;

    // for($i = 0; $i <= 9; $i++)
    // {
    //     $fdps_nag_chart[$i] = gasFDPChart($_yrs + $i, 2);
    // }

    // for($i = 0; $i <= 9; $i++)
    // {
    //     $fdps_ag_chart[$i] = gasFDPChart($_yrs + $i, 1);
    // }

    public function getRefDetails($year, $refinery_id, $processing_unit, $value)
    {
        $refinery_details = \App\down_refinery_performance::where('year', $year)->where('refinery_id', $refinery_id)
            ->where('processing_unit', $processing_unit)->orderBy('id', 'asc')->get();

        return $refinery_details;
    }

    public function refineryDesignCapacities($year, $refinery_id, $processing_unit, $value)
    {
        $ref_cap = \App\down_refinery_performance::where('year', $year)->where('refinery_id', $refinery_id)
                ->where('processing_unit', $processing_unit)->orderBy('id', 'asc')->pluck($value)->first();

        return $ref_cap;
    }

    public function TextileIndustry($year, $sector, $value)
    {
        $text_ind = \App\gas_supply_textile_industry::where('year', $year)->where('sector', $sector)->pluck($value)->first();

        return $text_ind;
    }

    public function ProductVessel($year, $field_office_id, $product_id, $value)
    {
        $Vessels = \App\down_product_vol_import_permit_vessel::where('year', $year)->where('field_office_id', $field_office_id)->where('product_id', $product_id)->pluck($value)->first();

        return $Vessels;
    }

    public function accreditedLabs($laboratory_services, $field_office_id)
    {
        $accr_lab = \App\she_accredited_laboratory::where('laboratory_services', $laboratory_services)->where('zones', $field_office_id)->count();

        return $accr_lab;
    }

    public function approvedChem($year, $month, $chemical_type)
    {
        $approved_chem = \App\she_chemical_certification::where('year', $year)->where('month', $month)->where('chemical_type', $chemical_type)->count();

        return $approved_chem;
    }

    public function chemicalStatus($year, $month, $status_id)
    {
        $chem_status = \App\she_chemical_certification::where('year', $year)->where('month', $month)->where('status_id', $status_id)->count();

        return $chem_status;
    }

    public function radiationSafetyPermit($year, $month, $well_type)
    {
        $radiation = \App\she_radiation_safety_permit::where('year', $year)->where('month', $month)->where('well_type', $well_type)->count();

        return $radiation;
    }

    public function replacementRate($contract_id, $year, $value)
    {
        $rate = \App\up_reserve_replacement_rate::where('contract_id', $contract_id)->where('year', $year)->pluck($value)->first();

        return $rate;
    }

    public function capByStateMarket($year, $state_id, $product_id, $market_segment_id)
    {
        $state_cap = \App\down_outlet_storage_capacity::where('year', $year)->where('state_id', $state_id)->where('product_id', $product_id)->where('market_segment_id', $market_segment_id)->sum('total');

        return $state_cap;
    }

    public function ProjectLicenseCount($model_name, $year, $column_name, $text)
    {
        $count = $model_name::where($column_name, 'like', "%{$text}%")->count('id');

        return $count;
    }

    // $contract_arr = [''];

    public function reserveByContract($model, $year, $contract_id, $column)
    {
        $res_contract = $model::where('year', $year)->where('contract_id', $contract_id)->sum($column);

        return $res_contract;
    }

    public function reserveByAllContract($model, $year, $column)
    {
        $res_contract = $model::where('year', $year)->sum($column);

        return $res_contract;
    }

    public function netAddition($year, $contract_id)
    {
        $curr_reserve = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('curr_oil_condensate');
        $prev_reserve = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('prev_oil_condensate');

        return $net_addition = ($curr_reserve - $prev_reserve);
    }

    public function percentNetAddition($year, $contract_id)
    {
        $curr_reserve = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('curr_oil_condensate');
        $prev_reserve = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('prev_oil_condensate');
        $net_addition = ($curr_reserve - $prev_reserve);
        if ($curr_reserve == 0) {
            $percent_net_addition = 0;
        } else {
            $percent_net_addition = (($net_addition * 100) / $curr_reserve);
        }

        return $percent_net_addition;
    }

    public function depletionRate($year, $contract_id)
    {
        $curr_reserve = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('curr_oil_condensate');
        $production = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('production');

        if ($curr_reserve == 0) {
            $depletion_rate = 0;
        } else {
            $depletion_rate = (($production * 100) / $curr_reserve);
        }

        return $depletion_rate;
    }

    public function LifeIndexByContract($year, $contract_id)
    {
        $total = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('curr_oil_condensate');
        $prod = \App\up_reserve_addition_depletion_rate::where('year', $year)->where('contract_id', $contract_id)->sum('production');

        if ($prod == 0) {
            $life_index = 0;
        } else {
            $life_index = ($total / $prod);
        }

        return $life_index;
    }

    public function resolveCompanyByField($year, $contract_id)
    {
        $contract_array[] = '';
        $res_contract = '';
        $gas_data = \App\up_reserves_gas::where('year', $year)->get();

        foreach ($gas_data as $k => $gas) {
            $field_detail = \App\field::where('company_id', $gas->company_id)->first();
            if ($field_detail) {
                if ($field_detail->contract_id == $contract_id) {
                    $contract_array[$k] = $gas->id;
                }
            }
        } //dd($contract_array);

        foreach ($contract_array as $i => $id) {
            $res_contract += \App\up_reserves_gas::where('year', $year)->where('id', $contract_array)->sum('total_gas');
        }

        return $res_contract;
    }

    public function resolveCompanyByFieldAll($year)
    {
        $contract_array[] = '';
        $gas_data = \App\up_reserves_gas::where('year', $year)->get();

        foreach ($gas_data as $k => $gas) {
            $field_detail = \App\field::where('company_id', $gas->company_id)->first();
            if ($field_detail) {
                if ($field_detail->contract_id == null) {
                    $contract_array[$k] = $gas->id;
                }
            }
        }
        dd($contract_array);
    }

    public function reserveProduction($model, $year, $column)
    {
        $res_contract = $model::where('year', $year)->sum($column);

        return $res_contract;
    }

    // function gasReserveByContract($model, $year, $contract_id, $column)
    // {
    //     $res_contract = $model::where('year', $year)->where('contract_id', $contract_id)->sum($column);
    //     return $res_contract;
    // }

    public function reserveByTerrain($model, $year, $terrain_id, $column)
    {
        $res_terrain = $model::where('year', $year)->where('terrain_id', $terrain_id)->sum($column);

        return $res_terrain;
    }

    public function reserveByTerrainOthers($model, $year, $terrain_id, $column)
    {
        $swamp = $model::where('year', $year)->where('terrain_id', 4)->sum($column);
        $others = $model::where('year', $year)->where('terrain_id', null)->sum($column);

        return $swamp + $others;
    }

    public function completionByContractTerrain($year, $column_name, $column_id, $column)
    {
        $completion = \App\up_well_completion::where('year', $year)->where($column_name, $column_id)->sum($column);

        return $completion;
    }

    public function yearlyRig($year, $terrain_id)
    {
        $rig = \App\up_rig_disposition::where('year', $year)->where('terrain_id', $terrain_id)->pluck('december')->first();

        return $rig;
    }

    // function petitionCount($year, $category_id)
    // {
    //     $petition_count = \App\she_pettitions_received::where('year', $year)->where('category_id', $category_id)->count();
    //     return $petition_count;
    // }

    public function environmentalStudies($year, $month, $type_id)
    {
        $environ_studies = \App\she_environmental_studies::where('year', $year)->where('month', $month)->where('type_id', $type_id)->count();

        return $environ_studies;
    }

    public function revenueActual($year, $column)
    {
        $revenue_actual = \App\eco_revenue_actual::where('year', $year)->sum($column);

        return $revenue_actual;
    }

    public function LPGImportByZone($year, $month)
    {
//        $LPGs = \App\gas_refinery_production_volumes::where('year', $year)->where('month', $month)->where('zone', $zone)->sum('volume');
        $LPGs = \App\gas_refinery_production_volumes::where('year', $year)->where('month', $month)->sum('volume');
        return $LPGs;
    }

    public function LPGImportByZoneTotal($year)
    {
        // $LPGTOTAL = \App\gas_refinery_production_volumes::where('year', $year)->where('zone', $zone)->sum('volume');
         $LPGTOTAL = \App\gas_refinery_production_volumes::where('year', $year)->sum('volume');
         return $LPGTOTAL;
    }

    public function LPGImportByZoneChart($year)
    {
        $lpg_charts = \App\gas_refinery_production_volumes::where('year', $year)->sum('volume');

        return $lpg_charts;
    }

    public function ChartReserve($model, $year, $column, $column_id)
    {
        $oil_chart = $model::where('year', $yrs)->where('column', $column)->count();

        return $oil_chart;
    }

    public function approveNAGCount($year, $type_id)
    {
        $nag_count_chart = \App\up_approved_gas_development_plan::where('year', $year)->where('off_take_rate', '<>', 0)->count('year');

        return $nag_count_chart;
    }

    public function getCompanyList($year)
    {
        $companies = \App\up_approved_gas_development_plan::where('year', $year)->where('type_id', 1)->distinct()->get(['company_id']);

        return $companies;
    }

    public function approveAGCount($year, $type_id, $company_id)
    {
        $ag_count_chart = \App\up_approved_gas_development_plan::where('year', $year)->where('type_id', 1)->where('company_id', $company_id)->sum('ag_reserve');

        return $ag_count_chart;
    }

    public function industryWideIncident($model, $year, $column)
    {
        $incidents = $model::where('year', $year)->first();

        return $incidents->$column;
    }

    public function dwp(Request $request)
    {
        $year = \App\dwp_publication::where('status', 1)->orderBy('year', 'asc')->distinct()->get(['year']);

        return view('publication.dwp.dwp', compact('year'));
    }

    public function loadDWPPublication(Request $request)
    {
        $dwp = \App\dwp_publication::where('status', 1)->where('id', '<>', 0)->where('year', $request->year)->get();

        $year = \App\dwp_publication::where('status', 1)->orderBy('year', 'asc')->distinct()->get(['year']);
        $yrs = $request->year;

        return view('publication.dwp.loadDWPPublication', compact('dwp', 'year', 'yrs'));
    }

    public function loadDWPAdminPublication(Request $request)
    {
        $dwp = \App\dwp_publication::where('year', $request->year)->get();

        $year = \App\dwp_publication::orderBy('year', 'asc')->distinct()->get(['year']);
        $yrs = $request->year;

        return view('publication.dwp.loadDWPAdminPublication', compact('dwp', 'year', 'yrs'));
    }

    public function pdfview(Request $request)
    {
        return view('publication.nogiar.loadNOGIARAdminPublication');
    }

    public function add_publication_remark(Request $request)
    {
        try {
            //return $request->all();

            //setting Section id based on Table Id
            $table_id = $request->table_id;
            $year = $request->year;
            if ($table_id >= 1 && $table_id < 43) {
                $section_id = 1;
                $section = 'UPSTREAM';
            } elseif ($table_id >= 43 && $table_id < 63) {
                $section_id = 2;
                $section = 'MIDSTREAM';
            } elseif ($table_id >= 63 && $table_id < 77) {
                $section_id = 3;
                $section = 'DOWNSTREAM';
            } elseif ($table_id >= 77 && $table_id < 99) {
                $section_id = 4;
                $section = 'HSE';
            } elseif ($table_id >= 99 && $table_id < 100) {
                $section_id = 5;
                $section = 'REVENUE';
            }

            //INSERTING NEW NOGIAR PUBLICATION
            $add_remark = \App\NOGIARPublicationRemark::updateOrCreate(['year'=> $year, 'table_id'=> $table_id],
            [
                'table_id' => $table_id,
                // 'page_no' => $request->page_no,
                'year' => $year,
                'position' => $request->position,
                'table_title' => $request->table_title,
                // 'figure_title' => $request->figure_title,
                'remark' => $request->remark,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            $message = 'New '.$section.' remark for '.$year.' NOGIAR Publication has been added by '.\Auth::user()->name.', please you are to review and take necessary action.';
            $this->send_remark_mail($year, $message, $section);

            if ($request->ajax())
            {
                return 'Success';
//                return response()->json(['status'=>'ok', 'info'=>'New Publication Remark Added Successfully.']);
            } else
            {
//                return redirect()->route('nogiar.admin')->with('info', 'Publication Remark Updated Successfully');
                return 'Success';
//                return response()->json(['status'=>'ok', 'info'=>'New Publication Remark Added Successfully.']);
            }
        } catch (\Exception $e)
        {
//            return  redirect()->route('nogiar.admin')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
            return response()->json(['status'=>'ok', 'error' =>'New Publication Remark Added Successfully.']);
        }

                return redirect()->route('nogiar.admin')->with('sucess', 'Publication Remark Add or Updated Successfully');
    }

    public function editPublicationRemark(Request $request)
    {
        $REMARK = \App\NOGIARPublicationRemark::where('table_id', $request->table_id)->where('year', $request->year)->first();
        $one_tab = \App\nogiar_publication_list::where('table_id', $request->table_id)->first();
        $all_tab = \App\nogiar_publication_list::orderBy('table_id', 'asc')->get();
        $FIGURE = \App\FigureNumbering::where('table_id', $request->table_id)->get();
        return view('publication.nogiar.modals.editPublicationRemark', compact('REMARK', 'one_tab', 'all_tab', 'FIGURE'));
    }

    public function update_publication_remark(Request $request)
    {
        try {
            $picture = $request->file('picture');

            if ($picture != null) {
                $file_name = $picture->getClientOriginalName();
                $destinationPath = 'assets/images/publications/'.Input::file('picture')->getClientOriginalName();
                $picture->move($destinationPath, Input::file('picture')->getClientOriginalName());
            } else {
                $file_name = '';
            }

            //UPDATING NEW NOGIAR PUBLICATION
            $add_remark = \App\NOGIARPublicationRemark::updateOrCreate(['id'=> $request->id],
            [
                'table_id' => $request->table_id,
                'section_id' => $request->section_id,
                'page_no' => $request->page_no,
                'year' => $request->year,
                'position' => $request->position,
                'header' => $request->header,
                'sub_head' => $request->sub_head,
                'sub_sub_head' => $request->sub_sub_head,
                'table_title' => $request->table_title,
                'figure_title' => $request->figure_title,
                'remark' => $request->remark,
                'created_by' => \Auth::user()->name,
            ]);

            //send mail
            $message = 'NOGIAR Publication Remark has been modified for the year '.$request->year.' by '.\Auth::user()->name.' into PRIS, please review and take necessary action.';
            $target_role = 2;

            $this->send_remark_mail($message, $target_role);

            if ($request->ajax()) {
                $remark_details = ['table_id'=>$add_remark->table_id, 'header'=>$add_remark->header, 'title'=>$add_remark->title, 'position'=>$add_remark->position, 'picture'=>$add_remark->picture, 'remark'=>$add_remark->remark, 'year'=>$add_remark->year, 'id'=>$add_remark->id];

                return response()->json(['status'=>'ok', 'message'=>$remark_details, 'info'=>'New Publication Remark Added Successfully.']);
            } else {
                return redirect()->route('nogiar.admin')->with('info', 'Publication Remark Updated Successfully');
            }
        } catch (\Exception $e) {
            return  redirect()->route('nogiar.admin')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    //publication content
    public function getPublicationContent(Request $request)
    {
        $nogiar = \App\nogiar_publication_content::where('id', $request->id)->first();

        return view('publication.nogiar.content', compact('nogiar'));
    }

    public function searchPublicationByYear(Request $request)
    {
        $year = $request->year;
        $search = $request->price;
        $is_free = $request->is_free;
        // dd($year, $search, $is_free);
        if ($year) {
            $nogiars = \App\nogiar_publication_content::where('year', 'like', "%{$year}%")->orderBy('year', 'desc')->paginate(10);
        } elseif ($search) {
            $nogiars = \App\nogiar_publication_content::where('year', 'like', "%{$search}%")
                                                ->orwhere('nogiar_id', 'like', "%{$search}%")
                                                ->orwhere('price', 'like', "%{$search}%")->orderBy('year', 'desc')->paginate(10);
        } elseif ($is_free == 0 || $is_free == 1) {
            $nogiars = \App\nogiar_publication_content::where('is_free', $is_free)->orderBy('year', 'desc')->paginate(10);
        } elseif ($is_free == 2) {
            $nogiars = \App\nogiar_publication_content::orderBy('year', 'desc')->paginate(10);
        }

        return view('publication.nogiar.load-content', compact('nogiars'));
    }

    public function publicationLibrary(Request $request)
    {
        //getting all item in login user cart
        // if(\Auth::check())
        // {
        //   $publications = \App\nogiar_publication_content::orderBy('year', 'desc')->get();
        //   return view('publication.nogiar.library', compact('publications'));
        // } //getting all item in login user cart
        // else if(\Auth::guard('external')->check())
        // {
        $publications = \App\nogiar_publication_content::orderBy('year', 'desc')->paginate(10);

        $today = date('Y-m-d');
        // $cart = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->where('date', '<', $today)->delete();
        return view('publication.nogiar.library', compact('publications'));
        //}
    }

    public function list(Request $request)
    {
        //getting all item in login user cart
        //if(\Auth::guard('external')->check())
        //{
        $publications = \App\nogiar_publication_content::orderBy('year', 'desc')->paginate(10);

        return view('publication.nogiar.list', compact('publications'));
        //}
    }

    public function addToCartView(Request $request)
    {
        $publication = \App\nogiar_publication_content::where('id', $request->id)->first();
        $in_cart = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->where('product_id', $request->id)->first();

        $carts = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->orderBy('id', 'desc')->get();

        //getting all item in login user cart
        if (\Auth::guard('external')->check()) {
            $today = date('Y-m-d');
            $cart = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->where('date', '<', $today)->delete();
        }

        return view('publication.nogiar.add-to-cart-view', compact('publication', 'in_cart', 'carts'));
    }

    public function addItemToCart(Request $request)
    {
        try {
            //INSERTING item to cart
            $add = \App\Cart::updateOrCreate(['id'=> $request->id],
            [
                'user_id' => \Auth::guard('external')->user()->id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'quantity' => 1,
                'date' => date('Y-m-d'),
                'subtotal' => ($request->price * 1),
            ]);

            //send mail
            $cart = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->count();

            if ($request->ajax()) {
                return response()->json(['cart'=>$cart, 'status'=>'ok', 'info'=>'Item Added To Cart Successfully.']);
            } else {
                return redirect()->back()->with(['cart'=>$cart, 'info'=> 'Item Added To Cart Successfully']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function cart(Request $request)
    {
        $carts = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->orderBy('id', 'desc')->get();

        return view('publication.nogiar.cart', compact('carts'));
    }

    public function removeItemFromCart(Request $request, $id)
    {
        //return $id;
        //return $request->all();
        try {
            //removing iten from cart
            $remove = \App\Cart::where('id', $id)->delete();
            //send mail

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'Item Removed From Cart Successfully.']);
            } elseif ($remove) {
                return redirect()->back()->with('info', 'Item Removed From Cart Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function makePayment(Request $request)
    {
        $publication = \App\nogiar_publication_content::where('id', $request->id)->first();
        $carts = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->orderBy('id', 'desc')->get();
        $price = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->sum('price');

        return view('publication.nogiar.make-payment', compact('publication', 'carts', 'price'));
    }

    public function getSectionDetails(Request $request)
    {
        $section = \App\NOGIARPublicationSection::where('year', $request->year)->where('section_type', $request->section_type)->first();

        return response()->json($section);
    }

    public function getPrevYearSectionDetails(Request $request)
    {
        $yrs = date('Y');
        $years = \App\NOGIARPublicationSection::where('section_type', $request->section_type)->where('year', '<>', $yrs)->orderBy('year', 'desc')->first();
        $section = \App\NOGIARPublicationSection::where('year', $years->year)->where('section_type', $request->section_type)->first();

        return response()->json($section);
    }

    public function getPublicationMessages(Request $request)
    {
        $message = \App\PublicationMessage::where('year', $request->year)->where('section', $request->section)->first();

        return response()->json($message);
    }

    public function addTable(Request $request)
    {
        try {
            // return $request->all();
            //INSERTING
            $add = \App\nogiar_publication_list::updateOrCreate(['id'=> $request->id],
            [
                'table_id' => $request->table_id,
                'publication_type' => $request->publication_type,
                'main_heading' => $request->main_heading,
                'sub_heading_1' => $request->sub_heading_1,
                'sub_heading_2' => $request->sub_heading_2,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'created_by' => \Auth::user()->id,
            ]);

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'New Publication Table Added Successfully.']);
            } else {
                return redirect()->back()->with(['status'=>'ok', 'info'=>'New Publication Table Added Successfully.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function addTableOfContent(Request $request)
    {
        try {
            // return $request->all();

            $DATA = \App\NOGIARPublicationRemark::where('year', $request->year)->orderBy('id', 'asc')->get();
            foreach ($DATA as $key => $value) {
                $add = \App\TableNumbering::insert([
                    'year' => $value->year,
                    'table_no' => $key,
                    'table_id' => $value->table_id,
                    'page_no' => $value->page_no,
                ]);
            }

            //update
            $UPDATE = \App\TableNumbering::where('year', $request->year)->orderBy('table_id', 'asc')->get();
            foreach ($UPDATE as $key => $value) {
                $data = [
                    'table_no' => $key + 1,
                ];
                \App\NOGIARPublicationRemark::where('year', $request->year)->where('table_id', $value->table_id)->update($data);
            }

            //empty table
            DB::table('table_numbering')->truncate();

            //UPDATE PUBLICATIONSTAGE TO NEXT STAGE
            $wflow_stage = \App\PublicationStage::where('year', $request->year)->first();

            self::send_publication_mail($request->year, $wflow_stage->workflow_id, 'Section');
            $next_stage = $wflow_stage->stage_id + 1;
            $data = [
                'stage_id' => $next_stage,
            ];
            \App\PublicationStage::where('year', $request->year)->where('workflow_id', $wflow_stage->workflow_id)->update($data);

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'New Table of Content Generated Successfully for NOGIAR - '.$request->toc_year]);
            } else {
                return redirect()->back()->with(['status'=>'ok', 'info'=>'New Table of Content Generated Successfully for NOGIAR - '.$request->toc_year]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function viewTableOfContent(Request $request)
    {
        try {
            $table_of_contents = \App\TableOfContent::orderBy('page_no', 'asc')->paginate(20);

            return view('publication.nogiar.table-of-content', compact('table_of_contents'));
        } catch (\Exception $e) {
            return redirect()->route('view-toc')->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function generateAllTableHeader(Request $request)
    {
        try {
            // return $request->all();

            $DATA = \App\NOGIARPublicationRemark::where('year', 2012)->orderBy('id', 'asc')->get();

            foreach ($DATA as $key => $value) {
                $add_numbering = \App\TableNumbering::insert([
                    'year' => $request->year,
                    'table_no' => $key,
                    'table_id' => $value->table_id,
                    'page_no' => $value->page_no,
                ]);
            }

            //update
            $UPDATE = \App\TableNumbering::where('year', $request->year)->orderBy('table_id', 'asc')->get();
            foreach ($UPDATE as $key => $value) {
                $add_remark = \App\NOGIARPublicationRemark::insert([
                    'year' => $request->year,
                    'table_no' => $key,
                    'table_id' => $value->table_id,
                    'page_no' => $value->page_no,
                ]);
            }

            //empty table
            DB::table('table_numbering')->truncate();

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'New Table of Content Generated Successfully for NOGIAR - '.$request->year]);
            } else {
                return redirect()->back()->with(['status'=>'ok', 'info'=>'New Table of Content Generated Successfully for NOGIAR - '.$request->year]);
            }

            // $nogiar = \App\nogiar_publication::where('id','<>', 0);
           //  if($request->has('year'))
           //  {
           //      $nogiar=$nogiar->where('year',$request->year);
           //  }

           //  $nogiar = $nogiar->get();
           //  $year = \App\nogiar_publication_content::orderBy('year', 'asc')->distinct()->get(['year']);

           //  $yrs = $request->year;

           //  return view('publication.nogiar.admin', compact('nogiar', 'year', 'yrs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    public function getATableOfContent(Request $request)
    {
        $toc = \App\TableOfContent::where('year', $request->year)->where('type_id', 1)->orderBy('id', 'asc')->get();

        return response()->json($toc);
    }

    public function getATableOfContentCount(Request $request)
    {
        $toc_count = \App\TableOfContent::where('year', $request->year)->where('type_id', 1)->count();

        return response()->json($toc_count);
    }

    public function getATableOfContentFirst(Request $request)
    {
        $first = \App\TableOfContent::where('year', $request->year)->where('type_id', 1)->orderBy('id', 'asc')->first();

        return response()->json($first);
    }

    public function getATableOfContentLast(Request $request)
    {
        $last = \App\TableOfContent::where('year', $request->year)->where('type_id', 1)->orderBy('id', 'desc')->first();

        return response()->json($last);
    }

    public function toc_section($year)
    {
        $toc_sections = \App\NOGIARPublicationSection::where('year', $year)->where('section_type', '<', 4)->orderBy('section_type', 'asc')->get();

        //check if table of content already exist
        if (! count($toc_sections)) {
            $toc_sections = \App\NOGIARPublicationSection::where('year', 2012)->where('section_type', '<', 4)->orderBy('section_type', 'asc')->get();
        }

        return $toc_sections;
    }

    public function toc_title($year, $section_id)
    {
        $toc_titles = \App\NOGIARpublicationRemark::where('year', $year)->where('section_id', $section_id)->where('sub_head', '<>', '')->first();

        //check if table of content already exist
        if (! $toc_titles) {
            $toc_titles = \App\NOGIARpublicationRemark::where('year', 2012)->where('section_id', $section_id)->where('sub_head', '<>', '')->first();
        }

        return $toc_titles;
    }

    public function checkPubYear(Request $request)
    {
        $pubYear = \App\NOGIARPublicationRemarkTemp::where('year', $request->year)->where('table_id', $request->table_id)->first();

        if (! $pubYear) {
            $year = \App\NOGIARPublicationRemark::orderBy('year', 'desc')->first();
            $pubYear = \App\NOGIARPublicationRemark::where('year', $year->year)->where('table_id', $request->table_id)->first();
        }

        return response()->json($pubYear);
    }

    public function getTempTableHeader(Request $request)
    {
        $table_t = \App\NOGIARPublicationRemark::where('year', $request->year)->where('table_id', $request->table_id)->first();
        if (! $table_t) {
            $year = \App\NOGIARPublicationRemark::orderBy('year', 'desc')->first();
            $table_temp = \App\NOGIARPublicationRemark::where('year', $year->year)->where('table_id', $request->table_id)->first();

            return response()->json($table_temp);
        }
    }

    public function getTempTableHeaderTemp(Request $request)
    {
        $table_temp = \App\NOGIARPublicationRemarkTemp::where('year', $request->year)->where('table_id', $request->table_id)->first();

        return response()->json($table_temp);
    }

    public function getAllPageNo(Request $request)
    {
        $pages = \App\NOGIARPublicationRemark::where('year', $request->year)->first();
        if ($pages) {
            $page_nos = \App\NOGIARPublicationRemark::where('year', $request->year)->get();
        } else {
            $mostRecentYear = \App\NOGIARPublicationRemark::orderBy('year', 'desc')->first();
            $page_nos = \App\NOGIARPublicationRemark::where('year', $mostRecentYear->year)->get();
        }

        return response()->json($page_nos);
    }

    public function getNogiarContributorsByYear(Request $request)
    {
        $contributors = \App\publicationReviewApprove::where('year', $request->year)->orderBy('id', 'desc')->with(['user', 'approver'])->get();

        return response()->json($contributors);
    }

    public function getNogiarContributorsById(Request $request)
    {
        $contributor = \App\publicationReviewApprove::where('id', $request->id)->with(['user', 'approver'])->first();

        return response()->json($contributor);
    }

    public function getPublicationStageId(Request $request)
    {
        $stages = \App\PublicationStage::where('year', $request->year)->first();

        return response()->json($stages);
    }

    public function getWorkflowUser(Request $request)
    {
        $user_id = \App\Stage::where('position', $request->position)->first();

        return response()->json($user_id);
    }

    public function getPublicationTables(Request $request)
    {
        $pub_tables = \App\NOGIARPublicationRemark::where('year', $request->year)->get();

        return response()->json($pub_tables);
    }

    public function convertToWord(Request $request)
    {
        // $completed = \App\NOGIARPublicationSection::where('year', 2019)->get();
        if (request()->has('worddoc')) {
            header('Content-Type: application/vnd.ms-word');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('content-disposition: attachment;filename=NOGIAR-Publication.doc');

            return response()->view('publication.nogiar.complete');
            //             ->withHeaders("Content-Type: application/vnd.ms-word ,Expires: 0 ,Cache-Control: must-revalidate, post-check=0, pre-check=0","content-disposition: attachment;filename=Report.doc","Cache-Control: must-revalidate, post-check=0, pre-check=0"]);
        }

        return view('publication.nogiar.complete');
    }

    public function publicationComplete()
    {
        $completed = \App\NOGIARPublicationSection::where('year', 2019)->get();

        return view('publication.nogiar.complete', compact('completed'));
    }

    public function testSectionOne(Request $request)
    {
        $yrs = $request->year;

        $multi_clients_year = \App\bala_multiclient_project_status::orderBy('year', 'desc')->first();
        $multi_clients = $bala_data_ps = \App\bala_multiclient_project_status::where('year', $multi_clients_year->year)->get();
        // return $nogiar = \App\NOGIARPublicationSection::where('year', $request->year)->first();
        // $review_approve = \App\NOGIARPublicationSection::where('year', $request->year)->first();

        $publication_section = \App\NOGIARPublicationSection::where('year', $request->year)->get();
        $nogiar = $review_approve = $publication_section->where('year', $request->year)->first();
        $director_remark = $publication_section->where('section_type', 1)->first();
        $regulatory_structure = $publication_section->where('section_type', 2)->first();
        $modular_refinery = $publication_section->where('section_type', 3)->first();

        $imp_products = \App\down_import_product::where('id', '1')->orwhere('id', '2')->orwhere('id', '3')->orwhere('id', '5')
                                                ->orwhere('id', '6')->orderBy('id', 'asc')->get();

        $total_terrains = $terrain = $rig_terrain = \App\terrain::with('Bala_oml')->get();

        $year = \App\NOGIARPublicationSection::orderBy('year', 'asc')->distinct()->get(['year']);

        $oml_opl_year = $request->year;
        $opl_year = \App\Bala_opl::orderBy('year', 'desc')->first();
        $opl = \App\Bala_opl::where('year', $opl_year->year)->orderBy('id', 'asc')->get();
        // if($oml_opl_year!= null){ $oml_opl_year = $oml_opl_year; }else{ $oml_opl_year = 2020; }

        $oplCount = count($opl);
        $oplContract = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($i != 3) {
                if ($i != 4) {
                    $oplValue = $opl->where('contract_type', $i)->count();
                    $oplContract[$i] = ceil((($oplValue * 100) / $oplCount));
                } else {
                    $oplValue = $opl->where('contract_type', $i)->count();
                    $oplContract[$i] = floor((($oplValue * 100) / $oplCount));
                }
            }
        }

        $oml_year = \App\Bala_oml::orderBy('year', 'desc')->first();
        $oml = \App\Bala_oml::where('year', $oml_year->year)->orderBy('id', 'asc')->get();
        $omlCount = count($oml);
        $omlContract = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($i != 3) {
                if ($i != 4) {
                    $omlValue = $oml->where('contract_type', $i)->count();
                    $omlContract[$i] = ceil((($omlValue * 100) / $omlCount));
                } else {
                    $omlValue = $oml->where('contract_type', $i)->count();
                    $omlContract[$i] = floor((($omlValue * 100) / $omlCount));
                }
            }
        }  //dd($omlContract);

        $b_year = \App\Bala_block::orderBy('year', 'desc')->first();
        $block = \App\Bala_block::where('year', $b_year->year)->orderBy('id', 'asc')->get();
        $mf_year = \App\Bala_marginal_field::orderBy('year', 'desc')->first();
        $m_field = \App\Bala_marginal_field::where('year', $oml_opl_year)->orderBy('id', 'asc')->get();

        $fdps = \App\up_field_development_plan::where('year', $yrs)->where('remark', 'Approved')->orderBy('id', 'asc')->get();
        $app_gas_fdps = \App\up_approved_gas_development_plan::where('year', $yrs)->orderBy('id', 'asc')->get();
        $drill_gas_wells = \App\up_drilling_gas::where('year', $yrs)->orderBy('id', 'asc')->get();
        $gas_well_workovers = \App\up_well_workover::where('year', $yrs)->orderBy('id', 'asc')->get();
        $field_summaries = \App\up_field_summary::where('year', $yrs)->orderBy('id', 'asc')->get();

        $production_deferments = \App\up_crude_production_deferment::where('year', $yrs)->orderBy('id', 'asc')->get();
        $crude_prods = \App\up_provisional_crude_production::where('year', $yrs)->orderBy('contract_id', 'asc')->get();

        $seismic_data = \App\up_seismic_data::orderBy('year', 'asc')->limit(10)->get();
        $rig_disposition_year = \App\up_rig_disposition::where('year', $yrs)->orderBy('terrain_id', 'asc')->get();

        $year_array = ['legends' => 'Total Wells in years'];
        $array_year = $this->getYearRange($yrs, 9);
        $array_year_20 = $this->getYearRange($yrs, 14);
        $array_year_10 = $price_legend = $this->getYearRange($yrs, 9);
        $array_year_9 = $this->getYearRange($yrs, 8);

        $array_year_5 = $this->getYearRange($yrs, 4);

        $month_arr = ['1' => 'January', '2' => 'Febuary', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'];

        $contracts = $oml_contract = $test_contract = $contract_legend = \App\contract::all();
        $contract_2to5 = $contracts->where('id', '<>', 1);
        $rrr_contract_legend = $oml_contract->where('id', '<>', 1);
        $concession_contract_legend = $oml_contract->where('id', '<>', 3);
        $contractCount = count($contracts);
        $opl_terrains = $oml_terrains = $pro_crud_terrains = \App\up_concession_terrain::all();

        $opl_year = \App\Bala_opl::orderBy('year', 'desc')->first();
        $opl = \App\Bala_opl::where('year', $opl_year->year)->orderBy('id', 'asc')->get();

        //getting total concession
        $allConcession = (count($oml) + count($opl) + count($m_field));
        $count_m_field = $m_field->count();

        $omlCount = count($oml);
        $oml_opl = [];
        $oml_opl_concession = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($i != 3) {
                $omlValue = $oml->where('contract_type', $i)->count();
                $oplValue = $opl->where('contract_type', $i)->count();

                $oml_opl[$i] = ($omlValue + $oplValue);
                //substracting 1 from PSC
                if ($i == 5) {
                    $oml_opl[$i] = $oml_opl[$i] - 1;
                }
            }
        }
        array_splice($oml_opl, 2, 0, $count_m_field);      //\array_splice($oml_opl, 0, 1);
        //array_splice($oml_opl, 3, 0, 30);      \array_splice($oml_opl, 0, 1);
        //dd($oml_opl);

        // for ($i = 1; $i <= 5; $i++)
        // {
        //     if($i != 3)
        //     {
        //         $omlValue = $oml->where('contract_type', $i)->count();
        //         $oplValue = $opl->where('contract_type', $i)->count();

        //         $oml_opl[$i] = ($omlValue + $oplValue);
        //     }
        // }   array_splice($oml_opl, 3, 0, $count_m_field);      \array_splice($oml_opl, 0, 1);
        //array_splice($oml_opl, 3, 0, 30);      \array_splice($oml_opl, 0, 1);
        //dd($oml_opl);

        foreach ($oml_opl as $key => $value) {
            $oml_opl_concession[$key] = number_format((($value * 100) / $allConcession), 0);
        }  //dd($oml_opl_concession);

        $oplTerrContract[] = '';
        foreach ($opl_terrains as $k => $OPL) {
            $oplTerrValue = $opl->where('geological_terrain_id', $OPL->id)->count();
            $oplTerrContract[$k] = number_format($oplTerrValue, 0);
        }

        $omlTerrContract[] = '';
        foreach ($oml_terrains as $m => $OML) {
            $omlTerrValue = $oml->where('geological_terrain_id', $OML->id)->count();
            $omlTerrContract[$m] = number_format($omlTerrValue, 0);
        }

        // $terrain = $rig_terrain = \App\terrain::all()

        //FUNCTIONALITY TO GET THE TOTAL LAST 10 YEARS OF STREAM TOTAl PENDING

        $states = \App\down_outlet_states::orderBy('state_name', 'asc')->get();

        $state_array = [];
        $state_array = \App\down_outlet_states::all();

        $table_of_contents = \App\NOGIARPublicationRemark::where('year', $yrs)->where('show_table', 1)->orderBy('table_id', 'asc')->orderBy('table_id', 'asc')->get();
        $toc_year = \App\NOGIARPublicationRemark::orderBy('year', 'desc')->first();
        $t_of_contents = \App\NOGIARPublicationRemark::where('year', $toc_year->year)->where('show_table', 1)->orderBy('page_no', 'asc')->orderBy('table_id', 'asc')->get();

        if (count($table_of_contents) > 0) {
            $TOC = $table_of_contents;
            $temp = 1;
        } else {
            $TOC = $t_of_contents;
            $temp = 0;
        }
        // return $TOC;

        $depletion_rates = \App\up_reserve_addition_depletion_rate::where('year', $yrs)->orderBy('id', 'asc')->get();

        // $no_yr = $yrs - 2001;
        $no_yr = 20;
        $_yrs = $yrs - 20;

        for ($i = 0; $i <= $no_yr; $i++) {
            $ag_nag_legend_chart[$i] = $_yrs + $i;
        }

        $stage = \App\PublicationStage::where('year', $yrs)->first();
        $temp_stage = \App\Stage::all();
        $review_stage = $temp_stage->where('name', 'Review Publication')->first();
        $approve_stage = $temp_stage->where('name', 'Approve Publication')->first();
        $pub_stages = $temp_stage->where('workflow_id', 1);
        $contributors = \App\publicationReviewApprove::where('year', $yrs)->get();

        //script to determine if year is a leap year or not
        $yr = '0000';
        $ave_prod = 0;
        $isLeap = DateTime::createFromFormat('Y', $yrs)->format('L') === '1';
        if ($isLeap == true) {
            $yr = 366;
        } else {
            $yr = 365;
        }

        $m_arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $users = \App\User::orderBy('name', 'asc')->get();

        $res_OIL = \App\up_reserves_oil::where('year', $yrs)->get();
        $res_COND = \App\up_reserves_report::where('year', $yrs)->get();
        $res_oil_count = $res_OIL->sum('oil_reserves');
        $res_cond_count = $res_COND->sum('condensate_reserves');
        $oil_cond_count = ($res_oil_count + $res_cond_count);

        return view('publication.nogiar.section-test', compact('nogiar', 'review_approve', 'year', 'yrs', 'array_year_9', 'TOC', 'temp', 'multi_clients', 'total_terrains', 'opl_terrains', 'oml_terrains', 'oml_contract', 'rrr_contract_legend', 'concession_contract_legend', 'test_contract', 'pro_crud_terrains', 'terrain', 'opl', 'omlCount', 'oplContract', 'oplTerrContract', 'oml_opl_concession', 'omlContract', 'omlTerrContract', 'oml', 'block', 'm_field', 'crude_prods', 'seismic_data', 'rig_disposition_year', 'year_array', 'array_year', 'array_year_20', 'array_year_10', 'array_year_5', 'month_arr', 'contractCount', 'contracts', 'contract_2to5', 'imp_products', 'state_array', 'contract_legend', 'table_of_contents', 't_of_contents', 'director_remark', 'regulatory_structure', 'modular_refinery', 'fdps', 'app_gas_fdps', 'drill_gas_wells', 'gas_well_workovers', 'field_summaries', 'production_deferments', 'ag_nag_legend_chart', 'depletion_rates', 'states', 'stage', 'review_stage', 'approve_stage', 'pub_stages', 'contributors', 'price_legend', 'yr', 'm_arr', 'users', 'oil_cond_count'));
    }

    public function TableOfContent(Request $request)
    {
        $year = $request->year;
        if (! $year) {
            $year = 2018;
        }

        $headerToc = \App\NogiarPublicationTOC::where('year', $year)->get();
        $upstreams = \App\NogiarUpstreamToc::where('year', $year)->get();
        $midstreams = \App\NogiarMidstreamToc::where('year', $year)->get();
        $downstreams = \App\NogiarDownstreamToc::where('year', $year)->get();
        $hses = \App\NogiarHseToc::where('year', $year)->get();
        $toc_contents = \App\NOGIARpublicationRemark::where('year', $year)->orderBy('table_no', 'asc')->get();
        $figures = $toc_contents->where('figure_title_1', '<>', null);
        return view('publication.nogiar.add-table-of-content', compact('year', 'headerToc', 'upstreams', 'midstreams', 'downstreams', 'hses', 'toc_contents', 'figures'));
    }

    public function updateTableOfContent(Request $request)
    {
        //return $request->all();
        try {
            $year = $request->publication_year;

            // TABLE HEADERS
            $headers = \App\NOGIARPublicationTOC::where('year', $year)->get();
            foreach ($headers as $k => $header) {
                $head = 'head_'.$header->id;
                $page_no = $request->$head;

                $data = ['page_no' => $page_no, 'updated_at' => date('Y-m-d h:i:s')];
                \App\NOGIARPublicationTOC::where('id', $header->id)->update($data);
            }

            // UPSTREAM TABLE HEADERS
            $upstreams = \App\NogiarUpstreamToc::where('year', $year)->get();
            foreach ($upstreams as $k => $upstream) {
                $Upstream = 'upstream_'.$upstream->id;
                $page_no = $request->$Upstream;

                $data = ['page_no' => $page_no, 'updated_at' => date('Y-m-d h:i:s')];
                \App\NogiarUpstreamToc::where('id', $upstream->id)->update($data);
            }

            // MIDSTREAM TABLE HEADERS
            $midstreams = \App\NogiarMidstreamToc::where('year', $year)->get();
            foreach ($midstreams as $k => $midstream) {
                $Midstream = 'midstream_'.$midstream->id;
                $page_no = $request->$Midstream;

                $data = ['page_no' => $page_no, 'updated_at' => date('Y-m-d h:i:s')];
                \App\NogiarMidstreamToc::where('id', $midstream->id)->update($data);
            }

            // DOWNSTREAM TABLE HEADERS
            $downstreams = \App\NogiarDownstreamToc::where('year', $year)->get();
            foreach ($downstreams as $k => $downstream) {
                $Downstream = 'downstream_'.$downstream->id;
                $page_no = $request->$Downstream;

                $data = ['page_no' => $page_no, 'updated_at' => date('Y-m-d h:i:s')];
                \App\NogiarDownstreamToc::where('id', $downstream->id)->update($data);
            }

            // HSE TABLE HEADERS
            $hses = \App\NogiarHseToc::where('year', $year)->get();
            foreach ($hses as $k => $hse) {
                $Hse = 'hse_'.$hse->id;
                $page_no = $request->$Hse;

                $data = ['page_no' => $page_no, 'updated_at' => date('Y-m-d h:i:s')];
                \App\NogiarHseToc::where('id', $hse->id)->update($data);
            }

            // TABLE OF CONTENT
            $contents = \App\NOGIARpublicationRemark::where('year', $year)->get();
            foreach ($contents as $k => $content) {
                $Content = 'content_'.$content->id;
                $page_no = $request->$Content;

                $data = ['page_no' => $page_no, 'updated_at' => date('Y-m-d h:i:s')];
                \App\NOGIARpublicationRemark::where('id', $content->id)->update($data);
            }

            // FIGURE OF CONTENT
            // $figures = \App\NOGIARpublicationRemark::where('year', $year)->where('figure_title_1', '<>', null)->get();
            // foreach ($figures as $k => $figure)
            // {
            //     $Figure = 'figure_'.$figure->id;     $page_no = $request->$Figure;

            //     $data = array('page_no' => $page_no, 'updated_at' => date('Y-m-d h:i:s'));
            //     \App\NOGIARpublicationRemark::where('id', $figure->id)->update($data);
            // }

            if ($request->ajax()) {
                return response()->json(['status'=>'ok', 'info'=>'Table update successfully.']);
            } else {
                return redirect()->back()->with(['info'=> 'Table update successfully']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, An Error Occurred Please Try Again. '.$e->getMessage());
        }
    }

    //######## OPEC PUBLICATION SECTION ##########//

    public function opec_page(Request $request)
    {
        // $year = \App\nogiar_publication::where('status', 1)->orderBy('year', 'asc')->distinct()->get(['year']);
        return view('publication.opec.index');
    }
}
