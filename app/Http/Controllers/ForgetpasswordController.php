<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ForgetpasswordController extends Controller
{
    //

      public function generateCodeValidation(Request $request)
    {
        $token=0;
        $user=Null;
                $token=$this->genereBarCode();
                $cmd=$request->val;
        $data = [
            'email' => $cmd['email'],
        ];
                
                $user=User::where('email', $cmd['email'])->first();
                
                $this->deleteCodeValidation($user->email);
                DB::table('password_resets')->insert([
                    'email'=>$user->email,
                    'token'=>$token,
                    'status'=>'true'
                ]);
            $data=[
                'token'=>$token,
                'name' => $user->user_name . ' ' . $user->user_surname
            ];
            
            Mail::to( $cmd['email'])->send(new ResetPassword($data));
            return response()->json(["message" => "Un code de validation vous a été envoyé par mail",'token'=>$token,'statut'=>true]);
        
    }

    public function verifiyCodeUser(Request $request)
    {
                $cmd=$request->val;
        $data = [
            'code' => $cmd['code'],
        ];
        //  $validator = Validator::make($request->all(),
        //         [
        //             'code' => ['exists:code_validations,code',],
        //         ],
        //         [
        //             'login.exists'=>'Code invalide',
        //         ]
        //     ); 
        //  if ($validator->fails()) {
        //     return response(['message'=>'code invalide','error'=> $validator->errors(),'statut'=>false]);  
        // }else
        
            $lineCodevalidation=DB::table('password_resets')->where('token',$cmd['code'])->first();
            if($lineCodevalidation && $lineCodevalidation->status=='true')
            {
                    DB::table('password_resets')->where('token',$cmd['code'])->update(['status'=>'false']);
                    if($lineCodevalidation->email)
                    {
                        return response(['message'=>"ok",'user'=>$lineCodevalidation->email,'status'=>true]);
                    }
                    else
                    {
                        return response(['message'=>"Utilisateur inexistant",'status'=>false]);
                    }
            }
            else  if(($lineCodevalidation && $lineCodevalidation->status=='false') || !$lineCodevalidation)
            {
                 return response(['message'=>'Code invalide','statut'=>false]); 
            }
        
    }

    private function genereBarCode(){
        $num = str_pad(rand(1,99999), 5, '0', STR_PAD_RIGHT);
        $product = DB::table('password_resets')->where('token', $num)->get();
        if(count($product) >= 1){
            $this->genereBarCode();
        }
        return $num;
    }

    public function deleteCodeValidation($email)
    {
       
            DB::table('password_resets')->where('email',$email)->where('status','true')->update(['status'=>'false']);
    }

    public function changePassword(Request $request)
    {
        
                $cmd=$request->val;
        $data = [
            'code' => $cmd['code'],
        ];

        $user=DB::table('password_resets')->where('token',$cmd['code'])->first();
        
        // if(!$user->idUser && $user->idCustomer)
        // {
        //     Customer::where('id',$user->idCustomer)->update(['password'=>Hash::make($pwd)]);
        //     return response(['message'=>"Réunitialisation de votre mot de passe reussis",'statut'=>true]);
        // }else 
        
            User::where('email',$user->email)->update(['password'=>Hash::make($cmd['pwd'])]);
            return response(['message'=>"Réunitialisation de votre mot de passe reussis",'statut'=>true]);
        
       
    }
    public function changePasswordUnik(Request $request)
    {
        $mdp=$request->val;
     
       $var=User::where('email',$mdp['code'])->update(['password'=>Hash::make($mdp['pwd'])]);
        return response(['message'=>$var]);

    }
     public function changeEmail(Request $request)
    {
        
        $mdp=$request->val;
        
     
       $var=User::where('email',$mdp['code'])->update(['email'=>$mdp['Nemail']]);
       $newvaremail=User::where('email',$mdp['Nemail'])->first();
      
       $newvar=User::where('email',$newvaremail->email)->first();
          return response()->json(['user_name' =>$newvar->user_name,'email' =>$newvar->email,'id'=>$newvar->id], 200);

    }
}
