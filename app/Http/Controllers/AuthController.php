<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin(){
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin/kamar');
            }else{
                return redirect('resepsionis/reservasi');
            }
        }
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin/kamar');
            }else{
                return redirect('resepsionis/reservasi');
            }
        }else{
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
