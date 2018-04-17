<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Skill;
use App\StudentSkill;
use App\RequirementSkill;

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

    public function addSkills(Request $request){
        $this->validate($request,[
            'std-requirement' => 'required'
        ]);

        $rqrmnt_string = $request->input('std-requirement');
        $rqrmnt = explode(',',$rqrmnt_string);

        $count = 0;
        foreach($rqrmnt as $ele){
            $skill = new Skill;
            $skill->skill = $ele; 
            $skill->save();
            $skill_std = new StudentSkill;
            $skillID = Skill::orderBy('created_at','desc')->first()->id;
            $skill_std->skills_id = $skillID + $count ;
            $skill_std->user_id = auth()->user()->id;
            $skill_std->save();
            $count++;
        }
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
