<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\renting;
class Updateservice
{
  public function Updateservice(Array $request)
  {
   return renting::create($request);
  }
}