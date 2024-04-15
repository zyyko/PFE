<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use ProtoneMedia\Splade\Facades\Toast;


class AuthController extends Controller
{
    public function show () {
        return view("admin.authentification");
    }

    public function login (Request $request) 
    {

        $email = $request->email;
        $password = $request->password;
        
        $credentials = ['EMAIL' => $email, 'password' => $password];

        if(Auth::guard('administrators')->attempt($credentials)) {

            $request->session()->regenerate();
            
            

            return to_route('dashboard.show');
        }else {
            return back()->withErrors([
                "login" => 'Email ou mot de pass incorrect'
            ])->onlyInput("login");
        }   

        
    }
}
