<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\certif;
use App\Models\options;
use App\Models\questions;

class HomeController extends Controller
{
    function __construct()
    {       
        
         $this->middleware('permission:index', ['only' => ['index']]);
         $this->middleware('permission:index', ['only' => ['test']]);
         $this->middleware('permission:index', ['only' => ['result']]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $certif = certif::all();
        return view('home')->with('certif',$certif) ;
    }
    public function test($id)
    {   $questions = questions::all();
        $options  = options::all();
        $certif = certif::find($id);
        return view('index')->with('certif',$certif)->with('questions',$questions)->with('options',$options) ;
    }
    public function result($id)
    {   $questions = questions::all();
        $options  = options::all();
        $certif  = certif::all();
        $answer = Answer::find($id);
        $op = $answer['option_id'];
        
        return view('result')->with('answer',$answer)->with('certif',$certif)->with('questions',$questions)->with('op',$op)->with('options',$options);
    }

}
