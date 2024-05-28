<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertisementsController extends Controller
{
    public function index () {
        $immobiliers = DB::table('immobiliers')
        ->inRandomOrder()
        ->paginate(12);



        return view('utilisateur.advertisements' , compact('immobiliers'));
    }

    
}

