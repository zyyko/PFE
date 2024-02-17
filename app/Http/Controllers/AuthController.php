<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function show () {
        return view("authentification");
    }

    public function login (Request $request) 
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = ['EMAIL' => $email, 'password' => $password];

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('homepage')->with("success","Vous etes bien connecté". $request->NOM_ADMIN.".");
        }else {
            return back()->withErrors([
                "login" => 'Email ou mot de pass incorrect'
            ])->onlyInput("login");
        }   

        
    }
}
