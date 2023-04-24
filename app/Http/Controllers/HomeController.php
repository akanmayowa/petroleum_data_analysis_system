<?php

namespace App\Http\Controllers;

use App\Actions\IndexAction;
use App\Notifications\emailNOGIARManager;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('microsoft');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexAction $indexAction)
    {
        // $year = ['2011', '2012', '2013', '2014', '2015', '2016', '2017'];
        // $Terrs = \App\Bala_block::distinct()->orderBy('basin_id', 'asc')->get(['basin_id']);

        // $users_last_log = \App\user_login_history::orderBy('id', 'desc')->get();
        // $users = \App\User::orderBy('id', 'asc')->get();

        $response = $indexAction->index();

        // return view('welcome', $response);
        return view('dashboard', $response);
    }

    public function home()
    {
        return view('welcome');
    }

    public function loadBlocks($year)
    {
        $labels = ['opl_blocks_allocated'=>'opl_blocks_allocated', 'oml_blocks_allocated'=>'oml_blocks_allocated', 'blocks_open'=>'blocks_open'];
        $blocks = \App\Bala_block::where('year', $year)->orderBy('year', 'asc')->get();

        return view('report-load', ['blocks'=>$blocks]);
    }

    public function loadTerrains($terrain_id)
    {
        $labels = ['opl_blocks_allocated'=>'opl_blocks_allocated', 'oml_blocks_allocated'=>'oml_blocks_allocated', 'blocks_open'=>'blocks_open'];
        $Terrain = \App\Bala_block::where('basin_id', $terrain_id)->orderBy('basin_id', 'asc')->get();

        return view('report-load-terrains', ['Terrain'=>$Terrain]);
    }

    public function load_Block($terrain_id)
    {
        $all_block = \App\Bala_block::where('basin_id', $terrain_id)->first();

        return view('report-load-blocks', ['all_block'=>$all_block]);
    }

    public function tesEmail(Request $request)
    {
        try {
            // email notification $this->send_compliance_report($today, $formated_date);

            $receiver = \App\User::where('email', 'kelvin@snapnet.com.ng')->first();
            $sender = \Auth::user()->email;
            $name = $receiver->name;
            $url = url('home');
            $message = 'Test Email notification. Click the link below to do view';

            $receiver->notify(new emailNOGIARManager($message, $sender, $name, $url));

            return view('welcome')->with(['info'=> 'Email was sent to '.$receiver->email]);
            //return redirect()->back()->with(['info'=> 'Email was sent']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, could not send email notification. '.$e->getMessage());
        }
    }
}
