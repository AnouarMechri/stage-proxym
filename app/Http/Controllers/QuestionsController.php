<?php

namespace App\Http\Controllers;

use App\Models\options;
use App\Models\questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:question index', ['only' => ['index']]);
         $this->middleware('permission:question create', ['only' => ['create','store']]);
         $this->middleware('permission:question edit', ['only' => ['edit','update']]);
         $this->middleware('permission:question delete', ['only' => ['destroy']]);
         $this->middleware('permission:question show', ['only' => ['show']]);
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
        $request->validate([
            'title' => 'required',
        ]);
  
        $question= new \App\Models\questions();
        $question->title = $request->title;   
        $question->certif_id = $request->certif_id;
        
    
        $question->save();
        
        $request->session()->flash('success','Your question was successfully created :))');
        return redirect()->action([CertifController::class,'show'] , [$question->certif_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $options= options::all();
        $question= questions::find($id);
       
        return view('questions.show')->with('question',$question)->with('options',$options);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $question= questions::find($id);
        $question->title = $request->input('title');
       
        $question->save(); 
        $request->session()->flash('success','Your question was successfully updated :))');
        return redirect()->action([QuestionsController::class, 'show'] , [$question->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question= questions::find($id);
        $question->delete();
        session()->flash('success','Your question was successfully deleted :))');
        return redirect()->action([CertifController::class, 'show'], [$question->certif_id]);
    }
}
