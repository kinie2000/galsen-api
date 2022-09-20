<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Socialservice;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class SocialController extends Controller
{
    //
     public $socialservice ;

    public function __construct(Socialservice $socialservice)
    {
        $this->socialservice=$socialservice;
      
    }
    public function redirection($social)
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
        $finduser = User::where('fb_id', $user->id)->first();
if($finduser){
Auth::login($finduser);
return redirect()->intended('welcome');
}else{
$newUser = User::updateOrCreate(['email' => $user->email],[
'name' => $user->name,
'fb_id'=> $user->id,
'password' => encrypt('123456dummy')
]);
dd($newUser);
Auth::login($newUser);
return redirect()->intended('welcome');
}
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
    
    public function redirectToGoogle()
{
return Socialite::driver('google')->redirect();
}
public function handleGoogleCallback()
{
try {
$user = Socialite::driver('google')->user();
$finduser = User::where('google_id', $user->id)->first();
if($finduser){
Auth::login($finduser);
return redirect()->intended('welcome');
}else{
$newUser = User::updateOrCreate(['email' => $user->email],[
'name' => $user->name,
'google_id'=> $user->id,
'password' => encrypt('123456dummy')
]);
Auth::login($newUser);
return redirect()->intended('welcome');
}
} catch (Exception $e) {
dd($e->getMessage());
}
}
}
