<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignController extends Controller
{
    public function index(){
        return view('Sign.in');
    }

    public function auth(Request $request){
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where([
            'email' => $request->email,
            'password' => md5($request->password),
        ])->whereNotNull('email_verified_at')->first();

        if($user){
            $request->session()->put('user', $user);
            return redirect('/dashboard');
        }

        else{
            return back()->withInput();
        }
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/');
    }
}
