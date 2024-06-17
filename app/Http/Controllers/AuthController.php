<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{

    public function login()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        try{
            $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();

            return redirect('/dashboard')->with('success', 'Selamat Datang ');
        }
 
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Gagal!');
        return redirect('/login')->with('error', 'Maaf Anda Belum Terdaftar di Sistem Kami');
        }
        catch(\Exception $e){
            dd($e->getMessage() );
        }
    }
        

    public function logout(Request $request)
    {
         
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }



    
}


