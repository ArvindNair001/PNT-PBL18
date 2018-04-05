<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CompanyLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:company');
    }

    public function showLoginForm() {
        return view('auth.company-login');
    }

    public function login(Request $request) {
        //validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //attempt to log the user in
        // Auth::guard('admin')->attempt($credentials, $request->$remember);

        //if successfull then redirect the user
        if(Auth::guard('company')->attempt($credentials, $request->remember)){
            return redirect()->intended(route('company.dashboard'));
        }
        //if unsuccessfull then redirect back to login
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
