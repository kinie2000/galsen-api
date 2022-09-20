<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\renting;
use App\Models\Notification;
class Findservice
{
  public function findlocation($values)
  {
    return renting::find($values);
  }
   public function findnotification($values)
  {
    return Notification::find($values);
  }
}