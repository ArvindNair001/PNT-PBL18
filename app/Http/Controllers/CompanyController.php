<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Skill;
use App\RequirementSkill;

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

    public function register(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);

        return redirect('home');

    }

    
    public function addjob(Request $request){
        $this->validate($request,[
            'jtitle' => 'required',
            'jdescription' => 'required',
            'jvacancy' => 'required',
            'jbranch' => 'required'
        ]);
        // ',' delimiter
        $rqrmts_string = $request->input('jrequirements');
        $rqrmts = explode(',',$rqrmts_string);
        
        $job = new Job;
        $job->title = $request->input('jtitle');
        $job->description = $request->input('jdescription');
        $job->vacancy = $request->input('jvacancy');
        $job->save();

        $count=0;
        foreach($rqrmts as $ele){
           // if(){
            //     $id;
                
            // }
            $skill = new Skill;
            $skill->skill = $ele;
            $skill->save(); 
            $skills_id = Skill::orderBy('created_at','desc')->first()->id;

            $skills_req = new RequirementSkill;
            $skills_req->skills_id = $skills_id+$count;
            $skills_req->jobs_id = Job::orderBy('created_at','desc')->first()->id;
            $skills_req->save();
            $count++;
        }

        return redirect('/company-dashboard');

    }
}
