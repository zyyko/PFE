<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservateur;
use App\Models\ImmobiliersReserved;


class ProfileController extends Controller
{
    public function show (Reservateur $profile) 
    {
        /* $id = (int)$request->id;
        $profile = Profile::findOrFail($id); */
        /* if($profile === NULL) {
            return abort(404);
        } */

        $immobilierReserved = ImmobiliersReserved::where('ID_RESERVATEUR', $profile->id)->get();
        return view('admin.profile', compact('profile','immobilierReserved'));
    }
}
