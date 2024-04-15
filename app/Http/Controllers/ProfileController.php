<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservateur;
use App\Models\ImmobiliersReserved;
use Spatie\QueryBuilder\AllowedFilter;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\BannedUsers;
use ProtoneMedia\Splade\Facades\Toast;
use App\Models\Immobilier;
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use App\Mail\NotifyMail; // Import the MailNotify Mailable class




class ProfileController extends Controller
{
    public function show (Reservateur $profile) 
    {
        
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('ID_RESERVATION', 'LIKE', "%{$value}%")
                        ->orWhere('TYPE', 'LIKE', "%{$value}%");
                });
            });
        });
   
           $reservations = QueryBuilder::for(ImmobiliersReserved::class)
           ->where('ID_RESERVATEUR', $profile->id)
           ->defaultSort('ID_RESERVATION')
           ->allowedSorts(['ID_RESERVATION','ID_IMMOBILIER', 'TYPE', 'DATE_RESERVATION'])
           ->allowedFilters(['ID_RESERVATION', 'TYPE', $globalSearch])
           ->paginate(10)
           ->withQueryString();
           return view("admin.profile", [
               'reservations' => SpladeTable::for($reservations)
                     ->defaultSort('ID_RESERVATION')
                     ->withGlobalSearch()
                     ->column("ID_RESERVATION", sortable : true)
                     ->column("ID_IMMOBILIER", sortable : true)
                     ->column("TYPE" , sortable : true)
                     ->column("DATE_RESERVATION" , sortable : true)
                     ->column('action')
      
           ,'profile' => $profile]);
    }

    public function showdelete () 
    {
        return view('admin.delete');
    }

    public function userdelete (Request $request) 
    {
       
        $userHasReservations = ImmobiliersReserved::where('ID_RESERVATEUR', $request->profile)->first();
        $userHasGoods = Immobilier::where('ID_UTILISATEUR', $request->profile)->first();
        if($userHasReservations || $userHasGoods) 
        {
            Toast::danger('Vous ne pouvez pas supprimer le profil car il a des réservations ou des immobiliers.');
            return back();
        }
        else {
            $uerToBeDeleted = Reservateur::where('id', $request->profile)->first();
            $uerToBeDeleted->delete();
            Toast::title('Lutilisateur a été supprimé');
            return to_route("dashboard.show");
        }

    }

    public function showbannir () 
    {
        return view('admin.bannir');
    }

    public function userbannir (Request $request) 
    {   
        $user = Reservateur::where('id',$request->profile)->first();
        $user->compte_status = "BANNED";
        $user->save();
        DB::table('utilisateurs_exclus')->insert([
            'ID_UTILISATEUR' => $request->profile,
            'RAISON' => $request->reason
        ]);

        Toast::title('Lutilisateur a été banni');

        return back();
    }

    public function showdébannir () {
        return view("admin.débannir");
    }

    public function userdébannir (Request $request) {

        $bannedUser = BannedUsers::where('ID_UTILISATEUR',$request->profile)->first();
        $bannedUser->delete();

        $UserToBeUnbanned = Reservateur::where('id', $request->profile)->first();
        $UserToBeUnbanned->compte_status = "ACTIVE";
        $UserToBeUnbanned->save();

        Toast::title("L'utilisateur a été débanni");

        return back();
        
    }

    public function shownotify () 
    {
        return view('admin.mail.notify');
    }

    public function usernotify (Request $request) 
    {  
        $title = $request->title;
        $content = $request->content;

        Toast::title("Mail Worked ! ");
        Mail::to('zyko.taouaf@gmail.com')->send(new NotifyMail($content, $title));
        
        return back();

    }

}


