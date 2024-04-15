<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immobilier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;




class UserHomeController extends Controller
{
    public function index () 
    {   
        $topCities = $this->showTrending();
        //dd($topCities);
        $latestImmobiliers = $this->showArrivals();
        $typesWithTotalCount = $this->showCategories();
        return view('utilisateur.home',compact('topCities', 'latestImmobiliers', 'typesWithTotalCount'));
    }

    public function showTrending () 
    {
        $topCities = DB::table('immobiliers')
        ->select('ville',  DB::raw('COUNT(*) as reservations_count'))
        ->join('immobiliers_réservés', 'immobiliers.ID_IMMOBILIER', '=', 'immobiliers_réservés.ID_IMMOBILIER')
        ->groupBy('ville')
        ->orderByDesc('reservations_count')
        ->limit(3)
        ->get();

    // Initialize Guzzle client
    $client = new Client();

    // Iterate over each city
    foreach ($topCities as $city) {
        // Make request to Unsplash API
        $response = $client->request('GET', 'https://api.unsplash.com/search/photos', [
            'query' => [
                'query' => $city->ville,
                'country' => 'ma',
                'client_id' => 'ttvXW8TTWYyZ4ZrBHNLCrnMeoK8DpztiUhJjyAhDF_k'
            ]
        ]);


        // Get the response body
        $photosData = json_decode($response->getBody(), true);



        // Assuming photos are available in $photosData['results']
        $city->photos = $photosData['results'];
    }

    return $topCities;
    }


    public function showArrivals() 
    {

        $latestImmobiliers = Immobilier::whereNotIn('ID_IMMOBILIER', function($query) {
            $query->select('ID_IMMOBILIER')->from('immobiliers_pas_encore_accepté');
        })
        ->orderBy('ID_IMMOBILIER', 'desc')
        ->take(4)
        ->get();


        //dd($latestImmobiliers);
        
        return $latestImmobiliers;
    }

    public function showCategories () {
        $typesWithTotalCount = Immobilier::select('TYPE')
        ->selectRaw('COUNT(*) as total_count')
        ->groupBy('TYPE')
        ->get();
    
        return $typesWithTotalCount;
    }
    
}
