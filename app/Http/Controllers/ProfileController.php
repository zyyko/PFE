<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservateur;

class ProfileController extends Controller
{
    public function show (Reservateur $profile) 
    {
        /* $id = (int)$request->id;
        $profile = Profile::findOrFail($id); */
        /* if($profile === NULL) {
            return abort(404);
        } */
        return view('profile', compact('profile'));
    }
}
