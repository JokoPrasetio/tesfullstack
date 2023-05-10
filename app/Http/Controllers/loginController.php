<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function authenticate(Request $request){
        $validate=$request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with('loginError', 'password atau username salah');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();
        return redirect('/');
    }
}
