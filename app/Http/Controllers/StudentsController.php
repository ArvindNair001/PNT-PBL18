<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Skill;
use App\StudentSkill;
use App\RequirementSkill;
use App\Upload;
use App\Marks;

class StudentsController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.skill');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listIndex()
    {
      //s  $list = Marks::('SELECT avg_CGPI FROM marks WHERE user_id = ?'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function jobs()
    {
        return '';
    }
    public function fetchjobs()
    {
        $user_id = auth()->user()->id;
        // $marks = Marks::where('user_id',$user_id)->get();
        // $marks_avg = $marks->avg_CGPI;
        $marks = DB::table('marks')->where('user_id',$user_id)->first();
        $avg_marks = $marks->avg_CGPI;
        $jobs = DB::select('SELECT * FROM jobs WHERE min_gpa <= ?',[$avg_marks]);
        if (count($jobs)>0){
            $res = array();
            //foreach($jobs as $job){
                for($i=0;$i<count($jobs);$i++){
                $res[$i] = DB::select('SELECT * 
                FROM skills as s, student_skills as student, requirement_skills as r
                WHERE s.id = r.skills_id
                AND s.id = student.skills_id 
                AND student.user_id = ?
                AND r.jobs_id = ? ',[$user_id,$jobs[$i]->id]);
                
                $company[$i] = DB::select('SELECT * 
                FROM companies as c, jobs as j
                WHERE c.id= j.company_id
                AND j.id = ? ', [$jobs[$i]->id]);
            }
                // $data = [ $res,$company];
            // if($res)
                return var_dump($res);
        }
        else {
            return "better luck next time";
        }
        
    }

    public function addSkills(Request $request){
        $this->validate($request,[
            'jbranch' => 'required'
        ]);
        $jskills = $request->input('skills');
        $user_id = auth()->user()->id;
        foreach($jskills as $ele){
            $std_skill = new StudentSkill;
            $std_skill->skills_id = $ele;
            $std_skill->user_id = $user_id;
            $std_skill->branch = $request->input('jbranch');
            $std_skill->save();
        }

        // $rqrmnt_string = $request->input('std-requirement');
        // $rqrmnt = explode(',',$rqrmnt_string);

        // $count = 0;
        // foreach($rqrmnt as $ele){
        //     $skill = new Skill;
        //     $skill->skill = $ele; 
        //     $skill->save();
        //     $skill_std = new StudentSkill;
        //     $skillID = Skill::orderBy('created_at','desc')->first()->id;
        //     $skill_std->skills_id = $skillID + $count ;
        //     $skill_std->user_id = auth()->user()->id;
        //     $skill_std->save();
        //     $count++;
        // }
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
