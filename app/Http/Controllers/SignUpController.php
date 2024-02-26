<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservateur;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function show () {
        return view("utilisateur.signup");
    }

    public function store (Request $request) 
    {   

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:reservateur,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $name = $request->name;
        $password = $request->password;
        $email = $request->email;


        Reservateur::create([
            'NOM_UTILISATEUR' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]); 

        return redirect()->route("login.show")->with('success','Votre compte est bien créé. ');
    }
}
