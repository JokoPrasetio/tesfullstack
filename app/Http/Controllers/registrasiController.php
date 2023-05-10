<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registrasiController extends Controller
{
    public function index(){
        return view('registrasi.index');
    }
    public function store(Request $request){
        // return $request;
        $validate = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required'
        ]);
        // dd('regis berhasil');
        $user = new User;
        $user->nama = $validate['nama'];
        $user->username = $validate['username'];
        $user->password = bcrypt($validate['password']);
        $user->save();
        return redirect('/')->with('success', 'akun berhasil didaftarkan silahkan login');
        
    }
}
