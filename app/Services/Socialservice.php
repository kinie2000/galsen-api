<?php

namespace App\Services;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class Socialservice
{

   public function loginWithSocial($social)
    {
        try {
    
            $user = Socialite::driver($social)->user();
        $finduser = User::where('social_id', $user->id)->first();
if($finduser){
Auth::login($finduser);
return redirect()->intended('welcome');
}else{
$newUser = User::updateOrCreate(['email' => $user->email],[
'user_name' => $user->name,
'social_id'=> $user->id,
'password' => encrypt('123456dummy')
]);

Auth::login($newUser);

}
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}