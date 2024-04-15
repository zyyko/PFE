<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservateur;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\Facades\Toast;
use App\Models\ImmobilierNotYetAccepted;
use App\Models\Image;
use App\Models\Immobilier;
use Illuminate\Support\Facades\DB;



class ImmobiliersNonAcceptéController extends Controller
{


    public function index()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('NOM_UTILISATEUR', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });
    
        $immobiliersNonAcceptes = QueryBuilder::for(ImmobilierNotYetAccepted::class)
        ->select('immobiliers_pas_encore_accepté.ID_IMMOBILIER', 'immobiliers.Type as type', 'reservateur.NOM_UTILISATEUR as nom_utilisateur')
        ->join('immobiliers', 'immobiliers_pas_encore_accepté.ID_IMMOBILIER', '=', 'immobiliers.ID_IMMOBILIER')
        ->join('reservateur', 'immobiliers_pas_encore_accepté.ID_UTILISATEUR', '=', 'reservateur.id')
        ->allowedFilters($globalSearch)
        ->paginate(10);
    
        return view('admin.nonaccepté', [
            'immobiliersNonAcceptes' => SpladeTable::for($immobiliersNonAcceptes)
                ->defaultSort('nom_utilisateur')
                ->withGlobalSearch()
                ->column('ID_IMMOBILIER', sortable: true)
                ->column('type', sortable: true)
                ->column('nom_utilisateur', sortable: true)
                ->column('action')
        ]);
    }

    public function immobilierProfile (Request $request) 
    {
        $mainPhoto = Immobilier::where('ID_IMMOBILIER', $request->id)->value('image');

        // Find all images with the given ID
        $images = Image::where('ID_IMMOBILIER', $request->id)->get();
        $immobilierInfos = Immobilier::find($request->id);
        
        $result = DB::table('immobiliers')
        ->where('immobiliers.ID_IMMOBILIER', $request->id)
        ->join('immobiliers as immobiliers_info', 'immobiliers.ID_IMMOBILIER', '=', 'immobiliers_info.ID_IMMOBILIER')
        ->select('immobiliers_info.type', 'immobiliers_info.Surface', 'immobiliers_info.description', 'immobiliers_info.Prix')
        ->get();


        // Combine the main photo and the images into a single collection
        $result = collect(['main_photo' => $mainPhoto])->merge($images);
        return view("admin.immobilierprofile")->with("result", $result)
        ->with('immobilierInfos', $immobilierInfos);
    }

    public function showAccept () 
    {
        
        return view("admin.accept");
    }

    public function accept(Request $request) {
        $immobilierToBeAccepted = ImmobilierNotYetAccepted::where('ID_UTILISATEUR', $request->id);
        $immobilierToBeAccepted->delete();

        return to_route('nonaccepté.index');
    }
}
