<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthControllerUtilisateur extends Controller
{
    public function show () {
        return view("utilisateur.authentification");
    }

    public function login (Request $request) 
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email, 'password' => $password];

        if(Auth::guard('reservateur')->attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('userhome')->with("success","Vous etes bien connecté". $request->name.".");
        }else {
            return back()->withErrors([
                "login" => 'Email ou mot de pass incorrect'
            ])->onlyInput("login");
        }   

        
    }




}
