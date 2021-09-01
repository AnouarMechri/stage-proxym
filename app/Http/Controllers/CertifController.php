<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use App\Models\Ptest;
use App\Models\User;
use Notification;
use App\Notifications\Certif as NotificationsCertif;
use App\Notifications\TestPassed;
use Illuminate\Support\Facades\Auth;
use App\Models\questions;
use App\Models\certif;
use App\Models\options;
use App\Notifications\NewCertif;
use Illuminate\Http\Request;


class CertifController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:test index', ['only' => ['index']]);
         $this->middleware('permission:test index', ['only' => ['C_index']]);
         $this->middleware('permission:test create', ['only' => ['create','store']]);
         $this->middleware('permission:test edit', ['only' => ['edit','update']]);
         $this->middleware('permission:test delete', ['only' => ['destroy']]);
         $this->middleware('permission:test show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifs = certif::all();
        return view('certifs.index',compact('certifs'));
    }
    public function C_index($id)
    {   
        $options = options::all();
        $questions = questions::all();
        $certif = certif::find($id);
        return view('certifs.check')->with('certif',$certif)->with('questions',$questions)->with('options',$options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certifs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'title' => 'required',
        ]);
  
        $input = $request->all();
  
       
    
        certif::create($input);

        $user =User::get();
        $certif =certif::latest()->first();
        Notification::send($user , new NewCertif($certif));


        return redirect()->action([CertifController::class, 'index'])
                        ->with('success','certificate added successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\certif  $certif
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions= questions::all();
        $certif= certif::find($id);
       
        return view('certifs.show')->with('certif',$certif)->with('questions',$questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\certif  $certif
     * @return \Illuminate\Http\Response
     */
    public function edit(certif $certif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\certif  $certif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $certif= certif::find($id);
        $certif->title = $request->input('title');
        $certif->status = $request->input('st');
        $certif->save(); 
        $request->session()->flash('success','Your post was successfully updated :))');
        return redirect()->action([CertifController::class, 'show'] , [$certif->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\certif  $certif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $certif= certif::find($id);
        $certif->delete();
        session()->flash('success','Your certif was successfully deleted :))');
        return redirect()->action([CertifController::class, 'index']);
    }


    public function MarkAsRead_all(Request $request) {
        $userUnreadNotification =auth()->user()->unreadNotifications;
        if( $userUnreadNotification ) {
            
            $userUnreadNotification->markAsRead();
            return back();
        }

    }
}
