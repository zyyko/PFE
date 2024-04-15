<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\AuthControllerUtilisateur;
use \App\Http\Controllers\SignUpController;
use \App\Http\Controllers\UserHomeController;
use \App\Http\Controllers\InsertController;
use App\Http\Middleware;
use ProtoneMedia\Splade\SpladeCore;
use \App\Http\Controllers\ChartController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ImmobiliersNonAcceptéController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['splade','check.admin'])->group(function () {


    Route::get('/',  [HomeController::class, 'index'])->name('home.admin');
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('dashboard.show');
    Route::get('/id{profile}', [ProfileController::class,'show'])->name('profiles.show');

    Route::get('/docs', fn () => view('docs'))->name('docs');
    Route::get('/about', fn () => view('about'))->name('about'); 

    
    

    Route::get('/admin/bannir/{profile}/', [ProfileController::class , 'showbannir'])->name("show.bannir");
    Route::post('/admin/bannir/{profile}', [ProfileController::class , 'userbannir'])->name("user.bannir");

    Route::get('/admin/débannir/{profile}/{profilename?}', [ProfileController::class , 'showdébannir'])->name('show.débannir');
    Route::post('/admin/débannir/{profile}', [ProfileController::class , 'userdébannir'])->name("user.débannir");

    Route::get('/admin/delete/{profile}/{profilename?}', [ProfileController::class , 'showdelete'])->name('show.delete');
    Route::post('/admin/delete/{profile}', [ProfileController::class , 'userdelete'])->name('user.delete');

    Route::get('/admin/notify/{profile}/{email?}', [ProfileController::class , 'shownotify'])->name('show.notify');
    Route::post('/admin/notify/{profile}/{email?}', [ProfileController::class , 'usernotify'])->name('user.notify');

    //Route charts...
    Route::get('/admin/statistiques/', [ChartController::class, 'chartshow'])->name("charts.show");


    Route::get('/admin/immobilier_non_accepté', [ImmobiliersNonAcceptéController::class, 'index'])->name("nonaccepté.index");
    Route::any('/admin/immobilier_non_accepté/{id?}', [ImmobiliersNonAcceptéController::class , 'immobilierProfile'])->name("profile.immobilier");
    Route::get("/admin/immobilier_non_accepté/profile/{id}", [ImmobiliersNonAcceptéController::class, "showAccept"])->name("accept.immoblier");
    Route::post("/admin/immobilier_non_accepté/profile/{id}", [ImmobiliersNonAcceptéController::class, "accept"])->name("accept");

    
    

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
// USER ROUTE



    
    Route::get('/login',[AuthControllerUtilisateur::class, 'show'])->name("loginuser.show");
    Route::post('/login',[AuthControllerUtilisateur::class, 'login'])->name("login");  

    Route::get('/register', [SignUpController::class, 'show'])->name('register');
    Route::post('/store', [SignUpController::class,'store'])->name('store');

    Route::get('/home', [UserHomeController::class, 'index'])->name('userhome');



//Route::get('/id{profile}', [ProfileController::class])->name('profiles.show');

Route::get('/admin/login',[AuthController::class, 'show'])->name("loginadmin.show");
Route::post('/admin/login',[AuthController::class, 'login'])->name("login.admin");


//----------------------------------------------------------------------------;

Route::resource('Publier', AnnonceController::class);






