<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\renting;
use App\Models\vehicle;
class Deleteservice
{
  public function deletelocation($id)
  {
     $var=renting::find($id);
    return $var->delete();

  }
   public function deletecar($id)
  {
     $var=vehicle::find($id);
    return $var->delete();

  }
}