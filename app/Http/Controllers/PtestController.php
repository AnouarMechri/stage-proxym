<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\certif;
use App\Models\options;
use App\Models\Ptest;
use App\Models\questions;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Certif as NotificationsCertif;
use App\Notifications\TestPassed;
use Illuminate\Support\Facades\Auth;

class PtestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:passed test', ['only' => ['index']]);
        $this->middleware('permission:passed test', ['only' => ['store']]);
        $this->middleware('permission:passed test', ['only' => ['mail']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $test = Ptest::all();
        return view('ptest')->with('test',$test) ;
    }
    
    public function store(Request $request)
    {  
        $test= new \App\Models\Ptest();
        $test->score = $request->score;   
        $test->certif_id = $request->certif_id;
        $test->user_id = Auth::user()->id;
        
    
        $test->save();
        
        $user =User::get();
        $certif =certif::where('id', $test->certif_id)->first();
        Notification::send($user , new TestPassed($certif));
        
        $request->session()->flash('success','');
        return redirect()->action([PtestController::class,'index']);
    }


    public function mail($id) {
            $ptest= Ptest::find($id);
            $user =Auth::user();
            Notification::send($user , new NotificationsCertif($ptest));


            return redirect()->action([PtestController::class,'index']);
    }

}
