<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);


        try {
            $register = new User();
            $register->email = $request->email;
            $register->password = Hash::make($request->password);
            $register->save();
       
            return redirect('register')->with('success','Berhasil Register');
        } catch (\Exception $e) {
            return redirect('register')->with('fail','Gagal Register');
        }
    }


    public function login(){
        return view('auth.login');
    }

    public function index(request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect('index')->with('success','Berhasil Login');
            }

            return redirect('login')->with('fail','Email Atau Password Salah');
        } catch (\Exception $e) {
            return redirect('index')->with('fail',$e->getMessage());
        }

    }

    public function logout(Request $request){
        Auth::logout();

        return redirect('/login')->with('success','Berhasil Logout');
    }
}
