<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth/login');
    }

    public function postLogin(Request $request){
        if (!auth()->attempt(['email' => $request -> email, 'password' =>$request -> password])){
         return  back()->with('sukses', 'Username atau Password Salah!');;
        }
        return redirect()->route('dashboard')->with('sukses', 'Selamat Datang di E-Questions.');
    }

    public function getRegister(){
        return view('auth/register');
    }

    public function postRegister(Request $request){
        // $this->validate($request,[
        //     'name' =>'required|min:4',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6|confirmed',
        //     'level' => 'required'
        // ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'level' => $request->level,
        // ]);

        // return redirect('login')->with('sukses_register', 'Akun Berhasil dibuat. Silahkan Login!');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
        return redirect('login')->with('sukses_register', 'Akun Berhasil di buat. Silahkan Login!');
    }
    

    public function getForgotPassword(){
        return view('auth/forgot_password');
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('login')->with('sukses_logout', 'Anda Sudah Logout. Sampai Jumpa Kembali ;)');
    }
}
