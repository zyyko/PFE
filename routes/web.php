<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ProfileController;

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

Route::get('/login',[AuthController::class, 'show'])->name("login.show");
Route::post('/login',[AuthController::class, 'login'])->name("login");





