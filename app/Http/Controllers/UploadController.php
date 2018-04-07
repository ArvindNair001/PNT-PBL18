<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use App\Marks;
use DB;
use View;

class UploadController extends Controller
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
        // $uploads = Upload::o
        return view('pages.upload-marksheet');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function academics()
    {
        return view('pages.academics');   
    }

    public function marks() {
        return view('pages.marks');
    }

    public function addmarks(Request $request){
        $this->validate($request, [
            'sem-1' => 'required',
            'sem-2' => 'required',
            'sem-3' => 'required',
            'sem-4' => 'nullable',
            'sem-5' => 'nullable',
            'sem-6' => 'nullable',
            'sem-7' => 'nullable'
        ]);
        $marks = new Marks;

        $sem_value = $request->input('sem-value');
        $agg = 0;

        for($i=1;$i<=$sem_value;$i++){
            // $marks->sem_$i = $request->input("sem-$i");
            $agg += $request->input("sem-$i");
        }
        $agg = $agg/$sem_value;

        $marks->sem_1 = $request->input('sem-1');
        $marks->sem_2 = $request->input('sem-2');
        $marks->sem_3 = $request->input('sem-3');
        $marks->sem_4 = $request->input('sem-4');
        $marks->sem_5 = $request->input('sem-5');
        $marks->sem_6 = $request->input('sem-6');
        $marks->sem_7 = $request->input('sem-7');
        $marks->user_id = auth()->user()->id;
        $marks->avg_CGPI = $agg;
        $marks->save();
        return redirect('/home')->with('success', 'updated');
    }
    
    public function semester(Request $request){
        $this->validate($request, [
            'cur_sem' => 'required'
        ]);
        $cur_sem = $request->input('cur_sem');

        // return View::make("pages.marks", compact('cur_sem')); 
        return redirect("/academics/marks?sem=$cur_sem");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'marks-10' => 'mimes:pdf|max:1999',
            'marks-12' => 'mimes:pdf|max:1999',
            'resume' => 'mimes:pdf|max:1999'
        ]);
        
        //class 10th Marks
        if($request->hasFile('marks-10')){
            // Get filename with the extension
            $filenameWithExt = $request->file('marks-10')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('marks-10')->getClientOriginalExtension();
            // Filename to store
            $Class10Marksheet = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('marks-10')->storeAs('public/marksheet/school', $Class10Marksheet);
        } else {
            $Class10Marksheet = 'noimage.jpg';
        }

        //class 12th Marks
        if($request->hasFile('marks-12')){
            // Get filename with the extension
            $filenameWithExt = $request->file('marks-12')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('marks-12')->getClientOriginalExtension();
            // Filename to store
            $Class12Marksheet = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('marks-12')->storeAs('public/marksheet/school', $Class12Marksheet);
        } else {
            $Class12Marksheet = 'noimage.jpg';
        }

        //resume
        if($request->hasFile('resume')){
            // Get filename with the extension
            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            // Filename to store
            $resumeFileName= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('resume')->storeAs('public/resume', $resumeFileName);
        } else {
            $resumeFileName = 'noimage.jpg';
        }

          // Create Post
          $upload = new Upload;
          $upload->resume = $resumeFileName;
          $upload->class_10 = $Class10Marksheet;
          $upload->class_12 = $Class12Marksheet;
          $upload->user_id = auth()->user()->id;
          $upload->save();


        return redirect('/upload')->with('success', 'uploaded');
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
        //
    }
}
