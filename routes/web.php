<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\MessageController;



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

Route::get('/', function () {
    return view('welcome');
});
// La page où on présente les liens de redirection vers les providers
// Route::get("login-register", "socialcontroller@loginRegister");

// // La redirection vers le provider
// Route::get("redirect/{provider}", "socialcontroller@redirect")->name('socialite.redirect');

// Route::get('auth/facebook', [socialcontroller::class, 'facebookRedirect']);
// Route::get('auth/facebook/callback', [socialcontroller::class, 'loginWithFacebook']);

// Route::get('auth/google',[socialcontroller::class, 'redirectToGoogle'])->name('auth.google');
// Route::get('auth/google/callback',[socialcontroller::class, 'handleGoogleCallback']);
