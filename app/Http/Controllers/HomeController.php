<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservateur;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Collection;


class HomeController extends Controller
{
   public function index () 
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

        $users = QueryBuilder::for(Reservateur::class)
        ->defaultSort('NOM_UTILISATEUR')
        ->allowedSorts(['id','NOM_UTILISATEUR', 'email', 'date_inscription'])
        ->allowedFilters(['name', 'email', $globalSearch])
        ->paginate(10)
        ->withQueryString();
        return view("admin.home", [
            'users' => SpladeTable::for($users)
                  ->defaultSort('NOM_UTILISATEUR')
                  ->withGlobalSearch()
                  ->column("id", sortable : true)
                  ->column("NOM_UTILISATEUR", sortable : true)
                  ->column("email", sortable : true)
                  ->column("date_inscription" , sortable : true)
                  ->column('operation')
                  ->selectFilter()
        ]);
   }

   public function search (Request $request) 
   {  
      $name = $request->name;
      $users = Reservateur::where('NOM_UTILISATEUR', 'LIKE', "%$name%")->paginate(10);
      return view("admin.home", compact('users'));
   }
}
