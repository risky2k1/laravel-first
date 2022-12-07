<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function formLogin(){
        return view('admin.login.login');
    }

    public function postLogin(Request $request)
    {
//        $pass = $request->password;
//        $password = Hash::make($pass);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.product');
        }else{
//            dd($request->password);
            return redirect()->route('admin.index');
        }
    }
}
