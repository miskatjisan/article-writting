<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:8|max:36'
        ]);
    
        $userInfo = Admin::where('email','=', $request->email)->first();
    
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if('$request->password, $userInfo->password'){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/');
    
            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('admin/login');
        }
    }

    public function dashboard(){
        $data= array();
        if(Session::has('LoggedUser')){
            $data = Admin::where('id','=', Session::get('LoggedUser'))->first();
        }
        return view('admin.dashboard', compact('data'));
    }
}
