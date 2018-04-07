<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function upload(){
        return view('pages.upload-marksheet');
    }

    public function contact(){
        return view('pages.contact');
    }
    
    public function student(){
        return view('pages.student');
    }

    public function company(){
        return view('pages.company');
    }

    public function company_register(){
        return view('pages.regcompany');
    }

    public function jobs(){
        return view('pages.job');
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
