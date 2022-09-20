<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\messageevent;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function message(Request $request)
    {
        // event(new message($request->input('message'),$request->input('name')));
        // return [];
        // message::('user')->get();

     //   $user = Auth::User();
    //  $user=$request->input('name');
    //  $message=$request->input('message');   

  $var=Message::create(['message_wording'=>'jjjjjj','loc_id'=>1,'prop_id'=>2]);
 $user=$var->loc_id;
     $message=$var->message_wording; 
  event(new messageevent($user, $message));
  return redirect()->to('/fetchMessages'); 
  return ['status' => 'Message Sent!'];

    }

    
    public function fetchMessages()
{
  return Message::with('user')->get();
}
}
