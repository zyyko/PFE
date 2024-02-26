<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\HomeController;
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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[HomeController::class,'index'])->name("homepage");
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















