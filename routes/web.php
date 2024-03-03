<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\AuthControllerUtilisateur;
use \App\Http\Controllers\SignUpController;
use \App\Http\Controllers\UserHomeController;
use \App\Http\Controllers\InsertController;

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

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn () => view('home'))->name('home');
    Route::get('/docs', fn () => view('docs'))->name('docs');
    Route::get('/about', fn () => view('about'))->name('about');

    Route::get('/admin_dashboard', [HomeController::class, 'index'])->name('dashboard.show');
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});


Route::get('/dashboard', [HomeController::class, 'index'])->name('homepage');
Route::get('/dashboard/search', [HomeController::class, 'search'])->name('homepage.filtered');

Route::get('/id{profile}', [ProfileController::class,'show'])->name('profiles.show');

Route::get('/login_admin',[AuthController::class, 'show'])->name("login.show");
Route::post('/login_admin',[AuthController::class, 'login'])->name("login");


Route::get('/login',[AuthControllerUtilisateur::class, 'show'])->name("login.show");
Route::post('/login',[AuthControllerUtilisateur::class, 'login'])->name("login");

Route::get('/register', [SignUpController::class, 'show'])->name('register');
Route::post('/store', [SignUpController::class,'store'])->name('store');


Route::get('/home', [UserHomeController::class, 'index'])->name('userhome');


Route::get('/ajouter', [InsertController::class, 'index']);
Route::post('/ajouter', [InsertController::class, 'store'])->name('ajouter.strore');