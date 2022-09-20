<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Createservice;
use App\Http\Requests\RentingRequest;
use App\Services\Findservice;
use App\Services\Indexservice;
use App\Models\Notification;
use App\Http\Requests\NotificationRequest;

class NotificationController extends Controller
{
      public $createservice ;
    public $Indexservice;
    public $findservice;

    public function __construct(Createservice $createservice,Findservice $findservice,Indexservice $Indexservice)
    {
        $this->createservice=$createservice;
        $this->Indexservice=$Indexservice;
        $this->findservice=$findservice;
    }
  
    public function create(NotificationRequest $request)
    {
        //
         $cmd=$request->val;
         
         $user = Notification::updateOrCreate(['id_user' =>  $cmd['id_user']],['notif_email' => $cmd['notif_email'],'notif_mobile' => $cmd['notif_mobile'], 'notif_sms' => $cmd['notif_sms'],'notif_phone' => $cmd['notif_phone'], 'id_user' => $cmd['id_user']]);
      
       
          
            return response(['bon'=>'reference bien definis']);
       
    }

    public function findnotif(NotificationRequest $request)
    {
       $cmd=$request->val;
    
       return Notification::where('id_user',$cmd)->first();
    }
}
