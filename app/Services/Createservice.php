<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\renting;
use App\Models\vehicle;
class Createservice
{
  public function createlocation(array $values)
  {
    return renting::create($values);
  }
  public function createnotification(array $values)
  {
    return Notification::create($values);
  }
  public function addcar(array $values)
  {
    return vehicle::create($values);
  }

}