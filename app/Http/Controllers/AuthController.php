<?php

namespace App\Http\Controllers;

use App\Models\MUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->pass;
        $data = MUser::where('email', $email)->first();
        if(!$data || !Hash::check($password, $data->password))
            return redirect()->back();
        //Set authentication
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];
        if (Auth::attempt( $credentials )) {
            return redirect()->route('admin.index');
        }
        return redirect()->back();
    }

    public function dashboard(){
        if(Auth::check())
            return view('dashboard');
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function vocabulary(){
        return view('admin_vocabulary');
    }
}
