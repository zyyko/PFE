<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservateur;

class HomeController extends Controller
{
   public function index () 
   {
        $users = Reservateur::paginate(10);
        return view("admin.home", compact('users'));
   }
}
