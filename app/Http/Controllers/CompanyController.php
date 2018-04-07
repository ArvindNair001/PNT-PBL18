<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company');
    }

    // public function register(Request $request){
    //     $this->validate($request,[
    //         'title' => 'required',
    //         'email' => 'required',
    //         'contact' => 'required'
    //     ]);

    // }
    // public function addjob(Request $request){
    //     $this->validate($request,[
    //         'jtitle' => 'required',
    //         'jdescription' => 'required',
    //         'jvacancy' => 'required',
    //         'jrequirements' => 'required'
    //     ]);
    //     // ',' delimiter
    //     $rqrmts_string = $request->input('jrequirements');
    //     $rqrmts = explode(',',$rqrmts_string);
        
    //     $job = new Job;
    //     $job->title = $request->input('jtitle');
    //     $job->description = $request->input('jdescription');
    //     $job->vacancy = $request->input('jvacancy');
    //     $job->save();
        
        
        
        

    // }
}
