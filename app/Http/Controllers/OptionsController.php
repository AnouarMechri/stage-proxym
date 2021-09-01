<?php

namespace App\Http\Controllers;

use App\Models\options;
use Illuminate\Http\Request;


class OptionsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:option index', ['only' => ['index']]);
         $this->middleware('permission:option create', ['only' => ['create','store']]);
         $this->middleware('permission:option edit', ['only' => ['edit','update']]);
         $this->middleware('permission:option delete', ['only' => ['destroy']]);
         $this->middleware('permission:option show', ['only' => ['show']]);
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
  
        $option= new \App\Models\options();
        $option->title = $request->title;   
        $option->o_status = $request->o_status;
        $option->questions_id = $request->questions_id;
        
    
        $option->save();
        
        $request->session()->flash('success','Your option was successfully added :))');
        return redirect()->action([QuestionsController::class,'show'] , [$option->questions_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option= options::find($id);
       
        return view('options.show')->with('option',$option);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function edit(options $options)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'o_status' => 'required',
        ]);
        $option= options::find($id);
        $option->title = $request->input('title');
        $option->o_status = $request->input('o_status');
       
        $option->save(); 
        $request->session()->flash('success','Your option was successfully updated :))');
        return redirect()->action([QuestionsController::class, 'show'] , [$option->questions_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\options  $options
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option= options::find($id);
        
        $option->delete();
        session()->flash('success','Your option was successfully deleted :))');
        return redirect()->action([QuestionsController::class, 'show'], [$option->questions_id]);
    }
}
