<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immobilier;


class InsertController extends Controller
{
    public function index ()
    {
        return view('utilisateur.ajouter');
    }

    public function store (Request $request) 
    {
        $type = $request->type;
        $ville = $request->ville;
        $image = $request->file('image')->store('immobiliers', 'public');
        $description = $request->description;

        Immobilier::create([
            'TYPE' => $type,
            'ville' => $ville,
            'image' => $image,
            'Description' => $description,
            'ID_UTILISATEUR' => 45,
        ]); 


    }
}
