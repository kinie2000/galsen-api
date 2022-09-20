<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client as OClient; 
use GuzzleHttp\Client;
use Validator;


class Authentificationcontroller extends Controller
{
    //
    public $varauth;
 public function register(Request $request)
    {

        
       $user=User::create([
            'user_name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

     $token = $user->createToken('Laravel-9-Passport-Auth')->accessToken;
  
        return response()->json(['token' => $token,'user_name' => $request->name,'email' => $request->email,'type' => 'Bearer',], 200);
    }
  
    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $cmd=$request->val;
        $data = [
            'email' => $cmd['email'],
            'password' => $cmd['password']
        ];
       
        // $data = [
        //     'email' =>$request->email,
        //     'password' => $request->password
        // ];
  
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $token = $request->user()->createToken($user->email);
         
            return response()->json(['type' => 'Bearer','user_name' =>$user->user_name,'email' =>$user->email,'id'=>$user->id,'token' => $token,'user'=>$user], 200);
        } else {
            return response()->json(['error' => 'Un'], 401);
        }
        

    }
 
    public function userInfo() 
    {
 
   $user = Auth::user();
      
     return response()->json(['user' => $user], 200);
    }

    public function updateUser(Request $request)
    {
        $mdp=$request->tabvaleur;
        $val=$request->val;
        $tab = ['user_name'=>$mdp['Nom'],'user_surname'=>$mdp['Prenom'],'user_phone'=>$mdp['Phone'],'user_country'=>$mdp['country'],'user_sex'=>$mdp['civilite'],'user_description'=>$mdp['Quelquesmots'],'user_code_postal'=>$mdp['PostalCode'],'user_image'=>$mdp['image'],'user_adress'=>$mdp['Place'],'user_city'=>$mdp['city'],'user_datenais'=>$mdp['DateNaissance']];
       
        $var=User::where('email',$val)->update($tab);

        $newvaremail=User::where('email',$val)->first();
      
       $newvar=User::where('email',$newvaremail->email)->first();
          return response()->json(['user_name' =>$newvar->user_name,'email' =>$newvar->email,'id'=>$newvar->id], 200);

       
    }
      public function getinfoUser(Request $request)
    {
      
        $val=$request->val;

$var=User::where('email',$val)->first();
return $var;
    }
    
}
