<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immobilier;
use Illuminate\Support\Facades\DB;


class UserHomeController extends Controller
{
    public function index () 
    {   
        $topCities = $this->showTrending();
        $latestImmobiliers = $this->showArrivals();
        return view('utilisateur.home',compact('topCities', 'latestImmobiliers'));
    }

    public function showTrending () 
    {
        $topCities = DB::table('immobiliers')
                ->select('ville', DB::raw('COUNT(*) as reservations_count'))
                ->join('immobiliers_réservés', 'immobiliers.ID_IMMOBILIER', '=', 'immobiliers_réservés.ID_IMMOBILIER')
                ->groupBy('ville')
                ->orderByDesc('reservations_count')
                ->limit(3)
                ->get();
        
        return $topCities;
    }


    public function showArrivals() 
    {
        $latestImmobiliers = Immobilier::orderBy('ID_IMMOBILIER', 'desc') 
        ->take(3)
        ->get(); 
        return $latestImmobiliers;
    }
}
